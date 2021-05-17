<?php require_once("../../../private/initialize.php"); ?>

<?php

$page_title = "Yabe | Legal";
$style_sheets = [
    "/css/common.css",
];
$scripts = [
    "/js/common.js",
];

include(SHARED_PATH . "/top.php");

?>
  
  <main>
    <ul class="breadcrumb">
      <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
      <li><a href="<?=url_for("/mall/legal");?>">Legal</a></li>
    </ul>

    <h1 class="content-title">LEGAL</h1>
    <div class="content-body flex-container">
      <aside class="content-aside-nav content-child">
        <ul>
          <li><a href="<?=url_for("/mall/legal/tos");?>">Terms of Service</a></li>
          <li><a href="<?=url_for("/mall/legal/privacy-policy");?>">Privacy Policy</a></li>
          <li><a href="<?=url_for("/mall/legal/copyright");?>">Copyright</a></li>
        </ul>
      </aside>
      
      <section class="content-child text-align-justify">
        <article>
          <p>Lorem ipsum dolor sit amet, novum munere aliquam mei in, an duo iriure mediocrem corrumpit. Minimum placerat referrentur quo at, ea sea iusto instructior. Vitae hendrerit ut sea, impedit volutpat ei mei, quo labore deterruisset ex. Lorem sensibus electram an his, ne vis equidem invenire disputationi. Quo equidem vituperatoribus id. Vis libris insolens disputando ea, vim eu hinc laoreet. Eam cu labore voluptatibus, per solet utamur ut.</p>
          <p>Mutat pericula his no, at duo omnium nonumes dissentiunt, has at scripta convenire. Ut vim vivendum disputando. Lucilius perpetua at eos, mel ut pertinax persecuti. Quo et postea scripta prodesset, melius labitur duo eu. Ludus melius dissentiunt pri te, usu rebum possit ad.</p>
          <p>Ei quem democritum rationibus pro. Ius quot everti euismod an, et vix falli forensibus concludaturque, graeco docendi minimum sit te. Mei habeo aliquam phaedrum et, postea postulant ad quo. Ad dicat minim epicurei vis, no quo iisque constituto. Cu duo stet singulis. At falli impedit habemus his, dico ignota mucius id eum, agam conclusionemque cu mea.</p>
        </article>
      </section>
    </div>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>