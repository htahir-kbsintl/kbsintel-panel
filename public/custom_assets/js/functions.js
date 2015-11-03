/**
  *  <Company> KBS International </Company>
  *  <author> Hammad Tahir </author>
*/
    /**
      * <summary>Date range picker code.</summary>
    */
    $("#graph_rang_picker").daterangepicker({
        applyButtonText : 'Select',
        initialText : 'Choose Date Range',
        datepickerOptions : {
        numberOfMonths : 2
        }
    });
    var start = moment().subtract('days', 7).startOf('day').toDate();
    var end = moment().subtract('days', 0).startOf('day').toDate();
    $("#graph_rang_picker").daterangepicker("setRange", {start: start , end: end});
    /**
      * <summary>Date range picker code end.</summary>
    */

    /**
      * <summary>Graph scripting.</summary>
    */
    Morris.Line({
        element: 'daily-sale',
        data: sales ,
        xkey: "Date",
        ykeys: ["NumberOfOrders","TotalAmount","DeliveryChargeAmount","TipsAmount","TotalPaidAmount"],
        labels: ["Number Of Orders","Total Amount","Delivery Charge Amount","Tips Amount","Total Paid Amount"],
        resize: true
    });
    Morris.Line({
        element: 'app-download',
        data: downloads ,
        xkey: 'Date',
        ykeys: ['Apple Downloads', 'AndroidDownloads'],
        labels:['Apple Downloads', 'Android Downloads'],
        resize: true
    });
    Morris.Line({
        element: 'user-registration',
        data: users ,
        xkey: 'Date',
        ykeys: ['NumberOfGuests','NumberOfRegistered'],
        labels:['Number Of Guests','Number Of Registered'],
        resize: true
    });
    /**
    * <summary>Graph scripting end.</summary>
    */

    /**
      * <summary>Ajax call for graph.</summary>
    */
    $("#get_date_range").on("click", function(){
        var date_range = $('#graph_rang_picker').val();
        $('.loading').css('display','block');
        $('button').attr("disabled","disabled");
            $.ajax({
                url: graph_ajax_url,
                type: "get", //send it through get method
                data:{date_range:date_range},
                success: function(response) {
                    $('#user-registration , #daily-sale ,#app-download').find('svg').remove();
                    $('#user-registration , #daily-sale ,#app-download').find('div').remove();

                    var json = JSON.parse(response);
                    console.log(json.sales);
                    Morris.Line({
                        element: 'daily-sale',
                        data: json.sales ,
                        xkey: "Date",
                        ykeys: ["NumberOfOrders","TotalAmount","DeliveryChargeAmount","TipsAmount","TotalPaidAmount"],
                        labels: ["Number Of Orders","Total Amount","Delivery Charge Amount","Tips Amount","Total Paid Amount"],
                        resize: true
                    });
                    Morris.Line({
                        element: 'app-download',
                        data: json.downloads,
                        xkey: 'Date',
                        ykeys: ['AppleDownloads', 'AndroidDownloads'],
                        labels:['Apple Downloads', 'Android Downloads'],
                        resize: true
                    });
                    Morris.Line({
                        element: 'user-registration',
                        data: json.users ,
                        xkey: 'Date',
                        ykeys: ['NumberOfGuests','NumberOfRegistered'],
                        labels:['Number Of Guests','Number Of Registered'],
                        resize: true
                    });
                    $('.loading').css('display','none');
                    $('button').removeAttr('disabled');

                    $("#show_list").attr("href", base_url + "/panel/sale_records/index/?json="+date_range+"");
                    },
                error: function(xhr) {
                //Do Something to handle error
                $('.loading').css('display','none');
                $('button').removeAttr('disabled');
                }
            });
            //end ajax
    });
    /**
      * <summary>Ajax call for graph end.</summary>
    */