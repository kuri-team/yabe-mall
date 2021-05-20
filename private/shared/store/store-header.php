<?php
    require_once(PRIVATE_PATH . "\csv.php");
    require_once(PRIVATE_PATH . "\dynamic-display.php");
    
    $stores = read_csv(PRIVATE_PATH . "\database/stores.csv", true);
    $categories = read_csv(PRIVATE_PATH . "\database/categories.csv", true);
    
    $store = get_store_data($stores);
    $store_cat_name = get_store_cat($store["category_id"], $categories);
?>

<ul class="breadcrumb">
    <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
    <li><a href="<?=url_for("/mall/browse/by-store/by-category.php");?>"><?=$store_cat_name;?></a>/</li>
    <li><a href="<?=url_for("/store/store-template");?>"><?=$store["name"];?></a></li>
</ul>

<div class="content-body">
    <section class="store-header">
        <img class="store-img" alt="image of a shop"
             src="<?=url_for("/media/image/store-header-placeholder.jpg");?>">
        <img class="store-card-thumbnail circle-img" alt="image representation of a shop"
             src="<?=url_for("/media/image/profile-placeholder_143x143.png");?>">
        
        <h2><?=$store["name"];?></h2>
        <h3><?=$store_cat_name;?></h3>
        <a href=""><i class="fab fa-facebook-square"></i></a>
        <a href=""><i class="fab fa-twitter-square"></i></a>
        <a href=""><i class="fab fa-youtube"></i></a>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, aspernatur dolores magni,
            aliquam perferendis debitis ipsa necessitatibus nisi quisquam velit ex dolorem, facilis
            et rerum quod blanditiis ducimus voluptatem adipisci!</p>
        
        <div class="store-nav">
            <div class="store-nav-bttn"><a href="<?=url_for("/store/store-template?id=" . $store["id"]);?>">HOME</a></div>
            <div class="store-nav-bttn store-nav-dropdown">PRODUCTS
                <i class="fas fa-caret-down store-nav-dropdown-icon"></i>
                <div class="store-nav-dropdown-list">
                    <a href="<?=url_for("/store/store-template/browse-product/by-category.php?id=" . $store["id"]);?>">CATEGORY</a>
                    <hr>
                    <a href="<?=url_for("/store/store-template/browse-product/by-date.php?id=" . $store["id"]);?>">DATE</a>
                </div>
            </div>
            <div class="store-nav-bttn"><a href="<?=url_for("/store/store-template/pages/contact.php?id=" . $store["id"]);?>">CONTACT</a></div>
            <div class="store-nav-bttn"><a href="<?=url_for("/store/store-template/pages/bio.php?id=" . $store["id"]);?>">BIO</a></div>
            
            <div id="responsive-store-navbar">
                <input type="checkbox" id="navbar-icon">
                <div class="flex-container flex-align-items-center flex-direction-column">
                    <label for="navbar-icon" class="responsive-store-navbar-title">MENU</label>
                    <i class="fas fa-caret-down"></i>
                </div>
                <ul class="responsive-store-navbar-content">
                    <li><a href="<?=url_for("/store/store-template?id=" . $store["id"]);?>">Home</a></li>
                    <li>
                        <input type="checkbox" id="nav-product-bttn">
                        <label for="nav-product-bttn">Products</label>
                        <i class="fas fa-caret-down"></i>
                        <ul class="responsive-store-navbar-content-dropdown">
                            <li><a href="<?=url_for("/store/store-template/browse-product/by-category.php?id=" . $store["id"]);?>">Category</a></li>
                            <li><a href="<?=url_for("/store/store-template/browse-product/by-date.php?id=" . $store["id"]);?>">Date</a></li>
                        </ul>
                    </li>
                    <li><a href="<?=url_for("/store/store-template/pages/contact.php?id=" . $store["id"]);?>">Contact</a></li>
                    <li><a href="<?=url_for("/store/store-template/pages/bio.php?id=" . $store["id"]);?>">Bio</a></li>
                </ul>
            </div>
        </div>
    </section>