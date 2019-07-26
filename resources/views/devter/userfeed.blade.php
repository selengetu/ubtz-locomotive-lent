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
                           Санал хүсэлт
                        </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="joshview1 " id="add" data-toggle="modal" data-target="#myModal1">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                    Санал хүсэлт бүртгэх
                                </label>
                            </a>
                        </div>
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
                <div id="sear" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <fieldset class="scheduler-border">
                            <form method="post" action="searchuserfeed">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="input-icon">
                                                <input class="form-control datepicker" id="mach_start" name="mach_start" type="text" value="">
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
                                                <input class="form-control datepicker" id="mach_end" name="mach_end" type="text" value="">
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
                                            <button class="btn btn-info" style="background-color: #2EB9A8; border-color: #2EB9A8"><i class="fa fa-search"></i> Хайх</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
            <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
            <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
            <div class="table-container">
                <p><center><b> Санал хүсэлт</b></center> </p>
                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <table class="table table-striped table-bordered table-hover"  id="example">
                        <thead style="background-color: #81b5d5; color: #fff">
                        <tr>

                            <th> # </th>
                            <th>Хүсэлт</th>
                            <th>Илгээсэн</th>
                            <th>Програмистын хариу</th>
<th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        @foreach($feed as $feeds)
                            <tr class="tuuzzurchil" data-toggle="modal" data-target="#feedmodal" data-id="{{$feeds->feed_id}}" tag="{{$feeds->feed_id}}">
                                <td>{{$no}}</td>
                                <td>{{$feeds->feed}}</td>
                                <td>{{$feeds->name}}</td>
                                <td>{{$feeds->feed_comment}}</td>
                                <td class='m1'> <a class='btn btn-xs btn-info update' data-toggle='modal' data-target='#myModal1' data-id="{{$feeds->feed_id}}" tag='{{$feeds->feed_id}}'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag="{{$feeds->feed_id}} " href="{{route('feed.destroy', $feeds->feed_id)}}" ><span class='glyphicon glyphicon-trash'></span></a> </td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach



                        </tbody>
                    </table>
                </div>
            </div>



        </div>
        <!-- END CONTENT BODY -->
    </div>
    <div class="modal fade" id="myModal1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="addfeed" id="form1">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Санал хүсэлт бүртгэх</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-12">

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="name">Хүсэлт</label><br>
                                    <input type="hidden" name="id" id="id">
                                    <textarea rows="6" cols="100" id="feed" name="feed">
</textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                        <button type="submit" class="btn btn-primary">Хадгалах</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('cscript')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {

                "language": {
                    "lengthMenu": " _MENU_ бичлэг",
                    "zeroRecords": "Бичлэг олдсонгүй",
                    "info": "_PAGE_ ээс _PAGES_ хуудас" ,
                    "infoEmpty": "Бичлэг олдсонгүй",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Хайлт:"
                },
                dom: 'Bfrtip',
                buttons: [

                ]


            } );

            $("#mach_start").datepicker({
                format: 'yyyy-mm-dd',
                todayBtn:  1,
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#mach_end').datepicker('setStartDate', minDate);
            });

            $("#mach_end").datepicker({
                format: 'yyyy-mm-dd',
            })
                .on('changeDate', function (selected) {
                    var minDate = new Date(selected.date.valueOf());
                    $('#mach_start').datepicker('setEndDate', minDate);
                });
        } );
    </script>
    <script>

        $('.update').on('click',function(){

            document.getElementById('form1').action = "updatefeed";
            var itag=$(this).attr('tag');
            $.get('getfeed/'+itag,function(data){
                $.each(data,function(i,qwe){
                    $('#id').val(qwe.feed_id);
                    $('#feed').val(qwe.feed);

                });

            });
        });
    </script>
    <script>
        $('.add').on('click',function(){

            document.getElementById('form1').action = "addfeed"
            $('#id').val("");
            $('#feed').val("");

        });
    </script>
    </div>
@endsection