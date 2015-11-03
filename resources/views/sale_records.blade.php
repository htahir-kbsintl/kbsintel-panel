@extends('panelViews::mainTemplate')
@section('page-wrapper')
            <div class="row">
      
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page-header">
                <div>
                <h1 class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-top:2%;">{{ \Lang::get('panel::fields.dashboard') }}</h1>
                    <div class="icon-bg ic-layers"></div>
                    
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding-right: 0%;"> 
                    <img class="img-responsive pull-right img_responsive" style="width:100%; padding-right:0px;" src="{{asset("custom_assets/images/app-logo.jpg")}}" />
                    </div>
                </div>
                    </div>        
            </div>
	<!--bootstarp tables-->
			<div class="col-lg-12">
			<div class="clear30"></div>
            <div class="col-lg-12 text-right">
                    <a class="btn btn-primary" href='{{url()}}/panel/sale_records/export_csv/?json={{$json}}'>Export CSV</a>
                    <!--<a class="btn btn-primary" href='{{url()}}/panel/sale_records/export_excel/?json={{$json}}'>Export XLS</a>-->
                    <a class="btn btn-primary" href='{{url()}}/panel/sale_records/export_pdf/?json={{$json}}'>Export PDF</a>
                    
            </div>
            <div class="clear5"></div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3> Sales Data</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?php if($data){ ?>

                                <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Restaurant Id</th>
                                            <th>Date Time</th>
                                            <th>Order Id</th>
                                            <th>Order Type</th>
                                            <th>Is Paid</th>
                                            <th>Payment Card Type</th>
                                            <th>Total Paid Amount</th>
                                            <th>Delivery Charge Amount</th>
                                            <th>Tips Amount</th>
                                            <th>Total Amount</th>
                                            <th>Sub Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										$SubTotalAmount        = 0;
                                        $TotalAmount           = 0;
                                        $DeliveryChargeAmount  = 0;
                                        $TipsAmount            = 0;
                                        $TotalPaidAmount       = 0;
										$count = 1;
									foreach ($data as $sale_data) { ?>
	                                        
                                        <tr style="text-align:center;">
                                            <td>{{$count}}</td>
                                            <td>{{$sale_data->RestaurantId}}</td>
                                            <td>{{$sale_data->DateTime}}</td>
                                            <td>{{$sale_data->OrderId}}</td>
                                            <td>{{$sale_data->OrderType}}</td>
                                            <td>{{$sale_data->IsPaid}}</td>
                                            <td>{{$sale_data->PaymentCardType}}</td>
                                            <td>{{'$'.$sale_data->TotalPaidAmount}}</td>
                                            <td>{{'$'.$sale_data->DeliveryChargeAmount}}</td>
                                            <td>{{'$'.$sale_data->TipsAmount}}</td>
                                            <td>{{'$'.$sale_data->TotalAmount}}</td>
                                            <td>{{'$'.$sale_data->SubTotalAmount}}</td>
                                            
                                        </tr>
                                        
									<?php 
    									$SubTotalAmount        = $SubTotalAmount + $sale_data->SubTotalAmount;
    									$TotalAmount           = $TotalAmount + $sale_data->TotalAmount;
                                        $DeliveryChargeAmount  = $TotalAmount + $sale_data->DeliveryChargeAmount;
                                        $TipsAmount            = $TipsAmount + $sale_data->TipsAmount;
                                        $TotalPaidAmount       = $TotalPaidAmount + $sale_data->TotalPaidAmount;
    									$count++;
									}?>
                                    </tbody>
                                     <tfoot>
                                            <tr style="text-align:center;">
                                           
                                            <td  colspan="7"><div class="text-right"><b>Totals</b></div></td>
                                            <td><b>{{'$'.$TotalAmount}}</b></td>
                                            <td><b>{{'$'.$DeliveryChargeAmount}}</b></td>
                                            <td><b>{{'$'.$TipsAmount}}</b></td>
                                            <td><b>{{'$'.$TotalPaidAmount}}</b></td>
                                            <td><b>{{'$'.$SubTotalAmount}}</b></td>
                                        </tr>
                                        </tfoot>

                                </table>
                                <?php }else{
                                		echo "No records found";

                                	}?>
                                    <div class="clear5"></div>
                                 <div class="col-lg-12 text-right"><b>Total Records: </b>{{count($data)}}</div>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="clear20"></div>
<!--bootstarp tables-->
@stop