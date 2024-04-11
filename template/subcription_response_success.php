
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
.elementor-widget-button .elementor-button{
     display: none; 
}
.elementor-location-footer .ux-footer{
    display:none;
}
#head-ux-en .elementor-menu-toggle,#head-ux .elementor-menu-toggle{
    display: none!important;
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
        <img src="<?php echo esc_url( UXP_DIR_URL .'assets/rocket-01.svg' ); ?>" >
      </div>

      <?php 
       $language = apply_filters( 'wpml_current_language', null );
        
       if($language == 'fr'){ ?>
       
             <h1><?php _e('Paiement complété','ux-autoaenroll')?></h1> 
             <h6><?php _e('Félicitations!','ux-autoaenroll')?></h6>
             <p> <?php _e('Nous sommes heureux de vous accueillir chez uxpertise. Voici les prochaines étapes:','ux-autoaenroll') ?></p>
             <ul> 
                 <li> <?php _e('Surveillez votre boite de réception, un courriel de bienvenue vous attend avec tout 
                 ce qu’il vous faut pour préparer à lancer votre plateforme uxpertise LMS.','ux-autoaenroll') ?></li>
                 <li> <?php _e('La création de votre plateforme est en cours! Dans les 24 à 48 heures ouvrables, 
                 vous recevrez une notification par courriel afin d’accéder à votre plateforme uxpertise LMS.','ux-autoaenroll') ?></li>
             </ul>
             
        <?php }else{ ?>
        
             <h1><?php _e('Payment Completed','ux-autoaenroll')?></h1>  
             <h6><?php _e('Congratulations!','ux-autoaenroll')?></h6>
             <p> <?php _e('We are excited to welcome you to uxpertise. Here are the next steps:','ux-autoaenroll') ?></p>
             <ul> 
                 <li> <?php _e('Keep an eye on your inbox, a welcome email is waiting for you with everything you need to get started with uxpertise LMS.','ux-autoaenroll') ?></li>
                 <li> <?php _e('The creation of your platform is underway! In the next 1-2 business days, you will receive an email notification to access your uxpertise LMS platform.','ux-autoaenroll') ?></li>
             </ul>

     <?php } ?>
      </div>
 </div>




    


   

   
   