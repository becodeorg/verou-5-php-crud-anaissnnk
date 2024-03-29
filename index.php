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
// $page = $_SERVER["REQUEST_URI"];
// $BASE_PATH = "localhost/BeCode/verou-5-php-crud-anaissnnk/";

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)
switch ($action) {
    case 'create':
        create($databaseManager);
        break;
    case 'edit':
        edit($databaseManager);
        break;
    // case $BASE_PATH . 'edit':
    //     echo "Editing ...";
    //     overview($databaseManager);
    //     break;
    default:
        overview($databaseManager);
        break;
}

function overview($databaseManager)
{
    // Load your view
    $cardRepository = new CardRepository($databaseManager);
    $quotes = $cardRepository->get();

    // Tip: you can load this dynamically and based on a variable, if you want to load another view
    require 'overview.php';
}

function create($databaseManager)
{
    if(isset($_POST['submit'])) {
            $cardRepository = new CardRepository($databaseManager);
            $cardRepository->create();
    }
    overview($databaseManager);
}

function edit($databaseManager) {
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $cardRepository = new CardRepository ($databaseManager);
        $cardRepository->update();
        overview($databaseManager);
    } else {
        $cardRepository = new cardRepository($databaseManager);
        $quote = $cardRepository->find()[0];
        require 'edit.php';
    }
}

