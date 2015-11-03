
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div style="text-align:right;">
    <img width="128" height="72" src="{{asset('custom_assets/images/app-logo.jpg')}}">
</div>
<table style=" width:100%; font-family:'arial';">
    <tr>
        <td colspan="13" style=" font-size:22px; height:50px; text-align: center; vertical-align: middle; background-color: #428BCA; color:#FFF;">
            Sales Report
        </td>
    </tr>
    <tr style="height: 35px; border-bottom:1pt solid black; font-size:12px;" valign="middle">
        <td valign="middle" style="width: 10%; text-align:center; ">#</td>
        <td valign="middle" style="width: 25%; text-align:center;">Restaurant Id</td>
        <td valign="middle" style="width: 35%; text-align:center;">Date Time</td>
        <td  valign="middle" style="width: 20%; text-align:center;">Order Id</td>
        <td valign="middle" style="width: 25%; text-align:center;">Order Type</td>
        <td valign="middle" style="width: 35%; text-align:center;">Is Paid</td>
        <td valign="middle" style="width: 35%; text-align:center;">Payment Card Type</td>
        <td valign="middle" style="width: 25%; text-align:center;">Total Paid Amount</td>
        <td valign="middle" style="width: 35%; text-align:center;">Delivery Charge Amount</td>
        <td  valign="middle" style="width: 20%; text-align:center;">Tips Amount</td>
        <td valign="middle" style="width: 25%; text-align:center;">Total Amount</td>
        <td valign="middle" style="width: 35%; text-align:center;">Sub Total Amount</td>
        
    </tr>
    <?php
    
        $SubTotalAmount        = 0;
        $TotalAmount           = 0;
        $DeliveryChargeAmount  = 0;
        $TipsAmount            = 0;
        $TotalPaidAmount       = 0;
        $count = 1;
        foreach ($data as $sale_data) { 
            if($count%2 == 0){?>
            <tr style="height: 35px; color:#333333; font-size:10px; text-align: center; vertical-align: middle;">
                <td  style="text-align:center;">{{$count}}</td>

                <td style="text-align:center;">{{$sale_data->RestaurantId}}</td>
                <td style="text-align:center;">{{$sale_data->DateTime}}</td>
                <td  style="text-align:center;">{{$sale_data->OrderId}}</td>
                <td style="text-align:center;">{{$sale_data->OrderType}}</td>
                <td style="text-align:center;">{{$sale_data->IsPaid}}</td>
                <td  style="text-align:center;">{{$sale_data->PaymentCardType}}</td>
                <td style="text-align:center;">{{'$'.$sale_data->TotalPaidAmount}}</td>
                <td style="text-align:center;">{{'$'.$sale_data->DeliveryChargeAmount}}</td>
                <td  style="text-align:center;">{{'$'.$sale_data->TipsAmount}}</td>
                <td style="text-align:center;">{{'$'.$sale_data->TotalAmount}}</td>
                <td style="text-align:center;">{{'$'.$sale_data->SubTotalAmount}}</td>
                
            </tr>
            <?php }else{?>
            <tr style="height: 35px; background-color: #F6F6F6; color:#333333; font-size:10px; text-align: center; vertical-align: middle;">
                <td  style="text-align:center;">{{$count}}</td>

                <td style="text-align:center;">{{$sale_data->RestaurantId}}</td>
                <td style="text-align:center;">{{$sale_data->DateTime}}</td>
                <td style="text-align:center;">{{$sale_data->OrderId}}</td>
                <td style="text-align:center;">{{$sale_data->OrderType}}</td>
                <td style="text-align:center;">{{$sale_data->IsPaid}}</td>
                <td style="text-align:center;">{{$sale_data->PaymentCardType}}</td>
                <td style="text-align:center;">{{'$'.$sale_data->TotalPaidAmount}}</td>
                <td style="text-align:center;">{{'$'.$sale_data->DeliveryChargeAmount}}</td>
                <td style="text-align:center;">{{'$'.$sale_data->TipsAmount}}</td>
                <td style="text-align:center;">{{'$'.$sale_data->TotalAmount}}</td>
                <td style="text-align:center;">{{'$'.$sale_data->SubTotalAmount}}</td>
            </tr>
            </tr>
            <?php }?> 
            <?php 
               
                $TotalPaidAmount           = $TotalPaidAmount + $sale_data->TotalPaidAmount;
                $DeliveryChargeAmount  = $DeliveryChargeAmount + $sale_data->DeliveryChargeAmount;
                $TipsAmount            = $TipsAmount + $sale_data->TipsAmount;
                $TotalAmount       = $TotalAmount + $sale_data->TotalAmount;
                $SubTotalAmount        = $SubTotalAmount + $sale_data->SubTotalAmount;
                $count++;
            }?> 
             <tr style=" font-weight: bold; height: 35px; color:#333333; font-size:10px; text-align: center; vertical-align: middle;">
                <td colspan="6"  style="text-align:right;"></td>

                <td  style="text-align:right;">Totals</td>
                <td  style="text-align:center;">{{$SubTotalAmount}}</td>
                <td  style="text-align:center;">{{'$'.$TotalAmount}}</td>
                <td  style="text-align:center;">{{'$'.$DeliveryChargeAmount}}</td>
                <td  style="text-align:center;">{{'$'.$TipsAmount}}</td>
                <td  style="text-align:center;">{{'$'.$TotalPaidAmount}}</td>
            </tr>
</table>
</body>
</html>
