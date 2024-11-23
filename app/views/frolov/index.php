<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/adaptive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Фролов</title>
</head>
<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <div id="content" style="display: none;">

        <div class="menuButton" id="menuButton">
            <i class="bi bi-list"></i>
        </div>

        <header class="bg_side_bar" id="headMenu">
            <div class="photo_wrap">
                <img src="/images/myPhoto.jpg" alt="Тут должно быть фото">
            </div>

            <a href="/">
                <h1 class="site_name">Руслан Фролов</h1>
            </a>

            <ul>
                <li>
                    <a href="#home">
                        <i class="bi bi-house navicon"></i>
                        домашняя
                    </a>
                </li>
                <li>
                    <a href="#about">
                        <i class="bi bi-person"></i>
                        обо мне</a>
                </li>
                <li>
                    <a href="#resume">
                        <i class="bi bi-file-earmark-text navicon"></i>
                        резюме</a>
                </li>
                <li>
                <li>
                    <a href="#portfolio">
                        <i class="bi bi-images navicon"></i>
                        портфолио</a>
                </li>
                <li>
                    <a href="#contacts">
                        <i class="bi bi-envelope navicon"></i>
                        контакты</a>
                </li>
            </ul>

        </header>

        <div class="wrapper">
            <section id="home">
                <div class="home_photo">
                    <img src="/images/helloWorld.jpg" alt="Тут должно быть фото">
                </div>
                <div class="name_and_profession">
                    <h1>Руслан Фролов</h1>
                    <p>Начинающий WEB-разработчик</p>
                </div>
            </section>

            <section id="about" class="about section">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 section-title">
                                <h2>Обо мне</h2>
                            </div>
                        </div>
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-4">
                                <img src="/images/myPhotoAbout.jpg" class="img_about" alt="Тут должно быть фото">
                            </div>
                            <div class="col-lg-8 content">
                                <div class="content">
                                    <h4>WEB-разработчик</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul>

                                                <?php
                                                    foreach ($aboutList as $list) { ?>
                                                            <li><i class="bi bi-chevron-right"></i> <strong><?php echo $list['title'] . ":"?></strong> <span><?php echo $list['info']?></span></li>
                                                    <?php }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="py-5">
                                        Я начинающий backed-разработчик с базовыми знаниями в области программирования.
                                        Самостоятельно изучал PHP, Python, CSS, HTML, JS, SQL.
                                        Обладаю аналитическим мышлением и способностью быстро осваивать новые технологии. Стремлюсь к постоянному развитию в сфере WEB разработки.
                                        Устойчив к стрессам, умею находить нужную информацию, коммуникабелен.
                                        С WEB разработкой я познакомился на предыдущем месте работы, занимался наполнением сайта, вносил правки и т.д. Данное направление мне понравилось, хочу продолжать развиваться в этой сфере.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <section id="resume" class="resume dark-background ">
                <div class="container">
                    <div class="row">
                        <div class="col-12 section-title">
                            <h2>Резюме</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-6 col-12">
                            <h3 >Образование</h3>
                            <h4>Алтайский государственный политехнический университет</h4>
                            <div class="resume-item">
                                <p>ФИТИБ (Факультет информационных технологий и бизнеса)<br>
                                МЭ (Международная экономика)<br>
                                С 2009 года по 2011 год
                                Неоконченное высшее образование</p>
                            </div>
                            <h4>Яндекс практикум</h4>
                            <div class="resume-item">
                                <p>В 2022 втором году проходил обучение по направлению Анализ данных.</p>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-12">
                            <h3>Опыт работы</h3>
                            <div class="resume-item">
                                <h4>АлтГТУ</h4>
                                <p>ООО МКК Априори Лекс<br>
                                    Декабрь 2014 — июнь 2024<br>
                                    Менеджер по работе с клиентами<br>
                                    - Ведение документации<br>
                                    - Работа с клиентами<br>
                                    - Составление документов, отчётности<br>
                                    - Поддержка работоспособности сайта<br>
                                    - Корректировка и наполнение страниц сайта<br>
                                    - Автоматизация бизнес процессов<br>
                                    - Обновление, установка расширений 1С</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="portfolio">
                <div class="container">
                    <div class="row">
                        <div class="col-12 section-title">
                            <h2>Раздел будет дополняться</h2>
                        </div>
                    </div>
                </div>
            </section>

            <section id="contacts" class="dark-background">
                <div class="container">
                    <div class="row">
                        <div class="col-12 section-title">
                            <h2>Контакты</h2>
                        </div>
                        <div class="col col-lg-5 col-12">
                            <div class="info-wrap">
                                <div class="info-item d-flex" >
                                    <i class="bi bi-geo-alt"></i>
                                    <div>
                                        <h3>Адрес</h3>
                                        <p>город Барнаул</p>
                                    </div>
                                </div>

                                <div class="info-item d-flex">
                                    <i class="bi bi-telephone"></i>
                                    <div>
                                        <h3>Телефон</h3>
                                        <p>+7-906-965-69-99</p>
                                    </div>
                                </div>

                                <div class="info-item d-flex">
                                    <i class="bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h3>Email</h3>
                                        <p>ruslanfrolov1992@gmail.com</p>
                                    </div>
                                </div>

                                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A281038a5d2102e2f2698a0c32cf1cd03e43a931e7031fef739056bd67bb76d54&amp;source=constructor" width="100%" height="270" frameborder="0"></iframe>
                            </div>
                        </div>
                        <div class="col col-lg-7 col-12">
                            <form action="/form/index/" method="post" id="siteForm" class="info-wrap">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <div class="wrapMessage">
                                            <div class="alert alert-danger" role="alert" id="formError"></div>
                                            <div class="alert alert-success" role="alert" id="formSuccess"></div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label for="name-field" class="pb-2">Имя</label>
                                        <input placeholder="Введите имя" type="text" name="name" id="name-field" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="email-field" class="pb-2">Email</label>
                                        <input placeholder="Введите email" type="email" class="form-control" name="email" id="email-field">
                                    </div>
                                    <div class="col-12">
                                        <label for="message-field" class="pb-2">Сообщение</label>
                                        <textarea placeholder="Введите сообщение" class="form-control" name="message" rows="9" id="message-field"></textarea>
                                    </div>
                                    <div class="col-12 text-center php-email-form">
                                        <button type="submit">Отправить сообщение</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/scripts/jQuery.js"></script>
    <script src="/scripts/main.js"></script>
    <script src="/scripts/form.js"></script>
</body>


</html>
