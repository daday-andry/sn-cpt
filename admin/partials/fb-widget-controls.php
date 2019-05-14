<?php
$fb_title = isset($instance['fb_title']) ? $instance['fb_title']:'';

$fb_app_id = isset($instance['fb_app_id']) ? $instance['fb_app_id']:'';
$fb_page_id = isset($instance['fb_page_id']) ? $instance['fb_page_id']:'';
$app_token = isset($instance['app_token']) ? $instance['app_token']:'';
?>
<p>
    <label for="<?php echo $this->get_field_name('fb_title');?>"><?php _e( 'Titre:' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('fb_title'); ?>" name="<?php echo $this->get_field_name('fb_title');?>" value="<?php echo  $fb_title; ?>" 
    />
</p>


