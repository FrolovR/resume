<?php

require '../app/models/admin/About.php';
class AboutController{

    private $page;

    public function __construct()
    {
        $segments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $count = count($segments);
        $this->page = $count > 1 ? implode('/', array_slice($segments, 1, $count - 1)) : null;
    }


    public function aboutRead(){



        if (!isset($_SESSION['user_id'])) {
            header("Location:/admin");
            exit;
        }

        $aboutRead = new About();
        $aboutList = $aboutRead->getAllAbout();

        require '../app/views/admin/index.php';
    }

    public function aboutCreate() {
        // Проверка, что форма была отправлена через POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $info = isset($_POST['info']) ? trim($_POST['info']) : '';

            // Проверка на пустые поля
            if (empty($title) || empty($info)) {
                echo "Все поля должны быть заполнены!";
                return;
            }

            $aboutCreate = new About();
            $aboutArrCreate= $aboutCreate->getAboutCreate($title, $info);

            header("Location:/admin/about/read");
        }
    }

    public function aboutDelete($id) {
        // Проверка наличия ID и выполнение удаления
        if (isset($id)) {
            $aboutDelete = new About();
            $isDeleted = $aboutDelete->deleteAbout($id);

            if ($isDeleted) {
                echo "Запись удалена!";
                header("Location: /admin/about/read");
                exit();
            } else {
                echo "Ошибка при удалении записи.";
            }
        } else {
            echo "ID записи не задано.";
        }
    }

    public function aboutUpdate($id) {
        // Проверка, был ли передан ID
        if (isset($id)) {
            $aboutUpdate = new About();
            $about = $aboutUpdate->getAboutSearch($id);

            // Если запись найдена
            if ($about) {
                // Если форма отправлена, обновим данные
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
                    $info = isset($_POST['info']) ? trim($_POST['info']) : '';

                    // Проверка на пустые поля
                    if (empty($title) || empty($info)) {
                        $_SESSION['error'] = "Все поля должны быть заполнены!";
                        header("Location: /admin/about/update/$id");
                        exit();
                    }

                    // Обновление записи в базе данных
                    $isUpdated = $aboutUpdate->updateAbout($id, $title, $info);

                    // Перенаправление после успешного обновления
                    if ($isUpdated) {
                        $_SESSION['success'] = "Запись успешно обновлена!";
                        header("Location: /admin/about/read");
                        exit();
                    } else {
                        $_SESSION['error'] = "Ошибка при обновлении записи.";
                        header("Location: /admin/about/update/$id");
                        exit();
                    }
                }

                // Если форма еще не отправлена, отобразим данные для редактирования
                require '../app/views/admin/about/update.php';
            } else {
                $_SESSION['error'] = "Запись не найдена.";
                header("Location: /admin/about/read");
                exit();
            }
        } else {
            $_SESSION['error'] = "ID записи не задано.";
            header("Location: /admin/about/read");
            exit();
        }
    }
}