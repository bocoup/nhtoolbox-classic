<?php

add_action('admin_init', 'add_state_law_meta_box', 1);
function add_state_law_meta_box() {
	add_meta_box( 'state_law_repeatable_fields', 'State Law', 'state_law_repeatable_meta_box_display', 'post', 'normal', 'high');
}

function state_law_repeatable_meta_box_display() {
	global $post;

	$state_law_repeatable_fields = get_post_meta($post->ID, 'state_law_repeatable_fields', true);


	wp_nonce_field( 'state_law_repeatable_meta_box_nonce', 'state_law_repeatable_meta_box_nonce' );
?>
	<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.metabox_submit').click(function(e) {
		e.preventDefault();
		$('#publish').click();
	});
	$('#state_laws_add-row').on('click', function() {
		var row = $('.state_laws_empty-row.screen-reader-text').clone(true);
		row.removeClass('state_laws_empty-row screen-reader-text');
		row.insertBefore('#state_law_repeatable-fieldset-one tbody>tr:last');
		return false;
	});
	$('.remove-row').on('click', function() {
		$(this).parents('tr').remove();
		return false;
	});

	$('#state_law_repeatable-fieldset-one tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
});
	</script>

	<table id="state_law_repeatable-fieldset-one" width="100%">
	<thead>
		<tr>
			<th width="2%"></th>
			<th width="30%">Name</th>
			<th width="60%">URL</th>
			<th width="2%"></th>
		</tr>
	</thead>
	<tbody>
	<?php

	if ( $state_law_repeatable_fields ) :

		foreach ( $state_law_repeatable_fields as $field ) {
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="state_law_name[]" value="<?php if($field['state_law_name'] != '') echo esc_attr( $field['state_law_name'] ); ?>" /></td>

		<td><input type="text" class="widefat" name="state_law_url[]" value="<?php if ($field['state_law_url'] != '') echo esc_attr( $field['state_law_url'] ); else echo 'https://'; ?>" /></td>
		<td><a class="sort">|||</a></td>
		
	</tr>
	<?php
		}
	else :
		// show a blank one
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="state_law_name[]" /></td>


		<td><input type="text" class="widefat" name="state_law_url[]" value="https://" /></td>
<td><a class="sort">|||</a></td>
		
	</tr>
	<?php endif; ?>

	<!-- empty hidden one for jQuery -->
	<tr class="state_laws_empty-row screen-reader-text">
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="state_law_name[]" /></td>


		<td><input type="text" class="widefat" name="state_law_url[]" value="https://" /></td>
<td><a class="sort">|||</a></td>
		
	</tr>
	</tbody>
	</table>

	<p><a id="state_laws_add-row" class="button" href="#">Add another</a>
	
	<?php
}

add_action('save_post', 'state_law_repeatable_meta_box_save');
function state_law_repeatable_meta_box_save($post_id) {
	if ( ! isset( $_POST['state_law_repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['state_law_repeatable_meta_box_nonce'], 'state_law_repeatable_meta_box_nonce' ) )
		return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!current_user_can('edit_post', $post_id))
		return;

	$old = get_post_meta($post_id, 'state_law_repeatable_fields', true);
	$new = array();


	$names = $_POST['state_law_name'];
	$urls = $_POST['state_law_url'];

	$count = count( $names );

	for ( $i = 0; $i < $count; $i++ ) {
		if ( $names[$i] != '' ) :
			$new[$i]['state_law_name'] = stripslashes( strip_tags( $names[$i] ) );


		if ( $urls[$i] == 'https://' )
			$new[$i]['state_law_url'] = '';
		else
			$new[$i]['state_law_url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'state_law_repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'state_law_repeatable_fields', $old );
}