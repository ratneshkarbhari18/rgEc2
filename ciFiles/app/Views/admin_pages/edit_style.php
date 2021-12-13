<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h2 class="page-title"><?php echo $title; ?></h2>
        <p class="text-success darken-4"><?php echo $success; ?></p>
        <p class="text-danger darken-4"><?php echo $error; ?></p>

        <?php 
            $attributes = array("enctype"=>"multipart/form-data","method"=>"POST");
            echo form_open(site_url("update-style-exe"),$attributes);
        ?>

            <input type="hidden" name="style_id" value="<?php echo $styleFocus["id"]; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" value="<?php echo $styleFocus["title"]; ?>" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input class="form-control" value="<?php echo $styleFocus["slug"]; ?>" type="text" name="slug" id="slug">
            </div>
            <div class="form-group">
                <label>Parent Style</label>
                <br>
                <select class="form-control" name="parent">
                    <option value="0">Independent</option>
                    <?php foreach($styles as $style): ?>
                    <?php if($style["id"]!=$styleFocus["id"]): ?>
                    <option value="<?php echo $style['id']; ?>" <?php  if ($styleFocus["parent"]==$style["id"]) {
                        echo "selected";
                        } ?>><?php echo $style['title']; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Visibility</label>
                <br>
                <select class="form-control" name="visibility">
                    <option value="visible" <?php  if ($styleFocus["visibility"]=="visible") {
                        echo "selected";
                    } ?>>Visible</option>
                    <option value="hidden" <?php  if ($styleFocus["visibility"]=="hidden") {
                        echo "selected";
                    } ?>>Hidden</option>
                </select>
            </div>
            <br>
            <img src="<?php echo site_url("assets/images/style_featured_images/".$styleFocus["featured_image"]); ?>" class="w-25">
            <br>
            <div class="form-group">
                <label for="featured_image">Featured Image</label><br>
                <input type="file" name="featured_image" id="featured_image" accept="image/*">
            </div>
            <br>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?php echo $styleFocus["description"] ?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success"> Update Style </button>

        <?php echo form_close();  ?>
        
    </div>
</main>