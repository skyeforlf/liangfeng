<?php
class StudentInfo{
	private $name;
	private $age;
	private $grade;
	public function __construct($n,$a,$g){
		$this->name = $n;
		$this->age = $a;
		$this->grade = $g;
	}
	public function printInfo(){
		echo "我的名字是：".$this->name."<br/>";
		echo "我的年龄是：".$this->age."<br/>";
		echo "我的班级是：".$this->grade."<br/>";
	}
}