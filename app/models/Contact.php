<?php

class Contact {
    public function saveFormData($name, $email, $message){

        if (empty($name) || empty($email) || empty($message)) {
            return ['success' => false, 'error' => 'Все поля обязательны для заполнения'];
        }

        // Настройка email, на который отправляются данные
        $to = 'your-email@example.com';
        $subject = 'Новое сообщение с сайта';

        // Формируем сообщение
        $body = "Имя: $name\n";
        $body .= "Email: $email\n";
        $body .= "Сообщение: $message\n";

        // Заголовки письма
        $headers = "From: no-reply@example.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Отправляем email
        if (mail($to, $subject, $body, $headers)) {
            return ['success' => true];  // Сообщение отправлено успешно
        } else {
            return ['success' => false, 'error' => 'Не удалось отправить сообщение на email'];
        }
    }
}


