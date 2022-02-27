<?php include_once "../base.php";

$que=$Que->find($_POST['opt']);
$que['count']++;
$subject=$Que->find($que['parent']);
$subject['count']++;

$Que->save($subject);
$Que->save($que);

to("../index.php?do=result&id=".$subject['id']);