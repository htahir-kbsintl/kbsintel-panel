<?php
/**
  *  <Company> KBS International </Company>
  *  <author> Hammad Tahir </author>
 */
namespace App\Helpers;
use Config;
/**
  * <summary>
  *  This helper class calls webservices and we can use it at anywhere.
  * </summary>
*/
class DataHelper {
    /**
      * <summary>
      *  This method use to get Sales data response .
      * </summary>
    */
    public static function get_sales_data($service , $limit) {
      //echo Config::get('app.sales'); die;
        $data = json_decode($limit);
        $url = ''.Config::get('app.sales').'3105/from/'.$data->start.'/to/'.$data->end.'/'.$service.'';
        return self::_getHTTP($url);
    }
    /**
      * <summary>
      *  This method use to get app downloads data response .
      * </summary>
    */
    public static function get_app_downloads_data($service , $limit) {
        $data = json_decode($limit);
        $url = ''.Config::get('app.aap_downloads').'tasit/from/'.$data->start.'/to/'.$data->end.'/'.$service.'';
        return self::_getHTTP($url);
    }
    /**
      * <summary>
      *  This method use to get customer data response .
      * </summary>
    */
    public static function get_customers_data($service , $limit) {
        $data = json_decode($limit);
        $url = ''.Config::get('app.customers').'tasit/from/'.$data->start.'/to/'.$data->end.'/'.$service.'';
        return self::_getHTTP($url);
    }
    /**
      * <summary>
      *  This method use to get customer data response .
      * </summary>
    */
    public static function get_detail_sale_data($service , $limit) {
        $data = json_decode($limit);
        $url = ''.Config::get('app.detail_sale').'3105/from/'.$data->start.'/to/'.$data->end.'/'.$service.'';
        return self::_getHTTP($url);
    }
    /**
      * <summary>
      *  This private method use to get response from webservicces using php CURL Technique.
      *  This method call in above function.
      * </summary>
    */
    private static function  _getHTTP($url){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}