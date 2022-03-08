<?php
require_once('instagram_basic_api.php');

$params= array(
    'get_code' => isset($_GET['code']) ? $_GET['code'] : ''

);

//instantiate class
$ig = new instagram_basic_api($params);

?>

<h1>Instagram Basic Display API</h2>
</hr>
<?php if ($ig-> hasUserAccessToken) : ?>
    <h4>IG Info</h4>
    <h6>Access Token</h6>
    <?php echo $ig-> getUserAccessToken();?> 
    <h6>Expires In</h6>
    <?php echo ceil($ig->getUserAccessTokenExpires()/86400);?>


<?php else : ?>
    <a href = "<?php echo $ig->authorizationUrl; ?>">
        Authorize w/Instagram
    </a>

<?php endif;?>
