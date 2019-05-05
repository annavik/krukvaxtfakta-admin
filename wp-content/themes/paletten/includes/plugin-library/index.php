<?php
/*
Plugin Name: Library
Author: Anna Viklund
Version: 1.0
*/

// Constants
define('CULTIVAR_POST_TYPE', 'cultivar');

// Methods
function cultivar_register_post_type() {
    register_post_type(CULTIVAR_POST_TYPE, array(
        'labels' => array(
          'name' => 'Sorter',
          'singular_name' => 'Sort',
          'add_new' => 'Registrera ny sort',
          'add_new_item' => 'Registrera ny sort',
          'edit_item' => 'Redigera sort',
          'new_item' => 'Ny sort',
          'view_item' => 'Till sort',
          'view_items' => 'Till sorter',
          'not_found' => 'Hittade inga sorter.',
          'not_found_in_trash' => 'Hittade inga sorter.',
          'search_items' => 'Sök sort',
        ),
        'description' => '',
        'public' => true,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'thumbnail')
      ));
}

function cultivar_setup_admin_fields() {
    if (function_exists('register_field_group')) { // Kräver ACF
        acf_add_local_field_group(array(
            'key' => 'group_5cced381cb5f0',
            'title' => 'Sorter',
            'fields' => array(
                array(
                    'key' => 'field_5cced3c719db0',
                    'label' => 'Kännetecken',
                    'name' => 'cultivar_characteristics',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'delay' => 0,
                ),
                array(
                    'key' => 'field_5cced4bdcddca',
                    'label' => 'Fakta',
                    'name' => 'cultivar_facts',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'delay' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'cultivar',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
    }
  }

// Register cultivar post type and admin fields
add_action('init', 'cultivar_register_post_type');
add_action('init', 'cultivar_setup_admin_fields');
