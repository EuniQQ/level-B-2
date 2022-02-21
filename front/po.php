<!-- 分類網誌 -->
<div>目前位置:首頁 > 分類網誌 > <span id="navtype">健康新知</span></div>
<div style="display:flex;margin-left:10px">
  <fieldset style="width:20%">
  <legend>分類項目</legend>
    <a><div class="type" id="t1">健康新知</div></a> 
    <a><div class="type" id="t2">菸害防治</div></a>
    <a><div class="type" id="t3">癌症防治</div></a>
    <a><div class="type" id="t4">慢性病防治</div></a>
  </fieldset>
  <fieldset style="width:70%">
  <legend>文章列表</legend>
    <div id="newsList"></div>
    <div id="news"></div>
  </fieldset>
</div>

<script>
    //先載入type1的文章列表
    getlist(1)

    //註冊class type的點擊事件
    $(".type").on("click",function(){
        //取出點擊的文字並放入導航列中
        $("#navtype").text($(this).text())

        //取得點擊的dom的id,並拆出type的部分
        let type=$(this).attr('id').replace('t','') //把t取代成空白

        //執行取得分類列表函式
        getlist(type)
    })

    //取得分類列表函式
    function getlist(type){
        $.get("api/getlist.php",{type},(list)=>{
            $("#newslist").html(list)

            //切換要顯示的區塊
            $("#newsList").show();
            $("#news").hide();
        })
    }


    //取得指定文章內容函式
    function getpost(id){
        $.get("api/getnews.php",{id},(post)=>{
            $("#news").html(post)

            //切換要顯示的區塊
            $("#newsList").hide();
            $("#news").show();
        })
    }
</script>