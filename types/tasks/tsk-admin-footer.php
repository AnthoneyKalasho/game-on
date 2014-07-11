<?php

function task_edit_jquery() {
	$id = get_the_id();
	$task_chains = get_the_terms($id, 'task_chains');
	if (!empty($task_chains)) {
		$chain = array_shift(array_values($task_chains))->name;
	}
	$custom = get_post_custom(get_the_id());
?>
<script type="text/javascript">


jQuery('.go_reward_points, .go_reward_currency, .go_reward_bonus_currency').on('keyup', function(){
	var reward_stage = jQuery(this).attr('stage');
	var reward_type = jQuery(this).attr('reward');
	jQuery('input[stage=' + reward_stage + '][reward = ' + reward_type + ']').val(jQuery(this).val());
});

jQuery('.go_task_settings_accordion').click(function(){
	jQuery(this).children('.go_triangle_container').children('.go_task_accordion_triangle').toggleClass('down');
});

function go_toggle_settings_rows(stage_settings, condensed) {
	condensed = typeof condensed !== 'undefined' ? condensed : false;
	for(setting in stage_settings){
		if(condensed === true){
			stage_settings[setting].addClass('condensed');
			stage_settings[setting].children().addClass('condensed');
		}
		stage_settings[setting].toggle('slow');
	}
}

var stage_accordion_rows = {
	1: jQuery('tr.cmb-type-go_settings_accordion.cmb_id_stage_one_settings'),
	2: jQuery('tr.cmb-type-go_settings_accordion.cmb_id_stage_two_settings'),
	3: jQuery('tr.cmb-type-go_settings_accordion.cmb_id_stage_three_settings'),
	4: jQuery('tr.cmb-type-go_settings_accordion.cmb_id_stage_four_settings'),
	5: jQuery('tr.cmb-type-go_settings_accordion.cmb_id_stage_five_settings')
}

var stage_accordions = {
	1: jQuery('#go_stage_one_settings_accordion'),
	2: jQuery('#go_stage_two_settings_accordion'),
	3: jQuery('#go_stage_three_settings_accordion'),
	4: jQuery('#go_stage_four_settings_accordion'),
	5: jQuery('#go_stage_five_settings_accordion')
}

var stage_settings_rows = {
	1: [
		jQuery('tr.cmb-type-go_video_shortcode.cmb_id_stage_one_video_shortcode'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_one_points'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_one_currency'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_one_bonus_currency'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_encounter_upload'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_encounter_lock'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_encounter_lock_loot'),
		jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_encounter_lock_loot_mod'),
		jQuery('tr.cmb-type-go_test_field_encounter.cmb_id_go_mta_test_lock_encounter')
	],
	2: [
		jQuery('tr.cmb-type-go_video_shortcode.cmb_id_stage_two_video_shortcode'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_two_points'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_two_currency'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_two_bonus_currency'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_accept_upload'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_accept_lock'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_accept_lock_loot'),
		jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_accept_lock_loot_mod'),
		jQuery('tr.cmb-type-go_test_field_accept.cmb_id_go_mta_test_lock_accept')
	],
	3: [
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_three_points'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_three_currency'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_three_bonus_currency'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_completion_upload'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_completion_lock'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_completion_lock_loot'),
		jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_completion_lock_loot_mod'),
		jQuery('tr.cmb-type-go_test_field_completion.cmb_id_go_mta_test_lock_completion'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_task_mastery'),
		jQuery('tr.cmb-type-go_video_shortcode.cmb_id_stage_three_video_shortcode')
	],
	4: [
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_four_points'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_four_currency'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_four_bonus_currency'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_mastery_upload'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_mastery_lock'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_mastery_lock_loot'),
		jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_mastery_lock_loot_mod'),
		jQuery('tr.cmb-type-go_test_field_mastery.cmb_id_go_mta_test_lock_mastery'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_task_repeat'),
		jQuery('tr.cmb-type-go_video_shortcode.cmb_id_stage_four_video_shortcode')
	],
	5: [
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_five_points'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_five_currency'),
		jQuery('tr.cmb-type-go_stage_reward.cmb_id_go_mta_stage_five_bonus_currency'),
		jQuery('tr.cmb-type-text.cmb_id_go_mta_repeat_amount'),
		jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_repeat_upload'),
		jQuery('tr.cmb-type-go_video_shortcode.cmb_id_stage_five_video_shortcode')
	]
}

