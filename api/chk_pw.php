<?php include_once "../base.php";

$chk=$User->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk>0){
    $_SESSION['login']=$_POST['acc'];  //記錄會員登入狀況
    echo 1;
}else{
    echo 0;
}