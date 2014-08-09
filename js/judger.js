///修改模态框中数据
function search() {


    var val = document.getElementById("Team").value;
    if (val == "") {
        alert("请输入队伍编号！");
    }
    var score=document.getElementById("team_score").value;
    var info = document.getElementById("info"); //表格
    var span = document.getElementById('text_team_name');
    var modal_score = document.getElementById("text_team_score");
    var team_name;
    var flag = false;
    for (var i = 1; i < info.rows.length; i++) {
        var cell_value = info.rows[i].cells[0].innerHTML;

        if (val == cell_value) {
            team_name = info.rows[i].cells[1].innerHTML;
            span.innerHTML = team_name;
            flag = true;
            break;
        }
    }
    if (score == "") {
        score = 1;
    }
    modal_score.innerHTML = score;
    document.getElementById("hidden_team_name").value=val;
    document.getElementById("hidden_team_score").value=score;
   
if (false == flag) {
        alert("你输入队号不存在,请重新输入!");
        $('#myModal').modal('hide');
    }else{
        $('#myModal').modal('show');
    }
}

function loadXmlHttpObject(url,error_userid){
//alert("loadXmlHttpObject");
	var xmlHttpRequest; //定义一个全局对象
	if(window.ActiveXObject){ //IE的低版本系类
		xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
 	}else{
			xmlHttpRequest = new XMLHttpRequest(); //非IE系列的浏览器，但包括IE7 IE8
		}	
		
		xmlHttpRequest.open("get",url,true);
											
		xmlHttpRequest.onreadystatechange=function(){
		if(xmlHttpRequest.readyState == 4){
			if(xmlHttpRequest.status == 200){
				var textHTML=xmlHttpRequest.responseText;
				var info;	
				if(false == textHTML)
				{
					info = "用户名或密码输入错误!";
					document.getElementById(error_userid).innerHTML=info;
				//	document.getElementById(submit).disabled=true;
					return false;
				}
					
			} 
		}
	};
		xmlHttpRequest.send(null);
		return true;
}

	
function check_input_pwd(userid, passwd,errorbox) {

    var pwd = document.getElementById("modal_pwd").value;
	var url = "../judger_login.class.php?id="+userid+"&pwd="+passwd;
	alert(url);
	var  result;
	
	   result = loadXmlHttpobject(url,errorbox);

    if (pwd =="") {
        alert("请输入确认密码!");
     return false;   
    }else if(false == result){
        return false;
    }else{
		return true;
	}
}


	
