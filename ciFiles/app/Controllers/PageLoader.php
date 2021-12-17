<?php

namespace App\Controllers;

require "./vendor/autoload.php";

use Razorpay\Api\Api;


use App\Models\AuthModel;
use App\Models\CartModel;
use App\Models\CollectionModel;
use App\Models\StyleModel;
use App\Models\ProductModel;
use App\Models\SlidesModel;
use App\Models\TestimonialsModel;
use App\Models\CouponModel;
use App\Models\EsModel;
use App\Models\OrderModel;
use App\Models\WishlistModel;
use CodeIgniter\Commands\Help;
use CodeIgniter\Database\Query;
use App\Models\PopupModel;
use App\Models\ScModel;
use App\Models\TsModel;

class PageLoader extends BaseController
{

    private function public_page_loader($viewName,$data){
        


        $collectionModel = new CollectionModel();
        $styleModel = new StyleModel();
        $productModel = new ProductModel();
        $popupModel = new PopupModel();
        $allCollections = array_reverse($collectionModel->findAll());
        $allStyles = array_reverse($styleModel->findAll());
        $allProducts = $productModel->findAll();
        $popups = $popupModel->findAll();
        
        $tsModel = new TsModel();

        $data["messages"] = explode(",",$tsModel->findAll()[0]["messages"]);
        
        $data["collections"] = $allCollections;
        $data["styles"] = $allStyles;
        
        $data["allProducts"] = $allProducts;
        
        $data["currencies"] = array(
            "INR" => array("name"=>"INR","currency_rate"=>1.00,"currency_symbol"=>"₹"),
            "USD" => array("name"=>"USD","currency_rate"=>0.013,"currency_symbol"=>"$"),
            "CAD" => array("name"=>"CAD","currency_rate"=>0.016,"currency_symbol"=>"CAD"),
            "AUD" => array("name"=>"AUD","currency_rate"=>0.018,"currency_symbol"=>"AUD"),
            "AED" => array("name"=>"AED","currency_rate"=>0.049,"currency_symbol"=>"د.إ"),
            "EUR" => array("name"=>"EUR","currency_rate"=>0.012,"currency_symbol"=>"EUR"),
            "GBP" => array("name"=>"GBP","currency_rate"=>0.010,"currency_symbol"=>"GBP"),
            "CHF" => array("name"=>"CHF","currency_rate"=>0.012,"currency_symbol"=>"CHF"),
            "HKD" => array("name"=>"HKD","currency_rate"=>0.010,"currency_symbol"=>"HKD"),
            "NZD" => array("name"=>"NZD","currency_rate"=>0.020,"currency_symbol"=>"NZD"),
            "JPY" => array("name"=>"JPY","currency_rate"=>1.50,"currency_symbol"=>"JPY"),
            "ZAR" => array("name"=>"ZAR","currency_rate"=>0.21,"currency_symbol"=>"ZAR"),
            "THB" => array("name"=>"THB","currency_rate"=>0.45,"currency_symbol"=>"THB"),
            "BHD" => array("name"=>"BHD","currency_rate"=>0.0050,"currency_symbol"=>"BHD"),
        );



        if(!isset($_COOKIE["currency_name"])){
            setcookie("currency_name","INR",time()+(5*24*60*60),site_url());
            setcookie("currency_rate",1.00,time()+(5*24*60*60),site_url());
            setcookie("currency_symbol","₹",time()+(5*24*60*60),site_url());
        }

        $data["site_url"] = site_url();

        $data["popups"] = $popups;
       
        
        $cartModel = new CartModel();
        $cartItems = $cartModel->fetch_all_cart_items();



        $data["cart_item_count"] = count($cartItems);


        echo view("templates/header",$data);
        echo view("public_pages/".$viewName,$data);
        echo view("templates/footer",$data);

    }

