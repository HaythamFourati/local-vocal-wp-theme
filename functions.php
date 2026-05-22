<?php

/**
 * Local Vocal Marketing — theme functions
 */

function lvm_load_assets() {
  // Legacy assets (still needed for service pages until they are migrated)
  if ( file_exists( get_theme_file_path( '/build/index.js' ) ) ) {
    wp_enqueue_script( 'ourmainjs', get_theme_file_uri( '/build/index.js' ), array( 'wp-element', 'react-jsx-runtime' ), '1.0', true );
  }
  if ( file_exists( get_theme_file_path( '/build/index.css' ) ) ) {
    wp_enqueue_style( 'ourmaincss', get_theme_file_uri( '/build/index.css' ), array(), '1.0' );
  }

  // Mobile menu (legacy)
  wp_enqueue_script( 'mobile-menu', get_theme_file_uri( '/src/scripts/mobilemenu.js' ), array(), '1.0', true );

  // Local Vocal redesign — load globally so the new header/footer styles apply
  $css_path = get_theme_file_path( '/src/lvm-redesign.css' );
  $js_path  = get_theme_file_path( '/src/scripts/lvm-redesign.js' );
  wp_enqueue_style(
    'lvm-redesign',
    get_theme_file_uri( '/src/lvm-redesign.css' ),
    array(),
    file_exists( $css_path ) ? filemtime( $css_path ) : '1.0'
  );
  wp_enqueue_script(
    'lvm-redesign',
    get_theme_file_uri( '/src/scripts/lvm-redesign.js' ),
    array(),
    file_exists( $js_path ) ? filemtime( $js_path ) : '1.0',
    true
  );
}
add_action( 'wp_enqueue_scripts', 'lvm_load_assets' );

function lvm_theme_support() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus' );

  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'local-vocal' ),
    'footer'  => __( 'Footer Menu', 'local-vocal' ),
    'mobile'  => __( 'Mobile Menu', 'local-vocal' ),
  ) );
}
add_action( 'after_setup_theme', 'lvm_theme_support' );

// Contact Form 7 custom styles
function lvm_enqueue_cf7_styles() {
  if ( function_exists( 'wpcf7_contact_form' ) ) {
    wp_enqueue_style( 'cf7-custom', get_template_directory_uri() . '/src/contact-form.css', array(), '1.0.0' );
  }
}
add_action( 'wp_enqueue_scripts', 'lvm_enqueue_cf7_styles' );

// Post navigation styles (single posts)
function lvm_enqueue_post_navigation_styles() {
  if ( is_single() ) {
    wp_enqueue_style( 'post-navigation', get_template_directory_uri() . '/src/post-navigation.css', array(), '1.0.0' );
  }
}
add_action( 'wp_enqueue_scripts', 'lvm_enqueue_post_navigation_styles' );

// Add lvm-redesign class to body on the homepage so the redesign CSS scope
// applies. The header.php passes 'lvm-redesign' to body_class() globally so
// the new nav/footer also inherit it; this keeps things consistent.
function lvm_body_class( $classes ) {
  if ( ! in_array( 'lvm-redesign', $classes, true ) ) {
    $classes[] = 'lvm-redesign';
  }
  return $classes;
}
add_filter( 'body_class', 'lvm_body_class' );

// Custom homepage title
function lvm_document_title( $title ) {
  if ( is_front_page() ) {
    $title['title'] = 'Local Vocal Marketing | Maryland Web Design & SEO for Local Businesses';
  }
  return $title;
}
add_filter( 'document_title_parts', 'lvm_document_title', 10, 1 );

// ============================================================
// Schema Markup for SEO and AI Search
// ============================================================

/**
 * Output structured data (JSON-LD) for different page types
 */
function lvm_output_schema_markup() {
  $schema = array();
  
  if ( is_front_page() ) {
    $schema = lvm_get_homepage_schema();
  } elseif ( is_page( 'about-us' ) ) {
    $schema = lvm_get_about_schema();
  } elseif ( is_page( 'contact' ) ) {
    $schema = lvm_get_contact_schema();
  } elseif ( is_page( 'services' ) ) {
    $schema = lvm_get_services_schema();
  } elseif ( is_home() || is_archive() ) {
    $schema = lvm_get_blog_schema();
  }
  
  if ( ! empty( $schema ) ) {
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
  }
}
add_action( 'wp_head', 'lvm_output_schema_markup', 1 );

