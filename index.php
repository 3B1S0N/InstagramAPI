<?php
require_once('instagram_basic_api.php');

$params= array(
    'get_code' => isset($_GET['code']) ? $_GET['code'] : ''

);

    //instantiate class
    $ig = new instagram_basic_api($params);

?>

<h1>Instagram Basic Display API</h1>
</hr>
<?php if ($ig-> hasUserAccessToken) : ?>
    <h4>IG Info</h4>
    <hr/>
    <?php echo $ig -> getUserAccessToken(); ?>
    <hr/>
    <?php $user = $ig->getUser();?>
    <pre>
        <?php print_r($user);?>
    </pre>
    <h1>Username: <?php ech $user['username'];?></h1>
    <h2>IG ID: <?php ech $user['id'];?></h1>
    <h3>Media Count: <?php ech $user['media_count'];?></h1>
    <h4>Account Type: <?php ech $user['account_type'];?></h1>
    <h6>Access Token</h6>
    <hr/>
    
<?php else : ?>
    <a href = "<?php echo $ig->authorizationUrl; ?>">
        Authorize w/Instagram
    </a>

<?php endif;?>
