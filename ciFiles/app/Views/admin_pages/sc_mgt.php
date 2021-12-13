<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addcouponModal">
            + shipping class
        </button>
        <div class="modal fade" id="addcouponModal"  tabindex="-1" aria-labelledby="addcouponModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addcouponModalLabel">Add New Shipping Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('method' => "POST","enctype"=>"multipart/form-data" ); echo form_open(site_url("add-sc-exe"),$attributes); ?>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="weight_min">Min Weight (gms.)</label>
                                <input type="text" class="form-control" name="weight_min" id="weight_min">
                            </div>
                            <div class="form-group">
                                <label for="weight_max">Max Weight (gms.)</label>
                                <input type="text" class="form-control" name="weight_max" id="weight_max">
                            </div>
                            <div class="form-group">
                                <label for="domestic_international">Domestic/International</label>
                                <select name="domestic_international" class="form-control" id="domestic_international">
                                    <option value="domestic">Domestic</option>
                                    <option value="international">International</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="shipping_charge_regular">Shipping Charge Regular (₹)</label>
                                <input type="text" class="form-control" name="shipping_charge_regular" id="shipping_charge_regular">
                            </div>

                            <div class="form-group">
                                <label for="shipping_charge_express">Shipping Charge Express (₹)</label>
                                <input type="text" class="form-control" name="shipping_charge_express" id="shipping_charge_express">
                            </div>
                            <button type="submit" class="btn btn-success">Add Shipping Class</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="items-container text-center" id="items-container">
            <?php if(count($scs)>0): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align: left;">
                                <td style="font-size: 1.1rem; font-weight: 500;">Title</td>
                                <td style="font-size: 1.1rem; font-weight: 500;">Min Weight (gms.)</td>
                                <td style="font-size: 1.1rem; font-weight: 500;">Max Weight (gms.)</td>
                                <td style="font-size: 1.1rem; font-weight: 500;">International / Domestic</td>
                                <td style="font-size: 1.1rem; font-weight: 500;">Shipping Charge Regular (₹)</td>
                                <td style="font-size: 1.1rem; font-weight: 500;">Shipping Charge Express (₹)</td>
                                <td style="font-size: 1.1rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($scs as $sc): ?>
                            <tr style="text-align: left;">
                                <td><?php echo $sc["title"]; ?></td>
                                <td><?php echo $sc["weight_min"]; ?></td>
                                <td><?php echo $sc["weight_max"]; ?></td>
                                <td><?php echo $sc["domestic_international"]; ?></td>
                                <td><?php echo $sc["shipping_charge_regular"]; ?></td>
                                <td><?php echo $sc["shipping_charge_express"]; ?></td>
                                <td>
                                    <?php $attributes = array("class"=>"d-inline"); echo form_open(site_url("delete-sc-exe"),$attributes);  ?>
                                        <input type="hidden" name="id" value="<?php echo $sc['id']; ?>">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    <?php echo form_close();  ?>
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
