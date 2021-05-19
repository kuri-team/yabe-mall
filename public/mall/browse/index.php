<?php require_once("../../../private/initialize.php"); ?>

<?php

$page_title = "Yabe | Browse";
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
include("../../../private/csv.php");

?>

<main>
    <div class="content-body">
        <form id="dropdown_form" action="" method="post">
        <label>
            <select class="select-list" id="browse-option" name="browse-option" onchange="dropdown_form.submit()">

                <?php
                if (isset($_POST["browse-option"])) {
                    $selected_value = $_POST['browse-option'];
                    echo "
                    <script>
                    document.getElementById('browse-option').value = $selected_value;
                    </script>
                ";
                }
                
                $category_list = read_csv("../../../private/database/categories.csv", true);
                if ($_GET["by-store"] == "by-category") {
                    echo "<option value='all-categories' name='all-categories' id='dropdown-value'>ALL CATEGORIES</option>";

                    for ($i = 0; $i < count($category_list); $i++) {
                        $category = $category_list[$i]["name"];
                        echo "<option value='$category' name='$category' id='dropdown-value'>$category</option>";
                    }
                } else if ($_GET["by-store"] == "by-name") {
                    for ($letter = "A"; $letter < "Z"; $letter++) {
                        echo "<option value='$letter' name='$letter' id='dropdown-value'>$letter</option>";
                    }
                    echo "<option value='Z' name='Z'>Z</option>";
                }



                ?>

            </select>
        </label>
        </form>
        <div class="store-list">
            <div class="flex-container flex-justify-content-space-evenly flex-wrap">

                <?php

                $stores_list = read_csv("../../../private/database/stores.csv", true);
                if (isset($_POST["browse-option"])) {
                    if ($_GET["by-store"] == "by-category") {
                        if ($_POST["browse-option"] != "all-categories") {
                        for ($i = 0; $i < count($category_list); $i++) {
                            if ($category_list[$i]["name"] == $_POST["browse-option"]) {
                                for ($k = 0; $k< count($stores_list); $k++) {
                                    if ($category_list[$i]["id"] == $stores_list[$k]["category_id"]) {
                                        $store_name = $stores_list[$k]["name"];
                                        echo "
                                        <div class='store-card'>
                                            <a href='\"/store/store-template\");?>'><img class='store-card-thumbnail' alt='image representation of a shop' src='../../media/image/placeholder_262x250.png'></a>
                                            <a class='store-card-name' href='<?=url_for(\"/store/store-template\");?>'>$store_name</a>
                                        </div>
                                        ";
                                    }
                                }
                            }
                        }
                        }
                    }
                }

                ?>

            </div>
    </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>