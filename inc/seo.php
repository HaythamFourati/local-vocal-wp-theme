<?php
/**
 * SEO output: titles, meta descriptions, social tags and one JSON-LD graph,
 * all from inc/seo-data.php.
 *
 * With Rank Math active (live site): the theme feeds Rank Math through its
 * filters and merges its entities into Rank Math's single schema graph, so
 * nothing is printed twice. Without it (local): the theme prints the tags.
 *
 * Graph: one business entity (#organization, a ProfessionalService) used by
 * every page; plus per page a Service (services, cities, industries),
 * BreadcrumbList, FAQPage (only for FAQs that are visible on the page) and
 * Person entities on About. Facts come from lvm_business() and must match
 * what the site shows (Google's structured-data policy).
 *
 * @package Local_Vocal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Is Rank Math handling the <head>?
 *
 * @return bool
 */
function lvm_seo_rank_math() {
	return defined( 'RANK_MATH_VERSION' );
}

/** Theme image URL. */
function lvm_seo_img( $file ) {
	return get_theme_file_uri( '/assets/images/' . $file );
}

/* ============================================================
   Titles, descriptions, social tags
   ============================================================ */

/** Title for the current page, or '' to leave it to WordPress / Rank Math. */
function lvm_seo_title() {
	$p = lvm_seo_current();
	return $p['title'] ?? '';
}

/** Description for the current page (data file first, then a post excerpt). */
function lvm_seo_description() {
	$p = lvm_seo_current();
	if ( ! empty( $p['desc'] ) ) {
		return $p['desc'];
	}
	if ( is_singular( 'post' ) ) {
		$text = has_excerpt() ? get_the_excerpt() : wp_strip_all_tags( get_post_field( 'post_content', get_queried_object_id() ) );
		return wp_trim_words( $text, 28, '…' );
	}
	return '';
}

if ( lvm_seo_rank_math() ) {
	// Rank Math prints the tags; the theme supplies the copy for the pages it owns.
	// Long post headlines: drop the " - Local Vocal Marketing" suffix so the headline fits Google's ~60 characters
	$lvm_title = function ( $v ) {
		$t = lvm_seo_title();
		if ( $t ) {
			return $t;
		}
		return ( is_singular( 'post' ) && mb_strlen( $v ) > 60 ) ? wp_strip_all_tags( get_the_title() ) : $v;
	};
	// Data file first, then Rank Math's own, then the post's opening text
	$lvm_desc = function ( $v ) {
		$p = lvm_seo_current();
		if ( ! empty( $p['desc'] ) ) {
			return $p['desc'];
		}
		return $v ? $v : lvm_seo_description();
	};
	add_filter( 'rank_math/frontend/title', $lvm_title, 20 );
	add_filter( 'rank_math/frontend/description', $lvm_desc, 20 );
	add_filter( 'rank_math/opengraph/facebook/og_title', $lvm_title, 20 );
	add_filter( 'rank_math/opengraph/facebook/og_description', $lvm_desc, 20 );
	add_filter( 'rank_math/opengraph/twitter/twitter_title', $lvm_title, 20 );
	add_filter( 'rank_math/opengraph/twitter/twitter_description', $lvm_desc, 20 );
	// Share image for theme pages (posts keep their featured image): the branded card, not the old stock photo
	$lvm_ours = function () { return is_front_page() || is_home() || is_page(); };
	$lvm_og   = array(
		'facebook/og_image'            => lvm_seo_img( 'og-default.jpg' ),
		'facebook/og_image_secure_url' => lvm_seo_img( 'og-default.jpg' ),
		'facebook/og_image_width'      => '1200',
		'facebook/og_image_height'     => '630',
		'facebook/og_image_type'       => 'image/jpeg',
		'facebook/og_image_alt'        => 'Local Vocal Marketing: Maryland web design and local SEO, Baltimore and all of Maryland',
		'twitter/twitter_image'        => lvm_seo_img( 'og-default.jpg' ),
	);
	foreach ( $lvm_og as $tag => $value ) {
		add_filter( 'rank_math/opengraph/' . $tag, function ( $v ) use ( $lvm_ours, $value ) { return $lvm_ours() ? $value : $v; }, 20 );
	}
} else {
	add_filter(
		'pre_get_document_title',
		function ( $title ) {
			$t = lvm_seo_title();
			return $t ? $t : $title;
		},
		20
	);
	add_action( 'wp_head', 'lvm_seo_print_meta', 1 );
	// Everything else (blog posts, legal pages): "Page | Local Vocal Marketing", not the raw site slug
	add_filter( 'document_title_separator', function () { return '|'; } );
	add_filter(
		'document_title_parts',
		function ( $parts ) {
			if ( isset( $parts['site'] ) ) {
				$parts['site'] = lvm_business()['name'];
				// Long headlines: keep the words that matter inside Google's ~60-character display
				if ( isset( $parts['title'] ) && mb_strlen( $parts['title'] ) > 40 ) {
					unset( $parts['site'] );
				}
			}
			unset( $parts['tagline'] );
			return $parts;
		}
	);
}

