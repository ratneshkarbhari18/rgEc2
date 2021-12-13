<main class="page-content" id="my-account" style="padding: 5% 0 10% 0;">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item w-100" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item w-100" role="presentation">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
                    </li>
                    <li class="nav-item w-100" role="presentation">
                        <a class="nav-link active" id="wishlist-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="false">Wishlist</a>
                    </li>

                </ul>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="home-tab">
                        <h4>Update Profile</h4>
                        <?php echo form_open("update-profile-exe"); ?>
                            <input type="hidden" name="id" value="<?php echo session("id"); ?>">

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control" value="<?php echo session("first_name"); ?>" type="text" name="first_name" id="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" value="<?php echo session("last_name"); ?>" type="text" name="last_name" id="last_name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" value="<?php echo session("email"); ?>" type="email" name="email" id="email">
                            </div>
                            <button type="submit" class="btn btn-success">UPDATE</button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h4>Orders</h4>
                        <div class="table-responsive">
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                    
                                        <td>Order ID</td>
                                        <td>Date Placed</td>
                                        <td>Status</td>
                                        <td>View More</td>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($orders)): foreach($orders as $order): 
                                    ?>

                                    <tr>
                                        <td><?php echo $order['public_order_id']; ?></td>
                                        <td><?php echo $order['date']; ?></td>
                                        <td><?php echo $order['status']; ?></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#orderDetail-<?php echo $order['public_order_id']; ?>" style="color: #c09578;">View More</a>
                                            <div class="modal fade" id="orderDetail-<?php echo $order['public_order_id']; ?>">
                                            
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Order Id: <?php echo $order['public_order_id']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Date: <?php echo $order['date']; ?></h5>
                                                            <h5>Status: <?php echo $order['status']; ?></h5>

                                                            <h4>Items:</h4>
                                                            <?php $orderDetails = json_decode($order["order_details"],TRUE); foreach($orderDetails as $od): ?>
                                                                <?php foreach($products as $product): if($od["product_id"]==$product['id']): ?>
                                                                    <p style="font-weight: bold;">Title: <?php echo $product["title"]; ?></p>
                                                                    <p>Stitching: <?php echo $od["stitching"]; ?></p>
                                                                    <p>Size: <?php echo $od["size"]; ?></p>
                                                                    <p>Quantity: <?php echo $od["quantity"]; ?></p>
                                                                <?php endif; endforeach; ?>
                                                            <?php endforeach; ?>

                                                        </div>
                                                        <!-- <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div> -->
                                                    </div>
                                                </div>

                                            
                                            </div>
                                        </td>
                                    </tr>    

                                    <?php endforeach; else: ?>

                                    <h4>Your have no past Orders <a style="color: #c09578 !important;" href="<?php echo site_url('shop'); ?>">go back to the shop</a> and get a lil something for you.</h4>

                                    <?php endif; ?>
                                
                                </tbody>

                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                        <h4>Wishlist</h4>
                        <?php if(!is_array($wishlist_items)): ?>
                            <h4>No Items in wishlist</h4>
                        <?php else: ?>
                            <ul class="list-group">
                            <?php foreach($wishlist_items as $wlItem): foreach($allProducts as $pr): if ($pr['id']==$wlItem["pid"]): ?>
                                <a href="<?php echo site_url("product/".$pr["slug"]); ?>">
                                <li class="list-group-item container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-12 col-sm-12">
                                            <img src="<?php echo site_url("assets/images/featured_image_product/".$pr['featured_image']); ?>" style="width: 50px; height: 50px;">
                                        </div>
                                        <div class="col-lg-8 col-md-12 col-sm-12">
                                            <h4><?php echo $pr["title"]; ?></h4>
                                            <p><?php echo $_COOKIE["currency_symbol"]." ".$pr["sale_price"]; ?> | <del><?php echo $_COOKIE["currency_symbol"]." ".$pr["price"]; ?></del></p>
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-sm-12">
                                            <?php echo form_open("delete-from-wishlist-exe"); ?>
                                            <input type="hidden" name="id" value="<?php echo $wlItem["id"]; ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </li>
                                </a>
                            <?php endif; endforeach; endforeach; ?>
                            </ul>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
a.nav-link.active{
    color: #ffffff !important;
    background-color: black !important;
}
</style>