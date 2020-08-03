<?php
session_start();
error_reporting(0);

require '_config.php';

$SQL = $odb->prepare("SELECT * FROM users WHERE username = :username");
$SQL->execute(array(':username' => $_SESSION["username"]));
$data = $SQL->fetch(PDO::FETCH_ASSOC);

$moneyformat = number_format($data["point"]);

$emailza = ($data["email"]);

$topmoney = ($data["totalpoint"]);

$loopuser = $odb->prepare("SELECT * FROM users");
$loopuser->execute();
$feweiei = $loopuser->rowcount(PDO::FETCH_ASSOC);

$usersall = number_format($feweiei);

$stmt = $odb->prepare("UPDATE settings SET string1 = string1 + 1 WHERE id = :password");
$stmt->execute([':password' => "5"]);

$SQL1 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
$SQL1->execute(array(':id' => "1"));
$column1 = $SQL1->fetch(PDO::FETCH_ASSOC);

$SQL2 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
$SQL2->execute(array(':id' => "2"));
$column2 = $SQL2->fetch(PDO::FETCH_ASSOC);

$SQL3 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
$SQL3->execute(array(':id' => "3"));
$column3 = $SQL3->fetch(PDO::FETCH_ASSOC);

$SQL4 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
$SQL4->execute(array(':id' => "4"));
$column4 = $SQL4->fetch(PDO::FETCH_ASSOC);

$SQL5 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
$SQL5->execute(array(':id' => "5"));
$column5 = $SQL5->fetch(PDO::FETCH_ASSOC);

$SQL6 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
$SQL6->execute(array(':id' => "6"));
$column6 = $SQL6->fetch(PDO::FETCH_ASSOC);

