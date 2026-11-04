<?php
/**
 * SEO data: the one place that says who we are and what each page targets.
 *
 * - lvm_business(): name, address, phone, hours, areas. Must match what the
 *   site shows (contact page, footer) — Google cross-checks NAP everywhere.
 * - lvm_seo_pages(): per page slug → title, description, schema hints, FAQs.
 *   Titles ~50–60 chars, descriptions ~140–160, one primary keyword per page.
 *   FAQs render visibly (template-parts/faq.php) AND feed FAQPage schema, so
 *   markup and page can never disagree.
 *
 * Edit copy here, not in the templates.
 *
 * @package Local_Vocal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Canonical business facts (NAP + hours + service area).
 *
 * @return array
 */
function lvm_business() {
	return array(
		'name'        => 'Local Vocal Marketing',
		'alt_name'    => 'Local Vocal',
		'description' => 'Maryland web design and local SEO agency for small and service businesses in Baltimore, Anne Arundel County and across Maryland.',
		'founded'     => '2010',
		'phone'       => '+1-443-852-1000',
		'phone_human' => '(443) 852-1000',
		'email'       => 'info@localvocalmarketing.com',
		'street'      => '209 Central Ave',
		'city'        => 'Glyndon',
		'region'      => 'MD',
		'zip'         => '21071',
		'country'     => 'US',
		'lat'         => 39.4836, // as shown on the contact page's field card
		'lng'         => -76.8236,
		'map'         => 'https://maps.app.goo.gl/eio3U1s7NzCkutyf8',
		'hours'       => array( 'days' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ), 'opens' => '09:00', 'closes' => '18:00' ),
		// Only profiles confirmed to exist. Add LinkedIn, Google Business Profile, Yelp, Clutch… as they're verified.
		'same_as'     => array( 'https://www.facebook.com/localvocalmarketing' ),
		// Places with a dedicated page (plus the counties and state they sit in).
		'areas'       => array(
			array( 'City', 'Baltimore', 'https://en.wikipedia.org/wiki/Baltimore' ),
			array( 'City', 'Annapolis', 'https://en.wikipedia.org/wiki/Annapolis,_Maryland' ),
			array( 'City', 'Severna Park', 'https://en.wikipedia.org/wiki/Severna_Park,_Maryland' ),
			array( 'City', 'Glen Burnie', 'https://en.wikipedia.org/wiki/Glen_Burnie,_Maryland' ),
			array( 'City', 'Easton', 'https://en.wikipedia.org/wiki/Easton,_Maryland' ),
			array( 'City', 'Ocean City', 'https://en.wikipedia.org/wiki/Ocean_City,_Maryland' ),
			array( 'AdministrativeArea', 'Baltimore County', 'https://en.wikipedia.org/wiki/Baltimore_County,_Maryland' ),
			array( 'AdministrativeArea', 'Anne Arundel County', 'https://en.wikipedia.org/wiki/Anne_Arundel_County,_Maryland' ),
			array( 'State', 'Maryland', 'https://en.wikipedia.org/wiki/Maryland' ),
		),
		'knows_about' => array( 'Local SEO', 'Web design', 'WordPress development', 'Google Business Profile optimization', 'Technical SEO', 'Content marketing', 'Social media management', 'Marketing analytics', 'Schema markup' ),
	);
}

/**
 * Per-page SEO. Keys are page slugs; 'home' and 'blog' are special.
 * schema: 'service' => [name, serviceType], 'city' => key into areas, 'audience' => who it's for.
 *
 * @return array
 */
