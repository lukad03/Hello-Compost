<?php

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'lk_';

$meta_box_press = array(
	'id' => 'lk-meta-box',
	'title' => __('Press Template', 'framework'),
	'page' => 'press',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' =>  __('Source of Quote', 'framework'),
			'desc' => 'i.e. Aly Blenkin',
			'id' => $prefix.'hello_quote_name',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' =>  __('Organization or Title', 'framework'),
			'desc' => 'i.e. Fast Company, Farmer with Project EATS',
			'id' => $prefix.'hello_quote_title',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' =>  __('URL Source', 'framework'),
			'desc' => 'http://url.com/url',
			'id' => $prefix.'hello_quote_url',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' =>  __('Quote', 'framework'),
			'desc' => 'The quote, keep it short.',
			'id' => $prefix.'hello_quote',
			'type' => 'textarea',
			'std' => ''
		),
	),
	
);

add_action('admin_menu', 'lk_add_box_hello');


/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function lk_add_box_hello() {
	global $meta_box_press;
 	
	add_meta_box($meta_box_press['id'], $meta_box_press['title'], 'lk_show_box_hello_info', $meta_box_press['page'], $meta_box_press['context'], $meta_box_press['priority']);

}


/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function lk_show_box_hello_info() {
	global $meta_box_press, $post;
 	
	echo '<input type="hidden" name="lk_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_press['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;

			case 'checkbox':
			echo 	'<tr>',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
					'<td>';

			echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>';

			break;
			
			//If textarea		
			case 'textarea':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea>';
			
			break;

		}

	}
 
	echo '</table>';
}
 
add_action('save_post', 'lk_save_data_hello');


/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function lk_save_data_hello($post_id) {
	global $meta_box_press;
 
	// verify nonce

	if ( !isset($_POST['lk_meta_box_nonce']) || !wp_verify_nonce( $_POST['lk_meta_box_nonce'], basename(__FILE__) )) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($meta_box_press['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

}

?>