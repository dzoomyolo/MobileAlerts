<?php
$path ="/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MA - Главная</title>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="/static/css/main">
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <div class="nav-logo">
                <a href="#"><img src="/static/png/logo" width="100%" alt="Navigation Logo"></a>
            </div>
            <div class="nav-buttons">
                <a class="nav-button" href="#">Возможности</a>
                <a class="nav-button" href="#">О проекте</a>
                <a class="nav-button" href="#">Контакты</a>
            </div>
            <div class="nav-b-login">
                <a href="">Войти</a>
            </div>
        </div>
    </nav>
    <div class="l-form-wrapper">
        <form action="/auth/login" class="l-form">
            <input type="text" name="name" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" value="Войти">
        </form>    
    </div>
    <div class="main">
        <div class="main-landing">
            <div class="landing-wrapper">
                <h2 style="color:#7a7a7a;"><span style="color: #31ad52;">Mobile</span>Alerts</h2>
                <h5 style="color:#7a7a7a;font-size: 1em; font-size:1.13em; ">Лучшее решение для школ!</h5>
                <div class="btn-group" role="group">
                    <a class="btn btn-outline-dark" href="/">Подключить школу</a>
                    <a class="btn btn-outline-dark" href="/me">Личный кабинет</a>
                </div>
            </div>
        </div>
        <div class="main-features">
            <div class="f-card">
                <div class="f-image">
                    <img src="/static/png/phone" width="100%" alt="Card features">
                </div>
                <div class="f-card-body">
                    <span>Много новых штукdasdsadsadasdasdasdadasdsa<span>
                </div>
            </div>
            <div class="f-card">
                <div class="f-image">
                    <img src="/static/png/phone" width="100%" alt="Card features">
                </div>
                <div class="f-card-body">
                    <span>Много новых штукdasdsadsadasdasdasdadasdsa<span>
                </div>
            </div>
            <div class="f-card">
                <div class="f-image">
                    <img src="/static/png/phone" width="100%" alt="Card features">
                </div>
                <div class="f-card-body">
                    <span>Много новых штукdasdsadsadasdasdasdadasdsa<span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>