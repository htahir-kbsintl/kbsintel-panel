<?php 

/**
  *  <Company> KBS International </Company>
  *  <author> Hammad Tahir </author>
*/
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

/**
  * <summary>
  *  This api class use for webservices.
  * </summary>
*/
class ApiController extends Controller {
	/**
	  * <summary>
	  *  This method use for get regidtered user data from db and make json response for application
	  * </summary>
	*/
	public function get_registered_user($day){
		$part = json_decode($day);
		$string = "daily_date_time between '".$part->start."' AND '".$part->end."' ";
		$users = DB::table('test_webservices')->select('daily_date_time','no_user_registered')
		->whereRaw(DB::raw($string))
		->orderBy('daily_date_time', 'desc')
		->get();
		echo json_encode($users);
	}
	/**
	  * <summary>
	  *  This method use for get sale data from db and make json response for application
	  * </summary>
	*/
	public function get_sale_data($day){
		$part = json_decode($day);
		$string = "daily_date_time between '".$part->start."' AND '".$part->end."' ";
		$sale_data = DB::table('test_webservices')->select('daily_date_time','daily_sale','no_orders')
		->whereRaw(DB::raw($string))
		->orderBy('daily_date_time', 'desc')
		->get();
		echo json_encode($sale_data);
	}
	/**
	  * <summary>
	  *  This method use for get Iphone,android,blackberry downloads  data from db and make json response for application
	  * </summary>
	*/
	public function get_all_mobile_downloads($day){
		$part = json_decode($day);
		$string = "daily_date_time between '".$part->start."' AND '".$part->end."' ";
		$mobile_downloads = DB::table('test_webservices')
		->select('daily_date_time','android_download','iphone_download','black_berry_download')
		->whereRaw(DB::raw($string))
		->orderBy('daily_date_time', 'desc')
		->get();
		echo json_encode($mobile_downloads);
	}
}
