<?php

add_action('admin_init', 'add_getting_started_meta_box', 1);
function add_getting_started_meta_box() {
	add_meta_box( 'getting_started_repeatable_fields', 'Getting Started', 'getting_started_repeatable_meta_box_display', 'post', 'normal', 'high');
}

function getting_started_repeatable_meta_box_display() {
	global $post;

	$getting_started_repeatable_fields = get_post_meta($post->ID, 'getting_started_repeatable_fields', true);


	wp_nonce_field( 'getting_started_repeatable_meta_box_nonce', 'getting_started_repeatable_meta_box_nonce' );
?>
	<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.metabox_submit').click(function(e) {
		e.preventDefault();
		$('#publish').click();
	});
	$('#getting_started_add-row').on('click', function() {
		var row = $('.getting_started_empty-row.screen-reader-text').clone(true);
		row.removeClass('getting_started_empty-row screen-reader-text');
		row.insertBefore('#getting_started_repeatable-fieldset-one tbody>tr:last');
		return false;
	});
	$('.remove-row').on('click', function() {
		$(this).parents('tr').remove();
		return false;
	});

	$('#getting_started_repeatable-fieldset-one tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
});
	</script>
    <p>To create sub items, prefix the list item with "[SUB]" without the quotations. This will make the prefixed list item a sub item of the list item before it.</p>

	<table id="getting_started_repeatable-fieldset-one" width="100%">
	<thead>
		<tr>
			<th width="2%"></th>
			<th width="96%">List Item</th>
			<th width="2%"></th>
		</tr>
	</thead>
	<tbody>
	<?php

	if ( $getting_started_repeatable_fields ) :

		foreach ( $getting_started_repeatable_fields as $field ) {
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="getting_started_listItem[]" value="<?php if($field['getting_started_listItem'] != '') echo esc_attr( $field['getting_started_listItem'] ); ?>" /></td>

		
		<td><a class="sort">|||</a></td>
		
	</tr>
	<?php
		}
	else :
		// show a blank one
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="getting_started_listItem[]" /></td>


		
<td><a class="sort">|||</a></td>
		
	</tr>
	<?php endif; ?>

	<!-- empty hidden one for jQuery -->
	<tr class="getting_started_empty-row screen-reader-text">
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="getting_started_listItem[]" /></td>


		
<td><a class="sort">|||</a></td>
		
	</tr>
	</tbody>
	</table>

	<p><a id="getting_started_add-row" class="button" href="#">Add another</a>
	
	<?php
}

add_action('save_post', 'getting_started_repeatable_meta_box_save');
function getting_started_repeatable_meta_box_save($post_id) {
	if ( ! isset( $_POST['getting_started_repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['getting_started_repeatable_meta_box_nonce'], 'getting_started_repeatable_meta_box_nonce' ) )
		return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!current_user_can('edit_post', $post_id))
		return;

	$old = get_post_meta($post_id, 'getting_started_repeatable_fields', true);
	$new = array();


	$listItems = $_POST['getting_started_listItem'];

	$count = count( $listItems );

	for ( $i = 0; $i < $count; $i++ ) {
		if ( $listItems[$i] != '' ) :
			$new[$i]['getting_started_listItem'] = stripslashes( strip_tags( $listItems[$i] ) );
        endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'getting_started_repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'getting_started_repeatable_fields', $old );
}