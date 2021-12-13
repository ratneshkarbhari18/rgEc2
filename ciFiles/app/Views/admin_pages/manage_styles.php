<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>

        <a href="<?php echo site_url('add-style'); ?>" class="btn btn-success">+ Add Style</a>

        <input type="hidden" id="fetchStylesUrl" value="<?php echo $fetchStylesUrl; ?>">


        <div class="items-container text-center" id="items-container">
        
            <h2>Loading...</h2>

        </div>


    </div>
</main>

<?php foreach($scripts as $script): ?>
<script src="<?php echo site_url($script); ?>"></script>
<?php endforeach; ?>