//js/ajax.js
function ajax({type,url,data,dataType}){
	return new Promise(success=>{
		//1.创建xhr异步对象
		var xhr=null;
		if(window.XMLHttpRequest){
			xhr=new XMLHttpRequest();
		}else{
			xhr=new ActiveXObject("Microsoft.XMLHttp");
		}
		//2.绑定监听事件
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4&&xhr.status==200){
				if(dataType==="json")
					success(JSON.parse(xhr.responseText));
				else
					success(xhr.responseText);
			}
		}
		if(type==="get"&&data!==undefined)
			url+="?"+data;
		//3.打开连接 
		xhr.open(type,url,true);
		//4.发送请求
		if(type==="post"&&data!==undefined)
			xhr.send(data);
		else
			xhr.send(null);
	})
}