    private function admin_page_loader($viewName,$data){
        echo view("templates/admin_header",$data);
        echo view("admin_pages/".$viewName,$data);
        echo view("templates/admin_footer",$data);
    }

    // Public Pages


    public function home(){

        helper("form");
        
        $styleModel = new StyleModel();
        $slidesModel = new SlidesModel();
        $collectionModel = new CollectionModel();
        $productModel = new ProductModel();
        
        $allStyles = array_reverse($styleModel->findAll());
        $allSlides = $slidesModel->findAll();
        $allCollections = array_reverse($collectionModel->findAll());
        $allProducts = array_reverse($productModel->findAll());

        $testimonialsModel = new TestimonialsModel();

        $testimonials = array_reverse($testimonialsModel->findAll());

        $data = array("collections"=>$allCollections,"styles"=>$allStyles,"slides"=>$allSlides,"products"=>$allProducts,"testimonials"=>$testimonials);

        $collectionModel = new CollectionModel();
        $styleModel = new StyleModel();
        $productModel = new ProductModel();
        $popupModel = new PopupModel();
        $allCollections = array_reverse($collectionModel->findAll());
        $allStyles = array_reverse($styleModel->findAll());
        $allProducts = $productModel->findAll();
        $popups = $popupModel->findAll();


        $data["collections"] = $allCollections;

        $data["styles"] = $allStyles;
        
        $data["allProducts"] = $allProducts;
        
        $data["currencies"] = array(
            "INR" => array("name"=>"INR","currency_rate"=>1.00,"currency_symbol"=>"₹"),
            "USD" => array("name"=>"USD","currency_rate"=>0.013,"currency_symbol"=>"$"),
            "CAD" => array("name"=>"CAD","currency_rate"=>0.016,"currency_symbol"=>"CAD"),
            "AUD" => array("name"=>"AUD","currency_rate"=>0.018,"currency_symbol"=>"AUD"),
            "AED" => array("name"=>"AED","currency_rate"=>0.049,"currency_symbol"=>"د.إ"),
            "EUR" => array("name"=>"EUR","currency_rate"=>0.012,"currency_symbol"=>"EUR"),
            "GBP" => array("name"=>"GBP","currency_rate"=>0.010,"currency_symbol"=>"GBP"),
            "CHF" => array("name"=>"CHF","currency_rate"=>0.012,"currency_symbol"=>"CHF"),
            "HKD" => array("name"=>"HKD","currency_rate"=>0.010,"currency_symbol"=>"HKD"),
            "NZD" => array("name"=>"NZD","currency_rate"=>0.020,"currency_symbol"=>"NZD"),
            "JPY" => array("name"=>"JPY","currency_rate"=>1.50,"currency_symbol"=>"JPY"),
            "ZAR" => array("name"=>"ZAR","currency_rate"=>0.21,"currency_symbol"=>"ZAR"),
            "THB" => array("name"=>"THB","currency_rate"=>0.45,"currency_symbol"=>"THB"),
            "BHD" => array("name"=>"BHD","currency_rate"=>0.0050,"currency_symbol"=>"BHD"),
        );



        if(!isset($_COOKIE["currency_name"])){
            setcookie("currency_name","INR",time()+(5*24*60*60),site_url());
            setcookie("currency_rate",1.00,time()+(5*24*60*60),site_url());
            setcookie("currency_symbol","₹",time()+(5*24*60*60),site_url());
        }

        $data["site_url"] = site_url();

        $data["popups"] = $popups;
       
        
        $cartModel = new CartModel();
        $cartItems = $cartModel->fetch_all_cart_items();



        $data["cart_item_count"] = count($cartItems);

        echo view("templates/header_home",$data);
        echo view("public_pages/home",$data);
        echo view("templates/footer",$data);

    }

