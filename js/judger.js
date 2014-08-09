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

function loadXmlHttpObject(url){
 alert("loadXmlHttpObject");
	var xmlHttpRequest; //定义一个全局对象
    var textHTML;
	if(window.ActiveXObject){ //IE的低版本系类
		xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
 	}else{
			xmlHttpRequest = new XMLHttpRequest(); //非IE系列的浏览器，但包括IE7 IE8
		}	
		
		xmlHttpRequest.open("get",url,true);
											
		xmlHttpRequest.onreadystatechange=function(){
		if(xmlHttpRequest.readyState == 4){
			if(xmlHttpRequest.status == 200){
				 textHTML=xmlHttpRequest.responseText;
            alert(textHTML);
            } 
        }
    };
        xmlHttpRequest.send(null);
		return "false";
}

	
function check_input_pwd(userid, passwd,errorbox) {


    var pwd = document.getElementById(passwd).value;
	var url = "judger_login.class.php?id="+userid+"&passwd="+pwd;
	var  result;
	

    if (pwd =="") {
        document.getElementById(errorbox).innerHTML="请输入确认密码!";
     return false;   
    }
    result = loadXmlHttpObject(url);
    
     if("false" == result){
        document.getElementById(errorbox).innerHTML="你输入的密码有误，请重新输入!";
        return false;
    }else{
		return true;
	}
}


	
