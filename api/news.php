<?php include_once "../base.php";

foreach($_POST['id'] as $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);

    }else{
        $news=$News->find($id);
        $news['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $News->save($news);

        //若取消勾選「顯示」，該筆的id會列在$_POST['id']中，
        //但不會列在$_POST['sh']中
        //勾選「顯示」時，它的id才會列在$_POST['sh']中
    }
}

?>