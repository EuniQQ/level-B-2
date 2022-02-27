<?php
    $que=$Que->find($_GET['id']);
?>

<fieldset>
<legend>目前位置 ：　首頁　> 問卷調查 > <?=$que['text'];?></legend>
<div style="font-weight:bolder"><?=$que['text'];?></div>

        <?php
            $opts=$Que->all(['parent'=>$que['id']]);
            foreach($opts as $key => $opt){
                $total=($que['count']>0)?$que['count']:1;
                $rate=round($opt['count']/$total,2); //四捨五入到小數第二位
                $length=80*$rate;
                $num=$rate*100;

        ?>
                <div style='display:flex'>
                    <!-- 題目 -->
                    <div style='width:40%'>
                        <p><?=$key+1;?>.<?=$opt['text'];?></p>                      
                    </div>
                    <!-- 長條圖 -->
                    <div style='width:60%;'>
                       <div style='display:inline-block;
                                   height:25px;
                                   background:#ccc;
                                   width:<?=$length?>%'>
                       </div>
                       <div style='display:inline-block;'><?=$opt['count']?>票(<?=$num?>%)</div>
                    </div>
                </div>
        <?php
            }
        ?>
        <div class="ct">
            <button onclick="location.href='?do=que'">返回</button>
        </div>


</fieldset>