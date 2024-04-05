
<?php

	add_action( 'wp_enqueue_scripts',  'uxp_enqueue_script', 1000 );
    add_action( 'wp_enqueue_scripts', 'uxp_enqueue_style', 1000 );
  

    function uxp_enqueue_style(){
      wp_enqueue_style( 
        'bootstrap_css', 
        'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css',
          false,
        NULL,
        'all' 
      );
          wp_enqueue_style(
            'uxp_boostrap',
            UXP_DIR_URL. 'assets/bootstrap/css/bootstrap.min.css', 
            [],
            time()
          );
                
          wp_enqueue_style(
            'uxp_index_css',
            UXP_DIR_URL. 'assets/css/index.css', 
            [],
            time()
          );
          wp_enqueue_style(
            'uxp_index_css',
            UXP_DIR_URL. 'assets/css/sweetalert2.all.min.css', 
            [],
            time()
          );
    }

    function uxp_enqueue_script(){
      wp_enqueue_script( 
        'bootstrap_js',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js',
          array('jquery'),
        NULL, 
        true 
      );
          wp_enqueue_script(
            'uxp_boostrap_jst',
            UXP_DIR_URL. 'assets/bootstrap/js/bootstrap.min.js', 
            ['jquery'],
            time()
          );
          wp_enqueue_script(
            'uxp_boostrap_bundle_js',
            UXP_DIR_URL. 'assets/bootstrap/js/bootstrap.bundle.min.js', 
            ['jquery'],
            time()
          );
          wp_enqueue_script(
            'uxp_boostrap_bundle_js',
            UXP_DIR_URL. 'assets/js/sweetalert2.all.min.js', 
            [],
            time()
          );
           wp_enqueue_script('Sweetalert', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', array('jquery'), null, true);
           
          wp_enqueue_script(
            'uxp_index_js',
            UXP_DIR_URL. 'assets/js/index.js', 
            ['jquery'],
            time()
          );wp_localize_script( 'uxp_index_js' , 'uxp_send_form' , [ "ajaxurl" => admin_url( 'admin-ajax.php' ) ]  );
 
    }