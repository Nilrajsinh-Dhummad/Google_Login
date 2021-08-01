<?php
include('config.php');
if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        $_SESSION['user_email_address'] = $data['email'];
        $_SESSION['user_first_name'] = $data['given_name'];
        $_SESSION['user_last_name'] = $data['family_name'];
        $_SESSION['user_image'] = $data['picture'];
        $_SESSION['login_button'] = false;
    }
}
if (isset($_SESSION['login_button'])) {
    $login_button = $_SESSION['login_button'];
} else {
    $login_button = true;
}
?>
<html>

<head>
    <title>PHP Login using Google Account</title>
    <link rel="stylesheet" href="./assets/vendors/core/core.css">
    <link rel="stylesheet" href="./assets/fonts/feather-=font/css/iconfont.css">
    <link rel="stylesheet" href="./assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="./assets/css/demo_1/style.css">
    <link rel="shortcut icon" href="./assets/images/favicon.png" />
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title" align="center"><b>PHP Login using Google Account</b></h3>
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <div class="form-group">
                                                <?php
                                                if ($login_button) {
                                                ?>
                                                    <a href="<?php print_r($google_client->createAuthUrl()); ?>"><img src='google.png'></a>
                                                <?php
                                                } else {
                                                    header('location:dash.php');
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/vendors/core/core.js"></script>
    <script src="./assets/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="./assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script src="./assets/vendors/feather-icons/feather.min.js"></script>
    <script src="./assets/js/template.js"></script>
    <script src="./assets/js/dashboard.js"></script>
</body>

</html>