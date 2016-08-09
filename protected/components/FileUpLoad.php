<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 2016/1/23
 * Time: 13:23
 */
class FileUpLoad{

	private $path;
	private $allowType = array('jpg','png','gif');
	private $maxSize = 20000000;                                            //文件限制
	private $memoryName;                                                    //保存后的文件名字
	private $fileInfo;                                                      //上传文件信息
	private $errorNum = 0;                                                  //错误号
	private $errorMsg="";                                                   //错误报告消息
	private $newFilePrefix;                                                 //新文件的前缀

	/**
	 * 构造函数
	 * FileUpLoad constructor.
	 * @param $fileInfo  上传的文件信息
	 * @param string $path  上传的文件路径
	 * @param array $newName   上传的文件名称
	 */
	public function __construct($fileInfo,$path = "./uploads",$newName=array()){
		if(!isset($fileInfo['name'])){
			$this->setOption('fileInfo',$fileInfo);
		}else{
			$this->setOption('fileInfo',array( 0=>$fileInfo ));
		}

		$this->setOption('path',$path);
		$this->setOption('memoryName',$newName);
	}

	public function upLoad(){
		if(!$this->checkFilePath()){
			$this->setOption('errorMsg',$this->getError());
			return false;
		}
		foreach($this->fileInfo as $key => $oneFile){
			if($this->checkFileType($oneFile['name'])){
				if($this->checkFileSize($oneFile['size'])){
					if(!empty($this->memoryName[$key])){
						$this->removeFile($oneFile['tmp_name'],$this->newFilePrefix."_".$this->memoryName[$key] = $this->memoryName[$key].".".$this->getFileExtension($oneFile['name']));
					}else{
						$this->removeFile($oneFile['tmp_name'],$this->memoryName[$key] = $this->getRandName($this->newFilePrefix).$this->getFileExtension($oneFile['name']));
					}
				}
			}
			$this->errorMsg[$key] = $this->getError();
		}
		$returnInfo = array('errorMsg'=>$this->errorMsg,'memoryName'=>$this->memoryName);
		return $returnInfo;
	}

	/**
	 * 设置文件的前缀，在没有指定文件名字的时候可以设置文件的前缀名称
	 * @param $prefix
	 */
	public function setPrefix($prefix){
		$this->newFilePrefix = $prefix;
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
		if(!$this->errorNum) {
			$path = rtrim($this->path, '/').'/';
			$path .= $newFileName;
			if (@move_uploaded_file($tmpFileName, $this->checkFileExists($path))) {
				return true;
			}else{
				$this->setOption('errorNum', -3);
				return false;
			}
		} else {
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
	private function getRandName($prefix) {
		$fileName = date('YmdHis')."_".rand(100,999);
		return $prefix.'_'.$fileName.".";
	}
	/**
	 * 获取错误信息
	 * @return string
	 */
	private function getError(){
		$errorMsgage = array(
			'4' => "没有文件被上传",
			'3' => "文件只有部分被上传",
			'2' => "上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值",
			'1' => "上传的文件超过了php.ini中upload_max_filesize选项限制的值",
			'0' => "上传成功",
			'-1' => "未允许类型",
			'-2' => "文件过大,上传的文件不能超过{$this->maxSize}个字节",
			'-3' => "上传失败",
			'-4' => "建立存放上传文件目录失败，请重新指定上传目录",
			'-5' => "必须指定上传文件的路径",
		);
		if(!in_array($this->errorNum,$errorMsgage)){
			return '未知错误';
		}else{
			return $errorMsgage[$this->errorNum];
		}
	}
}