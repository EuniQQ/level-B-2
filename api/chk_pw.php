<?php include_once "../base.php";

$chk=$User->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk>0){
    $_SSESSION['login']=$_POST['acc'];
    echo 1;
}else{
    echo 0;
}