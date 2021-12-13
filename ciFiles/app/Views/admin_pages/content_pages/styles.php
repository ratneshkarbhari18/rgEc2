<?php if(count($styles)>0): ?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr style="text-align: left;">
                <td style="font-size: 1.2rem; font-weight: 500;">Title</td>
                <td style="font-size: 1.2rem; font-weight: 500;">Description</td>
                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($styles as $style): ?>
            <tr style="text-align: left;">
                <td><?php echo $style['title']; ?></td>
                
                <td><?php echo $style['description']; ?></td>
                <td>
                    <a class="btn btn-primary" href="<?php echo site_url('edit-style/'.$style['slug']); ?>">Edit</a>
                    <?php $attributes = array("class"=>"d-inline"); echo form_open(site_url("delete-style-exe"),$attributes);  ?>
                        <input type="hidden" name="id" value="<?php echo $style['id']; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    <?php echo form_close();  ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php else: ?>

<h6>No styles Added</h6>

<?php endif; ?>
