<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h2 class="page-title"><?php echo $title; ?></h2>
        <p class="text-success darken-4"><?php echo $success; ?></p>
        <p class="text-danger darken-4"><?php echo $error; ?></p>

        <?php
            $attributes = array("enctype"=>"multipart/form-data","method"=>"POST");
            echo form_open(site_url('add-product-exe'),$attributes);
        ?>

            <div class="form-group">
                <label for="title">Title*</label>
                <input class="form-control" placeholder="New Product Name" type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="slug">SEO Slug*</label>
                <input placeholder="new-product-name-1234" class="form-control" type="text" name="slug" id="slug">
            </div>

            <div class="container-fluid">
            
                <div class="row">
                
                    <div class="form-group col-lg-6 col-md-6 col-sm-12" style="padding-left: 0;">
                        <label for="price">Price*</label>
                        <input class="form-control" type="text" placeholder="10.00" name="price" id="price" required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12" style="padding-right: 0;">
                        <label for="sale_price">Sale Price</label>
                        <input class="form-control" type="text" name="sale_price" placeholder="5.00" id="sale_price">
                    </div>
                
                </div>
            
            </div>

            <div class="form-group">
                <label>Featured Product?*</label>
                <br>
                <select class="form-control" name="featured">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                </select>
            </div>

            <div class="form-group">
                <label>Weight (in Grams)*</label>
                <input type="text" name="weight" id="weight" placeholder="100" class="form-control" required>
            </div>
           
            
            
            <div class="form-group">
                <label>Collection*</label>
                
                <!-- <select class="form-control" name="collection" multiple> -->
                <br>
                <?php foreach($collections as $collection): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="collections[]" value="<?php echo $collection["id"]; ?>" id="<?php echo uniqid($collection["id"]); ?>" >
                        <label class="form-check-label" for="<?php echo uniqid($collection["id"]); ?>"><?php echo $collection["title"]; ?>*</label>
                    </div>
                <?php endforeach; ?>
                <!-- </select> -->
            </div>
            <br>

            <div class="form-group">
                <label>Style*</label>
                <br>
                <!-- <select class="form-control" name="style"> -->
                <?php foreach($styles as $style): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="styles[]" value="<?php echo $style["id"]; ?>" id="<?php echo uniqid($style["id"]); ?>" >
                        <label class="form-check-label" for="<?php echo uniqid($style["id"]); ?>"><?php echo $style["title"]; ?>*</label>
                    </div>
                <?php endforeach; ?>
                <!-- </select> -->
            </div>
            <br>
            <div class="form-group">
                <label>Visibility*</label>
                <br>
                <select class="form-control" name="visibility">
                    <option value="visible" selected>Visible</option>
                    <option value="hidden">Hidden</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="featured_image">Featured Image*</label><br>
                <input type="file" name="featured_image" id="featured_image" accept="image/*" required>
            </div>
            <br>
            <div class="form-group">
                <label for="sizes">Sizes (Provide values separated by ,)*</label>
                <input class="form-control" placeholder="S,M,L,XL" type="text" name="sizes" id="sizes" required>
            </div>
            <div class="form-group">
                <label for="sku">SKU*</label>
                <input class="form-control" placeholder="PROD1234" type="text" name="sku" id="sku" required>
            </div>
            <br>
            <div class="form-group">
                <label for="stock_count">Stock Count*</label>
                <input class="form-control" type="number" min="1" value="1" name="stock_count" id="stock_count" required placeholder="10000">
            </div>
            <br>
            <div class="form-group">
                <label for="gallery_images">Gallery Images*</label><br>
                <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple>
            </div>
            <br>
            
            <div class="form-group">
                <label for="description">Description*</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success"> Add Product </button>

        <?php echo form_close(); ?>
        
    </div>
</main>
<script>
CKEDITOR.replace( 'description' );
</script>