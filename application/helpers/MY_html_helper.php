<?php

	function heading($data = '', $h = '1', array  $attributes) {	
		$attr = "";
		$val= "";
		$key = "";
		$i=0;
		foreach($attributes as $key => $value) {
			/*echo $value . $i++ . " ";*/
			$attr .= $key . "=" . $value . " ";

		}
		return "<h".$h.' '.$attr.">".$data."</h".$h.">";

	}
