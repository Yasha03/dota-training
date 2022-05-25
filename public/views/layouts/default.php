<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="/public/css/layouts/default.css">
    <script src="/public/scripts/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
<nav id="navigation">
    <div class="profile-info">
        <div class="profile-info-image">
            <img src="/public/img/avatars/<? echo $_SESSION['logged_user']->avatar; ?>">
        </div>
        <div class="profile-details">
            <span class="profile-details-login"><? echo $_SESSION['logged_user']->login; ?></span>
        </div>
    </div>
    <ul>
        <li><a href="/"><i class="ion-android-home"></i><span>Главная</span></a></li>
        <li><a href="/tests/list"><i class="ion-clipboard"></i><span>Тесты</span></a></li>
        <? if($_SESSION['logged_user']->status == 'admin'){
            echo '<li><a href="/admin/panel"><i class="ion-locked"></i><span>Админ-панель</span></a></li>';
        } ?>
        <li><a href="/account/logout"><i class="ion-log-out"></i><span>Выход</span></a></li>
    </ul>
</nav>

<div id="wrapper">
    <div class="bg-fon"></div>
    <section class="content">
        <? echo $content; ?>
    </section>
</div>


<script src="/public/scripts/form.js<? echo $this->loadForm; ?>"></script>

</body>
</html>