<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PageLoader');
$routes->setDefaultMethod('home');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Public Pages
$routes->get('/', 'PageLoader::home');
$routes->get('admin-login', 'PageLoader::admin_login');
$routes->get("product/(:any)","PageLoader::product_page/$1");
$routes->get("login","PageLoader::customer_login");
$routes->get("register","PageLoader::customer_registration");
$routes->get("cart","PageLoader::cart");
$routes->get("shop","PageLoader::shop");

$routes->get("collection/(:any)","PageLoader::collection_page/$1");
$routes->get("style/(:any)","PageLoader::style_page/$1");
$routes->get("forgot-password","PageLoader::forgot_password");
$routes->get("payment-successful","PageLoader::payment_successful");
$routes->get("payment-failed","PageLoader::payment_failed");
$routes->get("wishlist","PageLoader::wishlist");

// Public Static
$routes->get("about","PageLoader::about");
$routes->get("contact","PageLoader::contact");
$routes->get("terms-and-conditions","PageLoader::tnc");
$routes->get("privacy-policy","PageLoader::privacy_policy");
$routes->get("refund-policy","PageLoader::refund_policy");
$routes->get("cancellation-policy","PageLoader::cancellation_policy");
$routes->get("shipping-policy","PageLoader::shipping_policy");
$routes->get("refund-exchange-policy","PageLoader::refund_exchange");

// filter
$routes->post("product-filter-exe","PageLoader::product_filter");

// Customer Pages
$routes->get("orders","PageLoader::my_orders");
$routes->get("profile","PageLoader::my_profile");
$routes->get("wishlist","PageLoader::my_wishlist");

// Wishlist Routes
$routes->post("add-to-wishlist-exe","Wishlist::add");
$routes->post("delete-from-wishlist-exe","Wishlist::delete");


// Orders routes
$routes->post("change-order-status-exe","Orders::change_status");
$routes->get("download-order-slip/(:any)","BackgroundFeatures::download_order_slip/$1");

// Authentication
$routes->post("admin-login-exe","Authentication::admin_login");
$routes->get("logout","Authentication::logout");
$routes->post("customer-login-exe","Authentication::customer_login");
$routes->post("customer-register-exe","Authentication::send_verification_email");
$routes->post("verifiy-email-exe","Authentication::verify_email");
$routes->post("set-password-create-account","Authentication::set_pwd_create_account");


// Admin Pages
$routes->get("admin-dashboard","PageLoader::dashboard");
$routes->get("manage-collections","PageLoader::manage_collections");
$routes->get("manage-styles","PageLoader::manage_styles");
$routes->get("add-collection","PageLoader::add_collection");
$routes->get("add-style","PageLoader::add_style");
$routes->get("manage-products","PageLoader::manage_products");
$routes->get("add-product","PageLoader::add_product");
$routes->get("edit-collection/(:any)","PageLoader::edit_collection/$1");
$routes->get("edit-style/(:any)","PageLoader::edit_style/$1");
$routes->get("edit-product/(:any)","PageLoader::edit_product/$1");
$routes->get("manage-homepage-slides","PageLoader::manage_slides");
$routes->get("manage-testimonials","PageLoader::manage_testimonials");
$routes->get("coupons-mgt","PageLoader::coupon_mgt");
$routes->get("manage-orders","PageLoader::manage_orders");
$routes->get("popup-mgt","PageLoader::popup_mgt");
$routes->get("sc-mgt","PageLoader::sc_mgt");
$routes->get("edit-sc","PageLoader::edit_sc");
$routes->get("manage-customers","PageLoader::manage_customers");
$routes->get("customer-details/(:any)","PageLoader::customer_details/$1");
$routes->get("email-signups","PageLoader::email_signups_list");
$routes->post("delete-es","EmailSignups::delete");
$routes->post("update-ts-messages","TsMessages::update");
$routes->get("manage-top-strip-messages","PageLoader::ts_messages");

// es
$routes->post("subsribe-to-email-list","EmailSignups::create");

$routes->post("search-customer-exe","PageLoader::customer_search");
$routes->post("send-contact-email","BackgroundFeatures::send_contact_email");

// Popups
$routes->post("add-popup-exe","Popups::create");
$routes->post("update-popup-exe","Popups::update");
$routes->post("delete-popup-exe","Popups::delete");




// Shipping Classes
$routes->post("add-sc-exe","ShippingClasses::create");
$routes->post("delete-sc-exe","ShippingClasses::delete");
$routes->post("update-sc-exe","ShippingClasses::update");

// Collection routes
$routes->get("fetch-collections-ajax","Collections::manage_collections_content");
$routes->post("add-collection-exe","Collections::add");
$routes->post("delete-collection-exe","Collections::delete");
$routes->post("update-collection-exe","Collections::update");

// Style routes
$routes->post("add-style-exe","Styles::add");
$routes->post("delete-style-exe","Styles::delete");
$routes->get("fetch-styles-ajax","Styles::manage_styles_content");
$routes->post("update-style-exe","Styles::update");

// Product Routes
$routes->post("add-product-exe","Products::add");
$routes->post("delete-product-exe","Products::delete");
$routes->post("update-product-exe","Products::update");
$routes->get("delete-gallery-image","Products::delete_gallery_image");

// Slides Routes
$routes->post("add-slide-exe","Slides::add_new");
$routes->post("delete-slide-exe","Slides::delete");

// Testimonial routes
$routes->post("add-testimonial-exe","Testimonials::add");
$routes->post("delete-testimonial-exe","Testimonials::delete");

// Testimonial routes
$routes->post("add-coupon-exe","Coupons::add");
$routes->post("delete-coupon-exe","Coupons::delete");
$routes->post("update-coupon-exe","Coupons::update");

// Background services api
$routes->post("send-email-api","BackgroundFeatures::send_email");
$routes->post("filter-endpoint","BackgroundFeatures::filter_endpoint");
$routes->get("currency-switcher","BackgroundFeatures::currency_switcher");
$routes->post("universal-product-search","BackgroundFeatures::product_search");
$routes->post("send-forgot-password-email-exe","BackgroundFeatures::send_forgot_password_email");
$routes->post("set-password-update-password","BackgroundFeatures::update_account_password");
$routes->post("update-profile-exe","Authentication::update_profile");
$routes->post("create-rzp-order","Checkout::create_rzp_order");


// Checkout
$routes->post("add-to-cart-exe","Checkout::add");
$routes->post("update-cart","Checkout::update");
$routes->post("delete-from-cart","Checkout::delete");
$routes->post("payment-exe","Checkout::payment_exe");
$routes->post("apply-coupon-exe","Checkout::apply_coupon");


$routes->post("buy-now","PageLoader::buy_now");
$routes->post("set-shipping-cookies","BackgroundFeatures::set_shipping_cookies");

$routes->get("remove-cc","BackgroundFeatures::remove_cc");

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
