<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>


        <div class="items-container text-center" id="items-container">
            <?php if(count($email_signups)>0): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align: left;">
                                <td style="font-size: 1.2rem; font-weight: 500;">Email</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($email_signups as $email_signup): ?>
                            <tr style="text-align: left;">
                                <td><?php echo $coupon['email']; ?></td>
                                
                                <td>
                                    <?php $attributes = array("class"=>"d-inline"); echo form_open(site_url("delete-es"),$attributes);  ?>
                                        <input type="hidden" name="id" value="<?php echo $coupon['id']; ?>">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    <?php echo form_close();  ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
            
                <h4>No Email signups</h4>

            <?php endif; ?>
        </div>


    </div>
</main>
