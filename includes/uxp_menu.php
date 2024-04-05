 
<?php
function ux_settings_page() {

  if( false == get_option( 'ux_general_settings' ) ) {
    add_option( 'ux_general_settings' );
  }
  add_settings_section( 'ux_parametre_general', __( 'Configuration de Api auto enroll' ), 'ux_settings_callback', 'ux_general');
    add_settings_field( 'ux_setting_api_endpoint_plan',__( 'Endpoint plan list'), 'ux_setting_api_endpoint_plan_callback','ux_general','ux_parametre_general');
    add_settings_field( 'ux_setting_api_endpoint_submit',__( 'Endpoint form submit'), 'ux_setting_api_endpoint_submit_callback','ux_general','ux_parametre_general');
    add_settings_field('ux_setting_api_key',__( 'Api key'), 'ux_setting_api_key_callback','ux_general','ux_parametre_general');

  register_setting(
    'ux_general_settings',
    'ux_settings_api'
  );

}
add_action( 'admin_init', 'ux_settings_page' );


function ux_settings_callback() {
?> 
<?php
}
$api_endpoint = get_option('ux_settings_api')['ux_setting_api_endpoint_plan'] ? get_option('ux_settings_api')['ux_setting_api_endpoint_plan'] : '';
$api_key = get_option('ux_settings_api')['ux_setting_api_key'] ? get_option('ux_settings_api')['ux_setting_api_key'] : '';  
$api_endpoint = get_option('ux_settings_api')['ux_setting_api_endpoint_submit'] ? get_option('ux_settings_api')['ux_setting_api_endpoint_submit'] : '';
 

function ux_setting_api_endpoint_plan_callback() {

  $options = get_option( 'ux_settings_api' );
  $endpoint_api = '';
  if( isset( $options[ 'ux_setting_api_endpoint_plan' ] ) ) {
    $endpoint_api = esc_html( $options['ux_setting_api_endpoint_plan'] );
  }
  $html = '<input type="text" class="form-control col-lg-4 col-md-6" id="ux_setting_api_endpoint_plan" name="ux_settings_api[ux_setting_api_endpoint_plan]" value="' . $endpoint_api . '"/>';
  echo $html;
}

function ux_setting_api_endpoint_submit_callback() {

    $options = get_option( 'ux_settings_api' );
    $endpoint_api = '';
    if( isset( $options[ 'ux_setting_api_endpoint_submit' ] ) ) {
      $endpoint_api = esc_html( $options['ux_setting_api_endpoint_submit'] );
    }
    $html = '<input type="text" class="form-control col-lg-4 col-md-6" id="ux_setting_api_endpoint_submit" name="ux_settings_api[ux_setting_api_endpoint_submit]" value="' . $endpoint_api . '"/>';
    echo $html;
  }

function ux_setting_api_key_callback() {

  $options = get_option( 'ux_settings_api' );
  $api_key = '';
  if( isset( $options[ 'ux_setting_api_key' ] ) ) {
    $api_key = esc_html( $options['ux_setting_api_key'] );
  }
 
  $html = '<input type="text" class="form-control col-lg-4 col-md-6" id="ux_setting_api_key" name="ux_settings_api[ux_setting_api_key]" value="' . $api_key . '"/>';
  echo $html;
}

  
?>
