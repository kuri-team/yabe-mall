<?php
    
    require_once("../../../../private/initialize.php");
    require_once("../../../../private/csv.php");
    require_once("../../../../private/dynamic-display.php");
	
?>

<?php
    
    $stores = read_csv(PRIVATE_PATH . "\database/stores.csv", true);
    
    no_id_redirect(count($stores));
    
    $specific_store = get_item_data($stores);
    
    $page_title = $specific_store["name"] . " | Bio";
    $style_sheets = [
        "/css/common.css",
        "/css/store/store.css",
        "/css/store/store-bio.css",
    ];
    $scripts = [
        "/js/common.js",
        "/js/store/footer.js",
    ];

    include(SHARED_PATH . "/top.php");

?>

  <main>
      <?php require_once(SHARED_PATH . "/store/store-header.php"); ?>
      
      <section id="store-page-content">
        <h2 class="store-content-heading text-align-center">BIO</h2>
        <h3>Our Goal</h3>
        <div class="text-align-justify mb-50">
          <p class="bio-content">Ursaring, kricketune golbat mantyke magneton timburr.
            Kingler gabite jynx patrat bronzor togekiss.</p>
        </div>

        <h3>Our Story</h3>
        <div class="text-align-justify mb-50">
          <p class="bio-content">Archen honchkrow rotom cloyster swinub froslass audino
            buneary sentret. Ivysaur scolipede eelektross giratina gothorita plusle mew.
            Deerling ampharos shelmet seismitoad lumineon pelipper nincada typhlosion remoraid
            terrakion hippowdon jigglypuff dwebble. Kabutops kingler crustle floatzel! Mothim
            mandibuzz wormadam lucario lickitung masquerain, snorunt vulpix magmortar lairon
            sentret kecleon luvdisc. Spoink azumarill hoppip torchic meloetta, servine finneon
            clamperl murkrow. Purrloin litwick surskit buneary zubat elgyem rattata heatran
            cyndaquil. Boldore basculin serperior dialga shellos vanilluxe bibarel shellos.
            Huntail petilil zoroark chimecho cubchoo zweilous smoochum marowak uxie ducklett.</p>

          <p class="bio-content">Sneasel volbeat, magnezone the. Cubone phanpy
            swadloon goldeen metapod! Scolipede mothim politoed onix luxray golduck and ponyta.
            Nidorina kyogre kingler skorupi plusle quagsire snubbull miltank. Eelektross simisage
            carvanha bastiodon. </p>
        </div>

        <h3>Our Leaders</h3>
        <div class="flex-container flex-wrap">
          <div class="shop-founder-ceo text-align-center">
            <img src="<?=url_for("/media/image/profile-placeholder_143x143.png");?>"
                 alt="HSY Shop's Founder and CEO" class="circle-img">
            <h4 class="shop-leader-name">Han Sooyoung</h4>
            <p class="shop-leader-position">Founder &amp; CEO</p>
            <p class="text-align-justify bio-content-leaders">Xatu mareep tentacruel cubchoo
              grimer drilbur krookodile charizard luvdisc fraxure smoochum spoink nidoqueen.
              Budew, rhydon lairon terrakion. Vibrava hitmonlee eelektross klinklang psyduck
              crobat slaking ducklett.</p>
          </div>

          <div class="shop-cfo text-align-center">
            <img src="<?=url_for("/media/image/profile-placeholder_143x143.png");?>"
                 alt="HSY Shop's CFO" class="circle-img">
            <h4 class="shop-leader-name">Neyra Elena Darcy</h4>
            <p class="shop-leader-position">CFO</p>
            <p class="text-align-justify bio-content-leaders">Murkrow, heatran steelix venipede.
              Alomomola sharpedo gligar prinplup gliscor. Starmie sableye fraxure stunfisk
              staraptor. Kabutops conkeldurr excadrill scrafty timburr banette reuniclus
              kricketot espeon purrloin.</p>
          </div>
        </div>
      </section>
    
      <?php require_once(SHARED_PATH . "/store/store-footer.php"); ?>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>