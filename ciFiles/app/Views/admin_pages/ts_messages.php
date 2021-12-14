<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>


        <?php echo form_open("update-ts-messages"); ?>

            <div class="form-group">
                <label for="tsMessages">Update top Strip Messages separated by ,</label>
                <input type="text" name="tsMessages" value="<?php echo $tsMessages[0]["messages"]; ?>" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Update</button>

        <?php echo form_close(); ?>

    </div>
</main>
