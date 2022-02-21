<!-- 分類網誌 -->
<div>目前位置:首頁 > 分類網誌 > <span id="navtype">健康新知</span></div>
<div style="display:flex;margin-left:10px">
  <fieldset style="width:20%">
  <legend>分類項目</legend>
    <a><div class="type" data-type="1">健康新知</div></a> 
    <a><div class="type" data-type="2">菸害防治</div></a>
    <a><div class="type" data-type="3">癌症防治</div></a>
    <a><div class="type" data-type="4">慢性病防治</div></a>
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
        let navtype=$(this).text() //取得分類項目名稱
        $("#navtype").text(navtype) //加到導覽列
        let type=$(this).data('type') //取得data-type的值

        //執行取得分類列表函式
        getlist(type)
    })

    //取得分類列表函式
    function getlist(type){
        $.get("api/getlist.php",{type},(list)=>{
            $("#newsList").html(list)

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