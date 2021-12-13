<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script src="https://cdn.jsdelivr.net/gh/igorlino/elevatezoom-plus@1.2.3/src/jquery.ez-plus.js"></script>
<link rel="stylesheet" href="<?php echo site_url("assets/lity/lity.min.css"); ?>">
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-plain.css" />


<main class="page-content" id="product-page">


    <section id="product-details-section" style="padding: 2% 0;">
    
        <div class="container-fluid" >
        
            <div class="row">

                <div class="col-lg-5 col-md-12 col-sm-12 d-none d-lg-block" style="margin-bottom: 5%; padding: 0 2em 0 4em;">
                
                    
                    <div id="previewPane"><img class="" src="<?php echo site_url('assets/images/featured_image_product/'.$product['featured_image']); ?>" data-zoom-image="<?php echo site_url('assets/images/featured_image_product/'.$product['featured_image']); ?>" id="product-page-main-product-image" style="width: 100%; border: 1px solid darkgray; cursor: pointer;"></div>


                        <br>

                    <div id="gallery_01" class="owl-carouselx " style='margin-top: 5%;'>
                        <?php $gallery_images = explode(',',$product['gallery_images']); foreach($gallery_images as $gallery_image): ?>

                            <a href="#" data-image="<?php echo site_url('assets/images/gallery_images_product/'.$gallery_image); ?>" data-zoom-image="<?php echo site_url('assets/images/gallery_images_product/'.$gallery_image); ?>">
                                <img style="cursor: pointer;" src="<?php echo site_url('assets/images/gallery_images_product/'.$gallery_image); ?>" class="product-gallery-imagex" width="100px" height="100px">
                            </a>

                        <?php endforeach; ?>
                    </div>
                    <script>
                        $('img#product-page-main-product-image').ezPlus({
                            // zoomType: 'lens',
                            // lensShape : 'round',
                            gallery: 'gallery_01', 
                            // scrollZoom: true
                            easing: false,
                            zoomWindowWidth: 300,
                            zoomWindowHeight: 300
                        });
                    </script>
                    


                    <script>
                    $(".product-gallery-image").click(function (e) { 
                        e.preventDefault();
                        $("img#product-page-main-product-image").attr('src',$(this).attr('srcset'));
                        $("img#product-page-main-product-image").attr('data-zoom-image',$(this).attr('srcset'));
                    });
                    </script>
                
                </div>

                    
                <div class="d-block d-lg-none col-lg-5 col-md-12 col-sm-12">
                    
                    <a id="touch-lb-link" data-lity href="<?php echo site_url('assets/images/featured_image_product/'.$product['featured_image']); ?>">
                        <img src="<?php echo site_url('assets/images/featured_image_product/'.$product['featured_image']); ?>" id="product-page-main-product-image-touch" class="w-100">
                    </a>

                    

                    <div id="gallery_01_touch" class="owl-carouselx " style='margin-top: 5%;'>
                        <?php $gallery_images = explode(',',$product['gallery_images']); foreach($gallery_images as $gallery_image): ?>

                            <a href="#" data-image="<?php echo site_url('assets/images/gallery_images_product/'.$gallery_image); ?>" data-zoom-image="<?php echo site_url('assets/images/gallery_images_product/'.$gallery_image); ?>">
                                <img style="cursor: pointer;" src="<?php echo site_url('assets/images/gallery_images_product/'.$gallery_image); ?>" class="product-gallery-imagex" width="100px" height="100px">
                            </a>

                        <?php endforeach; ?>
                    </div>
                </div>
                    

                <div class="col-lg-7 col-md-12 col-sm-12 d-none d-lg-block" id='product-details' style="padding: 0 5em 0 10em;">
                
                    <h1 class="product-title" style='font-size: 26px; margin-top: 1em;'><?php echo $product['title']; ?></h1>
                    <h6>Product Code: <?php echo $product['sku']; ?></h6>
                    <?php if(($product['sale_price']!=0.00)&&($product['sale_price']!=$product['price'])): ?>
                        <span class="larger-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$product['sale_price'],2); ?></span> | <del><span class="smaller-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$product['price'],2); ?></span></del>
                    <?php elseif (($product["price"]==$product["sale_price"])||($product["sale_price"]==0.00)): ?>
                        <span class="smaller-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo $_COOKIE["currency_rate"]*$product['price']; ?></span>
                    <?php endif; ?>

                    <div class="container-fluid">
                    
                        <div class="row" style='margin-top: 5%;'>
                        
                            <?php if($product['sizes']!=''): ?>
                            <div class="col-lg-4 col-md-6 col-sm12 form-group" style="padding-left: 0;">
                            
                            <label for="product-size">Size: <a class="text-success" style="font-weight: 600;" href="<?php echo site_url("assets/images/rgSizeChart.jpg"); ?>" data-lity>See Size Chart</a></label>

                                <select class="form-control" id="product-size">
                                    <?php $sizes = explode(',',$product['sizes']); foreach($sizes as $size): ?>
                                    <option value="<?php echo $size; ?>"><?php echo ucfirst($size); ?></option>
                                    <?php endforeach; ?>

                                </select>

                            </div>
                            <?php else: ?>
                            <input type="hidden" name="product-size" value="default">
                            <?php endif; ?>
                            <div  class="col-lg-4 col-md-6 col-sm12 form-group" style="padding-left: 0;">
                            
                                <label for="stitching">Stitching:</label>

                                <select class="form-control" id="stitching">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>

                            </div>

                            

                            <div class="col-lg-6 col-md-6 col-sm-6 custom-half-grid" style="padding:0; margin-bottom: 1%; margin-top: 1%;">
                                <p class="text-success" id="atwSuccess"></p>
                                <p class="text-danger" id="atwFail"></p>
                                <?php $session = session(); if($session->role=='customer'): ?>
                                    <p id="atw-success" style="margin-bottom: 0;" class="col-lg-12 col-md-12 col-sm-12 text-success" style="color: darkgreen !important;"></p>
                                    <p id="atw-failure" class="col-lg-12 col-md-12 col-sm-12 text-danger"></p>
                                    <button href="#" type="button" id="addToWishlistButton" style=" font-size: 16px; padding-left: 1%; padding-right: 1%;" class="btn btn-link"> <img src="<?php echo site_url('assets/icons/heart.svg'); ?>" width="16px" height="16px"> Add to Wishlist</button>
                                <?php else: ?>
                                    <a  id="addToWishlistButton" href="<?php echo site_url('login'); ?>" style=" font-size: 16px;"> <img src="<?php echo site_url('assets/icons/heart.svg'); ?>" width="16px" height="16px"> Add to Wishlist</a>
                                <?php endif;  ?>

                                <script>
                                    $("button#addToWishlistButton").click(function (e) { 
                                        e.preventDefault();
                                        let pid = "<?php echo $product["id"] ?>";
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo site_url("add-to-wishlist-exe"); ?>",
                                            data: {
                                                "pid" : pid
                                            },
                                            success: function (response) {
                                                if (response=="success") {
                                                    $("p#atwSuccess").html("Product added to wishlist");
                                                } else if (response=="failure") {
                                                    $("p#atwFail").html("Product not added to wishlist");
                                                }else{
                                                    $("p#atwFail").html("Item already exists in wishlist");
                                                }
                                                setTimeout(() => {
                                                    $("p#atwSuccess").html("");
                                                    $("p#atwFail").html("");

                                                }, 500);
                                            }
                                        });
                                    });
                                </script>


                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 custom-half-grid" style="padding:0; margin-bottom: 3%;">
                            
                            <p id="atx-success" style="margin-bottom: 0;" class="col-lg-12 col-md-12 col-sm-12 text-success" style="color: darkgreen !important;"></p>
                                <p id="atx-failure" class="col-lg-12 col-md-12 col-sm-12 text-danger"></p>

                                <a href="#" data-toggle="modal" data-target="#sizeChartModal" style="font-size: 16px;" class="d-none"> <img src="<?php echo site_url('assets/icons/sliders.svg'); ?>" width="16px" height="16px"> See Size Chart</a>

                            </div>
                            <!-- <div class="col-lg-4 col-md-12 col-sm-12"></div> -->

                            <p id="atc-success" style="margin-bottom: 0;" class="col-lg-12 col-md-12 col-sm-12 text-success" style="color: darkgreen !important;"></p>
                                <p id="atc-failure" class="col-lg-12 col-md-12 col-sm-12 text-danger"></p>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group " style="padding-left: 0;">
                                <!-- <label for="product-quantity">Quantity:</label> -->

                                <!-- <select class="form-control" id="product-quantity">
                                    <?php for($i=1;$i<=5;$i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select> -->



                                <button class="btn" id="reduce-qty" type="button" style="border-radius: 0 !important; border: 1px solid gray; color: black;  margin: 0%; font-size: 20px; margin-right: 0.5em;">-</button><input type="number" id="product-quantity" style="width: 50px; font-size: 15px; height: 50px; text-align: center;" value="1" min="1" readonly><button class="btn" id="add-qty" type="button" style="border-radius: 0 !important; border: 1px solid gray; color: black;  margin: 0%; font-size: 20px; margin-left: 0.5em;">+</button>

                            </div>
                            

                            <div class="col-lg-6 col-md-6 col-sm-6 custom-half-grid" style="padding:0;">
                                
                                        
                                <button type="button" id="addToCartButton" class="btn btn-primary" style="background-color: black; color:white; margin-bottom: 3%;">Add to Cart</button>
                            </div>
                            <div id="share"></div>




                            <div class="col-lg-6 col-md-6 col-sm-6 text-left custom-half-grid" style="padding-left: 0; margin-top: 1%;">
                                <a style="font-size: 19px;" href="https://api.whatsapp.com/send?phone=919920166157&text=<?php echo urlencode('I am interested in '.site_url('product/'.$product['slug'])); ?>">Inquiry on <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/1200px-WhatsApp.svg.png" width="20px" height="20px"></a>
                            </div>
                            <div id="description-box" class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 10%;">
                                <p class="product-description text-left"><?php echo $product['description']; ?></p>
                            </div>

                        
                        </div>

                    
                    </div>



                    
                
                </div>

                <div class="col-lg-7 col-md-12 col-sm-12 d-block d-lg-none" id='product-details' >
                
                    <h1 class="product-title" style='font-size: 26px; margin-top: 1em;'><?php echo $product['title']; ?></h1>
                    <h4>Product Code: <?php echo $product['sku']; ?></h4>

                    <?php if(($product['sale_price']!=0.00)&&($product['sale_price']!=$product['price'])): ?>
                        <span class="larger-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$product['sale_price'],2); ?></span> | <del><span class="smaller-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$product['price'],2); ?></span></del>
                    <?php elseif (($product["price"]==$product["sale_price"])||($product["sale_price"]==0.00)): ?>
                        <span class="smaller-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo $_COOKIE["currency_rate"]*$product['price']; ?></span>
                    <?php endif; ?>

                    <div class="container-fluid">
                    
                        <div class="row" style='margin-top: 5%;'>
                        
                            <?php if($product['sizes']!=''): ?>
                            <div class="col-lg-4 col-md-6 col-sm12 form-group" style="padding-left: 0;">
                            
                            <label for="product-size">Size: <a class="text-success" style="font-weight: 600;" href="<?php echo site_url("assets/images/rgSizeChart.jpg"); ?>" data-lity>See Size Chart</a></label>

                                <select class="form-control" id="product-size">
                                    <?php $sizes = explode(',',$product['sizes']); foreach($sizes as $size): ?>
                                    <option value="<?php echo $size; ?>"><?php echo ucfirst($size); ?></option>
                                    <?php endforeach; ?>

                                </select>

                            </div>
                            <?php else: ?>
                            <input type="hidden" name="product-size" value="default">
                            <?php endif; ?>
                            <div  class="col-lg-4 col-md-6 col-sm12 form-group" style="padding-left: 0;">
                            
                                <label for="stitching">Stitching:</label>

                                <select class="form-control" id="stitching">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>

                            </div>

                            

                            <div class="col-lg-6 col-md-6 col-sm-6 custom-half-grid" style="padding:0; margin-bottom: 1%; margin-top: 1%;">
                                <p class="text-success" id="atwSuccess"></p>
                                <p class="text-danger" id="atwFail"></p>
                                <?php $session = session(); if($session->role=='customer'): ?>
                                    <p id="atw-success" style="margin-bottom: 0;" class="col-lg-12 col-md-12 col-sm-12 text-success" style="color: darkgreen !important;"></p>
                                    <p id="atw-failure" class="col-lg-12 col-md-12 col-sm-12 text-danger"></p>
                                    <button href="#" type="button" id="addToWishlistButton" style=" font-size: 16px; padding-left: 1%; padding-right: 1%;" class="btn btn-link"> <img src="<?php echo site_url('assets/icons/heart.svg'); ?>" width="16px" height="16px"> Add to Wishlist</button>
                                <?php else: ?>
                                    <a  id="addToWishlistButton" href="<?php echo site_url('login'); ?>" style=" font-size: 16px;"> <img src="<?php echo site_url('assets/icons/heart.svg'); ?>" width="16px" height="16px"> Add to Wishlist</a>
                                <?php endif;  ?>

                                <script>
                                    $("button#addToWishlistButton").click(function (e) { 
                                        e.preventDefault();
                                        let pid = "<?php echo $product["id"] ?>";
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo site_url("add-to-wishlist-exe"); ?>",
                                            data: {
                                                "pid" : pid
                                            },
                                            success: function (response) {
                                                if (response=="success") {
                                                    $("p#atwSuccess").html("Product added to wishlist");
                                                } else if (response=="failure") {
                                                    $("p#atwFail").html("Product not added to wishlist");
                                                }else{
                                                    $("p#atwFail").html("Item already exists in wishlist");
                                                }
                                                setTimeout(() => {
                                                    $("p#atwSuccess").html("");
                                                    $("p#atwFail").html("");

                                                }, 500);
                                            }
                                        });
                                    });
                                </script>


                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 custom-half-grid" style="padding:0; margin-bottom: 3%;">
                            
                            <p id="atx-success" style="margin-bottom: 0;" class="col-lg-12 col-md-12 col-sm-12 text-success" style="color: darkgreen !important;"></p>
                                <p id="atx-failure" class="col-lg-12 col-md-12 col-sm-12 text-danger"></p>

                                <a href="#" data-toggle="modal" data-target="#sizeChartModal" style="font-size: 16px;" class="d-none"> <img src="<?php echo site_url('assets/icons/sliders.svg'); ?>" width="16px" height="16px"> See Size Chart</a>

                            </div>
                            <!-- <div class="col-lg-4 col-md-12 col-sm-12"></div> -->

                            <p id="atc-success" style="margin-bottom: 0;" class="col-lg-12 col-md-12 col-sm-12 text-success" style="color: darkgreen !important;"></p>
                                <p id="atc-failure" class="col-lg-12 col-md-12 col-sm-12 text-danger"></p>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group " style="padding-left: 0;">
                                <!-- <label for="product-quantity">Quantity:</label> -->

                                <!-- <select class="form-control" id="product-quantity">
                                    <?php for($i=1;$i<=5;$i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select> -->



                                <button class="btn" id="reduce-qty" type="button" style="border-radius: 0 !important; border: 1px solid gray; color: black;  margin: 0%; font-size: 20px; margin-right: 0.5em;">-</button><input type="number" id="product-quantity" style="width: 50px; font-size: 15px; height: 50px; text-align: center;" value="1" min="1" readonly><button class="btn" id="add-qty" type="button" style="border-radius: 0 !important; border: 1px solid gray; color: black;  margin: 0%; font-size: 20px; margin-left: 0.5em;">+</button>

                            </div>
                            

                            <div class="col-lg-6 col-md-6 col-sm-6 custom-half-grid" style="padding:0;">
                                
                                        
                                <button type="button" id="addToCartButton" class="btn btn-primary" style="background-color: black; color:white; margin-bottom: 3%;">Add to Cart</button>
                            </div>
                            <div id="share"></div>




                            <div class="col-lg-6 col-md-6 col-sm-6 text-left custom-half-grid" style="padding-left: 0; margin-top: 1%;">
                                <a style="font-size: 19px;" href="https://api.whatsapp.com/send?phone=919920166157&text=<?php echo urlencode('I am interested in '.site_url('product/'.$product['slug'])); ?>">Inquiry on <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/1200px-WhatsApp.svg.png" width="20px" height="20px"></a>
                            </div>
                            <div id="description-box" class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 10%;">
                                <p class="product-description text-left"><?php echo $product['description']; ?></p>
                            </div>

                        
                        </div>

                    
                    </div>



                    
                
                </div>
            
            
            </div>
        
        </div>
    
    </section>
    <section id="related-products-section">
        <div class="container">
            <h1 class="text-center section-title">Related Products</h1>
            <div id="productsBox" class="row" style="min-height: 300px;">
        
            <?php foreach($related_products as $related_product): if($related_product["id"]!=$product["id"]): ?>
        
                <div class="col-lg-3 col-md-6-sm-12 text-center custom-half-grid" style="margin-bottom: 5%; padding: 5px;">
                
                    <a href="<?php echo site_url('product/'.$related_product['slug']); ?>">
                        <div class="card">
                        
                            <img src="<?php echo site_url('assets/images/preloader.gif'); ?>" data-src="<?php echo site_url('assets/images/featured_image_product/'.$related_product['featured_image']); ?>" class="card-img-top lazy ">
                        
                            <div class="card-body">
                            
                            <h4 class="product-title"><?php if(strlen($related_product['title'])>9){
                                echo substr($related_product['title'],0,10).'...';
                                }else {
                                echo $related_product['title'];
                                } ?></h4>           
                                                          
                            <?php if(($related_product['sale_price']!=0.00)&&($related_product['sale_price']!=$related_product['price'])): ?>
                                    <span class="larger-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$related_product['sale_price'],2); ?></span> | <del><span class="smaller-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$related_product['price'],2); ?></span></del>
                    <?php elseif (($related_product["price"]==$related_product["sale_price"])||($related_product["sale_price"]==0.00)): ?>
                        <span class="smaller-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo $_COOKIE["currency_rate"]*$related_product['price']; ?></span>
                    <?php endif; ?>

                        <br>
                                <button style="margin-top: 1em;" class="btn btn-primary">BUY NOW</button>

                            </div>

                        </div>
                    </a>

                </div>

            <?php endif; endforeach; ?>

        </div>
        </div>
    </section>

