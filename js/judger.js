///修改模态框中数据
function searchform(modal_pwd) {

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
       val="";
       alert("你输入队号不存在,请重新输入!");
       $('#myModal').modal('hide');
   }else{
       // $('#myModal').modal('show');
       $('#myModal').on('show.bs.modal',function(){
       document.getElementById(modal_pwd).focus();
     });
   }

}

function enterkeysearch(evt,modal_pwd)
{
evt = (evt) ? evt : ((window.event) ? window.event : "") //兼容IE和Firefox获得keyBoardEvent对象
  var key = evt.keyCode?evt.keyCode:evt.which; //兼容IE和Firefox获得keyBoardEvent对象的键值
  if(key == 13){ //判断是否是回车事件。
  searchform(modal_pwd);
 }
}

function loadXmlHttpObject(url){
 // alert("loadXmlHttpObject");
	var xmlHttpRequest; //定义一个全局对象
   var textHTML;
	if(window.ActiveXObject){ //IE的低版本系类
		xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
 	}else{
			xmlHttpRequest = new XMLHttpRequest(); //非IE系列的浏览器，但包括IE7 IE8
		}	
		
                                            
        xmlHttpRequest.onreadystatechange=function(){
        if(xmlHttpRequest.readyState == 4){
            if(xmlHttpRequest.status == 200){
                 textHTML=xmlHttpRequest.responseText;
            } 
        }
    };

		xmlHttpRequest.open("get",url,false);
        xmlHttpRequest.send(null);
		return textHTML;
}

//judger.php	
function check_input_pwd(userid, passwd,errorbox,formid) {


    var pwd = document.getElementById(passwd).value;
	var url = "judger_login.class.php?id="+userid+"&passwd="+pwd;
	var  result;
	

    if (pwd =="") {
        document.getElementById(errorbox).innerHTML="请输入确认密码!";
     return -1;   
    }
    result = loadXmlHttpObject(url,errorbox);

    if ("false" == result)
    {
        document.getElementById(errorbox).innerHTML="你输入的密码有误，请重新输入!"
        document.getElementById(errorbox).value="";
        return -1;
    }

    document.getElementById(formid).setAttribute("type","submit");

}
//judger_login.php
function check_login(userid, passwd,errorbox,formid)
{
    var user=document.getElementById(userid).value;
    // alert(user);
    if(user == "")
    {
          document.getElementById(errorbox).innerHTML="请输入用户名!";
     return; 
    }
    check_input_pwd(user, passwd,errorbox,formid);
    return;
}


//judger_login.php
function subkeycheck(evt,userid, passwd,errorbox,formid)
{
 evt = (evt) ? evt : ((window.event) ? window.event : "") //兼容IE和Firefox获得keyBoardEvent对象
  var key = evt.keyCode?evt.keyCode:evt.which; //兼容IE和Firefox获得keyBoardEvent对象的键值
  if(key == 13){ //判断是否是回车事件。
  check_login(userid, passwd,errorbox,formid);
  }
}
//judger.php
function subkeyjudger(evt,userid, passwd,errorbox,formid) 
{
  var flag;
   evt = (evt) ? evt : ((window.event) ? window.event : "") //兼容IE和Firefox获得keyBoardEvent对象
  var key = evt.keyCode?evt.keyCode:evt.which; //兼容IE和Firefox获得keyBoardEvent对象的键值
  if(key == 13){ //判断是否是回车事件。
    flag = check_input_pwd(userid, passwd,errorbox,formid);
    if (-1 == flag)
      return false;
  }
return true;
}
	