    public function buy_now($error="")
    {

        helper("form");

        $pid = $this->request->getPost("product-id");
        $psize = $this->request->getPost("product-size");
        $pq = $this->request->getPost("product-quantity-buy-now");

        $productModel = new ProductModel();

        $pdata = $productModel->find($pid);

        $scModel = new ScModel();

        $allScs = array_reverse($scModel->findAll());

        $subtotal =  $_COOKIE["currency_rate"]*$pdata['sale_price']*$pq;

        $data = array('title' => "Buy Now","scs"=>$allScs,"product"=>$pdata,"size"=>$psize,"quantity"=>$pq,"subtotal"=>$subtotal,"error"=>$error);
        
        $this->public_page_loader("buy_now",$data);

    }

    public function about()
    {
        helper("form");
        $data = array("title"=>"About");
        $this->public_page_loader("about",$data);
    }

    public function contact($message="")
    {
        helper("form");
        $data = array("title"=>"Contact","message"=>$message);
        $this->public_page_loader("contact",$data);
    }

    public function privacy_policy()
    {
        helper("form");
        $data = array("title"=>"Privacy Policy");
        $this->public_page_loader("privacy_policy",$data);
    }

    public function shipping_policy()
    {
        helper("form");
        $data = array("title"=>"Shipping Policy");
        $this->public_page_loader("shipping_policy",$data);
    }

    public function refund_exchange()
    {
        helper("form");
        $data = array("title"=>"Refund Exchange Policy");
        $this->public_page_loader("refund_exchange",$data);
    }

    public function tnc()
    {
        helper("form");
        $data = array("title"=>"Terms and Conditions");
        $this->public_page_loader("tnc",$data);
    }

    public function forgot_password()
    {
        helper("form");
        $scripts = array("assets/js/app/auth.min.js");

        $error = "";

        $data = array("title"=>"Reset Password","error"=>$error,"scripts"=>$scripts);
        $this->public_page_loader("forgot_password",$data);
    }

    public function shop()
    {
        
        $scripts = array("assets/js/app/shop.min.js");

        $error = "";

        $productModel = new ProductModel();
        $allProducts = array_reverse($productModel->findAll());

        $data = array("title"=>"Shop","error"=>$error,"products"=>$allProducts,"scripts"=>$scripts);
        $this->public_page_loader("shop",$data);
    }

    public function collection_page($slug)
    {

        helper("form");

        $scripts = array("assets/js/app/shop.min.js");

        $error = "";
        $collectionModel = new CollectionModel();
        $productModel = new ProductModel();
        $focusCollection = $collectionModel->where("slug",$slug)->first();

        $db = \Config\Database::connect();
        $selectPidsForCidQuery = $db->query("SELECT pid FROM product_collection WHERE cid=".$focusCollection["id"]);
        $pids = $selectPidsForCidQuery->getResultArray();


        $pidArray = array();

        foreach ($pids as $pid) {
            $pidArray[] = $pid["pid"];
        }

        $allProducts = array_reverse($productModel->find($pidArray));

        $data = array("title"=>$focusCollection["title"],"error"=>$error,"products"=>$allProducts,"scripts"=>$scripts,"collectionId"=>$focusCollection["id"],"styleId"=>0);
        $this->public_page_loader("shop",$data);
    }

