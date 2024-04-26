<?php
define("LOCAL_ENVIORNMENT", true);
if (constant("LOCAL_ENVIORNMENT") === true) {
    define("SERVER_NAME", "localhost");
    define("HOST_NAME", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "bpit_training_placement_management_system");
    define("BASE_URL", "http://localhost/bpit_tpd_ms/admin/");
} else {
    define("SERVER_NAME", "");
    define("HOST_NAME", "");
    define("DB_USER", "");
    define("DB_PASSWORD", "");
    define("DB_NAME", "");
    define("BASE_URL", "");
}