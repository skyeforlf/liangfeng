<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">必要数据修改</h1>
                <h1 class="page-subhead-line">此部分的数据采用异步方式进行修改,保存数据前认真对数据进行核实.</h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        原始数据
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">姓名:</b>
                                </span>
                                <input class="form-control user-name" value="<?php echo $user_name;?>" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">学号:</b>
                                </span>
                                <input class="form-control" value="<?php echo $user_stuid;?>" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">电话:</b>
                                </span>
                                <input class="form-control user-tel" value="<?php echo $user_tel;?>" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">Q Q:</b>
                                </span>
                                <input class="form-control user-qq" value="<?php echo $user_qq;?>" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">邮箱:</b>
                                </span>
                                <input class="form-control user-email" value="<?php echo $user_email;?>" type="text" disabled/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        数据表单
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="input-group input-margin">
                                <input class="form-control" name="name" value="<?php echo $user_name;?>" type="text"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">修改保存</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control" value="<?php echo $user_stuid;?>" type="text" disabled/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">不能修改</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control" name="tel" value="<?php echo $user_tel;?>" type="text"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">修改保存</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control" name="qq" value="861086110" type="text"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">修改保存</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control" name="email" value="<?php echo $user_email;?>" type="text"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">修改保存</b>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/.ROW-->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<script src="assets/admin/js/attribute.js"></script>
