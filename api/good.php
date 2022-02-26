<?php include_once "../base.php";


$news=$News->find($_POST['news']); //news=被收回讚的文章id
$type=$_POST['type'];

switch($type){
    case 1: //收回讚
        $sql=$Log->del(['news'=>$news['id'],'user'=>$_SESSION['login']]); //刪除按讚紀錄        
        $news['good']--;
        $News->save($news);
        break;

    case 2: //按讚
        $Log->save(['news'=>$news['id'],'user'=>$_SESSION['login']]);
        $news['good']++;
        $News->save($news);
        break;

    

}


?>