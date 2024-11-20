<?php
class Main {
    public function getAllAbout() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM about");
        return $stmt->fetchAll();
    }
}

