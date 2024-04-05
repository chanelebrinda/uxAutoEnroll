<style>
      .ux_div {
        padding: 100px 0;
      }
        h1 {
          color: #ff3d00;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 800;
          font-size: 30px;
          margin-bottom: 10px;
          text-align: center;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:15px;
          margin: 0;
        }
      i {
        color: #ff3d00;
    font-size: 80px;
    line-height: 80px;
      }
      .card {
        background: #ffeaea;
      padding: 60px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #ffded3;
      display: inline-block;
      margin: 0 auto;
        }
    </style>
 <div class="ux_div">
      <div class="card">
      <div style="border-radius:200px; height:100px;display: flex;
    justify-content: center;width:100px; background: #F8FAF5; margin:10px auto;">
        <i class="checkmark">&times;</i>
      </div>
      <?php 
       $language = apply_filters( 'wpml_current_language', null );
       if($language == 'fr'){ ?>
        <h1><?php _e('Non succès de paiement ','ux-autoaenroll')?></h1> 
        <p> <?php _e('Oops! Nous avons rencontré un problème lors du traitement de votre paiement. Malheureusement, il semblerait que votre transaction n\'ait pas été complétée. Veuillez choisir votre plan de prix et remplir le formulaire à nouveau.  ','ux-autoaenroll') ?>
        </p>
        <a href="https://staging.uxpertise.ca/page-tarification/" ><?php _e('Réessayer','ux-autoaenroll')?></a>
        <p> <?php _e('Si vous avez rencontré des difficultés techniques ou si vous avez des questions concernant le processus de paiement, veuillez nous contacter sans hésitation. Notre équipe d\'assistance est là pour vous aider.  ','ux-autoaenroll') ?>
        </p><a href="http://staging.uxpertise.ca/contact/" ><?php _e('Nous contacter','ux-autoaenroll')?> </a>
        <?php }else{ ?>

          <h1><?php _e('Unsuccessful payment','ux-autoaenroll')?></h1> 
        <p> <?php _e('Oops! We\'ve had a problem processing your payment. Unfortunately, it appears that your transaction was not completed. Please select your price plan and complete the form again.','ux-autoaenroll') ?>
        </p>
        <a href="https://staging.uxpertise.ca/page-tarification/" ><?php _e('Réessayer','ux-autoaenroll')?></a>
        <p> <?php _e('If you have encountered any technical difficulties or have any questions regarding the payment process, please do not hesitate to contact us. Our support team is here to help you.  ','ux-autoaenroll') ?>
        </p><a href="http://staging.uxpertise.ca/contact/" ><?php _e('Contact us','ux-autoaenroll')?> </a>

        <?php } ?>
      </div>

 </div>