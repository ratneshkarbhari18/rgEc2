<style>
    header,footer{
        display: none;
    }
</style>
<main class="page-content" id="admin-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            <div class="col-lg-4 col-md-12 col-sm-12">

                <div class="text-center">
                    <h1 class="page-title"><?php echo $title; ?></h1>
                    <p class="text-danger" id="errorMessage"><?php  echo $error; ?></p>
                </div>

                <?php
                    echo form_open(site_url("admin-login-exe"),'id="adminLogin"');
                ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                <?php 
                    echo form_close();  
                ?>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
        </div>
    </div>
</main>
<?php foreach($scripts as $script): ?>
<script src="<?php echo site_url($script); ?>"></script>
<?php endforeach; ?>
<style>
    div#popup-9,div.modal-backdrop.fade.show{
        display: none !important;
    }
</style>