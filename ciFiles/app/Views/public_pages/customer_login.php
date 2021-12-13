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
                    echo form_open(site_url("customer-login-exe"),'id="customerLogin"');
                    ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <small id="forgotPwdLink" style="position: absolute; right: 2em;"><a href="<?php echo site_url("forgot-password"); ?>">Forgot Password?</a></small>
                        <input class="form-control pwdField" type="password" name="password" id="password">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="showPwd">
                        <label class="form-check-label" for="showPwd">
                            Show Password
                        </label>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                <?php 
                    echo form_close();  
                ?>

                <div class="text-center" style="margin: 2em 0 0 0;">
                    <h4>OR</h4>
                    <a style="text-decoration: underline; color: #d10762; font-size: 1.6em;" href="<?php echo site_url("register"); ?>">Register Here</a>
                </div>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
        </div>
    </div>
</main>
<?php foreach($scripts as $script): ?>
<script src="<?php echo site_url($script); ?>"></script>
<?php endforeach; ?>