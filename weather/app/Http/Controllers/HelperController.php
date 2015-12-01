<?php

namespace App\Http\Controllers;

use App\Info;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class HelperController extends Controller
{
    /**
     * Show the specified photo comment.
     *
     * @param  int  $photoId
     * @param  int  $commentId
     * @return Response
     */
    public static function updateInfo($city)
    {
        $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid=2de143494c0b295cca9337e1e96b00e0';
        $json = "";
        try{
            $json = file_get_contents($url);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $obj = json_decode($json);
        $weather_object = new \stdClass();
        foreach ($obj->weather as $key => $value) {
            $weather_object->main = $value->main;
            $weather_object->description = $value->description;
        }
        $weather_object->temperature =  $obj->main->temp;
        $weather_object->pressure =  $obj->main->pressure;
        $weather_object->humidity =  $obj->main->humidity;
        $weather_object->temp_min =  $obj->main->temp_min;
        $weather_object->temp_max =  $obj->main->temp_max;
        if(!empty($obj->main->sea_level)) {
            $weather_object->sea_level = $obj->main->sea_level;
        }else {
            $weather_object->sea_level = "";
        }
        if(!empty($obj->main->grnd_level)){
            $weather_object->grnd_level = $obj->main->grnd_level;
        }else {
            $weather_object->grnd_level = "";
        }
        $weather_object->speed = $obj->wind->speed;
        if(!empty($obj->wind->degree)) {
            $weather_object->degree = $obj->wind->deg;
        }else {
            $weather_object->degree = "";
        }
        $weather_object->sunrise =  $obj->sys->sunrise;
        $weather_object->sunset =  $obj->sys->sunset;

        $time = time();
        $date = date("Y-m-d");
        $info = Info::where('city',$city)->where('date',$date)->get();
        if($info->isEmpty()){
            Info::make($weather_object->main,$weather_object->description,$weather_object->temperature,$weather_object->pressure,$weather_object->humidity,$weather_object->temp_min,$weather_object->temp_max,$weather_object->speed,$weather_object->sunrise,$weather_object->sunset,$time,$date,$city,$weather_object->degree,$weather_object->sea_level,$weather_object->grnd_level);
        }else{
            $prev_info = Info::where('city',$city)->where('date',$date)->orderBy('created_at', 'desc')->first();
            if($prev_info->city != $city || $prev_info->main != $weather_object->main || $prev_info->description != $weather_object->description || abs($prev_info->temperature - $weather_object->temperature)!=0 || abs($prev_info->pressure - $weather_object->pressure)!=0 || abs($prev_info->humidity - $weather_object->humidity)!=0 || abs($prev_info->temp_min - $weather_object->temp_min)!=0 || abs($prev_info->sea_level - $weather_object->sea_level)!=0 || abs($prev_info->grnd_level - $weather_object->grnd_level)!=0 || date("Y-m-d h:i:s",$weather_object->sunrise)!=$prev_info->sunrise || date("Y-m-d h:i:s",$weather_object->sunset)!=$prev_info->sunset){
                Info::make($weather_object->main,$weather_object->description,$weather_object->temperature,$weather_object->pressure,$weather_object->humidity,$weather_object->temp_min,$weather_object->temp_max,$weather_object->speed,$weather_object->sunrise,$weather_object->sunset,$time,$date,$city,$weather_object->degree,$weather_object->sea_level,$weather_object->grnd_level);
                echo View::make('weather',array('weather_object' => $weather_object,'prev_info'=>$prev_info));
                exit;
            }
        }     
        echo View::make('weather',array('weather_object' => $weather_object));
    }
}