    public function product_filter()
    {

        $maxPrice = $this->request->getPost("maxPrice");

        $sorting = $this->request->getPost("sort_by");
        

        $collections = $this->request->getPost("collections");
        $styles = $this->request->getPost("styles");

        $db      = \Config\Database::connect();

        $builder = $db->table('product_collection');

        $resultPids = array();

        if (is_array($collections)) {

            $resultPidsc =$builder->select("pid")->whereIn('cid', $collections)->get()->getResultArray();

            foreach($resultPidsc as $rpc){
                $resultPids[] = $rpc["pid"];
            }


        }

        $builder = $db->table('product_style');


        if (is_array($styles)) {
            $resultPidss =$builder->select("pid")->whereIn('sid', $styles)->get()->getResultArray();
            foreach($resultPidss as $rpc){
                $resultPids[] = $rpc["pid"];
            }
        }


        $productModel = new ProductModel();

        if ($sorting=="name_ascending") {
            $filterProducts = $productModel->orderBy("title","asc")->find($resultPids);
        }elseif ($sorting=="name_descending") {
            $filterProducts = $productModel->orderBy("title","desc")->find($resultPids);
        }elseif ($sorting=="price_low_to_high") {
            $filterProducts = $productModel->orderBy("sale_price","asc")->find($resultPids);
        }elseif ($sorting=="price_high_to_low") {
            $filterProducts = $productModel->orderBy("sale_price","desc")->find($resultPids);
        }
        else {
            $filterProducts = $productModel->orderBy("id","desc")->find($resultPids);
        }
        

        $productMarkup = '';
        
        foreach ($filterProducts as $product)  {

            if($product["sale_price"]<$maxPrice){
            
            $productMarkup.='<div class="col-lg-4 col-md-6-sm-12 text-center custom-half-grid" style="margin-bottom: 5%; padding: 5px;">
                        
            <a href="'.site_url("product/".$product['slug']).'">
                <div class="card">
                
                    <img src="'.site_url("assets/images/featured_image_product/".$product['featured_image']).'" class="card-img-top lazy">
                
                    <div class="card-body">
                    
                    <h4 class="product-title-'.$product["id"].'">'.substr($product["title"],0,30).'...</h4>                                                                                
                    <span class="larger-price-card"> ₹ '.$product["sale_price"].'</span> | <del><span class="smaller-price-card"> ₹ '.$product["price"].'</span></del>
                    
                       

                        <p id="select-text-'.$product["id"].'"></p>
                        
                        <br>

                        <button class="btn btn-primary">BUY NOW</button>

                            </div>

                        </div>
                    </a>

                </div>';
            }

        }

        return $productMarkup;

    }

    public function style_page($slug)
    {

        helper("form");

        $scripts = array("assets/js/app/shop.min.js");

        $error = "";
        $styleModel = new StyleModel();
        $productModel = new ProductModel();
        $focusStyle = $styleModel->where("slug",$slug)->first();

        $db = \Config\Database::connect();
        $selectPidsForSidQuery = $db->query("SELECT pid FROM product_style WHERE sid=".$focusStyle["id"]);
        $pids = $selectPidsForSidQuery->getResultArray();

        if(!$pids){
            return redirect()->to(site_url("/"));
        }

        $pidArray = array();

        foreach ($pids as $pid) {
            $pidArray[] = $pid["pid"];
        }

        $allProducts = array_reverse($productModel->find($pidArray));

        $data = array("title"=>$focusStyle["title"],"error"=>$error,"products"=>$allProducts,"scripts"=>$scripts,"colId"=>0,"sid"=>$focusStyle["id"]);
        $this->public_page_loader("shop",$data);
    }

    public function my_profile($success="",$error="")
    {
        helper("form");
        
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="customer") {
            return redirect()->to(site_url("login"));
        }

        $orderModel = new OrderModel();

        $customerOrders = $orderModel->where("customer_id",session("id"))->findAll();

        $productIds = array();

        foreach($customerOrders as $co):
        foreach(json_decode($co["order_details"],TRUE) as $od){
            $productIds[] = $od["product_id"];
        }
        endforeach;

        $productModel = new ProductModel();

        if(!empty($productIds)){
            $products = $productModel->find($productIds);
        }else{
            $products = array();
        }

        $wishListModel = new WishlistModel();

        $wlItems = $wishListModel->fetchWlItems();

        $data = array(
            "title" => "My Orders",
            "orders" => $customerOrders,
            "products" => $products,
            "wishlist_items" => $wlItems
        );

        

