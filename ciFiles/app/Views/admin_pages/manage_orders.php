<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">

        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>

        <p class="text-success"><?php echo $success; ?></p>



        <div class="items-container">


            <?php if (count($orders) > 0) : ?>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td style="font-size: 1.2rem; font-weight: 500;">Order Id</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Amount</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Customer Details</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Status</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?php echo $order['public_order_id']; ?></td>

                                    <td><?php echo $order['amount_paid'] . ' ' . $order['currency']; ?></td>
                                    <td>
                                        <?php $customerData = json_decode($order["customer_details"], TRUE);
                                        foreach ($customerData as $cd) :  ?>
                                            <?php

                                            echo $cd . '<br>';

                                            ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td><?php echo $order["status"]; ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#manageOrderModal-<?php echo $order["id"]; ?>" class="btn btn-primary">VIEW DETAILS</a>
                                        <div class="modal fade" id="manageOrderModal-<?php echo $order["id"];  ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title d-inline" id="staticBackdropLabel">Manage Order</h4>

                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $order["public_order_id"] . '<br>'; ?>
                                                        <?php $customerData = json_decode($order["customer_details"], TRUE);
                                                        foreach ($customerData as $cd) :  ?>
                                                            <?php

                                                            echo $cd . '<br>';

                                                            ?>
                                                        <?php endforeach; ?>
                                                        <p>STATUS: <?php echo $order["status"]; ?></p>

                                                        <!-- <a class="btn btn-primary d-none" target="_blank" href="<?php echo site_url("download-order-slip/" . $order["public_order_id"]); ?>">download Order Slip</a> -->


                                                        <h4>Items:</h4>
                                                        <?php $orderDetails = json_decode($order["order_details"], TRUE);
                                                        foreach ($orderDetails as $od) : ?>
                                                            <?php foreach ($products as $product) : if ($od["product_id"] == $product['id']) : ?>
                                                                    <p style="font-weight: bold;">Title: <?php echo $product["title"]; ?></p>
                                                                    <p>Stitching: <?php echo $od["stitching"]; ?></p>
                                                                    <p>Size: <?php echo $od["size"]; ?></p>
                                                                    <p>Quantity: <?php echo $od["quantity"]; ?></p>
                                                            <?php endif;
                                                            endforeach; ?>
                                                        <?php endforeach; ?>


                                                        <?php echo form_open("change-order-status-exe"); ?>

                                                        <input type="hidden" name="order_id" value="<?php echo $order["id"]; ?>">

                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="created" <?php if ($order["status"] == "created") {
                                                                                            echo "selected";
                                                                                        } ?>>Created</option>
                                                                <option value="processing" <?php if ($order["status"] == "processing") {
                                                                                                echo "selected";
                                                                                            } ?>>Processing</option>
                                                                <option value="shipped" <?php if ($order["status"] == "shipped") {
                                                                                                echo "selected";
                                                                                            } ?>>Shipped</option>
                                                                <option value="fulfilled" <?php if ($order["status"] == "fulfilled") {
                                                                                                echo "selected";
                                                                                            } ?>>Fulfilled</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="send_notif">Send Notification to customer?</label>
                                                            <select name="send_notif" class="form-control" id="send_notif">
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="awb_no">AWB No.</label>
                                                            <input type="text" class="form-control" name="awb_no" id="awb_no">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="shipped_by">Shipped by</label>
                                                            <input type="text" class="form-control" name="shipped_by" id="shipped_by">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="status_details">Details</label>
                                                            <textarea name="status_details" id="status_details" class="form-control"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">UPDATE STATUS</button>
                                                        <?php echo form_close(); ?>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else : ?>

                <h6>No Orders Recieved</h6>

            <?php endif; ?>

        </div>


    </div>
</main>