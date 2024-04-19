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
    <h6>Token access</h6>
    <?php echo $ig->getUserAccessToken(); ?>
    <h6>Exprira en:</h6>
    <?php echo ceil($ig->getUserAccessTokenExpires()/86400); ?> dias
<?php else : ?>
    <a href="<?php echo $ig->authorizationUrl; ?>">
        Iniciar con Intagram
    </a>
<?php endif; ?>