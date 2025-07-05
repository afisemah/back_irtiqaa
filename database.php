<?php
class Database {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {
        $host = 'kuofkculearn.mysql.db';
        $dbname = 'kuofkculearn';
        $username = 'kuofkculearn';
        $password = 'SAMafi013SAMafi013'; // Modifiez si vous avez défini un mot de passe
        
        try {
            $this->pdo = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur à la base de données: " . $e->getMessage());
        }
    }
    
    // Singleton pattern pour obtenir l'instance de la base de données
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
}