</main>
<script src="<?php echo site_url("assets/lity/lity.min.js"); ?>"></script>
<script>
    $("button#add-qty").click(function (e) { 
        e.preventDefault();
        let productQuantity = $("input#product-quantity").val();
        $("input#product-quantity").val(parseInt(productQuantity)+parseInt(1));
    });

    $("button#reduce-qty").click(function (e) { 
        e.preventDefault();
        let productQuantity = $("input#product-quantity").val();
        if(parseInt(productQuantity)!=1){
            $("input#product-quantity").val(parseInt(productQuantity)-parseInt(1));
        }
    });
    $("button#addToCartButton").click(function (e) { 
        e.preventDefault();
        <?php if($product['sizes']==''): ?>
        let productSize = 'default';
        <?php else: ?>
            let productMaterial = $("select#product-material").val();
        let productSize = $("select#product-size").val();
        <?php endif; ?>
        let productQuantity = $("input#product-quantity").val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('add-to-cart-exe'); ?>",
            data: {
                product_id : '<?php echo $product['id']; ?>',
                stitching : $("select#stitching").val(),
                size : productSize,
                quantity : productQuantity,
            },
            success: function (response) {
                if(response=='success'){
                    $("p#atc-success").html('Added to Cart Successfully');
                    let currentCartCount = "<?php echo $cart_item_count; ?>"
                    $("span#cart_item_count").html(currentCartCount+1);
                    setTimeout(function() {
                        $("p#atc-success").html('');
                    }, 3000);
                    location.reload();
                }else{
                    $("p#atc-failure").html('Added to Cart Failed');
                    setTimeout(function() {
                        $("p#atc-failure").html('');
                    }, 3000);
                }
            }
        });
    });