/**
 * Homepage schema - Organization + LocalBusiness + Service
 */
function lvm_get_homepage_schema() {
  return array(
    '@context' => 'https://schema.org',
    '@graph' => array(
      // Organization
      array(
        '@type' => 'Organization',
        '@id' => home_url( '#organization' ),
        'name' => 'Local Vocal Marketing',
        'alternateName' => 'Local Vocal',
        'url' => home_url( '/' ),
        'logo' => array(
          '@type' => 'ImageObject',
          'url' => home_url( '/wp-content/themes/local-vocal-wp-theme-main/assets/logo.png' ),
          'width' => 200,
          'height' => 60
        ),
        'description' => 'Maryland web design & SEO for local businesses. We help small businesses build better websites, rank better on Google, and stay visible online.',
        'foundingDate' => '2010',
        'areaServed' => array(
          '@type' => 'Place',
          'name' => 'Maryland, USA'
        ),
        'address' => array(
          '@type' => 'PostalAddress',
          'addressLocality' => 'Baltimore',
          'addressRegion' => 'MD',
          'addressCountry' => 'US',
          'postalCode' => '21071'
        ),
        'geo' => array(
          '@type' => 'GeoCoordinates',
          'latitude' => '39.2904',
          'longitude' => '-76.6122'
        ),
        'contactPoint' => array(
          '@type' => 'ContactPoint',
          'telephone' => '+1-443-852-1000',
          'contactType' => 'customer service',
          'areaServed' => 'US',
          'availableLanguage' => 'English'
        ),
        'sameAs' => array(
          'https://www.facebook.com/localvocalmarketing',
          'https://www.linkedin.com/company/local-vocal-marketing',
          'https://twitter.com/localvocalmd'
        )
      ),
      
      // LocalBusiness
      array(
        '@type' => 'LocalBusiness',
        '@id' => home_url( '#localbusiness' ),
        'name' => 'Local Vocal Marketing',
        'description' => 'Maryland web design & SEO agency specializing in local businesses',
        'url' => home_url( '/' ),
        'telephone' => '+1-443-852-1000',
        'address' => array(
          '@type' => 'PostalAddress',
          'addressLocality' => 'Baltimore',
          'addressRegion' => 'MD',
          'addressCountry' => 'US',
          'postalCode' => '21071'
        ),
        'geo' => array(
          '@type' => 'GeoCoordinates',
          'latitude' => '39.2904',
          'longitude' => '-76.6122'
        ),
        'openingHours' => array(
          'Mo-Fr 09:00-18:00'
        ),
        'priceRange' => '$$',
        'paymentAccepted' => array( 'Cash', 'Credit Card', 'Check' ),
        'currenciesAccepted' => 'USD',
        'areaServed' => array(
          'Annapolis MD',
          'Baltimore MD',
          'Severna Park MD',
          'Glen Burnie MD',
          'Easton MD',
          'Ocean City MD',
          'Glyndon MD'
        )
      ),
      
      // WebSite
      array(
        '@type' => 'WebSite',
        '@id' => home_url( '#website' ),
        'url' => home_url( '/' ),
        'name' => 'Local Vocal Marketing',
        'description' => 'Maryland web design & SEO for local businesses',
        'publisher' => array( '@id' => home_url( '#organization' ) ),
        'potentialAction' => array(
          '@type' => 'SearchAction',
          'target' => home_url( '/?s={search_term_string}' ),
          'query-input' => 'required name=search_term_string'
        )
      ),
      
      // ProfessionalService
      array(
        '@type' => 'ProfessionalService',
        '@id' => home_url( '#service' ),
        'name' => 'Web Design & SEO Services',
        'description' => 'Complete web design, SEO, content, and social media services for Maryland local businesses',
        'provider' => array( '@id' => home_url( '#organization' ) ),
        'serviceType' => array(
          'Web Design',
          'Local SEO',
          'Content Marketing',
          'Social Media Management',
          'Analytics & Reporting'
        ),
        'areaServed' => array(
          '@type' => 'Place',
          'name' => 'Maryland, USA'
        ),
        'hasOfferCatalog' => array(
          '@type' => 'OfferCatalog',
          'name' => 'Services Catalog',
          'itemListElement' => array(
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                'name' => 'Website Design',
                'description' => 'Custom website development for local businesses'
              ),
              'price' => '2500-8000',
              'priceCurrency' => 'USD'
            ),
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                'name' => 'Local SEO',
                'description' => 'Search engine optimization for local businesses'
              ),
              'price' => '800-2500',
              'priceCurrency' => 'USD'
            ),
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                'name' => 'Content Marketing',
                'description' => 'SEO-focused blog content and article writing'
              ),
              'price' => '500-1500',
              'priceCurrency' => 'USD'
            ),
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                'name' => 'Social Media Management',
                'description' => 'Social media presence management for local businesses'
              ),
              'price' => '600-1800',
              'priceCurrency' => 'USD'
            )
          )
        )
      ),
      
      // FAQ
      array(
        '@type' => 'FAQPage',
        '@id' => home_url( '#faq' ),
        'mainEntity' => array(
          array(
            '@type' => 'Question',
            'name' => 'Why does a local business need SEO?',
            'acceptedAnswer' => array(
              '@type' => 'Answer',
              'text' => 'Most customers find local services through Google. If your business doesn\'t appear when someone searches for what you do in your city, you\'re invisible to people ready to buy. Local SEO makes you visible to the right people, in the right place, at the right moment.'
            )
          ),
          array(
            '@type' => 'Question',
            'name' => 'How does web design affect Google rankings?',
            'acceptedAnswer' => array(
              '@type' => 'Answer',
              'text' => 'A lot. Page speed, mobile experience, clear headings, semantic structure, internal linking, and crawlable content are all design decisions Google evaluates. A pretty site with broken structure can rank worse than a plain site that\'s built right.'
            )
          ),
          array(
            '@type' => 'Question',
            'name' => 'What is local SEO?',
            'acceptedAnswer' => array(
              '@type' => 'Answer',
              'text' => 'Local SEO is the set of practices that helps your business appear in location‑based searches — the map pack, \'near me\' results, and city‑specific queries. It combines Google Business Profile optimization, on‑page SEO, service‑area pages, citations, and review velocity.'
            )
          )
        )
      )
    )
  );
}

