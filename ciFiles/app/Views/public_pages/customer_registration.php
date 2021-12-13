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
                    echo form_open(site_url("customer-register-exe"),'id="customerRegister"');
                    ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control" type="first_name" name="first_name" id="first_name">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input class="form-control" type="last_name" name="last_name" id="last_name">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Send Verification Code</button>
                <?php 
                    echo form_close();  
                ?>

                <?php
                    $attributes = array('id' => "verifyCode","class"=>"d-none" );
                    echo form_open(site_url("verifiy-email-exe"),$attributes);
                    ?>
                    <div class="form-group">
                        <label for="verification_code">Enter Verification Code</label>
                        <input class="form-control" type="text" name="verification_code" id="verification_code">
                    </div>
                    <input type="hidden" name="successUrl" value="<?php echo site_url(); ?>">
                    
                    <button type="submit" class="btn btn-primary btn-block">Verify Code</button>
                <?php 
                    echo form_close();  
                ?>

                <?php
                    $attributes = array('id' => "setPasswordCreateAccountForm", "class"=> "d-none");
                    echo form_open(site_url("set-password-create-account"),$attributes);
                ?>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control pwdField" type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="repeat_password">Repeat Password</label>
                        <input class="form-control pwdField" type="password" name="repeat_password" id="repeat_password">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="showPwd">
                        <label class="form-check-label" for="showPwd">
                            Show Password
                        </label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Set Password and Create Account</button>

                <?php echo form_close(); ?>

                <div class="text-center" style="margin: 2em 0 0 0;">
                    <h4>OR</h4>
                    <a style="text-decoration: underline; color: #d10762; font-size: 1.6em;" href="<?php echo site_url("login"); ?>">Login Here</a>
                </div>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
        </div>
    </div>
</main>
<input type="hidden" name="homePageUrl" value="<?php echo site_url(); ?>">
<?php foreach($scripts as $script): ?>
<script src="<?php echo site_url($script); ?>"></script>
<?php endforeach; ?>