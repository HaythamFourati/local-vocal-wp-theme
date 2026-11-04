<?php
/**
 * The intake questions: one schema drives the pop-up markup, server-side
 * validation and the admin detail view, so they can't drift apart.
 *
 * @package LVM_SEO_Intake
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Status workflow shown in the admin.
 *
 * @return array<string,string>
 */
function lvmi_statuses() {
	return array(
		'new'       => __( 'New', 'lvm-seo-intake' ),
		'contacted' => __( 'Contacted', 'lvm-seo-intake' ),
		'report'    => __( 'Report sent', 'lvm-seo-intake' ),
		'closed'    => __( 'Closed', 'lvm-seo-intake' ),
	);
}

/**
 * Steps and fields. Field types: text, url, email, tel, textarea,
 * choice (one), choices (many).
 *
 * @return array<int,array>
 */
function lvmi_steps() {
	return array(
		array(
			'key'   => 'business',
			'rail'  => __( 'Your business', 'lvm-seo-intake' ),
			'title' => __( 'Tell us about your business', 'lvm-seo-intake' ),
			'lead'  => __( 'So we review the right site against the right competitors.', 'lvm-seo-intake' ),
			'fields' => array(
				'business' => array( 'type' => 'text', 'label' => __( 'Business name', 'lvm-seo-intake' ), 'placeholder' => __( 'e.g. Chesapeake Plumbing Co.', 'lvm-seo-intake' ), 'required' => true, 'half' => true ),
				'website'  => array( 'type' => 'url', 'label' => __( 'Website', 'lvm-seo-intake' ), 'placeholder' => 'yourbusiness.com', 'required' => false, 'half' => true, 'hint' => __( 'Leave blank if you don’t have one yet.', 'lvm-seo-intake' ) ),
				'area'     => array( 'type' => 'text', 'label' => __( 'City or service area', 'lvm-seo-intake' ), 'placeholder' => __( 'e.g. Annapolis & Anne Arundel County', 'lvm-seo-intake' ), 'required' => true ),
				'industry' => array(
					'type'     => 'choice',
					'label'    => __( 'Industry', 'lvm-seo-intake' ),
					'required' => true,
					'options'  => array(
						'home'         => __( 'Home services', 'lvm-seo-intake' ),
						'health'       => __( 'Health & wellness', 'lvm-seo-intake' ),
						'legal'        => __( 'Legal', 'lvm-seo-intake' ),
						'professional' => __( 'Professional services', 'lvm-seo-intake' ),
						'retail'       => __( 'Retail & hospitality', 'lvm-seo-intake' ),
						'other'        => __( 'Something else', 'lvm-seo-intake' ),
					),
				),
			),
		),
		array(
			'key'   => 'goals',
			'rail'  => __( 'Your goals', 'lvm-seo-intake' ),
			'title' => __( 'What would make this a win?', 'lvm-seo-intake' ),
			'lead'  => __( 'Pick everything that applies — we’ll focus the review on it.', 'lvm-seo-intake' ),
			'fields' => array(
				'goals'     => array(
					'type'     => 'choices',
					'label'    => __( 'Goals', 'lvm-seo-intake' ),
					'required' => true,
					'options'  => array(
						'calls'   => __( 'More phone calls', 'lvm-seo-intake' ),
						'maps'    => __( 'Rank in Google Maps', 'lvm-seo-intake' ),
						'website' => __( 'A new website', 'lvm-seo-intake' ),
						'reviews' => __( 'More reviews', 'lvm-seo-intake' ),
						'content' => __( 'Blog & content', 'lvm-seo-intake' ),
						'social'  => __( 'Social media', 'lvm-seo-intake' ),
					),
				),
				'challenge' => array( 'type' => 'textarea', 'label' => __( 'Biggest challenge right now', 'lvm-seo-intake' ), 'placeholder' => __( 'Optional — e.g. “Competitors show up above us for every search in our town.”', 'lvm-seo-intake' ), 'required' => false ),
			),
		),
		array(
			'key'   => 'today',
			'rail'  => __( 'Where you are', 'lvm-seo-intake' ),
			'title' => __( 'Where are things today?', 'lvm-seo-intake' ),
			'lead'  => __( 'No wrong answers. This just helps us size the recommendations.', 'lvm-seo-intake' ),
			'fields' => array(
				'gbp'      => array(
					'type'     => 'choice',
					'label'    => __( 'Do you have a Google Business Profile?', 'lvm-seo-intake' ),
					'required' => true,
					'options'  => array(
						'yes'    => __( 'Yes', 'lvm-seo-intake' ),
						'no'     => __( 'No', 'lvm-seo-intake' ),
						'unsure' => __( 'Not sure', 'lvm-seo-intake' ),
					),
				),
				'budget'   => array(
					'type'     => 'choice',
					'label'    => __( 'Monthly marketing budget', 'lvm-seo-intake' ),
					'required' => true,
					'options'  => array(
						'u500'   => __( 'Under $500', 'lvm-seo-intake' ),
						'500'    => __( '$500 – $1,500', 'lvm-seo-intake' ),
						'1500'   => __( '$1,500 – $3,000', 'lvm-seo-intake' ),
						'3000'   => __( '$3,000+', 'lvm-seo-intake' ),
						'unsure' => __( 'Not sure yet', 'lvm-seo-intake' ),
					),
				),
				'timeline' => array(
					'type'     => 'choice',
					'label'    => __( 'When would you like to start?', 'lvm-seo-intake' ),
					'required' => true,
					'options'  => array(
						'asap'    => __( 'As soon as possible', 'lvm-seo-intake' ),
						'quarter' => __( 'Within 1–3 months', 'lvm-seo-intake' ),
						'explore' => __( 'Just exploring', 'lvm-seo-intake' ),
					),
				),
			),
		),
		array(
			'key'   => 'contact',
			'rail'  => __( 'Your details', 'lvm-seo-intake' ),
			'title' => __( 'Where should we send your review?', 'lvm-seo-intake' ),
			'lead'  => __( 'One of us will reach out within one business day to book your walkthrough.', 'lvm-seo-intake' ),
			'fields' => array(
				'name'         => array( 'type' => 'text', 'label' => __( 'Your name', 'lvm-seo-intake' ), 'placeholder' => __( 'First and last name', 'lvm-seo-intake' ), 'required' => true, 'half' => true, 'autocomplete' => 'name' ),
				'email'        => array( 'type' => 'email', 'label' => __( 'Email', 'lvm-seo-intake' ), 'placeholder' => 'you@business.com', 'required' => true, 'half' => true, 'autocomplete' => 'email' ),
				'phone'        => array( 'type' => 'tel', 'label' => __( 'Phone', 'lvm-seo-intake' ), 'placeholder' => __( 'Optional', 'lvm-seo-intake' ), 'required' => false, 'half' => true, 'autocomplete' => 'tel' ),
				'contact_pref' => array(
					'type'     => 'choice',
					'label'    => __( 'Best way to reach you', 'lvm-seo-intake' ),
					'required' => true,
					'half'     => true,
					'options'  => array(
						'email' => __( 'Email', 'lvm-seo-intake' ),
						'call'  => __( 'Call', 'lvm-seo-intake' ),
						'text'  => __( 'Text', 'lvm-seo-intake' ),
					),
				),
			),
		),
	);
}

/**
 * Flat field map: key => field definition.
 *
 * @return array<string,array>
 */
function lvmi_fields() {
	$out = array();
	foreach ( lvmi_steps() as $step ) {
		$out += $step['fields'];
	}
	return $out;
}

/**
 * Human-readable value for the admin and the notification email.
 *
 * @param array $field Field definition.
 * @param mixed $value Stored value.
 * @return string
 */
function lvmi_display_value( $field, $value ) {
	if ( 'choices' === $field['type'] ) {
		$labels = array();
		foreach ( (array) $value as $v ) {
			$labels[] = $field['options'][ $v ] ?? $v;
		}
		return implode( ', ', $labels );
	}
	if ( 'choice' === $field['type'] ) {
		return $field['options'][ $value ] ?? (string) $value;
	}
	return (string) $value;
}
