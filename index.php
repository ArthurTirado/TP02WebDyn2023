<?php declare(strict_types=1);

require_once __DIR__."/src/database.php";

$db = connect_db();


// Temporaire:
$user = "";

function is_empty_or_blank($object) {
    return trim($object) === "";
}
//.
require_once __DIR__."/html/index-view.php";