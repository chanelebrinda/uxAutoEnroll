<style>
      .ux_div {
        padding: 100px 0;
      }
        h1 {
        text-align: center;
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 800;
          font-size: 30px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:15px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 50px;
        line-height: 100px; 
      }
      .card {
        padding: 60px;
    border-radius: 4px;
    box-shadow: 0 2px 3px #d1ffd3;
    display: inline-block;
    margin: 0 auto;
    background: #d3edeb;
      }
    </style>
 <div class="ux_div">
      <div class="card">
      <div style="border-radius:200px;height:100px;width:100px;display: flex;justify-content: center;background: #F8FAF5;margin:10px auto;">
        <i class="checkmark">✓</i>
      </div>

      <?php 
       $language = apply_filters( 'wpml_current_language', null );
       if($language == 'fr'){ ?>
         <h1><?php _e('Succès de paiement ','ux-autoaenroll')?></h1> 
         <p> <?php _e('Félicitations ! Nous sommes ravis de vous informer que votre paiement a été effectué avec succès.','ux-autoaenroll') ?></p>
         <p> <?php _e('L\'équipe uxpertise vous remercie d\'avoir choisi uxpertise LMS pour répondre à vos besoins. 
            Nous avons le plaisir de vous accueillir officiellement sur votre plateforme dans les prochaines 24 à 48 heures ouvrables. Votre compte a été créé et est en cours de configuration, vous pourrez y accéder et profiter de toutes les fonctionnalités que nous offrons très bientôt! 
            Vous recevrez prochainement un courriel de bienvenue contenant les détails de votre compte, ainsi que des instructions pour vous connecter à votre plateforme. Ce courriel vous permettra d\'accéder à votre espace personnel, où vous pourrez commencer à explorer notre plateforme et bénéficier des fonctionnalités qu\'offre uxpertise LMS.','ux-autoaenroll') ?>
         </p>
        <?php }else{ ?>
          <h1><?php _e('Payment success','ux-autoaenroll')?></h1> 
         <p> <?php _e('Congratulations on your successful payment! We are delighted to inform you that your payment has been successfully processed.','ux-autoaenroll') ?></p>
         <p> <?php _e('The uxpertise team thanks you for choosing uxpertise LMS to meet your needs.
            We look forward to officially welcoming you to your platform within the next 24 to 48 business hours. Your account has been created and is in the process of being set up, so you\'ll be able to access it and take advantage of all the features we offer very soon! 
            You will shortly receive a welcome e-mail containing your account details, as well as instructions on how to connect to your platform. This e-mail will give you access to your personal space, where you can start exploring our platform and benefiting from the features offered by uxpertise LMS.','ux-autoaenroll') ?>
         </p>

        <?php } ?>
      </div>
 </div>