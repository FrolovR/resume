<?php
class About {

    public function getAllAbout() {
        global $pdo;

        try {
            $stmt = $pdo->query("SELECT * FROM about");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Логируем ошибку
            error_log("Error fetching all about entries: " . $e->getMessage());
            return [];  // Возвращаем пустой массив в случае ошибки
        }
    }

    // Создание новой записи
    public function getAboutCreate($title, $info) {
        global $pdo;

        try {
            $stmt = $pdo->prepare("INSERT INTO about (title, info) VALUES (:title, :info)");
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':info', $info, PDO::PARAM_STR);
            return $stmt->execute(); // Вернет true или false
        } catch (PDOException $e) {
            error_log("Error creating about entry: " . $e->getMessage());
            return false;  // Возвращаем false в случае ошибки
        }
    }

    // Удаление записи
    public function deleteAbout($id) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("DELETE FROM about WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute(); // Вернет true или false
        } catch (PDOException $e) {
            error_log("Error deleting about entry: " . $e->getMessage());
            return false;
        }
    }

    // Обновление записи
    public function updateAbout($id, $title, $info) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("UPDATE about SET title = :title, info = :info WHERE id = :id");
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':info', $info, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute(); // Вернет true или false
        } catch (PDOException $e) {
            error_log("Error updating about entry: " . $e->getMessage());
            return false;
        }
    }

    // Поиск записи по ID
    public function getAboutSearch($id) {
        global $pdo;
        try {
            $stmt = $pdo ->prepare("SELECT * FROM about WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Вернет массив или null
        } catch (PDOException $e) {
            error_log("Error searching about entry: " . $e->getMessage());
            return null;
        }
    }
}
