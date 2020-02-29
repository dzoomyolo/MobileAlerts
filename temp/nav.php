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
    <?php if(is_empty($_SESSION['id'])):?>
        <div class="nav-b-login">
            <a href="#">Войти</a>
        </div>
    <?php endif;?>
    <?php if(!is_empty($_SESSION['id'])):?>
        <a id="btnMe" href="/me"><?=$_SESSION['name']?></a>
    <?php endif;?>
    </div>
</nav>
<?php if(is_empty($_SESSION['id'])):?>
    <div class="l-form-wrapper">
        <form action="/auth/login" class="l-form" method="post">
            <input type="text" name="login" placeholder="Логин">
            <input type="password" required name="password" placeholder="Пароль">
            <input type="submit" required value="Войти">
        </form>    
    </div>
<script>$(".nav-b-login").on("click",(e)=>{let target = e.currentTarget;$(".l-form-wrapper").toggleClass("l-form-wrapper-a");})</script>
<?php endif;?>