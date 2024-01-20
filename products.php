<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css" type="text/css">
    <script src="flower.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>Products</title>
</head>

<body>
    <header>
        <nav class="Navbar">

            <a href="home.html"></a>
            <a href="about.html"></a>
            <a href="products.html"></a>
            <a href="contact.html"></a>

        </nav>
    </header>

    <h1>catalog</h1>
    
    <section class="slider-container">
        <h2>weeding Bouqets</h2>
        <div class="container">
            <div class="swiper card_slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="img_box">
                            <img src="pictures/Weeding1.jpeg" onmouseover=this.src="pictures/Weeding11.jpeg"
                                onmouseout=this.src="pictures/Weeding1.jpeg">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img_box">
                            <img src="pictures/Weeding2.jpeg" onmouseover=this.src="pictures/Weeding21.jpeg"
                                onmouseout=this.src="pictures/Weeding2.jpeg">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img_box">
                            <img src="pictures/Weeding3.jpeg" onmouseover=this.src="pictures/Weeding31.jpeg"
                                onmouseout=this.src="pictures/weeding3.jpeg">
                        </div>
                    </div>
                    <div class=" swiper-slide">
                        <div class="img_box">
                            <img src="pictures/Weeding4.jpeg" onmouseover=this.src="pictures/Weeding41.jpeg"
                                onmouseout=this.src="pictures/Weeding4.jpeg">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img_box">
                            <img src="pictures/Weeding5.jpeg" onmouseover=this.src="pictures/Weeding51.jpeg"
                                onmouseout=this.src="pictures/Weeding5.jpeg">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img_box">
                            <img src="pictures/weeding6.jpeg" onmouseover=this.src="pictures/Weeding61.jpeg"
                                onmouseout=this.src="pictures/Weeding6.jpeg">
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>




    </section>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".card_slider", {
            slidesPerView: 3,
            spaceBetween: 30,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },

            keyboard: {
                enabled: true,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },

                480: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
    </script>

    <main>

        <h2> Best Seller</h2>
        <div class="products">
            <div class="bestseller">

                <div class="box">
                    <img src="pictures/bestseller1.jpeg" alt="">
                    <h4>Rose Bouqet</h4>
                    <h5>$20.00</h5>
                    <div class="top">
                        <p>On Top</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>


                <div class="box">
                    <img src="pictures/bestseller2.jpeg" alt="">
                    <h4>Sun Flower Bouqett</h4>
                    <h5>$18.00</h5>
                    <div class="top">
                        <p>On Top</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="pictures/bestseller3.jpeg" alt="">
                    <h4>White Tulips</h4>
                    <h5>$25.00</h5>
                    <div class="top">
                        <p>On Top</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="pictures/bestseller4.jpeg" alt="">
                    <h4>Orange Roses</h4>
                    <h5>$15.00</h5>
                    <div class="top">
                        <p>On Top</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>
                <div class="box">
                    <img src="pictures/bestseller5.jpeg" alt="">
                    <h4>Small Bouqet</h4>
                    <h5>$10.00</h5>
                    <div class="top">
                        <p>On Top</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="pictures/bestseller6.jpeg" alt="">
                    <h4>Pink Tulips</h4>
                    <h5>$28.00</h5>
                    <div class="top">
                        <p>On Top</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>

            </div>
            <h2>Gifts </h2>
            <div class="gifts">
                <div class="box">
                    <img src="pictures/gifts1.jpeg" alt="">
                    <h4>Square Box</h4>
                    <h5>$30.00</h5>
                    <div class="top">
                        <p>Limited</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="pictures/gifts2.jpeg" alt="">
                    <h4>Heart Box</h4>
                    <h5>$35.00</h5>
                    <div class="top">
                        <p>Limited</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="pictures/gifts3.jpeg" alt="">
                    <h4>Circle Box</h4>
                    <h5>$27.00</h5>
                    <div class="top">
                        <p>Limited</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>
                <div class="box">
                    <img src="pictures/gifts4.jpeg" alt="">
                    <h4>Graduation Box</h4>
                    <h5>$33.00</h5>
                    <div class="top">
                        <p>Limited</p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="pictures/gifts5.jpeg" alt="">
                    <h4>Heart Stick</h4>
                    <h5>$20.00</h5>
                    <div class="top">
                        <p>Limited </p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>


                <div class="box">
                    <img src="pictures/gifts6.jpeg" alt="">
                    <h4>Bag Box</h4>
                    <h5>$40.00</h5>
                    <div class="top">
                        <p>Limited </p>
                    </div>
                    <div class="bbtn">
                        <a href="#">Add to cart</a>
                    </div>
                </div>
            </div>



        </div>
        </div>



    </main>




    <footer>


        <div class="leftfooter">
            <div> <a href="home.php">Home</a>
                <br>
                <br>
                <a href="signin.php">Sign Up</a>

            </div>
        </div>

        <div class="mainfooter">
            <div> <a href="about.php">About Us</a>
                <p>Payment and transport</p>
                <P>Blog</P>
            </div>
        </div>


        <div class="mainfooter2">
            <div> <a href="contact.php">Contact Us</a></div>
            <div class="phonefooter">Phone:</div>
            <p> +38349264030</p>
            <div class="emailfooter">Email:</div>
            <p>FLARISS@gmail.com</p>
        </div>

        <div class="rightfooter">
            <div class="logopic">
                <img src="pictures/logo.jpeg" alt="logo">
            </div>
            <h2>FLARISS</h2>
            <div class="faicons">
                <a href="https://www.instagram.com/flomeflowershop/?hl=en" target="_blank"> <i
                        class="fa-brands fa-square-instagram" style="color: #987d67;"> </i></a>
                &nbsp;
                <a href="#"> <i class="fa-sharp fa-solid fa-square-phone" style="color:#987d67;"></i></a>
                &nbsp;
                <a href="https://twitter.com/blossomflwrshop?lang=en" target="_blank"><i
                        class="fa-brands fa-square-twitter" style="color:#987d67;"></i></a>
            </div>
        </div>
    </footer>



</body>

</html>