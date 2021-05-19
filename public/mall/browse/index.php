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


if ($_GET["by-store"] === "by-category" && !isset($_GET["browse-option"])) {
    $_GET["browse-option"] = "all-categories";
} else if ($_GET["by-store"] === "by-name" && !isset($_GET["browse-option"])) {
    $_GET["browse-option"] = "A";
}

?>

<main>
    <div class="content-body">
        <form id="dropdown_form" method="get" action="">
            <?php
            // keep existed $_GET['by-store'] in the URL
            echo "
            <input type='hidden' name='by-store' value='{$_GET["by-store"]}'>
            "

            ?>
        <label>
            <select class="select-list" id="browse-option" name="browse-option" onchange="this.form.submit()">

                <?php

                function display_store($store) {
                    echo "
                        <div class='store-card'>
                            <a href='\"/store/store-template\");?>'><img class='store-card-thumbnail' alt='image representation of a shop' src='../../media/image/placeholder_262x250.png'></a>
                            <a class='store-card-name' href='<?=url_for(\"/store/store-template\");?>'>$store</a>
                        </div>
                        ";
                }

                $category_list = read_csv("../../../private/database/categories.csv", true);
                if ($_GET["by-store"] == "by-category") {
                    echo "<option value='all-categories' name='all-categories' id='dropdown-value' >ALL CATEGORIES</option>";

                    for ($i = 0; $i < count($category_list); $i++) {
                        $category = $category_list[$i]["name"];
                        if ($_GET['browse-option'] != $category) {
                            echo "<option value='$category' name='$category' id='dropdown-value'>$category</option>";
                        } else { //set selected value as default displayed value
                            echo "<option value='$category' name='$category' id='dropdown-value' selected='selected'>$category</option>";
                        }
                    }
                } else if ($_GET["by-store"] == "by-name") {
                    for ($letter = "A"; $letter < "Z"; $letter++) {
                        if ($_GET['browse-option'] != $letter) {
                            echo "<option value='$letter' name='$letter' id='dropdown-value'>$letter</option>";
                        } else { //set selected value as default displayed value
                            echo "<option value='$letter' name='$letter' id='dropdown-value' selected='selected'>$letter</option>";
                        }
                    }
                    $letter = 'Z';
                    if ($_GET['browse-option'] != 'Z') {
                        echo "<option value='$letter' name='$letter' id='dropdown-value'>$letter</option>";
                    } else { //set selected value as default displayed value
                        echo "<option value='$letter' name='$letter' id='dropdown-value' selected='selected'>$letter</option>";
                    }
                }
                ?>

            </select>
        </label>
        </form>
        <div class="store-list">
            <div class="flex-container flex-justify-content-space-evenly flex-wrap">

                <?php

                $stores_list = read_csv("../../../private/database/stores.csv", true);
                if (isset($_GET["browse-option"])) {
                    if ($_GET["by-store"] == "by-category") {
                        if ($_GET["browse-option"] != "all-categories") {
                        for ($i = 0; $i < count($category_list); $i++) {
                            if ($category_list[$i]["name"] == $_GET["browse-option"]) {
                                for ($k = 0; $k< count($stores_list); $k++) {
                                    if ($category_list[$i]["id"] == $stores_list[$k]["category_id"]) {
                                        $store_name = $stores_list[$k]["name"];
                                        display_store($store_name);
                                    }
                                }
                            }
                        }
                        } else {
                            for ($i = 0; $i < count($category_list); $i++) {
                                for ($k = 0; $k< count($stores_list); $k++) {
                                    $store_name = $stores_list[$k]["name"];
                                    display_store($store_name);
                                }
                            }

                        }
                    }
                }

                ?>

            </div>
    </div>
    </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>