<?php

namespace Bank;

use App\DB\DataBase;
use PDO;

class DatabaseWriter implements DataBase
{
    private $tableName, $pdo;
    
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        
        $host = 'localhost';
        $db   = 'bank';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
    
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    
        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }
    
    public function create(array $userData) : void
    {
        $sql = 
        "
        INSERT INTO {$this->tableName} 
        (
            `first_name`,
            `last_name`,
            `personal_id`,
            `iban`,
            `balance`
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?
        )
        ";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $userData['first_name'],
            $userData['last_name'],
            $userData['personal_id'],
            $userData['iban'],
            $userData['balance'],
        ]);
    }


    public function update(int $userId, array $userData) : void
    {
        $sql = 
        "
        UPDATE {$this->tableName}
        SET `balance` = ?
        WHERE `id` = ?
        ";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $userData['balance'],
            $userId
        ]);
    }

    public function delete(int $userId): void
{
    $sql = "
        DELETE FROM {$this->tableName}
        WHERE `id` = ?
    ";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$userId]);

    // Check if all rows have been deleted
    if ($stmt->rowCount() === 0) {
        // Reset the index to 1
        $resetSql = "ALTER TABLE {$this->tableName} AUTO_INCREMENT = 1";
        $this->pdo->exec($resetSql);
    }
}

    public function show(int $userId) : array
    {
        $sql = 
        "
        SELECT *
        FROM {$this->tableName}
        WHERE `id` = ?
        ";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
        
        return $stmt->fetch();
    }
    
    public function showAll() : array
    {
        $sql = 
        "
        SELECT *
        FROM {$this->tableName}
        ";
        
        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
    }

    public function getUserByEmailAndPass(string $email, string $password) : ?array
    {
        $sql = 
        "
        SELECT *
        FROM {$this->tableName}
        WHERE `email` = ?
        AND `password` = ?
        ";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, md5($password)]);
        
        $user = $stmt->fetch();
        
        return $user ? $user : null;
    }
}
