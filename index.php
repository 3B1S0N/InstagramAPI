<?php
require_once('instagram_basic_api.php');

$accessToken = 'IGQVJYVU1Kc0d5d2xaV2hWZAmR6M3EyYlBuWkRjZAEM3RDczX1hmQ0xTMlJhb0NUZAlZATNzN2cGxIcFpxV1RHRUhhbHZAjc1Q2eDVIdkNaVlZAWVmtWNDV4VlRmYy1BdzRSVXRMdEZAsMnZAB';

$params= array(
    'get_code' => isset($_GET['code']) ? $_GET['code'] : '',
    'access_token' => $accessToken,
    'user_id' => '6993772224026718'
);

//instantiate class
$ig = new instagram_basic_api($params);

?>

<h1>Instagram Basic Display API</h2>
<hr/>
<?php if ($ig-> hasUserAccessToken) : ?>
    <h4>IG Info</h4>
    <hr/>
    <?php $user = $ig->getUser();?>
    <pre>
        <?php print_r($user);?>
    </pre>
    <h2>Username: <?php echo $user['username']; ?></h2>
    <h3> IG ID: <?php echo $user['id']; ?></h3>
    <h4>Media Count: <?php echo $user['media_count']; ?></h4>
    <h5>Account Type:<?php echo $user['account_type']; ?></h5>
    <hr />
    <h6>Access Token</h6>
    <?php echo $ig-> getUserAccessToken();?> 
    <hr/>

    <?php $usersMedia = $ig->getUsersMedia();>?
    <h3>Users Media Page 1 (<?php echo count($usersMedia['data']); ?>)</h3>
    <h4>Raw Data</h4>
    <textarea style='width:100%;height:400px;'><?php print_r($usersMedia['data']);?></textarea>

   


<?php else : ?>
    <a href = "<?php echo $ig->authorizationUrl; ?>">
        Authorize w/Instagram
    </a>

<?php endif;?>
