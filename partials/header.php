<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+111444989">
                            <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                            Telephone:+250 781 862 349</a>
                    </li>
                    <li>
                        <a href="mailto:contact@domain.com">
                            <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                            E-mail: storvaegrwanda@gmail.com
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>
                        <a>My Account
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <?php
                                if (isset($_SESSION['customer'])) { ?>
                                <li>
                                    <a href="cart.php">
                                        <i class="fas fa-cog u-s-m-r-9"></i>
                                        My Cart</a>
                                </li>
                                <li>
                                    <a href="wishlist.php">
                                        <i class="far fa-heart u-s-m-r-9"></i>
                                        My Wishlist</a>
                                </li>
                                <li>
                                    <a href="checkout.php">
                                        <i class="far fa-check-circle u-s-m-r-9"></i>
                                        Checkout</a>
                                </li>
                                    <li>
                                        <a href="dashboard.php">
                                            <i class="fas fa-user u-s-m-r-9"></i>
                                                <?php echo $_SESSION['customer']['cust_name']; ?>
                                            </a>
                                    </li>
                                    <li>
                                        <a href="logout.php">
                                            <i class="fas fa-sign-out-alt u-s-m-r-9"></i>
                                                Logout
                                            </a>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a href="account.php">
                                            <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                            Login / Signup
                                        </a>
                                    </li>
                                <?php }
                            ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="index.php">
                            <img src="images/main-logo/groover-branding-1.png" alt="Groover Brand Logo" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">
                    <form class="form-searchbox" action="search-result.php" method="get">
                        <?php $csrf->echoInputField(); ?>
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input id="search-landscape" type="text" class="text-field" name="search_text" placeholder="Search everything">
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="index.php">
                                    <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li class="u-d-none-lg">
                                <a href="wishlist.php">
                                    <i class="far fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a id="mini-cart-trigger" href="cart.php">
                                    <i class="ion ion-md-basket"></i>
                                    <span class="item-price">
                                        (<?php
                                            if(isset($_SESSION['cart_p_id'])) {
                                                $table_total_price = 0;
                                                $i=0;
                                                foreach($_SESSION['cart_p_qty'] as $key => $value) 
                                                {
                                                    $i++;
                                                    $arr_cart_p_qty[$i] = $value;
                                                }                    $i=0;
                                                foreach($_SESSION['cart_p_current_price'] as $key => $value) 
                                                {
                                                    $i++;
                                                    $arr_cart_p_current_price[$i] = $value;
                                                }
                                                for($i=1;$i<=count($arr_cart_p_qty);$i++) {
                                                    $row_total_price = $arr_cart_p_current_price[$i]*$arr_cart_p_qty[$i];
                                                    $table_total_price = $table_total_price + $row_total_price;
                                                }
                                                echo $table_total_price . " RWF";
                                            } else {
                                                echo '0.00';
                                            }
                                        ?>)
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
        <div class="fixed-responsive-wrapper">
            <a href="wishlist.php">
                <i class="far fa-heart"></i>
                <span class="fixed-item-counter">4</span>
            </a>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->
    <!-- Mini Cart -->
    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <!-- <div class="v-menu v-close">
                        <span class="v-title">
                            <i class="ion ion-md-menu"></i>
                            All Categories
                            <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">
                                    <li class="js-backdrop">
                                        <a href="shop-v1-root-category.php">
                                            <i class="ion ion-md-shirt"></i>
                                            Men's Clothing
                                            <i class="ion ion-ios-arrow-forward"></i>
                                        </a>
                                        <button class="v-button ion ion-md-add"></button>
                                        <div class="v-drop-right" style="width: 700px;">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="shop-v2-sub-category.php">Tops</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">T-Shirts</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Hoodies</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Suits</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v4-filter-as-category.php">Black Bean T-Shirt
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="shop-v2-sub-category.php">Outwear</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Jackets</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Trench</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Parkas</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Sweaters</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="shop-v1-root-category.php">Accessories</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Watches</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Ties</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Scarves</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Belts</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="shop-v2-sub-category.php">Bottoms</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Casual Pants
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Shoes</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Jeans</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Shorts</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="shop-v2-sub-category.php">Underwear</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Boxers</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Briefs</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Robes</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Socks</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="shop-v2-sub-category.php">Sunglasses</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Pilot</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Wayfarer</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Square</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.php">Round</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div> -->
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                            <a href="faq.php">Faq</a>
                        </li>
                        <li>
                            <a href="about.php">About us</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>