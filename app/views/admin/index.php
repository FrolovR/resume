<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <title>Админка</title>
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-2">
                <div>
                    <h3><a href="/admin">Админка</a></h3>
                </div>
                <div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="/admin/about/read">Об мне</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Фото</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Опыт</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <a href="/admin/logout">
                        <i class="bi bi-box-arrow-right"></i> Выйти
                    </a>
                </div>
            </div>
            <div class="col-8">
                <?php
                include "../app/views/admin/$this->page.php";
                ?>
            </div>
        </div>
    </div>
</body>
</html>
