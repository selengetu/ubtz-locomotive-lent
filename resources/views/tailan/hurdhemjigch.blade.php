         @extends('layouts.app')
@section('content')

          <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                         <div class="portlet light portlet-fit portlet-datatable">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green">
                        </i>
                        <span class="caption-subject font-green sbold uppercase">
                           Хурд хэмжигчийн гэмтэл
                        </span>
                    </div>
               
            
                </div>
            </div>

                                        <div class="panel">
                                                 <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#sear" style="font-weight: bold;"> <i class="fa fa-search"> Хайлт </i> 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="sear" class="panel-collapse collapse in ">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="hurdhemjigch">
                                        <div class="col-md-12">
                                                         <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control datepicker" id="hurd_start" name="hurd_start" type="text"  value="{{$startdate}}" /> 
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Эхлэх огноо
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>
                                                                    <i class="fa fa-calendar-plus-o">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                             <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                  <input class="form-control datepicker" id="hurd_end" name="hurd_end" type="text"  value="{{$enddate}}"/> 
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Дуусах огноо
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>
                                                                    <i class="fa fa-calendar-plus-o">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                          
                                                   
                                                         <div class="col-md-2">
                                                            <div class="form-group form-md-line-input has-success">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button class="btn btn-success" style="background-color: #81b5d5; border-color: #81b5d5;"><i class="fa fa-search"></i> Хайх</button>
                                     </div>
                                    </div>
                                        </div>
                                        
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                   
                   <div class="table-container">
                    <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                        <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
                      <p><center><b> {{$startdate}} -аас {{$enddate}} -ны хурд хэмжигчийн гэмтлийн судалгаа</b></center> </p>
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <table class="table table-striped table-bordered table-hover"  id="example">
                                                      <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Огноо </th>
                                                        <th> Бригад </th>
                                                        <th> Машинч </th>
                                                        <th> И/т № </th>
                                                        <th>Галт тэрэг  №</th>
                                                        <th>Жин</th>
                                                        <th>Гол</th>
                                                        <th> Х/х №</th>
                                                        <th>Чиглэл</th>
                                                          <th></th>

                                                        <th> Зөрчил</th>
                                                        <th>  Км-т</th>
                                                        <th> Хэдэн цагт</th>
                                                        <th> Хэдэн км</th>
                                                        <th> Тех акт</th>
                                                        
                                                      </tr>
                                                </thead>
    
                                              <tbody>
                                                     <?php $no = 1; ?>
                              @foreach($zurchil as $achaas)
                                                    <tr>
                                <td>{{$no}}</td>
                                                        <td>{{date('Y-m-d', strtotime($achaas->arrtime))}}</td>
                                
                                <td>{{$achaas->brigcode}}</td>
                                <td>{{$achaas->mashname}}</td>
                                <td>{{$achaas->seriname}} {{$achaas->zutnumber}}</td>
                                 <td>{{$achaas->train_no}}</td>
                                <td>{{$achaas->train_dirtyweight}}</td>
                                <td>{{$achaas->train_gol}}</td>
                                <td>{{$achaas->speedcontrollerno}}</td>
                                <td>{{$achaas->fromstat}}</td>
                                 <td>{{$achaas->tostat}}</td>

                                <td>{{$achaas->broketype_name}}</td>
                                <td>{{$achaas->fault_from}}</td>
                                <td>{{$achaas->fault_time}}</td>
                                <td>{{$achaas->fault_km}}</td>
                                @if($achaas->is_techact == 1)
                                <td>Акттай</td>
                                @elseif($achaas->is_techact == 2)
                                <td>Актгүй</td>
                                @endif
                          </tr>
                             <?php $no++; ?>
                         @endforeach    
            
                        
            
          </tbody>

                                            </table>
                                                <center><b>Нийт: {{$no-1}} удаа </b></center> 
  </div>
                          <div id="printarea"  style=" display:none;" >
                         <p><center><b> {{$startdate}} -аас {{$enddate}} -ны хурд хэмжигчийн гэмтлийн судалгаа</b></center> </p>
                              <h5>Тайлан хэвлэсэн огноо: {{Carbon\Carbon::now()->format('Y-m-d H:i')}}</h5>
          <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="testTable"  border="1" cellspacing="0">
                                                 <thead style="background-color: #4BD3C2; color: #fff">
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Огноо </th>
                                                        <th> Бригад </th>
                                                        <th> Машинч </th>
                                                        <th> И/т № </th>
                                                         <th>Галт тэрэг  №</th>
                                                        <th>Жин</th>
                                                        <th>Гол</th>
                                                        <th> Х/х №</th>
                                                        <th>Чиглэл</th>
                                                          <th></th>

                                                        <th> Зөрчил</th>
                                                        <th>  Км-т</th>
                                                        <th> Хэдэн цагт</th>
                                                        <th> Хэдэн км</th>
                                                        <th> Тех акт</th>
                                                        
                                                      </tr>
                                                </thead>
    
                                              <tbody>
                                                     <?php $no = 1; ?>
                              @foreach($zurchil as $achaas)
                                                    <tr>
                                <td>{{$no}}</td>
                                                        <td>{{date('Y-m-d', strtotime($achaas->arrtime))}}</td>
                                
                                <td>{{$achaas->brigcode}}</td>
                                <td>{{$achaas->mashname}}</td>
                                <td>{{$achaas->seriname}}{{$achaas->zutnumber}}</td>
                                 <td>{{$achaas->train_no}}</td>
                                <td>{{$achaas->train_dirtyweight}}</td>
                                <td>{{$achaas->train_gol}}</td>
                                <td>{{$achaas->speedcontrollerno}}</td>
                                 <td>{{$achaas->fromstat}}</td>
                                 <td>{{$achaas->tostat}}</td>

                                <td>{{$achaas->broketype_name}}</td>
                                <td>{{$achaas->fault_from}}</td>
                                <td>{{$achaas->fault_time}}</td>
                                <td>{{$achaas->fault_km}}</td>
                                @if($achaas->is_techact == 1)
                                <td>Акттай</td>
                                @elseif($achaas->is_techact == 2)
                                <td>Актгүй</td>
                                @endif
                          </tr>
                             <?php $no++; ?>
                         @endforeach    
            
                        
            
          </tbody>
                                            </table>
                                                <center><b>Нийт: {{$no-1}} удаа </b></center> 
                                               <br>
     <br>
     <div class="row">
        <div class="col-md-6" style="padding: 10px 100px"><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span>
      </div> 
        
     </div>
  </div>
