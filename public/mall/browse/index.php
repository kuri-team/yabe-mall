<?php

    require_once("../../../private/initialize.php");
    require_once("../../../private/csv.php");
    require_once("../../../private/browse.php");

?>

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


// default browse option
if (!isset($_GET["by-store"]) || $_GET["by-store"] === "") {
    $_GET["by-store"] = "by-category";
}

if ($_GET["by-store"] === "by-category" && !isset($_GET["browse-option"])) {
    $_GET["browse-option"] = "all-categories";
    $_GET["page"] = "1";
} else if ($_GET["by-store"] === "by-name" && !isset($_GET["browse-option"])) {
    $_GET["browse-option"] = "A";
    $_GET["page"] = "1";
}

$max_stores = 12; // maximum number of stores displayed on the page

include(SHARED_PATH . "/top.php");

?>

<main>
    <div class="content-body">
        <form id="dropdown_form" method="get" action="" autocomplete="off">
            <?php
            // keep existed $_GET['by-store'] in the URL

            echo "
            <input type='hidden' name='by-store' value='{$_GET["by-store"]}'>
            <input type='hidden' name='page' value='1'>
            "

            ?>
        <label>
            <select class="select-list" id="browse-option" name="browse-option" onchange="this.form.submit()">

                <?php
                echo $_GET['browse-option'];
                $category_list = read_csv("../../../private/database/categories.csv", true);
                if ($_GET["by-store"] === "by-category") {
                    echo "<option value='all-categories' name='all-categories' id='dropdown-value' >ALL CATEGORIES</option>";

                    for ($i = 0; $i < count($category_list); $i++) {
                        $category = $category_list[$i]["name"];
                        if ($_GET['browse-option'] != $category) {
                            echo "<option value='$category' name='$category' id='dropdown-value'>$category</option>";
                        } else { //set selected value as default displayed value
                            echo "<option value='$category' name='$category' id='dropdown-value' selected='selected'>$category</option>";
                        }
                    }
                } else if ($_GET["by-store"] === "by-name") {
                    if ($_GET['browse-option'] != "#") {
                        echo "<option value='#' name='#' id='dropdown-value'>#</option>";
                    } else { //set selected value as default displayed value
                        echo "<option value='#' name='#' id='dropdown-value' selected='selected'>#</option>";
                    }

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
                $expected_stores = []; // a table of matched stores and its id
                $row = 0; // represent each row of $expected_store

                if (isset($_GET["browse-option"])) {
                    switch ($_GET['by-store']) {
                        case "by-category":
                            if ($_GET["browse-option"] != "all-categories") {
                                for ($i = 0; $i < count($category_list); $i++) {
                                    if ($category_list[$i]["name"] == $_GET["browse-option"]) {
                                        for ($k = 0; $k < count($stores_list); $k++) {
                                            if ($category_list[$i]["id"] == $stores_list[$k]["category_id"]) {
                                                $store_name = $stores_list[$k]["name"];
                                                $store_id = $stores_list[$k]["id"];
                                            } else {
                                                continue; // prevent adding the unmatched to the table
                                                // adding the unmatched will cause an error as their vars aren't set.
                                            }
                                            if (!in_array($store_id, $expected_stores)) {
                                                array_push($expected_stores, [
                                                    "store_id" => "",
                                                    "store_name" => "",
                                                ]);
                                                $expected_stores[$row]["store_name"] = $store_name;
                                                $expected_stores[$row]["store_id"] = $store_id;
                                                $row++;
                                            }
                                            }
                                    }
                                }
                            } else {
                                for ($k = 0; $k < count($stores_list); $k++) {
                                    $store_name = $stores_list[$k]["name"];
                                    $store_id = $stores_list[$k]["id"];
                                    array_push($expected_stores, [
                                        "store_id" => "",
                                        "store_name" => "",
                                    ]);
                                    $expected_stores[$row]["store_name"] = $store_name;
                                    $expected_stores[$row]["store_id"] = $store_id;
                                    $row++;
                                    }
                                }
                                break;
                        case "by-name":
                            for ($i = 0; $i < count($stores_list); $i++) {
                                $first_letter = substr($stores_list[$i]["name"], 0, 1);
                                if ($_GET["browse-option"] === strtolower($first_letter) || $_GET["browse-option"] === strtoupper($first_letter)) {
                                    $store_name = $stores_list[$i]["name"];
                                    $store_id = $stores_list[$i]["id"];
                                }  elseif ($_GET["browse-option"] === "#" and is_numeric($first_letter)) {
                                    $store_name = $stores_list[$i]["name"];
                                    $store_id = $stores_list[$i]["id"];
                                } else {
                                    continue; // prevent adding the unmatched to the table
                                    // adding the unmatched will cause an error as their vars aren't set.
                                }
                                if (!in_array($store_id, $expected_stores)) {
                                    array_push($expected_stores, [
                                        "store_id" => "",
                                        "store_name" => "",
                                    ]);
                                    $expected_stores[$row]["store_name"] = $store_name;
                                    $expected_stores[$row]["store_id"] = $store_id;
                                    $row++;
                                }
                            }
                            break;
                    }
                }
                each_page($expected_stores, $max_stores);
                ?>

            </div>
    </div>

        <?php

            $prev = prev_page();
            $next = next_page(count($expected_stores), $max_stores);
            echo "
            <div class='pagination-wrapper'>
            <form action='' method='get'>
                <input type='hidden' name='by-store' value='{$_GET["by-store"]}'>
                <input type='hidden' name='browse-option' value='{$_GET["browse-option"]}'>
                <button class='prev-button' type='submit' formmethod='get' name='page' value='$prev'>
                    <i class='fas fa-angle-left'></i>
                </button>
                <button class='next-button' type='submit' formmethod='get' name='page' value='$next'>
                    <i class='fas fa-angle-right'></i>
                </button>
            </form>
            </div>
            ";

            $list_length = count($expected_stores);
            if (($list_length % $max_stores != 0)) {
            $max_pages = floor($list_length / $max_stores) + 1;
            } else {
            $max_pages = $list_length / ($max_stores);
            }
            if ($max_pages < 1) {
                $max_pages = 1;
            }
            if ($_GET['page'] < 1 || $_GET['page'] > $max_pages) {
                header("Location: ?by-store={$_GET["by-store"]}&browse-option={$_GET["browse-option"]}&page=1");
            }
        ?>

    </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>