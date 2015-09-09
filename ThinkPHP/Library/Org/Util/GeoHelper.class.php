<?php
namespace Org\Util;
class GeoHelper { 
	CONST EARTH_RADIUS = 6378137; // m 赤道半径
	
	private static function getRadian($d) { 
		return $d * M_PI / 180; 
	}
	
	/**
	 * 给定两对坐标计算距离，单位是米
	 * @param double $lng1
	 * @param double $lat1
	 * @param double $lng2
	 * @param double $lat2
	 * @return float 单位是米
	 */
	public static function getDistince ($lng1, $lat1, $lng2, $lat2) { 
		$lat1 = self::getRadian($lat1); 
		$lat2 = self::getRadian($lat2);
		$a = $lat1 - $lat2; 
		$b = self::getRadian($lng1) - self::getRadian($lng2);
		$v = 2 * asin(sqrt(pow(sin($a/2),2) + cos($lat1) * cos($lat2) * pow(sin($b/2),2)));
		$v = round(self::EARTH_RADIUS * $v);
		return $v; 
	}
	
	/**
	 * 给定一个经纬度坐标(WGS84标准)，和一个距离(单位是米)<br/>
	 * 得到一个以此坐标为中心点的正方形四个角的坐标<br/>
	 * 可以用来查询某点周边的坐标<br/>
	 * 距离越大，正方形范围就越大<br/>
	 * @author guanxuejun@126.com
	 * @param float $lng  经度
	 * @param float $lat  纬度
	 * @param integer $distance=1000 距离米
	 * @return coordinate => array('lt'=>'左上角','rt'=>'右上角','rb'=>'右下角','lb'=>'左下角')<br/>
	 * borders => 最大最小的经纬度，四个边界，可用来数据库查询
	 */
	public static function getSquare($lng, $lat, $distance=1000) {
		$radius = 180 / M_PI * $distance / self::EARTH_RADIUS;  
		$maxLat = $lat + $radius; // 最大纬度 
		$minLat = $lat - $radius; // 最小纬度
		$lngR   = $radius / cos($lat * M_PI / 180);
		$maxLng = $lng + $lngR; // 最大经度
		$minLng = $lng - $lngR; // 最小经度
		return array (
			'square' => array(
				'lt' => array('lng' => $minLng, 'lat' => $maxLat),
				'rt' => array('lng' => $maxLng, 'lat' => $maxLat),
				'rb' => array('lng' => $maxLng, 'lat' => $minLat),
				'lb' => array('lng' => $minLng, 'lat' => $minLat)
			),
			'borders' => array(
				'minLongitude' => $minLng,
				'maxLongitude' => $maxLng,
				'minLatitude'  => $minLat,
				'maxLatitude'  => $maxLat
			)
		);
	}
	
	/**
	 * 给定两个坐标(中国处于东经北纬的位置)
	 * 计算在 $x $y 连线上，距离 $y $dist 较近的一个坐标点
	 * 注意：
	 * 1、$x $y 连线距离可能大于 $dist
	 * 新坐标点在连线上
	 * 2、$x $y 连线距离可能小于 $dist
	 * 新坐标将位于与 $y 相对的象限中
	 * 3、$x $y 连线距离可能等于 $dist
	 * 新坐标将于 $x 重叠
	 * @author guanxuejun@126.com
	 * @param array $x(lng, lat) 中心点坐标
	 * @param array $y(lng, lat) 动态坐标
	 * @param integer $dist 距离 $y 较近的距离
	 * @return array(lng, lat) 偏移后的坐标
	 */
	public static function getOffset(array $x, array $y, $dist=2500) {
		$degrees = round($dist/30.8/60/60, 8); // 将相差的距离米换算为度
		// 以 $x 为中心，判断 $y 处于第几象限
		$z = array($y[0], $x[1]); // 投影点坐标，投影是向南或向北取决于位于第几象限
		$quadrant = 0; // 象限
		if ($y[0] > $x[0] && $y[1] > $x[1]) {
			$quadrant = 1;
			// $z 向南投影点坐标
			$xz = $z[0] - $x[0]; // 水平直角边长
			$yz = $y[1] - $x[1]; // 垂直直角边高
			$ATAN = atan($yz/$xz); // 经过两个直角边得到x正切
			// 已知新x角度，和斜边长度 $degrees 求两个直角边
			// 求出 角x 的角度，小三角的角度与此角度一致
			$h = cos($ATAN)*$degrees; // 经度差
			$v = sin($ATAN)*$degrees; // 纬度差
			return array($y[0]-$h, $y[1]-$v);
		};
		if ($y[0] > $x[0] && $y[1] < $x[1]) {
			$quadrant = 2;
			// $z 向北投影点坐标
			$xz = $z[0] - $x[0];
			$yz = $z[1] - $y[1];
			$ATAN = atan($yz/$xz);
			$h = cos($ATAN)*$degrees;
			$v = sin($ATAN)*$degrees;
			return array($y[0]-$h, $y[1]+$v);
		};
		if ($y[0] < $x[0] && $y[1] < $x[1]) {
			$quadrant = 3;
			// $z 向北投影点坐标
			$xz = $x[0] - $z[0];
			$yz = $z[1] - $y[1];
			$ATAN = atan($yz/$xz);
			$h = cos($ATAN)*$degrees;
			$v = sin($ATAN)*$degrees;
			return array($y[0]+$h, $y[1]+$v);
		};
		if ($y[0] < $x[0] && $y[1] > $x[1]) {
			$quadrant = 4;
			// $z 向南投影点坐标
			$xz = $x[0] - $z[0];
			$yz = $y[1] - $z[1];
			$ATAN = atan($yz/$xz);
			$h = cos($ATAN)*$degrees;
			$v = sin($ATAN)*$degrees;
			return array($y[0]+$h, $y[1]-$v);
		};
		return false;
	}
}
?>