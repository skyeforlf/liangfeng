<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/3/1
 * Time: 11:12
 */
//验证码类
class ValidateCode {

    private $_letters = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';   //随机因子
    private $_code;                                                             //验证码
    private $_codelen = 4;                                                      //验证码长度
    private $_width = 160;                                                      //宽度
    private $_height = 40;                                                      //高度
    private $_img;                                                              //图形资源句柄
    private $_font;                                                             //指定的字体
    private $_fontSize = 20;                                                    //指定字体大小

    //构造方法初始化
    public function __construct($config = ['codelen'=>'','width'=>'','height'=>'','fontSize'=>'']) {
        foreach($config as $key => $value){
            if(!empty($value)){
                $this->{'_'.$key} = $value;
            }
        }
        $this->_font = Yii::app()->basePath.'/../fonts/stkaiti.ttf';//注意字体路径要写对，否则显示不了图片
    }

    /**
     * 生成随机code
     */
    private function createCode() {
        $_len = strlen($this->_letters)-1;
        for ($i=0;$i<$this->_codelen;$i++) {
            $this->_code .= $this->_letters[mt_rand(0,$_len)];
        }
    }

    /**
     * 生成背景
     */
    private function createBg() {
        $this->_img = imagecreatetruecolor($this->_width, $this->_height);
        $color = imagecolorallocate($this->_img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
        imagefilledrectangle($this->_img,0,$this->_height,$this->_width,0,$color);
    }

    /**
     * 生成字体
     */
    private function createFont() {
        $_x = $this->_width / $this->_codelen;
        for ($i=0;$i<$this->_codelen;$i++) {
            $fontColor = imagecolorallocate($this->_img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
            imagettftext($this->_img,$this->_fontSize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->_height / 1.4,$fontColor,$this->_font,$this->_code[$i]);
        }
    }

    /**
     * 生成线条、雪花
     */
    private function createLine() {
        //线条
        for ($i=0;$i<6;$i++) {
            $color = imagecolorallocate($this->_img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
            imageline($this->_img,mt_rand(0,$this->_width),mt_rand(0,$this->_height),mt_rand(0,$this->_width),mt_rand(0,$this->_height),$color);
        }
        //雪花
        for ($i=0;$i<100;$i++) {
            $color = imagecolorallocate($this->_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
            imagestring($this->_img,mt_rand(1,5),mt_rand(0,$this->_width),mt_rand(0,$this->_height),'*',$color);
        }
    }

    /**
     * 输出图片
     */
    private function outPut() {
        header('Content-type:image/png');
        imagepng($this->_img);
        imagedestroy($this->_img);
    }

    /**
     * 对外生成img
     */
    public function doImg() {
        $this->createBg();
        $this->createCode();
        $this->createLine();
        $this->createFont();
        $this->outPut();
    }

    /**
     * 获取验证码
     * @return string
     */
    public function getCode() {
        return strtolower($this->_code);
    }

}