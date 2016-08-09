<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16-1-18
 * Time: 下午3:15
 */
class CalendarWidget extends CWidget{
	//年
	public $year;
	//月
	public $month;
	//日
	public $day;
	//每周的名字
	public $allWeek;
	//时间类处理类
	public $date;

	public function init(){
		$this->date = new Date($this->year,$this->month,$this->day);
		$this->allWeek = $this->date->get_WEEK();
	}

	public function run(){
		$data = $this->date->getDate();
		$data['calendarBox'] = $this->date->getCalendarBox();
		$this->render('calendar',$data);
	}

}
class Date{
	//常量年份
	const YEAR = 2008;
	//常量月份
	const MONTH = 8;
	//常量月的第几天
	const DAY = 8;
	//常量星期
	const WEEK = 5;

	private $_WEEK = array(
		'0' => 'Sun',
		'1' => 'Mon',
		'2' => 'Tue',
		'3' => 'Wed',
		'4' => 'Thu',
		'5' => 'Fri',
		'6' => 'Sat',
		/*'0' => '日',
		'1' => '一',
		'2' => '二',
		'3' => '三',
		'4' => '四',
		'5' => '五',
		'6' => '六',*/
	);

	private $_year;
	private $_month;
	private $_day;
	private $_week;

	/**
	 * 构造方法 入参 年 月 日
	 * @param $y
	 * @param $m
	 * @param $d
	 */
	public function __construct($y,$m,$d){
		$this->_year = $y;
		$this->_month = $m;
		$this->_day = $d;
		$this->_week = $this->formatWeek($this->countWeek($y,$m,$d));
	}

	/**
	 * 返回某一天是周几
	 * @param $y
	 * @param $m
	 * @param $d
	 *
	 * @return int
	 */
	public function countWeek($y,$m,$d){
		$day = 0;
		if($this->compareDate($y,$m,$d,self::YEAR,self::MONTH,self::DAY)){
			$day = $this->countDay($y,$m,$d,self::YEAR,self::MONTH,self::DAY);
		}else{
			$day = $this->countDay(self::YEAR,self::MONTH,self::DAY,$y,$m,$d);
		}
		$day += self::WEEK;
		return $day%7;
	}

	/**
	 * 计算两个时间之间的天数
	 * @param $sy  开始年
	 * @param $sm  开始月
	 * @param $sd  开始日
	 * @param $ey  结束年
	 * @param $em  结束月
	 * @param $ed  结束日
	 * @return bool|int  出参天数
	 */
	public function countDay($sy,$sm,$sd,$ey,$em,$ed){
		if(!$this->compareDate($sy,$sm,$sd,$ey,$em,$ed)){
			return false;
		}
		$dayNum = 0;
		for($year = $sy;$year<$ey;$year++){
			$dayNum += $this->leapYear($year) ? 366 : 365;
		}
		for($month=1;$month<$sm;$month++){
			$dayNum -= $this->getMonthDay($sy,$month);
		}
		$dayNum -= $sd;
		for($month=1;$month<$em;$month++){
			$dayNum += $this->getMonthDay($ey,$month);
		}
		$dayNum += $ed;
		return $dayNum;
	}

	/**
	 * 比较两个时间的大小
	 * @param $sy  开始年
	 * @param $sm  开始月
	 * @param $sd  开始日
	 * @param $ey  结束年
	 * @param $em  结束月
	 * @param $ed  结束日
	 * @return bool
	 */
	public function compareDate($sy,$sm,$sd,$ey,$em,$ed){
		if($ey>$sy){
			return true;
		}else if($ey==$sy){
			if($em>$sm){
				return true;
			}else if($em == $sm){
				if($ed>=$sd){
					return true;
				}
			}
		}
		return false;
	}

	/**
	 * 判断当前年份是否是闰年
	 * @param $y  年
	 * @return bool
	 */
	public function leapYear($y){
		if(( $y % 4 == 0 && $y%100 != 0 )|| $y % 400 == 0){
			return true;
		}
		return false;
	}

	/**
	 * 格式化输出周几  将数字转换成相应的英文或者是中文字
	 * @param $inWeek
	 * @return mixed
	 */
	public function formatWeek($inWeek){
		return $this->_WEEK[$inWeek];
	}
	/**
	 * 获取一个星期的所有英文或者中文数组
	 * @return array
	 */
	public function get_WEEK(){
		return $this->_WEEK;
	}

	/**
	 * 回去时间数据
	 * @return array
	 */
	public function getDate(){
		return array(
			'year'=>$this->_year,
			'month'=>$this->_month,
			'day'=>$this->_day,
			'week'=>$this->_week,
		);
	}

	/**
	 * 获取当前年份的月份有多少天
	 * @param $y
	 * @param $m
	 * @return int
	 */
	public function getMonthDay($y,$m){
		if(in_array($m,array(1,3,5,7,8,10,12))){
			return 31;
		}
		if(in_array($m,array(4,6,9,11))){
			return 30;
		}
		if($m == 2){
			return $this->leapYear($y) ? 29 : 28;
		}
	}

	/**
	 * 获取日历的盒模型
	 * @return array
	 */
	public function getCalendarBox(){
		$calendarBox = array();
		$firstWeek = $this->countWeek($this->_year,$this->_month,1);
		if($this->_month==1){
			$previousMonth = 12;
		}else{
			$previousMonth = $this->_month-1;
		}
		$previousMonthDay = $this->getMonthDay($this->_year,$previousMonth);
		for($num = $previousMonthDay-$firstWeek+1;$num<=$previousMonthDay;$num++){
			$calendarBox[] = '<dd><b>'.$num.'</b></dd>';
		}
		$currentMonthDay = $this->getMonthDay($this->_year,$this->_month);
		for($num = 1;$num<=$currentMonthDay;$num++){
			if(($num+$firstWeek)%7==0||($num+$firstWeek-1)%7==0){
				if($num == $this->_day){
					$calendarBox[] = '<dd><a href="#" class="week-day today">'.$num.'</a></dd>';
				}else{
					$calendarBox[] = '<dd><a href="#" class="week-day">'.$num.'</a></dd>';
				}
			}else{
				if($num == $this->_day){
					$calendarBox[] = '<dd><a href="#" class="today">'.$num.'</a></dd>';
				}else{
					$calendarBox[] = '<dd><a href="#">'.$num.'</a></dd>';
				}

			}
		}
		$lastWeek = $this->countWeek($this->_year,$this->_month,$this->getMonthDay($this->_year,$this->_month));
		for($num = $lastWeek;$num<6;$num++){
			$calendarBox[] = '<dd><s>'.($num-$lastWeek+1).'</s></dd>';
		}
		return $calendarBox;
	}
}