<?php

add_action('admin_init', 'add_considerations_meta_box', 1);
function add_considerations_meta_box() {
	add_meta_box( 'considerations_repeatable_fields', 'Considerations', 'considerations_repeatable_meta_box_display', 'post', 'normal', 'high');
}

function considerations_repeatable_meta_box_display() {
	global $post;

	$considerations_repeatable_fields = get_post_meta($post->ID, 'considerations_repeatable_fields', true);


	wp_nonce_field( 'considerations_repeatable_meta_box_nonce', 'considerations_repeatable_meta_box_nonce' );
?>
	<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.metabox_submit').click(function(e) {
		e.preventDefault();
		$('#publish').click();
	});
	$('#considerations_add-row').on('click', function() {
		var row = $('.considerations_empty-row.screen-reader-text').clone(true);
		row.removeClass('considerations_empty-row screen-reader-text');
		row.insertBefore('#considerations_repeatable-fieldset-one tbody>tr:last');
		return false;
	});
	$('.remove-row').on('click', function() {
		$(this).parents('tr').remove();
		return false;
	});

	$('#considerations_repeatable-fieldset-one tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
});
	</script>

	<table id="considerations_repeatable-fieldset-one" width="100%">
	<thead>
		<tr>
			<th width="2%"></th>
			<th width="96%">List Item</th>
			<th width="2%"></th>
		</tr>
	</thead>
	<tbody>
	<?php

	if ( $considerations_repeatable_fields ) :

		foreach ( $considerations_repeatable_fields as $field ) {
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="considerations_listItem[]" value="<?php if($field['considerations_listItem'] != '') echo esc_attr( $field['considerations_listItem'] ); ?>" /></td>

		
		<td><a class="sort">|||</a></td>
		
	</tr>
	<?php
		}
	else :
		// show a blank one
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="considerations_listItem[]" /></td>


		
<td><a class="sort">|||</a></td>
		
	</tr>
	<?php endif; ?>

	<!-- empty hidden one for jQuery -->
	<tr class="considerations_empty-row screen-reader-text">
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="considerations_listItem[]" /></td>


		
<td><a class="sort">|||</a></td>
		
	</tr>
	</tbody>
	</table>

	<p><a id="considerations_add-row" class="button" href="#">Add another</a>
	
	<?php
}

add_action('save_post', 'considerations_repeatable_meta_box_save');
function considerations_repeatable_meta_box_save($post_id) {
	if ( ! isset( $_POST['considerations_repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['considerations_repeatable_meta_box_nonce'], 'considerations_repeatable_meta_box_nonce' ) )
		return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!current_user_can('edit_post', $post_id))
		return;

	$old = get_post_meta($post_id, 'considerations_repeatable_fields', true);
	$new = array();


	$listItems = $_POST['considerations_listItem'];

	$count = count( $listItems );

	for ( $i = 0; $i < $count; $i++ ) {
		if ( $listItems[$i] != '' ) :
			$new[$i]['considerations_listItem'] = stripslashes( strip_tags( $listItems[$i] ) );
        endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'considerations_repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'considerations_repeatable_fields', $old );
}