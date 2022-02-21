<?php include_once "../base.php";

$acc=$_POST['acc'];

$chk=$User->math('count','*',['acc'=>$acc]); //計算資料表acc欄位等於傳過來$acc的有幾筆

if($chk>0){
    echo 1;
}else{
    echo 0;
}