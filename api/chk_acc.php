<?php include_once "../base.php";

$acc=$_POST['acc'];

$chk=$User->math('count','*',['acc'=>$acc]); //計算acc這個欄位等於傳過來的$acc有幾筆

if($chk>0){
    echo 1;
}else{
    echo 0;
}