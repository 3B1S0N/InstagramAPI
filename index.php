<?php
require_once('instagram_basic_api.php');
 $accessToken = 'IGQVJWa29kaGx5cjZAVYVItWVh4anBSVnFydWxsT29ZAOGV6bFEwS1VaU0tkY0YxbHR5MkVGRFVzZAWwxanVlY21JLU5COHhFX0dZAQnYxdEdGa3BGd1lGODhwckJFeDVpU3F6NjFzQTNn';


$params= array(
    'get_code' => isset($_GET['code']) ? $_GET['code'] : ''
    'access_token'=> $accessToken
);

    //instantiate class
    $ig = new instagram_basic_api($params);

?>

<h1>Instagram Basic Display API</h1>
<?php if ($ig-> hasUserAccessToken) : ?>
    <h4>IG Info</h4>
    <hr/>
    <?php echo $ig -> getUserAccessToken(); ?>
    <hr/>
    <h6>Expires in</h6>
    <?php echo ceil($ig->getUserAccessTokenExpires()/86400); ?> days
    <hr/>
    <?php $user = $ig->getUser();?>
    <pre>
        <?php print_r($user);?>
    </pre>
    <h1>Username: <?php echo $user['username'];?></h1>
    <h2>IG ID: <?php echo $user['id'];?></h1>
    <h3>Media Count: <?php echo $user['media_count'];?></h1>
    <h4>Account Type: <?php echo $user['account_type'];?></h1>

<?php else : ?>
    <a href = "<?php echo $ig->authorizationUrl; ?>">
        Authorize w/Instagram
    </a>

<?php endif;?>
