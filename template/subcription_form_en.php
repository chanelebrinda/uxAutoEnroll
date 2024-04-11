
 
<?php
 $id_plan = $_GET['plan_id'];
 $paymentRecurrence = $_GET['paymentRecurrence'];
 $currency = $_GET['currency'];
 $is_free = $_GET['is_free'];

?>
   <div class="ux-order-subcription">  
      <div id="ux_order_expertise">
        
      </div>
      <div> 
         <h1 class="ux-entry-title"><?php // _e('Checkout','ux-autoaenroll') ?></h1> 
     </div>
     
     <style>
#head-ux-en .elementor-nav-menu__align-end .elementor-nav-menu ,#head-ux .elementor-nav-menu__align-end .elementor-nav-menu {    
    display: none; 
}
#head-ux-en .elementor-widget-button .elementor-button ,#head-ux .elementor-widget-button .elementor-button {
     display: none; 
}
.button { 
    /* Important part */
    position: relative;
    transition: padding-right .3s ease-out;
}
.button.ux_loading {
    background-color: #fff;
    padding-right: 40px;
}
.button.ux_loading:after {
    content: "";
    position: absolute;
    border-radius: 100%;
    right: 6px;
    top: 50%;
    width: 0px;
    height: 0px;
    margin-top: -2px;
    border: 2px solid rgba(255,255,255,0.5);
    border-left-color: #FFF;
    border-top-color: #FFF;
    animation: spin .6s infinite linear, grow .3s forwards ease-out;
}

