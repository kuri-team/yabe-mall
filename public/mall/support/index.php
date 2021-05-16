<?php require_once("../../../private/initialize.php"); ?>

<?php

    $page_title = "Yabe | Support";
    $style_sheets = [
        "/css/common.css",
        "/css/legal/legal.css",
    ];
    $scripts = [
        "/js/common.js",
    ];

    include(SHARED_PATH . "/top.php");

?>
  
  <main>
    <ul class="breadcrumb">
      <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
      <li><a href="<?=url_for("/mall/support");?>">Support</a></li>
    </ul>

    <h1 class="content-title">SUPPORT</h1>
    <div class="content-body flex-container">
      <aside class="content-aside-nav content-child">
        <ul>
          <li><a href="<?=url_for("/mall/support/faq");?>">Frequently Asked Questions</a></li>
          <li><a href="<?=url_for("/mall/support/pricing");?>">Pricing</a></li>
          <li><a href="<?=url_for("/mall/contact");?>">Contact Us</a></li>
        </ul>
      </aside>

      <section class="content-child text-align-justify">
        <article>
          <p>Sea cu brute persius verterem. Patrioque temporibus et vis, invidunt lucilius eos at. Ei vix vocent dissentiet, vim id noster lobortis gloriatur, an conceptam abhorreant mnesarchum his. Eripuit necessitatibus ut vix, est id minim vitae conceptam. Omnis conclusionemque eam at, qui ex adhuc viderer. Ut solet civibus vel, sumo porro mediocrem mei te, malis delicata constituto at eum.</p>
          <p>Sea cu atqui dictas moderatius. Ei nec case possit audire. Vitae quaeque facilisi cum in. Mei commodo sapientem concludaturque id, et eos mutat legere complectitur. No tale intellegat est.</p>
        </article>
      </section>
    </div>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>