function lvm_seo_pages() {
	return array(
		'home'                    => array(
			'title' => 'Maryland Web Design & Local SEO Agency | Local Vocal Marketing',
			'desc'  => 'Maryland web design and local SEO agency serving Baltimore and beyond. Fast websites, Google Maps rankings and more calls. Get a free website & SEO review.',
			'faqs'  => array(
				array( 'Why does a local business need SEO?', "Most customers find local services through Google. If your business doesn't appear when someone searches for what you do in your city, you're invisible to people ready to buy. Local SEO makes you visible to the right people, in the right place, at the right moment." ),
				array( 'How does web design affect Google rankings?', "A lot. Page speed, mobile experience, clear headings, semantic structure, internal linking, and crawlable content are all design decisions Google evaluates. A pretty site with broken structure can rank worse than a plain site that's built right." ),
				array( 'What is local SEO?', "Local SEO is the set of practices that helps your business appear in location‑based searches — the map pack, 'near me' results, and city‑specific queries. It combines Google Business Profile optimization, on‑page SEO, service‑area pages, citations, and review velocity." ),
				array( 'How often should a business publish blog articles?', 'For most local businesses, 2–4 high‑quality SEO‑focused posts per month is a healthy pace. Consistency matters more than volume — and posts that target real customer questions outperform a flood of generic content.' ),
				array( 'Can blog posts help my business rank locally?', "Yes. Blog content built around customer questions and local topics supports your service pages, earns long‑tail traffic, and signals to Google that you're an authority on your subject and your service area." ),
				array( 'Do you work with businesses outside Maryland?', "Yes. We're based in Glyndon, Maryland and most of our clients are in Baltimore and across the state, but we work with service businesses across the U.S. Local SEO principles are the same whether you're in Annapolis or Austin." ),
				array( 'What makes a website SEO‑friendly?', 'Fast page speed, mobile‑first layout, clean URL structure, semantic HTML, proper heading hierarchy, optimized metadata, schema markup, internal linking, and unique, useful content on every page. We build with all of this from the start.' ),
				array( 'How long does SEO take to work?', "Most clients see meaningful movement in 3–6 months and real compounding in 6–12. SEO is not a quick win — it's a long‑term investment that becomes harder for competitors to displace the longer you stick with it." ),
				array( 'Do small businesses need social media?', "Not for sales alone, but yes for trust. A quiet social presence makes customers wonder if you're still open. Consistent posting — even a few times a month — keeps you visible and supports your other marketing." ),
				array( 'Can you update and support an existing website?', "Absolutely. Many of our clients come to us with an existing site that needs SEO, content, performance, or design improvements — not a full rebuild. We'll review what you have and recommend the smallest change that creates the biggest result." ),
			),
		),
		'services'                => array(
			'title' => 'Web Design, SEO & Marketing Services in Maryland | Local Vocal',
			'desc'  => 'Website design, local SEO, blog content, social media, analytics and digital marketing for Baltimore and Maryland small businesses. Compare every service.',
		),
		'about-us'                => array(
			'title' => 'About Local Vocal Marketing | Maryland Web Design & SEO Team',
			'desc'  => 'Meet the three-person Glyndon, MD team behind Local Vocal Marketing: web design and local SEO for Baltimore and Maryland service businesses since 2010.',
		),
		'contact'                 => array(
			'title' => 'Contact Local Vocal Marketing | Glyndon, MD Web Design & SEO',
			'desc'  => 'Call (443) 852-1000 or request a free website & SEO review. Local Vocal Marketing, 209 Central Ave, Glyndon, MD 21071, serving Baltimore and all of Maryland.',
			'faq_h' => array( 'Before you', 'reach out.' ),
			'faqs'  => array(
				array( 'What happens after I send the form?', 'One of us reads it the same business day and replies within one business day to book a 30-minute walkthrough at a time that suits you. On the call we review your site and local search results with you, on screen.' ),
				array( 'Is the website & SEO review really free?', "Yes. The walkthrough and the written report are free, with no obligation and no pitch deck. The report lists the fixes in order, so you can act on it yourself, with another provider, or with us." ),
				array( 'How quickly will you get back to me?', 'Within one business day, Monday to Friday, 9am to 6pm Eastern. If it is urgent, call (443) 852-1000 and you will reach one of the team directly, not a call center.' ),
				array( 'Do I need to prepare anything for the call?', "No. Your website address, your main services, and the areas you serve are enough. If you have Google Business Profile or Google Analytics access, it helps, but it's never required for the first review." ),
				array( 'Can we meet in person?', 'Yes. Our studio is at 209 Central Ave in Glyndon, MD, about half an hour from Baltimore, and meetings there are by appointment. Most clients meet by video call, and we work with businesses across Maryland and the U.S.' ),
				array( 'How does pricing work after the review?', 'You get one flat price for the scope we recommend, before any work starts. Most clients choose a monthly plan for SEO and content; website builds are quoted as a project. Nothing is billed without your approval.' ),
			),
		),
		'blog'                    => array(
			'title' => 'Local SEO & Web Design Blog for Maryland Businesses | Local Vocal',
			'desc'  => 'Practical local SEO, Google Business Profile and web design advice for Baltimore and Maryland small businesses, from the Local Vocal Marketing team.',
		),

		/* ---------- Services ---------- */
		'development'             => array(
			'title'  => 'Website Design in Baltimore & Maryland | Local Vocal Marketing',
			'desc'   => 'Custom, mobile-first WordPress website design for Baltimore and Maryland businesses: fast, SEO-ready, and built to turn visitors into calls. Free project review.',
			'schema' => array( 'service' => array( 'Website Design', 'Web design' ) ),
			'faq_h'  => array( 'Website design', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How much does a website cost for a small business in Maryland?', 'It depends on size and features. A focused marketing site costs far less than a full WordPress build with booking, CRM, or custom integrations. We give one flat price after a short call, so you know the full cost before anything starts.' ),
				array( 'How long does it take to build a new website?', 'Most small-business sites launch in about two to six weeks. A focused 5–8 page site is at the short end; larger builds with location pages, integrations, or content migration take longer. We share a real timeline before work begins.' ),
				array( 'Will my new website be built for SEO?', 'Yes. Every site ships with fast loading, mobile-first layouts, a clean heading structure, page titles and descriptions, schema markup, and service and location pages. SEO is built in from the first page, not bolted on after launch.' ),
			),
		),
		'seo-optimization'        => array(
			'title'  => 'Local SEO Services in Baltimore & Maryland | Local Vocal Marketing',
			'desc'   => 'Local SEO for Baltimore and Maryland businesses: Google Business Profile, map-pack rankings, on-page and technical SEO, citations and reviews. Free SEO audit.',
			'schema' => array( 'service' => array( 'Local SEO', 'Search engine optimization' ) ),
			'faq_h'  => array( 'Local SEO', 'questions, answered.' ),
			'faqs'   => array(
				array( 'What does a local SEO service include?', 'Google Business Profile optimization, on-page SEO for your service and location pages, technical fixes for speed and crawlability, consistent citations across directories, a steady review process, and monthly reporting on rankings, calls, and form fills.' ),
				array( 'How do I get my business into the Google Maps 3-pack?', "Google ranks map results on relevance, distance, and prominence. You improve them with a complete, accurate Business Profile, the right categories, consistent name, address, and phone everywhere, regular reviews, and a website whose pages match what you're listed for." ),
				array( 'How long does local SEO take to show results?', 'Most businesses see meaningful movement in three to six months, with stronger gains over six to twelve. Competitive Baltimore terms take longer than smaller towns. Fixing technical issues and your Business Profile often produces the earliest wins.' ),
			),
		),
		'content-creation'        => array(
			'title'  => 'SEO Blog Writing Services in Maryland | Local Vocal Marketing',
			'desc'   => 'SEO blog articles for Baltimore and Maryland service businesses, built on real customer questions and service keywords, written to rank. Free content plan.',
			'schema' => array( 'service' => array( 'SEO Blog Writing', 'Content marketing' ) ),
			'faq_h'  => array( 'SEO content', 'questions, answered.' ),
			'faqs'   => array(
				array( 'Do blog posts actually help a local business rank?', 'Yes, when they answer real customer questions and link to your service pages. Helpful articles earn long-tail searches, build topical authority in your service area, and give Google more reasons to trust your business for related searches.' ),
				array( 'How many blog posts should a small business publish?', 'For most local businesses, two to four quality posts a month is a healthy pace. Consistency and usefulness matter more than volume. One well-researched article that answers a real question beats several thin posts.' ),
				array( 'Who writes the articles?', 'Our team researches and writes every article in plain English, around your services, service area, and the questions your customers ask. You review and approve each post before it goes live, so it always sounds like your business.' ),
			),
		),
		'social-media-management' => array(
			'title'  => 'Social Media Management in Maryland | Local Vocal Marketing',
			'desc'   => 'Consistent social media management for Baltimore and Maryland businesses: Facebook, Instagram, LinkedIn and Google Business Profile posts that build trust.',
			'schema' => array( 'service' => array( 'Social Media Management', 'Social media marketing' ) ),
			'faq_h'  => array( 'Social media', 'questions, answered.' ),
			'faqs'   => array(
				array( 'Which social media platforms should a local business use?', 'Usually Facebook and your Google Business Profile, plus Instagram if your work is visual, and LinkedIn if you sell to other businesses. It is better to post consistently on two channels than to neglect five.' ),
				array( 'How often should a local business post on social media?', 'Three to four posts a week per main platform is a sustainable pace for most local businesses. A predictable schedule of service highlights, reviews, behind-the-scenes, and seasonal posts keeps you visible without burning anyone out.' ),
				array( 'Does social media help local SEO?', 'Indirectly. Social posts are not a ranking factor on their own, but Google Business Profile posts, shared blog articles, and an active presence build trust, earn branded searches, and send visitors who often become calls.' ),
			),
		),
		'analytics-reporting'     => array(
			'title'  => 'SEO Reporting & Analytics in Maryland | Local Vocal Marketing',
			'desc'   => 'GA4, call tracking and plain-English monthly SEO reports for Baltimore and Maryland businesses. See which searches turn into calls and booked jobs.',
			'schema' => array( 'service' => array( 'SEO Reporting & Analytics', 'Marketing analytics' ) ),
			'faq_h'  => array( 'Analytics &amp; reporting', 'questions, answered.' ),
			'faqs'   => array(
				array( 'What should a monthly SEO report include?', 'Rankings for your priority searches, Google Business Profile views and actions, website traffic from organic search, and, most importantly, phone calls, form fills, and bookings with where they came from, plus a short note on what changed and what happens next.' ),
				array( 'Can you track phone calls from Google?', 'Yes. Call tracking and Google Business Profile insights show how many calls come from search, maps, and your website, so you can see which keywords and pages actually make the phone ring, not just which ones get clicks.' ),
				array( 'Do I need Google Analytics 4?', 'Yes. GA4 is the current version of Google Analytics. We set it up with conversion tracking for calls, forms, and bookings, connect Search Console, and turn the data into a one-page monthly report in plain English.' ),
			),
		),
		'digital-marketing'       => array(
			'title'  => 'Digital Marketing Agency in Maryland | Local Vocal Marketing',
			'desc'   => 'One coordinated digital marketing plan for Baltimore and Maryland businesses: local SEO, content, social and paid search tied to calls, forms and booked jobs.',
			'schema' => array( 'service' => array( 'Digital Marketing', 'Digital marketing' ) ),
			'faq_h'  => array( 'Digital marketing', 'questions, answered.' ),
			'faqs'   => array(
				array( 'What does a digital marketing agency do for a local business?', 'It plans and runs the channels that bring you customers online, usually local SEO, website, content, social media, and paid search, and ties them to one goal: more calls, form fills, and booked jobs from your service area.' ),
				array( 'Should a small business start with SEO or paid ads?', 'Usually SEO and a strong website first, because they compound over time. Paid ads such as Google Local Services Ads are useful for quick wins, seasonal peaks, or new locations while organic rankings build.' ),
				array( 'How do you measure if digital marketing is working?', 'By the results that matter to you: calls, form submissions, bookings, and cost per qualified lead, tracked by channel. Every month you see what each channel produced and where the budget should go next.' ),
			),
		),

		/* ---------- Cities ---------- */
		'baltimore'               => array(
			'title'  => 'Baltimore SEO Company & Web Design | Local Vocal Marketing',
			'desc'   => 'Baltimore SEO and web design for local businesses: Google Maps rankings, neighborhood pages and fast websites that turn Baltimore searches into calls. Free audit.',
			'schema' => array( 'service' => array( 'Baltimore SEO & Web Design', 'Local SEO' ), 'city' => 'Baltimore' ),
			'faq_h'  => array( 'Baltimore SEO', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do I rank my business on Google in Baltimore?', 'Start with a complete Google Business Profile and a fast website with a dedicated page for each service. Then add pages for the Baltimore neighborhoods you serve, keep your name, address, and phone consistent everywhere, and earn steady reviews.' ),
				array( 'Is SEO in Baltimore more competitive than in smaller Maryland towns?', 'Yes. Baltimore has more businesses competing for the same searches, so it takes stronger content, more reviews, and better technical SEO to win the map pack. Targeting specific neighborhoods and services is often the fastest way in.' ),
				array( 'Do you work with businesses in Baltimore City and Baltimore County?', 'Yes. We are based in Glyndon in Baltimore County and work with businesses across Baltimore City and the county, including Towson, Owings Mills, Catonsville, and Reisterstown, as well as the rest of Maryland.' ),
			),
		),
		'annapolis'               => array(
			'title'  => 'Annapolis SEO & Web Design | Local Vocal Marketing',
			'desc'   => 'Annapolis SEO and web design for local businesses: rank in Google Maps for Annapolis searches, from Eastport to downtown, and turn visitors into calls. Free audit.',
			'schema' => array( 'service' => array( 'Annapolis SEO & Web Design', 'Local SEO' ), 'city' => 'Annapolis' ),
			'faq_h'  => array( 'Annapolis SEO', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do Annapolis businesses rank higher on Google?', 'With an optimized Google Business Profile, a website page for each service, content that matches how Annapolis customers search, including neighborhood and waterfront terms, consistent listings, and a steady flow of reviews.' ),
				array( 'Does tourism affect SEO for Annapolis businesses?', 'Yes. Search volume for many Annapolis services rises in spring and summer. Planning content and Google Business Profile posts ahead of the busy season helps you rank before visitors start searching.' ),
				array( 'Do you serve all of Anne Arundel County?', 'Yes. Along with Annapolis, we work with businesses in Severna Park, Glen Burnie, Arnold, Crofton, and across Anne Arundel County.' ),
			),
		),
		'severna-park'            => array(
			'title'  => 'Severna Park SEO & Web Design | Local Vocal Marketing',
			'desc'   => 'Severna Park SEO and web design for local businesses: win Google Maps searches in this competitive Anne Arundel suburb and turn them into calls. Free SEO audit.',
			'schema' => array( 'service' => array( 'Severna Park SEO & Web Design', 'Local SEO' ), 'city' => 'Severna Park' ),
			'faq_h'  => array( 'Severna Park SEO', 'questions, answered.' ),
			'faqs'   => array(
				array( 'Why is local SEO competitive in Severna Park?', 'Severna Park customers can choose from businesses in Annapolis, Arnold, and Pasadena too, so Google weighs relevance, reviews, and distance heavily. A focused Business Profile and service pages that mention Severna Park help you stand out.' ),
				array( 'How can a Severna Park business get more reviews?', 'Ask every happy customer at the right moment with a direct review link by text or email, make it quick, and respond to every review. A steady flow matters more to Google than a burst all at once.' ),
				array( 'Do you work with businesses near Severna Park?', 'Yes. We serve Severna Park and nearby Arnold, Pasadena, Millersville, and the rest of Anne Arundel County.' ),
			),
		),
		'glen-burnie'             => array(
			'title'  => 'Glen Burnie SEO & Web Design | Local Vocal Marketing',
			'desc'   => 'Glen Burnie SEO and web design for local businesses: capture high-volume Glen Burnie searches in Google Maps and turn them into calls and bookings. Free SEO audit.',
			'schema' => array( 'service' => array( 'Glen Burnie SEO & Web Design', 'Local SEO' ), 'city' => 'Glen Burnie' ),
			'faq_h'  => array( 'Glen Burnie SEO', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do Glen Burnie businesses show up in Google Maps?', 'Claim and complete your Google Business Profile with the right categories, hours, and photos, keep your name, address, and phone consistent everywhere, earn regular reviews, and link your profile to a website page for each service.' ),
				array( "What's the best way to compete with bigger brands in Glen Burnie?", 'Win on relevance and trust. Specific service pages, genuine local reviews, fast responses, and content about the questions your customers ask often outrank larger competitors with generic, statewide pages.' ),
				array( 'Do you work with businesses near BWI and Linthicum?', 'Yes. We serve Glen Burnie, Linthicum, Pasadena, Odenton, and the surrounding parts of Anne Arundel County.' ),
			),
		),
		'easton'                  => array(
			'title'  => 'Easton, MD SEO & Web Design | Local Vocal Marketing',
			'desc'   => 'Easton and Eastern Shore SEO and web design for local businesses: rank in Google Maps across Talbot County and turn searches into calls. Free SEO audit.',
			'schema' => array( 'service' => array( 'Easton SEO & Web Design', 'Local SEO' ), 'city' => 'Easton' ),
			'faq_h'  => array( 'Easton SEO', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do Eastern Shore businesses rank on Google?', 'With a complete Google Business Profile, a website that clearly names the towns you serve, pages for each service, consistent listings, and steady reviews. Searches cover wider distances on the Shore, so clear service-area information matters.' ),
				array( 'Is local SEO worth it in a smaller market like Easton?', 'Yes. Smaller markets often have fewer businesses doing SEO well, so a strong profile and website can reach the top of the map pack faster than in Baltimore, and stay there with consistent upkeep.' ),
				array( 'Do you serve all of Talbot County and the Mid-Shore?', 'Yes. We work with businesses in Easton, St. Michaels, Oxford, Cambridge, and across the Mid-Shore.' ),
			),
		),
		'ocean-city'              => array(
			'title'  => 'Ocean City, MD SEO & Web Design | Local Vocal Marketing',
			'desc'   => 'Ocean City SEO and web design for local businesses: plan for the summer search peak, rank in Google Maps and turn visitors into bookings. Free SEO audit.',
			'schema' => array( 'service' => array( 'Ocean City SEO & Web Design', 'Local SEO' ), 'city' => 'Ocean City' ),
			'faq_h'  => array( 'Ocean City SEO', 'questions, answered.' ),
			'faqs'   => array(
				array( 'When should Ocean City businesses start SEO for summer?', 'Early in the year. Rankings take months to build, so work done in winter and early spring pays off when visitors start searching in late spring. Updating your Google Business Profile hours and photos before the season also helps.' ),
				array( "How do I rank for 'near me' searches in Ocean City?", 'Keep your Google Business Profile complete and accurate, with correct hours, categories, and photos. Make sure your website loads fast on phones and that your address and phone match everywhere. Most visitor searches happen on mobile.' ),
				array( 'Do you work with businesses in Berlin and Worcester County?', 'Yes. We serve Ocean City, Berlin, West Ocean City, and the rest of Worcester County.' ),
			),
		),

		/* ---------- Industries ---------- */
		'hvac'                    => array(
			'title'  => 'HVAC SEO & Marketing in Maryland | Local Vocal Marketing',
			'desc'   => 'HVAC SEO and marketing for Maryland heating and cooling companies: rank for emergency AC and furnace searches, win the map pack and book more calls.',
			'schema' => array( 'service' => array( 'HVAC SEO & Marketing', 'Local SEO' ), 'audience' => 'HVAC companies' ),
			'faq_h'  => array( 'HVAC marketing', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do HVAC companies get more calls from Google?', 'By ranking in the map pack for searches like "AC repair near me", with a complete Google Business Profile, a page for each service and town you cover, fast mobile pages with click-to-call, and a steady flow of reviews.' ),
				array( 'Should HVAC companies use Google Local Services Ads?', 'Often, yes. Local Services Ads appear above regular results and you pay per lead, which suits emergency calls. They work best alongside strong SEO, which keeps bringing in calls without paying for each one.' ),
				array( 'When should an HVAC company invest in SEO?', 'Before the seasonal rush. Rankings take months to build, so start in the off-season to be visible when the first heat wave or cold snap sends people searching.' ),
			),
		),
		'contractors'             => array(
			'title'  => 'Contractor SEO & Marketing in Maryland | Local Vocal Marketing',
			'desc'   => 'SEO and marketing for Maryland contractors and home-service pros: rank for your trade in your towns, show your work and keep your crews booked.',
			'schema' => array( 'service' => array( 'Contractor SEO & Marketing', 'Local SEO' ), 'audience' => 'Contractors and home-service businesses' ),
			'faq_h'  => array( 'Contractor marketing', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do contractors get more leads online?', 'Rank in Google Maps for your trade in the towns you serve, show real project photos and reviews, and make it easy to request a quote from a phone. A page for each service and service area gives Google and homeowners clear answers.' ),
				array( 'Do project photos help contractor SEO?', 'Yes. Recent before-and-after photos on your Google Business Profile and website build trust, keep your profile active, and help homeowners choose you, especially when they are labeled with the service and town.' ),
				array( 'How do contractors compete with lead-generation sites?', 'Own your brand and service-area searches with your own pages and reviews, so customers call you directly instead of paying a middleman for every lead.' ),
			),
		),
		'dentists'                => array(
			'title'  => 'Dental SEO & Marketing in Maryland | Local Vocal Marketing',
			'desc'   => 'Dental SEO and marketing for Maryland practices: rank for "dentist near me", win the map pack, earn patient reviews and fill your schedule.',
			'schema' => array( 'service' => array( 'Dental SEO & Marketing', 'Local SEO' ), 'audience' => 'Dental practices' ),
			'faq_h'  => array( 'Dental marketing', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do dentists rank for "dentist near me"?', 'With a complete Google Business Profile using the right categories, accurate hours and insurance information, regular patient reviews, and a website with pages for each treatment you offer.' ),
				array( 'Do patient reviews help dental SEO?', 'Yes. Review count, rating, and recency all influence map rankings and patient trust. A simple, compliant follow-up after appointments keeps reviews coming in steadily.' ),
				array( 'Should a dental practice have a page for each treatment?', 'Yes. Separate pages for services like implants, Invisalign, emergency dentistry, and pediatric care match how patients search and help each treatment rank on its own.' ),
			),
		),
		'home-care'               => array(
			'title'  => 'Home Care Marketing & SEO in Maryland | Local Vocal Marketing',
			'desc'   => 'SEO and marketing for Maryland home care agencies: help families find you when they search for in-home care, and recruit caregivers too.',
			'schema' => array( 'service' => array( 'Home Care Marketing & SEO', 'Local SEO' ), 'audience' => 'Home care agencies' ),
			'faq_h'  => array( 'Home care marketing', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do families search for home care agencies?', 'Usually on Google, with searches like "in-home care near me" or "senior care in" plus their town, often on a phone and often in a hurry. Ranking in the map pack with clear, trustworthy pages is what puts you on their shortlist.' ),
				array( 'What builds trust on a home care website?', 'Clear licensing and certification details, real photos of your team, genuine reviews from families, transparent service descriptions, and an easy way to call and speak with a person.' ),
				array( 'Can SEO help with caregiver recruiting?', 'Yes. A dedicated careers page that targets local caregiver job searches, with clear pay and benefits information, brings in applicants alongside new clients.' ),
			),
		),
		'law-firms'               => array(
			'title'  => 'Law Firm SEO & Marketing in Maryland | Local Vocal Marketing',
			'desc'   => 'SEO and marketing for Maryland law firms: rank for your practice areas in your county, build trust with clear attorney pages and bring in qualified leads.',
			'schema' => array( 'service' => array( 'Law Firm SEO & Marketing', 'Local SEO' ), 'audience' => 'Law firms' ),
			'faq_h'  => array( 'Law firm marketing', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do law firms rank higher on Google?', 'With a dedicated page for each practice area and the counties you serve, detailed attorney bios, a complete Google Business Profile, steady client reviews, and helpful articles that answer the questions potential clients ask.' ),
				array( 'Is SEO worth it for a small law firm?', 'Yes. Legal clicks are expensive in paid search, so ranking organically for practice-area and location searches can bring in qualified cases at a much lower cost over time.' ),
				array( 'How long does law firm SEO take?', 'Legal searches are competitive, so expect three to six months for early movement and longer for top positions on the most competitive practice areas. Smaller counties and niche practice areas move faster.' ),
			),
		),
		'auto-glass'              => array(
			'title'  => 'Auto Glass SEO & Marketing in Maryland | Local Vocal Marketing',
			'desc'   => 'SEO and marketing for Maryland auto glass shops: rank for windshield repair and replacement searches, win mobile-service calls and insurance jobs.',
			'schema' => array( 'service' => array( 'Auto Glass SEO & Marketing', 'Local SEO' ), 'audience' => 'Auto glass businesses' ),
			'faq_h'  => array( 'Auto glass marketing', 'questions, answered.' ),
			'faqs'   => array(
				array( 'How do auto glass shops get more calls from Google?', 'By ranking in the map pack for "windshield repair near me" and similar searches, with a complete Business Profile, a page for each service and area, fast mobile pages, and clear information about mobile service and insurance.' ),
				array( 'Should auto glass businesses mention insurance on their website?', 'Yes. Many customers search for insurance-covered windshield replacement. Explaining how claims work and which insurers you work with answers their first question and builds trust.' ),
				array( 'Does mobile service help auto glass SEO?', 'It helps you reach a wider service area. Listing the towns you cover on your Business Profile and website lets you show up for customers who need you to come to them.' ),
			),
		),

		'website-crm-offer'       => array(
			'title' => 'Websites for Maryland Trades from $97/mo | Local Vocal Marketing',
			'desc'  => 'A custom website, hosting, security and CRM for Maryland trades in one monthly plan. No contracts, no tech stress. Built to turn Google searches into calls.',
		),
	);
}

