<?php

namespace App\DataAccess;

class Database
{
    private \PDO $pdo;
    private static ?Database $instance = null;

    private function __construct()
    {
        $host = 'db';
        $db = 'restaurantorders';
        $user = 'root';
        $pass = 'password';

        $dsn = "mysql:host=$host;dbname=$db";

        $options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $exception) {
            throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
        }
    }

    /**
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (!self::$instance)
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    /**
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        return $this->pdo;
    }

    /**
     * @param string $sql
     * @param array $values
     * @return array
     */
    public function fetch(string $sql, array $values = []): array
    {
        $statement = $this->pdo->prepare($sql);

        $statement->execute($values);

        return $statement->fetch();
    }

    /**
     * @param string $sql
     * @param array $values
     * @return array
     */
    public function fetchAll(string $sql, array $values = []): array
    {
        $statement = $this->pdo->prepare($sql);

        $statement->execute($values);

        return $statement->fetchAll();
    }
}
