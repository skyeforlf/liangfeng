window.onload = function(){
	//check_address();
}
function check_address(){
	var form = document.getElementById('sure-pay');
	form.onsubmit = function(){
		if(form.deliver_meal_address.value.length<1||form.deliver_meal_address.value.length>20){
			alert('送餐地址格式不正确！');
			form.deliver_meal_address.value = '';
			form.deliver_meal_address.value.focus();
			return false;
		}
	}	
}