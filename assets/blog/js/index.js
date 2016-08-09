/**
 * Created by liangfeng on 2016/1/21.
 */
$(function(){
    basic.setWidthEqualHeight('.article-img img',4,3);
    $(window).on('resize',(function(){
        basic.setWidthEqualHeight('.article-img img',4,3);
    }));
});
