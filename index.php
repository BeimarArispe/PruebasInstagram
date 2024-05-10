<?php
	require_once( 'src/instagram_basic_display_api.php' );
  $accessToken = 'AQDrdR52dW52vb_CxqV3zAoJlPdCKzXKKzpSI5I4KmIyqdgCboNKRK3TEGkKbOHZ6lp7M-YidXDyfMT8al-lN1jD-aYYy5SS2gkHtduJt41Rmlqieg_D9ytw6DQ-yIjBUR_ERTmks9wxaVchuD7MxGBYAMg6raJKuOavxfgL-w4-_VLiJV6q1ZMk7j5i4lXdT_GR51s-7cSKyvA3wr1kEgUokOPwDWad09K-pHbPCDdFaQ';

     $params = array(
      'get_code' => isset( $_GET['code'] ) ? $_GET['code'] : '',
      //'access_token' => $accessToken,
      //'user_id' => '7503489786433392'
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
    <hr />
    <h3>60 dias</h3>

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

    

    <?php $usersMedia = $ig->getUsersMedia(); ?>
	     <h3>Users Media Page 1 (<?php echo count( $usersMedia['data'] ); ?>)</h3>
	     <h4>Raw Data</h4>
	     <textarea style="width:100%;height:400px;"><?php print_r( $usersMedia ); ?></textarea>
	     <h4>Posts</h4>
       <ul style="list-style: none;margin:0px;padding:0px;">
		        <?php foreach ( $usersMedia['data'] as $post ) : ?>
			              <li style="margin-bottom:20px;border:3px solid #333">
				                <div>
					                 <?php if ( 'IMAGE' == $post['media_type'] || 'CAROUSEL_ALBUM' == $post['media_type']) : ?>
						                     <img style="height:320px" src="<?php echo $post['media_url']; ?>" />
					                 <?php else : ?>
						                  <video height="240" width="320" controls>
							                    <source src="<?php echo $post['media_url']; ?>">
						                  </video>
					                  <?php endif; ?>
				                </div>
				            <div>
					              <b>Caption: <?php echo $post['caption']; ?></b>
				            </div>
				    <div>
					       ID: <?php echo $post['id']; ?>
				    </div>
				    <div>
					       Media Type: <?php echo $post['media_type']; ?>
				    </div>
				    <div>
					       Media URL: <?php echo $post['media_url']; ?>
				    </div>
			</li>
		<?php endforeach; ?>
	</ul>
<?php else : ?>
    <a href="<?php echo $ig->authorizationUrl; ?>">
        Iniciar con Intagram
    </a>

<?php endif; ?>