// Advanced settings accordion //

var task_settings = [
	jQuery('tr.cmb-type-select.cmb_id_go_mta_req_rank'),
	jQuery('tr.cmb-type-go_decay_table.cmb_id_go_mta_date_picker'),
	jQuery('tr.cmb-type-text.cmb_id_go_mta_bonus_currency_filter'),
	jQuery('tr.cmb-type-text.cmb_id_go_mta_penalty_filter'),
	jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_focus_category_lock'),
	jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_three_stage_switch'),
	jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_five_stage_switch'),
	jQuery('tr.cmb-type-go_pick_order_of_chain.cmb_id_go_mta_chain_order'),
	jQuery('tr.cmb-type-text.cmb_id_go_mta_final_chain_message')
];

go_toggle_settings_rows(task_settings);

var in_chain = 
<?php 
	if (!empty($chain)) {
		echo "true";
	} else {
		echo "false";
	}
?>;

var is_final_task = 
<?php 
	if (!empty($chain)) {
		$posts_in_chain = get_posts(array(
			'post_type' => 'tasks',
			'post_status' => 'publish',
			'taxonomy' => 'task_chains',
			'term' => $chain,
			'order' => 'ASC',
			'meta_key' => 'chain_position',
			'orderby' => 'meta_value_num',
			'posts_per_page' => '-1'
		));
		$last_task = end($posts_in_chain)->ID;
		if ($id == $last_task) {
			echo "true";
		} else {
			echo "false";
		}
	} else {
		echo "false";
	}
?>;

jQuery('#go_advanced_task_settings_accordion').click(function(){
	jQuery(this).toggleClass('opened');
	go_toggle_settings_rows(task_settings, true);
	if (in_chain && jQuery(this).hasClass('opened')) {
		jQuery('tr.cmb-type-go_pick_order_of_chain.cmb_id_go_mta_chain_order').show('slow');
		if (is_final_task) {
			jQuery('tr.cmb-type-text.cmb_id_go_mta_final_chain_message').show();
		} else {
			if (jQuery('tr.cmb-type-text.cmb_id_go_mta_final_chain_message').is(":visible")) {
				jQuery('tr.cmb-type-text.cmb_id_go_mta_final_chain_message').hide();
			}
		}
	} else {
		if (jQuery('tr.cmb-type-go_pick_order_of_chain.cmb_id_go_mta_chain_order').is(":visible")) {
			jQuery('tr.cmb-type-go_pick_order_of_chain.cmb_id_go_mta_chain_order').hide();	
		}
		if (jQuery('tr.cmb-type-text.cmb_id_go_mta_final_chain_message').is(":visible")) {
			jQuery('tr.cmb-type-text.cmb_id_go_mta_final_chain_message').hide();
		}
	}
});

////////////////////////////////////

// Modifier Date Picker //
var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
jQuery(document).ready(function(){
	if(!is_chrome){
		if(jQuery('.datepicker').length){
			jQuery('.datepicker').datepicker({dateFormat: "yy-mm-dd"});
		}
	}
});
var count = 1;
function go_add_decay_table_row(){
	jQuery('#go_list_of_decay_dates tbody').last().append('<tr><td><input name="go_mta_task_decay_calendar[]" id="go_mta_task_decay_calendar' + count + '" class="datepicker custom_date" type="date" placeholder="Click for Date"/></td><td><input name="go_mta_task_decay_percent[]" id="go_mta_task_decay_percent" type="text" placeholder="Modifier"/></td></tr>');	
	if(!is_chrome){
		if(jQuery('.datepicker').length){
			jQuery('.datepicker').datepicker({dateFormat: "yy-mm-dd"});
		}
	}
	count++;
}

////////////////////////////////////

// Task tests //

