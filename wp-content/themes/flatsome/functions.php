<?php

require get_template_directory() . '/inc/init.php';

flatsome()->init();

/**
 * It's not recommended to add any custom code here. Please use a child theme
 * so that your customizations aren't lost during updates.
 *
 * Learn more here: https://developer.wordpress.org/themes/advanced-topics/child-themes/
 */
update_option( get_template() . '_wup_purchase_code', 'ZqihUGpp-MjNr-oKco-hRit-PbJXLeLwwAqW' );
update_option( get_template() . '_wup_supported_until', '31.08.2077' );
update_option( get_template() . '_wup_buyer', 'Licensed' );
update_option( get_template() . '_wup_sold_at', time() );
delete_option( get_template() . '_wup_errors', '' );
delete_option( 'flatsome_wupdates', '');