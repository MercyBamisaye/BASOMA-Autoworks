<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="./assets/Logo.png" alt="Logo">
        </div>
        <div class="navbar">
            <a href="#">Home</a>
            <div class="dropdown">
                <a href="#">Part <i class="fas fa-chevron-down"></i></a>
                <div class="dropdown-content">
                    <a href="#">Option 1</a>
                    <a href="#">Option 2</a>
                    <a href="#">Option 3</a>
                </div>
            </div>
            <a href="#">Forum</a>
            <a href="#">Blog</a>
            <a href="#">Contact</a>
        </div>
        <div class="icons">
            <i class="fas fa-search"></i>
            <i class="fas fa-shopping-cart"></i>
            <i class="fas fa-heart"></i>
            <i class="fas fa-user"></i>
            <strong> <?php if(isset($_SESSION['USERNAME'])){
                               echo $_SESSION['USERNAME']."  <a href=\"Login.php\" style=\"color: black; text-decoration: none;\"><strong>Logout</strong></a>";
                           } else{ echo "<a href=\"Login.php\" style=\"color: black; text-decoration: none;\"><strong>Login</strong></a>";} ?></strong>
            
        </div>
    </div>

    <!-- Your main content goes here -->
    <div class="hero">
        <div class="hero-content">
            <h1>Buy and sell cars, spare parts in Ekiti</h1>
            <h3>Get amazing deals on used and brand new cars</h3>
            <div class="buttons">
                <button>Buy Now</button>
                <?php
                if(isset($_SESSION['UPDATED']) && $_SESSION['UPDATED']== true){}
                else{
                ?>
                <button onclick="redirectTo()">Become a Seller</button><?php }
                ?>
            </div>
        </div>
        <div class="images">
            <img src="./assets/Left Car.png" alt="Left Car">
            <img src="./assets/Right Car.png" alt="Right Car">
        </div>
    </div>
    <div class="product-section">
        <div class="marker">
            <div class="marker-inner">
                <h6>Today</h6>
            </div>
        </div>
        <h4>Flash Sales</h4>
        <div class="grid-container">
            <div class="grid-item">
                <div class="discount">-40%</div>
                <i class="fas fa-heart"></i>
                <i class="fas fa-eye"></i>
                <img src="./assets/Item 1.png" alt="Item 1">
                <button class="add-to-cart">Add to Cart</button>
                <div class="product-description">
                    <p>5W-20 Prime Guard Full Synthetic Motor Oil 1L</p>
                    <div class="prices">
                        <span class="flash-sale-price">#7120</span>
                        <span class="previous-sale-price">#8160</span>
                    </div>
                    <div class="ratings">
                        <span class="stars">⭐⭐⭐⭐⭐</span>
                        <span class="comments">(50)</span>
                    </div>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">
                    <div class="discount">-35%</div>
                    <i class="fas fa-heart"></i>
                    <i class="fas fa-eye"></i>
                    <img src="./assets/Item 2.png" alt="Item 2">
                    <button class="add-to-cart">Add to Cart</button>
                    <div class="product-description">
                        <p>Motorcraft Yellow Prediluted Antifreeze 50/50 Coolant 4ltr</p>
                        <div class="prices">
                            <span class="flash-sale-price">#8460</span>
                            <span class="previous-sale-price">#9160</span>
                        </div>
                        <div class="ratings">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="comments">(35)</span>
                        </div>
                    </div>
                </div>
                <div class="grid-container">
                    <div class="grid-item">
                        <div class="discount">-30%</div>
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-eye"></i>
                        <img src="./assets/Item 3.png" alt="Item 3">
                        <button class="add-to-cart">Add to Cart</button>
                        <div class="product-description">
                            <p>Prime Guard Prediluted Formula Antifreeze 50/50 Coolant 4 litres</p>
                            <div class="prices">
                                <span class="flash-sale-price">#370</span>
                                <span class="previous-sale-price">#400</span>
                            </div>
                            <div class="ratings">
                                <span class="stars">⭐⭐⭐⭐⭐</span>
                                <span class="comments">(99)</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid-container">
                        <div class="grid-item">
                            <div class="discount">-25%</div>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-eye"></i>
                            <img src="./assets/Item 4.png" alt="Item 4">
                            <button class="add-to-cart">Add to Cart</button>
                            <div class="product-description">
                                <p>5w-20 Castrol GTX Ultraclean Motor Oil 5L</p>
                                <div class="prices">
                                    <span class="flash-sale-price">#10500</span>
                                    <span class="previous-sale-price">#12000</span>
                                </div>
                                <div class="ratings">
                                    <span class="stars">⭐⭐⭐⭐⭐</span>
                                    <span class="comments">(99)</span>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
    <div class="section-three">
        <div class="Car engine">
            <img src="./assets/Car engine.png" alt="Car engine">
        </div>
        <div class="opposite-images">
            <div class="Suspensions">
                <img src="./assets/Suspensions.png" alt="Suspensions">
            </div>
            <div class="Brakes">
                <img src="./assets/Brakes.png" alt="Brakes">
            </div>
        </div>
    </div>
    <script src="index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