function toggle_tests(accordion, stage) {
	if (typeof(stage) === 'string') {
		if (jQuery(accordion).hasClass("opened")) {
			if (jQuery('#go_mta_test_'+stage+'_lock').prop('checked')) {
				jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_'+stage+'_lock_loot').show('slow');
				if (jQuery('#go_mta_test_'+stage+'_lock_loot').prop('checked')) {
					if (!jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').is(':visible')) {
						jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').show('slow');
					}
				} else {
					if (jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').is(':visible')) {
						jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').hide();
					}
				}
				jQuery('tr.cmb-type-go_test_field_'+stage+'.cmb_id_go_mta_test_lock_'+stage).show('slow');
			} else {
				if (jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_'+stage+'_lock_loot').is(':visible')) {
					jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_'+stage+'_lock_loot').hide();
				}
				if (jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').is(':visible')) {
					jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').hide();
				}
				if (jQuery('tr.cmb-type-go_test_field_'+stage+'.cmb_id_go_mta_test_lock_'+stage).is(':visible')) {
					jQuery('tr.cmb-type-go_test_field_'+stage+'.cmb_id_go_mta_test_lock_'+stage).hide();
				}
			}
		} else {
			if (jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_'+stage+'_lock_loot').is(':visible')) {
				jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_'+stage+'_lock_loot').hide();
			}
			if (jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').is(':visible')) {
				jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').hide();
			}
			if (jQuery('tr.cmb-type-go_test_field_'+stage+'.cmb_id_go_mta_test_lock_'+stage).is(':visible')) {
				jQuery('tr.cmb-type-go_test_field_'+stage+'.cmb_id_go_mta_test_lock_'+stage).hide();
			}
		}
	}
}

function toggle_test_all(stage) {
	if (typeof(stage) === 'string') {
		if (jQuery('#go_mta_test_'+stage+'_lock').prop('checked')) {
			jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_'+stage+'_lock_loot').show('slow');
			if (jQuery('#go_mta_test_'+stage+'_lock_loot').prop('checked')) {
				if (!jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').is(':visible')) {
					jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').show('slow');
				}
			} else {
				if (jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').is(':visible')) {
					jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').hide();
				}
			}
			jQuery('tr.cmb-type-go_test_field_'+stage+'.cmb_id_go_mta_test_lock_'+stage).show('slow');
		} else {
			if (jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_'+stage+'_lock_loot').is(':visible')) {
				jQuery('tr.cmb-type-checkbox.cmb_id_go_mta_test_'+stage+'_lock_loot').hide('hide');
			}
			if (jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').is(':visible')) {
				jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').hide('hide');
			}
			if (jQuery('tr.cmb-type-go_test_field_'+stage+'.cmb_id_go_mta_test_lock_'+stage).is(':visible')) {
				jQuery('tr.cmb-type-go_test_field_'+stage+'.cmb_id_go_mta_test_lock_'+stage).hide('hide');
			}
		}
	}
}

function toggle_test_loot(stage) {
	if (typeof(stage) === 'string') {
		if (jQuery('#go_mta_test_'+stage+'_lock_loot').prop('checked')) {
			if (!jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').is(':visible')) {
				jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').show('slow');
			}
		} else {
			if (jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').is(':visible')) {
				jQuery('tr.cmb-type-go_test_modifier.cmb_id_go_mta_test_'+stage+'_lock_loot_mod').hide('slow');
			}
		}
	}
}

jQuery('#go_mta_test_encounter_lock, #go_mta_test_accept_lock, #go_mta_test_completion_lock, #go_mta_test_mastery_lock').click(function() {
	var stage = this.id.getMid("go_mta_test_", "_lock");
	toggle_test_all(stage);
});

jQuery('#go_mta_test_encounter_lock_loot, #go_mta_test_accept_lock_loot, #go_mta_test_completion_lock_loot, #go_mta_test_mastery_lock_loot').click(function() {
	var stage = this.id.getMid("go_mta_test_", "_lock_loot");
	toggle_test_loot(stage);
});

////////////////////////////////////

// Stage one settings accordion //

go_toggle_settings_rows(stage_settings_rows[1]);

stage_accordions[1].click(function(){
	jQuery(this).toggleClass('opened');
	go_toggle_settings_rows(stage_settings_rows[1], true);
	toggle_tests(stage_accordions[1], 'encounter');
});

////////////////////////////////////

// Stage two settings accordion //

go_toggle_settings_rows(stage_settings_rows[2]);

stage_accordions[2].click(function(){
	jQuery(this).toggleClass('opened');
	go_toggle_settings_rows(stage_settings_rows[2], true);
	toggle_tests(stage_accordions[2], 'accept');
});

