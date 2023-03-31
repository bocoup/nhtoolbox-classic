<?php

add_action('admin_init', 'add_resource_meta_box', 1);
function add_resource_meta_box() {
	add_meta_box( 'resource_repeatable_fields', 'Resources', 'resource_repeatable_meta_box_display', 'post', 'normal', 'high');
}

function resource_repeatable_meta_box_display() {
	global $post;

	$resource_repeatable_fields = get_post_meta($post->ID, 'resource_repeatable_fields', true);


	wp_nonce_field( 'resource_repeatable_meta_box_nonce', 'resource_repeatable_meta_box_nonce' );
?>
	<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.metabox_submit').click(function(e) {
		e.preventDefault();
		$('#publish').click();
	});
	$('#resources_add-row').on('click', function() {
		var row = $('.resources_empty-row.screen-reader-text').clone(true);
		row.removeClass('resources_empty-row screen-reader-text');
		row.insertBefore('#resource_repeatable-fieldset-one tbody>tr:last');
		return false;
	});
	$('.remove-row').on('click', function() {
		$(this).parents('tr').remove();
		return false;
	});

	$('#resource_repeatable-fieldset-one tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
});
	</script>

	<table id="resource_repeatable-fieldset-one" width="100%">
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

	if ( $resource_repeatable_fields ) :

		foreach ( $resource_repeatable_fields as $field ) {
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="resource_name[]" value="<?php if($field['resource_name'] != '') echo esc_attr( $field['resource_name'] ); ?>" /></td>

		<td><input type="text" class="widefat" name="resource_url[]" value="<?php if ($field['resource_url'] != '') echo esc_attr( $field['resource_url'] ); else echo 'https://'; ?>" /></td>
		<td><a class="sort">|||</a></td>
		
	</tr>
	<?php
		}
	else :
		// show a blank one
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="resource_name[]" /></td>


		<td><input type="text" class="widefat" name="resource_url[]" value="https://" /></td>
<td><a class="sort">|||</a></td>
		
	</tr>
	<?php endif; ?>

	<!-- empty hidden one for jQuery -->
	<tr class="resources_empty-row screen-reader-text">
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="resource_name[]" /></td>


		<td><input type="text" class="widefat" name="resource_url[]" value="https://" /></td>
<td><a class="sort">|||</a></td>
		
	</tr>
	</tbody>
	</table>

	<p><a id="resources_add-row" class="button" href="#">Add another</a>
	
	<?php
}

add_action('save_post', 'resource_repeatable_meta_box_save');
function resource_repeatable_meta_box_save($post_id) {
	if ( ! isset( $_POST['resource_repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['resource_repeatable_meta_box_nonce'], 'resource_repeatable_meta_box_nonce' ) )
		return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!current_user_can('edit_post', $post_id))
		return;

	$old = get_post_meta($post_id, 'resource_repeatable_fields', true);
	$new = array();


	$names = $_POST['resource_name'];
	$urls = $_POST['resource_url'];

	$count = count( $names );

	for ( $i = 0; $i < $count; $i++ ) {
		if ( $names[$i] != '' ) :
			$new[$i]['resource_name'] = stripslashes( strip_tags( $names[$i] ) );


		if ( $urls[$i] == 'https://' )
			$new[$i]['resource_url'] = '';
		else
			$new[$i]['resource_url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'resource_repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'resource_repeatable_fields', $old );
}