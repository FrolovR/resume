<?php

class Admin{
    public function getByUsername($username) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE name = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}