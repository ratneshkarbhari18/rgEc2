
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<main class="page-contentX" id="cart" style="padding: 0;">

    <section class="title-section text-center d-none" id="cart-title">
        <div class="container-fluid " style="padding: 1em 0; margin-bottom: 2em; background-color: #d10762;">
            <h2 class="section-titleX text-light">CART</h2>
        </div>
    </section>
    <?php

use PhpParser\Node\Stmt\Echo_;
?>

    <section id="cart" >
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card">
                        <img src="<?php echo site_url('assets/images/featured_image_product/'.$product['featured_image']); ?>" class="w-100 card-img-top">

                        <div class="card-content">
                            <h1 class="text-dark"><?php echo $product["title"]; ?></h1>
                        </div>
                    </div>   
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12"></div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <?php if(session("role")!="customer"): ?>
                        <div class="text-center" style="margin: 2em 0;">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#loginModal">Login to Proceed</button>
                        </div>
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <?php
                                        echo form_open(site_url("customer-login-exe"),'id="customerLogin"');
                                        ?>
                                        <input type="hidden" name="redirect_url" value="<?php echo site_url("cart"); ?>">

                                        <p id="errorMessage" class="text-danger"></p>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="text" name="email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <small id="forgotPwdLink" style="position: absolute; right: 2em;"><a href="<?php echo site_url("forgot-password"); ?>">Forgot Password?</a></small>
                                            <input class="form-control pwdField" type="password" name="password" id="password">
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="showPwd">
                                            <label class="form-check-label" for="showPwd">
                                                Show Password
                                            </label>
                                        </div>
                                        <br>

                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    <?php 
                                        echo form_close();  
                                    ?>
                                    <div class="text-center">
                                        <br>
                                        <h5>OR</h5>
                                        <a href="<?php echo site_url("register"); ?>" class="btn btn-link">REGISTER</a>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>

                    <?php else: ?>
                        
                        <div class="card" style="margin: 2em 0;">
                            <div class="card-body text-center">
                                
                                <h3>SUBTOTAL:  <?php echo $_COOKIE["currency_symbol"]."". number_format($subtotal,2); ?></h3>
                                <div class="form-group w-50 ml-auto mr-auto">
                                    <label for="shipping_speed">Express or Normal Delivery?</label>
                                    <select class="form-control shippingVariable" name="shipping_speed" id="shipping_speed">
                                        <option value="regular" <?php if($_COOKIE["shippingSpeed"]=="regular"){echo "selected";} ?>>NORMAL</option>
                                        <!-- <option value="express" <?php if($_COOKIE["shippingSpeed"]=="express"){echo "selected";} ?>>EXPRESS</option> -->
                                    </select>
                                </div>
                                <div class="form-group w-50 ml-auto mr-auto">
                                    <label for="shipping_location">Delivery Destination</label>
                                    <select class="form-control shippingVariable" name="shipping_location" id="shipping_location">
                                        <option value="domestic" <?php if($_COOKIE["shippingLocation"]=="domestic"){echo "selected";} ?>>DOMESTIC</option>
                                        <option value="international" <?php if($_COOKIE["shippingLocation"]=="international"){echo "selected";} ?>>INTERNATIONAL</option>
                                    </select>
                                </div>
                                <script>
                                    function setCookie(name,value,days) {
                                        var expires = "";
                                        if (days) {
                                            var date = new Date();
                                            date.setTime(date.getTime() + (days*24*60*60*1000));
                                            expires = "; expires=" + date.toUTCString();
                                        }
                                        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
                                    }
                                    function delete_cookie(name) {
                                         document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                                    }
                                    $("select.shippingVariable").on('change', function () {
                                        let shippingSpeed = $("select#shipping_speed").val();
                                        let shippingLocation = $("select#shipping_location").val();


                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo site_url("set-shipping-cookies"); ?>",
                                            data: {
                                                "shippingLocation": shippingLocation,
                                                "shippingSpeed" : shippingSpeed
                                            },
                                            success: function (response) {
                                                location.reload();
                                            }
                                        });
                                    });
                                </script>
                                
                                <h3>SHIPPING: <?php echo $_COOKIE["currency_symbol"]."".  number_format($shippingCharge,2); ?></h3>
                                <h3 class="d-none">GST : <?php echo $_COOKIE["currency_symbol"]."". number_format($gstAmt,2); ?></h3>
                                <?php 
                                    if(isset($_COOKIE["coupon_value"])):
                                ?>
                                <h3>DISCOUNT: <?php echo $_COOKIE["currency_symbol"]."". number_format($discount = ($_COOKIE["coupon_value"]/100)*$subtotal,2); ?></h3>
                                <h3>PAYABLE:  <?php echo $_COOKIE["currency_symbol"]."". number_format($payable = ($subtotal+$gstAmt+$shippingCharge)-$discount,2); ?></h3>

                                <?php else: ?>

                                <h3>PAYABLE:  <?php echo $_COOKIE["currency_symbol"]."". $payable; ?></h3>

                                <?php endif; ?>

                          
                                <?php 
                                    if(isset($_COOKIE["coupon_value"])):
                                ?>
                                <p><?php echo $_COOKIE["coupon_code"]; ?> applied that gives <?php echo $_COOKIE["coupon_value"]; ?>% of Discount</p>
                                <a href="<?php echo site_url("remove-cc"); ?>"><p class="text-danger">Remove?</p></a>
                                <?php else: ?>
                                <?php echo form_open("apply-coupon-exe"); ?>
                                    <div class="form-group">
                                        <input type="text" name="couponcode" placeholder="ENTER COUPON CODE HERE" id="" class="form-control w-50 ml-auto mr-auto">
                                    </div>
                                    <p class="text-danger"><?php echo $error; ?></p>
                                    <button class="btn btn-primary">APPLY COUPON CODE</button>
                                <?php echo form_close();  ?>
                                
                                <br>
                                <h4>OR</h4>
                                <?php endif; ?>
                                
                                
                                
                                <button type="button" id="ptpButton" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                    PROCEED to payment
                                </button>






                                <div id="paymentButtonsBox" class="d-none">
                                    <?php if($_COOKIE["currency_name"]=="INR"): ?>
                                   
                                    <script>
                                        function onScriptLoad(){
                                            var config = {
                                                "root": "",
                                                "flow": "DEFAULT",
                                                "data": {
                                                "orderId": "<?php echo $orderId; ?>", /* update order id */
                                                "token": "<?php echo $paytmToken; ?>", /* update token value */
                                                "tokenType": "TXN_TOKEN",
                                                "amount": "<?php echo $payable ?>",
                                                "currency": "INR" /* update amount */
                                                },
                                                "handler": {
                                                "notifyMerchant": function(eventName,data){
                                                    // console.log("notifyMerchant handler function called");
                                                    // console.log("eventName => ",eventName);
                                                    // console.log("data => ",data);

                                                    if(eventName=="APP_CLOSED"){
                                                        location.reload();
                                                    }else{
                                                        console.log("notifyMerchant handler function called");
                                                        console.log("eventName => ",eventName);
                                                        console.log("data => ",data);

                                                    }
                                                } 
                                                }
                                            };

                                            if(window.Paytm && window.Paytm.CheckoutJS){
                                                window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
                                                    // initialze configuration using init method 
                                                    window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                                                        // after successfully updating configuration, invoke JS Checkout
                                                        window.Paytm.CheckoutJS.invoke();
                                                    }).catch(function onError(error){
                                                        console.log("error => ",error);
                                                    });
                                                });
                                            } 
                                        }
                                    </script>

                                    <script type="application/javascript" crossorigin="anonymous" src="https://securegw.paytm.in/merchantpgpui/checkoutjs/merchants/RICKAG48377511400337.js"  onload="onScriptLoad();"> </script>
                                    <style>
                                        div#paytm-checkoutjs{
                                            display: none;
                                        }
                                    </style>
                                    <button type="button" class="btn btn-primary" id="paytmPay">
                                        Pay Now 
                                    </button>
                                    <script>

                                        $("button#paytmPay").click(function (e) { 
                                            e.preventDefault();
                                            $("div#paytm-checkoutjs").css("display","block");
                                        });

                                    </script>
                                    <?php else: ?>
                                        <p id="paymentErrorPayPal" class="text-danger"></p>
                                        <!-- Sandbox -->
                                        <script src="https://www.paypal.com/sdk/js?client-id=ATpq7eEQpxzOLYcBQZfdJmq8cWvsNur0Th580tAar7Y_uihvwME8nDUUs22WA2sQSPBUr5hMM4gw-95m&currency=<?php echo $_COOKIE["currency_name"]; ?>">
                                        </script>
                                        <div id="paypal-button-container"></div>
                                        <script>
                                            paypal.Buttons({
                                                createOrder: function(data, actions) {
                                                return actions.order.create({
                                                    purchase_units: [{
                                                    amount: {
                                                        value: '<?php echo $payable; ?>',
                                                        currency: '<?php echo $_COOKIE["currency_name"]; ?>'
                                                    }
                                                    }]
                                                });
                                                },
                                                onApprove: function(data, actions) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: $("form#paymentForm").attr("action"),
                                                        data: $("form#paymentForm").serialize(),
                                                        success: function (response) {
                                                            if(response=="order-created"){
                                                                window.location.replace("<?php echo site_url("payment-successful"); ?>");
                                                            }else{
                                                                $("p#paymentErrorPayPal").html("Order not placed");
                                                                setTimeout(() => {
                                                                    window.location.replace("<?php echo site_url("payment-failed"); ?>");

                                                                }, 200);
                                                            }
                                                        }
                                                    });
                                                }
                                            }).render('#paypal-button-container'); // Display payment options on your web page
                                        </script>
                                    <?php endif; ?>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Please Enter all Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                                
                                                <span class="text-danger" id="paymentError"></span>
                                                <?php $attributes = array("id"=>"paymentForm"); echo form_open(site_url("payment-exe"),$attributes); ?>
                                                <input type="hidden" name="first_name" value="<?php echo session("first_name"); ?>">

                                                <input type="hidden" name="last_name" value="<?php echo session("last_name"); ?>">
                                                <input type="hidden" name="email" value="<?php echo session("email"); ?>">

                                                <input type="hidden" name="currency" value="<?php echo $_COOKIE["currency_name"]; ?>">
                                                <input type="hidden" name="cart_items" value='<?php $product["size"] = $size; $product["quantity"] = $quantity; echo json_encode($product); ?>'>
                                                <input type="hidden" name="amount" value="<?php echo $payable; ?>">
                                                <input type="hidden" name="uid" value="<?php echo session("id"); ?>">
                                                <input type="hidden" name="buy_now" value="yes">
                                                
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <select class="form-control" name="country" id="country">
                                                        <option value="Afganistan">Afghanistan</option> <option value="Albania">Albania</option> <option value="Algeria">Algeria</option> <option value="American Samoa">American Samoa</option> <option value="Andorra">Andorra</option> <option value="Angola">Angola</option> <option value="Anguilla">Anguilla</option> <option value="Antigua & Barbuda">Antigua & Barbuda</option> <option value="Argentina">Argentina</option> <option value="Armenia">Armenia</option> <option value="Aruba">Aruba</option> <option value="Australia">Australia</option> <option value="Austria">Austria</option> <option value="Azerbaijan">Azerbaijan</option> <option value="Bahamas">Bahamas</option> <option value="Bahrain">Bahrain</option> <option value="Bangladesh">Bangladesh</option> <option value="Barbados">Barbados</option> <option value="Belarus">Belarus</option> <option value="Belgium">Belgium</option> <option value="Belize">Belize</option> <option value="Benin">Benin</option> <option value="Bermuda">Bermuda</option> <option value="Bhutan">Bhutan</option> <option value="Bolivia">Bolivia</option> <option value="Bonaire">Bonaire</option> <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option> <option value="Botswana">Botswana</option> <option value="Brazil">Brazil</option> <option value="British Indian Ocean Ter">British Indian Ocean Ter</option> <option value="Brunei">Brunei</option> <option value="Bulgaria">Bulgaria</option> <option value="Burkina Faso">Burkina Faso</option> <option value="Burundi">Burundi</option> <option value="Cambodia">Cambodia</option> <option value="Cameroon">Cameroon</option> <option value="Canada">Canada</option> <option value="Canary Islands">Canary Islands</option> <option value="Cape Verde">Cape Verde</option> <option value="Cayman Islands">Cayman Islands</option> <option value="Central African Republic">Central African Republic</option> <option value="Chad">Chad</option> <option value="Channel Islands">Channel Islands</option> <option value="Chile">Chile</option> <option value="China">China</option> <option value="Christmas Island">Christmas Island</option> <option value="Cocos Island">Cocos Island</option> <option value="Colombia">Colombia</option> <option value="Comoros">Comoros</option> <option value="Congo">Congo</option> <option value="Cook Islands">Cook Islands</option> <option value="Costa Rica">Costa Rica</option> <option value="Cote DIvoire">Cote DIvoire</option> <option value="Croatia">Croatia</option> <option value="Cuba">Cuba</option> <option value="Curaco">Curacao</option> <option value="Cyprus">Cyprus</option> <option value="Czech Republic">Czech Republic</option> <option value="Denmark">Denmark</option> <option value="Djibouti">Djibouti</option> <option value="Dominica">Dominica</option> <option value="Dominican Republic">Dominican Republic</option> <option value="East Timor">East Timor</option> <option value="Ecuador">Ecuador</option> <option value="Egypt">Egypt</option> <option value="El Salvador">El Salvador</option> <option value="Equatorial Guinea">Equatorial Guinea</option> <option value="Eritrea">Eritrea</option> <option value="Estonia">Estonia</option> <option value="Ethiopia">Ethiopia</option> <option value="Falkland Islands">Falkland Islands</option> <option value="Faroe Islands">Faroe Islands</option> <option value="Fiji">Fiji</option> <option value="Finland">Finland</option> <option value="France">France</option> <option value="French Guiana">French Guiana</option> <option value="French Polynesia">French Polynesia</option> <option value="French Southern Ter">French Southern Ter</option> <option value="Gabon">Gabon</option> <option value="Gambia">Gambia</option> <option value="Georgia">Georgia</option> <option value="Germany">Germany</option> <option value="Ghana">Ghana</option> <option value="Gibraltar">Gibraltar</option> <option value="Great Britain">Great Britain</option> <option value="Greece">Greece</option> <option value="Greenland">Greenland</option> <option value="Grenada">Grenada</option> <option value="Guadeloupe">Guadeloupe</option> <option value="Guam">Guam</option> <option value="Guatemala">Guatemala</option> <option value="Guinea">Guinea</option> <option value="Guyana">Guyana</option> <option value="Haiti">Haiti</option> <option value="Hawaii">Hawaii</option> <option value="Honduras">Honduras</option> <option value="Hong Kong">Hong Kong</option> <option value="Hungary">Hungary</option> <option value="Iceland">Iceland</option> <option value="Indonesia">Indonesia</option> <option value="India">India</option> <option value="Iran">Iran</option> <option value="Iraq">Iraq</option> <option value="Ireland">Ireland</option> <option value="Isle of Man">Isle of Man</option> <option value="Israel">Israel</option> <option value="Italy">Italy</option> <option value="Jamaica">Jamaica</option> <option value="Japan">Japan</option> <option value="Jordan">Jordan</option> <option value="Kazakhstan">Kazakhstan</option> <option value="Kenya">Kenya</option> <option value="Kiribati">Kiribati</option> <option value="Korea North">Korea North</option> <option value="Korea Sout">Korea South</option> <option value="Kuwait">Kuwait</option> <option value="Kyrgyzstan">Kyrgyzstan</option> <option value="Laos">Laos</option> <option value="Latvia">Latvia</option> <option value="Lebanon">Lebanon</option> <option value="Lesotho">Lesotho</option> <option value="Liberia">Liberia</option> <option value="Libya">Libya</option> <option value="Liechtenstein">Liechtenstein</option> <option value="Lithuania">Lithuania</option> <option value="Luxembourg">Luxembourg</option> <option value="Macau">Macau</option> <option value="Macedonia">Macedonia</option> <option value="Madagascar">Madagascar</option> <option value="Malaysia">Malaysia</option> <option value="Malawi">Malawi</option> <option value="Maldives">Maldives</option> <option value="Mali">Mali</option> <option value="Malta">Malta</option> <option value="Marshall Islands">Marshall Islands</option> <option value="Martinique">Martinique</option> <option value="Mauritania">Mauritania</option> <option value="Mauritius">Mauritius</option> <option value="Mayotte">Mayotte</option> <option value="Mexico">Mexico</option> <option value="Midway Islands">Midway Islands</option> <option value="Moldova">Moldova</option> <option value="Monaco">Monaco</option> <option value="Mongolia">Mongolia</option> <option value="Montserrat">Montserrat</option> <option value="Morocco">Morocco</option> <option value="Mozambique">Mozambique</option> <option value="Myanmar">Myanmar</option> <option value="Nambia">Nambia</option> <option value="Nauru">Nauru</option> <option value="Nepal">Nepal</option> <option value="Netherland Antilles">Netherland Antilles</option> <option value="Netherlands">Netherlands (Holland, Europe)</option> <option value="Nevis">Nevis</option> <option value="New Caledonia">New Caledonia</option> <option value="New Zealand">New Zealand</option> <option value="Nicaragua">Nicaragua</option> <option value="Niger">Niger</option> <option value="Nigeria">Nigeria</option> <option value="Niue">Niue</option> <option value="Norfolk Island">Norfolk Island</option> <option value="Norway">Norway</option> <option value="Oman">Oman</option> <option value="Pakistan">Pakistan</option> <option value="Palau Island">Palau Island</option> <option value="Palestine">Palestine</option> <option value="Panama">Panama</option> <option value="Papua New Guinea">Papua New Guinea</option> <option value="Paraguay">Paraguay</option> <option value="Peru">Peru</option> <option value="Phillipines">Philippines</option> <option value="Pitcairn Island">Pitcairn Island</option> <option value="Poland">Poland</option> <option value="Portugal">Portugal</option> <option value="Puerto Rico">Puerto Rico</option> <option value="Qatar">Qatar</option> <option value="Republic of Montenegro">Republic of Montenegro</option> <option value="Republic of Serbia">Republic of Serbia</option> <option value="Reunion">Reunion</option> <option value="Romania">Romania</option> <option value="Russia">Russia</option> <option value="Rwanda">Rwanda</option> <option value="St Barthelemy">St Barthelemy</option> <option value="St Eustatius">St Eustatius</option> <option value="St Helena">St Helena</option> <option value="St Kitts-Nevis">St Kitts-Nevis</option> <option value="St Lucia">St Lucia</option> <option value="St Maarten">St Maarten</option> <option value="St Pierre & Miquelon">St Pierre & Miquelon</option> <option value="St Vincent & Grenadines">St Vincent & Grenadines</option> <option value="Saipan">Saipan</option> <option value="Samoa">Samoa</option> <option value="Samoa American">Samoa American</option> <option value="San Marino">San Marino</option> <option value="Sao Tome & Principe">Sao Tome & Principe</option> <option value="Saudi Arabia">Saudi Arabia</option> <option value="Senegal">Senegal</option> <option value="Seychelles">Seychelles</option> <option value="Sierra Leone">Sierra Leone</option> <option value="Singapore">Singapore</option> <option value="Slovakia">Slovakia</option> <option value="Slovenia">Slovenia</option> <option value="Solomon Islands">Solomon Islands</option> <option value="Somalia">Somalia</option> <option value="South Africa">South Africa</option> <option value="Spain">Spain</option> <option value="Sri Lanka">Sri Lanka</option> <option value="Sudan">Sudan</option> <option value="Suriname">Suriname</option> <option value="Swaziland">Swaziland</option> <option value="Sweden">Sweden</option> <option value="Switzerland">Switzerland</option> <option value="Syria">Syria</option> <option value="Tahiti">Tahiti</option> <option value="Taiwan">Taiwan</option> <option value="Tajikistan">Tajikistan</option> <option value="Tanzania">Tanzania</option> <option value="Thailand">Thailand</option> <option value="Togo">Togo</option> <option value="Tokelau">Tokelau</option> <option value="Tonga">Tonga</option> <option value="Trinidad & Tobago">Trinidad & Tobago</option> <option value="Tunisia">Tunisia</option> <option value="Turkey">Turkey</option> <option value="Turkmenistan">Turkmenistan</option> <option value="Turks & Caicos Is">Turks & Caicos Is</option> <option value="Tuvalu">Tuvalu</option> <option value="Uganda">Uganda</option> <option value="United Kingdom">United Kingdom</option> <option value="Ukraine">Ukraine</option> <option value="United Arab Erimates">United Arab Emirates</option> <option value="United States of America">United States of America</option> <option value="Uraguay">Uruguay</option> <option value="Uzbekistan">Uzbekistan</option> <option value="Vanuatu">Vanuatu</option> <option value="Vatican City State">Vatican City State</option> <option value="Venezuela">Venezuela</option> <option value="Vietnam">Vietnam</option> <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option> <option value="Virgin Islands (USA)">Virgin Islands (USA)</option> <option value="Wake Island">Wake Island</option> <option value="Wallis & Futana Is">Wallis & Futana Is</option> <option value="Yemen">Yemen</option> <option value="Zaire">Zaire</option> <option value="Zambia">Zambia</option> <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mobile_number">Mobile Number</label>
                                                    <input class="form-control" required type="text" name="mobile_number" id="mobile_number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea name="address" id="address" class="form-control" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input class="form-control" required type="text" name="state" id="state">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pincode">Pincode</label>
                                                    <input class="form-control" required type="text" name="pincode" id="pincode">
                                                </div>
                                                
                                                <button class="btn btn-success" id="payNow" type="submit">Submit Details</button>
                                                <?php echo form_close(); ?>
                                               
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12"></div>
            </div>
        </div>
    </section>

