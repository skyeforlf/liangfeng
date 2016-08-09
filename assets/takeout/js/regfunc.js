window.onload =function(){
	form_check();
	code();
}
/**
 * 表单的验证函数
 */
function code(){
	var code = document.getElementById('codeimg');
	code.onclick = function(){
		this.src = "code.php?mt="+Math.random();
	}
}
function form_check(){
	var fm = document.getElementsByTagName('form')[0];
	fm.onsubmit = function(){
		if(fm.v_name.value.length<2||fm.v_name.value.length>8){
			alert('昵称不得小于两位或者大于8位！');
			fm.v_name.value = '';
			fm.v_name.focus();
			return false;
		}
		if(/[!@#$%^<>&*\'\ \"]/.test(fm.v_name.value)){
			alert('昵称不得包含非法字符！');
			fm.v_name.value = '';
			fm.v_name.focus();
			return false;
		}
		if(fm.name.value.length<2||fm.name.value.length>8){
			alert('姓名不得小于2位或者大于8位！');
			fm.name.value = '';
			fm.name.focus();
			return false;
		}
		if(/[!@#$%<>^&*\ \'\"]/.test(fm.name.value)){
			alert('姓名不得包含非法字符！')	;
			fm.name.value = '';
			fm.name.focus();
			return false;
		}
		if(fm.stuid.value.length!=8){
			alert('南农的学号必须是8位的纯数字！');
			fm.stuid.value = '';
			fm.stuid.focus();
			return false;
		}
		if(!/[0-9]/.test(fm.stuid.value)){
			alert('学号位八位纯数字，请检查！');
			fm.stuid.value = '';
			fm.stuid.focus();
			return false;
		}
		if(fm.password.value.length<6||fm.password.value.length>40){
			alert('密码长度不得小于6位或者大于40位！');
			fm.password.value = '';
			fm.mate_pwd.value = '';
			fm.password.focus();
			return false;
		}
		if(fm.password.value!=fm.mate_pwd.value){
			alert('密码和密码确认不一致！');
			fm.password.value = '';
			fm.mate_pwd.value = '';
			fm.password.focus();
			return false;	
		}
		if(/[!@#$%^<>&*\ \'\ \"]/.test(fm.password.value)){
			alert('密码不得包含非法字符！');
			fm.password.value = '';
			fm.mate_pwd.value = '';
			fm.password.focus();
			return false;
		}
		if(fm.answer.value.length<1||fm.answer.value.length>20){
			alert('答案长度不得小于1位或者大于20位！');
			fm.answer.value = '';
			fm.answer.focus();
			return false;
		}
		if(/[!@#$%<>^&*\ \'\ \"]/.test(fm.answer.value)){
			alert('回答不得包含非法字符！');
			fm.answer.value = '';
			fm.answer.focus();
			return false;
		}
		if(!/^[1-9]{1}[0-9]{5,10}$/.test(fm.qq.value)){
			alert('QQ号格式不正确！');
			fm.qq.value = '';
			fm.qq.focus();
			return false;
		}
		if(fm.address.value.length<1||fm.address.value.length>40){
			alert('地址长度不得小于1位或者大于40位！');
			fm.address.value = '';
			fm.address.focus();
			return false;
		}
		if(/[!@#$%^&<>*\ \'\ \"]/.test(fm.address.value)){
			alert('地址不得包含非法字符！');
			fm.address.value = '';
			fm.address.focus();
			return false;
		}
		if(fm.grade.value.length<4||fm.grade.value.length>20){
			alert('请认真查看你的班级是否有误！');
			fm.grade.value = '';
			fm.grade.focus();
			return false;
		}
		if(/[!@#$%^<>&*\ \'\ \"]/.test(fm.grade.value)){
			alert('班级内容不得包含非法字符！');
			fm.grade.value = '';
			fm.grade.focus();
			return false;
		}
	}
}
function brithday(){
	year("year");
	var years = document.getElementById("year").getElementsByTagName("option");
	var y,m,daynum;
	for(var i=0;i<20;i++){
		month("month");
		years[i].onclick = function(){
			y = this.value;
			if(y){
				day("day",0);
				var months = document.getElementById("month").getElementsByTagName("option");
				for(var i=0;i<=12;i++){
					months[i].onclick = function(){
						m = this.value;
						if(m==1||m==3||m==5||m==7||m==8||m==10||m==12){
							daynum = 31;
						}else if(m==4||m==6||m==9||m==11){
							daynum = 30;
						}else if(LeapYear(y)){
							daynum = 29;
						}else{
							daynum = 28;
						}
						day("day",daynum);
					};
				}
			}
        };
    }   
}
function year(id){
    var year = document.getElementById(id);
   	var time = new Date();
	var nowyear =time.getFullYear()-10;
	var agoyear = nowyear - 20;
	for(nowyear;nowyear>agoyear;nowyear--){
        year.innerHTML+='<option value="'+nowyear+'">'+nowyear+'年';
    }
}
function month(id){
    var month = document.getElementById(id);
    month.innerHTML='<option>月';
	for(var i=1;i<13;i++){
        month.innerHTML+='<option value="'+i+'">'+i+'月';
    }
}
function day(id,daynum){
    var day = document.getElementById(id);
    day.innerHTML='<option>日';
	for(var i=1;i<=daynum;i++){
        day.innerHTML+='<option value="'+i+'">'+i+'日';
    }
}
function LeapYear(y){
    if((y%4==0&&y%100!=0)||y%400==0){
         return true;
    }else{
         return false;
    }
}