<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/3
 * Time: 23:28
 */
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">学校信息修改与添加</h1>
                <h1 class="page-subhead-line">此部分的数据采用异步方式进行修改与添加,保存数据前认真对数据进行核实.</h1>
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
                                    <b class="btn btn-default">学校:</b>
                                </span>
                                <input class="form-control user-school_id" value="南京农业大学" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">专业:</b>
                                </span>
                                <input class="form-control user-professional" value="计算机" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">入学时间:</b>
                                </span>
                                <input class="form-control user-start_school_date" value="2016-09-10" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">毕业时间:</b>
                                </span>
                                <input class="form-control user-graduate_date" value="2016-09-10" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">学制:</b>
                                </span>
                                <input class="form-control user-inschool_time" value="四年制" type="text" disabled/>
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
                                <select name="school_id" class="form-control">
                                    <option value="1">南京农业大学</option>
                                    <option value="2">南京大学</option>
                                    <option value="3">南京林业大学</option>
                                    <option value="4">南京航天航空大学</option>
                                    <option value="5">河海大学</option>
                                    <option value="6">东南大学</option>
                                </select>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">保存修改</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control" name="professional" value="计算机科学与技术" type="text"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">保存修改</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control user-start-time" name="start_school_date" value="2016-09-10" type="text" readonly/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">保存修改</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control user-start-time" name="graduate_date" value="2016-09-10" type="text" readonly/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">保存修改</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <select name="inschool_time" class="form-control">
                                    <option value="两年制">两年制</option>
                                    <option value="两年半制">两年半制</option>
                                    <option value="三年制">三年制</option>
                                    <option value="四年制">四年制</option>
                                    <option value="五年制">五年制</option>
                                </select>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">保存修改</b>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/.ROW-->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">语言信息添加与修改</h1>
                <h1 class="page-subhead-line">此部分的数据采用异步方式进行修改与添加,保存数据前认真对数据进行核实.</h1>
            </div>
        </div>
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
                                    <b class="btn btn-default">语言:</b>
                                </span>
                                <input class="form-control user-sex" value="英语English" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">自我评价熟练度:</b>
                                </span>
                                <input class="form-control user-birthday" value="70" type="text" disabled/>
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
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">语言:</b>
                                </span>
                                <input class="form-control user-sex" value="英语English" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">自我评价熟练度:</b>
                                </span>
                                <input class="form-control user-birthday" value="70" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <b class="btn btn-primary">添加语言以及熟练度</b>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>
<script src="js/My97DatePicker/WdatePicker.js"></script>
<script src="assets/admin/js/schAndLang.js"></script>
