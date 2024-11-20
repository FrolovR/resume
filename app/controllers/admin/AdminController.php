<?php
session_start();
require '../app/models/admin/Admin.php';

class AdminController{

    private $page;

    public function __construct()
    {
        $segments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $count = count($segments);

        $this->page = $count > 1 ? implode('/', array_slice($segments, 1, $count - 1)) : null;
    }

    public function index()
    {
        // Проверяем, авторизован ли пользователь
        if (!isset($_SESSION['user_id'])) {
            $pageMode = 'formLogin'; // Если не авторизован - показываем форму логина
        } else {
            $this->page = "welcome";
            $pageMode = 'index'; // Если авторизован - показываем стартовую страницу
        }

        // Подключаем нужный файл в зависимости от состояния сессии
        require "../app/views/admin/$pageMode.php";
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из формы
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Создаем объект модели Admin для поиска пользователя по имени
            $userModel = new Admin();
            $user = $userModel->getByUsername($username);

            // Если пользователь существует и пароль совпадает
            if ($user && password_verify($password, $user['password'])) {
                // Записываем ID пользователя в сессию
                $_SESSION['user_id'] = $user['id'];
                // Переадресуем на страницу администрирования
                header('Location: /admin/index');
                exit;
            } else {
                // Если логин или пароль неверный, передаем ошибку в шаблон
                $error = "Неверное имя пользователя или пароль.";
                require '../app/views/admin/formLogin.php'; // Перезагружаем форму с ошибкой
                exit;
            }
        } else {
            // Если форма не отправлялась, просто выводим форму логина
            require '../app/views/admin/formLogin.php';
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: /admin');
        exit;
    }

}
