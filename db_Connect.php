<?php 
// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $con = new mysqli('localhost', 'root', '', 'fund_riser');
} catch (mysqli_sql_exception $e) {
    die("Can't connect to the database: " . $e->getMessage());
}
?>