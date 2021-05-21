<?php
    require_once(PRIVATE_PATH . "\csv.php");
    require_once(PRIVATE_PATH . "\dynamic-display.php");
    
    $stores = read_csv(PRIVATE_PATH . "\database/stores.csv", true);
    
    $store = get_store_data($stores);
?>

<section class="store-footer flex-container flex-justify-content-center flex-align-items-center flex-wrap">
    <div class="store-logo"><a href="<?=url_for("/store/store-template?id=" . $store["id"]);?>">
            <img class="circle-img" src="<?=url_for("/media/image/profile-placeholder_143x143.png");?>" alt="Store logo"></a>
    </div>
    <div class="store-footer-bttn"><a href="<?=url_for("/mall/legal/copyright");?>">Copyright</a></div>
    <div class="store-footer-bttn"><a href="<?=url_for("/mall/legal/tos");?>">Term of Service</a></div>
    <div class="store-footer-bttn"><a href="<?=url_for("/mall/legal/privacy-policy");?>">
            Privacy Policy</a></div>
    
    <div id="responsive-store-footer">
        <input type="checkbox" id="store-footer-icon">
        <label for="store-footer-icon" class="responsive-store-footer-title" onclick="displayDropdown()">Legal</label>
        <ul id="responsive-store-footer-dropdown">
            <li><a href="<?=url_for("/mall/legal/copyright");?>">Copyright</a></li>
            <li><a href="<?=url_for("/mall/legal/tos");?>">Term of Service</a></li>
            <li><a href="<?=url_for("/mall/legal/privacy-policy");?>">Privacy Policy</a></li>
        </ul>
    </div>
</section>
</div>
