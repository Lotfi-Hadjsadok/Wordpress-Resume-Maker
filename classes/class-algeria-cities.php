<?php 
if(!defined('ABSPATH'))die;
if(!class_exists('Algeria_Cities')){
    class Algeria_Cities{


        public function __construct()
        {
        }

        /**
         * Get Table Name
         */
        public static function get_table(){
            global $wpdb;
            return  $wpdb->prefix.'algeria_cities';
        }

        /**
         * Get states
         */
        public static function get_states(){
            global $wpdb;
            $states = $wpdb->get_results("SELECT DISTINCT commune_name_ascii,wilaya_code,wilaya_name,wilaya_name_ascii from ". self::get_table() ." ORDER BY wilaya_code",ARRAY_A);
            return $states;
        }
    }
}

new Algeria_Cities();