</main>
<script>
   $(document).ready(function () {
        $("button.add-qty").click(function (e) { 
            e.preventDefault();
            let cartItemId = $(this).attr("cart-item-id");
            let productQuantity = $("input#product-qty-"+cartItemId).val();
            $("input#product-qty-"+cartItemId).val(parseInt(productQuantity)+parseInt(1));
            $("form#updateCart-"+cartItemId).submit();
        });

        $("button.reduce-qty").click(function (e) { 
            e.preventDefault();
            let cartItemId = $(this).attr("cart-item-id");
            let productQuantity = $("input#product-qty-"+cartItemId).val();
            $("input#product-qty-"+cartItemId).val(parseInt(productQuantity)-parseInt(1));
            $("form#updateCart-"+cartItemId).submit(); 
        });
   });

</script>
<style>
    .qty-buttons{
        padding: 1% 5%;
        background-color: #0a0a0a !important;
    }
</style>

<script src="<?php echo site_url("assets/js/app/auth.min.js"); ?>"></script>
<script>

$(".currency-switcher-item").click(function (e) { 
    e.preventDefault();
    let name = $(this).attr("currency_name");
    let currencySwitchingUrl = $(this).attr("currency_switching_url");
    $.ajax({
        type: "GET",
        url: currencySwitchingUrl,
        data: {
            "name" : name
        },
        success: function (response) {
            if (response=="currency-set") {
                location.reload();
            }
        }
    });
});
</script>
<?php if(isset($_SESSION["first_name"])): ?>

<script>
    $("form#paymentForm").submit(function (e) { 
        e.preventDefault();
        let address = $("textarea#address").val();
        let state = $("input#state").val();
        let pincode = $("input#pincode").val();
        if (address==""||state==""||pincode=="") {
            $("span#paymentError").html("Please fill all fields");
        } else {
            $('#staticBackdrop').modal('hide');
            let paymentData = $(this).serialize();
            setCookie("payment_data",paymentData,1);
            $("button#ptpButton").addClass("d-none");
            $("div#paymentButtonsBox").removeClass("d-none");
        }
    });
    
</script>
<?php endif; ?>