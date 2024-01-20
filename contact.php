<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="contact.css" type="text/css">
    <script defer src="./contact.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Contact Us</title>
</head>

<body>
    <section class = "contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>We love hearing from our customers! Whether you have a question about our stunning bouquets, need assistance with an order, or just want to say hello, we're here for you.</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <h2>reach us</h2>
                <div class="box">
                    <div class="icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Haxhi Zeka 2000 <br> Prizren <br> Kosovo</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>+383 43 721 007 <br> +383 49 264 030</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>flariss@hotmail.com</p>
                    </div>
                </div>
                </div>

                <div class="contactForm">
                    <form id="form" action="">
                        <h2>leave a message</h2>
                        <div class="input">
                            <input type="text" id="name" placeholder="Name">
                            <div class="error"></div>
                        </div>
                        <div class="input">
                            <input type="text" id="number" placeholder="Phone Number">
                            <div class="error"></div>
                        </div>
                        <div class="input">
                            <input type="text" id="email" placeholder="E-mail">
                            <div class="error"></div>
                        <div class="inputi">
                            <textarea name="Message" id="message" placeholder="Message"></textarea>
                            <div class="error"></div>
                        </div> 
                        <button type="submit" class="btn">Send message</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </section>


</body>

</html>