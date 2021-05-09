<?php
    if (!isset($scripts)) {
        $scripts = ["/js/common.js"];
    }
?>

<footer>
    <div class="flex-container flex-justify-content-center flex-align-items-start flex-wrap">
        <div class="footer-menu-item" id="footer-logo"><img alt="Yabe logo" src="<?=url_for("/media/vector/footer-logo.svg");?>"></div>

        <div class="footer-menu-item" id="footer-menu-main-pages">
            <p>MAIN PAGES</p>
            <ul>
                <li><a href="<?=url_for("about-us");?>">About Us</a></li>
                <li><a href="<?=url_for("contact");?>">Contact Us</a></li>
                <li><a href="<?=url_for("support/pricing");?>">Pricing</a></li>
                <li><a href="<?=url_for("support/faq");?>">FAQs</a></li>
            </ul>
        </div>

        <div class="footer-menu-item" id="footer-menu-policy">
            <p>POLICY</p>
            <ul>
                <li><a href="<?=url_for("legal/tos");?>">Terms of Service</a></li>
                <li><a href="<?=url_for("legal/privacy-policy");?>">Privacy Policy</a></li>
                <li><a href="<?=url_for("legal/copyright");?>">Copyright</a></li>
            </ul>
        </div>

        <div class="footer-menu-item" id="footer-menu-browse">
            <p>BROWSE</p>
            <ul>
                <li id="footer-menu-browse-product"><a href="<?=url_for("browse/by-product");?>">Products</a>
                    <ul>
                        <li><a href="<?=url_for("browse/by-product/by-category.html");?>">Browse by Category</a></li>
                        <li><a href="<?=url_for("browse/by-product/by-date.html");?>">Browse by Date</a></li>
                    </ul>
                </li>
                <li id="footer-menu-browse-store"><a href="<?=url_for("browse/by-store");?>">Stores</a>
                    <ul>
                        <li><a href="<?=url_for("browse/by-store/by-category.html");?>">Browse by Category</a></li>
                        <li><a href="<?=url_for("browse/by-store/by-name.html");?>">Browse by Name</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div id="footer-copyright">
        <p>&copy;<?=date("Y");?> YABE</p>
    </div>
</footer>

<div class="cookie-consent">
    <div class="cookie-consent-container">
        <p class="text-align-justify">We use cookies to find out the way to provide the best experience for you. By clicking "Accept" ,
            you agree to the use of cookies and other technologies on our website.</p>
        <div class="cookie-consent-button">
            <a href="https://gdpr-info.eu/" target="_blank"><button class="cookie-consent-learn-more">Learn more</button></a>
            <button class="cookie-consent-accept">Accept</button>
        </div>
    </div>
</div>

<?php
    foreach ($scripts as $script) {
        echo "<script src='" . url_for($script) . "'></script>";
    }
?>
</body>
</html>