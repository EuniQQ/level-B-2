<!-- 取得文章內容 -->
<?php include_once "../base.php";

$id=$_GET['id'];

//取得指定id的文章
$news=$News->find($id);

//利用n12br()函式把文章的斷行加上<br>
echo n12br($news['text']);

//或是利用<pre></pre>來維持文章原本的格式
//echo "<pre>".$news['text']."</pre>";
