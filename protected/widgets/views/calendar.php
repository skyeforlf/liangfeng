<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16-1-18
 * Time: 下午5:49
 */
?>
<style>
.calendar .calendar-header{
	position: relative;
	font-family: Arial, Helvetica, sans-serif;
	color: white;
	font-weight: bold;
	text-align: center;
	background: #372f2c;
	border-radius: 3px;
}
.calendar .calendar-header .calendar-left, .calendar .calendar-header .calendar-right{
	padding: 2%;
	width:20%;
	float: left;
}
.calendar .calendar-header .calendar-left{
	border-right: 1px solid #aaaaaa;
}
.calendar .calendar-header .calendar-right{
	border-left: 1px solid #aaaaaa;
}
.calendar .calendar-header .calendar-center{
	float: left;
	width: 60%;
	padding: 2%;
	font-size: 14px;
}
.calendar .calendar-body{
	background: #e4e4e4;
}
.calendar .calendar-body dl{
	margin: 0;
	padding: 0;
}
.calendar .calendar-body dl dt, .calendar .calendar-body dl dd{
	float: left;
	font-weight: bold;
	font-size: 1.2em;
	text-align: center;
	width:14.28571429%;
	margin: 0;
}
.calendar .calendar-body dl dt i{
	font-family: Arial, Helvetica, sans-serif;
	display: block;
	text-align: center;
	font-style: normal;
	font-size: 12px !important;
	padding: 10px 0 !important;
}
.calendar .calendar-body dl dt i,
.calendar .calendar-body dl dd b,
.calendar .calendar-body dl dd s,
.calendar .calendar-body dl dd a {
	font-family: Arial, Helvetica, sans-serif;
	display: block;
	padding: 15% 0;
	color: #8d8d8d;
	text-align: center;
	font-size: 12px;
	font-weight: bold;
	font-style: normal;
	background: #e4e4e4;
	text-decoration: none;
	/* table like borders */
	border-right: 1px solid #aaaaaa;
	border-bottom: 1px solid #aaaaaa;
	/* table like borders */
}
.calendar .calendar-body dl dt:nth-child(7n + 1) i,
.calendar .calendar-body dl dd:nth-child(7n + 1) b,
.calendar .calendar-body dl dd:nth-child(7n + 1) s,
.calendar .calendar-body dl dd:nth-child(7n + 1) a{
	border-left: 1px solid #aaaaaa;
}
.calendar .calendar-body dl dd:nth-child(n+1):nth-child(-n+7) b,
.calendar .calendar-body dl dd:nth-child(n+1):nth-child(-n+7) s,
.calendar .calendar-body dl dd:nth-child(n+1):nth-child(-n+7) a{
	border-top: 1px solid #aaaaaa;
}
.calendar .calendar-body dl dd a.week-day {
	color: #444;
	background: InactiveCaption;
}
.calendar .calendar-body dl dd b:nth-child(n+1):nth-child(-n+7).empty,
.calendar .calendar-body dl dd s:nth-child(n+1):nth-child(-n+7).empty,
.calendar .calendar-body dl dd a:nth-child(n+1):nth-child(-n+7).empty {
	border-top: 1px solid #d5d5d5;
	border-bottom: 1px solid #aaaaaa;
}
.calendar .calendar-body dl dd b,
.calendar .calendar-body dl dd i,
.calendar .calendar-body dl dd s {
	color: #ccc;
}
.calendar .calendar-body dl dd b,
.calendar .calendar-body dl dd s {
	background: #eee;
	border-color: #d5d5d5;
}
.calendar .calendar-body dl dd b {
	border-bottom: 1px solid #aaaaaa !important;
}
.calendar .calendar-body dl dd b:first-child {
	border-left: 1px solid #d5d5d5 !important;
}
.calendar .calendar-body dl dd b:last-of-type{
	border-right: 1px solid #aaaaaa !important;
}
.calendar .calendar-body dl dd a {
	-webkit-transition-property: text-shadow;
	-moz-transition-property: text-shadow;
	-o-transition-property: text-shadow;
	transition-property: text-shadow;
	-webkit-transition-property: box-shadow;
	-moz-transition-property: box-shadow;
	-o-transition-property: box-shadow;
	transition-property: box-shadow;
	-webkit-transition-duration: 1s;
	-moz-transition-duration: 1s;
	-o-transition-duration: 1s;
	transition-duration: 1s;
	text-shadow: 0px 0px 0px teal;
	-webkit-box-shadow: 0 0 0px teal inset;
	-moz-box-shadow: 0 0 0px teal inset;
	box-shadow: 0 0 0px teal inset;
	color: #372f2d;
	background: #d1d1d1;
	text-shadow: 1px 1px 0px white;
	background-image: -webkit-gradient(linear, 50% 100%, 50% 0%, color-stop(0%, #dadada), color-stop(100%, #cfcfcf));
	background-image: -webkit-linear-gradient(bottom, #dadada, #cfcfcf);
	background-image: -moz-linear-gradient(bottom, #dadada, #cfcfcf);
	background-image: -o-linear-gradient(bottom, #dadada, #cfcfcf);
	background-image: linear-gradient(bottom, #dadada, #cfcfcf);
}
.calendar .calendar-body dl dd a.today {
	color: white;
	text-shadow: 1px 1px 2px teal;
	-webkit-box-shadow: 0 0 30px teal inset;
	-moz-box-shadow: 0 0 30px teal inset;
	box-shadow: 0 0 30px teal inset;
}
.calendar .calendar-body dl dd a.selected {
	color: white;
	text-shadow: 1px 1px 2px blue;
	-webkit-box-shadow: 0 0 30px #000066 inset;
	-moz-box-shadow: 0 0 30px #000066 inset;
	box-shadow: 0 0 30px #000066 inset;
}
.calendar .calendar-body dl dd a:hover {
	color: white;
	text-shadow: 1px 1px 2px green;
	-webkit-box-shadow: 0 0 30px #006600 inset;
	-moz-box-shadow: 0 0 30px #006600 inset;
	box-shadow: 0 0 30px #006600 inset;
}
</style>
<div class="calendar">
	<div class="calendar-header">
		<div class="calendar-left"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></div>
		<div class="calendar-center"><?php echo $year."年".$month."月"; ?></div>
		<div class="calendar-right"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></div>
		<div class="clearfix"></div>
	</div>
	<div class="calendar-body">
		<dl>
			<?php foreach($this->allWeek as $week){ echo '<dt><i>'.$week.'</i></dt>'; } ?>
			<?php foreach($calendarBox as $day){ echo $day; }?>
		</dl>
	</div>
</div>
