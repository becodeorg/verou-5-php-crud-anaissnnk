<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'Classes/DatabaseManager.php';
require_once 'Classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();

// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)
switch ($action) {
    case 'create':
        create($databaseManager);
        break;
    default:
        overview();
        break;
}

function overview()
{
    // Load your view
    // Tip: you can load this dynamically and based on a variable, if you want to load another view
    require 'overview.php';
}

function create()
{
    // TODO: provide the create logic
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $songtitle = $_POST["title"];
        $artistname = $_POST["artist"];
        try {
            $pdo = $databaseManager->connection;
            echo 'index.php is connected to the database';

            // Uncomment the following lines to insert new data
            $query = "INSERT INTO collection (Title, Artist) VALUES (?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$songtitle, $artistname]);

            // $pdo = null;
            // $stmt = null;
            // die();
        } catch (PDOException $e) {
            echo("Query failed" . $e->getMessage());
        }
    }
}