<?php
/**
 * Schema / JSON-LD Structured Data
 *
 * Adds customizer settings and outputs JSON-LD for improved SEO.
 * Pattern: webok schema system
 */

/**
 * Register Customizer Settings for Schema
 */
function chew_schema_customizer_register( $wp_customize ) {

    // Add Schema Section
    $wp_customize->add_section( 'chew_schema_section', array(
        'title'       => __( 'Schema / SEO', 'chewonthis' ),
        'description' => __( 'Configure structured data (JSON-LD) for improved search engine visibility.', 'chewonthis' ),
        'priority'    => 35,
    ) );

    // ========================================
    // Enable/Disable Controls
    // ========================================

    // Enable Organization Schema (Sitewide)
    $wp_customize->add_setting( 'chew_schema_org_enable', array(
        'default'           => true,
        'sanitize_callback' => 'chew_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'chew_schema_org_enable', array(
        'label'       => __( 'Enable Organization Schema (Sitewide)', 'chewonthis' ),
        'description' => __( 'Output Organization schema on every page.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'checkbox',
    ) );

    // Enable Product Schema (Single Tours)
    $wp_customize->add_setting( 'chew_schema_tour_product_enable', array(
        'default'           => true,
        'sanitize_callback' => 'chew_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'chew_schema_tour_product_enable', array(
        'label'       => __( 'Enable Product Schema (Experiences)', 'chewonthis' ),
        'description' => __( 'Output Product schema on individual experience pages.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'checkbox',
    ) );

    // Enable Event Schema (Single Tours with dates)
    $wp_customize->add_setting( 'chew_schema_tour_event_enable', array(
        'default'           => true,
        'sanitize_callback' => 'chew_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'chew_schema_tour_event_enable', array(
        'label'       => __( 'Enable Event Schema (Experiences)', 'chewonthis' ),
        'description' => __( 'Output Event schema on experiences with scheduled public dates.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'checkbox',
    ) );

    // Enable FAQ Schema (Single Tours with FAQs)
    $wp_customize->add_setting( 'chew_schema_tour_faq_enable', array(
        'default'           => true,
        'sanitize_callback' => 'chew_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'chew_schema_tour_faq_enable', array(
        'label'       => __( 'Enable FAQ Schema (Experiences)', 'chewonthis' ),
        'description' => __( 'Output FAQPage schema on experiences that have FAQs.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'checkbox',
    ) );

    // Enable Homepage Schema
    $wp_customize->add_setting( 'chew_schema_homepage_enable', array(
        'default'           => true,
        'sanitize_callback' => 'chew_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'chew_schema_homepage_enable', array(
        'label'       => __( 'Enable Homepage Schema', 'chewonthis' ),
        'description' => __( 'Output TourOperator schema on the homepage.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'checkbox',
    ) );

    // Enable About Page Schema
    $wp_customize->add_setting( 'chew_schema_about_enable', array(
        'default'           => true,
        'sanitize_callback' => 'chew_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'chew_schema_about_enable', array(
        'label'       => __( 'Enable About Page Schema', 'chewonthis' ),
        'description' => __( 'Output AboutPage schema on the about page.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'checkbox',
    ) );

    // Enable Contact Page Schema
    $wp_customize->add_setting( 'chew_schema_contact_enable', array(
        'default'           => true,
        'sanitize_callback' => 'chew_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'chew_schema_contact_enable', array(
        'label'       => __( 'Enable Contact Page Schema', 'chewonthis' ),
        'description' => __( 'Output ContactPage schema on the contact page.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'checkbox',
    ) );

    // Enable Tours Archive Schema
    $wp_customize->add_setting( 'chew_schema_archive_enable', array(
        'default'           => true,
        'sanitize_callback' => 'chew_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'chew_schema_archive_enable', array(
        'label'       => __( 'Enable Experiences Archive Schema', 'chewonthis' ),
        'description' => __( 'Output CollectionPage schema on the experiences archive.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'checkbox',
    ) );

    // Enable Privacy Policy Schema
    $wp_customize->add_setting( 'chew_schema_privacy_enable', array(
        'default'           => true,
        'sanitize_callback' => 'chew_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'chew_schema_privacy_enable', array(
        'label'       => __( 'Enable Privacy Policy Schema', 'chewonthis' ),
        'description' => __( 'Output WebPage schema on the privacy policy page.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'checkbox',
    ) );

    // ========================================
    // Business Information
    // ========================================

    // Business Name
    $wp_customize->add_setting( 'chew_business_name', array(
        'default'           => 'Chew On This Tasty Tours',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'chew_business_name', array(
        'label'   => __( 'Business Name', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'text',
    ) );

    // Business URL
    $wp_customize->add_setting( 'chew_business_url', array(
        'default'           => home_url( '/' ),
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'chew_business_url', array(
        'label'   => __( 'Business URL', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'url',
    ) );

    // Business Logo
    $wp_customize->add_setting( 'chew_business_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chew_business_logo', array(
        'label'       => __( 'Business Logo', 'chewonthis' ),
        'description' => __( 'Recommended: 112x112px minimum, ideally 1200px wide.', 'chewonthis' ),
        'section'     => 'chew_schema_section',
    ) ) );

    // Business Description
    $wp_customize->add_setting( 'chew_business_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'chew_business_description', array(
        'label'       => __( 'Business Description', 'chewonthis' ),
        'description' => __( 'A brief description of the business (1-2 sentences).', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'textarea',
    ) );

    // ========================================
    // Contact Information
    // ========================================

    // Phone Number
    $wp_customize->add_setting( 'chew_business_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'chew_business_phone', array(
        'label'       => __( 'Phone Number', 'chewonthis' ),
        'description' => __( 'Format: +1-604-555-1234', 'chewonthis' ),
        'section'     => 'chew_schema_section',
        'type'        => 'text',
    ) );

    // Email
    $wp_customize->add_setting( 'chew_business_email', array(
        'default'           => 'info@chewonthistastytours.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'chew_business_email', array(
        'label'   => __( 'Email Address', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'email',
    ) );

    // ========================================
    // Address Information
    // ========================================

    // Street Address
    $wp_customize->add_setting( 'chew_business_street', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'chew_business_street', array(
        'label'   => __( 'Street Address', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'text',
    ) );

    // City
    $wp_customize->add_setting( 'chew_business_city', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'chew_business_city', array(
        'label'   => __( 'City', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'text',
    ) );

    // Province/Region
    $wp_customize->add_setting( 'chew_business_region', array(
        'default'           => 'BC',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'chew_business_region', array(
        'label'   => __( 'Province/Region', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'text',
    ) );

    // Postal Code
    $wp_customize->add_setting( 'chew_business_postal', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'chew_business_postal', array(
        'label'   => __( 'Postal Code', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'text',
    ) );

    // Country
    $wp_customize->add_setting( 'chew_business_country', array(
        'default'           => 'CA',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'chew_business_country', array(
        'label'   => __( 'Country Code', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'text',
    ) );

    // ========================================
    // Social Profiles
    // ========================================

    // Facebook
    $wp_customize->add_setting( 'chew_business_facebook', array(
        'default'           => 'https://www.facebook.com/chewonthistastytours/',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'chew_business_facebook', array(
        'label'   => __( 'Facebook URL', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'url',
    ) );

    // Instagram
    $wp_customize->add_setting( 'chew_business_instagram', array(
        'default'           => 'https://www.instagram.com/chewonthistastytours/',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'chew_business_instagram', array(
        'label'   => __( 'Instagram URL', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'url',
    ) );

    // TikTok
    $wp_customize->add_setting( 'chew_business_tiktok', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'chew_business_tiktok', array(
        'label'   => __( 'TikTok URL', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'url',
    ) );

    // YouTube
    $wp_customize->add_setting( 'chew_business_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'chew_business_youtube', array(
        'label'   => __( 'YouTube URL', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'url',
    ) );

    // ========================================
    // Additional Business Details
    // ========================================

    // Price Range
    $wp_customize->add_setting( 'chew_business_price_range', array(
        'default'           => '$$',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'chew_business_price_range', array(
        'label'   => __( 'Price Range', 'chewonthis' ),
        'section' => 'chew_schema_section',
        'type'    => 'select',
        'choices' => array(
            '$'    => '$',
            '$$'   => '$$',
            '$$$'  => '$$$',
            '$$$$' => '$$$$',
        ),
    ) );

}
add_action( 'customize_register', 'chew_schema_customizer_register' );

/**
 * Sanitize checkbox values
 */
function chew_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

// ========================================
// Helper Functions
// ========================================

/**
 * Get Organization schema array (reusable as provider/organizer)
 */
function chew_get_organization_schema() {
    $org = array(
        '@type' => 'Organization',
        '@id'   => home_url( '/#organization' ),
        'name'  => get_theme_mod( 'chew_business_name', 'Chew On This Tasty Tours' ),
        'url'   => get_theme_mod( 'chew_business_url', home_url( '/' ) ),
    );

    // Logo
    $logo = get_theme_mod( 'chew_business_logo' );
    if ( $logo ) {
        $org['logo'] = $logo;
    }

    // Email
    $email = get_theme_mod( 'chew_business_email', 'info@chewonthistastytours.com' );
    if ( $email ) {
        $org['email'] = $email;
    }

    // Phone
    $phone = get_theme_mod( 'chew_business_phone' );
    if ( $phone ) {
        $org['telephone'] = $phone;
    }

    // Address
    $city = get_theme_mod( 'chew_business_city' );
    if ( $city ) {
        $org['address'] = array(
            '@type'           => 'PostalAddress',
            'addressLocality' => $city,
            'addressRegion'   => get_theme_mod( 'chew_business_region', 'BC' ),
            'addressCountry'  => get_theme_mod( 'chew_business_country', 'CA' ),
        );

        $street = get_theme_mod( 'chew_business_street' );
        if ( $street ) {
            $org['address']['streetAddress'] = $street;
        }

        $postal = get_theme_mod( 'chew_business_postal' );
        if ( $postal ) {
            $org['address']['postalCode'] = $postal;
        }
    }

    // Social profiles
    $social = array_values( array_filter( array(
        get_theme_mod( 'chew_business_facebook', 'https://www.facebook.com/chewonthistastytours/' ),
        get_theme_mod( 'chew_business_instagram', 'https://www.instagram.com/chewonthistastytours/' ),
        get_theme_mod( 'chew_business_tiktok' ),
        get_theme_mod( 'chew_business_youtube' ),
    ) ) );

    if ( ! empty( $social ) ) {
        $org['sameAs'] = $social;
    }

    return $org;
}

/**
 * Build the full tour/experience name from Location taxonomy + ACF title field
 */
function chew_get_tour_name( $post_id ) {
    $title = get_field( 'title', $post_id );
    $location_terms = get_the_terms( $post_id, 'location' );
    $location = '';

    if ( ! empty( $location_terms ) && ! is_wp_error( $location_terms ) ) {
        $location_names = array();
        foreach ( $location_terms as $term ) {
            $location_names[] = $term->name;
        }
        $location = implode( ', ', $location_names );
    }

    return $location ? $location . ': ' . $title : $title;
}

/**
 * Output JSON-LD script tag
 */
function chew_output_json_ld( $schema ) {
    if ( empty( $schema ) ) {
        return;
    }

    $json = wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );

    if ( $json ) {
        echo "\n" . '<script type="application/ld+json">' . "\n";
        echo $json;
        echo "\n" . '</script>' . "\n";
    }
}

// ========================================
// Schema Output Functions
// ========================================

/**
 * Organization Schema — every page except homepage (homepage gets TourOperator)
 */
function chew_schema_organization() {
    if ( is_front_page() ) {
        return;
    }

    if ( ! get_theme_mod( 'chew_schema_org_enable', true ) ) {
        return;
    }

    $org = chew_get_organization_schema();
    $schema = array_merge(
        array( '@context' => 'https://schema.org' ),
        $org
    );

    chew_output_json_ld( $schema );
}
add_action( 'wp_head', 'chew_schema_organization', 5 );

/**
 * Homepage Schema — TourOperator (extends LocalBusiness)
 */
function chew_schema_homepage() {
    if ( ! is_front_page() ) {
        return;
    }

    if ( ! get_theme_mod( 'chew_schema_homepage_enable', true ) ) {
        return;
    }

    $org = chew_get_organization_schema();

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'TourOperator',
        'name'        => $org['name'],
        'url'         => $org['url'],
        'description' => get_theme_mod( 'chew_business_description', '' ),
        'priceRange'  => get_theme_mod( 'chew_business_price_range', '$$' ),
    );

    if ( isset( $org['logo'] ) ) {
        $schema['logo'] = $org['logo'];
        $schema['image'] = $org['logo'];
    }

    if ( isset( $org['email'] ) ) {
        $schema['email'] = $org['email'];
    }

    if ( isset( $org['telephone'] ) ) {
        $schema['telephone'] = $org['telephone'];
    }

    if ( isset( $org['address'] ) ) {
        $schema['address'] = $org['address'];
    }

    if ( isset( $org['sameAs'] ) ) {
        $schema['sameAs'] = $org['sameAs'];
    }

    chew_output_json_ld( $schema );
}
add_action( 'wp_head', 'chew_schema_homepage', 5 );

/**
 * Product Schema — single tour/experience pages
 */
function chew_schema_tour_product() {
    if ( ! is_singular( 'tour' ) ) {
        return;
    }

    if ( ! get_theme_mod( 'chew_schema_tour_product_enable', true ) ) {
        return;
    }

    $post_id = get_the_ID();
    $name = chew_get_tour_name( $post_id );
    $url = get_permalink( $post_id );

    // Description
    $description = get_field( 'short_description', $post_id );
    if ( empty( $description ) ) {
        $description = wp_trim_words( get_the_excerpt(), 50, '...' );
    }

    // Image
    $image = get_the_post_thumbnail_url( $post_id, 'full' );

    // Shared offer properties: return policy, shipping, price validity
    $return_policy = array(
        '@type'               => 'MerchantReturnPolicy',
        'applicableCountry'   => get_theme_mod( 'chew_business_country', 'CA' ),
        'returnPolicyCategory' => 'https://schema.org/MerchantReturnNotPermitted',
        'merchantReturnDays'  => 0,
    );

    $shipping_details = array(
        '@type'            => 'OfferShippingDetails',
        'shippingRate'     => array(
            '@type'    => 'MonetaryAmount',
            'value'    => 0,
            'currency' => 'CAD',
        ),
        'shippingDestination' => array(
            '@type'          => 'DefinedRegion',
            'addressCountry' => get_theme_mod( 'chew_business_country', 'CA' ),
        ),
    );

    $price_valid_until = date( 'Y' ) . '-12-31';

    // Build offers from schema_offers repeater or fallback to starting_cost
    $offers = array();
    if ( have_rows( 'schema_offers', $post_id ) ) {
        while ( have_rows( 'schema_offers', $post_id ) ) {
            the_row();
            $offer = array(
                '@type'                  => 'Offer',
                'name'                   => sanitize_text_field( get_sub_field( 'offer_name' ) ),
                'priceCurrency'          => 'CAD',
                'price'                  => floatval( get_sub_field( 'offer_price' ) ),
                'url'                    => esc_url( get_sub_field( 'offer_url' ) ),
                'availability'           => 'https://schema.org/' . sanitize_text_field( get_sub_field( 'offer_availability' ) ),
                'priceValidUntil'        => $price_valid_until,
                'hasMerchantReturnPolicy' => $return_policy,
                'shippingDetails'        => $shipping_details,
            );
            $offers[] = $offer;
        }
    } else {
        // Fallback: use starting_cost field
        $price = get_field( 'starting_cost', $post_id );
        if ( $price ) {
            $offers[] = array(
                '@type'                  => 'Offer',
                'priceCurrency'          => 'CAD',
                'price'                  => floatval( $price ),
                'url'                    => $url,
                'availability'           => 'https://schema.org/InStock',
                'priceValidUntil'        => $price_valid_until,
                'hasMerchantReturnPolicy' => $return_policy,
                'shippingDetails'        => $shipping_details,
            );
        }
    }

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Product',
        '@id'         => $url . '#product',
        'name'        => $name,
        'url'         => $url,
        'description' => $description,
        'brand'       => array(
            '@type' => 'Brand',
            'name'  => get_theme_mod( 'chew_business_name', 'Chew On This Tasty Tours' ),
        ),
        'provider'    => chew_get_organization_schema(),
        'category'    => 'Tourist experience',
    );

    if ( $image ) {
        $schema['image'] = array( $image );
    }

    if ( ! empty( $offers ) ) {
        $schema['offers'] = $offers;
    }

    // Pull testimonials associated with this tour for review + aggregateRating
    $testimonials = get_posts( array(
        'post_type'      => 'testimonial',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'meta_query'     => array(
            array(
                'key'     => 'associated_tour',
                'value'   => '"' . $post_id . '"',
                'compare' => 'LIKE',
            ),
        ),
    ) );

    if ( ! empty( $testimonials ) ) {
        $reviews = array();
        $total_rating = 0;

        foreach ( $testimonials as $testimonial ) {
            $rating = get_field( 'rating', $testimonial->ID );
            $author = get_field( 'author', $testimonial->ID );
            $body   = get_field( 'testimonial', $testimonial->ID );

            if ( empty( $rating ) ) {
                $rating = 5;
            }

            $total_rating += intval( $rating );

            $review = array(
                '@type'        => 'Review',
                'reviewRating' => array(
                    '@type'       => 'Rating',
                    'ratingValue' => intval( $rating ),
                    'bestRating'  => 5,
                ),
                'datePublished' => get_the_date( 'Y-m-d', $testimonial->ID ),
            );

            if ( $author ) {
                $review['author'] = array(
                    '@type' => 'Person',
                    'name'  => sanitize_text_field( $author ),
                );
            }

            if ( $body ) {
                $review['reviewBody'] = wp_strip_all_tags( $body );
            }

            $reviews[] = $review;
        }

        $schema['review'] = $reviews;

        $count = count( $testimonials );
        $schema['aggregateRating'] = array(
            '@type'       => 'AggregateRating',
            'ratingValue' => round( $total_rating / $count, 1 ),
            'bestRating'  => 5,
            'reviewCount' => $count,
        );
    }

    chew_output_json_ld( $schema );
}
add_action( 'wp_head', 'chew_schema_tour_product', 5 );

/**
 * Event Schema — single tour/experience pages with scheduled public dates
 */
function chew_schema_tour_event() {
    if ( ! is_singular( 'tour' ) ) {
        return;
    }

    if ( ! get_theme_mod( 'chew_schema_tour_event_enable', true ) ) {
        return;
    }

    $post_id = get_the_ID();

    // Check if events are enabled for this tour
    if ( ! get_field( 'schema_events_toggle', $post_id ) ) {
        return;
    }

    if ( ! have_rows( 'schema_events', $post_id ) ) {
        return;
    }

    $name = chew_get_tour_name( $post_id );
    $url = get_permalink( $post_id );
    $description = get_field( 'short_description', $post_id );
    $image = get_the_post_thumbnail_url( $post_id, 'full' );
    $performer = get_field( 'schema_performer', $post_id );

    // Build event location from schema_event_location group
    $loc = get_field( 'schema_event_location', $post_id );
    $location = array();
    if ( $loc && ! empty( $loc['venue_name'] ) ) {
        $location = array(
            '@type'   => 'Place',
            'name'    => sanitize_text_field( $loc['venue_name'] ),
            'address' => array(
                '@type'           => 'PostalAddress',
                'streetAddress'   => sanitize_text_field( $loc['street_address'] ),
                'addressLocality' => sanitize_text_field( $loc['city'] ),
                'addressRegion'   => sanitize_text_field( $loc['region'] ),
                'postalCode'      => sanitize_text_field( $loc['postal_code'] ),
                'addressCountry'  => sanitize_text_field( $loc['country'] ),
            ),
        );
    }

    // Output one Event schema per date
    while ( have_rows( 'schema_events', $post_id ) ) {
        the_row();

        $event_date = get_sub_field( 'event_date' );
        $start_time = get_sub_field( 'event_start_time' );
        $end_time = get_sub_field( 'event_end_time' );
        $booking_url = get_sub_field( 'event_booking_url' );

        if ( empty( $event_date ) ) {
            continue;
        }

        $schema = array(
            '@context'             => 'https://schema.org',
            '@type'                => 'Event',
            '@id'                  => $url . '#event-' . $event_date,
            'name'                 => $name . ' (Public Date)',
            'url'                  => $url,
            'startDate'            => $event_date . 'T' . $start_time,
            'endDate'              => $event_date . 'T' . $end_time,
            'eventStatus'          => 'https://schema.org/EventScheduled',
            'eventAttendanceMode'  => 'https://schema.org/OfflineEventAttendanceMode',
            'organizer'            => chew_get_organization_schema(),
        );

        if ( $description ) {
            $schema['description'] = $description;
        }

        if ( $image ) {
            $schema['image'] = array( $image );
        }

        if ( ! empty( $location ) ) {
            $schema['location'] = $location;
        }

        if ( $performer ) {
            $schema['performer'] = array(
                '@type' => 'Person',
                'name'  => sanitize_text_field( $performer ),
            );
        }

        if ( $booking_url ) {
            // Pull price from first schema_offer or starting_cost
            $price = get_field( 'starting_cost', $post_id );
            $schema['offers'] = array(
                '@type'         => 'Offer',
                'url'           => esc_url( $booking_url ),
                'priceCurrency' => 'CAD',
                'availability'  => 'https://schema.org/InStock',
            );
            if ( $price ) {
                $schema['offers']['price'] = floatval( $price );
            }
        }

        chew_output_json_ld( $schema );
    }
}
add_action( 'wp_head', 'chew_schema_tour_event', 5 );

/**
 * FAQPage Schema — single tour/experience pages with FAQs enabled
 */
function chew_schema_tour_faq() {
    if ( ! is_singular( 'tour' ) ) {
        return;
    }

    if ( ! get_theme_mod( 'chew_schema_tour_faq_enable', true ) ) {
        return;
    }

    $post_id = get_the_ID();

    // Check if FAQs are enabled on this tour
    if ( ! get_field( 'faqs_toggle', $post_id ) ) {
        return;
    }

    if ( ! have_rows( 'experience_faqs', $post_id ) ) {
        return;
    }

    $main_entity = array();
    while ( have_rows( 'experience_faqs', $post_id ) ) {
        the_row();
        $question = get_sub_field( 'question' );
        $answer = get_sub_field( 'answer' );

        if ( empty( $question ) || empty( $answer ) ) {
            continue;
        }

        $main_entity[] = array(
            '@type' => 'Question',
            'name'  => sanitize_text_field( $question ),
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => wp_strip_all_tags( $answer ),
            ),
        );
    }

    if ( empty( $main_entity ) ) {
        return;
    }

    $schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        '@id'        => get_permalink( $post_id ) . '#faq',
        'url'        => get_permalink( $post_id ),
        'mainEntity' => $main_entity,
    );

    chew_output_json_ld( $schema );
}
add_action( 'wp_head', 'chew_schema_tour_faq', 5 );

/**
 * About Page Schema
 */
function chew_schema_about_page() {
    if ( ! is_page( 'about' ) ) {
        return;
    }

    if ( ! get_theme_mod( 'chew_schema_about_enable', true ) ) {
        return;
    }

    $schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'AboutPage',
        'name'       => get_the_title(),
        'url'        => get_permalink(),
        'mainEntity' => array_merge(
            array( '@type' => 'Organization' ),
            chew_get_organization_schema()
        ),
    );

    chew_output_json_ld( $schema );
}
add_action( 'wp_head', 'chew_schema_about_page', 5 );

/**
 * Contact Page Schema
 */
function chew_schema_contact_page() {
    if ( ! is_page( 'contact-us' ) ) {
        return;
    }

    if ( ! get_theme_mod( 'chew_schema_contact_enable', true ) ) {
        return;
    }

    $org = chew_get_organization_schema();

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'ContactPage',
        'name'        => get_the_title(),
        'url'         => get_permalink(),
        'mainEntity'  => array(
            '@type'     => 'Organization',
            'name'      => $org['name'],
            'url'       => $org['url'],
            'telephone' => isset( $org['telephone'] ) ? $org['telephone'] : '',
            'email'     => isset( $org['email'] ) ? $org['email'] : '',
        ),
    );

    if ( isset( $org['address'] ) ) {
        $schema['mainEntity']['address'] = $org['address'];
    }

    chew_output_json_ld( $schema );
}
add_action( 'wp_head', 'chew_schema_contact_page', 5 );

/**
 * Tours Archive Schema — CollectionPage + ItemList
 */
function chew_schema_tours_archive() {
    if ( ! is_post_type_archive( 'tour' ) && ! is_page( 'tours' ) ) {
        return;
    }

    if ( ! get_theme_mod( 'chew_schema_archive_enable', true ) ) {
        return;
    }

    $tours = get_posts( array(
        'post_type'      => 'tour',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );

    $items = array();
    $position = 1;
    foreach ( $tours as $tour ) {
        $items[] = array(
            '@type'    => 'ListItem',
            'position' => $position,
            'url'      => get_permalink( $tour->ID ),
            'name'     => chew_get_tour_name( $tour->ID ),
        );
        $position++;
    }

    $schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'CollectionPage',
        'name'       => 'Experiences - ' . get_bloginfo( 'name' ),
        'url'        => get_post_type_archive_link( 'tour' ),
        'mainEntity' => array(
            '@type'           => 'ItemList',
            'itemListElement' => $items,
        ),
    );

    chew_output_json_ld( $schema );
}
add_action( 'wp_head', 'chew_schema_tours_archive', 5 );

/**
 * Privacy Policy Page Schema
 */
function chew_schema_privacy_page() {
    if ( ! is_page( 'privacy-policy' ) ) {
        return;
    }

    if ( ! get_theme_mod( 'chew_schema_privacy_enable', true ) ) {
        return;
    }

    $schema = array(
        '@context'      => 'https://schema.org',
        '@type'         => 'WebPage',
        'name'          => get_the_title(),
        'url'           => get_permalink(),
        'publisher'     => chew_get_organization_schema(),
        'inLanguage'    => 'en-CA',
    );

    chew_output_json_ld( $schema );
}
add_action( 'wp_head', 'chew_schema_privacy_page', 5 );
