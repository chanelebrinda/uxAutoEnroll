




 

 <?php

$languageCode = 'fr';

$server_url = get_option('ux_settings_api')['ux_setting_api_endpoint_plan'] ? get_option('ux_settings_api')['ux_setting_api_endpoint_plan'] : '';
$api_key = get_option('ux_settings_api')['ux_setting_api_key'] ? get_option('ux_settings_api')['ux_setting_api_key'] : '';  

  // $server_url = 'https://global-api-staging.uxpertise.ca/api/app/lms-auto-enroll-form/price-plan-for-auto-enroll-form'; 
  // $api_key = "cYc9F9ELKfeDJhg4X7kGERI185iLObvdIKK4I76lXNsW84TBFZOof6ev6yPpuJdtJetgY4gPWwkYutuWTVfRLyjjDImzkWTWHxgiaJXgUP5dOxDQnJAshOP9S30vtTzs";

$headers = array(
  'Content-Type' => 'application/json',
  'X-API-Key' => $api_key, 
);
if (strpos($server_url, '?') !== false) {
  $server_url .= '&LanguageCode=' . urlencode($languageCode);
} else {
  $server_url .= '?LanguageCode=' . urlencode($languageCode);
}

$response = wp_remote_get($server_url, array(
  "method"        =>"GET",  
  'redirection'   => 10,
  "sslverify"     =>true,
  "headers"       =>$headers,  
  'timeout'       => 45,
));	 

  $response_body = wp_remote_retrieve_body($response);
  
if( $response_body == "ApiKey not found") { 
  $error = $response_body;
  $result = $error;
}else{
  
    $resp_array = json_decode($response_body);
    $result = $resp_array->pricePlans;  
    
}

?>
<style>
.card-body {
flex: 1 1 auto;
padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
color: var(--bs-card-color);
background: #fff;
border-radius: 8px;
/* border-radius: 8px;box-shadow: 0 1rem 2rem rgba(0,0,0,.100) */
}

.list-group-flush  {
color: #393B41;
padding: 20px;
}

.list-group-flush li { 
padding: 10px 0;
}

.list-group-flush li:before { 
/* content: '';
display: inline-block;
width: 12px;
height: 12px;
background-color: #6a4d93;
transform: rotate(45deg);
position: absolute;
left: 0;
top: 5px; */
}

/* .list-enable{
color: #dbdbdb; */
/* } */
/* ::selection {
color: #fff;
} */

.ribbon {
width: 150px;
height: 150px;
position: absolute;
top: -10px;
left: -10px;
overflow: hidden;
}

.ribbon::before,
.ribbon::after {
position: absolute;
content: "";
z-index: -1;
display: block;
border: 7px solid #6a4d93;
border-top-color: transparent;
border-left-color: transparent;
}

.ribbon::before {
top: 0px;
right: 15px;
}

.ribbon::after {
bottom: 15px;
left: 0px;
}

.ribbon span {
position: absolute;
top: 30px;
right: 0;
transform: rotate(-45deg);
width: 200px;
background: #6a4d93;
padding: 10px 0;
color: #fff;
text-align: center;
font-size: 17px;
box-shadow: 0 5px 10px rgba(0, 0, 0, 0.12);
}
</style>


<div class="uxp_subscription_responce"></div>

<div class="container-fluid">

