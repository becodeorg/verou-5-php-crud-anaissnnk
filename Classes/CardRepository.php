<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(): void
    {
        $quotes = $_POST["quote"];
        try {
            $query = "INSERT INTO collection (Quote) VALUES (?)";
            $stmt = $this->databaseManager->connection->prepare($query);
            $stmt->execute([$quotes]);
        } catch (PDOException $e) {
            echo("Query failed" . $e->getMessage());
        }
    }

    // Get one
    public function find(): array
    {

    }

    // Get all
    public function get(): array
    {
        try {
            $query = "SELECT * FROM collection";
            $stmt = $this->databaseManager->connection->prepare($query);
            $stmt->execute();
            $fetchedData = $stmt->fetchAll();

            return $fetchedData;

        } catch (PDOException $e) {
            echo("Query failed" . $e->getMessage());
        }
    }

    public function update(): void
    {

    }

    public function delete(): void
    {

    }

}