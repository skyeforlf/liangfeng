<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/8/2
 * Time: 11:32
 */

?>

<form id="form1" action="<?php echo DOMAIN_NAME.'/index.php?r=site/index'; ?>" method="post" enctype="multipart/form-data" >
    <input type="file" name="file1">
    <input type="file" name="file2">
    <input type="file" name="file3">
    <input type="file" name="file4">
    <input type="file" name="file5">
    <input type="file" name="file6">
    <button class="btn btn-primary">上传多文件</button>
</form>
