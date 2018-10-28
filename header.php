<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?= $this_page_settings["meta_title"] ?></title>
        <meta http-equiv="content-type" 
              content="text/html;charset=utf-8" />
        <base href="<?= $base_url ?>" />
        <meta name="description" content="<?= $this_page_settings["meta_description"] ?>" />
        <link rel="shortcut icon" href="/favicon.png" type="image/png" />
        <!-- Third-party reset and grid styles-->
        <link href="/css/bootstrap-grid.css" media="all" rel="stylesheet" type="text/css" />
        <?php if (isset($_REQUEST["bootstrap"])): ?>
            <!-- Dev only -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <?php endif; ?>
        <!-- Our CSS -->
        <link href="/css/main.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/print.css" media="print" rel="stylesheet" type="text/css" />
        <!-- Fonts from Google's CDN -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css' />
        <link href=' https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->
    </head>
    <body class="<?= $css_page_name ?>">
        <div class="container outter-wrapper">
            <header>
                <div class="header">
                    <div class="member-box">
                        <div class="clearfix margin-bottom-20">
                            <a href="/inc/tools.php?do=delete" class="primary-button">Delete cookies</a>
                            <a href="/inc/tools.php?do=show" class="primary-button ">Show cookies</a>
                        </div>
                        <?php if ($member_data["member_id"] > 0) { ?>
                            You are logged in as <?= $member_data["name"] ?>.
                        <?php } ?>
                    </div>
                    <a href="<?= $base_url ?>"><img class="logo" src="/images/logo.jpg" alt="INFO Land - Theme Part and Resort" title="Return to the Homepage" /></a>
                    <nav data-spy="affix" data-offset-top="265" class="main-nav-wrapper">
                        <div class="container">
                            <div class="navbar-header">
                                <div class="clearfix">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu-mobile" aria-expanded="false">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="collapse navbar-collapse" id="main-menu-mobile">
                                <ul class="main-nav">
                                    <li class="<?= $page_location == "home" ? 'active' : '' ?>"><a href="/"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="<?php
                                    if (($page_location == "shop") || ($page_location == "shop/category") || ($page_location == "shop/product")) {
                                        echo "active";
                                    }
                                    ?>"><a href="/shop/"><i class="fa fa-shopping-cart"></i> Shop</a></li>
                                    <li class="<?= $page_location == "rides-and-attractions" ? 'active' : '' ?>"><a href="/rides-and-attractions/"><i class="fa fa-map-signs"></i> Rides &amp; Attractions</a></li>
                                    <li class="<?= $page_location == "plan-your-day" ? 'active' : '' ?>"><a href="/plan-your-day/"><i class="fa fa-map"></i> Plan Your Day</a></li>
                                    <li class="<?= $page_location == "tickets-and-deals" ? 'active' : '' ?>"><a href="/tickets-and-deals/"><i class="fa fa-ticket"></i> Tickets &amp; Deals</a></li>
                                    <li class="<?= $page_location == "special-events" ? 'active' : '' ?>"><a href="/special-events/"><i class="fa fa-calendar-check-o"></i> Special Events</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <?php
            if (count($breadcrumbs) > 1) {
                $count = count($breadcrumbs);
                ?>
                <nav class="bcrumb-wrapper">
                    <ol class="breadcrumb">
                        <?php
                        $i = 1;
                        foreach ($breadcrumbs as $crumb) {
                            ?>
                            <li  class="<?php
                            if ($count == $i) {
                                echo "active";
                            }
                            ?>"><a href="<?= $crumb["url"] ?>"><?= $crumb["name"] ?></a></li>
                            <?php
                            $i++;
                        }
                        ?>
                    </ol>
                </nav>
                <?php
            }
            if (isset($_GET["msg"])) {
                echo "<div class=\"system-message\"><label class=\"form-succes\"><i class=\"fa fa-check-circle\"></i> " . $messages[$_GET["msg"]] . "</label></div>";
            }
            ?>