
<?php

function ajaxsubstriptionplan_callback(){
   
  $language = apply_filters( 'wpml_current_language', null );
                         
  $country_id = sanitize_text_field( $_POST['country']);
  $state_id = sanitize_text_field( $_POST['state']);
    
  $stateinfo =  ux_select_unique('state_translations',$state_id); 
  $countryinfo =  ux_select_unique('country_translations',$country_id); 
  $langue = $countryinfo[0]->language_code;
  $countrycode = ux_select_unique('country', $countryinfo[0]->country_id );
  $statecode = ux_select_unique('state', $stateinfo[0]->state_id );

    // $server_url = "https://global-api-staging.uxpertise.ca/api/app/lms-auto-enroll-form/lms-auto-enroll-form-submit";
    // $api_key = "cYc9F9ELKfeDJhg4X7kGERI185iLObvdIKK4I76lXNsW84TBFZOof6ev6yPpuJdtJetgY4gPWwkYutuWTVfRLyjjDImzkWTWHxgiaJXgUP5dOxDQnJAshOP9S30vtTzs";
    
    $server_url = get_option('ux_settings_api')['ux_setting_api_endpoint_submit'] ? get_option('ux_settings_api')['ux_setting_api_endpoint_submit'] : '';
    $api_key = get_option('ux_settings_api')['ux_setting_api_key'] ? get_option('ux_settings_api')['ux_setting_api_key'] : '';  


    $headers = array(
      'Content-Type' => 'application/json',
      'X-API-Key' => $api_key, 
    );
 
        $data = array( 
            "portalOwnerFirstName" => sanitize_text_field( $_POST['name']) ,
            "portalOwnerLastName"=> sanitize_text_field( $_POST['surname']),
            "portalOwnerEmail"=> sanitize_email( $_POST['email']),
            "portalOwnerPhoneNumber"=> sanitize_text_field( $_POST['phone']),
            "lmsPortalName"=> sanitize_text_field( $_POST['name_c'] ),
            "lmsPortalPhoneNumber"=> sanitize_text_field( $_POST['phone_c']),
            "lmsPortalEmail"=> sanitize_email( $_POST['email_c'] ),
            "headOfficeAddress"=> [
              "addressLine1"=> sanitize_text_field( $_POST['address1_c']),
              //optional
              "addressLine2"=> isset($_POST['phone_c'] ) ? sanitize_text_field( $_POST['phone_c']) : '',
              "city"=> "Quebec",
              "zipCode"=> sanitize_text_field( $_POST['zipcode']), 
              "stateCode"=> $statecode[0]->province_code, 
              "countryCode"=> $countrycode[0]->country_code,
            ],
            "companyWebsite"=> sanitize_text_field( $_POST['website']),
            "lmsPortalSubdomain"=> sanitize_text_field( $_POST['subdomain']),
            "isMicrosoftSsoEnabled"=> true,
            "isFacebookSsoEnabled"=> true,
            "isGoogleSsoEnabled"=> true, 
            "defaultLanguageCode"=> 'fr',
            "emailMarketingOptIn"=> true, 
            "pricePlanId"=> sanitize_text_field( $_POST['pricePlanId']),
            "currency" => sanitize_text_field( $_POST['currency']),
            "paymentRecurrence"=> sanitize_text_field( $_POST['paymentRecurrence'])
        );
        // wp_send_json( $data);
        $response = wp_remote_post($server_url, array(
            "method"=>"POST",
            "sslverify"=>true,
            "headers"=>$headers,
            "body"=>json_encode($data),
            'timeout'   => 45,
            'data_format' => 'body',
        ));	
        $response_body = wp_remote_retrieve_body($response);

        if($response_body != null) {
          
            $resp_array = json_decode($response_body); 
               $result = array(
                    "statut"=>"success",
                    "result"=>$resp_array->stripeCheckOutUrl
                );  
        } else{ 

          $resp_array = json_decode($response_body);
          $result = array(
                "statut"=>"error",
                "result"=>$resp_array,
            );
        } 
 
    wp_send_json($result);
  }
  add_action( 'wp_ajax_nopriv_ajaxsubstriptionplan', 'ajaxsubstriptionplan_callback' );
  add_action( 'wp_ajax_ajaxsubstriptionplan', 'ajaxsubstriptionplan_callback' );

  

function substriptionplan_check(){

  
  $country_id = sanitize_text_field( $_POST['country_id']);
    
  $listestate =  ux_select_all_country($country_id); 
  $language = apply_filters( 'wpml_current_language', null );
  if($language == 'fr'){
      ob_start();
      ?>
      <label for="uxp_state" class="form-label"><?php _e('Province / État','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>                     
        <select id="uxp_state" class="form-select form-select-sm mb-3 " aria-label=".form-select-sm example" required>
            <option value=""><?php _e('sélectionnez')?></option>
            <?php 
            foreach($listestate as $state){?>
              <option value="<?php _e($state->id)?>"> <?php _e($state->label)?></option>
            <?php } ?>
          </select>
      <?php
      $ajax_out = ob_get_clean();

      wp_send_json( $ajax_out);

  }else{
      ob_start(); 
      ?>
      <label for="uxp_state" class="form-label"><?php _e('Province / State','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>                     
        <select id="uxp_state" class="form-select form-select-sm mb-3 " aria-label=".form-select-sm example" required>
            <option value=""><?php _e('select')?></option>
            <?php 
            foreach($listestate as $state){?>
              <option value="<?php _e($state->id)?>"> <?php _e($state->label)?></option>
            <?php } ?>
          </select>
      <?php
      $ajax_out = ob_get_clean();

      wp_send_json( $ajax_out);

  }

}
add_action( 'wp_ajax_nopriv_ajaxsubstriptioncheck', 'substriptionplan_check' );
 add_action( 'wp_ajax_ajaxsubstriptioncheck', 'substriptionplan_check' );
