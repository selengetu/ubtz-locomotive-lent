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
                        Маршрут шинэчлэх
                        </span>
                    </div>

                </div>
            </div>

            <div class="panel">
                <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                    <h4 class="panel-title">
                        <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#sear" style="font-weight: bold;">
                            <i class="fa fa-search"> </i>
                        </a>
                    </h4>
                </div>
                <div id="sear" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <fieldset class="scheduler-border">
                            <form method="post" action="refresh">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="input-icon">
                                                <input class="form-control datepicker" id="tuuzmarsh" name="tuuzmarsh" type="text" value="">
                                                <label for="form_control_1" style="font-size:12px;">
                                                    Маршрут дугаар
                                                </label>
                                                <span class="help-block">
                                                                    </span>
                                                <i class="fa fa-address-card">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group form-md-line-input has-success">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <button class="btn btn-info" style="background-color: #2EB9A8; border-color: #2EB9A8"><i class="fa fa-search"></i> Шинэчлэх</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </fieldset>
                        <div class="table-responsive">
                            <table class="table  table-bordered table-hover"  id="example"  style="overflow:scroll;">
                                <thead style="background-color: #81b5d5; color: #fff;" >
                                <tr>

                                    <th> # </th>
                                    <th> Марш</th>
                                    <th> Машинч </th>
                                    <th> Туслах </th>
                                    <th>И/т №</th>
                                    <th>Х/х №</th>
                                    <th>Гал тэрэг  №</th>
                                    <th>Жин</th>
                                    <th>Гол</th>
                                    <th> Чиглэл</th>
                                    <th> </th>

                                    <th> Орчуулагч</th>
                                    <th> Орч/өдөр</th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                @foreach($achaa as $achaas)
                                    <tr  >
                                        <td>{{$no}}</td>
                                        <td>{{$achaas->marshid}}</td>
                                        <td>{{$achaas->mashname}}</td>
                                        <td>{{$achaas->tuslname}}</td>
                                        <td>{{$achaas->seriname}} -  {{$achaas->zutnumber}}</td>
                                        <td>{{$achaas->speedcontrollerno}}</td>
                                        <td>{{$achaas->train_no}}</td>
                                        <td>{{$achaas->train_dirtyweight}}</td>
                                        <td>{{$achaas->train_gol}}</td>
                                        <td>{{$achaas->fromstat}}</td>
                                        <td>{{$achaas->tostat}}</td>
                                        <td>{{$achaas->name}}</td>
                                        <td>@if($achaas->translate_date == NULL)

                                            @elseif($achaas->translate_date != NULL)
                                                {{date('Y-m-d', strtotime($achaas->translate_date))}}
                                            @endif
                                        </td>

                                    </tr>
                                    <?php $no++; ?>
                                @endforeach



                                </tbody>
                            </table>
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
            $('#example').DataTable({

                "language": {
                    "lengthMenu": " _MENU_ бичлэг",
                    "zeroRecords": "Бичлэг олдсонгүй",
                    "info": "_PAGE_ ээс _PAGES_ хуудас",
                    "infoEmpty": "Бичлэг олдсонгүй",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Хайлт:"
                },
                dom: 'Bfrtip',
                buttons: []


            });
        });
    </script>

    </div>
@endsection