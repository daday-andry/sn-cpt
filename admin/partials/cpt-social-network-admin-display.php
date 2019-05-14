<style type="text/css">
   .customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    .customers td, .customers th {
    border: 1px solid #ddd;
    padding: 8px;
    vertical-align: top;
    }
    .customers #pub{
       // width:40%;
        //text-align:center;
    }
    .title-top td{
        text-align:center;
        background-color:#ddd;
    }

    .customers th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
        background-color: #0379af;
        color: white;
    }
    .sous_menu label{
        //padding-right:20px;
    }    
</style>
<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       andrynirina.portfoliobox.net
 * @since      1.0.0
 *
 * @package    Cpt_Social_Network
 * @subpackage Cpt_Social_Network/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<form method = "post" action = "options.php">
    <?php wp_nonce_field('update-options'); ?>
    <table class="customers">
        <caption><h1>Configuration.</h1></caption>
        <tr>
            <td>
                <table class="customers">
                    <tr>
                        <th>Facebook et Instagram</th>
                    </tr>
                    <tr>
                        <td>
                            <label for="fb_app_id">Facebook app ID</label><br>
                            <input type="text" name="fb_app_id" value="<?php echo get_option("fb_app_id") ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fb_app_secret">Facebook app secret</label><br>
                            <input type="password" name="fb_app_secret" value="<?php echo get_option("fb_app_secret") ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fb_page_id">Facebook page ID</label><br>
                            <input type="text" name="fb_page_id" value="<?php echo get_option("fb_page_id") ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fb_page_id">Facebook page Token</label><br>
                            <input type="text" name="fb_page_token" value="<?php echo get_option("fb_page_token") ?>">
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="customers">
                    <tr>
                        <th>Linkedin</th>
                    </tr>
                    <tr>
                        <td>
                            <label>Linkedin APP ID</label><br>
                            <input type="text">
                        </td>
                    </tr>
                </table>
            </td>
            <td id="pub">Pub et Documentation</td>
        </tr>
    </table>

    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="fb_app_id,fb_page_id,fb_page_token,fb_app_secret" />
    <?php submit_button (); ?>
</form>