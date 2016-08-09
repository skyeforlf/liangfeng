<?php
/*
 * Created on 2015-11-10
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class CacheTools {
	
	/**
	 * memcache头
	 */
	const MEM_KEY = 'memcache::';
	
	/**
	 * redis头
	 */
	const RED_KEY = 'redis::';
	
	/**
	 * 获取memcache通用缓存
	 * 
	 * $class   类
	 * $method  方法
	 * $params  参数数组
	 * $key		键名
	 * $expire  有效期
	 */
	public static function getMemcacheCom($class, $method, $params = array(), $key, $config = array('expire'=>null, 'isMap'=>false, 'needKey'=>false, 'isStatic'=>false)) {
		// 校验参数
		if (empty($class) || empty($method) || empty($key)) {
			// 最好做异常封装，网站暂时没有异常封装，先凑乎着
			return false;
		}
		
		// 区分缓存来源
		$key = self::MEM_KEY.$key;
		
		// 初始化调用对象
		$useObj = array($class, $method);
		if(isset($config['isStatic'])){
			$useObj = $class.'::'.$method;
		}
		
		// 初始化缓存设置标记
		$setFlag = false;
		// 判断是否需要刷缓存
		if (!self::isRefreshFileCache(true)) {
			$result = Yii::app()->memcache->get($key);
		}

		// 缓存丢失且不是刷新缓存
		if (empty($result)) {
			$result = call_user_func_array($useObj, $params);
			$setFlag = true;
		}
		
		// 设置缓存
		if ($setFlag && isset($config['isMap']) && isset($config['expire'])) {
			foreach ($result as $memKey=>$resultObj) {
				Yii::app()->memcache->set($memKey, $resultObj, $config['expire']);
			}
		} else if ($setFlag && $config['expire']) {
			Yii::app()->memcache->set($key, $result, $config['expire']);
		}
		
		// 返回数据
		if (isset($config['needKey'])) {
			return $result[$config['needKey']];
		} else {
			return $result;
		}
		
	}
	
	/**
	 * 获取redis通用缓存
	 * 
	 * $class   类
	 * $method  方法
	 * $params  参数数组
	 * $key		键名
	 * $expire  有效期
	 */
	public static function getRedisCom($class, $method, $params = array(), $key, $config = array('expire'=>null, 'isMap'=>null, 'needKey'=>null, 'isStatic'=>null)) {
		// 校验参数
		if (empty($class) || empty($method) || empty($key)) {
			// 最好做异常封装，网站暂时没有异常封装，先凑乎着
			return false;
		}
		
		// 区分缓存来源
		$key = self::RED_KEY.$key;
		
		// 初始化调用对象
		$useObj = array($class, $method);
		if ($config['isStatic']) {
			$useObj = $class.'::'.$method;
		}
		
		// 初始化缓存设置标记
		$setFlag = false;
		// 判断是否需要刷缓存
		if (!self::isRefreshFileCache(true)) {
			$result = Yii::app()->redis->get($key);
		}
		
		// 缓存丢失且不是刷新缓存
		if (empty($result)) {
			$result = call_user_func_array($useObj, $params);
			$setFlag = true;
		}
		
		// 设置缓存
		if ($setFlag && $config['isMap'] && $config['expire']) {
			foreach ($result as $memKey=>$resultObj) {
				Yii::app()->redis->setex($memKey, $resultObj, $config['expire']);
			}
		} else if ($setFlag && $config['expire']) {
			Yii::app()->redis->setex($key, $result, $config['expire']);
		} else if ($setFlag && $config['isMap']) {
			foreach ($result as $memKey=>$resultObj) {
				Yii::app()->redis->set($memKey, $resultObj);
			}
		} else if ($setFlag) {
			Yii::app()->redis->set($key, $result);
		}
		
		// 返回数据
		if ($config['needKey']) {
			return $result[$config['needKey']];
		} else {
			return $result;
		}
		
	}
	
	/**
	 * @des    : 刷新缓存
	 * @param  : $key memcache key值
	 * @return : bool true代表重新获取数据，刷缓存  ----- false代表继续用缓存中数据，不刷缓存。
	 * @date   : 2015-04-10
	 */
	public static function  isRefreshFileCache($showMsg = false) {
		if (isset($_REQUEST['refreshFileCache']) && $_REQUEST['refreshFileCache'] == 1) {
			return true;
		}
		return false;
	}
	
}
?>