/** BlogPosting node for the current post. */
function lvm_seo_article_node( $url ) {
	$post    = get_queried_object();
	$article = array(
		'@type'            => 'BlogPosting',
		'@id'              => $url . '#article',
		'headline'         => get_the_title( $post ),
		'description'      => lvm_seo_description(),
		'datePublished'    => get_the_date( DATE_W3C, $post ),
		'dateModified'     => get_the_modified_date( DATE_W3C, $post ),
		'author'           => array( '@type' => 'Person', 'name' => get_the_author_meta( 'display_name', $post->post_author ) ),
		'publisher'        => array( '@id' => lvm_seo_id( 'organization' ) ),
		'mainEntityOfPage' => array( '@id' => $url . '#webpage' ),
		'inLanguage'       => 'en-US',
	);
	if ( has_post_thumbnail( $post ) ) {
		$article['image'] = get_the_post_thumbnail_url( $post, 'full' );
	}
	return $article;
}

/**
 * Meta description, canonical (where core doesn't add one) and social tags.
 * Only used without Rank Math.
 */
function lvm_seo_print_meta() {
	$title = lvm_seo_title() ? lvm_seo_title() : wp_get_document_title();
	$desc  = lvm_seo_description();
	$url   = is_front_page() ? home_url( '/' ) : ( is_home() ? get_permalink( get_option( 'page_for_posts' ) ) : ( is_singular() ? get_permalink() : '' ) );
	$image = is_singular( 'post' ) && has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'large' ) : lvm_seo_img( 'og-default.jpg' );

	if ( $desc ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
	}
	if ( is_home() && $url ) { // core only adds rel=canonical on singular views
		printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $url ) );
	}
	$og = array(
		'og:type'        => is_singular( 'post' ) ? 'article' : 'website',
		'og:site_name'   => lvm_business()['name'],
		'og:locale'      => 'en_US',
		'og:title'       => $title,
		'og:description' => $desc,
		'og:url'         => $url,
		'og:image'       => $image,
	);
	foreach ( array_filter( $og ) as $k => $v ) {
		printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $k ), esc_attr( $v ) );
	}
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
}

/* ============================================================
   Schema
   ============================================================ */

/** Stable entity ids. */
function lvm_seo_id( $frag ) {
	return home_url( '/#' . $frag );
}

/** One schema Place for a configured service area. */
function lvm_seo_place( $area ) {
	return array(
		'@type'  => $area[0],
		'name'   => $area[1] . ( 'City' === $area[0] ? ', MD' : '' ),
		'sameAs' => $area[2],
	);
}

