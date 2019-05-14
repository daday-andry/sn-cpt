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
<hr>
<p>
    <label for="<?php echo $this->get_field_name('fb_app_id');?>"><?php _e( 'FB App ID:' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('fb_app_id'); ?>" name="<?php echo $this->get_field_name('fb_app_id');?>" value="<?php echo  $fb_app_id; ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_name('fb_page_id');?>"><?php _e( 'FB Page ID:' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('fb_page_id'); ?>" name="<?php echo $this->get_field_name('fb_page_id');?>" value="<?php echo  $fb_page_id; ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_name('app_token');?>"><?php _e( 'Page Token:' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('app_token'); ?>" name="<?php echo $this->get_field_name('app_token');?>" value="<?php echo  $app_token; ?>" />
</p>

