<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h2 class="page-title"><?php echo $title; ?></h2>
        <p class="text-success darken-4"><?php echo $success; ?></p>
        <p class="text-danger darken-4"><?php echo $error; ?></p>

        <?php 
            $attributes = array("enctype"=>"multipart/form-data","method"=>"POST");
            echo form_open(site_url("update-collection-exe"),$attributes);
        ?>  

            <input type="hidden" name="collection_id" value="<?php echo $collectionFocus["id"]; ?>">


            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" value="<?php echo $collectionFocus["title"]; ?>" type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input class="form-control" value="<?php echo $collectionFocus["slug"]; ?>" type="text" name="slug" id="slug">
            </div>
            <div class="form-group">
                <label>Parent Collection</label>
                <br>
                <select class="form-control" name="parent">
                    <option value="0" selected>Independent</option>
                    <?php foreach($collections as $collection): ?>
                        <?php if($collection["id"]!=$collectionFocus["id"]): ?>

                        <option value="<?php echo $collection['id']; ?>" <?php  if ($collectionFocus["parent"]==$collection["id"]) {
                        echo "selected";
                        } ?>><?php echo $collection['title']; ?></option>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Visibility</label>
                <br>
                <select class="form-control" name="visibility">
                    <option value="visible"  <?php  if ($collectionFocus["visibility"]=="visible") {
                        echo "selected";
                    } ?>>Visible</option>
                    <option value="hidden" <?php  if ($collectionFocus["visibility"]=="hidden") {
                        echo "selected";
                    } ?>>Hidden</option>
                </select>
            </div>
            <br>
            <img src="<?php echo site_url("assets/images/collection_featured_images/".$collectionFocus["featured_image"]); ?>" class="w-25">
            <br>
            <div class="form-group">
                <label for="featured_image">Featured Image</label><br>
                <input type="file" name="featured_image" id="featured_image" accept="image/*">
            </div>
            <br>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?php echo $collectionFocus["description"]; ?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success"> Update Collection </button>

        <?php echo form_close();  ?>
        
    </div>
</main>