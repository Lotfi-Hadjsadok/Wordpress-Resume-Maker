<?php
/**
 * Class General Data Extractor
 */

 if(!class_exists('General_Data')){

    class General_Data{

        public function __construct(){
           add_action('init',array($this,'init_post_types'));
           add_action('init',array($this,'init_taxonomies'));
        }

        public static function get_skills(){
            $tags = get_terms(array(
                'taxonomy' => 'post_tag',
                'hide_empty' => false,
            ));
            return $tags;            
        }



        public function init_post_types(){
            $this->init_developers_post_type();
        }


        public function init_taxonomies(){
            $this->init_langauges_taxonomy();
            $this->init_skills_taxonomy();
        }

        public function init_skills_taxonomy(){
    
                $labels_skills = array(
                    'name'                       => 'Skills',
                    'singular_name'              => 'Skill',
                    'menu_name'                  => 'Skills',
                    'all_items'                  => 'All Skills',
                    'edit_item'                  => 'Edit Skill',
                    'view_item'                  => 'View Skill',
                    'update_item'                => 'Update Skill',
                    'add_new_item'               => 'Add New Skill',
                    'new_item_name'              => 'New Skill Name',
                    'parent_item'                => 'Parent Skill',
                    'parent_item_colon'          => 'Parent Skill:',
                    'search_items'               => 'Search Skills',
                    'popular_items'              => 'Popular Skills',
                    'separate_items_with_commas' => 'Separate skills with commas',
                    'add_or_remove_items'        => 'Add or remove skills',
                    'choose_from_most_used'      => 'Choose from the most used skills',
                    'not_found'                  => 'No skills found.'
                );
            
                $args_skills = array(
                    'labels'            => $labels_skills,
                    'hierarchical'      => true,
                    'public'            => true,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
                    'rewrite'           => array( 'slug' => 'skills' )
                );
            
                register_taxonomy( 'skills', 'developer', $args_skills );
            
        }


        public function init_langauges_taxonomy(){
            
                // Add Languages taxonomy
                $labels_languages = array(
                    'name'                       => 'Languages',
                    'singular_name'              => 'Language',
                    'menu_name'                  => 'Languages',
                    'all_items'                  => 'All Languages',
                    'edit_item'                  => 'Edit Language',
                    'view_item'                  => 'View Language',
                    'update_item'                => 'Update Language',
                    'add_new_item'               => 'Add New Language',
                    'new_item_name'              => 'New Language Name',
                    'parent_item'                => 'Parent Language',
                    'parent_item_colon'          => 'Parent Language:',
                    'search_items'               => 'Search Languages',
                    'popular_items'              => 'Popular Languages',
                    'separate_items_with_commas' => 'Separate languages with commas',
                    'add_or_remove_items'        => 'Add or remove languages',
                    'choose_from_most_used'      => 'Choose from the most used languages',
                    'not_found'                  => 'No languages found.'
                );
            
                $args_languages = array(
                    'labels'            => $labels_languages,
                    'hierarchical'      => false,
                    'public'            => true,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
                    'rewrite'           => array( 'slug' => 'languages' )
                );
            
                register_taxonomy( 'languages', 'developer', $args_languages );
        }


        public function init_developers_post_type(){
            $labels = array(
                'name'               => 'Developers',
                'singular_name'      => 'Developer',
                'menu_name'          => 'Developers',
                'name_admin_bar'     => 'Developer',
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Developer',
                'new_item'           => 'New Developer',
                'edit_item'          => 'Edit Developer',
                'view_item'          => 'View Developer',
                'all_items'          => 'All Developers',
                'search_items'       => 'Search Developers',
                'parent_item_colon'  => 'Parent Developers:',
                'not_found'          => 'No developers found.',
                'not_found_in_trash' => 'No developers found in Trash.'
            );
            register_post_type( 'developer',array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'developers' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
                'menu_icon'          => 'dashicons-desktop'
            ));        
        }
    }
 }

 new General_Data();