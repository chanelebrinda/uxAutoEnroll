
<?php 
/**
 * Plugin Name:       uxAutoEnroll
 * Description:       module de subcription d'abonnement
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.3
 * Author:            TUX Expertise
 * Author URI:        http://staging.uxpertise.ca/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html  
 */

 if (!defined('ABSPATH')):
    exit; // Exit if accessed directly
endif;

define('UXP_DIR_PATH', plugin_dir_path( __FILE__ ));
define('UXP_DIR_URL', plugin_dir_url(__FILE__ ));


// define( 'WP_MEMORY_LIMIT', '800M' );
// define( 'WP_MAX_MEMORY_LIMIT', '1024M' );

add_action( 'admin_menu',  'ux_add_admin_menu_pages' );
   function ux_add_admin_menu_pages() {
		add_menu_page('uxAutoEnroll ',
        'uxAutoEnroll',
        'manage_options',
        'uxautoenroll',
		'uxAutoEnroll_page_markup',
        'dashicons-calendar-alt',60);
    }

   function uxAutoEnroll_page_markup(){
    ?>
<div class="wrap " >

        <?php settings_errors(); ?> 

        <div class="d-flex flex-row  align-items-center  justify-content-between p-3">
            <div class="d-flex"> 
                <h1>  <?php _e(get_admin_page_title())?></h1>
            </div>
        </div>

        <div >
            <form method="post" action="options.php"> 
              <?php 
                    settings_fields( 'ux_general_settings' ); 
                    do_settings_sections( 'ux_general' );
                
                    submit_button( null,'primary','submit',true,['id'=>'pw_button'] );
                ?>
            </form>
        </div>

</div>
 
<?php

   }

require UXP_DIR_PATH.'includes/enqueue.php';
require UXP_DIR_PATH.'includes/ajax.php';
require UXP_DIR_PATH.'includes/table_create.php'; 
require UXP_DIR_PATH.'includes/uxp_menu.php';


/** 
 * Activation hook.
 */
function UXP_subscription_activate(){

  uxp_add_page('subcription','subcription','[UXP_subcription_form]');
  uxp_add_page('subcription_en','subcription_en','[UXP_subcription_form_en]');
  uxp_add_page('subcription_success','subcription_success','[UXP_subcription_success]');
  uxp_add_page('subcription_failed','subcription_failed','[UXP_subcription_failed]');
  uxp_create_table();  
}

register_activation_hook( __FILE__,  'UXP_subscription_activate' );

/**
* Adds a shortcode
*/
function uxp_pricing_display()
{
  ob_start();
  require_once( UXP_DIR_PATH . 'template/pricing.php');
  return ob_get_clean();
}
add_shortcode( 'UXP_pricing', 'uxp_pricing_display');


function uxp_pricing_display_en()
{
  ob_start();
  require_once( UXP_DIR_PATH . 'template/pricing_en.php');
  return ob_get_clean();
}
add_shortcode( 'UXP_pricing_en', 'uxp_pricing_display_en');


function uxp_pricing_subcription_form_en()
{
  ob_start();
  require_once( UXP_DIR_PATH . 'template/subcription_form_en.php');
  return ob_get_clean();
}
add_shortcode( 'UXP_subcription_form_en', 'uxp_pricing_subcription_form_en');

function uxp_pricing_subcription_form()
{
  ob_start();
  require_once( UXP_DIR_PATH . 'template/subcription_form.php');
  return ob_get_clean();
}
add_shortcode( 'UXP_subcription_form', 'uxp_pricing_subcription_form');

function uxp__subcription_response_success()
{ 
  ob_start();
  require_once( UXP_DIR_PATH . 'template/subcription_response_success.php');
  return ob_get_clean();
}
add_shortcode( 'UXP_subcription_success', 'uxp__subcription_response_success');

function uxp__subcription_response_failed()
{
  ob_start();
  require_once( UXP_DIR_PATH . 'template/subcription_response_failed.php');
  return ob_get_clean();
}
add_shortcode( 'UXP_subcription_failed', 'uxp__subcription_response_failed');


function uxp_add_page($post_title,$post_name,$post_content,$parent_id =NULL){

    $my_services = wp_insert_post(
        array(
          'post_title'    => $post_title,
          'post_status'   => 'publish',
          'post_author'   => 1,
          'post_type'     => 'page',
          'post_name'      => $post_name,
          'post_content'   => $post_content,
          'comment_status' => 'closed',
          'post_parent'    =>  $parent_id,
        )
      );
      return $my_services;

}





    



   