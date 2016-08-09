<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/31
 * Time: 08:47
 */
?>
<link href="assets/admin/css/otherInfo.css" rel="stylesheet" />
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">其他信息修改与添加</h1>
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
                            <div class="face-img-div"><img id="old-face-img" src="<?php echo $user_facepic; ?>"/></div>

                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">性别:</b>
                                </span>
                                <input class="form-control user-sex" value="<?php echo $user_sex; ?>" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">生日:</b>
                                </span>
                                <input class="form-control user-birthday" value="<?php echo $user_birthday; ?>" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">住址:</b>
                                </span>
                                <input class="form-control user-address" value="<?php echo $user_address; ?>" type="text" disabled/>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">身高:</b>
                                </span>
                                <input class="form-control user-height" value="<?php echo $user_height; ?>" type="text" disabled/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">CM</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">体重:</b>
                                </span>
                                <input class="form-control user-weight" value="<?php echo $user_weight; ?>" type="text" disabled/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">KG</b>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>自我介绍</label>
                                <textarea class="form-control user-introduce" rows="3" placeholder="你还没有写过自我介绍..."><?php echo $user_introduce; ?></textarea>
                            </div>
                            <div class="input-group input-margin">
                                <b class="btn btn-primary update-introduce">为了保持对称</b>
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
                            <div class="face-img-div" id="face-img-div"><img id="img-view" src="<?php echo $user_facepic; ?>"/></div>

                            <div id="coords">
                                <input type="hidden" size="4" id="x1" name="x1" />
                                <input type="hidden" size="4" id="y1" name="y1" />
                                <input type="hidden" size="4" id="x2" name="x2" />
                                <input type="hidden" size="4" id="y2" name="y2" />
                                <input type="hidden" size="4" id="w" name="w" />
                                <input type="hidden" size="4" id="h" name="h" />
                            </div>
                            <div style="display: none">
                                <input type="file" name="upload-face" id="upload-face"/>
                            </div>
                            <div class="input-margin">
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="男" <?php echo $user_sex=='男'? 'checked' : ''; ?>>男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="女" <?php echo $user_sex=='女'? 'checked' : ''; ?>>女
                                </label>
                                <b class="btn btn-default update-sex">修改保存</b>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control birthday-input" name="birthday" value="<?php echo $user_birthday; ?>" type="text" readonly/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">修改保存</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control" name="address" value="<?php echo $user_address; ?>" type="text"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">修改保存</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control" name="height" value="<?php echo $user_height; ?>" type="text"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">CM</b>
                                </span>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">修改保存</b>
                                </span>
                            </div>
                            <div class="input-group input-margin">
                                <input class="form-control" name="weight" value="<?php echo $user_weight; ?>" type="text"/>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default">KG</b>
                                </span>
                                <span class="form-group input-group-btn">
                                    <b class="btn btn-default update">修改保存</b>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>自我介绍</label>
                                <textarea class="form-control" name="introduce" rows="3" placeholder="简单的做个自我介绍..."></textarea>
                            </div>
                            <div class="input-group input-margin">
                                <b class="btn btn-primary update-introduce">保存自我介绍</b>
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
<script src="js/My97DatePicker/WdatePicker.js"></script>
<script src="js/uploadPreview.js"></script>
<script src="js/jquery.Jcrop.js"></script>
<script src="js/ajaxfileupload.js"></script>
<script src="assets/admin/js/otherInfo.js"></script>


