<?php
    
    require_once("../../../../private/initialize.php");
    require_once("../../../../private/csv.php");
    require_once("../../../../private/dynamic-display.php");
	
?>

<?php
    
    $stores = read_csv(PRIVATE_PATH . "/database/stores.csv", true);
    
    no_id_redirect(count($stores));
    
    $specific_store = get_item_data($stores);
    
    $page_title = $specific_store["name"] . " | By Category";
    $style_sheets = [
        "/css/common.css",
        "/css/cards.css",
        "/css/store/store.css",
        "/css/store/store-browse.css",
        "/css/pagination.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/store/footer.js",
    ];
    
    include(SHARED_PATH . "/top.php");

?>

  <main>
      <?php require_once(SHARED_PATH . "/store/store-header.php"); ?>
      
      <label><select name="store_category">
        <option value="all">ALL CATEGORIES</option>
        <option value="stationery">Stationery</option>
        <option value="foreign_lit">Foreign literature</option>
        <option value="viet_lit">Vietnamese literature</option>
        <option value="textbook">Textbook</option>
        <option value="comic">Comic</option>
      </select></label>

      <section class="store-product-cards">
        <div class="flex-container flex-justify-content-space-between flex-align-items-center flex-wrap">
          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
                                             src="../../../media/image/hsy_shop/Bella.jpg"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2017-07-07</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
                                             src="../../../media/image/hsy_shop/han-sooyoung.jpg"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2021-04-01</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
                                             src="../../../media/image/hsy_shop/JOONGDOKK.jpg"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2018-12-21</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
                                             src="../../../media/image/hsy_shop/Kieran-White.jpg"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2014-02-14</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
                                             src="../../../media/image/hsy_shop/Kym.jpg"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2018-04-01</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
                                             src="../../../media/image/hsy_shop/Lauren.jpg"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2015-10-13</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
              src="../../../media/image/hsy_shop/Neyra_Elena_Darcy.png"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2018-06-18</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
              src="../../../media/image/hsy_shop/orv2.jpg"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2017-12-20</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
              src="../../../media/image/hsy_shop/ORV_Volume_1_cover_(Korean_ver).png"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2019-02-15</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
              src="../../../media/image/hsy_shop/ORV_Volume_3_cover_(Korean_ver).png"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2018-01-06</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
              src="../../../media/image/hsy_shop/Will.jpg"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2020-05-21</div>
            </div>
          </div>

          <div class="product-card">
            <a href="<?=url_for("/store/content/product-detail");?>"><img alt="image of a product"
              src="../../../media/image/hsy_shop/YJHH.jpg"></a>
            <div class="product-card-details">
              <a class="product-card-title" href="<?=url_for("/store/content/product-detail");?>">Product Title Goes Here</a>
              <p class="product-card-shop">Short Description Goes Here</p>
              <p class="product-card-price">$16.95</p>
              <div class="product-card-sale-card">2020-08-03</div>
            </div>
          </div>
        </div>
      </section>

      <div class="pagination">
        <a href="#" class="current-page">1</a>
        <a href="">2</a>
        <a href="">3</a>
        <a href="">4</a>
        <a href=""><i class="fas fa-chevron-right"></i></a>
        <a href=""><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>
      </div>
    
      <?php require_once(SHARED_PATH . "/store/store-footer.php"); ?>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
