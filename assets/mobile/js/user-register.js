/**
 * Created by liangfeng on 16/8/3.
 */
$(function(){
    userRegister.init();
});

var userRegister = {

    mobileUrl : "http://www.liangfeng.com/index.php?r=mobile/",

    init : function(){
        //$.alert('测试');

        var that = this;

        $(document).on("click",".js-register-btn",function(){

            (function(){
                var name = $("input[name='username']").val();
                if(name == ''){
                    $.alert("用户名不能为空!");
                    return false;
                }
                if(/[!@#$%^&*()<>,:\'\" ]/.test(name)){
                    $.alert("用户名包含非法字符!");
                    return false;
                }else{
                    return true;
                }
            })() ? (function(){
                if(/^1[3|4|5|7|8]\d{9,9}$/.test($("input[name='tel']").val())){
                    return true;
                }else{
                    $.alert("电话号码格式不正确!");
                    return false;
                }
            })() ? (function(){
                var pwd = $("input[name='password']").val();
                if(pwd.length>20||pwd.length<6){
                    $.alert("密码的长度不得小于6位并且大于20位!");
                    return false;
                }
                var reg = /[!#$%^&*()<>\'\",\/]/;
                if(reg.test(pwd)){
                    $.alert("密码不得包含非法字符!");
                    return false;
                }else{
                    return true;
                }
            })() ? (function(){
                var sex = $("select[name='sex']").val();
                if(sex!="男" && sex!="女"){
                    $.alert("性别只有男女,请不要随便更改下拉列表的值!");
                    return false;
                }else{
                    return true;
                }
            })() ? (function(){
                var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(reg.test($("input[name='email']").val())){
                    return true;
                }else{
                    $.alert("邮箱格式不正确!");
                    return false;
                }
            })() ? (function(){
                $.ajax({
                    url : that.mobileUrl + 'ajaxUserRegister',
                    data : $("#js-register-form").serialize(),
                    type : 'post',
                    dataType : 'json',
                    success : function(jsonData){
                        if(jsonData.success){

                        }else{
                            $.alert(jsonData.msg);
                        }
                    },
                    error : function(){
                        $.alert("注册失败,请重新刷新注册!");
                    }
                });
            })() : 0 :0 : 0 : 0 : 0;
        });
    },
};