        $this->public_page_loader("profile",$data);
    }

    public function admin_login($error=""){

        helper("form");
        
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole=="admin") {
            return redirect()->to(site_url("admin-dashboard"));
        }

        $scripts = array("assets/js/app/auth.min.js");

        $data = array("title"=>"Admin Login","error"=>$error,"scripts"=>$scripts);
        $this->public_page_loader("admin_login",$data);
    }


    public function wishlist($success="",$error="")
    {
        helper("form");
        
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="customer") {
            return redirect()->to(site_url("login"));
        }

        $wishListModel = new WishlistModel();

        $wlItems = $wishListModel->fetchWlItems();


        $data = array("title"=>"Wishlist","success"=>$success,"error"=>$error,"wishlist_items"=>$wlItems);
        $this->public_page_loader("wishlist",$data);
    }

    public function customer_login($error="")
    {

        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole=="customer") {
            return redirect()->to(site_url(""));
        }

        $scripts = array("assets/js/app/auth.min.js");


        $data = array('title' => "Login", "error"=>$error,"scripts"=>$scripts);
        
        $this->public_page_loader("customer_login",$data);

    }

    public function customer_registration($error="")
    {

        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole=="customer") {
            return redirect()->to(site_url(""));
        }

        $scripts = array("assets/js/app/auth.min.js");


        $data = array('title' => "Register", "error"=>$error,"scripts"=>$scripts);
        
        $this->public_page_loader("customer_registration",$data);
    }

    public function cart($error="")
    {
        helper("form");
        $cartModel = new CartModel();

        $cartItems = $cartModel->fetch_all_cart_items();
        $productModel = new ProductModel();
        $allProducts = array_reverse($productModel->findAll());

        $scModel = new ScModel();

        $allScs = array_reverse($scModel->findAll());


        $data = array('title' => "Cart","cartItems"=>$cartItems,"allProducts"=>$allProducts,"scs"=>$allScs,"rzpOrder"=> NULL,"error"=>$error);
        
        $this->public_page_loader("cart",$data);
    }

    public function product_page($slug){
        
        helper("form");

        $productModel = new ProductModel();

        $focusProduct = $productModel->where("slug",$slug)->first();


        $collectionModel = new CollectionModel();

        $db = \Config\Database::connect();
        $selectCidsForPidQuery = $db->query("SELECT cid FROM product_collection WHERE pid=".$focusProduct["id"]);
        $cids = $selectCidsForPidQuery->getResultArray();

        $cidsArray = array();

        foreach ($cids as $cid) {
            $cidsArray[] = $cid["cid"];
        }
        
        $selectPidsForCidQuery = $db->query("SELECT pid FROM product_collection WHERE cid IN (".implode(",",$cidsArray).")");
        $pids = $selectPidsForCidQuery->getResultArray();

        $pidsArray = array();

        foreach ($pids as $pid) {
            $pidsArray[] = $pid["pid"];
        }


        $relatedProducts = $productModel->find($pidsArray);

        $testimonialsModel = new TestimonialsModel();

        $testimonials = array_reverse($testimonialsModel->findAll());

        $scripts = array("assets/js/app/auth.min.js");


        $data  = array(
            'title' => $focusProduct["title"],
            "related_products" => $relatedProducts,
            "product"=>$focusProduct,
            "testimonials" => $testimonials,
            "scripts" => $scripts
        );

        $this->public_page_loader("product",$data);

    }

    // Admin Pages

    public function ts_messages()
    {
        helper("form");
        $tsModel = new TsModel();
        $tsMessages = $tsModel->findAll();
        $data = array(
            "title" => "Top Strip Messages",
            "tsMessages" => $tsMessages
        );
        $this->admin_page_loader("ts_messages",$data); 
    }

   public function email_signups_list()
   {
       helper("form");
       $esModel = new EsModel();
       $email_signups = $esModel->findAll();
       $data = array(
           "title" => "Email Signups",
           "email_signups" => $email_signups
       );
       $this->admin_page_loader("es",$data);
   }

    public function popup_mgt($success="",$error="")
    {


        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        helper("form");

        $popupModel = new PopupModel();

        $allPopups = array_reverse($popupModel->findAll());

        $data = array("title"=>"Popup Management","success"=>$success,"error"=>$error,"popups"=>$allPopups);

        $this->admin_page_loader("popup_mgt",$data);

    }

    public function manage_customers($success="",$error=""){
        
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        helper("form");

        $authModel = new AuthModel();

        $allCustomers = $authModel->where("role","customer")->findAll();

        $data = array(
            "title" => "Manage Customers",
            "success" => $success,
            "error" => $error,
            "customers" => $allCustomers
        );

        $this->admin_page_loader("manage_customers",$data);

    }

    public function customer_search($success="",$error="")
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        helper("form");

        $searchQuery = $this->request->getPost("customer-search-query");

        $authModel = new AuthModel();

        $allCustomers = $authModel->like("first_name",$searchQuery)->orlike("last_name",$searchQuery)->orlike("email",$searchQuery)->where("role","customer")->findAll();

        $data = array(
            "title" => "Manage Customers",
            "success" => $success,
            "error" => $error,
            "customers" => $allCustomers
        );

        $this->admin_page_loader("manage_customers",$data);
        
    }

    public function customer_details($custId)
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        helper("form");

        $authModel = new AuthModel();

        $customerData = $authModel->find($custId);

        // $orderModel = new OrderModel();

        // $custOrders = $orderModel->where("customer_id",$custId)->findAll();

        $data = array(
            "title" => "Customer Details",
            "customer" => $customerData,
        );

        $this->admin_page_loader("customer_details",$data);

    }

    public function sc_mgt($success="",$error="")
    {


        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        helper("form");

        $scModel = new ScModel();

        $allScs = array_reverse($scModel->findAll());

        $allScsIdCiphers = array();

        

        $data = array("title"=>"Shipping Classes Management","success"=>$success,"error"=>$error,"scs"=>$allScs);

        $this->admin_page_loader("sc_mgt",$data);

    }

    public function edit_sc($id,$success="",$error="")
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        helper("form");

        $scModel = new ScModel();

        $sc = $scModel->find($id);

        $data = array("title"=>"Edit Shipping Class","success"=>$success,"error"=>$error,"sc"=>$sc);

        $this->admin_page_loader("edit_sc",$data);

    }

    public function dashboard()
    {

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $scripts = array("assets/js/admin_app/dashboard.min.js");

        $orderModel = new OrderModel();
        $orders = $orderModel->findAll();

        $numberOfOrders = count($orders);

        $authModel = new AuthModel();

        $customerUsers = $authModel->where("role","customer")->findAll();

        $numberOfCustomers = count($customerUsers);

        $totalRevenue = 0.00;

        $data["currencies"] = $currencies = array(
            "INR" => array("name"=>"INR","currency_rate"=>1.00,"currency_symbol"=>"₹"),
            "USD" => array("name"=>"USD","currency_rate"=>0.013,"currency_symbol"=>"$"),
            "CAD" => array("name"=>"CAD","currency_rate"=>0.016,"currency_symbol"=>"CAD"),
            "AUD" => array("name"=>"AUD","currency_rate"=>0.018,"currency_symbol"=>"AUD"),
            "AED" => array("name"=>"AED","currency_rate"=>0.049,"currency_symbol"=>"د.إ"),
        );

        foreach ($orders as $order) {
            $orderAmt=$order["amount_paid"];
            $orderCurrency = $order["currency"];
            $exRate = $currencies[$orderCurrency]["currency_rate"];
            $orderAmtInr = $orderAmt*$exRate;
            $totalRevenue+=$orderAmtInr;
        }

        $data = array("title"=>"Admin Dashboard","welcome_message"=>"Welcome ".session("first_name"),"scripts"=>$scripts,"noOrders"=>$numberOfOrders,"noCustomers"=>$numberOfCustomers,"total_revenue"=>$totalRevenue);
        $this->admin_page_loader("dashboard",$data);
    }


    
    public function coupon_mgt($success="",$error='')
    {

        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $scripts = array("assets/js/admin_app/collections.min.js");


        $couponModel = new CouponModel();

        $data = array("title"=>"Manage Coupons","scripts"=>$scripts,"error"=>$error,"success"=>$success,"coupons"=>$couponModel->findAll());

        $this->admin_page_loader("manage_coupons",$data);
    
    }

    public function payment_successful()
    {
        helper("form");
        $data = array("title"=>"Payment Successful");

        $this->public_page_loader("payment_successful",$data);
    }

    public function payment_failed()
    {
        helper("form");
        $data = array("title"=>"Payment failed");

        $this->public_page_loader("payment_failed",$data);
    }

    public function my_orders()
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="customer") {
            return redirect()->to(site_url("login"));
        }

        helper("form");

        $orderModel = new OrderModel();

        $customerOrders = $orderModel->where("customer_id",session("id"))->findAll();

        $productIds = array();

        foreach($customerOrders as $co):
        foreach(json_decode($co["order_details"],TRUE) as $od){
            $productIds[] = $od["product_id"];
        }
        endforeach;

        $productModel = new ProductModel();

        if(!empty($productIds)){
            $products = $productModel->find($productIds);
        }else{
            $products = array();
        }

        $wishListModel = new WishlistModel();

        $wlItems = $wishListModel->fetchWlItems();

        $data = array(
            "title" => "My Orders",
            "orders" => $customerOrders,
            "products" => $products,
            "wishlist_items" => $wlItems
        );

        

        $this->public_page_loader("my_orders",$data);

    }


    
    public function manage_collections($success="",$error="")
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $scripts = array("assets/js/admin_app/collections.min.js");

        $data = array("title"=>"Manage Collections","scripts"=>$scripts,"error"=>$error,"success"=>$success,"fetchCollectionsUrl"=>site_url("fetch-collections-ajax"));

        $this->admin_page_loader("manage_collections",$data);
    
    }

    public function manage_orders($success="",$error="")
    {

        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        // $scripts = array("assets/js/admin_app/collections.min.js");

        $orderModel = new OrderModel();
        $productModel = new ProductModel();

        $allOrders = $orderModel->findAll();
        $products = $productModel->findAll();

        $data = array("title"=>"Manage Orders","error"=>$error,"success"=>$success,"orders"=>$allOrders,"products"=>$products);

        $this->admin_page_loader("manage_orders",$data);
    }

    public function edit_collection($slug,$success="",$error="")
    {
        
        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $scripts = array("assets/js/admin_app/collections.min.js");

        $collectionModel = new CollectionModel();

        $collections = array_reverse($collectionModel->findAll());
        $collectionFocus = $collectionModel->where("slug",$slug)->first();

        $data = array("title"=>"Edit Collection","collectionFocus"=>$collectionFocus,"collections"=>$collections,"scripts"=>$scripts,"error"=>$error,"success"=>$success);

        $this->admin_page_loader("edit_collection",$data);

    }

    public function manage_styles($success="",$error="")
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $scripts = array("assets/js/admin_app/styles.min.js");

        $data = array("title"=>"Manage Styles","scripts"=>$scripts,"error"=>$error,"success"=>$success,"fetchStylesUrl"=>site_url("fetch-styles-ajax"));

        $this->admin_page_loader("manage_styles",$data);
    
    }

    public function edit_style($slug,$success="",$error="")
    {

        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $scripts = array("assets/js/admin_app/styles.min.js");

        $styleModel = new StyleModel();

        $styles = array_reverse($styleModel->findAll());
        $styleFocus = $styleModel->where("slug",$slug)->first();

        $data = array("title"=>"Edit Style","styles"=>$styles,"styleFocus"=>$styleFocus,"scripts"=>$scripts,"error"=>$error,"success"=>$success);

        $this->admin_page_loader("edit_style",$data);
        
    }

    public function add_collection($success="",$error="")
    {
        
        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $scripts = array("assets/js/admin_app/collections.min.js");

        $collectionModel = new CollectionModel();

        $collections = array_reverse($collectionModel->findAll());

        $data = array("title"=>"Add Collection","collections"=>$collections,"scripts"=>$scripts,"error"=>$error,"success"=>$success);

        $this->admin_page_loader("add_collection",$data);

    }

    public function add_style($success="",$error="")
    {
        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $scripts = array("assets/js/admin_app/styles.min.js");

        $styleModel = new StyleModel();

        $styles = array_reverse($styleModel->findAll());

        $data = array("title"=>"Add Style","styles"=>$styles,"scripts"=>$scripts,"error"=>$error,"success"=>$success);

        $this->admin_page_loader("add_style",$data);

    }

    public function manage_products($success="",$error="")
    {

        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $productModel = new ProductModel();

        $allProducts = $productModel->findAll();

        $data = array(
            "title" => "Manage Products",
            "success" => $success,
            "error" => $error,
            "products" => $allProducts
        );

        $this->admin_page_loader("manage_products",$data);

    }

    public function add_product($success="",$error="")
    {

        helper('form');

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $styleModel = new StyleModel();
        $collectionModel = new CollectionModel();

        $allStyles = $styleModel->findAll();
        $allCollections = $collectionModel->findAll();

        $data = array(
            "title" => "Add Product",
            "collections" => $allCollections,
            "styles" => $allStyles,
            "success" => $success,
            "error" => $error
        );
        
        $this->admin_page_loader("add_product",$data);

    }
    

    public function edit_product($slug,$success="",$error=""){
        
        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $styleModel = new StyleModel();
        $collectionModel = new CollectionModel();
        $productModel = new ProductModel();

        $allStyles = $styleModel->findAll();
        $allCollections = $collectionModel->findAll();

        $focusProduct = $productModel->where("slug",$slug)->first();


        $db = \Config\Database::connect();
        $pcsQuery = $db->query("SELECT * FROM product_collection WHERE pid=".$focusProduct["id"]);
        $pcs = $pcsQuery->getResultArray();

        $selectedProductCollections = array();
        foreach($pcs as $pc){
            $selectedProductCollections[] = $pc["cid"];
        }

        $pssQuery = $db->query("SELECT * FROM product_style WHERE pid=".$focusProduct["id"]);
        $pss = $pssQuery->getResultArray();

        $selectedProductStyles = array();
        foreach($pss as $ps){
            $selectedProductStyles[] = $ps["sid"];
        }

        

        $data = array(
            "title" => "Edit Product",
            "collections" => $allCollections,
            "styles" => $allStyles,
            "success" => $success,
            "error" => $error,
            "focusProduct" => $focusProduct,
            "product_collections" => $selectedProductCollections,
            "product_styles" => $selectedProductStyles
        );


        
        $this->admin_page_loader("edit_product",$data);
        
    }

    public function manage_slides($success="",$error="")
    {
        
        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $slidesModel = new SlidesModel();

        $allSlides = array_reverse($slidesModel->findAll());

        $data = array(
            'title' => 'Manage Slides',
            'success' => $success,
            'error' => $error,
            "slides" => $allSlides
        );

        $this->admin_page_loader("manage_slides",$data);

    }


    public function manage_testimonials($success="",$error="")
    {

        helper("form");        
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }
        $testimonialsModel = new TestimonialsModel();
        $alltestimonials = array_reverse($testimonialsModel->findAll());
        $data = array(
            'title' => "Manage Testimonials",
            "success"=>$success,
            "error" => $error,
            "testimonials" => $alltestimonials 
        );
        $this->admin_page_loader("manage_testimonials",$data);
    }

}
