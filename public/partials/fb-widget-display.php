<style>
    .blog-content p{
        height : 90px;
        overflow: hidden;
        text-align: justify;
        text-justify: inter-word;
    }
    .more-btn{
        float:right;
        color: blue;
    }
</style>

<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       andrynirina.portfoliobox.net
 * @since      1.0.0
 *
 * @package    Fbcp
 * @subpackage Fbcp/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php 
    $fb_title = isset($instance['fb_title']) ? $instance['fb_title']:'Actualité';
    $fb_app_id = isset($instance['fb_app_id']) ? $instance['fb_app_id']:'';
    $fb_page_id = isset($instance['fb_page_id']) ? $instance['fb_page_id']:'';
    $app_token = isset($instance['app_token']) ? $instance['app_token']:'';
?>
<script>
      window.fbAsyncInit = function() {
        FB.init({
        appId      : '<?php echo $fb_app_id;?>',
        cookie     : true,
        xfbml      : true,
        version    : 'v3.2'
        });
        FB.AppEvents.logPageView();   
        new_feeds();
        };
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    function new_feeds(){
    var token_access="<?php echo $app_token ?>";
    var page_id="<?php echo $fb_page_id ?>";
    FB.api("/"+page_id+"/feed",
        {fields : 'id,created_time,message,link,picture',
        access_token : token_access
        },
        function (response) {
            if (response && !response.error){
                jQuery('.fb-div').html('');
                for (var i = 0; i < response.data.length; i++) {
                    var post=response.data[i];
                    var post_date= post.created_time.split("T");
                    console.log();
                    //jQuery('.fb-div').append("<div><a href='"+post.link+"'><img src='"+post.picture+"'><p>"+post.message+"</p></a></div>");
                    jQuery('.fb-div').append(
                        "<div class='col-md-4'>"+
                            "<div class='single-blog-item'>"+
                                "<div class='blog-thumnail'>"+
                                    "<a href='"+post.link+"'><img src='"+post.picture+"' alt='blog-img'></a>"+
                                "</div>"+
                                "<div class='blog-content'>"+
                                    "<p>"+post.message+"</p>"+
                                    "<a href='"+post.link+"' class='more-btn'>Lire la suite</a>"+
                                "</div>"+
                                "<span class='blog-date'>"+post_date[0]+" à "+post_date[1].split('+')[0]+"</span>"+
                            "</div>"+
                        "</div>"
                    );
                }
            }else
            console.log(response);
        }
    );
}
</script>

<div>
    <h1><?php _e($fb_title) ?></h1>
    <hr>
    <div class="fb-div">
    
    </div>
</div>
