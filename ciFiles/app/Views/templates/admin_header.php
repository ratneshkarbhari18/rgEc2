
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title><?php echo $title ?> | Ricka Gauba Admin</title>


    <!-- Bootstrap core CSS -->
    <link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Admin css -->
    <link href="<?php echo site_url('assets/css/admin.min.css'); ?>" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <style>
    body{font-size:.875rem}.feather{width:16px;height:16px;vertical-align:text-bottom}.sidebar{position:fixed;top:0;bottom:0;left:0;z-index:100;padding:48px 0 0;box-shadow:inset -1px 0 0 rgba(0,0,0,.1)}@media (max-width:767.98px){.sidebar{top:5rem}}.sidebar-sticky{position:relative;top:0;height:calc(100vh - 48px);padding-top:.5rem;overflow-x:hidden;overflow-y:auto}@supports ((position:-webkit-sticky) or (position:sticky)){.sidebar-sticky{position:-webkit-sticky;position:sticky}}.sidebar .nav-link{font-weight:500;color:#333}.sidebar .nav-link .feather{margin-right:4px;color:#999}.sidebar .nav-link.active{color:#007bff}.sidebar .nav-link.active .feather,.sidebar .nav-link:hover .feather{color:inherit}.sidebar-heading{font-size:.75rem;text-transform:uppercase}.navbar-brand{padding-top:.75rem;padding-bottom:.75rem;font-size:1rem;background-color:rgba(0,0,0,.25);box-shadow:inset -1px 0 0 rgba(0,0,0,.25)}.navbar .navbar-toggler{top:.25rem;right:1rem}.navbar .form-control{padding:.75rem 1rem;border-width:0;border-radius:0}.form-control-dark{color:#fff;background-color:rgba(255,255,255,.1);border-color:rgba(255,255,255,.1)}.form-control-dark:focus{border-color:transparent;box-shadow:0 0 0 3px rgba(255,255,255,.25)}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="<?php echo site_url('admin-dashboard'); ?>">Ricka Gauba</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 d-none" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" style="color: white !important;" href="<?php echo site_url('logout'); ?>">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item no-margin">
                <a class="nav-link sidebar-link" href="<?php echo site_url('admin-dashboard'); ?>">
                Dashboard 
                </a>
            </li>
            <!-- <li class="nav-item no-margin">
                <a class="nav-link sidebar-link" href="<?php echo site_url('manage-collections'); ?>">
                Collections 
                </a>
            </li> -->
            <li class="nav-item no-margin">
              <a class="nav-link sidebar-link" data-toggle="collapse" href="#collectionMenu" role="button" aria-expanded="false" aria-controls="collectionMenu">
                Collections
              </a>
            </li>
            <div class="collapse" id="collectionMenu">
              <a class="d-block nav-link sidebar-dropdown-link" href="<?php echo site_url("manage-collections"); ?>">Manage</a></li>
              <a class="d-block nav-link sidebar-dropdown-link" href="<?php echo site_url("add-collection"); ?>">Add</a></li>
              
            </div>

            
            
            <!-- <li class="nav-item no-margin">
                <a class="nav-link sidebar-link" href="<?php echo site_url('manage-styles'); ?>">
                Styles 
                </a>
            </li> -->

            <li class="nav-item no-margin">
              <a class="nav-link sidebar-link" data-toggle="collapse" href="#styleMenu" role="button" aria-expanded="false" aria-controls="styleMenu">
                Styles
              </a>
            </li>
            <div class="collapse" id="styleMenu">
              <a class="d-block nav-link sidebar-dropdown-link" href="<?php echo site_url("manage-styles"); ?>">Manage</a></li>
              <a class="d-block nav-link sidebar-dropdown-link" href="<?php echo site_url("add-style"); ?>">Add</a></li>
              
            </div>

            <!-- <li class="nav-item no-margin">
                <a class="nav-link sidebar-link" href="<?php echo site_url('manage-products'); ?>">
                Products 
                </a>
            </li> -->

            <li class="nav-item no-margin">
              <a class="nav-link sidebar-link" data-toggle="collapse" href="#productMenu" role="button" aria-expanded="false" aria-controls="productMenu">
                Products
              </a>
            </li>
            <div class="collapse" id="productMenu">
              <a class="d-block nav-link sidebar-dropdown-link" href="<?php echo site_url("manage-products"); ?>">Manage</a></li>
              <a class="d-block nav-link sidebar-dropdown-link" href="<?php echo site_url("add-product"); ?>">Add</a></li>
              
            </div>

            
            <li class="nav-item no-margin">
                <a class="nav-link sidebar-link" href="<?php echo site_url('manage-orders'); ?>">
                Orders 
                </a>
            </li>

            <li class="nav-item no-margin">
                <a class="nav-link sidebar-link" href="<?php echo site_url('manage-testimonials'); ?>">
                Testimonials 
                </a>
            </li>
            
            <li class="nav-item no-margin">
                <a class="nav-link sidebar-link" href="<?php echo site_url('manage-homepage-slides'); ?>">
                HomePage Slides
                </a>
            </li>

            <li class="nav-item no-margin">
              <a class="nav-link sidebar-link" data-toggle="collapse" href="#marketingMenu" role="button" aria-expanded="false" aria-controls="marketingMenu">
                Marketing
              </a>
            </li>
            <div class="collapse" id="marketingMenu">
              <a class="d-block nav-link sidebar-dropdown-link" href="<?php echo site_url("coupons-mgt"); ?>">Coupons Mgt.</a></li>
              <a class="d-block nav-link sidebar-dropdown-link" href="<?php echo site_url("popup-mgt"); ?>">Popup Mgt.</a></li>
              <a class="d-block nav-link sidebar-dropdown-link" href="<?php echo site_url("email-signups"); ?>">Email Signups</a></li>
              
            </div>
            
            <li class="nav-item no-margin">
              <a href="<?php echo site_url('sc-mgt'); ?>" class="nav-link sidebar-link">
              Shipping Rates
              </a>
            </li>
            <li class="nav-item no-margin">
                <a class="nav-link sidebar-link" href="<?php echo site_url('manage-customers'); ?>">
                Manage Customers
                </a>
            </li>
            <!-- <li class="nav-item no-margin">
              <a href="<?php echo site_url('coupons-mgt'); ?>" class="nav-link sidebar-link">
              Coupon Mgt.
              </a>
            </li> -->
           
            

            <li class="nav-item no-margin d-none">
                <a class="nav-link sidebar-link" href="<?php echo site_url('sales-reports'); ?>">
                Sales Reports
                </a>
            </li>
            <li class="nav-item no-margin d-none">
                <a class="nav-link sidebar-link" href="<?php echo site_url('flush-cache'); ?>">
                Flush Cache
                </a>
            </li>
        </ul>

        
    </nav>
    <style>
      li.nav-item.dropdown.no-margin:hover a{
        color: white !important;
      }
    </style>
    <script src="<?php echo site_url("assets/js/jquery.min.js"); ?>"></script>