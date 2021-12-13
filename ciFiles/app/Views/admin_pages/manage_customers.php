<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>


        <?php echo form_open(site_url("search-customer-exe")); ?>
            <div class="form-group">
                <input type="search" placeholder="Search customer by name or email" name="customer-search-query" class="form-control" id="customer-search-query">
            </div>
        <?php echo form_close(); ?>

        <div class="items-container text-center" id="items-container">
            <?php if(count($customers)>0): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align: left;">
                                <td style="font-size: 1.2rem; font-weight: 500;">Name</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Email</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($customers as $customer): ?>
                            <tr style="text-align: left;">
                                <td><?php echo $customer['first_name'].' '.$customer["last_name"]; ?></td>
                                
                                <td><?php echo $customer['email']; ?></td>
                                
                                <td>
                                    <a target="_blank" href="<?php echo site_url("customer-details/".$customer["id"]) ?>" class="btn btn-primary">Details</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>


    </div>
</main>