/** The business: name, address, phone, hours, areas, people. */
function lvm_seo_business_node() {
	$b = lvm_business();
	return array(
		'@type'                     => 'ProfessionalService', // a LocalBusiness subtype
		'@id'                       => lvm_seo_id( 'organization' ),
		'name'                      => $b['name'],
		'alternateName'             => $b['alt_name'],
		'description'               => $b['description'],
		'url'                       => home_url( '/' ),
		'logo'                      => array( '@type' => 'ImageObject', '@id' => lvm_seo_id( 'logo' ), 'url' => lvm_seo_img( 'logo-512.png' ), 'width' => 512, 'height' => 512, 'caption' => $b['name'] ),
		'image'                     => lvm_seo_img( 'og-default.jpg' ),
		'telephone'                 => $b['phone'],
		'email'                     => $b['email'],
		'foundingDate'              => $b['founded'],
		'priceRange'                => '$$',
		'address'                   => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => $b['street'],
			'addressLocality' => $b['city'],
			'addressRegion'   => $b['region'],
			'postalCode'      => $b['zip'],
			'addressCountry'  => $b['country'],
		),
		'geo'                       => array( '@type' => 'GeoCoordinates', 'latitude' => $b['lat'], 'longitude' => $b['lng'] ),
		'hasMap'                    => $b['map'],
		'openingHoursSpecification' => array(
			array( '@type' => 'OpeningHoursSpecification', 'dayOfWeek' => $b['hours']['days'], 'opens' => $b['hours']['opens'], 'closes' => $b['hours']['closes'] ),
		),
		'areaServed'                => array_map( 'lvm_seo_place', $b['areas'] ),
		'knowsAbout'                => $b['knows_about'],
		'founder'                   => array( '@id' => lvm_url( 'about-us' ) . '#garey-simmons' ),
		'sameAs'                    => $b['same_as'],
	);
}

/** The team, as shown on the About page. */
function lvm_seo_people() {
	$people = array(
		array( 'garey-simmons', 'Garey Simmons', 'CEO & Founder', array( 'Digital marketing strategy', 'Local SEO', 'Business development' ) ),
		array( 'haytham-fourati', 'Haytham Fourati', 'Website Developer & SEO', array( 'Web development', 'WordPress', 'Technical SEO', 'Performance optimization' ) ),
		array( 'david-breth', 'David Breth', 'Social Media Manager', array( 'Social media management', 'Content creation', 'Community management' ) ),
	);
	return array_map(
		function ( $p ) {
			return array(
				'@type'      => 'Person',
				'@id'        => lvm_url( 'about-us' ) . '#' . $p[0],
				'name'       => $p[1],
				'jobTitle'   => $p[2],
				'image'      => lvm_seo_img( 'team/' . $p[0] . '.jpg' ),
				'knowsAbout' => $p[3],
				'worksFor'   => array( '@id' => lvm_seo_id( 'organization' ) ),
			);
		},
		$people
	);
}

/** Breadcrumb trail for the current page: [[name, url], …]. */
function lvm_seo_trail() {
	if ( is_front_page() ) {
		return array();
	}
	$trail    = array( array( 'Home', home_url( '/' ) ) );
	$services = array( 'development', 'seo-optimization', 'content-creation', 'social-media-management', 'analytics-reporting', 'digital-marketing' );
	if ( is_singular( 'post' ) ) {
		$blog    = get_option( 'page_for_posts' );
		$trail[] = array( $blog ? get_the_title( $blog ) : 'Blog', $blog ? get_permalink( $blog ) : home_url( '/blog/' ) );
	} elseif ( is_page() && in_array( get_post_field( 'post_name', get_queried_object_id() ), $services, true ) ) {
		$trail[] = array( 'Services', home_url( '/services/' ) );
	}
	if ( is_singular() ) {
		$trail[] = array( get_the_title(), get_permalink() );
	} elseif ( is_home() && get_option( 'page_for_posts' ) ) {
		$trail[] = array( get_the_title( get_option( 'page_for_posts' ) ), get_permalink( get_option( 'page_for_posts' ) ) );
	}
	return count( $trail ) > 1 ? $trail : array();
}

/** Current page URL used for entity ids. */
function lvm_seo_url() {
	if ( is_front_page() ) {
		return home_url( '/' );
	}
	if ( is_home() && get_option( 'page_for_posts' ) ) {
		return get_permalink( get_option( 'page_for_posts' ) );
	}
	return is_singular() ? get_permalink() : '';
}

/**
 * Page-level entities for the current request (business node excluded).
 *
 * @return array keyed list of nodes
 */
