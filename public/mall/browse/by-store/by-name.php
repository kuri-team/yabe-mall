<?php require_once("../../../../private/initialize.php"); ?>

<?php

$page_title = "Yabe | Stores";
$style_sheets = [
    "/css/common.css",
    "/css/browse.css",
    "/css/cards.css",
    "/css/pagination.css",
];
$scripts = [
    "/js/common.js",
];

include(SHARED_PATH . "/top.php");

?>
  <main id="content">

    <ul class=breadcrumb>
      <li><a href="../../">Home</a>/</li>
      <li><a href="./">Browse Stores</a>/</li>
      <li><a href="#">By Name</a></li>
    </ul>

  <div class="content-body">
    <div>
      <label><select class="select-list">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
        <option value="G">G</option>
        <option value="H">H</option>
        <option value="I">I</option>
        <option value="J">J</option>
        <option value="K">K</option>
        <option value="L">L</option>
        <option value="M">M</option>
        <option value="N">N</option>
        <option value="O">O</option>
        <option value="P">P</option>
        <option value="Q">Q</option>
        <option value="R">R</option>
        <option value="S">S</option>
        <option value="T">T</option>
        <option value="U">U</option>
        <option value="V">V</option>
        <option value="W">W</option>
        <option value="X">X</option>
        <option value="Y">Y</option>
        <option value="Z">Z</option>
      </select></label>
    </div>

    <div class="store-list">

      <div class="flex-container flex-justify-content-space-evenly flex-wrap">

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/apple_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/birkenstock_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/canon_logo.jpg"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/dermalogica_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/floralpunk_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/hp_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/jabra_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/jordan_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/paula_choice_logo.jpg"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/samsung_logo.png"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/nike_logo.jpg"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

        <div class="store-card">
          <a href="../../../store/store-template/"><img class="store-card-thumbnail" alt="image representation of a shop" src="../../../media/image/store_logos/webtoon_logo.jpg"></a>
          <a class="store-card-name" href="../../../store/store-template/">Shop Name</a>
        </div>

      </div>
    </div>

    <div class="pagination">
      <a href="#" class="current-page">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
      <a href="#">&gt;</a>
      <a href="#">&raquo;</a>
    </div>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>