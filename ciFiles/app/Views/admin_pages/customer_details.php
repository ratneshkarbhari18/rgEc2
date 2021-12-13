<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p>Name : <?php echo $customer["first_name"].' '.$customer["last_name"]; ?></p>
        <p>Email : <?php echo $customer["email"]; ?></p>
        <p>Address : <?php echo $customer["address"]; ?></p>
        <p>Country : <?php echo $customer["country"]; ?></p>
        <p>State : <?php echo $customer["state"]; ?></p>


    </div>
</main>