/**
 * About page schema - Organization + Team
 */
function lvm_get_about_schema() {
  return array(
    '@context' => 'https://schema.org',
    '@graph' => array(
      // WebPage
      array(
        '@type' => 'WebPage',
        '@id' => home_url( '/about-us/#webpage' ),
        'url' => home_url( '/about-us/' ),
        'name' => 'About Local Vocal Marketing | Maryland Web Design Team',
        'description' => 'Meet the Local Vocal Marketing team - Maryland web design and SEO experts helping local businesses since 2010.',
        'isPartOf' => array( '@id' => home_url( '#website' ) ),
        'breadcrumb' => array(
          '@type' => 'BreadcrumbList',
          'itemListElement' => array(
            array(
              '@type' => 'ListItem',
              'position' => 1,
              'name' => 'Home',
              'item' => home_url( '/' )
            ),
            array(
              '@type' => 'ListItem',
              'position' => 2,
              'name' => 'About Us',
              'item' => home_url( '/about-us/' )
            )
          )
        )
      ),
      
      // Organization (reference)
      array(
        '@type' => 'Organization',
        '@id' => home_url( '#organization' ),
        'name' => 'Local Vocal Marketing',
        'url' => home_url( '/' )
      ),
      
      // Team members
      array(
        '@type' => 'Organization',
        '@id' => home_url( '/about-us/#team' ),
        'name' => 'Local Vocal Marketing Team',
        'description' => 'Maryland web design and SEO team',
        'url' => home_url( '/about-us/' ),
        'subOrganization' => array(
          array(
            '@type' => 'Person',
            '@id' => home_url( '/about-us/#garey-simmons' ),
            'name' => 'Garey Simmons',
            'jobTitle' => 'Owner & Strategy Lead',
            'description' => 'Leads client strategy and business development. If we can\'t make the phone ring more, we shouldn\'t be on the invoice.',
            'image' => 'https://localvocalmarketing.com/wp-content/uploads/2023/08/GareySimmons-smile-1.jpg',
            'sameAs' => array(),
            'knowsAbout' => array( 'Digital Marketing Strategy', 'Client Relations', 'Business Development' ),
            'worksFor' => array( '@id' => home_url( '#organization' ) )
          ),
          array(
            '@type' => 'Person',
            '@id' => home_url( '/about-us/#haytham-fourati' ),
            'name' => 'Haytham Fourati',
            'jobTitle' => 'Website Developer & SEO',
            'description' => 'Builds the sites. Front-end engineering, WordPress, and the on-page SEO foundations every Local Vocal site is judged on.',
            'image' => 'https://localvocalmarketing.com/wp-content/uploads/2025/02/WhatsApp-Image-2023-02-20-at-12.00.54.jpg',
            'sameAs' => array(),
            'knowsAbout' => array( 'Web Development', 'WordPress', 'SEO', 'Performance Optimization' ),
            'worksFor' => array( '@id' => home_url( '#organization' ) )
          ),
          array(
            '@type' => 'Person',
            '@id' => home_url( '/about-us/#david-breth' ),
            'name' => 'David Breth',
            'jobTitle' => 'Social Media Manager',
            'description' => 'Runs the social side. Plans the calendar, writes the captions, edits the photo, replies to the comments.',
            'sameAs' => array(),
            'knowsAbout' => array( 'Social Media Management', 'Content Creation', 'Community Management' ),
            'worksFor' => array( '@id' => home_url( '#organization' ) )
          )
        )
      ),
      
      // Place (location)
      array(
        '@type' => 'Place',
        '@id' => home_url( '/about-us/#location' ),
        'name' => 'Local Vocal Marketing Office',
        'description' => 'Maryland web design agency serving the Baltimore area',
        'address' => array(
          '@type' => 'PostalAddress',
          'addressLocality' => 'Baltimore',
          'addressRegion' => 'MD',
          'addressCountry' => 'US',
          'postalCode' => '21071'
        ),
        'geo' => array(
          '@type' => 'GeoCoordinates',
          'latitude' => '39.2904',
          'longitude' => '-76.6122'
        ),
        'hasMap' => 'https://maps.google.com/?q=Baltimore+MD+21071'
      )
    )
  );
}

