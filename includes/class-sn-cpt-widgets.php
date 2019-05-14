<?php
/*** FACEBOOK Widgets */
class FB_Page_Widget extends WP_Widget{
    public function __construct(){
        parent::__construct('FB_Page_Widget','FB Page widget',array('description'=>'Fil d\'actualité'));
    }
    public function widget($args,$instance){
        include (plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/fb-widget-display.php');

    }
    public function form($instance){
        include (plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/fb-widget-controls.php');
    }

}

class Instagram_Widget extends WP_Widget{
    public function __construct(){
        parent::__construct('Instagram_Widget','Instagram Post widget',array('description'=>'Post instagram'));
    }
    public function widget($args,$instance){
        include (plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/fb-widget-display.php');

    }
    public function form($instance){
		include (plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/fb-widget-controls.php');
    }

}