function lvm_seo_page_nodes() {
	$nodes = array();
	$page  = lvm_seo_current();
	$url   = lvm_seo_url();
	$org   = array( '@id' => lvm_seo_id( 'organization' ) );
	$b     = lvm_business();

	// Service: service pages, city pages, industry pages
	if ( ! empty( $page['schema']['service'] ) ) {
		list( $name, $type ) = $page['schema']['service'];
		$area = array( lvm_seo_place( end( $b['areas'] ) ) ); // Maryland
		if ( ! empty( $page['schema']['city'] ) ) {
			foreach ( $b['areas'] as $a ) {
				if ( $a[1] === $page['schema']['city'] ) {
					$area = array( lvm_seo_place( $a ) );
				}
			}
		}
		$service = array(
			'@type'       => 'Service',
			'@id'         => $url . '#service',
			'name'        => $name,
			'serviceType' => $type,
			'description' => $page['desc'],
			'url'         => $url,
			'provider'    => $org,
			'areaServed'  => $area,
		);
		if ( ! empty( $page['schema']['audience'] ) ) {
			$service['audience'] = array( '@type' => 'BusinessAudience', 'audienceType' => $page['schema']['audience'] );
		}
		$nodes['lvm_service'] = $service;
	}

	// FAQs: only ones the page renders
	if ( ! empty( $page['faqs'] ) ) {
		$nodes['lvm_faq'] = array(
			'@type'      => 'FAQPage',
			'@id'        => $url . '#faq',
			'mainEntity' => array_map(
				function ( $q ) {
					return array(
						'@type'          => 'Question',
						'name'           => $q[0],
						'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $q[1] ),
					);
				},
				$page['faqs']
			),
		);
	}

	// Breadcrumbs (match the visible crumb trail)
	$trail = lvm_seo_trail();
	if ( $trail ) {
		$items = array();
		foreach ( $trail as $i => $t ) {
			$items[] = array( '@type' => 'ListItem', 'position' => $i + 1, 'name' => $t[0], 'item' => $t[1] );
		}
		$nodes['lvm_breadcrumb'] = array( '@type' => 'BreadcrumbList', '@id' => $url . '#breadcrumb', 'itemListElement' => $items );
	}

	// Team on About
	if ( lvm_is_page( 'about-us' ) ) {
		foreach ( lvm_seo_people() as $i => $person ) {
			$nodes[ 'lvm_person_' . $i ] = $person;
		}
	}
	return $nodes;
}

/**
 * Full graph when the theme prints schema itself (no Rank Math).
 */