@keyframes spin { 
    to {
        transform: rotate(359deg);
    }
}
@keyframes grow { 
    to {
        width: 14px;
        height: 14px;
        margin-top: -8px;
        right: 13px;
    }
}
td{
  background-color: white;
}
     </style>


    <div class="ux_subcrition">
      <div class="ux_subcrition-notices-wrapper"></div> 
          <form name="checkout" method="post" class="uxp_subcription_form"
            action="" enctype="multipart/form-data">
              <input type="hidden" value="<?php esc_html_e( $id_plan ) ?>" id="pricePlanId">
              <input type="hidden" value="<?php esc_html_e( $paymentRecurrence ) ?>" id="uxp_paymentRecurrence">
              <input type="hidden" value="<?php esc_html_e( $currency ) ?>" id="uxp_currency">
              <input type="hidden" value="<?php esc_html_e( $is_free ) ?>" id="uxp_free">
              <input type="hidden" value="en" id="uxp_language">

            <!-- checkout page -->
            <div class="uxp__checkout"> 
              <div class="uxp-billing-item">
                <div class="ux_subcrition_billing_fields">

                  <h3><?php _e('Order details','ux-autoaenroll') ?> </h3>

                  <div class="ux_subcrition-billing-fields__field-wrapper">
                      <div class="row g-3">
                      <h5 class="uxp_company_information"><?php _e('Personal information ','ux-autoaenroll') ?></h5>

                        <div class="col-sm-6">
                          <label for="uxp_firstName" class="form-label"><?php _e('First name','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="text" class="form-control" id="uxp_firstName" placeholder="" value="" required>
                        </div>

                        <div class="col-sm-6">
                          <label for="uxp_lastName" class="form-label"><?php _e('Last name','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="text" class="form-control" id="uxp_lastName" placeholder="" value="" required>
                        </div>

                      
                       <div class="col-sm-6">
                          <label for="uxp_email" class="form-label"><?php _e('Email','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="email" class="form-control" id="uxp_email" name="uxp_email" placeholder="john@example.com" required>
                          <div class=" invalid-text" id="email_error" style="color:#ca0000;font-weight:500;font-size: 13px;text-align:left">
                            <?php _e('You must enter a professional e-mail address ex:john@example.com','ux-autoaenroll')?>
                          </div>
                        </div>  
                        <div class="col-sm-6">
                          <label for="uxp_telephone" class="form-label"><?php _e('Phone','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="tel" class="form-control" name="uxp_telephone" id="uxp_telephone" placeholder=" ">
                          <div class=" invalid-text" id="phone_error" style="color:#ca0000;font-weight:500;font-size: 13px;text-align:left">
                            <?php _e('You must enter a valid phone number','ux-autoaenroll')?>
                          </div>
                        </div>
 
                        <h5 class="uxp_company_information"><?php _e('Company Information','ux-autoaenroll') ?></h5>

                        <div class="col-sm-12">
                          <label for="uxp_lmsPortalName" class="form-label"><?php _e('Company name')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="text" class="form-control" name="uxp_lmsPortalName" id="uxp_lmsPortalName" placeholder="" value="" required>
                          <div class="invalid-text" id="uxp_lmsPortalName_error" style="color:#ca0000;font-weight:500;font-size: 13px;text-align:left">
                            <?php _e('You must enter a name without special characters ex: Example website or example-wesite','ux-autoaenroll')?>
                          </div>
                        </div>

                      
                       <div class="col-sm-6">
                          <label for="uxp_lmsPortalEmail" class="form-label"><?php _e('Email','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="email" class="form-control" name="uxp_lmsPortalEmail" id="uxp_lmsPortalEmail" placeholder="john@exemple.com" required>
                          <div class="invalid-text" id="uxp_email_error" style="color:#ca0000;font-weight:500;font-size: 13px;text-align:left">
                            <?php _e('You must enter a professional e-mail address ex:john@exemple.com','ux-autoaenroll')?>
                          </div>
                        </div> 
                        

                        <div class="col-sm-6">
                          <label for="uxp_lmsPortalPhoneNumber" class="form-label"><?php _e('Phone','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="tel" class="form-control" name="uxp_lmsPortalPhoneNumber" id="uxp_lmsPortalPhoneNumber" placeholder=" ">
                          <div class=" invalid-text" id="phone_error_lms" style="color:#ca0000;font-weight:500;font-size: 13px;text-align:left">
                            <?php _e('You must enter a valid phone number','ux-autoaenroll')?>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <label for="uxp_addressLine1" class="form-label"><?php _e('Address line 1','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="text" class="form-control" id="uxp_addressLine1" placeholder="" >
                        </div>
                        <div class="col-sm-6">
                          <label for="uxp_addressLine2" class="form-label"><?php _e('Address line 2','ux-autoaenroll')?></label>
                          <input type="text" class="form-control" id="uxp_addressLine2" placeholder="" >
                        </div>
                        <?php 
                          $countries =  ux_select_all('country_translations'); 
                          $states =  ux_select_all('state_translations'); 
                          
                          // var_dump(ux_select_all_country(244));
                           ?>
                        
                        <div class="col-sm-6">
                          <label for="uxp_country" class="form-label"><?php _e('Country','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>   
                          <select id="uxp_country" class="form-select form-select-sm mb-3 uxp_country" aria-label=".form-select-sm example" required>
                            <option value=""><?php _e('select','ux-autoaenroll')?></option>
                            <?php 
                            foreach($countries as $country){?>
                              <option value="<?php _e($country->country_id)?>"> <?php _e($country->label)?></option>
                            <?php } ?>
                          </select>
                        </div>

                        <div class="col-sm-6 uxp_add_select" >
                          <label for="uxp_state" class="form-label"><?php _e('Province / State','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <select id="uxp_state" class="form-select form-select-sm mb-3 " aria-label=".form-select-sm example" disabled>
                            <option value=""><?php _e('select','ux-autoaenroll')?></option>
                            <?php 
                            foreach($states as $state){?>
                              <option value="<?php _e($state->id)?>"> <?php _e($state->label)?></option>
                            <?php } ?>
                          </select>
                        </div>

                        <div class="col-sm-6">
                          <label for="uxp_city" class="form-label"><?php _e('City','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="text" class="form-control" id="uxp_city" placeholder="">
                        </div>

                        <div class="col-sm-6">
                          <label for="uxp_zipCode" class="form-label"><?php _e('Postal Code ','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                          <input type="text" class="form-control" name="uxp_zipCode"  id="uxp_zipCode" placeholder="" required>
                            <div class="invalid-text" id="ux_zipcode" style="color:#ca0000;font-weight:500;font-size: 13px;text-align:left">
                           <?php _e('You must enter a correct code','ux-autoaenroll')?>
                          </div>
                        </div>   
                        <div class="col-sm-12">
                           <label for="uxp_companyWebsite" class="form-label"><?php _e('Company website','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small></label>
                           <input type="text" class="form-control" name="uxp_companyWebsite" id="uxp_companyWebsite" placeholder="www.example.com" required>
                            <div class="invalid-text" id="uxp_website" style="color:#ca0000;font-weight:500;font-size: 13px;text-align:left">
                              <?php _e('You must enter a correct url www.exemple.com or exemple.com"','ux-autoaenroll')?>
                           </div>
                        </div>
                        
                        <label for="uxp_lmsPortalSubdomain" class="form-label"><?php _e('Sub-domain','ux-autoaenroll')?><small class="text-mute" style="color:#6a4d93;padding-left:2px"> *</small>
                        <small  class="ux_tooltip">
                           <small  data-title="The subdomain will be the URL used for your LMS platform." >
                              <img src="<?php echo  UXP_DIR_URL.'includes/question.png' ?>" alt="" width="15">
                          </small>
                        </small>
                        </label> 
                        <div class="m-0 d-flex flex-row align-items-center">
                             <input type="text" class="form-control" value="" name="uxp_lmsPortalSubdomain" id="uxp_lmsPortalSubdomain" style="height:40px" placeholder="" required>
                             <div class="px-1">.uxpertiselms.com</div>
                        </div>   


                    </div>
 
                  </div>

                </div>
              </div>
               
              <div class="uxp-order-item">

                <h3 id="order_review_heading"><?php _e('Your order','ux-autoaenroll')?></h3>

                <div id="order_review" class="ux_subcrition-checkout-review-order">
                  <table class="shop_table ux_subcrition-checkout-review-order-table">
                    <thead>
                  
                    </thead>
                    <tbody>
                      <tr class="cart_item">
                        <td class="product-name">
                          <small class="uxp_plan_name"></small> 
                         &nbsp;<small class="product-quantity"></small></td>
                        <td class="product-total">
                          <small class="subscription-price"><small class="ux_subcrition-Price-amount amount"><bdi><small
                                  class="ux_subcrition-Price-currencySymbol">&#36;</small><small class="uxp_plan_price"></small></bdi></small> <small
                              class="subscription-details"> / <small class="uxp_plan_recurence"></small></small></small>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>

                      <tr class="cart-subtotal">
                        <th><?php _e('Sub-total','ux-autoaenroll')?></th>
                        <td><small class="ux_subcrition-Price-amount amount"><bdi><small
                                class="ux_subcrition-Price-currencySymbol">&#36;</small><small class="uxp_plan_price"></small></bdi></small></td>
                      </tr>






                      <tr class="order-total uxp_order-total">
                        <th><?php _e('Total','ux-autoaenroll')?></th>
                        <td>
                          <strong><small class="ux_subcrition-Price-amount amount"><bdi>
                            <small class="ux_subcrition-Price-currencySymbol">&#36;</small>
                            <small class="uxp_plan_price"></small></bdi>
                          </small></strong> <small style="display:block; font-size: 12px" class="uxp_plan_currency"></small>
                       </td>
                      </tr>


                    
                  
                      <!-- <tr class="order-total recurring-total">

                        <th rowsmall="1">Total recurring</th>
                        <td data-title="Recurring total">
                          <div class="first-payment-date"><small>Renewal within <small class="uxp_plan_recurence"> </small></div><small
                            class="ux_subcrition-Price-amount amount"><small
                              class="ux_subcrition-Price-currencySymbol">&#036;</small><small class="uxp_plan_price"></small></small> / <small class="uxp_plan_recurence"></small>
                        </td>
                      </tr> -->
                    </tfoot>
                  </table>

                  <div id="payment"  >
                     <button type="submit" class="button ib_confirme" 
                        value="Buy Now" ><?php _e('Subscribe ','ux-autoaenroll')?>
                       </button> 
                    </div>
                  </div>
                </div>

           </div>
              <!-- end checkout order item -->

            </div>
            <!-- end checkout page -->
          </form>

    </div>
</div>

     

 

 

 
 
