<?php
	require_once( 'src/instagram_basic_display_api.php' );
  $accessToken = 'IGQWRNNTBSQUQ3VXFUcC0xZAlVXd3lBYlNMcllUTnBQNlpNMzk5V3VtOXFGSDBfcHhpeWI4VDAyamw3c2tEQlBQUENUWXh3LWU3LWl1OC1yVkl0ZA3NjUENfSEQ0TS0tbjJZAbWs3STBqSGgwZAwZDZD';

     $params = array(
      'get_code' => isset( $_GET['code'] ) ? $_GET['code'] : '',
      'access_token' => $accessToken
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

    <hr />
	   <?php $user = $ig->getUser(); ?>
	    <pre>
		     <?php print_r( $user ); ?>
	    </pre>
	        <h3>Nombre de usuario: <?php echo $user['username']; ?></h3>
	        <h3>ID en instagram: <?php echo $user['id']; ?></h3>
	        <h3>Contenido multimedia: <?php echo $user['media_count']; ?></h3>
	        <h3>Tipo de cuenta: <?php echo $user['account_type']; ?></h3>
	  <hr />


<?php else : ?>
    <a href="<?php echo $ig->authorizationUrl; ?>">
        Iniciar con Intagram
    </a>

<?php endif; ?>