<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public static function make($main,$description,$temperature,$pressure,$humidity,$temp_min,$temp_max,$speed,$sunrise,$sunset,$time,$date,$city,$degree,$sea_level,$grnd_level){
    	$info = new Info();
    	$info->main = $main;
    	$info->description = $description;
    	$info->temperature = $temperature;
    	$info->pressure = $pressure;
    	$info->humidity = $humidity;
    	$info ->temp_min = $temp_min;
    	$info->temp_max = $temp_max;
    	$info->speed = $speed;
    	$info->degree = $degree;
    	$info->sunrise = date("Y-m-d h:i:s",$sunrise);
    	$info->sunset =  date("Y-m-d h:i:s",$sunset);
    	$info->time = $time;
    	$info->date = $date;
    	$info->city = $city;
    	$info->sea_level = $sea_level;
    	$info->grnd_level = $grnd_level;
    	$info->save();
    }
}
