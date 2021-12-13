
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">

<div class="container">


<h3 class="page-title"><?php echo $title; ?></h3>


    <div class="row text-center" style="margin: 3% 0;">
    
        <div class="col-lg-4 col-md-6 col-sm-12">
        
            <a href="<?php echo site_url('manage-orders'); ?>">
                <div class="card custom-card-dashboard">
                
                    <h2><?php echo $noOrders; ?></h2>
                    Orders
                
                </div>
            </a>
        
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
        
            <a href="<?php echo site_url('manage-customers'); ?>">
                <div class="card custom-card-dashboard">
                
                    <h2><?php echo $noCustomers; ?></h2>
                    Customers
                
                </div>
            </a>
        
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
        
            <a href="#">
                <div class="card custom-card-dashboard">
                
                    <h2>₹ <?php echo $total_revenue; ?></h2>
                    Revenue (INR)
                
                </div>
            </a>
        
        </div>

    </div>

    <div class="row text-center d-none" style="margin: 3% 0;">
    
        <div class="col-lg-4 col-md-6 col-sm-12">
        
            <a href="<?php echo site_url('manage-collections'); ?>">
                <div class="card custom-card-dashboard">
                
                    Collections
                
                </div>
            </a>
        
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="<?php echo site_url('manage-styles'); ?>">
                <div class="card custom-card-dashboard">
                
                    Styles
                
                </div>
            </a>
        
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <a href="<?php echo site_url('manage-products'); ?>">
                <div class="card custom-card-dashboard">
                
                    Products
                
                </div>
            </a>
        
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
        
            <a href="<?php echo site_url('manage-orders'); ?>">
                <div class="card custom-card-dashboard">
                
                    Orders
                
                </div>
            </a>
        
        </div>
    
    </div>

    <div class="container-fluid">
        <div id="sales_bar_graph"></div>

    </div>
    <br><br><br>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <h4 class="text-center">Orders by Country</h4>
            
            <div id="regions_div" class="w-100"></div>

        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Orders</h4>
                    <div class="saw-table__body sa-widget-table text-nowrap">
                        <table class="table-responsive bordered-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Status</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="app-order.html" class="text-reset">#00745</a></td>
                                    <td>
                                        <div class="d-flex fs-6"><div class="badge badge-sa-primary">Pending</div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div><a href="app-customer.html" class="text-reset">Giordano Bruno</a></div>
                                        </div>
                                    </td>
                                    <td>2020-11-02</td>
                                    <td>$2,742.00</td>
                                </tr>
                                <tr>
                                    <td><a href="app-order.html" class="text-reset">#00513</a></td>
                                    <td>
                                        <div class="d-flex fs-6"><div class="badge badge-sa-warning">Hold</div></div>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div><a href="app-customer.html" class="text-reset">Hans Weber</a></div>
                                        </div>
                                    </td>
                                    <td>2020-09-05</td>
                                    <td>$204.00</td>
                                </tr>
                                <tr>
                                    <td><a href="app-order.html" class="text-reset">#00507</a></td>
                                    <td>
                                        <div class="d-flex fs-6"><div class="badge badge-sa-primary">Pending</div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div><a href="app-customer.html" class="text-reset">Andrea Rossi</a></div>
                                        </div>
                                    </td>
                                    <td>2020-08-21</td>
                                    <td>$5,039.00</td>
                                </tr>
                                <tr>
                                    <td><a href="app-order.html" class="text-reset">#00104</a></td>
                                    <td>
                                        <div class="d-flex fs-6"><div class="badge badge-sa-danger">Canceled</div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div><a href="app-customer.html" class="text-reset">Richard Feynman</a></div>
                                        </div>
                                    </td>
                                    <td>2020-06-22</td>
                                    <td>$79.00</td>
                                </tr>
                                <tr>
                                    <td><a href="app-order.html" class="text-reset">#00097</a></td>
                                    <td>
                                        <div class="d-flex fs-6"><div class="badge badge-sa-success">Completed</div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div><a href="app-customer.html" class="text-reset">Leonardo Garcia</a></div>
                                        </div>
                                    </td>
                                    <td>2020-05-09</td>
                                    <td>$826.00</td>
                                </tr>
                                <tr>
                                    <td><a href="app-order.html" class="text-reset">#00082</a></td>
                                    <td>
                                        <div class="d-flex fs-6"><div class="badge badge-sa-success">Completed</div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div><a href="app-customer.html" class="text-reset">Nikola Tesla</a></div>
                                        </div>
                                    </td>
                                    <td>2020-04-27</td>
                                    <td>$1,052.00</td>
                                </tr>
                                <tr>
                                    <td><a href="app-order.html" class="text-reset">#00063</a></td>
                                    <td>
                                        <div class="d-flex fs-6"><div class="badge badge-sa-primary">Pending</div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div><a href="app-customer.html" class="text-reset">Marie Curie</a></div>
                                        </div>
                                    </td>
                                    <td>2020-02-09</td>
                                    <td>$441.00</td>
                                </tr>
                                <tr>
                                    <td><a href="app-order.html" class="text-reset">#00012</a></td>
                                    <td>
                                        <div class="d-flex fs-6"><div class="badge badge-sa-success">Completed</div></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div><a href="app-customer.html" class="text-reset">Konstantin Tsiolkovsky</a></div>
                                        </div>
                                    </td>
                                    <td>2020-01-01</td>
                                    <td>$12,961.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="report-box card d-none" style="margin: 2em 0;">
        <div class="card-body">
            <h4>Recent Reviews</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item py-2">
                    <div class="d-flex align-items-center py-3">
                        <a href="#" class="me-4">
                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg"><img src="https://www.jesalvora.com/assets/images/category_featured/331c75edf6dda86f20b8c50a728dbc7f.jpg" width="40" height="40" alt="" /></div>
                        </a>
                        <div class="d-flex align-items-center flex-grow-1 flex-wrap">
                            <div class="col">
                                <a href="#" class="text-reset fs-exact-14">Dress 1</a>
                                <div class="text-muted fs-exact-13">Reviewed by <a href="app-customer.html" class="text-reset">Ryan Ford</a></div>
                            </div>
                            <div class="col-12 col-sm-auto">
                                <div class="sa-rating ms-sm-3 my-2 my-sm-0" style="--sa-rating--value: 0.6;"><div class="sa-rating__body"></div></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item py-2">
                    <div class="d-flex align-items-center py-3">
                        <a href="#" class="me-4">
                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg"><img src="https://www.jesalvora.com/assets/images/category_featured/331c75edf6dda86f20b8c50a728dbc7f.jpg" width="40" height="40" alt="" /></div>
                        </a>
                        <div class="d-flex align-items-center flex-grow-1 flex-wrap">
                            <div class="col">
                                <a href="#" class="text-reset fs-exact-14">Dress 1</a>
                                <div class="text-muted fs-exact-13">Reviewed by <a href="app-customer.html" class="text-reset">Adam Taylor</a></div>
                            </div>
                            <div class="col-12 col-sm-auto">
                                <div class="sa-rating ms-sm-3 my-2 my-sm-0" style="--sa-rating--value: 0.8;"><div class="sa-rating__body"></div></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item py-2">
                    <div class="d-flex align-items-center py-3">
                        <a href="#" class="me-4">
                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg"><img src="https://www.jesalvora.com/assets/images/category_featured/331c75edf6dda86f20b8c50a728dbc7f.jpg" width="40" height="40" alt="" /></div>
                        </a>
                        <div class="d-flex align-items-center flex-grow-1 flex-wrap">
                            <div class="col">
                                <a href="#" class="text-reset fs-exact-14">Dress 1</a>
                                <div class="text-muted fs-exact-13">Reviewed by <a href="app-customer.html" class="text-reset">Jessica Moore</a></div>
                            </div>
                            <div class="col-12 col-sm-auto">
                                <div class="sa-rating ms-sm-3 my-2 my-sm-0" style="--sa-rating--value: 0.4;"><div class="sa-rating__body"></div></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item py-2">
                    <div class="d-flex align-items-center py-3">
                        <a href="#" class="me-4">
                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg"><img src="https://www.jesalvora.com/assets/images/category_featured/331c75edf6dda86f20b8c50a728dbc7f.jpg" width="40" height="40" alt="" /></div>
                        </a>
                        <div class="d-flex align-items-center flex-grow-1 flex-wrap">
                            <div class="col">
                                <a href="#" class="text-reset fs-exact-14">Dress 1</a>
                                <div class="text-muted fs-exact-13">Reviewed by <a href="app-customer.html" class="text-reset">Helena Garcia</a></div>
                            </div>
                            <div class="col-12 col-sm-auto">
                                <div class="sa-rating ms-sm-3 my-2 my-sm-0" style="--sa-rating--value: 0.6;"><div class="sa-rating__body"></div></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item py-2">
                    <div class="d-flex align-items-center py-3">
                        <a href="#" class="me-4">
                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg"><img src="https://www.jesalvora.com/assets/images/category_featured/331c75edf6dda86f20b8c50a728dbc7f.jpg" width="40" height="40" alt="" /></div>
                        </a>
                        <div class="d-flex align-items-center flex-grow-1 flex-wrap">
                            <div class="col">
                                <a href="#" class="text-reset fs-exact-14">Dress 1</a>
                                <div class="text-muted fs-exact-13">Reviewed by <a href="app-customer.html" class="text-reset">Ryan Ford</a></div>
                            </div>
                            <div class="col-12 col-sm-auto">
                                <div class="sa-rating ms-sm-3 my-2 my-sm-0" style="--sa-rating--value: 1;"><div class="sa-rating__body"></div></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item py-2">
                    <div class="d-flex align-items-center py-3">
                        <a href="#" class="me-4">
                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg"><img src="https://www.jesalvora.com/assets/images/category_featured/331c75edf6dda86f20b8c50a728dbc7f.jpg" width="40" height="40" alt="" /></div>
                        </a>
                        <div class="d-flex align-items-center flex-grow-1 flex-wrap">
                            <div class="col">
                                <a href="#" class="text-reset fs-exact-14">Dress 1</a>
                                <div class="text-muted fs-exact-13">Reviewed by <a href="app-customer.html" class="text-reset">Charlotte Jones</a></div>
                            </div>
                            <div class="col-12 col-sm-auto">
                                <div class="sa-rating ms-sm-3 my-2 my-sm-0" style="--sa-rating--value: 0.8;"><div class="sa-rating__body"></div></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>

</div>

</main>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<?php foreach($scripts as $script): ?>
<script src="<?php echo site_url($script); ?>"></script>
<?php endforeach; ?>