/**
 * Contact page schema - ContactPoint + Action
 */
function lvm_get_contact_schema() {
  return array(
    '@context' => 'https://schema.org',
    '@graph' => array(
      // WebPage
      array(
        '@type' => 'WebPage',
        '@id' => home_url( '/contact/#webpage' ),
        'url' => home_url( '/contact/' ),
        'name' => 'Contact Local Vocal Marketing | Maryland Web Design & SEO',
        'description' => 'Get in touch with Local Vocal Marketing for Maryland web design, SEO, and digital marketing services. Call us or fill out our contact form.',
        'isPartOf' => array( '@id' => home_url( '#website' ) ),
        'breadcrumb' => array(
          '@type' => 'BreadcrumbList',
          'itemListElement' => array(
            array(
              '@type' => 'ListItem',
              'position' => 1,
              'name' => 'Home',
              'item' => home_url( '/' )
            ),
            array(
              '@type' => 'ListItem',
              'position' => 2,
              'name' => 'Contact',
              'item' => home_url( '/contact/' )
            )
          )
        )
      ),
      
      // Organization (reference)
      array(
        '@type' => 'Organization',
        '@id' => home_url( '#organization' ),
        'name' => 'Local Vocal Marketing',
        'url' => home_url( '/' )
      ),
      
      // Contact Action
      array(
        '@type' => 'ContactPage',
        '@id' => home_url( '/contact/#contactpage' ),
        'url' => home_url( '/contact/' ),
        'mainEntity' => array(
          '@type' => 'ProfessionalService',
          'name' => 'Local Vocal Marketing Contact',
          'description' => 'Contact Maryland web design and SEO agency for a free consultation',
          'provider' => array( '@id' => home_url( '#organization' ) ),
          'contactPoint' => array(
            '@type' => 'ContactPoint',
            'telephone' => '+1-443-852-1000',
            'contactType' => 'customer service',
            'areaServed' => 'US',
            'availableLanguage' => 'English',
            'hoursAvailable' => array(
              '@type' => 'OpeningHoursSpecification',
              'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
              'opens' => '09:00',
              'closes' => '18:00'
            )
          ),
          'potentialAction' => array(
            '@type' => 'CommunicateAction',
            'target' => home_url( '/contact/' ),
            'name' => 'Contact Local Vocal Marketing',
            'description' => 'Fill out our contact form for a free website and SEO review'
          )
        )
      ),
      
      // Local Business contact info
      array(
        '@type' => 'LocalBusiness',
        '@id' => home_url( '/contact/#localbusiness' ),
        'name' => 'Local Vocal Marketing',
        'description' => 'Maryland web design and SEO agency',
        'url' => home_url( '/' ),
        'telephone' => '+1-443-852-1000',
        'address' => array(
          '@type' => 'PostalAddress',
          'addressLocality' => 'Baltimore',
          'addressRegion' => 'MD',
          'addressCountry' => 'US',
          'postalCode' => '21071'
        ),
        'geo' => array(
          '@type' => 'GeoCoordinates',
          'latitude' => '39.2904',
          'longitude' => '-76.6122'
        ),
        'openingHours' => array(
          'Mo-Fr 09:00-18:00'
        ),
        'hasMap' => 'https://maps.google.com/?q=Baltimore+MD+21071',
        'contactPoint' => array(
          '@type' => 'ContactPoint',
          'telephone' => '+1-443-852-1000',
          'contactType' => 'customer service',
          'availableLanguage' => 'English'
        )
      )
    )
  );
}

