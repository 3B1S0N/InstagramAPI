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
    echo 'yes';

<?php else : ?>
    <a href = "<?php echo $ig->authorizationUrl; ?>">
        Authorize w/Instagram
    </a>

<?php endif;?>
