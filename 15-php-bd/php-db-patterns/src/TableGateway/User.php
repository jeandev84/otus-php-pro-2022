<?php

declare(strict_types=1);

namespace Budaev\TableGateway;

use PDO;
use PDOStatement;


// CRUD operations
class User
{
    private PDO          $pdo;

    private PDOStatement $selectStatement;

    private PDOStatement $selectByCompanyStatement;

    private PDOStatement $insertStatement;

    private PDOStatement $updateStatement;

    private PDOStatement $deleteStatement;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;

        $this->selectStatement = $pdo->prepare(
            'SELECT * FROM users WHERE id = ?'
        );

        $this->selectByCompanyStatement = $pdo->prepare(
            'SELECT * FROM users WHERE company_id = ?'
        );

        $this->insertStatement = $pdo->prepare(
            'INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)'
        );
        $this->updateStatement = $pdo->prepare(
            'UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE id = ?'
        );
        $this->deleteStatement = $pdo->prepare(
            'DELETE FROM users WHERE id = ?'
        );
    }


    public function find(int $id): mixed
    {
        $this->selectStatement->execute([$id]);

        return $this->selectStatement->fetch(PDO::FETCH_OBJ);
    }




    public function findByCompany(int $companyId): mixed
    {
        $this->selectByCompanyStatement->execute([$companyId]);

        return $this->selectByCompanyStatement->fetch(PDO::FETCH_OBJ);
    }



    public function insert(
        string $firstName,
        string $lastName,
        string $email
    ): int
    {
        $this->insertStatement->execute([
            $firstName,
            $lastName,
            $email,
        ]);

        return (int)$this->pdo->lastInsertId();
    }

    public function update(
        int $id,
        string $firstName,
        string $lastName,
        string $email,
    ): bool
    {
        return $this->updateStatement->execute([
            $firstName,
            $lastName,
            $email,
            $id,
        ]);
    }

    public function delete(int $id): bool
    {
        return $this->deleteStatement->execute([$id]);
    }
}
