<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/23
 * Time: 13:23
 */
class UpLoadFile{

	private $path;                                                          //文件的存储路径
	private $allowType = array('jpg','png','gif');                          //文件的允许类型
	private $maxSize = 20000000;                                            //文件限制
	private $fileInfo;                                                      //上传文件信息
	private $errorNum = 0;                                                  //错误号
	private $prefix;                                                 //新文件的前缀

	/**
	 * 构造函数
	 * FileUpLoad constructor.
	 * @param $fileInfo  上传的文件信息
	 * @param string $path  上传的文件路径
	 * @param array $newName   上传的文件名称
	 */
	public function __construct($fileInfo,$path = "./uploads",$config = array('maxSize'=>'','allowType'=>[],'prefix'=>'')){
		//判断文件上传的个数,没如果超过1个数组形式上传如果只有一个转换为数组形式
        if(!isset($fileInfo['name'])){
			$this->setOption('fileInfo',$fileInfo);
		}else{
			$this->setOption('fileInfo',array($fileInfo));
		}
        //设置上传路径
		$this->setOption('path',$path);

        //设置上传配置信息
        empty($config['maxSize']) ? '' : $this->setOption('maxSize',$config['maxSize']);
        empty($config['allowType']) ? '' : $this->setOption('allowType',$config['allowType']);
        empty($config['prefix']) ? '' : $this->setOption('prefix',$config['prefix']);

	}

    /**
     * 上传文件
     * @return array
     */
	public function upLoad(){
        //上传文件的返回信息
        $returnInfo = ['success'=>false, 'errorMsg'=>[], 'memoryName'=>[]];

		if(!$this->checkFilePath()){
			$returnInfo['errorMsg'][0] = $this->getError();
            return $returnInfo;
		}

		foreach($this->fileInfo as $key => $oneFile){
			if($this->checkFileType($oneFile['name'])){
				if($this->checkFileSize($oneFile['size'])){

                    $returnInfo['memoryName'][$key] = $this->getRandName().$this->getFileExtension($oneFile['name']);

                    if(!($this->removeFile($oneFile['tmp_name'],$returnInfo['memoryName'][$key]))){
                        $returnInfo['errorMsg'][$key] = $this->getError();
                    }else{
                        //只要有一个上传成功就要将上传文件放回信息改成成功
                        $returnInfo['success'] = true;
                        $returnInfo['errorMsg'][$key] = $this->getError();
                    }

				}else{
                    $returnInfo['errorMsg'][$key] = $this->getError();
                }
			}else{
                $returnInfo['errorMsg'][$key] = $this->getError();
            }
		}
		return $returnInfo;
	}

	/**
	 * 设置单个属性的值
	 * @param $key
	 * @param $val
	 */
    private function setOption($key, $val) {
        $this->$key = $val;
    }

	/**
	 * 移动文件，到你指定的位置
	 * @param $tmpFileName
	 * @param $newFileName
	 * @return bool
	 */
	private function removeFile($tmpFileName,$newFileName){

        $path = rtrim($this->path, '/').'/';
        $path .= $newFileName;
        if (@move_uploaded_file($tmpFileName, $this->checkFileExists($path))) {
            return true;
        }else{
            $this->setOption('errorNum', -3);
            return false;
        }
	}

	/**
	 * 检查文件类型
	 * @param $fileName
	 * @return bool
	 */
	private function checkFileType($fileName){
		$extension = $this->getFileExtension($fileName);
		if(!in_array($extension,$this->allowType)){
            $this->setOption('errorNum', -1);
			return false;
		}
		return true;
	}

	/**
	 * 检查问价的大小
	 * @param $fileSize
	 * @return bool
	 */
	private function checkFileSize($fileSize){
		if ($fileSize > $this->maxSize) {
			$this->setOption('errorNum', -2);
			return false;
		}else{
			return true;
		}
	}
	/**
	 * 检查是否有存放上传文件的目录
	 * @return bool
	 */
	private function checkFilePath() {
		if(empty($this->path)){
			$this->setOption('path','./uploads');
		}
		if (!file_exists($this->path) || !is_writable($this->path)) {
			if (!mkdir($this->path, 0755)) {
				$this->setOption('errorNum', -4);
				return false;
			}
		}
		return true;
	}

	/**
	 * 检查文件时候存在 返回原有的文件名
	 * @param $fileName
	 * @return mixed
	 */
	private function checkFileExists($fileName){
		if(file_exists($fileName)){
			@unlink($fileName);
		}
		return $fileName;
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
	 * 设置随机名称
	 * @return string
	 */
	private function getRandName() {

        $fileName = date('YmdHis')."_".rand(1000,9999).'.';

        if(empty($this->prefix)){
            return $fileName;
        }

		return $this->prefix.'_'.$fileName;
	}
	/**
	 * 获取错误信息
	 * @return string
	 */
	private function getError(){
		$errorMsg = array(
			'4' => "没有文件被上传",
			'3' => "文件只有部分被上传",
			'2' => "上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值",
			'1' => "上传的文件超过了php.ini中upload_max_filesize选项限制的值",
			'0' => "上传成功",
			'-1' => "上传文件不是被允许类型,请设置上传文件的类型",
			'-2' => "文件过大,上传的文件不能超过{$this->maxSize}个字节",
			'-3' => "上传失败",
			'-4' => "建立存放上传文件目录失败，请重新指定上传目录",
			'-5' => "必须指定上传文件的路径",
		);
		if(!in_array($this->errorNum,$errorMsg)){
			return '未知错误';
		}else{
			return $errorMsg[$this->errorNum];
		}
	}
}