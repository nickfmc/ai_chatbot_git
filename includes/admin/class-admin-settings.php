<?php
/**
 * Admin Settings Class
 *
 * @package WP_GPT_Chatbot
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

class WP_GPT_Chatbot_Admin_Settings {
    public function init() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
    }
    
    public function add_admin_menu() {
        add_menu_page(
            __('WP GPT Chatbot Settings', 'wp-gpt-chatbot'),
            __('GPT Chatbot', 'wp-gpt-chatbot'),
            'manage_options',
            'wp-gpt-chatbot',
            array($this, 'display_settings_page'),
            'dashicons-format-chat',
            85
        );
    }
    
    public function register_settings() {
        register_setting('wp_gpt_chatbot_options', 'wp_gpt_chatbot_settings', array($this, 'validate_settings'));
    }
    
    public function validate_settings($input) {
        // Sanitize each setting
        $input['api_key'] = sanitize_text_field($input['api_key']);
        $input['model'] = sanitize_text_field($input['model']);
        $input['training_prompt'] = sanitize_textarea_field($input['training_prompt']);
        $input['primary_color'] = sanitize_hex_color($input['primary_color']);
        $input['secondary_color'] = sanitize_hex_color($input['secondary_color']);
        $input['bot_name'] = sanitize_text_field($input['bot_name']);
        $input['position'] = sanitize_text_field($input['position']);
        $input['welcome_message'] = sanitize_text_field($input['welcome_message']);
        
        return $input;
    }
    
    public function display_settings_page() {
        include WP_GPT_CHATBOT_PATH . 'includes/admin/views/admin-page.php';
    }
}
