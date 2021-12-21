<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricka Gauba</title>
    <link rel="shortcut icon" href="<?php echo site_url("assets/images/favicon.png"); ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo site_url("assets/css/bootstrap.min.css"); ?>">

    <!-- Owl Carousel loaded from cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?php echo site_url("assets/css/app.min.css"); ?>">


</head>
<body>

    
    <script src="<?php echo site_url("assets/js/jquery.min.js"); ?>"></script>
    <?php if(!isset($_COOKIE["currency_name"])): ?>
        <script>
            location.reload();
        </script>
    <?php endif; ?>
    

    <header id="desktop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>assets/images/sitelogo.jpg" id="siteLogo"></a>
                </div>
                <div class="col-lg-5">  
                    <?php echo form_open(site_url("universal-product-search")); ?>
                        <div class="form-group">
                        <input style="margin: 1.5rem 0 0 0; border: 1px solid black; height: 2.5em;" placeholder="Find what you love" type="search" name="universal-search" id="universal-search" class="form-control">
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-lg-4">
                    
                    <nav id="top-right-nav" class="ml-auto" style="text-align: right;">

                    <div class="dropdown d-inline custom-dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="currencyMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                            <?php 
                                if (isset($_COOKIE["currency_name"])) {
                                    echo $_COOKIE["currency_name"];
                                } else {
                                    return redirect()->to(site_url());
                                }
                                    
                            ?>

                        </button>
                        <div class="dropdown-menu" aria-labelledby="profileMenu">
                            <?php foreach($currencies as $currency): if($currency["name"]!=$_COOKIE["currency_name"]): ?>
                            <a href="#" class="dropdown-item currency-switcher-item" currency_switching_url="<?php echo site_url("currency-switcher"); ?>" currency_name="<?php echo $currency["name"]; ?>"><?php echo $currency["name"]; ?></a>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>

                    <?php
                      $session = session();  if($session->role!="customer"):
                    ?>

                        <a class="nav-link d-inline" href="<?php echo site_url("login"); ?>"><img src="<?php echo site_url(); ?>assets/icons/user.svg" width="30px" height="30px"></a>

                        

                    <?php else: ?>


                        
                        <div class="dropdown d-inline custom-dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="profileMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo session("first_name"); ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="profileMenu">
                                <a href="<?php echo site_url("profile"); ?>" class="dropdown-item">My Profile</a>
                                <a href="<?php echo site_url("orders"); ?>" class="dropdown-item">Orders</a>
                                <a href="<?php echo site_url("wishlist"); ?>" class="dropdown-item">Wishlist</a>
                                <a href="<?php echo site_url("logout"); ?>" class="dropdown-item">Logout</a>
                            </div>
                        </div>

                        <?php endif; ?>

                        <a class="nav-link d-inline" href="<?php echo site_url("cart"); ?>"><img src="<?php echo site_url(); ?>assets/icons/shopping-bag.svg" width="30px" height="30px"><span class="cart-count-circle" id="cart-item-count" style="position: absolute; top: 1em; width: 22px; height: 22px; line-height: 22px;     font-size: 15px; background-color: black; right: 7%; color: white; font-weight: bolder;"><?php echo $cart_item_count; ?></span></a>
                    </nav>

                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNavbar">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                COLLECTIONS
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php foreach ($collections as $collection): ?>
                                    <a class="dropdown-item" href="<?php echo site_url("collection/".$collection["slug"]) ?>"><?php echo $collection["title"]; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                STYLES
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php foreach($styles as $style): ?> 
                                <a class="dropdown-item" href="<?php echo site_url("style/".$style["slug"]); ?>"><?php echo $style["title"]; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                        
                        
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link nav-link-dark" href="<?php echo site_url(); ?>">HOME</a>
                        </li>
                        
                        <li class="nav-item d-none">
                            <a class="nav-link nav-link-dark" href="<?php echo site_url("shop"); ?>">SHOP</a>
                        </li>

                        

                        <li class="nav-item">
                            <a class="nav-link nav-link-dark" href="<?php echo site_url("about"); ?>">ABOUT</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-link-dark" href="<?php echo site_url("contact"); ?>">CONTACT</a>
                        </li>

                    </ul>
                    
                </div>
            </div>
        </nav>
        <div id="mqCarousel" class="mq w-100 owl-carousel text-center d-none d-xl-block" style="background-color: black; color: white; padding: 1em 0;"  >
        <?php foreach($messages as $message): ?>
        <p style="margin: 0; padding: 0;"><?php echo $message; ?></p>
        <?php endforeach; ?>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top d-lg-block d-xl-none d-md-block d-sm-block" id="mobilenav" style="padding: 0.5rem 0.7rem; background-color: #ffffff !important; border-bottom: 1px solid; box-shadow: 0px 0px 20px darkgray;">

        <a href="#" id="sideNavOpenLink" class="nav-link"><img src="<?php echo site_url('assets/icons/menu.svg'); ?>" width="15px" height="15px"></a>

            
        <a class="navbar-brandx mr-auto ml-auto" style="margin-left: 3%; width: 60%; text-align: center;" href="<?php echo site_url('/'); ?>"><img style="width: 100%;" src="<?php echo site_url('assets/images/sitelogo.jpg'); ?>" id="logonew"></a>

        <a class="nav-link" id="toggleSearchBar" href="#"><img src="<?php echo site_url('assets/icons/search.svg'); ?>" width="15px" height="15px"></a>
        <div id="searchBox" class="container" style="padding: 5%;">
            <?php echo form_open("universal-product-search"); ?>
                                
                <div class="form-group container">
                    <label for="universalSearchField">Find What you Love</label>
                    <input class="form-control" style="border: 1px solid; width: 100%;" placeholder="Search for Products you desire" type="search" name="universal-search" id="universalSearchField">                            
                </div>

            <?php echo form_close(); ?>
        </div>
        <div id="searchBarBackdrop">

        </div>
        <script>
        $("a#toggleSearchBar").click(function (e) { 
            e.preventDefault();
            $("div#searchBox").css('display','block');
            $("div#searchBarBackdrop").css('display','block');
        });
        $("div#searchBarBackdrop").click(function (e) { 
            e.preventDefault();
            $("div#searchBox").css('display','none');
            $(this).css('display','none');
        });
        </script>
        <!-- <a class="nav-link" href="<?php echo site_url('cart'); ?>"><img src="<?php echo site_url('assets/icons/shopping-bag.svg'); ?>" width="15px" height="15px"></a> -->
    </nav>
    <div id="mqCarousel" class="mq w-100 owl-carousel text-center d-block d-lg-none" style="background-color: #000; color: white; padding: 1em 0;"  >
        <?php foreach($messages as $message): ?>
        <p style="margin: 0; padding: 0;"><?php echo $message; ?></p>
        <?php endforeach; ?>
    </div>
    <div id="sidenavMobileCloser"></div>
    <div id="sidenavMobile" style="overflow: auto;
    max-height: 500vh;
    height: 100vh;">
        <div id="sidenavLogoBox" style="text-align: center; background-color: #ffffff !important;">
        <img src="<?php echo site_url('assets/images/sitelogo.jpg'); ?>" id="logonew" style="width: 70%; margin: 10% auto;">
        </div>
        <div id="sidenavCatBox" >
        <?php foreach($collections as $collection): if($collection["parent"]=="0"): ?>

            <a href="<?php echo site_url('collection/'.$collection['slug']); ?>" class="sidenav-link"><?php echo $collection['title']; ?></a>

        <?php endif; endforeach; ?>
        </div>

        <div id="other-links-menu" style="position: absolute; margin-top: 20%; left: 0; right: 0;">
            <a href="<?php echo site_url('/'); ?>" class="sidenav-link">Home</a>
            <!-- <a href="<?php echo site_url('shop'); ?>" class="sidenav-link">Shop</a> -->
            <a href="<?php echo site_url('about'); ?>" class="sidenav-link">About</a>
            <a href="<?php echo site_url('contact'); ?>" class="sidenav-link">Contact</a>
        </div>

    </div>

    