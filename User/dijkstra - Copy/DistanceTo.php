<?php
/**
# DISTANCE TWO COORDINATES
# @RETURN metres
*/


class DistanceTo{
	protected function distanceTo($lat1, $lng1, $lat2, $lng2)
	{
		$earthRadius = 3958.75;						//radius BUMI

		// convert decimal degrees to radians
		$dLat = deg2rad($lat2-$lat1);			//konversi derajat ke radian
		$dLng = deg2rad($lng2-$lng1);			//konversi derajat ke radian

		// haversine formula, used to calculate the great circle distance
		// between two points on the earth (specified in decimal degrees)
		$a = 	sin($dLat/2) * sin($dLat/2) +
					cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
					sin($dLng/2) * sin($dLng/2);
		$c = 2 * atan2(sqrt($a), sqrt(1-$a));
		$dist = $earthRadius * $c;

		// from miles
		$meterConversion = 1609;
		$geopointDistance = $dist * $meterConversion;

		return $geopointDistance;
	}
}
