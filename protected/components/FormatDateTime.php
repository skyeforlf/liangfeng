<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/3/16
 * Time: 19:09
 */

class FormatDateTime{

    /**
     * 时间格式化，按照自己想要的格式输出
     * @param $time
     * @return string
     */
    public static function formatTime($time){
        $time = explode(' ',$time);
        $nowTime = strtotime(date('Y-m-d H:i:s',time()));
        $nowZeroDiffTime = $nowTime-strtotime(date("y-m-d",time()));
        $timeDiff = $nowTime-strtotime($time[0].' '.$time[1]);
        if($timeDiff<$nowZeroDiffTime){
            return self::secondToTime($timeDiff).'前';
        }elseif($timeDiff-$nowZeroDiffTime<24*60*60){
            return "昨天".$time[1];
        }else{
            return $time[0];
        }
    }

    /**
     * 将时间的秒数转化成几小时几分
     * @param $second
     * @return string
     */
    public static function secondToTime($second){
        $hour = (int)($second / 3600);
        $minute = (int)($second % 3600 / 60);
        if($hour != 0){
            return $hour."小时".$minute.'分';
        }else{
            return $minute.'分';
        }
    }
}
