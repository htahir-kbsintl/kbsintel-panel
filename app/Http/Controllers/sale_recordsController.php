<?php 
/**
  *  <Company> KBS International </Company>
  *  <author>Hammad Tahir</author>
*/
namespace App\Http\Controllers;
use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use Input;
use Illuminate\Http\Request;
use App\Helpers\DataHelper;
use PDF;
/**
  * <summary>
  *  This controller class is used to load graph data in admin panel view.
  * </summary>
*/

class Sale_recordsController extends Controller{
    /**
      * <summary>
      *  This controller method is used to load sale graph data in table
      * </summary>
    */
    public function index(){
            $JSONdate = Input::get('json');
            $data['sales'] = json_decode(DataHelper::get_detail_sale_data('detailedsales', $JSONdate)) ;
            return view('sale_records')->with(['data'=>$data['sales'],'json'=>Input::get('json')]);
    } 
    public function export_csv(){
        $excel = App::make('excel');
        $JSONdate = Input::get('json');
        $results = json_decode(DataHelper::get_detail_sale_data('detailedsales', $JSONdate));
        $data = array();
        $SubTotalAmount        = 0;
        $TotalAmount           = 0;
        $DeliveryChargeAmount  = 0;
        $TipsAmount            = 0;
        $TotalPaidAmount       = 0;
        foreach ($results as $result) {
                /*$SubTotalAmount       = $SubTotalAmount + $result->SubTotalAmount;
                $TotalAmount          = $TotalAmount + $result->TotalAmount;
                $DeliveryChargeAmount = $DeliveryChargeAmount + $result->DeliveryChargeAmount;
                $TipsAmount           = $TipsAmount + $result->TipsAmount;
                $TotalPaidAmount      = $TotalPaidAmount + $result->TotalPaidAmount;*/
                $data[] = (array)$result;
        }
        $excel->create('Filename', function($excel) use($data) {
                $excel->sheet('Sheetname', function($sheet) use($data) {
                        $sheet->fromArray($data,null, 'A1', false, false); 
                        //$sheet->prependRow(1, array('Date', 'SubTotalAmount','TotalAmount','DeliveryChargeAmount','TipsAmount','TotalPaidAmount'));
                        //$sheet->appendRow(array('Totals', $SubTotalAmount , $TotalAmount,$DeliveryChargeAmount,$TipsAmount,$TotalPaidAmount));
                        $sheet->setAllBorders('thin');
                        $sheet->row(1, function($row) {
                                $row->setBackground('#428BCA');
                                $row->setFontColor('#ffffff');
                        });
                        $sheet->setPageMargin(array(0.25, 0.30, 0.25, 3));
                });
      })->export('csv');   
    }
    /**
      * <summary>
      *  This controller method is used export data in PDF
      * </summary>
    */
    public function export_pdf(){
        $excel = App::make('excel');
        $JSONdate = Input::get('json');
        $data = json_decode(DataHelper::get_detail_sale_data('detailedsales', $JSONdate)) ;
        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('pdf', array('data'=>$data));
        return $pdf->download('invoice.pdf');

    } 
}
