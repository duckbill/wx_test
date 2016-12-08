/**
 * Created by node1 on 16-11-20.
 */
var a=/^[\u4e00-\u9fa5]{2,4}$/;
    function init_input() {
        alert("test focus");
        //document.getElementById("showErrorMessage").innerHTML = '';
    }

    function judge(){
   // alert("just a test");
    var user = document.getElementById("q1").value;
        if(user.trim() == "") {
            document.getElementById("showErrorMessage").innerHTML = '姓名输入不为空！';
            return false;

        }
        else if(!a.exec(user))
        {
            document.getElementById("showErrorMessage").innerHTML = '姓名必须为2到4个汉字！';
        }
        else
        {
            window.location.href="success.html";
        }
        return true;

    }
    function lostfocus() {


    }