</script>
<script>
    $('img#product-page-main-product-image').ezPlus({
        // zoomType: 'lens',
        // lensShape : 'round',
        gallery: 'gallery_01', 
        // scrollZoom: true
        easing: false,
        zoomWindowWidth: 300,
        zoomWindowHeight: 300


    });
    </script>
    <script>
    // $('img#product-page-main-product-image').ezPlus({
    //     zoomType: 'lens',
    //     lensShape: 'round',
    //     lensSize: 200

    // });
    $("div#gallery_01 a").click(function (e) { 
        e.preventDefault();
        let imageUrl = $(this).attr("data-zoom-image");
        $("img#product-page-main-product-image").attr("src",imageUrl);
        $("img#product-page-main-product-image").attr("data-zoom-image",imageUrl);
        $('img#product-page-main-product-image').ezPlus({
        // zoomType: 'lens',
        // lensShape : 'round',
        gallery: 'gallery_01', 
        // scrollZoom: true
        easing: false,
        zoomWindowWidth: 300,
        zoomWindowHeight: 300


        });
    });

    $("div#gallery_01_touch a").click(function (e) { 
        e.preventDefault();
        let imageUrl = $(this).attr("data-zoom-image");
        $("img#product-page-main-product-image-touch").attr("src",imageUrl);
        $("a#touch-lb-link").attr("href",imageUrl);
    });
</script>

</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script>
        $("#share").jsSocials({
            shares: ["email", "twitter", "facebook",  "linkedin", "pinterest", "stumbleupon", "whatsapp"]
        });
    </script>