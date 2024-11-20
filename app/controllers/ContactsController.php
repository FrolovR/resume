<?php

require_once '../app/models/Contact.php';

class ContactsController {
    public function submitForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из формы
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            // Создаем экземпляр модели
            $formModel = new Contact();
            $response = $formModel->saveFormData($name, $email, $message);

            // Отправляем ответ в формате JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}

