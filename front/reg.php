<fieldset>
    <legend>會員註冊</legend>
    <div style="color:red">請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>

        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>

        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>

        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>

        <tr>    
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="reset()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>

<script>
    function reset(){
        //透過.val() ----value取得input裡的值
        $("#acc,#pw,#pw2,#email").val("") //把value都設成空白
    }

    function reg(){
        let regs={ //宣告regs(變數)是物件格式(兩個大誇號包起來的)
            acc:$("#acc").val(), 
            //他有個acc的欄位(用冒號，不是箭頭)，這欄位是來自畫面上#acc這個欄位的value。
            //物件之間用逗號分開
            pw:$("#pw").val(),
            pw2:$("#pw2").val(),
            email:$("#email").val()
        }

        //寫法一：
        //regs的acc是空值
        if(regs.acc == '' || regs.pw=='' || regs.pw2=='' || regs.email==''){ 
        //寫法二：if(Object.values(regs).indexOf('')>=0) 表示空白是存在的
            alert("不得空白")
        }else{
            if(regs.pw!=regs.pw2){
                alert("密碼錯誤")
            }else{
                //$.post('表單送出目的',{一堆資料內容},送出後做甚麼動作)=>{}
                $.post('api/chk_acc.php',{acc:regs.acc},(chk)=>{
                                    //acc:資料來源是regs裡的acc
                                    //(chk)可自取名稱(ex.result)，表示檢查完的結果
                    
                    //用parseInt()包起來，確保它一定是數字                
                    if(parseInt(chk)==1){ //要與後端人員說好，這裡預設true(1)/faulse(0)
                        alert("帳號重複")
                    }else{
                        delete regs.pw2; //js刪除物件內容的寫法。資料表沒有pw2欄位
                                            //result
                        $.post('api/reg.php',regs,(res)=>{
                            alert("註冊完成,歡迎加入")
                            location.href='index.php?do=login'
                        // }else{    
                            // alert("註冊失敗")            
                            })
                        }
                    })
                }
            }
    }
</script>