<?php
	require_once( 'src/instagram_basic_display_api.php' );
     $params = array(
      'get_code' => isset( $_GET['code'] ) ? $_GET['code'] : ''
     );
   $ig = new instagram_basic_display_api( $params );
?>

<h1>Informacion Basica de Intagram</h1>
<hr />
<?php if ( $ig->hasUserAccessToken) : ?>
    <h4>Info IG</h4>
    <?php echo $ig->getUserAccessToken(); ?>
<?php else : ?>
    <a href="<?php echo $ig->authorizationUrl; ?>">
        Iniciar con Intagram
    </a>
<?php endif; ?>