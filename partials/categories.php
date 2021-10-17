<div class="col-lg-3 col-md-3 col-sm-12">
    <!-- Fetch-Categories-from-Root-Category  -->
    <div class="fetch-categories">
        <h3 class="title-name">Browse Categories</h3>
        <ul>
            <?php
                $i=0;
                $statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    $i++;
                    ?>
                    <li>
                        <a href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category">
                            <?php echo $row['tcat_name']; ?>
                        </a>
                        <button class="button-icon ion ion-md-add" href="<?php echo $i; ?>"></button>
                        <ul id="<?php echo $i; ?>">
                            <?php
                                $j=0;
                                $statement1 = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id=?");
                                $statement1->execute(array($row['tcat_id']));
                                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result1 as $row1) {
                                    $j++;
                                    ?>
                                    <li>
                                        <a href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category">
                                            <?php echo $row1['mcat_name']; ?>
                                        </a>
                                        <button class="button-icon ion ion-md-add" href="<?php echo $i.$j; ?>"></button>
                                        <ul id="<?php echo $i.$j; ?>">
                                            <?php
                                                $k=0;
                                                $statement2 = $pdo->prepare("SELECT * FROM tbl_end_category WHERE mcat_id=?");
                                                $statement2->execute(array($row1['mcat_id']));
                                                $result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($result2 as $row2) {
                                                    $k++;
                                                    ?>
                                                    <li class="<?php echo $i.$j.$k; ?>">
                                                        <a href="product-category.php?id=<?php echo $row2['ecat_id']; ?>&type=end-category">
                                                            <?php echo $row2['ecat_name']; ?>
                                                        </a>
                                                    </li>
                                                <?php }
                                            ?>
                                        </ul>
                                    </li>
                                <?php }
                            ?>
                        </ul>
                    </li>
                <?php }
            ?>
        </ul>
    </div>
    <!-- Fetch-Categories-from-Root-Category  /- -->
    <!-- Filter-Size -->
    <div class="facet-filter-associates">
        <h3 class="title-name">Size</h3>
        <form class="facet-form" action="#" method="post">
            <div class="associate-wrapper">
                <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_size");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) { ?>
                        <a href="index">
                            <input type="checkbox" class="check-box" id="<?php echo $row['size_name']; ?>">
                            <label class="label-text" for="cbs-01">
                                <?php echo $row['size_name']; ?>
                            </label>
                        </a>
                    <?php }
                ?>
            </div>
        </form>
    </div>
    <!-- Filter-Size -->
    <!-- Filter-Price -->
    <div class="facet-filter-by-price">
        <h3 class="title-name">Price</h3>
        <form class="facet-form" action="#" method="post">
            <div class="amount-result clearfix">
                <div class="price-from">RWF 0</div>
                <div class="price-to">RWF <?php echo number_format('100000'); ?></div>
            </div>
            <div class="price-filter"></div>
            <div class="price-slider-range" data-min="0" data-max="500000" data-default-low="0" data-default-high="100000" data-currency="RWF "></div>
            <button type="submit" class="button button-primary">Filter</button>
        </form>
    </div>
    <!-- Filter-Price /- -->
    <!-- Filter-Free-Shipping -->
    <div class="facet-filter-by-shipping">
        <h3 class="title-name">Shipping</h3>
        <form class="facet-form" action="#" method="post">
            <input type="checkbox" class="check-box" id="cb-free-ship">
            <label class="label-text" for="cb-free-ship">Free Shipping</label>
        </form>
    </div>
    <!-- Filter-Free-Shipping /- -->
    <!-- Filter-Rating -->
    <div class="facet-filter-by-rating">
        <h3 class="title-name">Rating</h3>
        <div class="facet-form">
            <!-- 5 Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:76px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">(0)</span>
            </div>
            <!-- 5 Stars /- -->
            <!-- 4 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:60px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (8)</span>
            </div>
            <!-- 4 & Up Stars /- -->
            <!-- 3 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:45px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 3 & Up Stars /- -->
            <!-- 2 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:30px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 2 & Up Stars /- -->
            <!-- 1 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:15px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 1 & Up Stars /- -->
        </div>
    </div>
    <!-- Filter-Rating -->
    <!-- Filters /- -->
</div>