<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<main class="page-container" id="home">

    
    <section id="home-slider-section" class="d-none d-lg-block">
        <div id="home-hero-slider" class="owl-carousel owl-theme">
            <?php foreach($slides as $slide): ?>
            <a href="<?php echo $slide['link'] ?>" target="_blank">
                <img src="<?php echo site_url('assets/images/slider_images/'.$slide['desktop_image']); ?>" class="w-100">
            </a>
            <?php endforeach; ?>
        </div>
    </section>
    <section id="home-slider-section" class="d-sm-block d-md-block d-lg-none">
        <div id="home-hero-slider-mobile" class="owl-carousel owl-theme">

            <?php foreach($slides as $slide): ?>
            <a href="<?php echo $slide['link'] ?>" target="_blank">
                <img src="<?php echo site_url('assets/images/slider_images/'.$slide['touch_image']); ?>" class="w-100 lazy">
            </a>
            <?php endforeach; ?>

        </div>
    </section>

    <section class="usual-section" id="featured-products">
        <div class="container-fluid">
            <div class="text-center">
                <h1 class="section-title">Featured Products</h1>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-1 col-md-12 col-sm-12"></div>
                        <div class="col-lg-10 col-md-12 col-sm-12">

                            <div class="owl-carousel product-carousel">
                                <?php foreach ($products as $product):  
                                    if($product["featured"]=='yes'):    
                                ?>
                                    <a href="<?php echo site_url("product/".$product["slug"]); ?>">
                                        <div class="card">
                                            <img src="<?php echo site_url("assets/images/featured_image_product/".$product["featured_image"]); ?>" class="product-image w-100">
                                            <div class="card-body">
                                                <h4 style="font-weight: 600;"><?php echo substr($product["title"],0,30); ?>...</h4>
                                                <?php if(($product['sale_price']!=0.00)&&($product['sale_price']!=$product['price'])): ?>

                                                <p> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$product["sale_price"],2); ?> | <?php echo $_COOKIE["currency_symbol"]; ?> <del><?php echo number_format($_COOKIE["currency_rate"]*$product["price"],2); ?></del></p>

                                                <?php elseif (($product["price"]==$product["sale_price"])||($product["sale_price"]==0.00)): ?>
                                                    <p> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$product["price"],2); ?></p>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </a>
                                <?php 
                                endif;  
                                endforeach; ?>
                            </div>

                        </div>
                        <div class="col-lg-1 col-md-12 col-sm-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="usual-section" id="collections">
        <div class="container">
            <div class="text-center">
                <h1 class="section-title">Collections</h1>
                <?php if (count($collections)>=4): ?>
                <div class="owl-carousel product-carousel">
                    <?php foreach ($collections as $collection):  ?>
                        <a href="<?php echo site_url("collection/".$collection["slug"]); ?>">
                            <div class="card">
                                <img src="<?php echo site_url("assets/images/collection_featured_images/".$collection["featured_image"]); ?>" class="collection-image w-100">
                                <div class="card-body">
                                <h4 style="font-weight: 600;"><?php echo substr($collection["title"],0,30); ?></h4>
                                </div>
                            </div>
                        </a>
                    <?php 
                    endforeach; ?>
                </div>
                <?php else: ?>
                <div class="row">
                    <?php foreach($collections as $collection): ?>
                    <div class="col-lg-auto col-md-auto col-sm-auto ml-auto mr-auto">
                        <a href="<?php echo site_url("collection/".$collection["slug"]); ?>">
                            <div class="card">
                                <img src="<?php echo site_url("assets/images/collection_featured_images/".$collection["featured_image"]); ?>" class="collection-image w-100">
                                <div class="card-body">
                                <h4 style="font-weight: 600;"><?php echo substr($collection["title"],0,30); ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="usual-section" id="styles">
        <div class="container">
            <div class="text-center">
                <h1 class="section-title">Styles</h1>
                <div class="owl-carousel product-carousel">
                    <?php foreach ($styles as $style):  ?>
                        <a href="<?php echo site_url("style/".$style["slug"]); ?>">
                            <div class="card">
                                <img src="<?php echo site_url("assets/images/style_featured_images/".$style["featured_image"]); ?>" class="collection-image w-100">
                                <div class="card-body">
                                    <h4 style="font-weight: 600;"><?php echo $style["title"]; ?></h4>
                                </div>
                            </div>
                        </a>
                    <?php 
                    endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    
    <section class="usual-section" id="testimonials">
        <div class="container">
            <h1 class="section-title text-center">TESTIMONIALS</h1>
            <div class="owl-carousel product-carousel">
                <?php foreach ($testimonials as $testimonial):  ?>
                    <div class="card">
                        <div class="card-body">
                            <img src="<?php echo site_url("assets/images/testimonial_images/".$testimonial["mugshot"]); ?>" class="collection-image w-25" style="border-radius: 50%;">
                            <br>
                            <h5 style="font-weight: 600;"><?php echo $testimonial["name"]; ?></h5>
                            <p class="testimonial-body"><?php echo $testimonial["testimonial"]; ?></p>
                        </div>
                    </div>
                <?php 
                endforeach; ?>
            </div>

        </div>
    </section>
    
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#home-hero-slider,#home-hero-slider-mobile").owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots: false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    $(".product-carousel").owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots: false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
</script>