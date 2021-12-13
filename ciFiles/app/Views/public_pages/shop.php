<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="resources/demos/style.css"> -->

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<main class="page-content" id="shop">

    <div class="container-fluid">

    <h1 class="section-titlex text-center" style="margin: 1em 0;" id="filtered-title"><?php echo $title; ?></h1>

    
        <div class="row" style="margin: 5% 0;">

        
            <div class="col-lg-3 col-md-12 col-sm-12">


                <!-- <h4 class="section-titlex">Filter Products</h4> -->
                <div id="filterBox" >

                    <h5>Price Range</h5>
                    <?php $attributes = array("id"=>"filterForm","class"=>"d-none d-ld-block d-xl-block"); 
                    echo form_open(site_url("product-filter-exe"),$attributes);
                    ?>

                        <div class="form-group">
                            <label for="maxPrice" id="maxPrice">Max Price: ₹ 10000</label>
                            <input  style="width: 50%" min="0" value="10000" max="200000" type="range" name="maxPrice" class="form-control-range filter-trigger" id="maxPrice">
                        </div>
                        
                        <h5>by collection</h5>
                        <?php foreach($collections as $collection): ?>
                        <div class="form-check" style="padding-left: 0;">
                            <input name="collections[]" id="<?php echo $collection["id"]; ?>" type="checkbox" class=" filter-trigger filter-collection" value="<?php echo $collection["id"]; ?>">
                            <label for="<?php echo $collection["id"]; ?>"><?php echo ucfirst($collection['title']); ?></label>
                        </div>
                        <?php endforeach; ?>
                        <br>
                        <h5>by style</h5>
                        <?php foreach($styles as $style): ?>
                        <div class="form-check" style="padding-left: 0;">
                            <input name="styles[]" id="<?php echo $style["id"]; ?>" type="checkbox" class=" filter-trigger filter-styles" value="<?php echo $style["id"]; ?>">
                            <label for="<?php echo $style["id"]; ?>"><?php echo ucfirst($style['title']); ?></label>
                        </div>
                        <?php endforeach; ?>
                    <?php echo form_close(); ?>
                    <br>

                </div>
            
            </div>
            <script>
                $(".filter-trigger").change(function (e) { 
                    e.preventDefault();
                    let maxPrice = $("input#maxPrice").val();
                    $("label#maxPrice").html("Max Price: ₹ "+maxPrice);
                    let formData = $("form#filterForm").serialize();
                    $.ajax({
                        type: "POST",
                        url:  $("form#filterForm").attr("action"),
                        data: formData,
                        success: function (response) {
                            $("div#productsBox").html(response);
                        }
                    });
                });

            </script>
            <div class="col-lg-9 col-md-12 col-sm-12">

                <div class="container-fluid" style="padding: 0;">
                        
        
                            
                    <div id="productsBox" class="row" style="min-height: 300px;">
        
                        <?php foreach($products as $product):  ?>
                    
                        <div class="col-lg-4 col-md-6-sm-12 text-center custom-half-grid" style="margin-bottom: 5%; padding: 5px;">
                        
                            <a href="<?php echo site_url('product/'.$product['slug']); ?>">
                                <div class="card">
                                
                                    <img src="<?php echo site_url('assets/images/preloader.gif'); ?>" data-src="<?php echo site_url('assets/images/featured_image_product/'.$product['featured_image']); ?>" class="card-img-top lazy ">
                                
                                    <div class="card-body">
                                    
                                    <h4 class="product-title"><?php if(strlen($product['title'])>9){
                                        echo substr($product['title'],0,9).'...';
                                        }else {
                                        echo $product['title'];
                                        } ?></h4>                                
                    <?php if(($product['sale_price']!=0.00)&&($product['sale_price']!=$product['price'])): ?>
                        <span class="larger-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$product['sale_price'],2); ?></span> | <del><span class="smaller-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$product['price'],2); ?></span></del>
                    <?php elseif (($product["price"]==$product["sale_price"])||($product["sale_price"]==0.00)): ?>
                        <span class="smaller-price-card"> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo $_COOKIE["currency_rate"]*$product['price']; ?></span>
                    <?php endif; ?>

                    <br>


                                        <button class="btn btn-primary">BUY NOW</button>
        
                                    </div>
        
                                </div>
                            </a>
        
                        </div>
        
                        <?php endforeach; ?>
        
                    </div>
                    
                    <!-- <div class="text-center">
                        <button type="button" id="loadMoreProducts" class="btn btn-primary">Load More Products</button>
                    </div> -->

                </div>
            
            
            </div>
        
        </div>
    
    </div>

</main>

<style>
.page-content{
    padding-top: 0 !important;
}
</style>

<!-- Shop Page Scripts -->

<script>
    // Filter
</script>