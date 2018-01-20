

<?php
  // Database settings
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'jmisterka');
  define('DB_PASSWORD', 'pies');
  define('DB_NAME', 'DB_PROJ_MISTERKA');

  try {
    $pdo = new PDO('pgsql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOEXception $e) {
    die('Błąd podczas połączenia z bazą danych' . $e->getMessage());
  }
?>


