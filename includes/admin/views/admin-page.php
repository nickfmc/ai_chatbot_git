<?php
/**
 * Admin Settings Page
 *
 * @package WP_GPT_Chatbot
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

$settings = get_option('wp_gpt_chatbot_settings');
?>
<div class="wrap">
    <h1><?php echo esc_html__('WP GPT Chatbot Settings', 'wp-gpt-chatbot'); ?></h1>
    
    <form method="post" action="options.php">
        <?php settings_fields('wp_gpt_chatbot_options'); ?>
        <?php do_settings_sections('wp_gpt_chatbot_options'); ?>
        
        <div class="wp-gpt-chatbot-settings-container">
            <h2><?php echo esc_html__('API Settings', 'wp-gpt-chatbot'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="wp_gpt_chatbot_settings[api_key]"><?php echo esc_html__('OpenAI API Key', 'wp-gpt-chatbot'); ?></label>
                    </th>
                    <td>
                        <input type="password" id="wp_gpt_chatbot_settings[api_key]" name="wp_gpt_chatbot_settings[api_key]" value="<?php echo esc_attr($settings['api_key']); ?>" class="regular-text">
                        <p class="description"><?php echo esc_html__('Enter your OpenAI API key. You can get one from https://platform.openai.com/account/api-keys', 'wp-gpt-chatbot'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wp_gpt_chatbot_settings[model]"><?php echo esc_html__('OpenAI Model', 'wp-gpt-chatbot'); ?></label>
                    </th>
                    <td>
                        <select id="wp_gpt_chatbot_settings[model]" name="wp_gpt_chatbot_settings[model]">
                            <option value="gpt-3.5-turbo" <?php selected($settings['model'], 'gpt-3.5-turbo'); ?>><?php echo esc_html__('GPT-3.5 Turbo', 'wp-gpt-chatbot'); ?></option>
                            <option value="gpt-4" <?php selected($settings['model'], 'gpt-4'); ?>><?php echo esc_html__('GPT-4', 'wp-gpt-chatbot'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wp_gpt_chatbot_settings[training_prompt]"><?php echo esc_html__('System Prompt (Training Material)', 'wp-gpt-chatbot'); ?></label>
                    </th>
                    <td>
                        <textarea id="wp_gpt_chatbot_settings[training_prompt]" name="wp_gpt_chatbot_settings[training_prompt]" rows="10" class="large-text"><?php echo esc_textarea($settings['training_prompt']); ?></textarea>
                        <p class="description"><?php echo esc_html__('Enter your training material/instructions. This is what guides the chatbot\'s responses.', 'wp-gpt-chatbot'); ?></p>
                    </td>
                </tr>
            </table>
            
            <h2><?php echo esc_html__('Appearance Settings', 'wp-gpt-chatbot'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="wp_gpt_chatbot_settings[bot_name]"><?php echo esc_html__('Bot Name', 'wp-gpt-chatbot'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="wp_gpt_chatbot_settings[bot_name]" name="wp_gpt_chatbot_settings[bot_name]" value="<?php echo esc_attr($settings['bot_name']); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wp_gpt_chatbot_settings[welcome_message]"><?php echo esc_html__('Welcome Message', 'wp-gpt-chatbot'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="wp_gpt_chatbot_settings[welcome_message]" name="wp_gpt_chatbot_settings[welcome_message]" value="<?php echo esc_attr($settings['welcome_message']); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wp_gpt_chatbot_settings[primary_color]"><?php echo esc_html__('Primary Color', 'wp-gpt-chatbot'); ?></label>
                    </th>
                    <td>
                        <input type="color" id="wp_gpt_chatbot_settings[primary_color]" name="wp_gpt_chatbot_settings[primary_color]" value="<?php echo esc_attr($settings['primary_color']); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wp_gpt_chatbot_settings[secondary_color]"><?php echo esc_html__('Secondary Color', 'wp-gpt-chatbot'); ?></label>
                    </th>
                    <td>
                        <input type="color" id="wp_gpt_chatbot_settings[secondary_color]" name="wp_gpt_chatbot_settings[secondary_color]" value="<?php echo esc_attr($settings['secondary_color']); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wp_gpt_chatbot_settings[position]"><?php echo esc_html__('Widget Position', 'wp-gpt-chatbot'); ?></label>
                    </th>
                    <td>
                        <select id="wp_gpt_chatbot_settings[position]" name="wp_gpt_chatbot_settings[position]">
                            <option value="bottom-right" <?php selected($settings['position'], 'bottom-right'); ?>><?php echo esc_html__('Bottom Right', 'wp-gpt-chatbot'); ?></option>
                            <option value="bottom-left" <?php selected($settings['position'], 'bottom-left'); ?>><?php echo esc_html__('Bottom Left', 'wp-gpt-chatbot'); ?></option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        
        <?php submit_button(); ?>
    </form>
</div>
