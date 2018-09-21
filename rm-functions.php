<?php
	// Add Required Plugins
	require_once get_stylesheet_directory() . '/includes/class-tgm-plugin-activation.php';

	/**
	 * Register the required plugins for this theme.
	 *
	 * In this example, we register five plugins:
	 * - one included with the TGMPA library
	 * - two from an external source, one from an arbitrary source, one from a GitHub repository
	 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
	 *
	 * The variables passed to the `tgmpa()` function should be:
	 * - an array of plugin arrays;
	 * - optionally a configuration array.
	 * If you are not changing anything in the configuration array, you can remove the array and remove the
	 * variable from the function call: `tgmpa( $plugins );`.
	 * In that case, the TGMPA default settings will be used.
	 *
	 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
	 */
	function rm_register_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(
			//// REQUIRED
			// ACF Pro 5.6.10
			array(
				'name'               => 'Advanced Custom Fields Pro',
				'slug'               => 'advanced-custom-fields-pro',
				'source'             => get_stylesheet_directory() . '/includes/plugins/advanced-custom-fields-pro-5.6.10.zip',
				'required'           => true,
				'version'            => '5.7.6',
				'force_activation'   => true,
				'force_deactivation' => false,
				'external_url' 			 => 'https://www.advancedcustomfields.com/'
			),
			// Formidable Forms
			array(
				'name'								=> 'Formidable Forms',
				'slug'								=> 'formidable',
				'required'						=> true,
				'version'							=> '3.03.02',
				'force_activation'		=> true,
				'force_deactivation'	=> false
			),
			// Formidable Forms Pro
			array(
				'name'               => 'Formidable Forms Pro',
				'slug'               => 'formidable-pro',
				'source'             => get_stylesheet_directory() . '/includes/plugins/formidable-pro-3.03.02.zip',
				'required'           => true,
				'version'            => '3.03.02',
				'force_activation'   => true,
				'force_deactivation' => false,
				'external_url' 			 => 'https://formidableforms.com/'
			),
			// Duplicate Post
			array(
				'name'      => 'Duplicate Post',
				'slug'      => 'duplicate-post',
				'required'  => true,
				'version'   => '3.2.2',
				'force_activation'   => true,
				'force_deactivation' => false,
			),
			// ManageWP Worker
			array(
				'name'      => 'ManageWP Worker',
				'slug'      => 'worker',
				'required'  => true,
				'version'   => '4.5.0',
				'force_activation'   => true,
				'force_deactivation' => false,
			),
			// WordPress Importer
			array(
				'name'      => 'WordPress Importer',
				'slug'      => 'wordpress-importer',
				'required'  => true,
				'version'   => '0.6.4',
				'force_activation'   => true,
				'force_deactivation' => false,
			),
			// WP-SCSS 1.2.4
			array(
				'name'      => 'WP-SCSS',
				'slug'      => 'wp-scss',
				'required'  => true,
				'version'   => '1.2.4',
				'force_activation'   => true,
				'force_deactivation' => true,
			),
			// WP Sitemap Page
			array(
				'name'      => 'WP Sitemap Page',
				'slug'      => 'wp-sitemap-page',
				'required'  => true,
				'version'   => '1.6.1',
				'force_activation'   => true,
				'force_deactivation' => false,
			),
			//// OPTIONAL PLUGINS
			// Formidable Autoresponder
			array(
				'name'               => 'Formidable Form Action Automation',
				'slug'               => 'formidable-autoresponder',
				'source'             => get_stylesheet_directory() . '/includes/plugins/formidable-autoresponder-2.01.zip',
				'required'           => false,
				'version'            => '2.01',
				'external_url' 			 => 'https://formidableforms.com/'
			),
			// The Events Calendar
			array(
				'name'      => 'The Events Calendar',
				'slug'      => 'the-events-calendar',
				'required'  => false,
			),
			// Redirection
			array(
				'name'        => 'Redirection',
				'slug'        => 'redirection',
				'required'  => false,
			),
			// SVG Support
			array(
				'name'        => 'SVG Support',
				'slug'        => 'svg-support',
				'required'  => false,
			),
			// WP Job Manager
			array(
				'name'      => 'WP Job Manager',
				'slug'      => 'wp-job-manager',
				'required'  => false,
			),
			// WordPress SEO by Yoast
			array(
				'name'        => 'WordPress SEO by Yoast',
				'slug'        => 'wordpress-seo',
				'required'  => false,
			),
			// This is an example of how to include a plugin bundled with a theme.
			/*
			array(
				'name'               => 'TGM Example Plugin', // The plugin name.
				'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
				'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
			*/
			/*
			// This is an example of how to include a plugin from an arbitrary external source in your theme.
			array(
				'name'         => 'TGM New Media Plugin', // The plugin name.
				'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
				'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
				'required'     => true, // If false, the plugin is only 'recommended' instead of required.
				'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
			),
			*/
			/*
			// This is an example of how to include a plugin from a GitHub repository in your theme.
			// This presumes that the plugin code is based in the root of the GitHub repository
			// and not in a subdirectory ('/src') of the repository.
			array(
				'name'      => 'Adminbar Link Comments to Pending',
				'slug'      => 'adminbar-link-comments-to-pending',
				'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
			),
			*/
			/*
			// This is an example of how to include a plugin from the WordPress Plugin Repository.
			array(
				'name'      => 'BuddyPress',
				'slug'      => 'buddypress',
				'required'  => false,
			),
			*/
			/*
			// This is an example of the use of 'is_callable' functionality. A user could - for instance -
			// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
			// 'wordpress-seo-premium'.
			// By setting 'is_callable' to either a function from that plugin or a class method
			// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
			// recognize the plugin as being installed.
			array(
				'name'        => 'WordPress SEO by Yoast',
				'slug'        => 'wordpress-seo',
				'is_callable' => 'wpseo_init',
			),
			*/

		);

		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'roarmedia',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.

			/*
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'roarmedia' ),
				'menu_title'                      => __( 'Install Plugins', 'roarmedia' ),
				/* translators: %s: plugin name. * /
				'installing'                      => __( 'Installing Plugin: %s', 'roarmedia' ),
				/* translators: %s: plugin name. * /
				'updating'                        => __( 'Updating Plugin: %s', 'roarmedia' ),
				'oops'                            => __( 'Something went wrong with the plugin API.', 'roarmedia' ),
				'notice_can_install_required'     => _n_noop(
					/* translators: 1: plugin name(s). * /
					'This theme requires the following plugin: %1$s.',
					'This theme requires the following plugins: %1$s.',
					'roarmedia'
				),
				'notice_can_install_recommended'  => _n_noop(
					/* translators: 1: plugin name(s). * /
					'This theme recommends the following plugin: %1$s.',
					'This theme recommends the following plugins: %1$s.',
					'roarmedia'
				),
				'notice_ask_to_update'            => _n_noop(
					/* translators: 1: plugin name(s). * /
					'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
					'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
					'roarmedia'
				),
				'notice_ask_to_update_maybe'      => _n_noop(
					/* translators: 1: plugin name(s). * /
					'There is an update available for: %1$s.',
					'There are updates available for the following plugins: %1$s.',
					'roarmedia'
				),
				'notice_can_activate_required'    => _n_noop(
					/* translators: 1: plugin name(s). * /
					'The following required plugin is currently inactive: %1$s.',
					'The following required plugins are currently inactive: %1$s.',
					'roarmedia'
				),
				'notice_can_activate_recommended' => _n_noop(
					/* translators: 1: plugin name(s). * /
					'The following recommended plugin is currently inactive: %1$s.',
					'The following recommended plugins are currently inactive: %1$s.',
					'roarmedia'
				),
				'install_link'                    => _n_noop(
					'Begin installing plugin',
					'Begin installing plugins',
					'roarmedia'
				),
				'update_link' 					  => _n_noop(
					'Begin updating plugin',
					'Begin updating plugins',
					'roarmedia'
				),
				'activate_link'                   => _n_noop(
					'Begin activating plugin',
					'Begin activating plugins',
					'roarmedia'
				),
				'return'                          => __( 'Return to Required Plugins Installer', 'roarmedia' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'roarmedia' ),
				'activated_successfully'          => __( 'The following plugin was activated successfully:', 'roarmedia' ),
				/* translators: 1: plugin name. * /
				'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'roarmedia' ),
				/* translators: 1: plugin name. * /
				'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'roarmedia' ),
				/* translators: 1: dashboard link. * /
				'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'roarmedia' ),
				'dismiss'                         => __( 'Dismiss this notice', 'roarmedia' ),
				'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'roarmedia' ),
				'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'roarmedia' ),

				'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
			),
			*/
		);

		tgmpa( $plugins, $config );
	}
	add_action( 'tgmpa_register', 'rm_register_required_plugins' );

	//// ACF SYNCING
	// Save Field Groups
	function rm_save_acf_json( $path ) {
	    $path = get_stylesheet_directory() . '/includes/acf_json/';
	    return $path;
	}
	add_filter('acf/settings/save_json', 'rm_save_acf_json');
	// Load Field Groups
	function rm_load_acf_json( $paths ) {
	    // remove original path (optional)
	    //unset($paths[0]);
	    $paths[] = get_stylesheet_directory() . '/includes/acf_json/';
	    return $paths;	    
	}
	add_filter('acf/settings/load_json', 'rm_load_acf_json');
	function rm_sync_acf_fields() {
		// vars
		$groups = acf_get_field_groups();
		$sync 	= array();
		// bail early if no field groups
		if( empty( $groups ) )
			return;
		// find JSON field groups which have not yet been imported
		foreach( $groups as $group ) {
			
			// vars
			$local 		= acf_maybe_get( $group, 'local', false );
			$modified 	= acf_maybe_get( $group, 'modified', 0 );
			$private 	= acf_maybe_get( $group, 'private', false );
			// ignore DB / PHP / private field groups
			if( $local !== 'json' || $private ) {
				
				// do nothing
				
			} elseif( ! $group[ 'ID' ] ) {
				
				$sync[ $group[ 'key' ] ] = $group;
				
			} elseif( $modified && $modified > get_post_modified_time( 'U', true, $group[ 'ID' ], true ) ) {
				
				$sync[ $group[ 'key' ] ]  = $group;
			}
		}
		// bail if no sync needed
		if( empty( $sync ) )
			return;
		if( ! empty( $sync ) ) { //if( ! empty( $keys ) ) {
			
			// vars
			$new_ids = array();
			
			foreach( $sync as $key => $v ) { //foreach( $keys as $key ) {
				
				// append fields
				if( acf_have_local_fields( $key ) ) {
					
					$sync[ $key ][ 'fields' ] = acf_get_local_fields( $key );
					
				}
				// import
				$field_group = acf_import_field_group( $sync[ $key ] );
			}
		}
	}
	add_action( 'acf/init', 'rm_sync_acf_fields' );
	
	// Enable Layout Builder Debug
	function builder_set_debug() {
		return "debug";
	}

	// Setup Brand Shortcode functions
	function rm_brandname_shortcode() {
		$brandSettings = get_field('rm_shortcode_brand', 'option');
		$result = 'BRAND NAME NOT SET';
		if ($brandSettings && $brandSettings['name']) {
			$result = $brandSettings['name'];
		}
		return $result;
	}
	function rm_brandemail_shortcode() {
		$brandSettings = get_field('rm_shortcode_brand', 'option');
		$result = 'BRAND EMAIL NOT SET';
		if ($brandSettings && $brandSettings['email']) {
			$result = $brandSettings['email'];
			$result = sprintf('<a href="mailto:%s">%s</a>', $result, $result);
		}
		return $result;
	}
	function rm_brandtel_shortcode() {
		$brandSettings = get_field('rm_shortcode_brand', 'option');
		$result = 'BRAND TELEPHONE NOT SET';
		if ($brandSettings && $brandSettings['tel']) {
			$result = $brandSettings['tel'];
		}
		return $result;
	}
	function rm_brandaddress_shortcode() {
		$brandSettings = get_field('rm_shortcode_brand', 'option');
		$result = 'BRAND ADDRESS NOT SET';
		if ($brandSettings && $brandSettings['address']) {
			$result = '';
			$brandAddress = $brandSettings['address'];
			if ($brandAddress['street_1']) {
				$result .= $brandAddress['street_1'];
				if ($brandAddress['street_2']) {
					$result .= ', ' . $brandAddress['street_2'];
				}
			} else {
				$result = 'STREET NOT SET';
			}
			if ($brandAddress['city'] || $brandAddress['state'] || $brandAddress['zip']) {
				$result .= '<br>';
				if ($brandAddress['city']) {
					$result .= $brandAddress['city'];
				}
				if ($brandAddress['state']) {
					if ($brandAddress['city']) {
						$result .= ', ';
					}
					$result .= $brandAddress['state'];
				}
				if ($brandAddress['zip']) {
					if ($brandAddress['city'] || $brandAddress['state']) {
						$result .= ' ';
					}
					$result .= $brandAddress['zip'];
				}
			}
		}
		return $result;
	}
	function rm_brandsite_shortcode() {
		$result = get_site_url();
		return sprintf('<a href="%s">%s</a>', $result, preg_replace('#^http(s)?://#', '', $result));
	}
	function rm_modified_date_shortcode() {
		return get_the_modified_date();
	}

	// Developer Settings
	if (function_exists('acf_get_field')) {
		$rmDevOptions = get_field('rm_developer_tools', 'option');
		if ($rmDevOptions) {
			if ($rmDevOptions['enable_avia_debug']) {
				add_action('avia_builder_mode', "builder_set_debug");
			}
			if ($rmDevOptions['enable_scss_recompile']) {
				define('WP_SCSS_ALWAYS_RECOMPILE', true);
			}
		}

		// Register Brand Shortcodes
		add_shortcode('rm-brandname', 'rm_brandname_shortcode');
		add_shortcode('rm-brandemail', 'rm_brandemail_shortcode');
		add_shortcode('rm-brandtel', 'rm_brandtel_shortcode');
		add_shortcode('rm-brandaddress', 'rm_brandaddress_shortcode');
		add_shortcode('rm-brandsite', 'rm_brandsite_shortcode');
		add_shortcode('rm-modified-date', 'rm_modified_date_shortcode');
	}

	// Register and Enqueue Custom CSS
	function rm_custom_scripts() {
		wp_register_style( 'rm-styles', get_stylesheet_directory_uri() . '/includes/css/styles.css', false, '', 'all' );
		wp_register_script( 'js-cookie', get_stylesheet_directory_uri() . '/includes/js/js.cookie.js', array(), null, false );
		wp_register_script( 'rm-scripts', get_stylesheet_directory_uri() . '/includes/js/scripts.js', array('jquery'), null, true );
		wp_enqueue_style( 'rm-styles' );
		wp_enqueue_script( 'rm-scripts' );
		wp_enqueue_script( 'js-cookie' );
	}
	add_action('wp_enqueue_scripts', 'rm_custom_scripts');

	// Register and Enqueue Custom Fonts
	function rm_custom_fonts() {
		wp_register_style( 'custom-font', get_stylesheet_directory_uri() . '/includes/fonts/fonts.css', false, '1.0', 'all' );
		wp_enqueue_style( 'custom-font' );
	}
	add_action( 'wp_enqueue_scripts', 'rm_custom_fonts' );

	// Register ACF Options Page
	if( function_exists('acf_add_options_page') ) {	
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Advanced Settings',
			'menu_title'	=> 'Advanced',
			'parent_slug'	=> 'options-general.php',
		));	
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Brand Identity Options',
			'menu_title'	=> 'Brand Identity',
			'parent_slug'	=> 'options-general.php',
		));	
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Setup Guide',
			'menu_title'	=> 'Setup Guide',
			'parent_slug'	=> 'tools.php',
		));
	}

	// Create Pages on Theme Activation
	function rm_create_default_pages(){
		$rmDefaultPages = array(
			'privacy' => array(
				'name' => 'Privacy Policy',
				'content' => '<h3>What information do we collect?</h3><p>We collect information from you when you register on our site, subscribe to our newsletter or fill out a form.</p><p>When ordering or registering on our site, as appropriate, you may be asked to enter your: name, e-mail address or phone number. You may, however, visit our site anonymously.</p><h3>What do we use your information for?</h3><p>Any of the information we collect from you may be used in one of the following ways:</p><p>To improve our website<br> (we continually strive to improve our website offerings based on the information and feedback we receive from you)</p><p>To administer a contest, promotion, survey or other site feature</p><p>To send periodic emails</p><p>The email address you provide for order processing, will only be used&nbsp; to send you information and updates pertaining to your order.</p><p>If you decide to opt-in to our mailing list, you will receive emails that may include company news, updates, related product or service information, etc.</p><h3>Do we use cookies?</h3><p>The Roar Media&nbsp;website uses cookies, tracking pixels and related technologies. Cookies are small data files that are served by our platform and stored on your device. Our site uses cookies dropped by us or third parties for a variety of purposes including to operate and personalize the website. Also, cookies may also be used to track how you use the site to target ads to you on other websites.</p><h3>Your Choices and Opting-Out</h3><p>We recognize how important your online privacy is to you, so we offer the following options for controlling the targeted ads you receive and how we use your data:</p><ul><li>You can opt out of receiving targeted ads served by AdRoll or on our behalf by clicking on the blue icon that typically appears in the corner of the ads we serve or by clicking&nbsp;<a href="https://app.adroll.com/optout/safari" target="_blank" rel="noopener noreferrer">here</a>. Please note that, if you delete your cookies or upgrade your browser after having opted out, you will need to opt out again. Further, if you use multiple browsers or devices you will need to execute this opt out on each browser or device. If you opt-out we may collect some data about your online activity for operational purposes (such as fraud prevention) but it won’t be used by us for the purpose of targeting ads to you.</li><li>AdRoll is also a member of the Network Advertising Initiative (NAI) and adheres to the NAI Codes of Conduct. You may use the NAI opt out tool&nbsp;<a href="http://www.networkadvertising.org/choices/" target="_blank" rel="noopener noreferrer">here</a>, which will allow you to opt out of seeing targeted ads from AdRoll and from other NAI approved member companies.</li></ul><h3>Do we disclose any information to outside parties?</h3><p>We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</p><h3>Third party links</h3><p>Occasionally, at our discretion, we may include or offer third party products or services on our website. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.</p><h3>Children’s Online Privacy Protection Act Compliance</h3><p>We are in compliance with the requirements of COPPA (Children’s Online Privacy Protection Act), we do not collect any information from anyone under 13 years of age. Our website, products and services are all directed to people who are at least 13 years old or older.</p><h3>Online Privacy Policy Only</h3><p>This online privacy policy applies only to information collected through our website and not to information collected offline.</p><h3>Terms and Conditions</h3><p>Please also visit our Terms and Conditions section establishing the use, disclaimers, and limitations of liability governing the use of our website at&nbsp;<a href="'. get_site_url() .'/terms/">Terms and Conditions</a>.</p><h3>Your Consent</h3><p>By using our site, you consent to our privacy policy.</p><h3>Changes to our Privacy Policy</h3><p>If we decide to change our privacy policy, we will post those changes on this page, and/or update the Privacy Policy modification date below.</p><p>This policy was last modified on <strong>[rm-modified-date]</strong>.</p><h3>Contacting Us</h3><p>If there are any questions regarding this privacy policy you may contact us using the information below.</p><p>[rm-brandsite]<br> [rm-brandaddress]<br> [rm-brandemail]<br> [rm-brandtel]</p>',
				'slug' => 'privacy'
			),
			'sitemap' => array(
				'name' => 'Sitemap',
				'content' => '<p>[wp_sitemap_page only="page"]</p><p>[wp_sitemap_page only="portfolio"]</p><p>[wp_sitemap_page only="post"]</p>',
				'slug' => 'sitemap'
			),
			'terms' => array(
				'name' => 'Terms and Conditions',
				'content' => '<p>Welcome to the web site owned and operated by [rm-brandname] (“[rm-brandname]”, “us” or “we”). These terms apply to the web site located at [rm-brandsite] (the “Web site”).</p><p>Your access and use of the web site is subject to the following terms and conditions and all applicable laws. By accessing or using any part of the web site, you accept, without limitation or qualification, these terms and conditions. Bf you do not agree with all of these terms and conditions, you may not use any portion of the web site.</p><h3>Authorized use of the Web site</h3><p>The Web site is provided for your personal use and informational purposes only. Any other use of the Web site requires our prior written consent.</p><h3>Information and Privacy</h3><p>In order to use certain portions of the Web site, such as posting a comment to a blog, you will be required to provide specific information. All information about you must be truthful, and you may not use any aliases or other means to mask your true identity. To understand how we use information collected from you, please read our Privacy Policy.</p><h3>Blogs – Acceptable Use Policy</h3><p>This Web site provides you with a forum to express your personal opinions regarding various topics in the [rm-brandname] Blog.</p><p>When using such blogs, you expressly agree that:</p><ul><li>You have the right to post all information and materials;</li><li>All opinions expressed are genuinely held based upon your own analysis, experiences, beliefs or research;</li><li>You will not post any content that is libelous, defamatory or invades any privacy or publicity rights of any third party; or is abusive, vulgar, hateful, obscene, scandalous, threatening, inflammatory or otherwise objectionable; or infringes any copyright, trademark, service mark, patent, trade secret or confidentiality obligation; and</li><li>You will not used any profanity or masked profanity</li></ul><p>You hereby grant us a perpetual license to use, redact, republish, copy and distribute your postings, and any ideas or suggestions in such postings, in any medium now known or hereinafter developed without payment of compensation to you and without seeking any further approval from you.</p><p>You agree to be solely liable for the content all of all information posted by you. [rm-brandname] is not under any obligation to screen or monitor blog postings by other parties. By using the blogs, you acknowledge that you may be exposed to objectionable content and that you will not hold [rm-brandname] liable for such content.</p><h3>Unauthorized Use of the Web site</h3><p>You may not use spiders, robots, data mining techniques or other automated devices or programs to catalog, download, store or otherwise reproduce, store or distribute content available on the Web site. Further, you may not use any such automated means to manipulate the Web site or attempt to exceed the limited authorization and access granted to you under these Terms and Conditions. You may not resell use of, or access to, the Web site to any third party.</p><h3>Proprietary Rights</h3><p>We are the exclusive owner of the Web site, including all copy, software, graphics, designs and all copyrights, trademarks and other intellectual property or proprietary rights contained therein. However, materials on the Web site posted by members may belong to such members or to third parties. By using the Web site, you agree not to copy, distribute, modify or make derivative works of any materials without the prior written consent of the owner of such materials. All rights not expressly granted herein are reserved by [rm-brandname].</p><h3>No Warranties</h3><p>THE WEB SITE, INCLUDING ALL CONTENT MADE AVAILABLE ON OR ACCESSED THROUGH THE WEB SITE, IS PROVIDED “AS IS” AND WE MAKE NO REPRESENTATIONS OR WARRANTIES OF ANY KIND WHATSOEVER FOR THE CONTENT ON THE WEB SITE. FURTHER, TO THE FULLEST EXTENT PERMISSIBLE BY LAW, WE DISCLAIM ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, NON-INFRINGEMENT, TITLE, MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. WE DO NOT WARRANT THAT THE FUNCTIONS CONTAINED IN THE WEB SITE OR ANY MATERIALS OR CONTENT CONTAINED THEREIN WILL BE UNINTERRUPTED OR ERROR FREE, THAT DEFECTS WILL BE CORRECTED, OR THAT THE WEB SITE OR THE SERVER THAT MAKES IT AVAILABLE IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. WE SHALL NOT BE LIABLE FOR THE USE OF THE WEB SITE, INCLUDING, WITHOUT LIMITATION, THE CONTENT AND ANY ERRORS CONTAINED THEREIN PROVIDED BY THIRD PARTIES. IN NO EVENT WILL WE BE LIABLE UNDER ANY THEORY OF TORT, CONTRACT, STRICT LIABILITY OR OTHER LEGAL OR EQUITABLE THEORY FOR ANY DIRECT, INDIRECT, SPECIAL, INCIDENTAL, OR OTHER CONSEQUENTIAL DAMAGES, LOST PROFITS, LOST DATA, LOST OPPORTUNITIES, COSTS OF COVER, EXEMPLARY, PUNITIVE, PERSONAL INJURY/WRONGFUL DEATH, EACH OF WHICH IS HEREBY EXCLUDED BY AGREEMENT OF THE PARTIES REGARDLESS OF WHETHER OR NOT EITHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p><h3>Indemnification</h3><p>You agree to indemnify, defend and hold us and our agents harmless from and against any and all third party claims, demands, liabilities, costs or expenses, including attorney’s fees and costs, arising from, or related to, (i) any breach by you of any of these Terms and Conditions, (ii) the content of any posting you make to a blog or (iii) a violation by you of applicable law.</p><h3>International Access</h3><p>Our Web site is provided from the United States of America and all servers that make it available reside in the U.S.A. The laws of other countries may differ regarding the access and use of the Web site. We make no representations regarding the legality of this Web site in any other country and it is your responsibility to ensure that your use complies with all applicable laws outside of the U.S.A.</p><h3>Governing Law</h3><p>The laws of the State of New Hampshire shall govern these Terms and Conditions. YOU HEREBY EXPRESSLY CONSENT TO EXCLUSIVE JURISDICTION AND VENUE IN THE COURTS LOCATED IN NEW HAMPSHIRE FOR ALL MATTERS ARISING IN CONNECTION WITH THESE TERMS AND CONDITIONS OR YOUR ACCESS OR USE OF THE WEB SITE.</p><h3>Updates</h3><p>We may change, suspend or terminate the Web site, or your access to the Web site, at any time without notice. In addition, these Terms and Conditions may be changed at any time without prior notice. We will make such changes by posting them on the Web site, and you should check for such changes frequently. Your continued access of the Web site after such changes conclusively demonstrates your acceptance of those changes.</p><h3>Digital Millennium Copyright Act (“DMCA”) Notice</h3><p>Materials may be made available via the Web site by third parties not within our control (such as through blogs). We are under no obligation to, and do not, scan content posted on the Web site for defects, viruses or the inclusion of illegal content. However, we respect the copyright interests of others. It is our policy not to permit materials known by us to infringe another party’s copyright to remain on the Web site.</p><p>If you believe any materials on the Web site infringe a copyright, you should provide us with written notice that at a minimum contains:</p><ul><li>A physical or electronic signature of a person authorized to act on behalf of the owner of an exclusive right that is allegedly infringed;</li><li>Identification of the copyrighted work claimed to have been infringed, or, if multiple copyrighted works at a single online site are covered by a single notification, a representative list of such works at that site;</li><li>Identification of the material that is claimed to be infringing or to be the subject of infringing activity and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit us to locate the material;</li><li>Information reasonably sufficient to permit us to contact the complaining party, such as an address, telephone number, and, if available, an electronic mail address at which the complaining party may be contacted;</li><li>A statement that the complaining party has a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law; and</li><li>A statement that the information in the notification is accurate, and under penalty of perjury, that the complaining party is authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.</li></ul><p>All DMCA notices should be sent to our designated agent as follows:</p><p>[rm-brandname]<br> [rm-brandaddress]<br> [rm-brandemail]<br> [rm-brandsite]<br> [rm-brandtel]/p><p>It is our policy to terminate relationships regarding content with third parties who repeatedly infringe the copyrights of others.</p><h3>Questions</h3><p>Should you have any questions regarding these Terms and Conditions you may contact us at [rm-brandemail].</p>',
				'slug' => 'terms'
			)
		);

		foreach ($rmDefaultPages as $rmPage => $rmPageValue) {
			// Set the title, template, etc
	    $rm_page_title     = __($rmPageValue['name'],'text-domain'); // Page's title
	    $rm_page_content   = $rmPageValue['content'];
	    $rm_page_slug			= $rmPageValue['slug'];
	    $rm_page_template  = 'page.php';       // The template to use for the page
	    $page_check = get_page_by_title($rm_page_title);   // Check if the page already exists
	    // Store the above data in an array
	    $rm_page = array(
	      'post_type'     => 'page', 
	      'post_title'    => $rm_page_title,
	      'post_content'  => $rm_page_content,
	      'post_status'   => 'publish',
	      'post_author'   => 1,
	      'post_slug'     => $rm_page_slug
	    );
	    // If the page doesn't already exist, create it
	    if(!isset($page_check->ID)){
	        $rm_page_id = wp_insert_post($rm_page);
	        if(!empty($rm_page_template)){
	            update_post_meta($rm_page_id, '_wp_page_template', $rm_page_template);
	        }
	    }
		}
	}
	add_action( 'after_switch_theme', 'rm_create_default_pages' );
?>