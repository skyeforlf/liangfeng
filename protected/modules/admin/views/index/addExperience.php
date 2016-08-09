<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">添加经历信息</h1>
                <h1 class="page-subhead-line">经历信息是你在大学感觉有成就感的事情的记录</h1>

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
                        <form role="form" action="<?php echo DOMAIN_NAME.'/index.php?r=admin/index/experienceList'?>" method="post">
                            <div class="hidden">
                                <input type="hidden" name="isAddExperience" value="1"/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">大 标 题:</b>
                                </span>
                                <input class="form-control exp-title" name="title" type="text" placeholder="例:途牛旅游网实习经历"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">经历信息的一个概括性标题（40字以下）</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">地点说明:</b>
                                </span>
                                <input class="form-control" name="place" type="text" placeholder="例:南京市玄武路途牛旅游信息科技有限公司"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">事件发生的地点信息描述（120字以下）</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">时间说明:</b>
                                </span>
                                <input class="form-control user-tel" name="time" type="text" placeholder="例:2015年11月9号---2016年6月30号"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">事件发生的时间信息描述（120字以下）</b>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>详细内容:</label>
                                <textarea class="form-control exp-content" name="content" rows="5" placeholder="例:在途牛旅游网主要负责PHP开发项目,负责PC端网站的前台呈现,具体负责分类页,搜索页,和主页等部分,还有就是担任小组内技术支持角色,负责PC端品类小BUG的修复和简单样式的紧急上线处理......经历的详细简单的描述一下,可以作为简历的一部分..."></textarea>
                            </div>
                            <div class="input-group input-margin">
                                <button type="submit" class="btn btn-primary">添加个人经历信息</button>
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
