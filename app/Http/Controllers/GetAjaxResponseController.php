<?php 
/**
  *  <Company> KBS International </Company>
  *  <author> Hammad Tahir </author>
*/
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Http\Request;
use App\Helpers\DataHelper;
/**
  * <summary>
  * 	This controller class is used to call webservices on admin dashboad. using ajax technique.
  * </summary>
*/
class GetAjaxResponseController extends Controller {
	/**
	  * <summary>
	  * This action method used to call webservicces and combine response in single array.
	  * This method call when ajax request triger.
	  * </summary>
	*/
	public function index(){
			$JSONdata = Input::get('date_range');
			$data['users'] = json_decode(DataHelper::get_customers_data('customers', $JSONdata)) ;
			$data['sales'] = json_decode(DataHelper::get_sales_data('sales', $JSONdata)) ;
			$data['downloads'] = json_decode(DataHelper::get_app_downloads_data('downloads', $JSONdata));
			echo json_encode($data);
	}

}
