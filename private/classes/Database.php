<?php
    
    require_once(PRIVATE_PATH . "/csv.php");
    
    
    class Database {
        public const CATEGORY_DATABASE = 0;
        public const STORE_DATABASE = 1;
        public const PRODUCT_DATABASE = 2;
        
        private static string $category_database_path = PRIVATE_PATH . "/database/categories.csv";
        private static string $store_database_path = PRIVATE_PATH . "/database/stores.csv";
        private static string $product_database_path = PRIVATE_PATH . "/database/products.csv";
        
        private int $type;
        private array $data = [];
        
        
        public function __construct(int $type) {
            $this->type = $type;
            switch ($this->type) {
                case self::CATEGORY_DATABASE:
                    $data = read_csv(self::$category_database_path, true);
                    foreach ($data as $entry) {
                        $this->data[] = new DatabaseCategory($entry["id"], $entry["name"]);
                    }
                    break;
                case self::STORE_DATABASE:
                    $categories = new Database(self::CATEGORY_DATABASE);
                    $data = read_csv(self::$store_database_path, true);
                    foreach ($data as $entry) {
                        $this->data[] = new DatabaseStore(
                            $entry["id"],
                            $entry["name"],
                            $categories->getEntryById($entry["category_id"]),
                            strtotime($entry["created_time"]),
                            boolval($entry["featured"])
                        );
                    }
                    break;
                case self::PRODUCT_DATABASE:
                    $stores = new Database(self::STORE_DATABASE);
                    $data = read_csv(self::$product_database_path, true);
                    foreach ($data as $entry) {
                        $this->data[] = new DatabaseProduct(
                            $entry["id"],
                            $entry["name"],
                            floatval($entry["price"]),
                            $stores->getEntryById($entry["store_id"]),
                            strtotime($entry["created_time"]),
                            boolval($entry["featured_in_mall"]),
                            boolval($entry["featured_in_store"])
                        );
                    }
                    break;
            }
        }
        
        
        public function getEntryById(string $id) {
            foreach ($this->data as $entry) {
                if ($entry->id === $id) {
                    return $entry;
                }
            }
            return null;
        }
        
        public function getEntriesByName(string $name): array {
            $entries = [];
            foreach ($this->data as $entry) {
                if ($entry->name === $name) {
                    $entries[] = $entry;
                }
            }
            return $entries;
        }
    }
