@extends('panelViews::mainTemplate')
@section('page-wrapper')
<?php 
          $end = date("Y-m-d");
          $start =  date('Y-m-d', strtotime($end. ' - 7 days'));
          $json_date = json_encode(array("start"=>$start,"end"=>$end));
         //echo App\Helpers\DataHelper::get_app_downloads_data('get_downloads', $json_date); die;
      ?> 
            <div class="row">
      
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page-header">
                <div>
                <h1 class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-top:2%;">{{ \Lang::get('panel::fields.dashboard') }}</h1>
                    <div class="icon-bg ic-layers hidden-xs"></div>
                    
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding-right: 0%;"> 
                    <img class="img-responsive pull-right img_responsive" style="width:100%; padding-right:0px;" src="{{asset("custom_assets/images/app-logo.jpg")}}" />
                    </div>
                </div>
                    </div>        
            </div>
            <!-- /.row -->
            <div class="row box-holder">
              <div class="col-lg-5 col-xs-12 col-sm-5 pull-right  ">
              <div class="clear20 visible-xs-block visible-sm-block"></div>
                 <input  id="graph_rang_picker" name="graph_rang_picker" value="" />
                 <div class="clear5 visible-xs-block visible-sm-block visible-md-block"></div>
                 <button id="get_date_range" class="btn btn-primary col-xs-12 col-sm-12 col-lg-2 pull-right" type="button">Apply</button>
              </div>
            <div class="clear10"></div>
<!-- graph html -->
<div class="col-lg-12 col-md-12">
                        <div class="panel ">
                            <div class="panel-heading">
                                <div class="row">
                                    <h2 class="col-xs-6">
                                       Daily Sale
                                    </h2>
                                    <div class="col-xs-6 text-right">
                                      
                                        <div></div>

                                    </div>

                                </div>

                            </div>
                            <div  id="daily-sale"></div>
                            <div class="panel-footer">
                              <a  id="show_list" class="pull-left" href="{{url()}}/panel/sale_records/index/?json={{$json_date}}">Show List 
                                <i class="icon ic-chevron-right"></i>
                              </a>

                                    <div class="clearfix"></div>
                                </div>
                                <!--<div class="panel-footer">

                                  <div  id="daily-sale"></div>
                                </div>-->

                        </div>
                    </div>

		 <div class="col-lg-6 col-md-6">
                        <div class="panel ">
                            <div class="panel-heading">
                                <div class="row">
                                    <h2 class="col-lg-6">
                                       App Downloads
                                    </h2>
                                    <div class="col-xs-6 text-right">
                                       
                                    </div>
                                </div>
                            </div>
                             <div  id="app-download"></div>
                               <!-- <div class="panel-footer">

                                   <div  id="app-download"></div>
                                </div>-->
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="panel ">
                            <div class="panel-heading">
                                <div class="row">
                                    <h2 class="col-xs-6">
                                       User Registration
                                    </h2>
                                    <div class="col-xs-6 text-right">
                                        <div></div>

                                    </div>
                                </div>
                            </div>
                            <div  id="user-registration"></div>
                               <!-- <div class="panel-footer">

                                   <div  id="user-registration"></div>
                                </div>-->
                        </div>
                    </div>

                    
<!--graph html end-->
            </div>
<script>

    $(function(){
        var color = ['primary','green','orange','red','purple','green2','blue2','yellow'];
        var pointer = 0;
        $('.panel').each(function(){
            if(pointer > color.length) pointer = 0;
            $(this).addClass('panel-'+color[pointer]);
            $(this).find('.pull-right .add').addClass('panel-'+color[pointer]);
            pointer++;
        })
    })
/**
  * global variables for javascript/jquery
*/
var sales=<?php echo App\Helpers\DataHelper::get_sales_data('sales', $json_date); ?>;
var downloads=<?php echo App\Helpers\DataHelper::get_app_downloads_data('downloads', $json_date); ?>;
var users =<?php echo App\Helpers\DataHelper::get_customers_data('customers', $json_date); ?>;
var graph_ajax_url = "{{url()}}/get_response";
var intial_val = <?php echo $json_date; ?>;
</script>

@stop            