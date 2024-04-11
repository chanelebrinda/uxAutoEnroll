
<style>
      .ux_div {
        padding: 60px 0 150px;
        display: flex; 
        justify-content: center;
      }
      
#head-ux-en .elementor-nav-menu__align-end .elementor-nav-menu ,#head-ux .elementor-nav-menu__align-end .elementor-nav-menu {    
    display: none; 
}
#head-ux-en .elementor-widget-button .elementor-button ,#head-ux .elementor-widget-button .elementor-button {
     display: none; 
}
#head-ux-en .elementor-menu-toggle,#head-ux .elementor-menu-toggle{
    display: none!important;
}
.elementor-widget-button .elementor-button{
     display: none; 
}
.elementor-location-footer .ux-footer{
    display:none;
}
@media only screen and (max-width: 767px){
    .ux_div {
        padding: 30px 0 50px;
    }
}

        h1 {
        text-align: center;
          color: #000;
          font-family:'Open Sans';
          font-weight: 700;
          font-size: 30px;
          margin-bottom: 20px;
        }
        h6 {
         text-align: center;
          color: #000; 
          font-weight: 400;
          font-size: 16px;
          margin-bottom: 20px;
        }
        p {
          color: #000;
          font-family: 'Open Sans';
          font-size:14px;
          margin: 10px;
          text-align: center;
        }
        ul {
          color: #000;
          font-family: 'Open Sans';
          font-size:14px;
          margin: 20px;
        }
      i {
        color: #9ABC66;
        font-size: 50px;
        line-height: 100px; 
      }
      .ux-card {
         max-width: 600px;
      }
     
    </style>
  <div class="ux_div">
      <div class="ux-card">
      <div style="width: 150px;margin: 20px auto;">
        <img src="<?php echo esc_url( UXP_DIR_URL .'assets/subscription_echec.png' ); ?>" >
      </div>

      <?php 
       $language = apply_filters( 'wpml_current_language', null );
        
       if($language == 'fr'){ ?>
       
             <h1><?php _e('Paiement échoué','ux-autoaenroll') ?></h1> 
             <p><?php _e('Oups! Un problème lors du traitement de votre paiement est survenu. Votre transaction n’a pas pu être conclue.','ux-autoaenroll')?></p>
             <p> <?php _e('Veuillez choisir votre plan de prix et remplir le formulaire à nouveau ou contacter notre équipe de soutien si vous avez des questions concernant le processus de paiement.','ux-autoaenroll') ?></p>
             <div class="ux-btn">
                 <a class="ux-btn-primary" href="<?php echo esc_url(home_url()) ?>"><?php _e('Réesayer','ux-autoaenroll') ?></a>
                 <a class="ux-btn-black" href="<?php echo esc_url(home_url('/contact')) ?>"> <?php _e('Nous contacter','ux-autoaenroll') ?></a>
             </div>
             
        <?php }else{ ?>
        
             <h1><?php _e('Payment failed','ux-autoaenroll')?></h1>  
             <p><?php _e('Oups! An issue occurred while processing your payment. Your transaction was not completed.','ux-autoaenroll')?></p>
             <p> <?php _e('Please select your pricing plan and fill out the form again. You can contact our team if you have any questions with regards to the payment process.','ux-autoaenroll') ?></p>
             <div class="ux-btn">
                 <a class="ux-btn-primary" href="<?php echo esc_url(home_url()) ?>"><?php _e('Try Again','ux-autoaenroll') ?></a>
                 <a class="ux-btn-black" href="<?php echo esc_url(home_url('/contact')) ?>"> <?php _e('Contact Us','ux-autoaenroll') ?></a>
             </div>

        <?php } ?>
      </div>

 </div>
  




   


   


   