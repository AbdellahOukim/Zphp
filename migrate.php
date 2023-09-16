<?php


require_once __DIR__ . '/./vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();
$directory = __DIR__ . '/database/migration';

if (is_dir($directory)) {
    $files = scandir($directory);
    $issetMigration = false;
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {

            $fileName = substr($file, 0, strlen($file) - 4);
            $class = "app\database\migration\\" . $fileName;
            $migration = new $class;
            if ($migration->isMigrated($fileName) === 0) {
                $migration->migrate();
                $migration->saveMigration($fileName);
                $issetMigration = true;
            }
        }
    }
    if (!$issetMigration) {
        echo "Nothing to migrate !";
    }
} else {
    echo "Directory $directory does not exists.";
}
