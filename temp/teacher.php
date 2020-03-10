<?php
    $p = $user->shcool_id;
    $a = qPost("/api/users/childrens","token=".$_SESSION['token']."&s=".$p);
?>
<div class="profile">
    <div class="p-wrapper">
        <div class="p-logo">
            <img style="pointer-events:none;" src="/static/png/avatar" width="100%" alt="">
        </div>
        <div class="p-info">
            <span>Пользователь: <?=$user->lastname?> <?=$user->name?> <?=$user->middlename?></span>
        </div>
    </div>
    <div class="t-wrapper">
        <div class="t-form-wrapper">
            <h3>Отправить уведомление</h3>
            <form class="t-form" id="AlertsForm" action="/api/alerts/add" method="post">
                <input type="text" required
 placeholder="Заголовок" name="t">
                <input type="text"  required
placeholder="Сообщение" name="m">
                <input type="hidden" required
 name="token" value="<?=$_SESSION['token']?>">
                <p style="margin:0;padding:0;">Введите имя ученика</p>
                <input type="text" required
 name="r" list="childrens"/>
                <datalist id="childrens" required
 placeholder="Имя ученика">
                <?php foreach($a->users as $us):?>
                    <option value="<?=$us->lastname?> <?=$us->name?> <?=$us->middlename?>" data-value="<?=$us->id?>"></option>
                <?php endforeach;?>
                </datalist>
                <input type="submit" value="Отправить">
            </form>
            <script type="text/javascript">
                function pageAlert(event,message){
                    $.notify(message, event,{clickToHide: true,autoHide: true,autoHideDelay: 1000});                    
                }
                $( "#AlertsForm" ).submit(async function( event ) {
                    console.log("Form action disabled srry");
                    event.preventDefault();//disable redirect))
                    let element = event.currentTarget,
                    formData = $( "#AlertsForm" ).serializeArray(),
                    receiver = $(`option[value="${formData[3].value}"]`).attr("data-value");
                    if(!receiver){
                        //send error
                        return pageAlert("error","Пользователь не найден");
                    }
                    console.log(receiver,formData);
                    let sendAlert = await fetch('/api/alerts/add', {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `token=${token}&t=${formData[0].value}&m=${formData[1].value}&r=${receiver}`
                    }),
                    answer = await sendAlert.json();
                    if(answer.success){
                        $("#AlertsForm").each(function(){
                            this.reset();
                        });
                        console.log("Alert was sended");
                        return pageAlert("success","Сообщение отправлено");
                    }else{
                        console.warn(`Alert wasn't sended errCode: ${answer.error} errMessage: ${answer.message}`);
                        return pageAlert("error","Сообщение не доставлено");
                    }
                });

                //const _0xbb1d=['log','/api/alerts/add','Form\x20action\x20disabled\x20srry','option[value=\x22','preventDefault','json','attr','warn','success','message','token=','value','Alert\x20wasn\x27t\x20sended\x20errCode:\x20','#AlertsForm','POST','&r=','data-value','serializeArray','submit','application/x-www-form-urlencoded'];(function(_0x9fb79a,_0xbb1d4d){const _0x2a09f4=function(_0x15f5c3){while(--_0x15f5c3){_0x9fb79a['push'](_0x9fb79a['shift']());}};_0x2a09f4(++_0xbb1d4d);}(_0xbb1d,0x8d));const _0x2a09=function(_0x9fb79a,_0xbb1d4d){_0x9fb79a=_0x9fb79a-0x0;let _0x2a09f4=_0xbb1d[_0x9fb79a];return _0x2a09f4;};$(_0x2a09('0xc'))[_0x2a09('0x11')](async function(_0x130565){console[_0x2a09('0x13')](_0x2a09('0x1'));_0x130565[_0x2a09('0x3')]();let _0x14589d=$('#AlertsForm')[_0x2a09('0x10')](),_0x26dbc5=$(_0x2a09('0x2')+_0x14589d[0x3][_0x2a09('0xa')]+'\x22]')[_0x2a09('0x5')](_0x2a09('0xf')),_0x5c621b=await fetch(_0x2a09('0x0'),{'method':_0x2a09('0xd'),'headers':{'Content-Type':_0x2a09('0x12')},'body':_0x2a09('0x9')+token+'&t='+_0x14589d[0x0][_0x2a09('0xa')]+'&m='+_0x14589d[0x1][_0x2a09('0xa')]+_0x2a09('0xe')+_0x26dbc5}),_0x36e96d=await _0x5c621b[_0x2a09('0x4')]();if(_0x36e96d[_0x2a09('0x7')]){console['log']('Alert\x20was\x20sended');}else{console[_0x2a09('0x6')](_0x2a09('0xb')+_0x36e96d['error']+'\x20errMessage:\x20'+_0x36e96d[_0x2a09('0x8')]);}});
            </script> 
        </div>
    </div>
</div>