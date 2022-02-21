<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="30%">內容</td>
            <td width="30%">人氣</td>
            <td></td>
        </tr>

        <?php
        $all=$News->math('count',"*");
        $div=5;
        $pages=ceil($all/$div); //總筆數除以五(每頁五筆)。ceil()=無條件進位
        $now=$_GET['p']??"1";   //目前頁數
        $start=($now-1)*$div;   //每一頁的開始值()

        $rows=$News->all(['sh'=>1],"limit $start,$div");  
        //limit(資料庫查詢開始筆數(從0開始，不是1)，想查詢的總筆數)
        foreach($rows as $key => $row){
        ?>

        <tr>
            <!-- 標題 -->
            <td class="switch" style="background-color:#DCDCDC"><?=$row['title'];?></td>
            <!-- 內容 -->
            <td class="switch">
                <!-- 在第二欄位建立兩個區塊： -->
                <!-- 文章的部份文字 -->
                <div class="t-short"><?=mb_substr($row['text'],0,20);?>...</div>
                <!-- 文章的完整內容,並預設隱藏 -->
                <div class="t-full" style="display:none;"><?=nl2br($row['text']);?></div>
            </td>
            <td></td>
        </tr>

        <?php } ?>

    </table>
        <div>
            <?php
            // 上一頁按鈕
            if(($now-1)>0){
                $prev=$now-1;
                echo "<a href='?do=news&p=$prev'>";
                echo "<"; 
                echo "</a>";
            }

            for($i=1;$i<=$pages;$i++){
                $fontsize=($now==$i)?"20px":"16px"; //頁數列中，當前頁的字數放大
                echo "<a href='?do=news&p=$i' style='font-size:$fontsize'>"; 
                echo $i;
                echo "</a>";
            }

            // 下一頁按鈕
            if(($now+1)<=$pages){
                $next=$now+1;
                echo "<a href='?do=news&p=$next'>";
                echo ">"; 
                echo "</a>";
            }

            ?>
        </div>

</fieldset>

<script>
    //在樣式switch上註冊click事件
    $(".switch").on("click",function(){
    //不管點擊的是哪個switch，都先到上一層的tr去
    //然後在tr中尋找子元素t-full及t-short
    //利用toggle()函式來對t-full及t-short做顯示的切換
    $(this).parent().find(".t-full,.t-short").toggle();
    })
</script>