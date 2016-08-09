window.onload = function(){
	var dl = document.getElementsByTagName('dl');
	for(var i = 0;i<dl.length;i++){
		dl[i].onclick = function(){
			var dt = this.getElementsByTagName('dt');
			if(dt[0].style.display!="block"){
				dt[0].style.display = "block";
			}else{
				dt[0].style.display = "none";
			}
		}
	}
	setInterval("resend()",300000);
}
function resend(){
	location.href='new_form.php';
}