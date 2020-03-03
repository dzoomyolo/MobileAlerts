<?php
$path = "/me";
if(is_empty($_SESSION["name"])) exit(notfound());
$user = qPost("/api/users/get","token=".$_SESSION['token']);
$user = $user->user;
require_once("./temp/head.php");
require_once("./temp/nav.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>
<div class="profile">
    <div class="p-wrapper">
        <div class="p-logo">
            <img style="pointer-events:none;" src="/static/png/avatar" width="100%" alt="">
        </div>
        <div class="p-info">
            <span>Пользователь: <?=$user->lastname?> <?=$user->name?> <?=$user->middlename?></span>
        </div>
    </div>
    <div class="alerts-wrapper">
        <h2>Уведомления</h2>
        <div class="alerts-scroll">
        </div>
    </div>
</div>

<script>
(()=>{fetchAlerts()})();
async function getAlerts(token){
    let alertsAnswer = await fetch('/api/users/alerts', {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `token=${token}`
    });
    let alerts = await alertsAnswer.json();
    return Promise.resolve(alerts);
}
function fetchAlerts(){
    getAlerts(token).then(a=>{
        $('.alerts-scroll').empty();
        a.alerts.map(e=>{
        $('.alerts-scroll').append(`
            <div class="alert">
                <div class="alert-content">
                    <div class="alert-header">
                        <h3>${e.title}</h3>
                    </div>
                    <div class="alert-body">
                        <span>${e.message}</span>
                    </div>
                </div>
            </div>`);    
        })
    })
}
$(".alert").on("swipeleft",()=>{
    console.log("Swipe left side");
    $(".alert").swipe({swipeLeft:(()=>{
        console.log("Swipe left side");
    })});
})
// setInterval(() => {
//     fetchAlerts();
// }, 5000);
</script>

<?php
require_once("./temp/footer.php");
?>