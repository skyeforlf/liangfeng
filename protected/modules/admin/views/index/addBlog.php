<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">添加博文</h1>
                <h1 class="page-subhead-line">博客可以记录你的大学生活,分享给别人,为别人引领一条道路.</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        数据表单
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo DOMAIN_NAME.'/index.php?r=admin/index/addBlog'?>" method="post" enctype="multipart/form-data">
                            <div class="hidden">
                                <input type="hidden" name="isAddBlog" value="1"/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">大 标 题:</b>
                                </span>
                                <input class="form-control" name="title" type="text" placeholder="博客标题***"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">博客标题（40字以下）</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">上传Blog图片:</b>
                                </span>
                                <input type="file" class="form-control" name="blog-file"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">博客展示图片</b>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>博客内容:</label>
                                <textarea class="form-control" name="content" rows="30" placeholder="快来发表一下你自己的博文吧!"></textarea>
                            </div>
                            <div class="input-group input-margin">
                                <button type="submit" class="btn btn-primary">发表博文</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<script src="assets/admin/js/attribute.js"></script>
