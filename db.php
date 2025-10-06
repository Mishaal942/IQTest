<?php
// db.php
// PDO connection file. Include this in other files.
// Update host if needed (default: localhost)

$DB_HOST = 'localhost';
$DB_NAME = 'db4sgg8ogulnsa';
$DB_USER = 'uppbmi0whibtc';
$DB_PASS = 'bjgew6ykgu1v';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, $options);
} catch (PDOException $e) {
    // Friendly error for debugging - remove detailed message in production
    echo "<h2>Database Connection Error</h2>";
    echo "<p>Please check db.php settings and that MySQL is running.</p>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
    exit;
}
?>
