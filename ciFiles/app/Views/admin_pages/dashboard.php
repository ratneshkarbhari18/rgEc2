<script src="https://www.gstatic.com/charts/loader.js"></script>

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
    
    <?php
        $monthlySales = array(
            "Jan" => 0,
            "Feb" => 0,
            "Mar" => 0,
            "Apr" => 0,
            "May" => 0,
            "Jun" => 0,
            "Jul" => 0,
            "Aug" => 0,
            "Sep" => 0,
            "Oct" => 0,
            "Nov" => 0,
            "Dec" => 0,
        );

        foreach($orders as $order){
            $date =  explode(" ",$order["date"])[0];
            $monthKey = explode("-",$date)[1];
            $sale = $order["amount_paid"];
            $monthlySales[$monthKey]=$monthlySales[$monthKey]+$sale;
        }
        
        ?>
    <script>
        google.charts.load('current', {
            'packages':['geochart'],
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
            ['Country', 'Sales'],
            ['Germany', 3],
            ['United States', 4],
            ['Brazil', 2],
            ['Canada', 7],
            ['France', 6],
            ['RU', 4],
            ["India",9]
            ]);

            var options = {};

            var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

            chart.draw(data, options);
        }


        // Area chart
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(JSON.parse(<?php echo json_encode($monthlySales); ?>));

            var options = {
            title: 'Sales',
            hAxis: {title: 'Months',  titleTextStyle: {color: '#333'}},
            vAxis: {title: 'INR',minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('sales_bar_graph'));
            chart.draw(data, options);
        }


    </script>
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12" style="margin: 1em 0;">
            <h4 class="text-center">Orders by Country</h4>
            
            <div id="regions_div" class="w-100"></div>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12" style="margin: 1em 0;">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Orders</h4>
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="w-100">
                            <tr>
                                <!-- <th>No.</th> -->
                                <th>Status</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Amount (₹)</th>
                            </tr>
                        </thead>
                        <tbody class="w-100">
                            <?php foreach($fiveOrders as $order): foreach($fiveOrderUsers as $user): ?>
                            <tr>
                                <td>
                                    <div class="d-flex fs-6"><div class="badge badge-sa-primary"><?php echo $order["status"]; ?></div></div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div><?php  echo $user["first_name"].' '.$user["last_name"]; ?></div>
                                    </div>
                                </td>
                                <td><?php $parts = explode(" ",$order["date"]); echo $parts[0]; ?></td>
                                <td><?php echo $order["amount_paid"]; ?></td>
                            </tr>
                            <?php endforeach; endforeach; ?>
                            
                            <tr>
                                <td><a href="<?php echo site_url("manage-orders"); ?>" class="btn btn-primary btn-block">All Orders</a></td>
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