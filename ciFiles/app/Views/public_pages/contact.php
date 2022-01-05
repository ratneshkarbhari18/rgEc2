<main class="page-container" id="about">
    <section class="title-section text-center" id="cart-title">
        <div class="container-fluid " style="padding: 1em 0; margin-bottom: 0em; background-color: #d10762;">
            <h2 class="section-titleX text-light">CONTACT</h2>
        </div>
    </section>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7539.508140682487!2d72.93591134035549!3d19.11844186863909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c79bf3327fa9%3A0xb68b2444dfbba0a2!2sRK%20Software%20Labs!5e0!3m2!1sen!2sin!4v1638868473393!5m2!1sen!2sin" width="100%" height="338" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <section id="contact-info" class="bg-light text-left" style="padding: 2em 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 d-none d-lg-block" style="margin-top: 2em; margin-bottom: 2em;">
                    <h2 class="text-dark">Contact Info:</h2>
                    <p style="font-size: 1.4em; margin-bottom: 0;" class="text-dark">Contact Number: +91 9930777376</p>
                    <p style="font-size: 1.4em; margin-bottom: 0;" class="text-dark">Email: info@rickagauba.com</p>
                    <p style="font-size: 1.4em; margin-bottom: 0;" class="text-dark">Location: Mumbai, India</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 d-block d-lg-none" style="margin-top: 2em; margin-bottom: 2em;">
                    <h2 class="text-dark">Contact Info:</h2>
                    <p style="font-size: 1.4em; margin-bottom: 0;" class="text-dark">Contact Number: <br> +91 9930777376</p>
                    <p style="font-size: 1.4em; margin-bottom: 0;" class="text-dark">Email: info@rickagauba.com</p>
                    <p style="font-size: 1.4em; margin-bottom: 0;" class="text-dark">Location: Mumbai, India</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-left text-dark">

                    <p class="text-success"><?php echo $message; ?></p>

                    <?php echo form_open("send-contact-email"); ?>
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input required class="form-control" type="text" name="full_name" id="full_name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required class="form-control" type="email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea required name="message" id="message" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn" style="background-color: #d10762; color: white;">Send Message</button>
                    <?php echo form_close(); ?>

                    

                </div>
            </div>
        </div>
    </section>
    <section id="contact-info" class="text-center bg-dark d-none" style="padding: 1em 0;">
        <div class="container">
            <p style="font-size: 25px; color: white;">Talk to us. We love it when you do</p>
            
            <a href="javascript:void(Tawk_API.toggle())" class="btn-primary btn btn-large">Live Chat</a>
        </div>
    </section>
</main>
<style>

div,
h1,
h2,
h3,
h4,
h5,
h6,
span {
    font-family: 'Century Gothic', CenturyGothic, Geneva, AppleGothic, sans-serif; 
}
</style>