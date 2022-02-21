<!-- 取得文章列表 -->
<?php include_once "../base.php";

$type=$_GET['type'];

//取得所有指定分類的文章
$posts=$News->all(['type'=>$type]);

//用迴圈印出title文字和link內容
foreach($posts as $post){

    //在點擊事件的函式中寫入此文章id
    echo "<p><a href='#' onclick='getpost({$post['id']})'>";
    echo $post['title'];
    echo "</a></p>";
    
}