<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger" id="dangerNotice"><?php echo $error; ?></p>
    
        <p class="text-success" id="ajaxSuccess"><?php echo $success; ?></p>

        <?php
            $attributes = array('enctype' => "multipart/form-data","method"=>"POST");
            echo form_open(site_url('add-slide-exe'),$attributes);

        ?>
            <div class="form-group">
                <label for="link">Link</label>
                <input class="form-control" type="text" name="link" id="link">
            </div>
            <div class="form-group">
                <label for="desktop_image">Desktop Image</label>
                <input class="form-control" type="file" name="desktop_image" id="desktop_image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="touch_image">Touch Image</label>
                <input class="form-control" type="file" name="touch_image" id="touch_image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="visible">Visible</label>
                <select name="visible" id="visible" class="form-control">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Add Slide</button>
        <?php echo form_close(); ?>


        <div class="items-container">
        
        
        <?php if(count($slides)>0): ?>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td style="font-size: 1.2rem; font-weight: 500;">Link</td>
                            <td font-weight: 500;">Position</td>
                            <td style="font-size: 1.2rem; font-weight: 500;">Image Desktop</td>
                            <td style="font-size: 1.2rem; font-weight: 500;">Image Touch</td>
                            <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($slides as $slide): ?>
                        <tr>
                            <td><?php echo $slide['link']; ?></td>
                            <td>
                                <?php echo form_open("change-slide-position",array("id"=>"slide-pos-update-form-".$slide["id"])); ?>
                                <input type="hidden" name="slideId" value="<?php echo $slide["id"]; ?>">
                                <input type="hidden" name="prevPos" value="<?php echo $slide["position"]; ?>">
                                <input type="number" id="pos" value="<?php echo $slide["position"]; ?>" name="pos">
                                <button type="submit" class="btn btn-success">update position</button>
                                <?php echo form_close(); ?>
                               
                            </td>
                            <td><?php echo site_url('assets/images/slider_images/'.$slide['desktop_image']); ?></td>
                            <td><?php echo site_url('assets/images/slider_images/'.$slide['touch_image']); ?></td>
                            <td>
                                <a href="#" class="modal-trigger btn btn-primary" data-toggle="modal" data-target="#edit-slide-<?php echo $slide["id"]; ?>" class="btn btn-primary">Edit</a>
                                <div class="modal fade" id="edit-slide-<?php echo $slide["id"]; ?>">
                                
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addcouponModalLabel">Edit Slide</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <?php
                                                $attributes = array('enctype' => "multipart/form-data","method"=>"POST");
                                                echo form_open(site_url('update-slide-exe'),$attributes);

                                            ?>  
                                                <input type="hidden" name="id" value="<?php echo $slide["id"]; ?>">
                                                <div class="form-group">
                                                    <label for="link">Link</label>
                                                    <input class="form-control" type="text" name="link" id="link" value="<?php echo $slide["link"]; ?>">
                                                </div>
                                                <img src="<?php echo site_url("assets/images/slider_images/".$slide["desktop_image"]); ?>" style="width: 20%;">
                                                <div class="form-group">
                                                    <label for="desktop_image">Desktop Image</label>
                                                    <input class="form-control" type="file" name="desktop_image" id="desktop_image" accept="image/*">
                                                </div>
                                                <img src="<?php echo site_url("assets/images/slider_images/".$slide["touch_image"]); ?>" style="width: 20%;">
                                                <div class="form-group">
                                                    <label for="touch_image">Touch Image</label>
                                                    <input class="form-control" type="file" name="touch_image" id="touch_image" accept="image/*">
                                                </div>
                                                <div class="form-group">
                                                    <label for="visible">Visible</label>
                                                    <select name="visible" id="visible" class="form-control">
                                                        <option value="yes" <?php if($slide["visibility"]=="yes"){
                                                            echo "selected";
                                                        } ?>>Yes</option>
                                                        <option value="no" <?php if($slide["visibility"]=="no"){
                                                            echo "selected";
                                                        } ?>>No</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-success">Update Slide</button>
                                            <?php echo form_close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                                <?php  $attributes = array('method' => "POST");
                                    echo form_open(site_url('delete-slide-exe'),$attributes);
                                ?>
                                    <input type="hidden" name="id" value="<?php echo $slide['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                <?php echo form_close(); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php else: ?>

            <h6>No Slides Added</h6>

        <?php endif; ?>

        </div>


    </div>
</main>