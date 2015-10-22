<?php

$api_url         = get_bloginfo( 'url' ) . '/wp-json/wp/v2/comments';
$current_post_id = get_the_ID();

?>

<div class="comments-area">
	<p> Here is what I am going to submit: </p>
	<p id="test_post">'aaa'</p>
	<button type="button" id='go'>Go!</button>
	<p> Response: </p>
	<p id="test_response"></p>
</div>

<script type="text/javascript">
	var data = {
		post: <?php echo $current_post_id ?>,
		content: 'Super cool!'
	};

	jQuery('#test_post').html( JSON.stringify( data ) );

	jQuery('#go').click( function( event ) {
		jQuery.ajax( {
			url     : '<?php echo esc_url( $api_url ) ?>',
			data    : data,
			dataType: 'json',
			cache   : false,
			type    : 'POST',
			success: function( response ) {
				jQuery( '#test_response').html( 'Success: ' + JSON.stringify( response ) );
			},
			error: function( xhr, status, error ) {
				jQuery( '#test_response').html( 'Error' + status + ': ' + error.toString() );
			}
		} );
	} )
</script>
