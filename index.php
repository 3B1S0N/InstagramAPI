<?php
require_once('instagram_basic_api.php');
$accessToken = 'IGQVJXdGVaT0cwMTJsQ2xKendlVWxCLTUtZAU5fdEs0cHRmdndKSFc2T1BsTUxLSHBzeHRCT2JweVF5TTI2MnE3TzMwaVptNWQ4ZAG82TF9WZAEM1NFlJRmFPdEJrZADZA3S2ZA3eVpkdkl3';


$params= array(
    'get_code' => isset($_GET['code']) ? $_GET['code'] : '',
    'access_token' => $accessToken

);

    //instantiate class
    $ig = new instagram_basic_api($params);

?>

<h1>Instagram Basic Display API</h1>
</hr>
<?php if ($ig-> hasUserAccessToken) : ?>
    <h4>IG Info</h4>
    <h6>Access Token</h6>
    <?php echo $ig -> getUserAccessToken(); ?>
    <h6>Expires in</h6>
    <?php echo ceil($ig -> getUserAccessTokenExpires()/86400 );?> days
    
<?php else : ?>
    <a href = "<?php echo $ig->authorizationUrl; ?>">
        Authorize w/Instagram
    </a>

<?php endif;?>
