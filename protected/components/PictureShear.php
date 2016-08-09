<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/7
 * Time: 00:01
 */
class PictureShear{
    private $_picUrl;//图像的连接地址
    private $_targ_w;//输出图像的宽
    private $_targ_h;//输出图像的高
    private $_extension;//扩展名称
    private $_position;
    private $_quality = 90;//输出图像的质量默认就是90吧
    private $_picSize;
    private $_facePath = './images/';
    public function __construct ($picUrl,$position,$w = 500,$h = 500){
        $this->_picUrl = $picUrl;
        $this->_targ_w = $w;
        $this->_targ_h = $h;
        $this->_picSize = getimagesize($picUrl);
        $sizeProPortion = $this->_picSize[0] / 367;
        $this->_position = $this->formatPosition($position,$sizeProPortion);
        $this->_extension = $this->getFileExtension($this->_picUrl);

    }

    /**
     * 设置属性的值
     * @param $name
     * @param $value
     */
    public function setAttribute($name,$value){
        if(isset($this->$name)&&!empty($value)){
            $this->$name = $value;
        }
    }
    /**
     * 图片裁切
     */
    public function shear(){
        switch($this->_extension){
            case 'jpg' : $img_r = imagecreatefromjpeg( $this->_picUrl);
                         $dst_r = ImageCreateTrueColor( $this->_targ_w, $this->_targ_h );
                         imagecopyresampled($dst_r,$img_r,0,0,$this->_position['left'], $this->_position['top'], $this->_targ_w,$this->_targ_h, $this->_position['right']-$this->_position['left'],$this->_position['bottom']);
        }
        header('Content-type: image/jpeg');
        if(empty($this->_facePath)){
            imagejpeg($dst_r,null,$this->_quality);
        }else{
            imagejpeg($dst_r,$this->_facePath,$this->_quality);
        }
    }
    /**
     * 获取文件扩展名
     * @param $fileName
     * @return string
     */
    private function getFileExtension($fileName){
        $tempArray = explode('.',$fileName);
        return strtolower($tempArray[count($tempArray)-1]);
    }

    /**
     * 格式化输出位置信息
     * @param $pos
     * @param $pro
     * @return mixed
     */
    private function formatPosition($pos,$pro){
        foreach($pos as &$item){
            $item = $item * $pro;
        }
        return $pos;
    }
}