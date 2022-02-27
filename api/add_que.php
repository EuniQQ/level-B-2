<?php include_once "../base.php";
//先儲存題目，得到主題id
if(isset($_POST['subject'])){
    $Que->save(['text'=>$_POST['subject'],'parent'=>0,'count'=>0]);
    $parent=$Que->math("max","id"); //取id欄位最大值(即最新新增的)

//再以主題id成為parent值，存入選項
    if(isset($_POST['opt'])){
        foreach($_POST['opt'] as $opt){
            $Que->save(['text'=>$opt,'parent'=>$parent,'count'=>0]);
        }
    }

}
to("../back.php?do=que");