/**
 * Services page schema - Service catalog
 */
function lvm_get_services_schema() {
  return array(
    '@context' => 'https://schema.org',
    '@graph' => array(
      // WebPage
      array(
        '@type' => 'WebPage',
        '@id' => home_url( '/services/#webpage' ),
        'url' => home_url( '/services/' ),
        'name' => 'Services | Local Vocal Marketing | Maryland Web Design & SEO',
        'description' => 'Complete web design, SEO, content, and social media services for Maryland local businesses',
        'isPartOf' => array( '@id' => home_url( '#website' ) ),
        'breadcrumb' => array(
          '@type' => 'BreadcrumbList',
          'itemListElement' => array(
            array(
              '@type' => 'ListItem',
              'position' => 1,
              'name' => 'Home',
              'item' => home_url( '/' )
            ),
            array(
              '@type' => 'ListItem',
              'position' => 2,
              'name' => 'Services',
              'item' => home_url( '/services/' )
            )
          )
        )
      ),
      
      // Organization (reference)
      array(
        '@type' => 'Organization',
        '@id' => home_url( '#organization' ),
        'name' => 'Local Vocal Marketing',
        'url' => home_url( '/' )
      ),
      
      // Services catalog
      array(
        '@type' => 'Service',
        '@id' => home_url( '/services/#service-catalog' ),
        'name' => 'Web Design & SEO Services',
        'description' => 'Complete digital marketing services for Maryland local businesses',
        'provider' => array( '@id' => home_url( '#organization' ) ),
        'areaServed' => array(
          '@type' => 'Place',
          'name' => 'Maryland, USA'
        ),
        'hasOfferCatalog' => array(
          '@type' => 'OfferCatalog',
          'name' => 'Local Vocal Marketing Services',
          'itemListElement' => array(
            // Web Design
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                '@id' => home_url( '/services/#web-design' ),
                'name' => 'Web Design & Development',
                'description' => 'Custom website development with WordPress, responsive design, and performance optimization',
                'serviceType' => 'Web Development',
                'category' => 'Web Design',
                'provider' => array( '@id' => home_url( '#organization' ) ),
                'areaServed' => 'Maryland',
                'keywords' => array( 'web design', 'website development', 'WordPress', 'responsive design', 'performance optimization' )
              ),
              'price' => '2500-8000',
              'priceCurrency' => 'USD',
              'availability' => 'https://schema.org/InStock',
              'seller' => array( '@id' => home_url( '#organization' ) )
            ),
            
            // Local SEO
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                '@id' => home_url( '/services/#local-seo' ),
                'name' => 'Local SEO Optimization',
                'description' => 'Search engine optimization for local businesses including Google Business Profile, on-page SEO, and local citations',
                'serviceType' => 'SEO Services',
                'category' => 'Search Engine Optimization',
                'provider' => array( '@id' => home_url( '#organization' ) ),
                'areaServed' => 'Maryland',
                'keywords' => array( 'local SEO', 'Google Business Profile', 'citations', 'on-page SEO', 'local search' )
              ),
              'price' => '800-2500',
              'priceCurrency' => 'USD',
              'availability' => 'https://schema.org/InStock',
              'seller' => array( '@id' => home_url( '#organization' ) )
            ),
            
            // Content Marketing
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                '@id' => home_url( '/services/#content-marketing' ),
                'name' => 'Content & Blog Writing',
                'description' => 'SEO-focused blog content and article writing to improve search rankings and engage customers',
                'serviceType' => 'Content Marketing',
                'category' => 'Content Creation',
                'provider' => array( '@id' => home_url( '#organization' ) ),
                'areaServed' => 'Maryland',
                'keywords' => array( 'content marketing', 'blog writing', 'SEO content', 'article writing', 'content creation' )
              ),
              'price' => '500-1500',
              'priceCurrency' => 'USD',
              'availability' => 'https://schema.org/InStock',
              'seller' => array( '@id' => home_url( '#organization' ) )
            ),
            
            // Social Media
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                '@id' => home_url( '/services/#social-media' ),
                'name' => 'Social Media Management',
                'description' => 'Social media presence management including content planning, posting, and community engagement',
                'serviceType' => 'Social Media Marketing',
                'category' => 'Social Media',
                'provider' => array( '@id' => home_url( '#organization' ) ),
                'areaServed' => 'Maryland',
                'keywords' => array( 'social media management', 'content planning', 'community management', 'social media marketing' )
              ),
              'price' => '600-1800',
              'priceCurrency' => 'USD',
              'availability' => 'https://schema.org/InStock',
              'seller' => array( '@id' => home_url( '#organization' ) )
            ),
            
            // Analytics
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                '@id' => home_url( '/services/#analytics' ),
                'name' => 'Analytics & Reporting',
                'description' => 'Website analytics setup and monthly reporting to track performance and ROI',
                'serviceType' => 'Analytics Services',
                'category' => 'Analytics',
                'provider' => array( '@id' => home_url( '#organization' ) ),
                'areaServed' => 'Maryland',
                'keywords' => array( 'analytics', 'reporting', 'Google Analytics', 'performance tracking', 'ROI measurement' )
              ),
              'price' => '400-1200',
              'priceCurrency' => 'USD',
              'availability' => 'https://schema.org/InStock',
              'seller' => array( '@id' => home_url( '#organization' ) )
            ),
            
            // Digital Marketing
            array(
              '@type' => 'Offer',
              'itemOffered' => array(
                '@type' => 'Service',
                '@id' => home_url( '/services/#digital-marketing' ),
                'name' => 'Digital Marketing Strategy',
                'description' => 'Comprehensive digital marketing strategy and campaign management',
                'serviceType' => 'Digital Marketing',
                'category' => 'Marketing Strategy',
                'provider' => array( '@id' => home_url( '#organization' ) ),
                'areaServed' => 'Maryland',
                'keywords' => array( 'digital marketing', 'marketing strategy', 'campaign management', 'online marketing' )
              ),
              'price' => '1000-3000',
              'priceCurrency' => 'USD',
              'availability' => 'https://schema.org/InStock',
              'seller' => array( '@id' => home_url( '#organization' ) )
            )
          )
        )
      )
    )
  );
}

