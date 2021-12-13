<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h2 class="page-title"><?php echo $title; ?></h2>
        <p class="text-success darken-4"><?php echo $success; ?></p>
        <p class="text-danger darken-4"><?php echo $error; ?></p>

        <?php
            $attributes = array("enctype"=>"multipart/form-data","method"=>"POST");
            echo form_open(site_url('update-product-exe'),$attributes);
        ?>

            <input type="hidden" name="product_id" value="<?php echo $focusProduct["id"]; ?>">

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" value="<?php echo $focusProduct["title"]; ?>" type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="slug">SEO Slug</label>
                <input class="form-control" value="<?php echo $focusProduct["slug"]; ?>" type="text" name="slug" id="slug">
            </div>

            <div class="container-fluid">
            
                <div class="row">
                
                    <div class="form-group col-lg-6 col-md-6 col-sm-12" style="padding-left: 0;">
                        <label for="price">Price</label>
                        <input class="form-control" value="<?php echo $focusProduct["price"]; ?>" type="text" name="price" id="price">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12" style="padding-right: 0;">
                        <label for="sale_price">Sale Price</label>
                        <input class="form-control" value="<?php echo $focusProduct["sale_price"]; ?>" type="text" name="sale_price" id="sale_price">
                    </div>
                
                </div>
            
            </div>

            <div class="form-group">
                <label>Featured Product?</label>
                <br>
                <select class="form-control" name="featured">
                    <option value="no" <?php if($focusProduct["featured"]=="no"){
                        echo "selected";
                    } ?>>No</option>
                    <option value="yes" <?php if($focusProduct["featured"]=="yes"){
                        echo "selected";
                    } ?>>Yes</option>
                </select>
            </div>

            <div class="form-group">
                <label>Weight (in Grams)</label>
                <input type="text" value="<?php echo $focusProduct["weight"]; ?>" name="weight" id="weight" class="form-control">
            </div>
           
            
            
            <div class="form-group">
                <label>Collection</label>
                <br>
                <?php foreach($collections as $collection): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="collections[]" value="<?php echo $collection["id"]; ?>" id="<?php echo uniqid($collection["id"]); ?>" <?php if (in_array($collection["id"],$product_collections)) {
                            echo "checked";
                        } ?> >
                        <label class="form-check-label" for="<?php echo uniqid($collection["id"]); ?>"><?php echo $collection["title"]; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <br>

            <div class="form-group">
                <label>Style</label>
                <br>
                <?php foreach($styles as $style): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="styles[]" value="<?php echo $style["id"]; ?>" id="<?php echo uniqid($style["id"]); ?>" <?php if (in_array($style["id"],$product_styles)) {
                            echo "checked";
                        } ?>>
                    <label class="form-check-label" for="<?php echo uniqid($style["id"]); ?>"><?php echo $style["title"]; ?></label>
                </div>
                <?php endforeach; ?>
            </div>
            <br>
            <div class="form-group">
                <label>Visibility</label>
                <br>
                <select class="form-control" name="visibility">
                    <option value="visible" <?php if($focusProduct["visibility"]=="visible"){
                        echo "selected";
                    } ?>>Visible</option>
                    <option value="hidden" <?php if($focusProduct["visibility"]=="hidden"){
                        echo "selected";
                    } ?>>Hidden</option>
                </select>
            </div>
            <br>
            <img src="<?php echo site_url("assets/images/featured_image_product/".$focusProduct["featured_image"]); ?>" class="w-25">
            <br>
            <div class="form-group">
                <label for="featured_image">Featured Image</label><br>
                <input type="file" name="featured_image" id="featured_image" accept="image/*">
            </div>
            <br>
            <div class="form-group">
                <label for="sizes">Sizes (Provide values separated by ,)</label>
                <input class="form-control" value="<?php echo $focusProduct["sizes"]; ?>" type="text" name="sizes" id="sizes">
            </div>
            <div class="form-group">
                <label for="sku">SKU</label>
                <input class="form-control" value="<?php echo $focusProduct["sku"]; ?>" type="text" name="sku" id="sku">
            </div>
            <br>
            <div class="form-group">
                <label for="stock_count">Stock Count</label>
                <input class="form-control" value="<?php echo $focusProduct["stock_count"]; ?>" type="number" min="1" value="1" name="stock_count" id="stock_count">
            </div>
            <br>
            <div class="row">
            <?php $galleryImages = explode(",",$focusProduct["gallery_images"]); foreach($galleryImages as $galImg): ?>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <img src="<?php echo site_url("assets/images/gallery_images_product/".$galImg); ?>" class="w-25">

                    <a href="<?php echo site_url("delete-gallery-image?pid=".$focusProduct["id"]."&gallery_image=".$galImg); ?>" class="btn btn-danger">Delete</a>
                    

                    <br>
                </div>
            <?php endforeach; ?>
            </div>
            <br><br><br>
            <div class="form-group">
                <label for="gallery_images">Replace all Gallery Images</label><br>
                <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple>
            </div>
            <br>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?php echo $focusProduct["description"]; ?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success"> Update Product </button>

        <?php echo form_close(); ?>
        
    </div>
</main>
<script>
CKEDITOR.replace( 'description' );
</script>