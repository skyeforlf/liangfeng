<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/16
 * Time: 19:03
 */
?>
<link href="assets/admin/css/orderList.css" rel="stylesheet"/>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">经历列表</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <!--    Striped Rows Table  -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        我的全部经历
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">经历ID</th>
                                        <th class="text-center">经历标题</th>
                                        <th class="text-center">地址说明</th>
                                        <th class="text-center">时间说明</th>
                                        <th class="text-center">详细内同简单简介</th>
                                        <th class="text-center">查看修改</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($exp as $item){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $item['exp_id'];?></td>
                                        <td title="<?php echo $item['exp_title'];?>"><?php echo mb_strlen($item['exp_title'],'utf-8')<10?$item['exp_title']:mb_substr($item['exp_title'],0,10,'utf-8').'...';?></td>
                                        <td title="<?php echo $item['exp_place'];?>"><?php echo mb_strlen($item['exp_place'],'utf-8')<10?$item['exp_place']:mb_substr($item['exp_place'],0,10,'utf-8').'...';?></td>
                                        <td title="<?php echo $item['exp_time'];?>"><?php echo mb_strlen($item['exp_time'],'utf-8')<12?$item['exp_time']:mb_substr($item['exp_time'],0,12,'utf-8').'...';?></td>
                                        <td title="<?php echo $item['exp_content'];?>"><?php echo mb_strlen($item['exp_content'],'utf-8')<25?$item['exp_content']:mb_substr($item['exp_content'],0,20,'utf-8').'...';?></td>
                                        <th class="text-center look-alter">查看修改</th>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  End  Striped Rows Table  -->
            </div>
        </div>
        <!--/.ROW-->
        <div class="row exp-detail hidden">
            <div class="col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        数据表单
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo DOMAIN_NAME.'/index.php?r=admin/updateData/experience'?>" method="post">
                            <div class="hidden">
                                <input class="exp-id" type="hidden" name="expId"/>
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
                                <input class="form-control exp-place" name="place" type="text" placeholder="例:南京市玄武路途牛旅游信息科技有限公司"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">事件发生的地点信息描述（120字以下）</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">时间说明:</b>
                                </span>
                                <input class="form-control exp-time" name="time" type="text" placeholder="例:2015年11月9号---2016年6月30号"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">事件发生的时间信息描述（120字以下）</b>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>详细内容:</label>
                                <textarea class="form-control exp-content" name="content" rows="5" placeholder="例:在途牛旅游网主要负责PHP开发项目,负责PC端网站的前台呈现,具体负责分类页,搜索页,和主页等部分,还有就是担任小组内技术支持角色,负责PC端品类小BUG的修复和简单样式的紧急上线处理......经历的详细简单的描述一下,可以作为简历的一部分..."></textarea>
                            </div>
                            <div class="input-group input-margin">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary">修改个人经历信息</button>
                                    <b class="btn btn-primary detail-close">关闭经历详情信息面板</b>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<script src="assets/admin/js/experienceList.js"></script>