////////////////////////////////////

// Stage three settings accordion //

go_toggle_settings_rows(stage_settings_rows[3]);

stage_accordions[3].click(function(){
	jQuery(this).toggleClass('opened');
	go_toggle_settings_rows(stage_settings_rows[3], true);
	toggle_tests(stage_accordions[3], 'completion');
});

////////////////////////////////////

// Stage four settings accordion //
go_toggle_settings_rows(stage_settings_rows[4]);

stage_accordions[4].click(function(){
	jQuery(this).toggleClass('opened');
	go_toggle_settings_rows(stage_settings_rows[4], true);
	toggle_tests(stage_accordions[4], 'mastery');
});

////////////////////////////////////

// Three stage toglge //
jQuery('#go_mta_three_stage_switch, #go_mta_task_mastery').click(function(){
	if(jQuery(this).prop('checked')){
		jQuery('#go_mta_three_stage_switch, #go_mta_task_mastery').prop('checked', true);
		jQuery('#go_mta_five_stage_switch, #go_mta_task_repeat').prop('checked', false);
		jQuery('tr.cmb-type-wysiwyg.cmb_id_go_mta_mastery_message').toggle('slow');
		stage_accordion_rows[4].toggle('slow');
		if(stage_accordions[4].hasClass('opened')){
			go_toggle_settings_rows(stage_settings_rows[4]);
		}	
	}else{
		jQuery('#go_mta_three_stage_switch, #go_mta_task_mastery').prop('checked', false);
		jQuery('tr.cmb-type-wysiwyg.cmb_id_go_mta_mastery_message').toggle('slow');
		stage_accordion_rows[4].toggle('slow');
		if(stage_accordions[4].hasClass('opened')){
			go_toggle_settings_rows(stage_settings_rows[4]);
		}	
	}
});

stage_three = <?php echo ($custom['go_mta_three_stage_switch'][0] == 'on')? 'true' : 'false';?>;

if(stage_three){
	jQuery('tr.cmb-type-wysiwyg.cmb_id_go_mta_mastery_message').toggle('slow');
	stage_accordion_rows[4].toggle('slow');
	if(stage_accordions[4].hasClass('opened')){
		go_toggle_settings_rows(stage_settings_rows[4]);
	}
}

////////////////////////////////////

// five stage toggle //

go_toggle_settings_rows(stage_settings_rows[5], true);
stage_accordions[5].click(function(){
	jQuery(this).toggleClass('opened');
	go_toggle_settings_rows(stage_settings_rows[5], true);
});

jQuery('#go_mta_five_stage_switch, #go_mta_task_repeat').click(function(){
	if(jQuery(this).prop('checked')){
		jQuery('#go_mta_five_stage_switch, #go_mta_task_repeat').prop('checked', true);
		jQuery('#go_mta_three_stage_switch, #go_mta_task_mastery').prop('checked', false);
		jQuery('tr.cmb-type-wysiwyg.cmb_id_go_mta_repeat_message').toggle('slow');
		stage_accordion_rows[5].toggle('slow');
		if(stage_accordions[5].hasClass('opened')){
			go_toggle_settings_rows(stage_settings_rows[5]);
		}	
	}else{
		jQuery('#go_mta_five_stage_switch, #go_mta_task_repeat').prop('checked', false);
		jQuery('tr.cmb-type-wysiwyg.cmb_id_go_mta_repeat_message').toggle('slow');
		stage_accordion_rows[5].toggle('slow');
		if(stage_accordions[5].hasClass('opened')){
			go_toggle_settings_rows(stage_settings_rows[5]);
		}	
	}
});

stage_five = <?php echo ($custom['go_mta_five_stage_switch'][0] == 'on')? 'true' : 'false';?>;

if(stage_five){
	jQuery('tr.cmb-type-wysiwyg.cmb_id_go_mta_repeat_message').show('slow');
	stage_accordion_rows[5].show('slow');
}else{
	jQuery('tr.cmb-type-wysiwyg.cmb_id_go_mta_repeat_message').hide('slow');
	stage_accordion_rows[5].hide('slow');
}

////////////////////////////////////

</script>
<?php
}
add_action( 'admin_footer', 'task_edit_jquery' );

?>
