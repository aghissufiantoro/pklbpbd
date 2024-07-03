<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Time Ago helper for CodeIgniter.
 *
 * @author      Prajwol KC Dev Team
 * @copyright   Copyright (c) 2014, Semicolon Developers Network
 
 */
if (!function_exists('time_ago'))
{

	/**
	 * Time Ago helper for CodeIgniter.
	 *
	 
	 */
	function time_ago($time)
	{
		$periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "dekade");
		$lengths = array("60","60","24","7","4.35","12","10");

		$now = time();

       $difference     = $now - $time;
       $tense         = "yang lalu";

		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];
		}

		$difference = round($difference);

		if($difference != 1) {
			$periods[$j].= "";
		}

		return "$difference $periods[$j] yang lalu ";
	}
}