$SQL8 = $odb->prepare("SELECT * FROM settings WHERE id = :id");
$SQL8->execute(array(':id' => "8"));
$column8 = $SQL8->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<!--CopyRight © 2020 Luxyz#1199 ใครก๊อปเว็บพ่อมึงตาย -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, charset=" UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="NobyBux Cafe | บริการเติมเกม Roblox ราคาสุดคุ้ม">
  <meta name="keywords" content="NobyBux Cafe | บริการเติมเกม Roblox ราคาสุดคุ้ม">
  <meta property="og:title" content="NobyBux Cafe | บริการเติมเกม Roblox ราคาสุดคุ้ม">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://cdn.discordapp.com/attachments/702144466080890991/702149799301873674/20200120_192957.gif">
  <meta property="og:url" content="http://beta.luxyz.cc/">
  <meta property="og:description" content="NobyBux Cafe | บริการเติมเกม Roblox ราคาสุดคุ้ม">
    <title><?php echo $column1["string1"]; ?></title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://reaperxshop.com/assets/css/bootstrap.css" rel="stylesheet">
    <link rel="icon" href="<?php echo $column1["string2"]; ?>" type="image/x-icon">
    <link href="https://reaperxshop.com/assets/css/fewhakko.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=<?php echo $column1["string3"]; ?>&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="https://reaperxshop.com/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://reaperxshop.com/assets/js/fewhakko.js"></script>

    <script src="/assets/css/v1.js"></script>
    <link href="/assets/css/v2.css" rel="stylesheet">

    <script src="/assets/css/v3.js"></script>
    <link href="/assets/css/v4.css" rel="stylesheet">

    <link href="https://reaperxshop.com/assets/css/popup.css" rel="stylesheet">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: '<?php echo $column1["string3"]; ?>', sans-serif;
        }
    </style>


    <style>
        .swal2-popup {}

        .swal2-icon.swal2-success .swal2-success-ring {}

        .swal2-icon.swal2-success [class^=swal2-success-line] {}


        .swal2-popup .swal2-styled.swal2-confirm {}

        body {
            font-family: 'Kanit', sans-serif !important;
        }

        .candyf {
            font-family: 'Kanit', sans-serif !important;

        }

        .candyr {
            border-radius: 40px 40px;
        }

        .nav-link,
        .nav-brand {
            color: #fffafa;
            font-family: 'Kanit', sans-serif !important;
            font-size: 14px !important;
        }

        a:hover {

            font-family: 'Kanit', sans-serif !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        p {
            font-family: 'Kanit', sans-serif !important;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #85A9D0;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #85A9D0;
        }
    </style>


</head>

<body style="background-image: url('<?php echo $column1["string4"]; ?>'); background-attachment: fixed;">



    <nav style="background-color:#254efd" class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand " style="color: #FFFFFF; font-weight:  normal; text-shadow: 0 0 .7em #0099FF;" href="?page=home"><img src="https://cdn.discordapp.com/attachments/702144466080890991/702149799301873674/20200120_192957.gif" height="50"> NobyBux Cafe</a>
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <?php
                        if (isset($_SESSION["username"])) {
                        ?>

                    <li class="nav-item font16 dropdown <?php if ($_GET["page"] == "shop") {
                                                            echo 'active';
                                                        } ?>">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-shopping-basket" aria-hidden="true"></i> ซื้อสินค้า</a>
                        <div class="dropdown-menu font15" style="">
                            <a class="dropdown-item " href="?page=shop">
                                <img src="https://www.arcshop.in.th/assets/images/category/4-icon.png?update=1584862577" alt="Robux" class="dropdown-image"> Robux</a>
                           


                        </div>

                        
                    </li>
                    </li>
                    
                   

                    <li class="nav-item font16 dropdown <?php if ($_GET["page"] == "shop") {
                                                            echo 'active';
                                                        } ?>">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus-circle" aria-hidden="true"></i> เติมเงิน</a>
                        <div class="dropdown-menu font15" style="">
                            <a class="dropdown-item " href="?page=topup">
                                <img src="https://lh3.googleusercontent.com/eOzvk-ekluYaeLuvDkLb5RJ0KqfFQpodZDnppxPfpEfqEqbNo5erEkmwLBgqP-k-e2kQ" alt="Wallet" class="dropdown-image"> แจ้งโอน Wallet</a>
                           


                        </div>

                        
                    </li>
                    </li>
                    


                    <li class="nav-item font16 dropdown <?php if ($_GET["page"] == "shop") {
                                                            echo 'active';
                                                        } ?>">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle" aria-hidden="true"></i> <?php echo $_SESSION["username"]; ?> </a>
                        <div class="dropdown-menu font15" style="">
                            

                            <span class="dropdown-item-text"><i class="fas fa-coins"></i> ยอดคงเหลือ <?php echo $moneyformat; ?> ฿</span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?page=topup"><i class="fas fa-plus-circle"></i> เติมเงิน</a>
                            <a class="dropdown-item" href="?page=edit"><i class="fas fa-user-edit"></i> แก้ไขข้อมูลส่วนตัว</a>
                            <div class="dropdown-divider"></div>
                           
                            <a class="dropdown-item" href="?page=group"><i class="fas fa-shopping-basket"></i> เติมRobux แบบกลุ่ม</a>
                            <a class="dropdown-item" href="?page=idpass"><i class="fas fa-shopping-basket"></i> เติมRobux แบบไอดีพาส</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:logout();"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> ออกจากระบบ</a>

                        </div>
                    </li>

                    
                <?php
                        }

                        $SQL = $odb->prepare("SELECT * FROM users WHERE username = :status");
                        $SQL->execute(array(':status' => $_SESSION["username"]));
                        $fewtest = $SQL->fetch(PDO::FETCH_ASSOC);

                        if ($fewtest["rank"] == '1') {
                ?>
                    <li class="nav-item <?php if ($_GET["page"] == "login") {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link font16" href="?page=backend"><i class="fas fa-user-cog"></i> แอดมิน</a>
                    </li>
                <?php
                        }
                ?>










                <ul style="background-Transparent:0.50" class="navbar-nav ml-auto">

                    <?php
                    if (isset($_SESSION["username"])) {
                    ?>
                        

                    <?php
                    } else {
                    ?>


                        
                            <a class="nav-link font16" href="?page=login"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a>
                        </li>

                        <li class="nav-item <?php if ($_GET["page"] == "register") {
                                                echo 'active';
                                            } ?>">
                            <a class="nav-link font16" href="?page=register"><i class="fas fa-user-plus"></i> สมัครสมาชิก</a>
                        </li>


                        <li class="nav-item <?php if ($_GET["page"] == "help") {
                                                echo 'active';
                                            } ?>">
                            <a class="nav-link font16" href="?page=help"><i class="fas fa-question-circle"></i> วิธีการสั่งซื้อ</a>
                        </li>

                    <?php
                    }
                    ?>
                </ul>


            </div>
        </div>
    </nav>


    </ul>
    </div>
    </nav>


    <div class="container fewhakko-animate-zoom">
        <br><?php
            if ($_GET["page"] == "") {
                include("page/home.php");
            }
            if ($_GET["page"] == "home") {
                include("page/home.php");
            }
            if ($_GET["page"] == "login") {
                include("page/login.php");
            }
            if ($_GET["page"] == "register") {
                include("page/register.php");
            }
            if ($_GET["page"] == "topup") {
                include("page/topup.php");
            }
            if ($_GET["page"] == "group") {
                include("page/groupz.php");
            }
            if ($_GET["page"] == "infouser") {
                include("page/infouser.php");
            }
            if ($_GET["page"] == "backend") {
                include("page/backend.php");
            }
            if ($_GET["page"] == "admin") {
                include("page/admin.php");
            }
            if ($_GET["page"] == "logtopup") {
                include("page/logtopup.php");
            }
            if ($_GET["page"] == "TOS") {
                include("page/TOS.php");
            }
            if ($_GET["page"] == "queue") {
                include("page/queue.php");
            }
            if ($_GET["page"] == "owo") {
                include("page/logtopup.php");
            }
            if ($_GET["page"] == "uwu") {
                include("page/logbuy.php");
            }
            if ($_GET["page"] == "account") {
                include("page/account.php");
            }
            if ($_GET["page"] == "idpass") {
                include("page/shopidpass.php");
            }
            if ($_GET["page"] == "history_robux") {
                include("page/history.php");
            }
            if ($_GET["page"] == "history_topup") {
                include("page/history2.php");
            }
            if ($_GET["page"] == "queue") {
                include("page/queue.php");
            }
            if ($_GET["page"] == "idgroup") {
                include("page/idgroup.php");
            }
            if ($_GET["page"] == "shop") {
                include("page/shop.php");
            }
            if ($_GET["page"] == "shopidpass") {
                include("page/shopidpass.php");
            }
            include("page/footer.php");
            ?>
    </div>


    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v6.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="107561474187944" theme_color="#fa3c4c" logged_in_greeting="มีไรให้ทางร้านช่วยหรือไหม ?" logged_out_greeting="มีไรให้ทางร้านช่วยหรือไหม ?">
    </div>



    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/fewhakko.js"></script>
    <script type="text/javascript" src="assets/js/xd.js"></script>
    
    <style type="text/css">
        .color-hue {
            color: #f35626;
            background-image: -webkit-linear-gradient(92deg, #f35626, #feab3a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            -webkit-animation: hue 1s infinite linear;
        }

        @-webkit-keyframes hue {
            from {
                -webkit-filter: hue-rotate(0deg);
            }

            to {
                -webkit-filter: hue-rotate(360deg);
            }
        }
    </style>
</body>

</html>