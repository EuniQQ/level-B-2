<fieldset>
    <legend>最新文章管理</legend>
    <form action="../api/news.php" method="post">
        <table class="ct" style="width:80%;margin：auto">
            <tr>
                <th width="10%">編號</th>
                <th width="70%">標題</th>
                <th width="10%">顯示</th>
                <th>刪除</th>
            </tr>

            <?php
            $all=$News->math('count',"*");
            $div=3;
            $pages=ceil($all/$div); 
            $now=$_GET['p']??"1";   
            $start=($now-1)*$div;   //每一頁的開始值()

            $rows=$News->all("limit $start,$div");  
            //limit(資料庫查詢開始筆數(從0開始，不是1)，想查詢的總筆數)
            foreach($rows as $key => $row){
                $checked=($row['sh']==1)?"checked":"";
            ?>

            <tr >
                <td><?=$start+$key+1;?></td>
                <td><?=$row['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$checked?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?=$row['id']?>">

            <?php 
            } 
            ?>

        </table>

        <div class="ct">
        <?php
            // 上一頁按鈕
            if(($now-1)>0){
                $prev=$now-1;
                echo "<a href='?do=news&p=$prev'>";
                echo " < "; 
                echo "</a>";
            }

            for($i=1;$i<=$pages;$i++){
                $fontsize=($now==$i)?"20px":"16px"; //頁數列中，當前頁的字數放大
                echo "<a href='?do=news&p=$i' style='font-size:$fontsize'>"; 
                echo "&nbsp;$i";
                echo "</a>";
            }

            // 下一頁按鈕
            if(($now+1)<=$pages){
                $next=$now+1;
                echo "<a href='?do=news&p=$next'>";
                echo " > "; 
                echo "</a>";
            }
            ?>
        <br><button style="submit">確認修改</button>
        
    </div>
    </form>
</fieldset>