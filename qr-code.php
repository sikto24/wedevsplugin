<?php
/**
 * Plugin Name: QR Code Wrapper
 * Plugin URI: google.com
 * Description: A short description of the plugin, as displayed in the Plugins section in the WordPress Admin. 
 * Version: 1.0.0
 * Author: Sikto
 * Author URI: sikto.xyz
 * Text Domain: qrcodeposts
 */

class QCW_Qr_Code
{
    public function __construct()
    {
        add_action( ' init ' , array( $this,'init') );
    }

    public function init()
    {
        add_filter( 'the_content', array( $this,'Show_QR_Code') );
    }

    public function Show_QR_Code($content)
    {
        $current_link = esc_url(get_permalink());
        
        $title = get_the_title();
        $border_style = "border: 1px solid #ddd; padding: 10px; margin: 20px 0;";
        $qr_src = "https://api.qrserver.com/v1/create-qr-code/?color=ff0000&size=150x150&data={$current_link}";

        $custom_content = '
        <div style="'.$border_style.'">
            <img src="'.$qr_src.'" alt="'.$title.'"/>
        </div>';

    
        $content .= $custom_content;
        return $content;

    }
}

new QCW_Qr_Code();