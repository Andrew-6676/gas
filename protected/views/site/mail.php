<?php
//	var_dump(mail("andrew@vitebsk.oblgas.by", "My Subject", "Line 1\nLine 2\nLine 3"));
$message = 'message';
//$result = mail('andrevka@gmail.com', 'subject', 'message');
$result = mail("andrew@vitebsk.oblgas.by", "the subject", $message);

if($result)
{
    echo 'все путем';
}
else
{
    echo 'что-то не так';
}
?>

<style>
#div1
{
position: absolute;
z-index: 99999;
top: -147px;
left: 100px;
height: 150px;
width: 150px;
margin: 50px;
padding:10px;
/*border: 1px solid black;*/
-webkit-perspective:150px; /* Chrome, Safari, Opera  */
perspective:150px;
position:relative;
}

#div2
{
width:100px;
height:100px;
margin-top:90px;
position: absolute;
border: 1px solid black;
background-color: red;
/*-webkit-transform: rotateX(45deg); /* Chrome, Safari, Opera  */
transform: rotateX(0deg);
animation: login_3d 0.5s 1;

}

@keyframes login_3d{
0%{transform: rotateX(-80deg);margin-top:43px;width:70px;margin-left:20px;}
10%{transform: rotateX(-72deg);margin-top:50px;/*width:67px;margin-left:23px;*/}
20%{transform: rotateX(-64deg);margin-top:57px;/*width:67px;margin-left:23px;*/}
30%{transform: rotateX(-56deg);margin-top:63px;/*width:71px;margin-left:20px;*/}
40%{transform: rotateX(-48deg);margin-top:69px;/*width:73px;margin-left:19px;*/}
50%{transform: rotateX(-40deg);margin-top:75px;width:75px;margin-left:17px;}
60%{transform: rotateX(-32deg);margin-top:80px;width:80px;margin-left:14px;}
70%{transform: rotateX(-24deg);margin-top:84px;width:84px;margin-left:11px;}
80%{transform: rotateX(-16deg);margin-top:87px;width:88px;margin-left:8px;}
90%{transform: rotateX(-8eg);margin-top:90px;width:98px;margin-left:0px;}
100%{transform: rotateX(0deg);margin-top:90px;}
}
#div1:after{
position:absolute;
content: ' ';
display:block;
width:100px;
height:1px;
background:black;
top:100px;
}
</style>


<div id="div1">
  <div id="div2">

<ul id="sub_1" class="sub_menu">
<li><a href="/gas/page/strukt">Структура</a></li>
<li class="has_child"><a href="/gas/page?bazi">Производственные базы</a>
<ul id="sub_sub_1_2" class="sub_sub_menu">
<li><a href="/gas/page?bazi_teresh">Терешковой</a></li>
<li><a href="/gas/page?bazi_novka">Новка</a></li>
<li><a href="/gas/page?bazi_pank">Панковой</a></li>
<li><a href="/gas/page?bazi_brovki">Бровки</a></li>
<li><a href="/gas/page?bazi_mazolovo">Мазолово</a></li>
</ul>
</li>
<li><a href="/gas/page?contact">Контакты</a></li>
<li><a href="/gas/page?history">История</a></li>
<li><a href="/gas/page/galery">Галерея</a></li>
</ul>

  </div>
</div>
