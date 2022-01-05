<main class="page-content" id="shop">

    <div class="container-fluid">
    
        <div class="row" style="margin: 5% 0;">
        
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="container-fluid" style="padding: 0;">
                        
                    <!-- <h1 class="section-title text-center" id="filtered-title">ALL Products</h1> -->
        
                            
                    <div id="productsBox" class="row" style="min-height: 300px;">
        
                        <?php foreach($products as $product):  ?>
                    
                        <div class="col-lg-3 col-md-6-sm-12 text-center custom-half-grid" style="margin-bottom: 5%; padding: 5px;">
                        
                            <a href="<?php echo site_url('product/'.$product['slug']); ?>">
                                <div class="card">
                                
                                    <img src="<?php echo site_url('assets/images/preloader.gif'); ?>" data-src="<?php echo site_url('assets/images/featured_image_product/'.$product['featured_image']); ?>" class="card-img-top lazy ">
                                
                                    <div class="card-body">
                                    
                                    <h4 class="product-title"><?php if(strlen($product['title'])>9){
                                        echo substr($product['title'],0,30).'...';
                                        }else {
                                        echo $product['title'];
                                        } ?></h4>                                
                                        <p> <?php echo $_COOKIE["currency_symbol"]; ?> <?php echo number_format($_COOKIE["currency_rate"]*$product["sale_price"],2); ?> | <?php echo $_COOKIE["currency_symbol"]; ?> <del><?php echo number_format($_COOKIE["currency_rate"]*$product["price"],2); ?></del></p>


                                    

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
<script>
$(document).ready(function () {
    getVals();
});
$("input.filter-trigger,.input.filter-trigger").on('change input',function (e) { 
    e.preventDefault();
    let minMaxPrices = getVals();
    $("button#loadMoreProducts").css("display","none");
    var preloaderImage = '<img src="<?php echo site_url("assets/images/preloader.gif"); ?>">';
    $("div#productsBox").html(preloaderImage);
    // let max_price = $("input#max_price_desktop").val();
    // $("span#max-price-display").html('₹ '+max_price);
    let selected_styles = []; let selected_collections = [];
    $("input.filter-style:checked").each(function(i){
        selected_styles[i] = $(this).val();
    });
    $("input.filter-collection:checked").each(function(i){
        selected_collections[i] = $(this).val();
    });

    $.ajax({
        type: "POST",
        url: "<?php echo site_url('filter-endpoint'); ?>",
        data: {
            'max_price' : minMaxPrices["max"],
            'min_price' : minMaxPrices["min"],
            'selected_styles' : selected_styles,
            'selected_collections' : selected_collections
        },
        success: function (response) {
            $("div#productsBox").html(response);
        }
    });
});



let offset = 8;
$("button#loadMoreProducts").click(function(){
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('load-twelve-more-products') ?>",
        data: {
            'offset' : offset
        },
        success: function (response) {
            $("div#productsBox").append(response);
            offset = offset+8;
            lazyLoadInstance.update();
        }
    });
});
</script>