/**
 * Created by liangfeng on 2016/1/21.
 */
var basic = {

    init : function(){
        var that = this;
        that.setWidthEqualHeight('.face-img',1,1);
        $(window).on('resize',(function(){
            that.setWidthEqualHeight('.face-img',1,1);
        }));
        $('.left-nav a[data-flag="1"]').on('click',(function(){
            if(!$(this).hasClass('nav-active')){
                $(this).addClass('nav-active');
                $(this).children('span').css({
                    'transition' : '0.5s',
                    'transform' : 'rotate(90deg)',
                });
                $(this).next('dl').slideDown();
            }else{
                $(this).removeClass('nav-active');
                $(this).children('span').css({
                    'transition' : '0.5s',
                    'transform' : 'rotate(0deg)',
                });
                $(this).next('dl').slideUp();
            }
        }));
    },
    setWidthEqualHeight : function(node,w,h){
        var width = parseInt($(node).css('width'));
        $(node).css('height',width/w*h+'px');
    },
    discuss : function(){
        $('.btn-discuss').on('click',function(){
            if($(this).attr('data-flag')==1){
                $(this).attr('data-flag',0);
                $(this).parent().next().slideUp();
            }else{
                $(this).attr('data-flag',1);
                $(this).parent().next().slideDown();
            }

        });
    },
    setPV : function(){
        var blogId = $('.blog-id').val();
        $.ajax({
                url : 'http://www.minibaobei.cn/index.php?r=blog/blog/SetPvAjax',
                data : {
                    blogId : blogId,
                }
            }
        );
    },
    ajaxSendDiscuss : function(){
         $('.send-discuss').on('click', function () {
              if($.cookie('user_stuid')==null){
                  window.location.href="http://www.minibaobei.cn/index.php?r=login/index&backurl="+window.location.href;
              }else{
                  var blogId = $('.blog-id').val();
                  $.ajax({
                      url:'http://www.minibaobei.cn/index.php?r=blog/blog/SetDiscuss',
                      type : 'post',
                      data:{
                          blogId : blogId,
                          stuid : $.cookie('user_stuid'),
                          contents : $('.report-discuss').find('textarea').val(),
                      },
                      dataType : 'json',
                      success : function(data){
                          var dataDt = '<dt><div class="discuss-face"><img src="'+data.user_facepic+'" alt="头像"></div><div class="discuss-content"><span>'+data.user_name+'：</span>'+data.dis_contents+'</div><div class="discuss-time"><span>时间：</span>'+data.dis_date+'</div> </dt>';
                          var dataDd = '<dd><div class="discuss-face"><img src="'+data.user_facepic+'" alt="头像"></div><div class="discuss-content"><span>'+data.user_name+'：</span>'+data.dis_contents+'</div><div class="discuss-time"><span>时间：</span>'+data.dis_date+'</div> </dd>';
                          dtdd = $('.discuss dl dt').length + $('.discuss dl dd').length;
                          if(dtdd % 2){
                              $('.discuss dl').append(dataDd);
                          }else{
                              $('.discuss dl').append(dataDt);
                          }
                          $('.report-discuss').find('textarea').val('');
                      }
                  });
              }
         });
    },
    ajaxSendAttention : function(){
        $('.send-attention').on('click', function () {
            if($.cookie('user_stuid')==null){
                window.location.href="http://www.minibaobei.cn/index.php?r=login/index&backurl="+window.location.href;
            }else{
                var blogId = $('.blog-id').val();
                $.ajax({
                    url:'http://www.minibaobei.cn/index.php?r=blog/blog/SetAttention',
                    type : 'post',
                    data:{
                        blogId : blogId,
                        stuid : $.cookie('user_stuid'),
                    },
                    dataType : 'json',
                    success : function(jsonData){
                        if(jsonData.success){
                            var num = $('.att-num').text();
                            num = parseInt(num);
                            $('.att-num').text(num+1);
                        }
                    }
                });
            }
        });
    }
}
$(function(){
    basic.init();
});
