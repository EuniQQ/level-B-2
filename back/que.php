<fieldset>
    <legend>新增問卷</legend>
    <form action="api/add_que.php" method="post">
        <!-- 主題 -->
        <div style="display:flex">
            <div>問卷名稱</div>
            <div><input type="text" name="subject" id="subjact"></div>
        </div>
        <!-- 選項 -->
        <div id="options">
            <label for="options">選項</label>
            <input type="text" name="opt[]">
            <input type="button" value="更多" onclick="more()">
        </div>
        <!-- 按鈕 -->
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>

    </form>
</fieldset>

<script>
    function more(){
        let opt=`<div><label for="options">選項</label>
                 <input type="text" name="opt[]"></div>`;
        $("#options").prepend(opt)
    }
</script>