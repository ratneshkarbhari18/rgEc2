<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTestimonialModal">
            + Testimonial
        </button>
        <div class="modal fade" id="addTestimonialModal"  tabindex="-1" aria-labelledby="addTestimonialModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTestimonialModalLabel">Add New Testimonial</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('method' => "POST","enctype"=>"multipart/form-data" ); echo form_open(site_url("add-testimonial-exe"),$attributes); ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="testimonial">Testimonial</label>
                                <textarea class="form-control" name="testimonial" id="testimonial"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mugshot">Display Picture</label>
                                <input type="file" name="mugshot" id="mugshot">
                            </div>
                            <button type="submit" class="btn btn-success">Add Testimonial</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="items-container text-center" id="items-container">
            <?php if(count($testimonials)>0): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align: left;">
                                <td style="font-size: 1.2rem; font-weight: 500;">Name</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Testimonial</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Image</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($testimonials as $testimonial): ?>
                            <tr style="text-align: left;">
                                <td><?php echo $testimonial['name']; ?></td>
                                
                                <td><?php echo $testimonial['testimonial']; ?></td>
                                <td>
                                    <img src="<?php echo site_url("assets/images/testimonial_images/".$testimonial["mugshot"]) ?>" style="width: 50px; height: 50px;">
                                </td>
                                <td>
                                    <?php $attributes = array("class"=>"d-inline"); echo form_open(site_url("delete-testimonial-exe"),$attributes);  ?>
                                        <input type="hidden" name="id" value="<?php echo $testimonial['id']; ?>">
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
