<?php 

        $fb_app_id=get_option("fb_app_id");
        $fb_app_secret=get_option("fb_app_secret");
        $fb_page_token=get_option('fb_page_token');
        $fb_page_id=get_option('fb_page_id');

        global $post;
        $medias = get_attached_media( 'image',$post->ID);
        // il s'agit de FAcebook ou Instagram ou Linked in
        $category = get_the_terms( $post->ID,'social_network_cpt_categ_tax' );

        //si facebook
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/fb_sdk/vendor/autoload.php';

         // Charger FB SDK
         $fb = new \Facebook\Facebook([
            'app_id' => $fb_app_id,
            'app_secret' => $fb_app_secret,
            'default_graph_version' => 'v3.2',
            'default_access_token' => $fb_page_token, // optional
         ]);

        // Construire argument requette 
        $fb_post_args=array();
        if(count($medias)>1){
            $k=0;
            foreach ($medias as $key => $media) {
                $fb_post_args['attached_media'][$k]=$media->guid;
                $k++;
            }
        }
        //Verifier si modification ou ajout
        $facebook_post_id=get_post_meta($post->ID,"facebook_post_id");
        $fb_post_action=(!$facebook_post_id==NULL)?$facebook_post_id[0]:$fb_page_id.(count($medias)>1)?"/feed":"/photos";
        $fb_post_args['message']=stripslashes($_POST['content']);
        
        $response="";
        // executer requette
        try {
            $response = $fb->post($fb_post_action,$fb_post_args);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            $response = 'Graph returned an error: ' . $e->getMessage();
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            $response= 'Facebook SDK returned an error: ' . $e->getMessage();
        }
        /*
        $graphNode = $response->getGraphNode();

        if($facebook_post_id==NULL)
            add_post_meta($post->ID, "facebook_post_id", $graphNode->asArray()['id']);

        echo "successss";
        var_dump($graphNode);    
        exit();
        
        /*
          
       
        
        //update publication
        $facebook_post_id=get_post_meta($post->ID,"facebook_post_id")[0];
            try {
            // Returns a `Facebook\FacebookResponse` object
                $response = $fb->post(
                    "/$facebook_post_id",
                array (
                'message' => $_POST['content'],
                )
            );
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
            }
            $graphNode = $response->getGraphNode();


        }else{
        // Ajout publication		 
        try {
            // Returns a `FacebookFacebookResponse` object
            $response = $fb->post(
            '/650944378659263/feed',
            array (
                'message' => $_POST['content']
            )
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $graphNode = $response->getGraphNode();
        
        }
*/
        ?>