/**
 * Pages that must stay out of Google: slug => canonical target ('' = just noindex).
 * Duplicates point at the real page; utility and client pages are noindexed.
 * Safety net only — unpublish these in WordPress when you can.
 *
 * @return array<string,string>
 */
function lvm_seo_noindex() {
	return array(
		'seo-optimization-2'                     => '/seo-optimization/', // duplicate of the SEO service page
		'new-front-page'                         => '/',                  // duplicate of the homepage
		'sample-page'                            => '',                   // WordPress default
		'sample-page-2'                          => '',
		'payment-page'                           => '',
		'intake-form'                            => '',
		'scotts-gunsmithing-website-initial-audit' => '',               // client deliverable, not for search
	);
}

/**
 * SEO entry for the current request (or a given key).
 *
 * @param string|null $key Page key; defaults to the current page.
 * @return array|null
 */
function lvm_seo_current( $key = null ) {
	if ( null === $key ) {
		if ( is_front_page() ) {
			$key = 'home';
		} elseif ( is_home() ) {
			$key = 'blog';
		} elseif ( is_page() ) {
			$key = get_post_field( 'post_name', get_queried_object_id() );
		} else {
			return null;
		}
	}
	$pages = lvm_seo_pages();
	return isset( $pages[ $key ] ) ? $pages[ $key ] + array( 'key' => $key ) : null;
}
