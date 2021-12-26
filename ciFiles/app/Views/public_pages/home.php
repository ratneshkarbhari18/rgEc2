<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<main class="page-container" id="home">

    
    <section id="home-slider-section" class="d-none d-lg-block">
        <div id="home-hero-slider" class="owl-carousel owl-theme">
            <?php foreach($slides as $slide): if($slide["visibility"]=="yes"): ?>
            <a href="<?php echo $slide['link'] ?>" target="_blank">
                <img src="<?php echo site_url('assets/images/slider_images/'.$slide['desktop_image']); ?>" class="w-100">
            </a>
            <?php endif; endforeach; ?>
        </div>
    </section>
    <section id="home-slider-section" class="d-block d-lg-none">
        <div id="home-hero-slider-mobile" class="owl-carousel owl-theme">

            <?php foreach($slides as $slide): if($slide["visibility"]=="yes"):  ?>
            <a href="<?php echo $slide['link'] ?>" target="_blank">
                <img src="<?php echo site_url('assets/images/slider_images/'.$slide['touch_image']); ?>" class="w-100 lazy">
            </a>
            <?php endif; endforeach; ?>

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
                    <div class="col-lg-4"></div>
                    <?php foreach($collections as $collection): ?>
                    <div class="col-lg-4 col-md-auto col-sm-auto ml-auto mr-auto">
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
                    <div class="col-lg-4"></div>
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

    <link rel="stylesheet" href="<?php echo site_url("assets/lity/lity.min.css"); ?>">

    
    <section class="usual-section" id="testimonials">
        <div class="container">
            <h1 class="section-title text-center">TESTIMONIALS</h1>
            <div class="owl-carousel product-carousel">
                <?php foreach ($testimonials as $testimonial):  ?>
                    <div class="card" style="border: none !important;">
                        <div class="card-body">
                            <a data-lity href="<?php echo site_url("assets/images/testimonial_images/".$testimonial["mugshot"]); ?>">
                            <img src="<?php echo site_url("assets/images/testimonial_images/".$testimonial["mugshot"]); ?>" class="collection-image w-25" style="border-radius: 50%;">
                            </a>
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
<script src="<?php echo site_url("assets/lity/lity.min.js"); ?>"></script>

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
<?php foreach($popups as $popup):  
        if($popup["visible"]=="yes"):
    ?>
        
        <div class="modal fade" popupId="<?php echo $popup["id"]; ?>" id="popupx-<?php echo $popup["id"]; ?>" tabindex="-1" aria-labelledby="popup<?php echo $popup["id"]; ?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $popup["title"]; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <a href="<?php echo $popup["link"]; ?>">
                        <img src="<?php echo site_url("assets/images/popupImages/".$popup["image"]); ?>" class="w-100">
                        </a>
                        <?php if($popup["has_form"]=="yes"): ?>
                        <h4 class="d-none">Sign Up for our Email List</h4>
                        <?php echo form_open("submit-subscription",array("class"=>"d-inline","id"=>"emailSubForm")); ?>
                        <p class="text-success text-center" id="emailSubSuccess" style="margin-top: 1em;"></p>
                        <?php $form_fields = explode(",",$popup["form_fields"]); foreach($form_fields as $ff): ?>
                        <input type="hidden" name="fields" value='<?php echo json_encode($form_fields); ?>'>
                        <div class="form-group">
                            <label for="<?php echo $ff; ?>"><?php echo ucfirst(str_replace("_"," ",$ff)); ?></label>
                            <input required type="text" name="<?php echo $ff; ?>" class="form-control" id="<?php echo $ff; ?>">
                        </div>
                        <?php endforeach; ?>
                        <button id="emailSubAdd" class="btn btn-block" style="background-color: deeppink; color: white;">Submit</button>
                        <?php echo form_close(); ?>
                        <?php endif; ?>
                    </div>

                    <script>
                        $("form#emailSubForm").submit(function (e) { 
                            e.preventDefault();

                            $.ajax({
                                type: "POST",
                                url: $(this).attr("action"),
                                data: $(this).serialize(),
                                success: function (response) {
                                    $("p#emailSubSuccess").html("Submitted");
                                }
                            });

                        });

                    </script>

                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                $('#popupx-<?php echo $popup["id"]; ?>').modal('show')
            }, <?php echo $popup["trigger_timeout"]*1000; ?>);
            $('#popupx-<?php echo $popup["id"]; ?>').on('hidden.bs.modal', function () {
                // let popupId = $(this).attr("popupId");
                // setCookie("popup_closed","y",3);
                // location.reload();
            });
            
        </script>
    <?php 
        endif;
        endforeach;
    ?>