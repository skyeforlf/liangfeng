/**
 * Created by liangfeng on 16/3/23.
 * //html  最简单的写法  格式如下
 * <div id="localImag"><img id="preview" src=""></div>
 *
 * <input type="file" name="file" id="doc">
 *
 */
var uploadPreview = {

    setImagePreview : function(divId,imgId,inputId) {
        var docObj=document.getElementById(inputId);

        var imgObjPreview=document.getElementById(imgId);

        if(docObj.files && docObj.files[0])
        {
            //imgObjPreview.src = docObj.files[0].getAsDataURL();

            //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
        }else{
            //IE下，使用滤镜
            docObj.select();
            var imgSrc = document.selection.createRange().text;
            var localImagId = document.getElementById(divId);
            //图片异常的捕捉，防止用户修改后缀来伪造图片
            try{
                localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
            }
            catch(e)
            {
                alert("您上传的图片格式不正确，请重新选择!");
                return false;
            }
            imgObjPreview.style.display = 'none';
            document.selection.empty();
        }
        return true;
    }
}
