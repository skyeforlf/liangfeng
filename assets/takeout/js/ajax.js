var ajax;//定义的全局变量
//初始化XMLHttpRequest类，主要是为了解决各个浏览器不兼容做的
function createXHR(){
	if(typeof(XMLHttpRequest)!="undefined"){
		return 	new XMLHttpRequest();
	}else if(typeof ActiveXObject != "undefined"){
		if(typeof arguments.callee.activeXString != "string"){
			var versions = ["MSXML2.XMLHttp.6.0","MSXML2.XMLHttp.3.0","MSXML2.XMLHttp"];
			var i;
			var len;
			for(i = 0,len = versions.length;i<len;i++){
				try{
					new ActiveXObject(versions[i]);
					arguments.callee.activeXString = versions[i];
					break;
				}catch(ex){
					//跳过
				}
			}
		}
		return new ActiveXObject(arguments.callee.activeXString);
	}
	else{
		throw new Error("No XHR object available");
	}
}
//这里为ajax的异步传输主要函数
function doXHR(){
	ajax = createXHR();
	ajax.open("get","for.php?name=name",true);
	ajax.onreadystatechange = function(){
		var text = ajax.responseText;
		var id = document.getElementById('text');
		id.innerHTML = "ajshajshd"+text;
	}
	ajax.send(null);
}