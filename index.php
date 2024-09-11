<?php
session_start();
$customer_name;
$cart_item_count;

if (!isset($_SESSION['customer_email'])) {
    $customer_name = "Login";
} else {
    $customer_name = $_SESSION['customer_fname'];
    if (isset($_SESSION['cart_items'])) {
        $cart_item_count = $_SESSION['cart_items'];
    } else {
        $cart_item_count = 0;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Poppins:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="assets/css/index.css">
    <title>ABC Resturant</title>
</head>

<body>
    <header id="navbar">
        <nav>
            <div class="nav-logo">
                <a href="">ABC Restaurant</a>
            </div>
            <div class="nav-mid-section">

            </div>
            <div class="nav-right-section">
                <ul>
                    <li class="underline"><a href="index.php">Home</a></li>
                    <li class="underline"><a href="pages/gallery.php">Gallery</a></li>
                    <li class="underline"><a href="pages/menu.php">Menu</a></li>
                    <li class="underline"><a href="#popular-dishes">Offers</a></li>
                    <li class="underline"><a href="#facilities">Facilities</a></li>
                    <li class="underline"><a href="pages/about.php">About Us</a></li>
                </ul>
            </div>
            <div class="login-section">

                <!-- shopping cart  -->
                <?php
                //checking user logged or not
                if (!isset($_SESSION['customer_email'])) {
                    echo '<a href="pages/login.php"><span class="material-symbols-outlined item-cart">shopping_cart</span></a>';
                } else {
                    include('includes/util-functions.php');
                    $cart_item_count = updateCart();
                    echo '<a href="pages/checkout.php"><span class="material-symbols-outlined item-cart">shopping_cart</span> <span class="cart_item_count">' . $cart_item_count . '</span>  </a>';
                }
                ?>

                <p class="js-log-menu-btn"><?php echo $customer_name ?><span class="material-symbols-outlined">
                        account_circle
                    </span></p>
                <?php
                //checking user logged or not
                if (!isset($_SESSION['customer_email'])) {
                    echo '  <div class="sign-up-menu display-off js-login-menu">
                                    <a href="pages/login.php">Login</a>
                                    <a href="pages/sign-up.php">Sign Up</a>
                                </div>';
                } else {
                    echo '  <div class="sign-up-menu display-off js-login-menu">
                                    <a href="pages/profile.php">Profile</a>
                                    <a href="includes/log-out.php">Log Out</a>
                                 </div>';
                }
                ?>
                
                <span class="material-symbols-outlined nav-menu-icon js-nav-toggle">
                    menu
                </span>
            </div>
            <div class="mobile-nav-section display-off js-mobile-nav">
                <ul>
                    <li class="underline"><a href="index.php">Home</a></li>
                    <li class="underline"><a href="pages/gallery.html">Gallery</a></li>
                    <li class="underline"><a href="pages/menu.php">Menu</a></li>
                    <li class="underline"><a href="#popular-dishes">Offers</a></li>
                    <li class="underline"><a href="#facilities">Facilities</a></li>
                    <li class="underline"><a href="pages/about.php">About Us</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="image-slider">
            <div class="slider">
                <figure>
                    <img src="assets/images/img1.jpeg" alt="">
                    <img src="assets/images/img2.jpg" alt="">
                    <img src="assets/images/img3.jpg" alt="">
                    <img src="assets/images/img4.jpg" alt="">
                    <img src="assets/images/img5.jpg" alt="">
                </figure>
                <div class="slide-cover">
                    <p>Welcome to ABC Restaurant<br><span class="second-line">Where Every Bite Is a Masterpiece!</span></p>
                    <a href="pages/reservation.php" class="reservation-btn">
                        Reservation
                        <span class="material-symbols-outlined reserv-arrow">arrow_forward</span>
                    </a>

                </div>
            </div>

            <!-- search-items-component -->
            <div class="search-container">
                <form action="pages/search-process.php">
                    <input type="text" id="search" placeholder="Search your favorite items here" name="search">
                    <input type="submit" value="Search" name="search_add" class="item-search-btn">
                </form>
            </div>
        </div>

        <div id="popular-dishes">
            <h1 class="main-titles"><span>Special Offers</span></h1>
            <div class="popular-dishes-items">
                <div class="dishe">
                    <img src="assets/images/dishes/dishe1.jpg" alt="">
                    <p class="dishe-title">Pizza Margherita</p>
                    <p class="dishe-description">LA beloved Italian classic, the Pizza Margherita is a thin-crust pizza
                        topped with simple yet delicious ingredients: tomato sauce, fresh mozzarella cheese, fragrant
                        basil leaves, and a drizzle of olive oil. Its colors—red, white, and green—symbolize the Italian
                        flag.</p>
                    <div class="dishe-popular-tag">
                        <p>30% Off</p>
                    </div>
                </div>
                <div class="dishe">
                    <img src="assets/images/dishes/dishe2.jpg" alt="">
                    <p class="dishe-title">Sushi</p>
                    <p class="dishe-description">Sushi is a Japanese culinary masterpiece. It consists of vinegared rice
                        combined with various ingredients such as raw or cooked seafood, vegetables, and occasionally
                        tropical fruits. Served with soy sauce, wasabi, and pickled ginger, sushi offers a delicate
                        balance of flavors and textures.</p>
                    <div class="dishe-popular-tag">
                        <p>10% Off</p>
                    </div>
                </div>
                <div class="dishe">
                    <img src="assets/images/dishes/dishe3.jpg" alt="">
                    <p class="dishe-title">Chicken Tikka Masala</p>
                    <p class="dishe-description">This British-Indian creation is a luscious dish where marinated and
                        grilled chicken pieces are simmered in a creamy tomato and spice-infused sauce. It's a perfect
                        fusion of smoky flavors and creamy richness, served with naan bread or rice.</p>
                    <div class="dishe-popular-tag">
                        <p>25% Off</p>
                    </div>
                </div>
                <div class="dishe">
                    <img src="assets/images/dishes/dishe4.jpg" alt="">
                    <p class="dishe-title">Pad Thai</p>
                    <p class="dishe-description">Pad Thai is Thailand's renowned street food dish. It features
                        stir-fried rice noodles combined with shrimp or tofu, scrambled eggs, bean sprouts, peanuts, and
                        a tangy tamarind sauce. The result is a harmonious blend of sweet, sour, and savory flavors.</p>
                    <div class="dishe-popular-tag">
                        <p>10% Off</p>
                    </div>
                </div>
                <div class="dishe">
                    <img src="assets/images/dishes/dishe5.jpg" alt="">
                    <p class="dishe-title">Devil Chicken Kottu</p>
                    <p class="dishe-description">Devil Chicken Kottu is a Sri Lankan street food favorite. This spicy
                        and flavorful dish features chopped roti (flatbread) stir-fried with a fiery chicken curry,
                        onions, bell peppers, and an array of spices. It's a tantalizing medley of textures and bold
                        flavors that's sure to satisfy your taste buds.</p>
                    <div class="dishe-popular-tag">
                        <p>25% Off</p>
                    </div>
                </div>
                <div class="dishe">
                    <img src="assets/images/dishes/dishe6.jpg" alt="">
                    <p class="dishe-title">Biryani</p>
                    <p class="dishe-description">Biryani is a fragrant and flavorful South Asian dish, known for its
                        aromatic long-grain rice cooked with a blend of spices, herbs, and marinated chicken, lamb, or
                        vegetables. The result is a rich and layered dish with tender meat or vegetables,
                        saffron-infused rice, and a combination of flavors that varies by region.</p>
                    <div class="dishe-popular-tag">
                        <p>30% Off</p>
                    </div>
                </div>
            </div>
            <div class="more-dishes">
                <button class="dishes-menu-btn btn" onclick="location.href='pages/menu.php'">Open Menu <span class="material-symbols-outlined arrow-icon">
                        arrow_forward
                    </span></button>
            </div>
        </div>

        <!-- facilities -->

        <div id="facilities">
            <p class="facilities-title">Our Facilities</p>
            <div class="facilities-content">
                <div class="content-top">
                    <div class="content-top-left">
                        <div class="facility-image ">
                            <img src="assets/images/facilities/faci1.jpg" alt="">
                        </div>
                        <div class="same-content">
                            <p class="facility-title">The Rustic Bistro Retreat</p>
                            <p class="facility-description">The Rustic Bistro Retreat offers a cozy dining experience
                                with a charming atmosphere. Guests can savor farm-to-table cuisine made from locally
                                sourced ingredients. The restaurant features a crackling fireplace, and outdoor seating
                                with a view of rolling hills.</p>
                        </div>
                    </div>
                    <div class="content-top-right">
                        <div class="facility-image">
                            <img src="assets/images/facilities/faci2.jpg" alt="">

                        </div>
                        <div class="same-content ">
                            <p class="facility-title">Ocean's Edge Seafood Grill</p>
                            <p class="facility-description">Ocean's Edge Seafood Grill is a haven for seafood lovers.
                                This restaurant boasts a nautical theme with a menu that includes the freshest catches
                                of the day. Diners can enjoy panoramic views of the ocean while relishing delectable
                                dishes like grilled lobster and seared scallops.</p>
                        </div>
                    </div>
                </div>
                <div class="content-bot">
                    <div class="content-bot-left">
                        <div class="same-content">
                            <p class="facility-title">Zen Garden Sushi House</p>
                            <p class="facility-description">For those seeking an authentic Japanese dining experience,
                                Zen Garden Sushi House is the place to be. With minimalist decor and a tranquil
                                ambiance, it offers a wide selection of sushi, sashimi, and other Japanese delicacies.
                                The sushi bar is the centerpiece, where expert chefs craft artistic rolls.</p>
                        </div>
                        <div class=" facility-image ">
                            <img src="assets/images/facilities/faci3.jpg" alt="">
                        </div>
                    </div>
                    <div class="content-bot-right">
                        <div class="same-content">
                            <p class="facility-title">The Urban Spice Fusion Lounge</p>
                            <p class="facility-description">Located in the bustling city center, The Urban Spice Fusion
                                Lounge offers a vibrant and eclectic dining experience. This restaurant blends various
                                global cuisines, The modern, lively setting includes a bar serving creative cocktails
                                and a live band that plays on weekends.</p>
                        </div>
                        <div class="facility-image ">
                            <img src="assets/images/facilities/faci4 (1).jpg" alt="">
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="review-section">
            <div class="review-left-section">
                <div class="review-title">
                    <p class="review-main-text">TESTIMONIALS & REVIEWS.</p>
                    <p class="review-second-text">Our Customer Feedbacks</p>
                </div>
                <div class="feedback-component">
                    <div class="component-slides">
                        <div class="component-card">
                            <div class="component-card-top">
                                <p>
                                    Great experience. All the dishes we had, were tasty, in good condition and fresh.
                                    Friendly customer service. The service has to be sync a little bit more but hope
                                    that
                                    will improve in the upcoming days. Overall very satisfied and highly recommended. ❤
                                    💯
                                </p>
                            </div>
                            <div class="component-card-bot">
                                <p class="feedback-owner-name">
                                    Hansa Madhushan
                                </p>
                                <img class="feedback-rating" src="assets/images/ratings/stars.png" alt="">
                            </div>
                            <div class="double-quotes">
                                <img src="assets/images/ratings/quatation.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-right-section">
                <div class="review-dummy">
                    <img src="assets/images/customer/customer1.jpg" alt="" class="first-dummy">
                    <img src="assets/images/customer/customer2.jpg" alt="" class="second-dummy">
                    <img src="assets/images/customer/customer3.jpg" alt="" class="third-dummy">
                </div>
            </div>
        </div>

    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-left">
                <p class="footer-main-text">Main Resturant - Colombo</p>
                <div class="footer-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63381.7901781827!2d79.89956262912905!3d6.84714891223242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae251c093787a17%3A0xcd7254a31f81fa5!2sCuisine%20Colombo%20-%20Pelawatta!5e0!3m2!1sen!2slk!4v1698135971649!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="footer-mid">
                <p class="footer-main-text">Services</p>
                <ul>
                    <li>Catering</li>
                    <li>Live Cooking Stations</li>
                    <li>Cultural Ambiance</li>
                    <li>Tea Service</li>
                    <li>Customization</li>

                </ul>
            </div>
            <div class="branches">
                <p class="footer-main-text">Branches</p>
                <ul>
                    <li>Colombo</li>
                    <li>Kandy</li>
                    <li>Jaffna</li>
                    <li>Negombo</li>
                    <li>Kurunegala</li>
                </ul>
            </div>
            <div class="footer-right">
                <p class="footer-main-text">Contacts</p>
                <ul>
                    <li><a href="#"><span class="material-symbols-outlined">
                                call
                            </span>011 256 4435 - Hotline</a></li>
                    <li><a href="#"><span class="material-symbols-outlined">
                                email
                            </span>info@ABCrestaurant.com</a></li>

                    <li><a href="#"><box-icon class="contact-icons" type='logo' name='facebook-circle' size='35px' color='white'></box-icon>ABC Restaurant/Facebook</a></li>
                    <li><a href="#"><box-icon class="contact-icons" type='logo' name='instagram' size='35px' color='white'></box-icon>ABC Restaurant_Offical/Instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-copyright">
            <p>Developed by <a>Hansa Madhushan</a></p>
        </div>
    </footer>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>