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
                <h1 class="page-head-line">订单列表</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <!--    Striped Rows Table  -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        我的全部订单
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">订单ID</th>
                                        <th class="text-center">订单地址</th>
                                        <th class="text-center">订单时间</th>
                                        <th class="text-center">订单留言</th>
                                        <th class="text-center">订单详情</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($ordersInfo as $item){ ?>
                                    <tr>
                                        <th><?php echo $item['order_id']; ?></th>
                                        <th><?php echo $item['order_address']; ?></th>
                                        <th><?php echo $item['order_time']; ?></th>
                                        <th><?php echo $item['order_remark']; ?></th>
                                        <th class="text-center detail-look">查看详情</th>
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
        <?php foreach($ordersInfo as $order){ ?>
        <div class="order-detail <?php echo $order['order_id'];?>">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    订单内容详情
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>美食名称</th>
                                    <th>美食数量</th>
                                    <th>美食单价</th>
                                    <th>美食单品总价</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($order['detailInfo'] as $food){ ?>
                                <tr>
                                    <td><?php echo $food['food_name'];?></td>
                                    <td><?php echo $food['foodnum'];?></td>
                                    <td><?php echo $food['food_price'];?></td>
                                    <td><?php echo $food['singleTotalPrice'];?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-group">
                        <b class="btn btn-primary detail-close">关闭详情</b>
                        <b class="btn btn-primary">总价: ¥<?php echo empty($order['order_totalprice'])? 0 : $order['order_totalprice'];?></b>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!--/.ROW-->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<script src="assets/admin/js/orderList.js"></script>

