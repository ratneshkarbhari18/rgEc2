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
                        <h5 class="modal-title" id="addcouponModalLabel">Add New POPUP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('method' => "POST","enctype"=>"multipart/form-data" ); echo form_open(site_url("add-popup-exe"),$attributes); ?>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <h5>OPTIONS</h5>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" id="link">
                            </div>
                            <div class="form-group">
                                <label for="value">Image</label>
                                <input type="file" name="image" id="image" accept="image/*">
                            </div>
                            <h5>or</h5>
                            <div class="form-group">
                                <label for="youtube_link">Youtube Video</label>
                                <textarea  class="form-control" name="youtube_link" id="youtube_link"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="trigger_timeout">Trigger Timeout (in seconds)</label>
                                <input type="text" class="form-control" value="5" name="trigger_timeout" id="trigger_timeout">
                            </div>

                            <div class="form-group">
                                <label for="has_form">Has Form?</label>
                                <select name="has_form" id="has_form" class="form-control">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>

                            <h5>FORM FIELDS</h5>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="form_field1">Full Name</label>
                                <input type="checkbox" name="form_fields[]" value="full_name" id="form_fields1" class="form-check-input">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="form_field3">Email</label>
                                <input type="checkbox" name="form_fields[]" value="email" id="form_fields3" class="form-check-input">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="form_field4">Mobile Number</label>
                                <input type="checkbox" name="form_fields[]" value="mobile_number" id="form_fields4" class="form-check-input">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <label for="visible">Visible</label>
                                <select name="visible" id="visible" class="form-control">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Add Popup</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="items-container text-center" id="items-container">
            <?php if(count($popups)>0): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align: left;">
                                <td style="font-size: 1.2rem; font-weight: 500;">Title</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Image</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Link</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Timeout (s)</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($popups as $popup): ?>
                            <tr style="text-align: left;">
                                <td><?php echo $popup['title']; ?></td>
                                
                                <td><a href="<?php echo site_url("assets/images/popupImages/".$popup['image']); ?>" download>Download</a></td>
                                <td><a href="<?php echo $popup['link']; ?>" target="_blank">Link</a></td>
                                <td><?php echo $popup["trigger_timeout"]; ?> s</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#updateCouponModal" class="btn btn-primary modal-trigger">
                                        EDIT
                                    </a>
                                    <div class="modal fade" id="updateCouponModal"  tabindex="-1" aria-labelledby="updateCouponModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateCouponModalLabel">Update POPUP</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php $attributes = array('method' => "POST","enctype"=>"multipart/form-data" ); echo form_open(site_url("update-popup-exe"),$attributes); ?>
                                                        <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input type="text" class="form-control" name="title" value="<?php echo $popup["title"]; ?>" id="title">
                                                        </div>
                                                        <h5>OPTIONS</h5>
                                                        <div class="form-group">
                                                            <label for="link">Link</label>
                                                            <input type="text" class="form-control" name="link" id="link" value="<?php echo $popup["link"]; ?>">
                                                        </div>
                                                        <img src="<?php echo site_url("assets/images/popupImages/".$popup["image"]); ?>" style="width: 20px; height: 20px;">
                                                        <div class="form-group">
                                                            <label for="value">Image</label>
                                                            <input type="file" name="image" id="image" accept="image/*">
                                                        </div>
                                                        <h5>or</h5>
                                                        <div class="form-group">
                                                            <label for="youtube_link">Youtube Video</label>
                                                            <textarea  class="form-control" name="youtube_link" id="youtube_link"><?php echo $popup["youtube_embed_code"] ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="trigger_timeout">Trigger Timeout (in seconds)</label>
                                                            <input type="text" class="form-control" value="5" name="trigger_timeout" value="<?php echo $popup["trigger_timeout"]; ?>" id="trigger_timeout">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="has_form">Has Form?</label>
                                                            <select name="has_form" id="has_form" class="form-control">
                                                                <option <?php if($popup["has_form"]=="no"){
                                                                    echo "selected";
                                                                } ?> value="no">No</option>
                                                                <option <?php if($popup["has_form"]=="yes"){
                                                                    echo "selected";
                                                                } ?> value="yes">Yes</option>
                                                            </select>
                                                        </div>

                                                        <h5>FORM FIELDS</h5>

                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label" for="form_field1">Full Name</label>
                                                            <input <?php if(in_array("full_name",explode(",",$popup["form_fields"]))){
                                                                echo "checked";
                                                            } ?> type="checkbox" name="form_fields[]" value="full_name" id="form_fields1" class="form-check-input">
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label" for="form_field3">Email</label>
                                                            <input <?php if(in_array("email",explode(",",$popup["form_fields"]))){
                                                                echo "checked";
                                                            } ?> type="checkbox" name="form_fields[]" value="email" id="form_fields3" class="form-check-input">
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label" for="form_field4">Mobile Number</label>
                                                            <input <?php if(in_array("mobile_number",explode(",",$popup["form_fields"]))){
                                                                echo "checked";
                                                            } ?> type="checkbox" name="form_fields[]" value="mobile_number" id="form_fields4" class="form-check-input">
                                                        </div>
                                                        <br><br>
                                                        <div class="form-group">
                                                            <label for="visible">Visible</label>
                                                            <select name="visible" id="visible" class="form-control">
                                                                <option value="no" <?php if($popup["visible"]=="no"){echo "selected";} ?>>No</option>
                                                                <option value="yes" <?php if($popup["visible"]=="yes"){echo "selected";} ?>>Yes</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">update Popup</button>
                                                    <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $attributes = array("class"=>"d-inline"); echo form_open(site_url("delete-popup-exe"),$attributes);  ?>
                                        <input type="hidden" name="id" value="<?php echo $popup['id']; ?>">
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
