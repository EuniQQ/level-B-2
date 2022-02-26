<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td>人氣</td>
        </tr>

        <?php
        $tarray=[
            "1"=>"健康新知",
            "2"=>"菸害防治",
            "3"=>"癌症防治",
            "4"=>"慢性病防治",
        ];
          

        // 分頁碼    
        $all=$News->math("count","*",['sh'=>1]);
        $div=5;
        $pages=ceil($all/$div); //總筆數除以五(每頁五筆)。ceil()=無條件進位
        $now=$_GET['p']??1;   //目前頁數
        $start=($now-1)*$div;   //每一頁的開始值()


        //文章要照人氣由高到低排序，所以先用ORDER BY語法的desc做遞減排序
        //再從排序的結果中限制要取出的分頁段資料
        $rows=$News->all(['sh'=>1],"order by `good` desc limit $start,$div");  
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
                <div class="pop" style="display:none;">
                    <h2 style="color:skyblue"><?=$tarray[$row['type']];?></h2>
                    <!-- 使用nl2br() 來幫文章自動加上斷行標籤<br> -->
                    <?=nl2br($row['text']);?>
                </div>
            
            </td>


            <td>
                <span><?=$row['good'];?></span>個人說<img src="icon/02B03.jpg" style="width:25px">
            
                <?php
                if(isset($_SESSION['login'])){
                    $chk=$Log->math('count','*',['news'=>$row['id'],'user'=>$_SESSION['login']]);
                    if($chk>0){
                        echo "<a class='g' data-news='{$row['id']}' data-type='1'>收回讚</a>";
                    }else{
                        echo "<a class='g' data-news='{$row['id']}' data-type='2'>讚</a>";

                    }
                }
                ?>
            </td>
        </tr>

        <?php } ?>

    </table>
        <div>
            <?php
            // 上一頁按鈕
            if(($now-1)>0){
                $prev=$now-1;
                echo "<a href='?do=pop&p=$prev'>";
                echo "<"; 
                echo "</a>";
            }

            for($i=1;$i<=$pages;$i++){
                $fontsize=($now==$i)?"24px":"16px"; //頁數列中，當前頁的字數放大
                echo "<a href='?do=pop&p=$i' style='font-size:$fontsize'>"; 
                echo $i;
                echo "</a>";
            }

            // 下一頁按鈕
            if(($now+1)<=$pages){
                $next=$now+1;
                echo "<a href='?do=pop&p=$next'>";
                echo ">"; 
                echo "</a>";
            }

            ?>
        </div>

</fieldset>

<script>
    $(".switch").hover(function(){
    $(this).parent().find(".pop").toggle()
    })

    $(".g").on("click",function(){
        let type=$(this).data('type')
        let news=$(this).data('news')
        $.post("api/good.php",{type,news},()=>{
            location.reload()
        })
    })
</script>