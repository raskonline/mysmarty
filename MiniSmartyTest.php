<?php
$title = "从前慢";
$content = "从前的火车、邮件慢，一生只够爱一个人。";

require_once "MiniSmarty.class.php";

$miniSmarty=new MiniSmarty();
$miniSmarty->assign("title",$title);
$miniSmarty->assign("content",$content);
$miniSmarty->display("02tpl_S2.html");