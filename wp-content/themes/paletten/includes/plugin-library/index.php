<?php
/*
Plugin Name: Library
Author: Anna Viklund
Version: 1.0
 */

// Constants
define('PLANT_POST_TYPE', 'plant');

// Methods
function plant_register_post_type()
{
    register_post_type(PLANT_POST_TYPE, array(
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
        'supports' => array('title', 'thumbnail'),
    ));
}

function plant_setup_admin_fields()
{
    if (function_exists('register_field_group')) { // Kräver ACF
        acf_add_local_field_group(array(
            'key' => 'group_5cced381cb5f0',
            'title' => 'Texter',
            'fields' => array(
                array(
                    'key' => 'field_5cced3c719db0',
                    'label' => 'Kännetecken',
                    'name' => 'plant_characteristics',
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
                    'key' => 'field_5d5871220e44a',
                    'label' => 'Skötselråd',
                    'name' => 'plant_care',
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
                    'name' => 'plant_facts',
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
                        'value' => 'plant',
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

        acf_add_local_field_group(array(
            'key' => 'group_5ce43a77eb2f2',
            'title' => 'Växtfakta',
            'fields' => array(
                array(
                    'key' => 'field_5d58702c8e661',
                    'label' => 'Botaniskt namn',
                    'name' => 'plant_botanical_name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5ce436771baae',
                    'label' => 'Grupper',
                    'name' => 'plant_groups',
                    'type' => 'checkbox',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'group-01' => 'Blommande växter',
                        'group-02' => 'Gröna växter',
                        'group-03' => 'Suckulenter',
                    ),
                    'allow_custom' => 0,
                    'default_value' => array(
                    ),
                    'layout' => 'vertical',
                    'toggle' => 0,
                    'return_format' => 'value',
                    'save_custom' => 0,
                ),
                array(
                    'key' => 'field_5d586b85e583e',
                    'label' => 'Svårighetsgrad',
                    'name' => 'plant_difficulty',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'easy' => 'Enkel',
                        'medium' => 'Medel',
                        'hard' => 'Svår',
                    ),
                    'default_value' => array(
                        0 => 'easy',
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5d586d6938cf0',
                    'label' => 'Vattning',
                    'name' => 'plant_watering',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        0 => 'Lite',
                        1 => 'Medel',
                        2 => 'Mycket',
                    ),
                    'default_value' => array(
                        0 => 0,
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5d586dd22e146',
                    'label' => 'Ljus',
                    'name' => 'plant_light',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        0 => 'Skugga',
                        1 => 'Sol till halvskugga',
                        2 => 'Skugga',
                    ),
                    'default_value' => array(
                        0 => 0,
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'plant',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

        acf_add_local_field_group(array(
            'key' => 'group_5d58716857911',
            'title' => 'Cred',
            'fields' => array(
                array(
                    'key' => 'field_5d5871685bc5f',
                    'label' => 'Fotograf',
                    'name' => 'plant_photographer',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5d5871afad915',
                    'label' => 'Länk till fotograf',
                    'name' => 'plant_photographer_link',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'plant',
                    ),
                ),
            ),
            'menu_order' => 1,
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
    }
}

// Register plant post type and admin fields
add_action('init', 'plant_register_post_type');
add_action('init', 'plant_setup_admin_fields');
