<?php

namespace App\Controllers;

require "./vendor/autoload.php";

use App\Models\AuthModel;
use Razorpay\Api\Api;
use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\CouponModel;
use App\Models\CouponUseModel;

class Checkout extends BaseController
{

    public function create_rzp_order()
    {
        $amount = $this->request->getPost("amount");
        $currency = $this->request->getPost("currency");
        $api = new Api('rzp_live_EgCVc8wCwpPeDS', 'T0OGmuqRGGVRMD9Y6lPUnCDd');

        $orderData = [
            'receipt'         => uniqid(),
            'amount'          => $amount*100, // 39900 rupees in paise
            'currency'        => $currency
        ];


        $rzpOrder =  $api->order->create($orderData);

        $returnObj = array(
            "id" => $rzpOrder["id"],
            "amount" => $rzpOrder["amount"],
            "currency" => $rzpOrder["currency"]
        );

        echo json_encode($returnObj);
        
    }

    public function add(){


        $pid = $this->request->getPost('product_id');
        // $stitching = $this->request->getPost('stitching');
        $size = $this->request->getPost('size');
        $quantity = $this->request->getPost('quantity');

        if($size=="Custom"){
            $stitching = "yes";
        }else {
            $stitching="no";
        }
        
        $cartModel = new CartModel();
        
        $existsAlready = $cartModel->where('product_id',$pid)->where('stitching',$stitching)->where('size',$size)->where('ip_address',$_SERVER['REMOTE_ADDR'])->first();
        
        if ($existsAlready) {
            $existsAlready['quantity'] = $existsAlready['quantity']+$quantity;
            $res = $cartModel->update($existsAlready['id'],$existsAlready); 
            if ($res) {
                exit('success');
            } else {
                exit('failure');
            }
        } else {
            $data = array(
                'product_id' => $pid,
                'stitching' => $stitching,
                'size' => $size,
                'quantity' => $quantity,
                'ip_address' => $_SERVER['REMOTE_ADDR']
            );
            $res = $cartModel->insert($data);
            if ($res) {
                exit('success');
            } else {
                exit('failure');
            }
            
        }
        
        
        
        
        
        
    }

    public function update(){
       $id = $this->request->getPost('cart-item-id');
       $qty = $this->request->getPost('product-qty');
        $cartModel = new CartModel();

        $itemExists = $cartModel->find($id);
            
        $itemExists['quantity'] = $qty;
        
        $res = $cartModel->update($itemExists['id'], $itemExists);

        return redirect()->to(site_url('cart')); 

    }       

    public function delete(){
        $cartItemID = $this->request->getPost('cart-item-id');
        $cartModel = new CartModel();
        $cartModel->delete($cartItemID);
        return redirect()->to(site_url('cart'));
    }


    public function payment_exe()
    {

        $customerDetails = array(
            "uid" => $this->request->getPost("uid"),
            "first_name" => $this->request->getPost("first_name"),
            "last_name" => $this->request->getPost("last_name"),
            "email" => $this->request->getPost("email"),
            "country" => $this->request->getPost("country"),
            "state" => $this->request->getPost("state"),
            "pincode" => $this->request->getPost("pincode")
        );

        $buy_now = $this->request->getPost('buy_now');

        if ($buy_now=="yes") {
            $cartItems = $this->request->getPost("cart_items"); 
        } else {
            $cartModel = new CartModel();
            $cartItems = json_encode($cartModel->fetch_all_cart_items());
        }


        $orderData = array(
            "public_order_id" => uniqid(),
            "amount_paid" => $this->request->getPost('amount'),
            "currency" => $this->request->getPost('currency'),
            "order_details" => $cartItems,
            "customer_details" => json_encode($customerDetails),
            "status" => "created",
            "status_details" => "",
            "address" => $this->request->getPost("address"),
            "date" => date("d-M-Y H:i:s D"),
            'customer_id' => $this->request->getPost("uid"),
            "country" => $this->request->getPost("country"),
            "state" => $this->request->getPost("state")
        );


        $orderModel = new OrderModel();
        $orderCreated = $orderModel->insert($orderData);

        $authModel = new AuthModel();

        $addressAdded = $authModel->update($this->request->getPost("uid"),array(
            "address"=>$this->request->getPost("address"),
            "country" => $this->request->getPost("country"),
            "state" => $this->request->getPost("state"),
            )
        );

        if ($orderCreated) {
            $cartModel = new CartModel(); 
            $cartModel->clear_cart_for_ip();

            
            if(isset($_COOKIE["coupon_code"])):

                $couponUseModel = new CouponUseModel();


                $couponUseModel->insert(array(
                    "customer_id" => session("id"),
                    "coupon_code" => $_COOKIE["coupon_code"]
                ));

                

                helper('cookie');
                delete_cookie('coupon_code');
                delete_cookie('coupon_value');
                delete_cookie('coupon_type');

            endif;

            echo "order-created";
        } else {
            echo "order-not-created";
        }
         
    }

    public function apply_coupon()
    {
        $code = $this->request->getPost("couponcode");
        $pageLoader = new PageLoader();    
        if($code!=""){
            $couponModel = new CouponModel();
            $coupon = $couponModel->where("code",$code)->where('start_date <=', date("d-m-Y"))->where("end_date>=",date("d-m-Y"))->where("on_off","on")->first();
            if ($coupon) {

                $couponUseModel = new CouponUseModel();

                $couponUsed = $couponUseModel->where("customer_id",session("id"))->where("coupon_code",$code)->first();

                if($couponUsed){

                    if ($this->request->getPost("buy_now")=="yes") {
                        return redirect()->to(site_url("product/".$this->request->getPost("slug")));
                    } else {
                        return redirect()->to(site_url("cart"));
                    }
                    
                
                }

                if($coupon["type"]=="free_shipping"){
                    setcookie("coupon_code",$coupon["code"],time()+(5*24*60),"/");
                    setcookie("coupon_value",$coupon["value"],time()+(5*24*60),"/");
                    setcookie("coupon_type","free_shipping",time()+(5*24*60),"/");
                }else {
                    setcookie("coupon_code",$coupon["code"],time()+(5*24*60),"/");
                    setcookie("coupon_value",$coupon["value"],time()+(5*24*60),"/");
                    setcookie("coupon_type",$coupon["type"],time()+(5*24*60),"/");
                }

                if ($this->request->getPost("buy_now")=="yes") {
                    return redirect()->to(site_url("product/".$this->request->getPost("slug")));
                } else {
                    return redirect()->to(site_url("cart"));
                }
                



            } else {
                $pageLoader->cart("Invalid Coupon");
            }
        }else {
            $pageLoader->cart("Please Enter coupon Code");
        }
        

    }

}