function lvm_seo_print_schema() {
	$url   = lvm_seo_url();
	$graph = array( lvm_seo_business_node() );
	$graph[] = array(
		'@type'      => 'WebSite',
		'@id'        => lvm_seo_id( 'website' ),
		'url'        => home_url( '/' ),
		'name'       => lvm_business()['name'],
		'publisher'  => array( '@id' => lvm_seo_id( 'organization' ) ),
		'inLanguage' => 'en-US',
	);
	if ( $url ) {
		$webpage = array(
			'@type'      => lvm_is_page( 'about-us' ) ? 'AboutPage' : ( lvm_is_page( 'contact' ) ? 'ContactPage' : 'WebPage' ),
			'@id'        => $url . '#webpage',
			'url'        => $url,
			'name'       => lvm_seo_title() ? lvm_seo_title() : wp_get_document_title(),
			'isPartOf'   => array( '@id' => lvm_seo_id( 'website' ) ),
			'about'      => array( '@id' => lvm_seo_id( 'organization' ) ),
			'inLanguage' => 'en-US',
		);
		if ( lvm_seo_description() ) {
			$webpage['description'] = lvm_seo_description();
		}
		if ( lvm_seo_trail() ) {
			$webpage['breadcrumb'] = array( '@id' => $url . '#breadcrumb' );
		}
		$graph[] = $webpage;
	}
	if ( is_singular( 'post' ) ) {
		$graph[] = lvm_seo_article_node( $url );
	}
	$graph = array_merge( $graph, array_values( lvm_seo_page_nodes() ) );
	echo '<script type="application/ld+json">' . wp_json_encode( array( '@context' => 'https://schema.org', '@graph' => $graph ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}

if ( lvm_seo_rank_math() ) {
	/**
	 * Merge into Rank Math's graph: our business replaces its Organization /
	 * LocalBusiness nodes (same #organization id, so its WebSite/WebPage still
	 * point at it), and our page entities are added. Its own BreadcrumbList,
	 * when enabled, wins over ours.
	 */
	add_filter(
		'rank_math/json_ld',
		function ( $data ) {
			$biz_types = array( 'Organization', 'LocalBusiness', 'ProfessionalService', 'Place', 'Corporation' );
			foreach ( $data as $key => $node ) {
				$types = isset( $node['@type'] ) ? (array) $node['@type'] : array();
				if ( array_intersect( $types, $biz_types ) ) {
					unset( $data[ $key ] );
				}
			}
			$data['publisher'] = lvm_seo_business_node();
			$has_crumbs        = false;
			foreach ( $data as $node ) {
				if ( isset( $node['@type'] ) && 'BreadcrumbList' === $node['@type'] ) {
					$has_crumbs = true;
				}
			}
			foreach ( lvm_seo_page_nodes() as $key => $node ) {
				if ( 'lvm_breadcrumb' === $key && $has_crumbs ) {
					continue;
				}
				$data[ $key ] = $node;
			}
			// Posts: Rank Math's Article schema is off on this site, so add ours unless it already has one
			if ( is_singular( 'post' ) ) {
				$has_article = false;
				foreach ( $data as $node ) {
					if ( array_intersect( (array) ( $node['@type'] ?? array() ), array( 'Article', 'BlogPosting', 'NewsArticle' ) ) ) {
						$has_article = true;
					}
				}
				if ( ! $has_article ) {
					$data['lvm_article'] = lvm_seo_article_node( get_permalink() );
				}
			}
			return $data;
		},
		99
	);
} else {
	add_action( 'wp_head', 'lvm_seo_print_schema', 5 );
}

/* ============================================================
   llms.txt: a plain-language brief for AI assistants and answer
   engines (ChatGPT, Gemini, Perplexity, AI Overviews), built from
   the same data as the schema so the facts always agree.
   ============================================================ */
add_action(
	'init',
	function () {
		$path = wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		if ( '/llms.txt' !== $path ) {
			return;
		}
		header( 'Content-Type: text/plain; charset=utf-8' );
		header( 'X-Robots-Tag: noindex' ); // for AI readers, not a search result
		echo lvm_seo_llms_txt(); // phpcs:ignore WordPress.Security.EscapeOutput -- plain text
		exit;
	},
	1
);

/** The llms.txt body (Markdown, per llmstxt.org). */
function lvm_seo_llms_txt() {
	$b     = lvm_business();
	$pages = lvm_seo_pages();
	$link  = function ( $key, $label ) use ( $pages ) {
		$url = 'home' === $key ? home_url( '/' ) : ( isset( lvm_page_templates()[ $key ] ) ? lvm_url( $key ) : home_url( '/' . $key . '/' ) );
		$d   = $pages[ $key ]['desc'] ?? '';
		return '- [' . $label . '](' . $url . '): ' . $d;
	};
	$areas = implode( ', ', array_map( function ( $a ) { return $a[1]; }, $b['areas'] ) );
	$out   = array(
		'# ' . $b['name'],
		'',
		'> ' . $b['description'],
		'',
		'Local Vocal Marketing is a three-person web design and local SEO studio founded in ' . $b['founded'] . ' and based at ' . $b['street'] . ', ' . $b['city'] . ', ' . $b['region'] . ' ' . $b['zip'] . ' (Baltimore County, Maryland). It builds fast, SEO-ready websites and runs local SEO, blog content, social media and reporting for service businesses in Baltimore and across Maryland.',
		'',
		'- Phone: ' . $b['phone_human'],
		'- Email: ' . $b['email'],
		'- Hours: Monday–Friday, 9am–6pm ET',
		'- Service area: ' . $areas,
		'- Free offer: a free website & SEO review (30-minute walkthrough, written report within 48 hours)',
		'',
		'## Services',
		$link( 'development', 'Website design (Baltimore & Maryland)' ),
		$link( 'seo-optimization', 'Local SEO services' ),
		$link( 'content-creation', 'SEO blog writing' ),
		$link( 'social-media-management', 'Social media management' ),
		$link( 'analytics-reporting', 'SEO reporting & analytics' ),
		$link( 'digital-marketing', 'Digital marketing' ),
		'',
		'## Locations',
		$link( 'baltimore', 'Baltimore SEO & web design' ),
		$link( 'annapolis', 'Annapolis SEO & web design' ),
		$link( 'severna-park', 'Severna Park SEO & web design' ),
		$link( 'glen-burnie', 'Glen Burnie SEO & web design' ),
		$link( 'easton', 'Easton SEO & web design' ),
		$link( 'ocean-city', 'Ocean City SEO & web design' ),
		'',
		'## Industries',
		$link( 'hvac', 'HVAC' ),
		$link( 'contractors', 'Contractors' ),
		$link( 'dentists', 'Dentists' ),
		$link( 'home-care', 'Home care agencies' ),
		$link( 'law-firms', 'Law firms' ),
		$link( 'auto-glass', 'Auto glass' ),
		'',
		'## Company',
		$link( 'about-us', 'About the team' ),
		$link( 'contact', 'Contact' ),
		$link( 'blog', 'Blog' ),
		'',
		'## Common questions',
	);
	foreach ( $pages['home']['faqs'] as $q ) {
		$out[] = '';
		$out[] = '### ' . $q[0];
		$out[] = $q[1];
	}
	return implode( "\n", $out ) . "\n";
}

/* ============================================================
   Keep duplicates and utility pages out of the index
   ============================================================ */

/** [noindex?, canonical URL or ''] for the current page. */
function lvm_seo_index_rule() {
	if ( is_category( 'uncategorized' ) ) {
		return array( true, '' ); // catch-all archive, nothing worth ranking
	}
	if ( ! is_page() ) {
		return array( false, '' );
	}
	$rules = lvm_seo_noindex();
	$slug  = get_post_field( 'post_name', get_queried_object_id() );
	if ( ! isset( $rules[ $slug ] ) ) {
		return array( false, '' );
	}
	return array( true, $rules[ $slug ] ? home_url( $rules[ $slug ] ) : '' );
}

if ( lvm_seo_rank_math() ) {
	add_filter(
		'rank_math/frontend/robots',
		function ( $robots ) {
			if ( lvm_seo_index_rule()[0] ) {
				$robots['index'] = 'noindex';
			}
			return $robots;
		},
		20
	);
	add_filter(
		'rank_math/frontend/canonical',
		function ( $canonical ) {
			$c = lvm_seo_index_rule()[1];
			return $c ? $c : $canonical;
		},
		20
	);
	// Keep noindexed and redirected pages out of the sitemap too
	add_filter(
		'rank_math/sitemap/entry',
		function ( $url, $type, $post ) {
			// Rank Math passes a raw DB row, not a WP_Post
			return ( 'post' === $type && isset( $post->ID ) && ( isset( lvm_seo_noindex()[ $slug = get_post_field( 'post_name', $post->ID ) ] ) || isset( lvm_seo_redirects()[ $slug ] ) ) ) ? false : $url;
		},
		10,
		3
	);
} else {
	add_filter(
		'wp_robots',
		function ( $robots ) {
			if ( lvm_seo_index_rule()[0] ) {
				$robots['noindex'] = true;
				unset( $robots['index'] );
			}
			return $robots;
		}
	);
	add_filter(
		'get_canonical_url',
		function ( $url ) {
			$c = lvm_seo_index_rule()[1];
			return $c ? $c : $url;
		}
	);
}

// Retired pages (lvm_seo_redirects) 301 to their replacement
add_action(
	'template_redirect',
	function () {
		if ( ! is_page() ) {
			return;
		}
		$to = lvm_seo_redirects()[ get_post_field( 'post_name', get_queried_object_id() ) ] ?? '';
		if ( $to ) {
			wp_safe_redirect( home_url( $to ), 301 );
			exit;
		}
	}
);

// Featured images without alt text fall back to the post title (blog posts, cards, related posts)
add_action( 'begin_fetch_post_thumbnail_html', function ( $post_id ) { $GLOBALS['lvm_thumb_post'] = $post_id; } );
add_action( 'end_fetch_post_thumbnail_html', function () { unset( $GLOBALS['lvm_thumb_post'] ); } );
add_filter(
	'wp_get_attachment_image_attributes',
	function ( $attr ) {
		if ( '' === trim( $attr['alt'] ?? '' ) && ! empty( $GLOBALS['lvm_thumb_post'] ) ) {
			$attr['alt'] = wp_strip_all_tags( get_the_title( $GLOBALS['lvm_thumb_post'] ) );
		}
		return $attr;
	}
);
