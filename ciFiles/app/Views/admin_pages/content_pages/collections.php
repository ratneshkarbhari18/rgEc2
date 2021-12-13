<?php if(count($collections)>0): ?>

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
            <?php foreach($collections as $collection): ?>
            <tr style="text-align: left;">
                <td><?php echo $collection['title']; ?></td>
                
                <td><?php echo $collection['description']; ?></td>
                <td>
                    <a class="btn btn-primary" href="<?php echo site_url('edit-collection/'.$collection['slug']); ?>">Edit</a>
                    <?php $attributes = array("class"=>"d-inline"); echo form_open(site_url("delete-collection-exe"),$attributes);  ?>
                        <input type="hidden" name="id" value="<?php echo $collection['id']; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    <?php echo form_close();  ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php else: ?>

<h6>No collections Added</h6>

<?php endif; ?>
