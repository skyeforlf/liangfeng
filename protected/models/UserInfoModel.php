<?php
/**
 * Created by PhpStorm.
 * User: liangfeng
 * Date: 16/4/7
 * Time: 14:24
 */
class UserInfoModel{
    /**
     *
     * @param $stuId
     * @return bool|mixed
     */
    public function getUserFaceInfo($stuId){
        if(empty($stuId)){
            return false;
        }
        $returnData = array();
        $otherInfo = CacheTools::getMemcacheCom('UserInfoDao',
                                                'getUserBaseInfoByStuid',
                                                 array($stuId),
                                                'getUserOtherInfo'.$stuId,
                                                 array('expire'=>86400)
        );
        if(empty($otherInfo)){
            $returnData['picUrl'] = DOMAIN_NAME.'/images/default-face.jpg';
            $returnData['position']['left'] = 0;
            $returnData['position']['top'] = 0;
            $returnData['position']['right'] = 500;
            $returnData['position']['bottom'] = 500;
        }else{
            $returnData['picUrl'] = DOMAIN_NAME.'/images/face/'.$otherInfo['user_facepic'];
            $returnData['position']['left'] = $otherInfo['user_facepic_left'];
            $returnData['position']['top'] = $otherInfo['user_facepic_top'];
            $returnData['position']['right'] = $otherInfo['user_facepic_right'];
            $returnData['position']['bottom'] = $otherInfo['user_facepic_bottom'];
        }
        return $returnData;
    }
}