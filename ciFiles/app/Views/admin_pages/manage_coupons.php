<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addcouponModal">
            + coupon
        </button>
        <div class="modal fade" id="addcouponModal"  tabindex="-1" aria-labelledby="addcouponModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addcouponModalLabel">Add New coupon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('method' => "POST","enctype"=>"multipart/form-data" ); echo form_open(site_url("add-coupon-exe"),$attributes); ?>
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" name="code" id="code">
                            </div>
                            <div class="form-group">
                                <label for="value">Value (Percentage off 0 to 100)</label>
                                <input type="text" class="form-control" name="value" id="value">
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="text" placeholder="<?php echo date("d-m-Y"); ?>" class="form-control" name="start_date" id="start_date">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="text" placeholder="<?php echo date("d-m-Y"); ?>" class="form-control" name="end_date" id="end_date">
                            </div>
                            <button type="submit" class="btn btn-success">Add coupon</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="items-container text-center" id="items-container">
            <?php if(count($coupons)>0): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align: left;">
                                <td style="font-size: 1.2rem; font-weight: 500;">Title</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Code</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">% off</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($coupons as $coupon): ?>
                            <tr style="text-align: left;">
                                <td><?php echo $coupon['title']; ?></td>
                                
                                <td><?php echo $coupon['code']; ?></td>
                                <td><?php echo $coupon['value']; ?></td>
                                
                                <td>
                                    <a href="#" class="btn btn-primary modal-trigger" data-toggle="modal" data-target="#editcouponModal-<?php echo $coupon["id"]; ?>">Edit</a>
                                    <div class="modal fade" id="editcouponModal-<?php echo $coupon["id"]; ?>"  tabindex="-1" aria-labelledby="addcouponModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addcouponModalLabel">Edit coupon</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php $attributes = array('method' => "POST","enctype"=>"multipart/form-data" ); echo form_open(site_url("update-coupon-exe"),$attributes); ?>
                                                        <input type="hidden" name="id" value="<?php echo $coupon["id"]; ?>">
                                                        <div class="form-group">
                                                            <label for="title">Name</label>
                                                            <input type="text" class="form-control" name="title" id="title" value="<?php echo $coupon["title"]; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="code">Code</label>
                                                            <input type="text" class="form-control" name="code" id="code" value="<?php echo $coupon["code"]; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="value">Value (Percentage off 0 to 100)</label>
                                                            <input type="text" class="form-control" name="value" id="value" value="<?php echo $coupon["value"]; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="start_date">Start Date</label>
                                                            <input type="text" placeholder="<?php echo date("d-m-Y"); ?>" value="<?php echo $coupon["start_date"]; ?>"  class="form-control" name="start_date" id="start_date">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="end_date">End Date</label>
                                                            <input type="text" placeholder="<?php echo date("d-m-Y"); ?>" value="<?php echo $coupon["end_date"]; ?>" class="form-control" name="end_date" id="end_date">
                                                        </div>
                                                        <button type="submit" class="btn btn-success">UPDATE coupon</button>
                                                    <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $attributes = array("class"=>"d-inline"); echo form_open(site_url("delete-coupon-exe"),$attributes);  ?>
                                        <input type="hidden" name="id" value="<?php echo $coupon['id']; ?>">
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
