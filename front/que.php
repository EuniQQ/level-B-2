<fieldset>
    <legend>目前位置:首頁 > 問卷調查</legend>
    <table style="width:95%;margin:auto">
    <tr>
        <th width="10%">編號</th>
        <th width="50%">問卷題目</th>
        <th width="10%">投票總數</th>
        <th width="10%">結果</th>
        <th>狀態</th>
    </tr>

    <?php
        $ques=$Que->all(['parent'=>0]);
        foreach($ques as $key=>$que){
    ?>
    <tr>
        <td class="ct"><?=$key+1;?></td>
        <td class="ct"><?=$que['text'];?></td>
        <td class="ct"><?=$que['count'];?></td>
        <td class="ct"><a href="?do=result&id=<?=$que['id'];?>">結果</a></td>
        <td class="ct">
            <?php
                if(isset($_SESSION['login'])){
                    echo "<a href='?do=vote&id={$que['id']}'>參與投票</a>";
                }else{
                    echo "請先登入";
                }
            ?>
        </td>
    </tr>
    <?php
        }
    ?>

    </table>
</fieldset>