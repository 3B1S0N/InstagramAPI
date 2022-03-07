<?php
    include 'defines.php';

    //load graoh-sdk files
    require_once __DIR__ . '/vendor/autoload.php';

    // facebook credentials array

    $creds = array(
        'app_id' => FACEBOOK_APP_ID,
        'app_secret' => FACEBOOK_APP_SECRET,
        'default_graph_version' => 'v3.2',
        'persistent_data_handler' => 'session'
    );

    //create facebook object
    $facebook = new Facebook\Facebook($creds);

    //helper
    $helper = $facebook->getRedirectLoginHelper();

    // oauth object
    $oAuth2Client = $facebook->getOAuth2Client();

    if(isset($_GET['code'])){
    }
    else{
        $permissions = ['public_profile','instagram_basic','pages_show_list'];
        $loginUrl = $helper ->getLoginUrl(FACEBOOK_REDIRECT_URI,$permissions);

        echo '<a href="' . $loginUrl . '">
            Login With Facebook
            </a>';
    }
?>