</div>
</div>
           
                
               
                </div>
                <!-- END CONTENT BODY -->
            </div>
            @endsection
            @section('cscript')
            <script type="text/javascript">
  $(document).ready(function() {
          $("#hurd_start").datepicker({
        format: 'yyyy-mm-dd',
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#hurd_end').datepicker('setStartDate', minDate);
    });
    
    $("#hurd_end").datepicker({
        format: 'yyyy-mm-dd',
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#hurd_start').datepicker('setEndDate', minDate);
        });
      $('#example').DataTable( {

           "language": {
            "lengthMenu": " _MENU_ бичлэг",
            "zeroRecords": "Бичлэг олдсонгүй",
            "info": "_PAGE_ ээс _PAGES_ хуудас" ,
            "infoEmpty": "Бичлэг олдсонгүй",
            "infoFiltered": "(filtered from _MAX_ total records)",
             "search": "Хайлт:"
        },
        dom: 'lfrtpi',
        buttons: [
        
            'csv', 'excel', 'pdf'
              
            
        ]

       
    } );

} );
</script>
<script type="text/javascript">
 function printDiv() {

     var printContents = document.getElementById('printarea').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>
 <script type="text/javascript">
        var tableToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>        <p><center><b> {{$startdate}} -аас {{$enddate}} -ны  хурд хэмжигчийн гэмтлийн судалгаа</b></center> </p><table border="1">{table}</table>     <center><b>Нийт: {{$no-1}} удаа </b></center> <span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
                , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
            return function (table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                var blob = new Blob([format(template, ctx)]);
                var blobURL = window.URL.createObjectURL(blob);
 
                if (ifIE()) {
                    csvData = table.innerHTML;
                    if (window.navigator.msSaveBlob) {
                        var blob = new Blob([format(template, ctx)], {
                            type: "text/html"
                        });
                        navigator.msSaveBlob(blob, '' + name + '.xls');
                    }
                }
                else
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
 
        function ifIE() {
            var isIE11 = navigator.userAgent.indexOf(".NET CLR") > -1;
            var isIE11orLess = isIE11 || navigator.appVersion.indexOf("MSIE") != -1;
            return isIE11orLess;
        }
    </script>
@endsection