<?php if(is_array($result)){?>
<div class="wrapper">
<div class="buttonWrapper">
  <div class="d-flex flex-row">
    <div class="plans_type">
      <?php _e('CAD','ux-autoaenroll') ?>
    </div>
    <label class="toggle">
      <input name="toggleswitch" id="toggleswitch" type="checkbox">
      <span class="roundbutton"></span>
    </label>
    <div class="plans_type">
      <?php _e('USD','ux-autoaenroll') ?>
    </div>
  </div>
  <div class="d-flex flex-row px-3">
    <div class="plans_type">
      <?php _e('Mois','ux-autoaenroll') ?>
    </div>
    <label class="toggle">
      <input id="toggleswitch" type="checkbox">
      <span class="roundbutton"></span>
    </label>
    <div class="plans_type">
      <?php _e('Année','ux-autoaenroll') ?>
    </div>
  </div>
</div>
<div class="subcontent">
  <div class="contentWrapper currency">
    <div class="content active" id="home">
    <div class="row" style="display: flex;justify-content:center">
        <?php foreach ($result as $plan){   
                
                $shadow = $plan->title =="Base" ? "shadow-lg ": "shadow-none";
         ?>

        <div class="col-xl col-lg-3 col-md-4 col-sm-6 mb-4 ux_col_plan">
          <div class="card <?php echo $shadow ?>" style="border-radius: 8px;">
            <div class="card-body">
              <div class="text-center pt-3 content_plan_card">
                <div class="ib_pricing_icon_box"><span class="jet-elements-icon"><i aria-hidden="true"
                      class="fas fa-signal"></i></span></div>
                <h2 class="ib_pricing_table_title pt-2">
                  <?php esc_html_e( $plan->title) ?>
                </h2>
                <h6 class="ib_pricing_table">
                  <?php esc_html_e( $plan->subTitle) ?>
                </h6>
              </div>
              <?php
                      if($plan->title =="Base"){?>
              <div class="ribbon"><span>Populaire</span></div>
              <?php } ?>
              <div class="ib_pricing__price">
                <div class="contenu">
                  <?php  if($plan->isFreeTrialEnabled == true){ ?>
                    <div class="free">
                        <span class="ib_pricing__price_val">
                          <?php _e( 'Gratuit','ux-autoaenroll') ?>
                        </span>
                    </div>
                  <?php }else if($plan->isCustomPlan){?>
                    <div class="free">
                      <span class="ib_pricing__custum_price">
                        <?php _e('Nous trouverons le plan idéal pour vous','ux-autoaenroll') ?>
                      </span>
                    </div>

                  <?php }else{  

                          $check = $plan->pricePlanPrices[0]->currency; 
                          if(  $check == "CAD"){
                             $price = $plan->pricePlanPrices[0];
                          }else{
                             $price = $plan->pricePlanPrices[1];
                          }
                         
                        ?>
                 
                  <span class="ib_pricing__price_val">
                    <?php esc_html_e( $price->monthlyPrice) ?>
                  </span> 
                  <span class="ib_pricing__price_prefix">$
                     <small style="display:block; font-size: 10px;padding:0">CAD</small>
                  </span>
                  <span class="ib_pricing__price_suffix">
                    <?php _e('/ mois','ux-autoaenroll') ?>
                  </span>
                </br>
                  <span class="ib_pricing__price_suffix">
                    <?php _e('facturé mensuellement','ux-autoaenroll') ?>
                  </span>
                  
                  </br>
                  <span class="ib_pricing__price_suffix_user"><strong>*
                      <?php echo number_format( $price->pricePerExceedingUser,2,".",",") ?>
                    </strong>
                    <?php _e('CAD par utilisateur supplémentaire/ mois','ux-autoaenroll') ?>
                  </span>
                  <?php }?>
                </div>
                <div class="ux-autonroll">
                  <?php if($plan->isCustomPlan){   ?>
                  <a href="<?php echo esc_url( home_url( '/contact' )) ?>" class="btn submit_subcription_btn">
                    <?php _e('Contactez-nous','ux-autoaenroll') ?>
                  </a>
                  <?php }else{
                              $url  =  get_permalink(get_page_by_path( 'abonnement' )) ; ?>
                  <form class="uxp_plan"
                    action="<?php echo esc_url( add_query_arg( array('plan_id'=> $plan->pricePlanId,'is_free'=> $plan->isFreeTrialEnabled,'paymentRecurrence'=> 0,'currency'=> 'CAD') , $url)) ?>"
                    data_currency="CAD" data_plan_name="<?php esc_html_e( $plan->title) ?>"
                    plan_sub_name="<?php esc_html_e( $plan->subTitle) ?>"
                    data_plan_id="<?php esc_html_e($plan->pricePlanId) ?>"
                    data_plan_price="<?php esc_html_e(  $price->monthlyPrice) ?>"
                    date_recurence="0" method="post">
                    <button type="submit" class="btn submit_subcription_btn">
                      <?php _e('S\'abonner','ux-autoaenroll') ?>
                    </button>
                  </form>
                  <?php  } ?>
                </div>
              </div>
              <ul class="list-group list-group-flush"  >

                <?php $plandescriptions = $plan->pricePlanDescriptionItems; 
                          foreach ($plandescriptions as  $plandescription){

                            if( !$plandescription->isEnabled ){
                              ?>

                <li class=" list-enable " > 
                  <span class="" >
                    <?php esc_html_e( $plandescription->description,'ux-autoaenroll') ?>
                  </span>
                </li>
                <?php } else {?>
                <li class="" >
                  <?php esc_html_e( $plandescription->description,'ux-autoaenroll') ?>
                </li>
                <?php } ?>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>

        <?php } ?>
      </div>
    </div>
    <div class="content " id="about">
    <div class="row" style="display: flex;justify-content:center">

        <?php foreach ($result as  $plan){   
          
                  $shadow = $plan->title =="Base" ? "shadow-lg ": "shadow-none";
                  ?>

        <div class="col-xl col-lg-3 col-md-4 col-sm-6 mb-4 ux_col_plan">
          <div class="card <?php echo $shadow ?>" style="border-radius: 8px;">
            <div class="card-body">
              <div class="text-center pt-3 content_plan_card">
                <div class="ib_pricing_icon_box"><span class="jet-elements-icon"><i aria-hidden="true"
                      class="fas fa-signal"></i></span></div>
                <h2 class="ib_pricing_table_title pt-2">
                  <?php esc_html_e( $plan->title,'ux-autoaenroll') ?>
                </h2>
                <h6 class="ib_pricing_table">
                  <?php esc_html_e( $plan->subTitle,'ux-autoaenroll') ?>
                </h6>
              </div>
              <?php
                      if($plan->title =="Base"){?>
              <div class="ribbon"><span>Populaire</span></div>
              <?php } ?>
              <div class="ib_pricing__price">
                <div class="contenu">
                  <?php  if($plan->isFreeTrialEnabled == true){ ?>
                    <div class="free">
                      <span class="ib_pricing__price_val">
                        <?php _e( 'Gratuit','ux-autoaenroll') ?>
                      </span>
                    </div>
                  <?php }else if($plan->isCustomPlan){?>
                    <div class="free">
                        <span class="ib_pricing__custum_price">
                          <?php _e('Nous trouverons le plan idéal pour vous','ux-autoaenroll') ?>
                        </span>
                    </div>
                  <?php }else{  
                 
                          
                          $check = $plan->pricePlanPrices[0]->currency; 
                          if(  $check == "CAD"){
                            $price = $plan->pricePlanPrices[0] ;

                          }else{
                            $price = $plan->pricePlanPrices[1] ;
                          }
                         
                          ?>
                 
                  <span class="ib_pricing__price_val">
                    <?php esc_html_e( $price->annualMonthlyPrice) ?>
                  </span> 
                  <span class="ib_pricing__price_prefix">$<small
                      style="display:block; font-size: 10px;padding:0">CAD</small></span>
                      <span class="ib_pricing__price_suffix">
                    <?php _e('/ mois','ux-autoaenroll') ?>
                  </span>
                  </br>
                  <span class="ib_pricing__price_suffix">
                    <?php _e('facturé annuellement','ux-autoaenroll') ?>
                  </span>
                  </br>

                  <span class="ib_pricing__price_suffix_user"><strong>*
                      <?php echo number_format( $price->pricePerExceedingUser,2,".",",") ?>
                    </strong>
                    <?php _e('CAD par utilisateur supplémentaire/ mois','ux-autoaenroll') ?>
                  </span>
                  <?php } ?>
                  
              </div>
                  <div class="ux-autonroll">
                    <?php if($plan->isCustomPlan){   ?>
                    <a href="<?php echo esc_url( home_url( '/contact' )) ?>" class="btn submit_subcription_btn">
                      <?php _e('Contactez-nous','ux-autoaenroll') ?>
                    </a>
                    <?php }else{
                                $url  =  get_permalink(get_page_by_path( 'abonnement' )) ; ?>
                    <form class="uxp_plan"
                      action="<?php echo esc_url( add_query_arg( array('plan_id'=> $plan->pricePlanId,'paymentRecurrence'=> 1,'is_free'=> $plan->isFreeTrialEnabled,'currency'=> 'CAD') , $url)) ?>"
                      data_currency="CAD" data_plan_name="<?php esc_html_e( $plan->title) ?>"
                      plan_sub_name="<?php esc_html_e( $plan->subTitle) ?>"
                      data_plan_id="<?php esc_html_e($plan->pricePlanId) ?>"
                      data_plan_price="<?php esc_html_e( $price->annualPrice) ?>"
                      date_recurence="1" method="post">
                      <button type="submit" class="btn submit_subcription_btn">
                        <?php _e('S\'abonner','ux-autoaenroll') ?>
                      </button>
                    </form>
                    <?php  } ?>
                  </div>
                </div>

              <ul class="list-group list-group-flush">

                <?php $plandescriptions = $plan->pricePlanDescriptionItems; 
                            foreach ($plandescriptions as  $plandescription){

                   if( !$plandescription->isEnabled ){  ?>

                        <li class="list-enable" >
                          <span class="">
                            <?php esc_html_e( $plandescription->description) ?>
                          </span>
                        </li>
                 <?php } else {?>
                        <li class=" " >
                          <?php esc_html_e( $plandescription->description) ?>
                        </li>
                   <?php } ?>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>

        <?php } ?>
      </div>
    </div>
  </div>
  <div class="contentWrapper" id="test">
    <div class="content active" id="home">
    <div class="row" style="display: flex;justify-content:center">

        <?php foreach ($result as $plan){   

                $shadow = $plan->title =="Base" ? "shadow-lg ": "shadow-none";
                ?>


        <div class="col-xl col-lg-3 col-md-4 col-sm-6 mb-4 ux_col_plan">
          <div class="card <?php echo $shadow ?>" style="border-radius: 8px;">
            <div class="card-body">
              <div class="text-center pt-3 content_plan_card">
                <div class="ib_pricing_icon_box"><span class="jet-elements-icon"><i aria-hidden="true"
                      class="fas fa-signal"></i></span></div>
                <h2 class="ib_pricing_table_title pt-2">
                  <?php esc_html_e( $plan->title) ?>
                </h2>
                <h6 class="ib_pricing_table">
                  <?php esc_html_e( $plan->subTitle) ?>
                </h6>
              </div>
              <?php
                      if($plan->title =="Base"){?>
              <div class="ribbon"><span>Populaire</span></div>
              <?php } ?>
              <div class="ib_pricing__price">
                <div class="contenu">
                  <?php  if($plan->isFreeTrialEnabled == true){ ?>
                    <div class="free">
                      <span class="ib_pricing__price_val">
                        <?php _e( 'Gratuit','ux-autoaenroll') ?>
                      </span>
                    </div>
                  <?php }else if($plan->isCustomPlan){?>
                    <div class="free">
                        <span class="ib_pricing__custum_price">
                          <?php _e('Nous trouverons le plan idéal pour vous','ux-autoaenroll') ?>
                        </span>
                    </div>
                  <?php }else{  
                         $check = $plan->pricePlanPrices[0]->currency; 
                         if(  $check == "USD"){
                           $price = $plan->pricePlanPrices[0] ;

                         }else{
                           $price = $plan->pricePlanPrices[1] ;
                         }
                         ?>
                  
                  <span class="ib_pricing__price_val">
                    <?php esc_html_e( $price->monthlyPrice) ?>
                  </span> 
                  <span class="ib_pricing__price_prefix">$ <small
                      style="display:block; font-size: 10px;padding:0">USD</small>
                    </span>
                    <span class="ib_pricing__price_suffix">
                    <?php _e('/ mois','ux-autoaenroll') ?>
                  </span>
                  </br>
                  <span class="ib_pricing__price_suffix">
                    <?php _e('facturé mensuellement','ux-autoaenroll') ?>
                  </span>
                  </br>
                  <span class="ib_pricing__price_suffix_user"><strong>*
                      <?php echo number_format( $price->pricePerExceedingUser,2,".",",") ?>
                    </strong>
                    <?php _e('USD par utilisateur supplémentaire/ mois','ux-autoaenroll') ?>
                  </span>
                  <?php }?>

                  </div>
                  <div class="ux-autonroll">
                    <?php if($plan->isCustomPlan){   ?>
                    <a href="<?php echo esc_url( home_url( '/contact' )) ?>" class="btn submit_subcription_btn">
                      <?php _e('Contactez-nous','ux-autoaenroll') ?>
                    </a>
                    <?php }else{
                              $url  =  get_permalink(get_page_by_path( 'abonnement' )) ; ?>
                    <form class="uxp_plan"
                      action="<?php echo esc_url( add_query_arg( array('plan_id'=> $plan->pricePlanId,'paymentRecurrence'=> 0,'is_free'=> $plan->isFreeTrialEnabled ,'currency'=> 'USD') , $url)) ?>"
                      data_currency="USD" data_plan_name="<?php esc_html_e( $plan->title) ?>"
                      plan_sub_name="<?php esc_html_e( $plan->subTitle) ?>"
                      data_plan_id="<?php esc_html_e($plan->pricePlanId) ?>"
                      data_plan_price="<?php esc_html_e($price->monthlyPrice) ?>"
                      date_recurence="0" method="post">
                      <button type="submit" class="btn submit_subcription_btn">
                        <?php _e('S\'abonner','ux-autoaenroll') ?>
                      </button>
                    </form>
                    <?php  } ?>
                  </div>
                </div>

              <ul class="list-group list-group-flush">

                <?php $plandescriptions = $plan->pricePlanDescriptionItems; 
                          foreach ($plandescriptions as  $plandescription){

                            if( !$plandescription->isEnabled ){
                              ?>

                <li class=" list-enable " ><span class="">
                    <?php esc_html_e( $plandescription->description,'ux-autoaenroll') ?>
                  </span>
                </li>
                <?php } else {?>
                <li class=" " >
                  <?php esc_html_e( $plandescription->description,'ux-autoaenroll') ?>
                </li>
                <?php } ?>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>

        <?php } ?>
      </div>
    </div>
    <div class="content " id="about">
    <div class="row" style="display: flex;justify-content:center">

        <?php foreach ($result as  $plan){   

                    $shadow = $plan->title =="Base" ? "shadow-lg ": "shadow-none";
                  ?>

        <div class="col-xl col-lg-3 col-md-4 col-sm-6 mb-4 ux_col_plan">
          <div class="card <?php echo $shadow ?>" style="border-radius: 8px;">
            <div class="card-body">
              <div class="text-center pt-3 content_plan_card">
                <div class="ib_pricing_icon_box"><span class="jet-elements-icon"><i aria-hidden="true"
                      class="fas fa-signal"></i></span></div>
                <h2 class="ib_pricing_table_title pt-2">
                  <?php esc_html_e( $plan->title,'ux-autoaenroll') ?>
                </h2>
                <h6 class="ib_pricing_table">
                  <?php esc_html_e( $plan->subTitle,'ux-autoaenroll') ?>
                </h6>
              </div>
              <?php
                      if($plan->title =="Base"){?>
              <div class="ribbon"><span>Populaire</span></div>
              <?php } ?>

              <div class="ib_pricing__price">
                <div class="contenu">
                  <?php  if($plan->isFreeTrialEnabled == true){ ?>
                    <div class="free">
                        <span class="ib_pricing__price_val">
                          <?php _e( 'Gratuit','ux-autoaenroll') ?>
                        </span>
                    </div>
                  <?php }else if($plan->isCustomPlan){?> 
                    <div class="free">
                        <span class="ib_pricing__custum_price">
                          <?php _e('Nous trouverons le plan idéal pour vous','ux-autoaenroll') ?>
                        </span>
                    </div>
                  <?php }else{  
                          
                          $check = $plan->pricePlanPrices[0]->currency; 
                          if(  $check == "USD"){
                            $price = $plan->pricePlanPrices[0] ;

                          }else{
                            $price = $plan->pricePlanPrices[1] ;
                          }
                          
                          ?>

                  
                  <span class="ib_pricing__price_val">
                    <?php esc_html_e( $price->annualMonthlyPrice) ?>
                  </span> 
                  <span class="ib_pricing__price_prefix">$<small
                      style="display:block; font-size: 10px;padding:0">USD</small>
                    </span>
                    <span class="ib_pricing__price_suffix">
                    <?php _e('/ mois','ux-autoaenroll') ?>
                  </span>
                    </br>
                  <span class="ib_pricing__price_suffix">
                    <?php _e('facturé annuellement','ux-autoaenroll') ?>
                  </span>
                  </br>
                  <span class="ib_pricing__price_suffix_user">
                    <strong>*
                      <?php echo number_format( $price->pricePerExceedingUser,2,".",",") ?>
                    </strong>
                    <?php _e('USD par utilisateur supplémentaire/ mois','ux-autoaenroll') ?>
                  </span>
                  <?php } ?>

                  </div>
                  <div class="ux-autonroll">
                    <?php if($plan->isCustomPlan){   ?>
                    <a href="<?php echo esc_url( home_url( '/contact' )) ?>" class="btn submit_subcription_btn">
                      <?php _e('Contactez-nous','ux-autoaenroll') ?>
                    </a>
                    <?php }else{
                              $url  =  get_permalink(get_page_by_path( 'abonnement' )) ; 
                             ?>
                    <form class="uxp_plan"
                      action="<?php echo esc_url( add_query_arg( array('plan_id'=> $plan->pricePlanId,'paymentRecurrence'=> 1,'is_free'=> $plan->isFreeTrialEnabled,'currency'=> 'USD') , $url)) ?>"
                      data_currency="USD" data_plan_name="<?php esc_html_e( $plan->title) ?>"
                      plan_sub_name="<?php esc_html_e( $plan->subTitle) ?>"
                      data_plan_id="<?php esc_html_e($plan->pricePlanId) ?>"
                      data_plan_price="<?php esc_html_e( $price->annualPrice) ?>"
                      date_recurence="1" method="post">
                      <button type="submit" class="btn submit_subcription_btn">
                        <?php _e('S\'abonner','ux-autoaenroll') ?>
                      </button>
                    </form>
                    <?php  } ?>
                  </div>
              </div>

              <ul class="list-group list-group-flush">

                <?php $plandescriptions = $plan->pricePlanDescriptionItems; 
                              foreach ($plandescriptions as  $plandescription){

                              if( !$plandescription->isEnabled ){
                                ?>

                <li class=" list-enable " ><span class="">
                    <?php esc_html_e( $plandescription->description) ?>
                  </span>
                </li>
                <?php } else {?>
                <li class=" " >
                  <?php esc_html_e( $plandescription->description) ?>
                </li>
                <?php } ?>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>

        <?php } ?>
      </div>
    </div>
  </div>
</div>
</div>

<?php }else{?>
<h4> Une erreur c'est produite
<?php echo $result ?>
</h4>
<?php }?>

</div>