/**
 * Blog/Archive page schema - Blog + BreadcrumbList
 */
function lvm_get_blog_schema() {
  return array(
    '@context' => 'https://schema.org',
    '@graph' => array(
      // WebPage
      array(
        '@type' => 'WebPage',
        '@id' => home_url( '/blog/#webpage' ),
        'url' => home_url( '/blog/' ),
        'name' => 'Blog | Local Vocal Marketing | Maryland SEO & Marketing Insights',
        'description' => 'Digital marketing insights, SEO tips, and web design advice for Maryland local businesses from Local Vocal Marketing experts.',
        'isPartOf' => array( '@id' => home_url( '#website' ) ),
        'breadcrumb' => array(
          '@type' => 'BreadcrumbList',
          'itemListElement' => array(
            array(
              '@type' => 'ListItem',
              'position' => 1,
              'name' => 'Home',
              'item' => home_url( '/' )
            ),
            array(
              '@type' => 'ListItem',
              'position' => 2,
              'name' => 'Blog',
              'item' => home_url( '/blog/' )
            )
          )
        )
      ),
      
      // Organization (reference)
      array(
        '@type' => 'Organization',
        '@id' => home_url( '#organization' ),
        'name' => 'Local Vocal Marketing',
        'url' => home_url( '/' )
      ),
      
      // Blog
      array(
        '@type' => 'Blog',
        '@id' => home_url( '/blog/#blog' ),
        'name' => 'Local Vocal Marketing Blog',
        'description' => 'Digital marketing insights and SEO tips for Maryland local businesses',
        'url' => home_url( '/blog/' ),
        'publisher' => array( '@id' => home_url( '#organization' ) ),
        'inLanguage' => 'en-US',
        'about' => array(
          '@type' => 'Thing',
          'name' => 'Digital Marketing for Local Businesses'
        ),
        'mainEntity' => array(
          '@type' => 'ItemList',
          'name' => 'Latest Blog Posts',
          'description' => 'Recent articles about web design, SEO, and digital marketing',
          'numberOfItems' => 10,
          'itemListElement' => array(
            // Sample blog posts - these would be dynamically generated in a real implementation
            array(
              '@type' => 'BlogPosting',
              'position' => 1,
              'name' => '5 Essential SEO Tips for Maryland Small Businesses',
              'url' => home_url( '/blog/5-essential-seo-tips-maryland-small-businesses/' ),
              'datePublished' => '2024-01-15T10:00:00-05:00',
              'dateModified' => '2024-01-15T10:00:00-05:00',
              'author' => array(
                '@type' => 'Person',
                'name' => 'Haytham Fourati',
                'jobTitle' => 'Website Developer & SEO'
              ),
              'publisher' => array( '@id' => home_url( '#organization' ) ),
              'headline' => '5 Essential SEO Tips for Maryland Small Businesses',
              'description' => 'Learn the key SEO strategies every Maryland local business needs to improve Google rankings and attract more customers.',
              'image' => home_url( '/wp-content/uploads/2024/01/seo-tips-maryland-businesses.jpg' ),
              'about' => array(
                '@type' => 'Thing',
                'name' => 'Local SEO'
              ),
              'keywords' => array( 'SEO', 'Local SEO', 'Maryland', 'Small Business', 'Google Rankings' )
            ),
            array(
              '@type' => 'BlogPosting',
              'position' => 2,
              'name' => 'How Much Should a Website Cost for Maryland Contractors?',
              'url' => home_url( '/blog/website-cost-maryland-contractors/' ),
              'datePublished' => '2024-01-08T14:30:00-05:00',
              'dateModified' => '2024-01-08T14:30:00-05:00',
              'author' => array(
                '@type' => 'Person',
                'name' => 'David Breth',
                'jobTitle' => 'Social Media Manager'
              ),
              'publisher' => array( '@id' => home_url( '#organization' ) ),
              'headline' => 'How Much Should a Website Cost for Maryland Contractors?',
              'description' => 'A detailed breakdown of website costs for Maryland contractors and what to expect from your web design investment.',
              'image' => home_url( '/wp-content/uploads/2024/01/contractor-website-cost.jpg' ),
              'about' => array(
                '@type' => 'Thing',
                'name' => 'Web Design Pricing'
              ),
              'keywords' => array( 'Web Design', 'Contractors', 'Website Cost', 'Maryland', 'Pricing' )
            )
          )
        )
      ),
      
      // CollectionPage (for archive pages)
      array(
        '@type' => 'CollectionPage',
        '@id' => home_url( '/blog/#collection' ),
        'name' => 'Blog Posts Archive',
        'description' => 'Archive of all Local Vocal Marketing blog posts about digital marketing, SEO, and web design',
        'url' => home_url( '/blog/' ),
        'isPartOf' => array( '@id' => home_url( '#website' ) ),
        'hasPart' => array(
          '@type' => 'Blog',
          '@id' => home_url( '/blog/#blog' )
        )
      )
    )
  );
}
