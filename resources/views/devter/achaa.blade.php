@extends('layouts.app')
@section('content')
    <style>
        .highlight { background-color: lightskyblue }
    </style>
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
                             Хөдөлгөөний дэвтэр
                           
                        </span>
                    </div>
           
                </div>
            </div>
                 

                               <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Үндсэн</a></li>
      <li><a data-toggle="tab" href="#marshrut" id="tabmarshrut">Маршрут</a></li>
    <li class="menuli1 disabled disabledTab" ><a data-toggle="tab" href="#menu1" class="nemelt">Үзүүлэлт</a><span class="tooltiptext">Tooltip text</span></li>
    <li class="menuli1 disabled disabledTab"><a data-toggle="tab" href="#menu2" class="zurchils">Дутагдал</a></li>
  </ul>
  <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="panel" >
                                            <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                                                <h4 class="panel-title">
                                                    <a  style="font-weight: bold;"> <i class="fa fa-search"></i>  Хайлт 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="sear" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                   <form method="post" action="searchtuuz">
                                                     
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <select class="form-control select2" id="devter_id" name="devter_id" value="{{$devter}}" >
                                                            <option value="0">Бүгд</option>
                                                            <option value="1">Ачаа</option>
                                                            <option value="2">Суудал</option>
                                                            <option value="3">Сэлгээ</option>
                                                        </select>
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Хөдөлгөөн
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>

                                                    </div>
                                                </div>
                                            </div>
                                                         <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control" id="achaa_start" name="achaa_start" type="text"  value="{{$startdate}}"> 
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
                                                                  <input class="form-control" id="achaa_end" name="achaa_end" type="text"  value="{{$enddate}}"> 
                                                                
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Дуусах огноо
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>
                                                                    <i class="fa fa-calendar-plus-o">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                              <input type="text" name="mach" id="mach" value="{{$machinist}}" class="hidden">
                                                              <input type="text" name="tus" id="tus" value="{{$tusmachinist}}" class="hidden">
                                                              <input type="text" name="seri" id="seri" value="{{$seri}}" class="hidden">
                                                                 <input type="text" name="seri" id="dev" value="{{$devter}}" class="hidden">
                                                        </div>
                                                       <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control" id="achaa_route" name="achaa_route" type="text"/>
                                                                
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Маршрутын дугаар
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>
                                                                    <i class="fa fa-pencil">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <select class="form-control select2" id="from_stat" name="from_stat">
                                                            <option value="0">Бүгд</option>
                                                            @foreach(\Cache::get('Station') as $stations)
                                                                <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Хаанаас
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">

                                                    <select class="select2 form-control" id="to_stat" name="to_stat" style="width: 100%">
                                                        <option value= "0"> Бүгд</option>
                                                        @foreach(\Cache::get('Station') as $stations)
                                                            <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="form_control_1" style="font-size:12px;">
                                                        Хаашаа
                                                    </label>

                                                </div>
                                            </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                
                                                                       <select class="select2 form-control" id="achaa_mach" name="achaa_mach" style="width: 100%">
                                                                          <option value= "0"> Бүгд</option>
                                                                           @foreach(\Cache::get('Machinist') as $mash) 
                                                                       <option value= "{{$mash->mashcode}}">{{$mash->mashcode}} - {{$mash->mashname}}</option>
                                                                         @endforeach
                                                                        </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Машинч
                                                                    </label>
                                                                   
                                                            </div>
                                                        </div>
                                                              <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <select class="select2 form-control" id="achaa_tus" name="achaa_tus" style="width: 100%">
                                                                          <option value= "0"> Бүгд</option>
                                                                          @foreach(\Cache::get('TusMachinist') as $tusmash) 
                                                                       <option value= "{{$tusmash->mashcode}}">{{$tusmash->mashcode}} - {{$tusmash->mashname}}</option>
                                                                         @endforeach
                                                                        </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Туслах машинч
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                           
                                                     


                                                              <div class="col-md-3">
                                
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                                                     <option value="0">Бүгд</option>
                                                                          @foreach($locserial as $locserials) 
                                                                               <option value= "{{$locserials->sericode}}">{{$locserials->seriname}}</option>
                                                                           @endforeach
                                                                     </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Илчит тэрэгний сери
                                                                    </label>
                                                                    <span class="help-block">
                                                                    </span>
                                                                   
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
              
                            <p><center><b> {{$startdate}} -аас {{$enddate}} -ны хөдөлгөөний дэвтэр</b></center> </p>
                           
                    <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                        <button class="btn btn-info" id="btnExport" onclick="ex()"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
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
              <tr class="tuuzzurchil" onclick="$('#tabmarshrut').trigger('click')" data-id="{{$achaas->marshid}}" tag="{{$achaas->marshid}}" >
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
                        <div id="printarea"  style="display: none;">

                            <p><center><b> {{$startdate}} -аас {{$enddate}} -ны хөдөлгөөний дэвтэр</b></center> </p>
                            
   <h5>Тайлан хэвлэсэн огноо: {{Carbon\Carbon::now()->format('Y-m-d H:i')}}</h5>
     <table class="table table-bordered "  id="testTable"  border="1" cellspacing="0">
                                                       <thead style="background-color: #81b5d5; color: #fff">
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
                                                        <th>Огноо</th>
                                                        <th></th>
                                                        <th> Орчуулагч</th>
                                                        <th> Орч/өдөр</th>
                                                        <th> Гаргасан зөрчил</th>
                                                           
                                                      </tr>
                                                </thead>
                                                  <tbody>
                                                     <?php $no = 1; ?>
                              @foreach($achaa as $achaas)
                                                    <tr class="tuuzzurchil" onclick="$('#tabmarshrut').trigger('click')" data-id="{{$achaas->marshid}}" tag="{{$achaas->marshid}}" >
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
                                                        <td>{{$achaas->arrtime}}</td>
                                                        <td>{{$achaas->deptime}}</td>
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
  
     <div class="row">
        <div class="col-md-6" style="padding: 10px 100px"><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span>
      </div> 
        
     </div>
    
  </div>
      </div>
  <div id="marshrut" class="tab-pane fade">
     <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                   <a style="font-weight: bold;"> <i class="fa fa-edit"> </i> Тууз бүртгэл
                                                   </a>
                                        
                                                </h4>
                                            </div>
                                          
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addribbon" id="formribbon">
                           
                                              <div class="col-md-12">
                        
                <div class="col-md-3">
                <div class="form-group">
                <label for="name">Маршрутын №</label>
                  <input type="text" class="form-control inputtext" id="tuuzmarsh" name="tuuzmarsh" readonly="true">
                    <input class="form-control hidden" id="ribbon_id" name="ribbon_id" type="text"/>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
               
                  </div>
                
                    <div class="col-md-3">
                <div class="form-group">
                <label for="name">Сери</label>
                  <input type="text" class="form-control inputtext" id="tuuzseriname" name="tuuzseriname" readonly="true">
                   <input type="text" class="form-control inputtext hidden" id="tuuzseri" name="tuuzseri" readonly="true">
                </div>
               
                  </div>
      
                    <div class="col-md-3">
                <div class="form-group">
                <label for="name">И/т №</label>
                  <input type="text" class="form-control inputtext" id="ilchit" name="ilchit" readonly="true">
                    <input type="text" class="form-control inputtext hidden" id="tuuzzut" name="tuuzzut" readonly="true">
                </div>
               
                  </div>
        
                <div class="col-md-3">
                <div class="form-group">
                       <label for="name">Хаанаас</label>
               <input type="text" class="form-control inputtext" id="fromstation" name="fromstation" >
                <input type="text" class="form-control inputtext hidden" id="fromstationcode" name="fromstationcode" >

                  <input type="text" class="form-control inputtext hidden" id="endtime" name="endtime" >

                  <input type="text" class="form-control inputtext hidden" id="starttime" name="starttime" >
                </div>
               
                  </div>
                       <div class="col-md-3">
                <div class="form-group">
                       <label for="name">Хаашаа</label>
               <input type="text" class="form-control inputtext" id="tostation" name="tostation" >
             <input type="text" class="form-control inputtext hidden" id="tostationcode" name="tostationcode" >
                </div>
               
                  </div>
                          <div class="col-md-3">
                <div class="form-group">
                <label for="name">Хурд хэмжигчийн дугаар</label>
                  <input type="number" class="form-control inputtext" id="speednumber" name="speednumber" >
                </div>
               
                  </div>
                                                  <div class="col-md-1">
                                                      <div class="form-group">
                                                          <label for="name">Нөхөлт</label>
                                                          <select class="select2 form-control" id="patch_type" name="patch_type">
                                                              <option value="1">+</option>
                                                              <option value="0">-</option>

                                                          </select>
                                                      </div>
                                                  </div>
                          <div class="col-md-2">
                           <div class="form-group">
                      <label for="name">Минут</label>
                    <input class="form-control time" id="patchmin" name="patchmin" value="00:00" type="text" />
                      </div>
                        </div>
                       
                            
                <div class="col-md-3">
                           <div class="form-group">
                             <label for="name" id="warning" style="color: black">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                  </div>


                       
                        
                                          </form>
                                        </fieldset>
                                                </div>
                                          
                                        </div>
       

                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a style="font-weight: bold;"> <i class="fa fa-flag"> </i> Гал тэрэгний бүрэлдэхүүн:
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="marshbureldehuun" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                   
                                        <div class="col-md-12">
                                                 <table id="marshburel" class="table table-striped table-bordered table-hover">
                                                     <thead>
                                                         <th>Ажлын №</th>
                                                             <th>Хэсгийн №</th>
                                                         <th>Гал тэрэгний №</th>
                                                               <th>Жин</th>
                                                               <th>Гол</th>

                                                     </thead>
                                                     <tbody></tbody>
                                                 </table>        
                                                                
                                        </div>
                                        
                                       
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                             

                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a style="font-weight: bold;"> <i class="fa fa-flag">  </i> Явсан өртөө:
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="marshstation" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                    
                                        <div class="col-md-12">
                                                 <table id="marshstat" class="table table-striped table-bordered table-hover">
                                                     <thead>
                                                         <th>Ажлын №</th>
                                                         <th>Хэсгийн №</th>
                                                         <th>Бүлгийн №</th>
                                                         <th>Өртөө код</th>       
                                                         <th>Өртөө нэр</th> 
                                                         <th>Ирсэн цаг</th> 
                                                          <th>Явсан цаг</th> 
                                                           <th>Зогссон минут</th> 
                                                     </thead>
                                                     <tbody></tbody>
                                                 </table>        
                                                                
                                        </div>
                                        
                                      
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
  </div>

  <div id="menu1" class="tab-pane fade">

               <div class="row">
                <div class="col-md-12">
                  <table class="table table-responsive table-bordered" id="nemelt" >
                     <thead style="background-color: #c0daea;


">
                               <tr>
           
                                <th>Маршрут №</th>

                                 <th> Машинч</th>
                                  <th>Туслах</th>
                                  <th>И/т №</th>
                                  <th>Зүт №</th>

                                   <th>Гал тэрэг №</th>
                                   <th>Х/х №</th>
                                   <th>Жин</th>
                                   <th>Гол</th>
                                   <th>Чиглэл</th>
                                   <th>Ирсэн цаг</th>
                                   <th>Явсан цаг</th>

                                 </tr>
                                    </thead>
                                     <tbody>

                                     </tbody>
                                                   
                  </table>
                </div>
                          <div class="col-md-3">
                              <button class="btn btn-default btn-block" type="button"  onclick="myFunction()" style="color: #2976a6"><i class="fa fa-check" id="marshattentionok" ></i>
                                  Анхаарамж
                              </button>
                              <button class="btn btn-default btn-block" type="button"  onclick="myFunctionuharsan()" style="color: #2976a6"><i class="fa fa-check" id="marshuharsanok"></i>
                                  Ухарсан
                              </button>
                              <button class="btn btn-default btn-block" type="button" onclick="myFunctionurtuu30()" style="color: #2976a6"><i class="fa fa-check" id="marshurtuu30ok"></i>
                                  Өртөөнд 30 мин илүү
                              </button>
                              <button class="btn btn-default btn-block" type="button"   onclick="myFunctionhaluun()" style="color: #2976a6"><i class="fa fa-check" id="marshhaluunzogsoltok"></i>
                                  Халуун зогсолт
                              </button>
                              <button class="btn btn-default btn-block" type="button"  onclick="myFunctionhajuu()" style="color: #2976a6"><i class="fa fa-check" id="marshhajuuok"></i>
                                  Хажуугийн зам:
                              </button>
                              <button class="btn btn-default btn-block" type="button" onclick="myFunctionhoorond()" style="color: #2976a6"> <i class="fa fa-check" id="marshhoorondok"></i>
                                  Хоорондын зам
                              </button>
                              <button class="btn btn-default btn-block" type="button" onclick="myFunctionyaraltai()" style="color: #2976a6"> <i class="fa fa-check" id="marshyaraltaiok"></i>
                                  Яаралтай тоормос
                              </button>
    <button class="btn btn-default btn-block" type="button"  onclick="myFunction20min()" style="color: #2976a6" ><i class="fa fa-check" id="marsh20ok"></i>
     20 минутаас дээш
     </button>
     <button class="btn btn-default btn-block" type="button"  onclick="myFunction20()" style="color: #2976a6" ><i class="fa fa-check" id="marsh205ok"></i>
                                  20.5 км цаг бага
     </button>

   <button class="btn btn-default btn-block" type="button"  onclick="myFunctionattention()" style="color: #2976a6" ><i class="fa fa-check" id="marshzurchilattentionok"></i>
                                  Анхаарамжаар бууж суусан
   </button>
    <button class="btn btn-default btn-block" type="button"  onclick="myFunctionbuguiwch()" style="color: #2976a6" ><i class="fa fa-check" id="marshbuguiwchok"></i>
                                  Бугуйвч
    </button>
                              <button class="btn btn-default btn-block" type="button"  onclick="myFunctionbusaduzuulelt()" style="color: #2976a6" ><i class="fa fa-check" id="marshbusaduzuuleltok"></i>
                                  Бусад
                              </button>
     <button class="btn btn-default btn-block" type="button"  onclick="myFunctiongraphiciluu()" style="color: #2976a6"><i class="fa fa-check" id="marshgraphiluuok"></i>
                                  Графикаас илүү
     </button>
      <button class="btn btn-default btn-block" type="button" onclick="myFunctiongraphicbus()" style="color: #2976a6"><i class="fa fa-check" id="marshgraphbusok"></i>
                                  Графикийн бус
      </button>
      <button class="btn btn-default btn-block" type="button" onclick="myFunctionoroh()" style="color: #2976a6"><i class="fa fa-check" id="marshorohok"></i>
                                  Орох дохио
       </button>


                              @if( Auth::user()->depo_id == 2)
       <button class="btn btn-default btn-block" type="button"  onclick="myFunctiontechno()" style="color: #2976a6"> <i class="fa fa-check" id="marshtechnook"></i>
                                  Технологит хугацаа
       </button>
                              @endif
     <button class="btn btn-default btn-block" type="button" onclick="myFunctiontogtooson()" style="color: #2976a6">  <i class="fa fa-check" id="marshconstok"></i>
                                  Тогтоосон хурданд хүрээгүй
     </button>
      <button class="btn btn-default btn-block" type="button" onclick="myFunctiontuslamj()" style="color: #2976a6"><i class="fa fa-check" id="marshtuslamjok"></i>
                                  Тусламж
       </button>

  <button class="btn btn-default btn-block" type="button"  onclick="myFunctionhii()" style="color: #2976a6" ><i class="fa fa-check" id="marshhiiok"></i>
   Хий эргэсэн
   </button>

  <button class="btn btn-default btn-block" type="button"  onclick="myFunctionhurdhemjigchgemtel()" style="color: #2976a6" ><i class="fa fa-check" id="marshhurdhemjigchok"></i>
    Хурд хэмжигч гэмтэлтэй </button>


        </div>
        <div class="col-md-9" id="colundsen">
    
               <div class="panel-group accordion" id="panelanhaaramj" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuz" style="font-weight: bold;"> <i class="fa fa-flag">  </i> Анхаарамж:
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuz" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addanhaaramj" id="formanhaaramj">
                                     
                                        <div class="col-md-12">
                                                         
                                                                <div class="col-md-3">
                           <div class="form-group">
                      <label for="name">Хаанаас</label>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <input  class="form-control inputtext hidden" id="anhaaramj_fault" name="anhaaramj_fault">
                               <input type="text" class="form-control inputtext" id="anhaaramj_from" name="anhaaramj_from">

                      </div>
                        </div>
                         <div class="col-md-3">
                           <input class="form-control hidden" id="ribbonanhaaramj_id" name="ribbonanhaaramj_id" type="text"/>
                           <div class="form-group">
                      <label for="name">Хаана</label>
                               <input type="text" class="form-control inputtext" id="anhaaramj_to" name="anhaaramj_to">

                      </div>
                        </div>
                              <div class="col-md-3">
                           <div class="form-group">
                      <label for="name">Анхаарамж</label>
                    <select class="select2 form-control" id="anhaaramj" name="anhaaramj">
                     @foreach($speed as $speeds) 
                     <option value= "{{$speeds->attentionspeed_id}}">{{$speeds->speed}}</option>
                       @endforeach
                   </select>
                      </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                       <label for="name">Олгосон минут</label>
                                <input type="number" class="form-control inputtext" id="anhaaramj_time" name="anhaaramj_time">
 
                       </div>
                         </div>
                            <div class="col-md-3 fault">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                                        </div>
                                                                   <div class="col-md-12">
                                                         
                                         <table id="marshattention" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea">
                               <tr>
           
                                <th>Хаанаас</th>
                                <th> Хаана </th>
                                 <th> Анхаарамж </th>
                                 <th> Олгосон минут </th>
                                   <th>  </th>
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    <tr style="background-color: #ccc;">
                                                      <td></td>
                                                       <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                    </tbody>
                       </table>
                                        <table id="marshattentioncount" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color:#c0daea;


">
                               <tr>
           
                                 <th> Анхаарамж </th>
                                 <th>Удаа</th>
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                                         </table>
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                 
                    
         <div class="panel-group accordion" id="panelhajuu" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">

                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuzhajuu" style="font-weight: bold;"> <i class="fa fa-road">  </i> Хажуугийн зам: 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuzhajuu" class="panel-collapse collapse in">
                                               
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" acton ="addhajuu" id="formhajuu">
                               
                                        <div class="col-md-12">
                                                          
                                                      <div class="col-md-4">
                     <div class="form-group">
                   <label for="name">Өртөө</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <input class="form-control hidden" id="ribbonhajuu_id" name="ribbonhajuu_id" type="text"/>
                           
                      <input type="text" class="form-control inputtext hidden tuuzzutguur" id="tuuzzut1" name="tuuzzut1" readonly="true">
                      <input type="text" required="true" class="form-control" id="hajuu_urtuu" name="hajuu_urtuu">

                </div>
                  </div>
                       <div class="col-md-2 fault">
                     <div class="form-group">
                       <label for="name">.</label><br>
              <button class="btn btn-success ">Нэмэх</button>
                </div>
                  </div>
          
                        
                                        </div>
                                                                                                <div class="col-md-12">
                                                         
                                         <table id="marshhajuu" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>

                                <th> Хаана </th>
                                <th style="width: 30%"></th> 
                                 </tr>
                                                </thead>
                                                  <tbody style="background-color: #c0daea;">
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            <div class="panel-group accordion" id="panelbusaduzuulelt">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#busaduzuulelt" style="font-weight: bold;"> <i class="fa fa-navicon">  </i> Бусад үзүүлэлт:
                            </a>
                        </h4>
                    </div>
                    <div id="busaduzuulelt" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <fieldset class="scheduler-border">
                                <form method="post" action="addbusaduzuulelt" id="formbusaduzuulelt">
                                    <div class="col-md-12" >


                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="name">Тайлбар</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control hidden" id="busad_id" name="busad_id" type="text"/>
                                                <input type="text" class="form-control inputtext hidden" id="tuuzzut27" name="tuuzzut27" readonly="true">
                                                <textarea class="form-control" rows="3" id="busad_reason" name="busad_reason" maxlength="255"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">.</label><br>
                                                <button class="btn btn-success">Хадгалах</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table id="marshbusaduzuulelt" class="table table-striped table-bordered table-hover" >
                                                <thead style="background-color: #c0daea;">
                                                <tr>
                                                    <th> Тайлбар</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
 <div class="panel-group accordion" id="panelgraphiciluu" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">

                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuzgraphiluu" style="font-weight: bold;"> <i class="fa fa-road">  </i> Графикаас илүү зогссон:
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuzgraphiluu" class="panel-collapse collapse in">
                                               
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addgraphiluu" id="formgraphiluu">
                                              
                                        <div class="col-md-12">
                                                          
                                                      <div class="col-md-3">
                     <div class="form-group">
                   <label for="name">Өртөө</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <input class="form-control hidden" id="ribbongraphiluu_id" name="ribbongraphiluu_id" type="text"/>
                          <input type="text" class="form-control inputtext hidden tuuzzutguur" id="tuuzzut34" name="tuuzzut34" readonly="true">
              <select class="select2 form-control" id="graphiluu_stat" name="graphiluu_stat">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                  
                  </div>
                 
                            <div class="col-md-3">
                                                  <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="graphiluu_time" name="graphiluu_time" placeholder="__:__">
             
         
                </div>
                        </div>
                       
                        <div class="col-md-3">
               
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" required="true" id="graphiluu_zogsson" name="graphiluu_zogsson">
             
         
                </div>
                        </div>
                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <label for="name">Тайлбар</label>
                                                    <input class="form-control inputtext" required="true" id="graphiluu_reason" name="graphiluu_reason">


                                                </div>
                                            </div>
                       <div class="col-md-3 fault">
                     <div class="form-group">
          
              <button class="btn btn-success">Хадгалах</button>
                </div>
                  </div>
                        
                                        </div>
                                                                                 <div class="col-md-12">
                                                         
                                         <table id="marshgraphiluu" class="table table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;


">
                               <tr>
           
                     
                                 <th> Хаана </th>
                                <th> Хэдэн цагт </th>
                                <th> Зогссон минут </th>
                                   <th> Тайлбар </th>
                                 <th> </th>
                    
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                               <div class="panel-group accordion" id="panelgraphicbus" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">

                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuzgraphbus" style="font-weight: bold;"> <i class="fa fa-road"></i>Графикийн бус зогсолт: 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuzgraphbus" class="panel-collapse collapse in">
                                               
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addgraphbus" id="formgraphbus">
                                                           
                                            <div class="col-md-12">
                                                          
                                                      <div class="col-md-3">
                     <div class="form-group">
                   <label for="name">Өртөө</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <input class="form-control hidden" id="ribbongraphbus_id" name="ribbongraphbus_id" type="text"/>
                          <input type="text" class="form-control inputtext hidden tuuzzutguur hidden" id="tuuzzut35" name="tuuzzut35" readonly="true">
              <select class="select2 form-control" id="graphbus_stat" name="graphbus_stat">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                  
                  </div>
                 
                            <div class="col-md-3">
                                                  <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="graphbus_time" name="graphbus_time" placeholder="__:__">
             
         
                </div>
                        </div>
                       
                        <div class="col-md-3">
               
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" required="true" id="graphbus_zogsson" name="graphbus_zogsson">
             
         
                </div>
                        </div>
                  <div class="col-md-3">

                      <div class="form-group">
                           <label for="name">Тайлбар</label>
                            <input class="form-control inputtext" required="true" id="graphbus_reason" name="graphbus_reason">


                      </div>
                  </div>
                       <div class="col-md-3 fault">
                     <div class="form-group">

              <button class="btn btn-success">Хадгалах</button>
                </div>
                  </div>
                        
                                        </div>
                                                                    <div class="col-md-12">
                                                         
                                         <table id="marshgraphbus" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;


">
                               <tr>
           
                     
                                <th> Хаана </th>
                                <th> Хэдэн цагт </th>
                                <th> Зогссон минут </th>
                                   <th> Тайлбар </th>
                                 <th> </th>
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
           

         <div class="panel-group accordion" id="panelhoorond" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">

                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuzhoorond" style="font-weight: bold;"> <i class="fa fa-road"></i> Хоорондын зам:
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuzhoorond" class="panel-collapse collapse in">
                                               
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addhoorond" id="formhoorond">
                                      
                  <div class="col-md-12">
                                                         
   <div class="col-md-4">
                     <div class="form-group">
                <label for="name">Хаана</label>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control hidden" id="ribbonhoorond_id" name="ribbonhoorond_id" type="text"/>
                     
                  <input type="text" class="form-control inputtext hidden tuuzzutguur " name="tuuzzut33" name="tuuzzut33" readonly="true">
                   <input type="text" class="form-control input" id="hoorond_stat" name="hoorond_stat" required="true">

                </div>
                  </div>
                        <div class="col-md-4">
                     <div class="form-group">
                <label for="name">Хэдэн цагт</label>
               <input class="form-control time" id="hoorond_time" name="hoorond_time" required="true" type="text" placeholder="__:__" />
                </div>
                  </div>
                  <div class="col-md-4">
                           <div class="form-group">
                      <label for="name">Зогссон минут</label>
                    <input class="form-control time" placeholder="__:__" required="true" id="hoorond_min" name="hoorond_min" />
                      </div>
                        </div>
                         <div class="col-md-9">
                           <div class="form-group">
                      <label for="name">Тайлбар</label>
                       <textarea class="form-control" rows="3" id="hoorond_reason" required="true" name="hoorond_reason" maxlength="255"></textarea>
            
                      </div>
                        </div>

                       <div class="col-md-3 fault">
                     <div class="form-group">
                       <label for="name">.</label><br>
              <button class="btn btn-success">Хадгалах</button>
                </div>
                  </div>
                        
                                        </div>
                                                          <div class="col-md-12">
                                                         
                                         <table id="marshhoorond" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>

                                <th> Хаана </th>
                                <th> Хэдэн цагт </th>
                                <th> Зогссон минут </th>
                                <th> Тайлбар </th>
                                 <th>  </th>
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

            <div class="panel-group accordion" id="panel20min">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchil20" style="font-weight: bold;"> <i class="fa fa-signal"> </i>  20оос дээш минут:
                            </a>
                        </h4>
                    </div>
                    <div id="zurchil20" class="panel-collapse  collapse in">
                        <div class="panel-body">
                            <fieldset class="scheduler-border">
                                <form method="post" action="addzurchil20" id="formzurchil20">



                                    <div class="col-md-12" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Өртөө</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control hidden" id="ribbonzurchil20_id" name="ribbonzurchil20_id" type="text"/>
                                                <input type="text" class="form-control inputtext hidden" id="tuuzzut30" name="tuuzzut30" readonly="true">
                                                <select class="select2 form-control" id="zurchil20_stat" name="zurchil20_stat">
                                                    @foreach(\Cache::get('Station') as $stations)
                                                        <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Зогссон минут</label>
                                                <input placeholder="__:__"  class="form-control inputtext time" required="true" id="zurchil20_zogsson" name="zurchil20_zogsson">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="name">Тайлбар</label>

                                                <textarea class="form-control" rows="3" id="zurchil20_reason" name="zurchil20_reason" maxlength="255"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">.</label><br>
                                                <button class="btn btn-success">Хадгалах</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="marsh20" class="table table-striped table-bordered table-hover" >
                                            <thead style="background-color: #c0daea;">
                                            <tr>

                                                <th> Хаана км </th>
                                                <th>Зогссон минут </th>
                                                <th> Тайлбар </th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group accordion" id="panelbuguiwch">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilbuguiwch" style="font-weight: bold;"> <i class="fa fa-navicon"></i>  Бугуйвч:
                            </a>
                        </h4>
                    </div>
                    <div id="zurchilbuguiwch" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <fieldset class="scheduler-border">
                                <form method="post" action="addzurchilbuguiwch" id="formzurchilbuguiwch">

                                    <div class="col-md-12" >


                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input class="form-control hidden" id="ribbonzurchilbuguiwch_id" name="ribbonzurchilbuguiwch_id" type="text"/>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="text" class="form-control inputtext hidden" id="tuuzzut40" name="tuuzzut40" readonly="true">
                                                <label for="name">Тайлбар</label>
                                                <textarea class="form-control" rows="3" id="zurchilbuguiwch_reason" required="true" name="zurchilbuguiwch_reason" maxlength="255"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">.</label><br>
                                                <button class="btn btn-success">Хадгалах</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="marshbuguiwch" class="table table-striped table-bordered table-hover" >
                                            <thead style="background-color: #c0daea;">
                                            <tr>

                                                <th> Тайлбар</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group accordion" id="panelhurdhemjigchgemtel">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilhurdhemjigch" style="font-weight: bold;"> <i class="fa fa-plug">  </i> Хурд хэмжигч гэмтэлтэй
                            </a>
                        </h4>
                    </div>
                    <div id="zurchilhurdhemjigch" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <fieldset class="scheduler-border">
                                <form method="post" action="addzurchilhurdhemjigch" id="formzurchilhurdhemjigch">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Гэмтлийн төрөл</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control hidden" id="ribbonzurchilhurdhemjigch_id" name="ribbonzurchilhurdhemjigch_id" type="text"/>
                                                <input type="text" class="form-control inputtext hidden" id="tuuzzut20" name="tuuzzut20" readonly="true">
                                                <select class="select2 form-control" id="zurchilhurdhemjigch_type" name="zurchilhurdhemjigch_type">
                                                    @foreach($broketype as $broketypes)
                                                        <option value= "{{$broketypes->broketype_id}}">{{$broketypes->broketype_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хаанаас</label>
                                                <input type="text" class="form-control inputtext" id="zurchilhurdhemjigch_stat" required="true" name="zurchilhurdhemjigch_stat" >

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хэдэн км</label>
                                                <input type="number" class="form-control inputtext kilo"  required="true" id="zurchilhurdhemjigch_kilo" name="zurchilhurdhemjigch_kilo" >

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хэдэн цагт</label>
                                                <input type="text" class="form-control inputtext time" required="true" id="zurchilhurdhemjigch_time" name="zurchilhurdhemjigch_time" placeholder="__:__">


                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Тех акттай эсэх</label>
                                                <select class="select2 form-control" id="zurchilhurdhemjigch_akt" name="zurchilhurdhemjigch_akt">
                                                    <option value="1"> Aкттай</option>
                                                    <option value="2"> Aктгүй</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">.</label><br>
                                                <button class="btn btn-success">Хадгалах</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="marshhurdhemjigch" class="table table-striped table-bordered table-hover" >
                                            <thead style="background-color: #c0daea;">
                                            <tr>

                                                <th> Зөрчил </th>
                                                <th> Тех акт </th>
                                                <th> Хэдэн цагт </th>
                                                <th> Хаана км </th>
                                                <th> Хэдэн км газар </th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>

                                </form>
                            </fieldset>

                        </div>


                    </div>
                </div>
            </div>
            <div class="panel-group accordion" id="panelattention">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilanhaaramj" style="font-weight: bold;"> <i class="fa fa-signal">  </i> Анхаарамжаар бууж суусан:
                            </a>
                        </h4>
                    </div>
                    <div id="zurchilanhaaramj" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <fieldset class="scheduler-border">
                                <form method="post" action="addzurchilanhaaramj" id="formzurchilanhaaramj">



                                    <div class="col-md-12" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хаана</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control hidden" id="ribbonzurchilanhaaramj_id" name="ribbonzurchilanhaaramj_id" type="text"/>
                                                <input type="text" class="form-control inputtext hidden" id="tuuzzut32" name="tuuzzut32" readonly="true">
                                                <input type="text" class="form-control" id="zurchilanhaaramj_stat" name="zurchilanhaaramj_stat">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Зогссон минут</label>
                                                <input placeholder="__:__"  class="form-control inputtext time" id="zurchilanhaaramj_zogsson" required="true" name="zurchilanhaaramj_zogsson">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Тушаал өгсөн хүний нэр</label>
                                                <input type="text" class="form-control inputtext" id="zurchilanhaaramj_tushaalner" required="true" name="zurchilanhaaramj_tushaalner">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Албан тушаал</label>
                                                <input type="text" class="form-control inputtext" id="zurchilanhaaramj_tushaal" required="true" name="zurchilanhaaramj_tushaal">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Шалтгаан</label>
                                                <input type="text" class="form-control inputtext" id="zurchilanhaaramj_reason" name="zurchilanhaaramj_reason">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">.</label><br>
                                                <button class="btn btn-success">Хадгалах</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="marshzurchilanhaaramj" class="table table-striped table-bordered table-hover" >
                                            <thead style="background-color: #c0daea;">
                                            <tr>
                                                <th> Хаана км </th>
                                                <th> Зогссон минут </th>
                                                <th> Нэр </th>
                                                <th> Албан тушаал </th>
                                                <th> Шалтгаан </th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group accordion" id="panelhii">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilhii" style="font-weight: bold;"> <i class="fa fa-signal">  </i> Хий эргэсэн:
                            </a>
                        </h4>
                    </div>
                    <div id="zurchilhii" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <fieldset class="scheduler-border">
                                <form method="post" action="addzurchilhii" id="formzurchilhii">

                                    <div class="col-md-12" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хаана</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control hidden" id="ribbonzurchilhii_id" name="ribbonzurchilhii_id" type="text"/>
                                                <input type="text" class="form-control inputtext hidden" id="tuuzzut31" name="tuuzzut31" readonly="true">
                                                <input type="text" required="true" class="form-control" id="zurchilhii_stat" name="zurchilhii_stat">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хэдэн удаа</label>
                                                <input type="number" required="true" class="form-control" id="zurchilhii_num" name="zurchilhii_num">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="name">Тайлбар</label>
                                                <textarea class="form-control" rows="3" id="zurchilhii_reason" name="zurchilhii_reason" maxlength="255"></textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">.</label><br>
                                                <button class="btn btn-success">Хадгалах</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="marshhiiergesen" class="table table-striped table-bordered table-hover" >
                                            <thead style="background-color: #c0daea;">
                                            <tr>

                                                <th> Хаана км </th>
                                                <th> Хэдэн удаа</th>
                                                <th> Тайлбар </th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group accordion" id="paneloroh">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchiloroh" style="font-weight: bold;"> <i class="fa fa-hourglass-3">  </i> Орох дохионы зогсолт:
                            </a>
                        </h4>
                    </div>
                    <div id="zurchiloroh" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <fieldset class="scheduler-border">
                                <form method="post" action="addzurchiloroh" id="formzurchiloroh">


                                    <div class="col-md-12" >


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хаанаас</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control hidden" id="ribbonzurchiloroh_id" name="ribbonzurchiloroh_id" type="text"/>
                                                <input type="text" class="form-control inputtext hidden" id="tuuzzut12" name="tuuzzut12" readonly="true">
                                                <select class="select2 form-control" id="zurchiloroh_stat" name="zurchiloroh_stat">
                                                    @foreach(\Cache::get('Station') as $stations)
                                                        <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хэдэн цагт</label>
                                                <input type="text" class="form-control inputtext time" required="true" id="zurchiloroh_time" name="zurchiloroh_time" placeholder="__:__">


                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хэдэн мин</label>
                                                <input type="text" class="form-control inputtext time" required="true" id="zurchiloroh_min" name="zurchiloroh_min"  placeholder="__:__">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Шалтгаан</label>
                                                <input type="text" class="form-control inputtext" id="zurchiloroh_reason" name="zurchiloroh_reason">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">.</label><br>
                                                <button class="btn btn-success">Хадгалах</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="marshoroh" class="table table-striped table-bordered table-hover" >
                                            <thead style="background-color: #c0daea;">
                                            <tr>
                                                <th> Хаана км</th>
                                                <th> Хэдэн цагт </th>
                                                <th> Хэдэн км </th>
                                                <th> Шалтгаан </th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
                          
                                  
                                           <div class="panel-group accordion" id="panelurtuu30" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">

                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuzurtuu30" style="font-weight: bold;"> <i class="fa fa-road"></i> Өртөөнд 30 мин илүү: 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuzurtuu30" class="panel-collapse collapse in">
                                                <div class="panel-body" id="urtuu30table">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addurtuu30" id="formurtuu30">
                                                                                      
                                        <div class="col-md-12">
                                                          
                                                      <div class="col-md-4">
                     <div class="form-group">
                   <label for="name">Өртөө</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <input class="form-control hidden" id="ribbonurtuu30_id" name="ribbonurtuu30_id" type="text"/>
                          <input type="text" class="form-control inputtext hidden tuuzzutguur" id="tuuzzut37" name="tuuzzut37" readonly="true">
              <select class="select2 form-control" id="urtuu30_stat" name="urtuu30_stat">
              @foreach(\Cache::get('Station') as $stations) 
                <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                  
                  </div>
                 
          
                       
                        <div class="col-md-4">
               
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" required="true" id="urtuu30_zogsson" name="urtuu30_zogsson">
            
         
                </div>
                        </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="name">Тайлбар</label>

                                                    <textarea class="form-control" rows="3" id="urtuu30_reason" name="urtuu30_reason" maxlength="255"></textarea>
                                                </div>
                                            </div>
                       <div class="col-md-3 fault">
                     <div class="form-group">
                       <label for="name">.</label><br>
              <button class="btn btn-success">Хадгалах</button>
                </div>
                  </div>
                        
                                        </div>
                                         <div class="col-md-12">
                                                         
                                         <table id="marshurtuu30" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
           
                     
                                 <th> Хаана </th>
                                <th> Зогссон минут </th>
                                   <th> Шалтгаан </th>
                                <th> </th>
                    
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                      </div>

                                        <div class="panel-group accordion" id="paneltechno" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">

                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuztechno" style="font-weight: bold;"> <i class="fa fa-road"></i> Технологит хугацаа: 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuztechno" class="panel-collapse collapse in">
                                               
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addtechno" id="formtechno">
                                                                                      
                                        <div class="col-md-12">
                                                          
                                                      <div class="col-md-3">
                     <div class="form-group">
                   <label for="name">Өртөө</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <input class="form-control hidden" id="ribbontechno_id" name="ribbontechno_id" type="text"/>
                          <input type="text" class="form-control inputtext hidden tuuzzutguur" id="tuuzzut38" name="tuuzzut38" readonly="true">
              <select class="select2 form-control" id="techno_stat" name="techno_stat">
             <option value= "84">Улаанбаатар</option> 
              <option value= "484">Улаанбаатар II</option>
               <option value= "76">Толгойт</option>                          
             </select>
                </div>
                  
                  </div>
                 
                            <div class="col-md-2">
                                                  <div class="form-group">
               <label for="name">Ирсэн цаг</label>
                <input type="text" class="form-control inputtext time" id="techno_time" required="true" name="techno_time" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-2">
                                                  <div class="form-group">
               <label for="name">Явсан цаг</label>
                <input type="text" class="form-control inputtext time" id="techno_timefin" required="true" name="techno_timefin" placeholder="__:__">
             
         
                </div>
                        </div>
                        <div class="col-md-3">
               
                                    <div class="form-group">
               <label for="name">Илүү минут</label>
                <input class="form-control inputtext" id="techno_zogsson" name="techno_zogsson">
             
         
                </div>
                        </div>
                       <div class="col-md-2 fault">
                     <div class="form-group">
                       <label for="name">.</label><br>
              <button class="btn btn-success">Хадгалах</button>
                </div>
                  </div>
                        
                                        </div>
                                         <div class="col-md-12">
                                                         
                                         <table id="marshtechno" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;


">
                               <tr>
           
                     
                                 <th> Хаана </th>
                                <th> Ирсэн цаг </th>
                                <th> Явсан цаг </th>
                                <th> Илүү минут </th>
                                 <th> </th>
                    
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                                    <div class="panel-group accordion" id="paneltogtooson" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">

                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuzconst" style="font-weight: bold;"> <i class="fa fa-road"> </i> Тогтоосон хурданд хүрээгүй:
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuzconst" class="panel-collapse collapse in">
                                               
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addconst" id="formconst">
                                  
                                        <div class="col-md-12">
                                                          
                   <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control hidden" id="ribbonconst_id" name="ribbonconst_id" type="text"/>
                  <input type="text" class="form-control inputtext hidden tuuzzutguur" id="tuuzzut39" name="tuuzzut39" readonly="true">
                   <input type="text" class="form-control" id="const_from" name="const_from">
                </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
                <label for="name">Хаана</label>
                 <input type="text" class="form-control" required="true" id="const_to" name="const_to">
                </div>
                        </div>
                               <div class="col-md-3">
                           <div class="form-group">
                <label for="name">Дутуу хурд</label>
                <input type="number" class="form-control inputtext kilo" required="true" id="const_speed" name="const_speed" >
          
                </div>
                        </div>
                       <div class="col-md-3 fault">
                     <div class="form-group">
                  <label for="name">.</label><br>
              <button class="btn btn-success">Хадгалах</button>
                </div>
                  </div>
                        
                                        </div>
                                                                                             <div class="col-md-12">
                                                         
                                         <table id="marshconst" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;


">
                               <tr>
           
                     
                                 <th> Хаана </th>
                                <th> Хэдэн цагт </th>
                                <th> Дутуу хурд </th>
                                <th> </th>
                    
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                           

                                      <div class="panel-group accordion" id="paneltuslamj" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuztuslamj" style="font-weight: bold;"> <i class="fa fa-space-shuttle"> </i> Тусламж: 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuztuslamj" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addtuslamj" id="formtuslamj">
                                   
                                        <div class="col-md-12">
                                                         
               <div class="col-md-3">
                     <div class="form-group">
                  <label for="name">Авсан/Өгсөн
                  </label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="form-control hidden" id="ribbontuslamj_id" name="ribbontuslamj_id" type="text"/>
              <select class="select2 form-control" id="tuslamj_type" name="tuslamj_type">
             
                    <option value= "6">Өртөөнд тусламж очсон</option>
                    <option value= "4">Өртөөнд тусламж авсан</option>
                    <option value= "3">Хоорондын зам тусламж авсан</option>
                    <option value= "5">Хоорондын зам тусламж очсон</option>
                     
             </select>
                </div>
                  </div>
                   <div class="col-md-2">
                     <div class="form-group">
                  <label for="name">Хаанаас</label>
                  <input type="text" class="form-control inputtext hidden tuuzzutguur" id="tuuzzut2" name="tuuzzut2" readonly="true">
                  <input class="form-control" id="tuslamj_from" name="tuslamj_from" required="true" type="text"/>

                </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                           <label for="name">Хаана</label>

                           <input class="form-control" id="tuslamj_to" name="tuslamj_to" required="true" type="text"/>

                      </div>
                  </div>
                        <div class="col-md-2">
                     <div class="form-group">
                <label for="name">Хэдэн цагт</label>
               <input class="form-control time" placeholder="__:__"  required="true" id="tuslamj_time" name="tuslamj_time" type="text" placeholder="__:__" />
                </div>
                  </div>
                        <div class="col-md-2">
                     <div class="form-group">
                <label for="name">Хэдэн мин</label>
               <input class="form-control time" placeholder="__:__" required="true" id="tuslamj_min" name="tuslamj_min" type="text" placeholder="__:__" />
                </div>
                  </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="name">Тайлбар</label>

                                                    <textarea class="form-control" rows="3" id="tuslamj_reason" name="tuslamj_reason" maxlength="255"></textarea>
                                                </div>
                                            </div>
                       <div class="col-md-2 fault">
                     <div class="form-group">
                       <label for="name">.</label><br>
              <button class="btn btn-success">Хадгалах</button>
                </div>
                  </div>
                        
                                        </div>
                                                                                       <div class="col-md-12">
                                                         
                                         <table id="marshtuslamj" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
           
                                <th>Хаанаас</th>
                                   <th>Хаана</th>
                                <th>Тусламж</th>
                                <th>Хэдэн цагт</th>
                                 <th>Хэдэн минут</th>
                                   <th>Шалтгаан</th>
                                  <th> </th>
                               </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
           <div class="panel-group accordion" id="paneluharsan" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuzuharsan" style="font-weight: bold;"> <i class="fa fa-reply">  </i> Ухарсан: 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuzuharsan" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="adduharsan" id="formuharsan">
                       
                                        <div class="col-md-12">
                                                         
   <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="name">Км-т</label>
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input class="form-control hidden" id="ribbonuharsan_id" name="ribbonuharsan_id" type="text"/>
                                                    <input type="text" class="form-control inputtext hidden tuuzzutguur" id="tuuzzut3" name="tuuzzut3" readonly="true">
                                                    <input type="text" class="form-control" id="uharsan_stat" name="uharsan_stat" required="true">
                                                </div>
                                            </div>

                        <div class="col-md-3">
                     <div class="form-group">
                <label for="name">Хэдэн цагт</label>
               <input class="form-control time" id="uharsan_time" required="true" name="uharsan_time" type="text" placeholder="__:__" />
                </div>
                  </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="name">Хэдэн мин</label>
                                                    <input class="form-control time" placeholder="__:__" required="true" id="uharsan_min" name="uharsan_min" type="text" placeholder="__:__" />
                                                </div>
                                            </div>
                          <div class="col-md-3">
                     <div class="form-group">
                <label for="name">Ухарсан хурд</label>
               <input class="form-control speed" id="uharsan_speed" required="true" name="uharsan_speed" type="text" />
                </div>
                  </div>
                     <div class="col-md-3">
                         <div class="form-group">
                            <label for="name">Туулсан зам (м)</label>
                            <input class="form-control" id="uharsan_km" name="uharsan_km" required="true" type="text" />
                         </div>
                      </div>
                       <div class="col-md-3 fault">
                     <div class="form-group">
                       <label for="name">.</label><br>
              <button class="btn btn-success">Хадгалах</button>
                </div>
                  </div>
                        
                                        </div>
                                                 <div class="col-md-12">
                                                         
                                         <table id="marshuharsan" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;


">
                               <tr>
           
                          
                                <th> Хаана </th>
                                 <th> Хэдэн цагт</th>
                                 <th> Ухарсан хурд</th>
                                   <th> Туулсан зам</th>
                                   <th> Хэдэн мин</th>
                                  <th> </th>
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                 </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

       <div class="panel-group accordion" id="panel20" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">

                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#tuuz205" style="font-weight: bold;"> <i class="fa fa-road"></i> 20,5 км цаг бага: 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="tuuz205" class="panel-collapse collapse in">
                                               
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="add205" id="form205">
                                         
                                        <div class="col-md-12">
                                                          
       <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Км-с</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control hidden" id="ribbon205_id" name="ribbon205_id" type="text"/>
                  <input type="text" class="form-control inputtext hidden tuuzzutguur" id="tuuzzut36" name="tuuzzut36" readonly="true">
                  <input type="text" class="form-control" id="205_from" name="205_from" required="true">

                </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
                <label for="name">Км-т</label>
                                        <input type="text" class="form-control" id="205_to" name="205_to" required="true">
                </div>
                        </div>
                       
                        <div class="col-md-2">
               
                                    <div class="form-group">
               <label for="name">Үргэлжилсэн минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" id="205_zogsson" name="205_zogsson" required="true">
             
         
                </div>
                        </div>
                                      <div class="col-md-2">
                           <div class="form-group">
                <label for="name">Хурд</label>
                <input type="number" class="form-control inputtext kilo " id="205_speed" name="205_speed" required="true" >
          
                </div>
                        </div>
                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <label for="name">Тайлбар</label>
                                                    <input class="form-control inputtext" required="true" id="205_reason" name="205_reason">


                                                </div>
                                            </div>
                       <div class="col-md-2 fault">
                     <div class="form-group">
                       <label for="name">.</label><br>
              <button class="btn btn-success">Хадгалах</button>
                </div>
                  </div>
                        
                                        </div>
                                        <div class="col-md-12">
                                                         
                                         <table id="marsh205" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
           
                     
                                 <th> Хаанаас</th>
                                <th> Хаана </th>
                                <th> Үргэлжилсэн минут</th>
                                <th> Хурд </th>
                                   <th> Тайлбар </th>
                                   <th>  </th>
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    
                 
                               
                      
                           
                                         <div class="panel-group accordion" id="panelhaluun" style="display: none">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#haluunzogsolt" style="font-weight: bold;"> <i class="fa fa-flag">  </i> Халуун зогсолт:
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="haluunzogsolt" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post"  id="formhaluunzogsolt">
                                          
                                        <div class="col-md-12">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="name">Өртөө</label>
                                                   <select class="select2 form-control" id="haluun_stat" name="haluun_stat">
                                                        @foreach(\Cache::get('Station') as $stations)
                                                            <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="name">Төрөл</label>
                                                    <select class="form-control" id="haluun_type" name="haluun_type">
                                                        <option value="1">Халуун зогсолт</option>
                                                        <option value="2">Зөөвөр</option>
                                                        <option value="3">Нэмэгдэл</option>
                                                    </select>
                                                </div>
                                            </div>
                         <div class="col-md-3">
                           <div class="form-group">
                      <label for="name">Хэдэн цагт</label>
                      <input class="form-control hidden" id="haluun_id" name="haluun_id" type="text" />
                    <input class="form-control time" required="true" id="haluun_time" name="haluun_time" type="text" placeholder="__:__" />
                      </div>
                        </div>
                              <div class="col-md-3">
                           <div class="form-group">
                      <label for="name">Зогссон/Хөдөлсөн минут</label>
                    <input class="form-control time" required="true" id="haluun_stoptime" name="haluun_stoptime" type="text" placeholder="__:__" />
                      </div>
                        </div>
                            <div class="col-md-3 fault">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                                        </div>
                                                                    <div class="col-md-12">
                                                         
                                         <table id="marshhaluunzogsolt" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                   <th> Өртөө</th>
                                   <th> Төрөл</th>
                                 <th> Хэдэн цагт</th>
                                <th> Зогссон минут</th>
                                 <th> </th>
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                 </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            <div class="panel-group accordion" id="panelyaraltai">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilyaraltai" style="font-weight: bold;"> <i class="fa fa-rocket">  </i> Яаралтай тоормос:
                            </a>
                        </h4>
                    </div>
                    <div id="zurchilyaraltai" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <fieldset class="scheduler-border">
                                <form method="post" action="addzurchilyaraltai" id="formzurchilyaraltai">


                                    <div class="col-md-12" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Шалтгаан төрөл</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control hidden" id="ribbonzurchilyaraltai_id" name="ribbonzurchilyaraltai_id" type="text"/>
                                                <input type="text" class="form-control inputtext hidden" id="tuuzzut13" name="tuuzzut13" readonly="true">
                                                <select class="select2 form-control" id="zurchilyaraltai_type" name="zurchilyaraltai_type">
                                                    @foreach($reasontype as $reasontypes)
                                                        <option value= "{{$reasontypes->broketype_id}}">{{$reasontypes->broketype_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хаана</label>
                                                <input type="text" class="form-control inputtext" required="true" id="zurchilyaraltai_stat" name="zurchilyaraltai_stat">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Хэдэн цагт</label>
                                                <input type="text" class="form-control inputtext time" required="true" id="zurchilyaraltai_time" name="zurchilyaraltai_time" placeholder="__:__">


                                            </div>
                                        </div>

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="name">Зогссон минут</label>
                                                <input placeholder="__:__"  class="form-control inputtext time" required="true" id="zurchilyaraltai_zogsson" name="zurchilyaraltai_zogsson">


                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-4">
                                            <label for="name">Дайрсан эсэх</label>
                                            <select class="select2 form-control" id="zurchilyaraltai_attack" name="zurchilyaraltai_attack">

                                                <option value= "5">Дайрагдсан</option>
                                                <option value= "6">Дайрагдахаас сэргийлсэн</option>
                                                <option value= "7">Шүргэсэн</option>
                                                <option value= "12">Өнгөрсөн</option>
                                                <option value= "13">Өнгөрөөгүй</option>

                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Шалтгаан</label>
                                                <input type="text" class="form-control inputtext" id="zurchilyaraltai_reason" name="zurchilyaraltai_reason">


                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">.</label><br>
                                                <button class="btn btn-success">Хадгалах</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="marshyaraltai" class="table table-striped table-bordered table-hover" >
                                            <thead style="background-color: #c0daea;">
                                            <tr>
                                                <th> Зөрчил</th>
                                                <th> Хаана</th>
                                                <th> Хэдэн цагт </th>
                                                <th> Хэдэн мин </th>
                                                <th> Дайрагдсан эсэх </th>
                                                <th> Тайлбар</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
       
           </div>    
               </div>
  
   

                   
  </div>

  <div id="menu2" class="tab-pane fade">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered" id="zurch">
                            <thead style="background-color: #c0daea;


">
                            <tr>

                                <th>Маршрут №</th>

                                <th> Машинч</th>
                                <th>Туслах</th>
                                <th>И/т №</th>
                                <th>Зүт №</th>

                                <th>Гал тэрэг №</th>
                                <th>Х/х №</th>
                                <th>Жин</th>
                                <th>Гол</th>
                                <th>Чиглэл</th>
                                <th>Ирсэн цаг</th>
                                <th>Явсан цаг</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                </div>
       <div class="row">   
   
           <div class="col-md-3">
   <button class="btn btn-default btn-block" type="button"  id="buttonepk" onclick="myFunctionepk()" style="color: #2976a6"> <i class="fa fa-check" id="epkok"></i>
    Сэрэмжлэх төхөөрөмж Эпк-150
  </button>
    <button class="btn btn-default btn-block" type="button" onclick="myFunctiontormoz()" id="buttontormoz" style="color: #2976a6"> <i class="fa fa-check" id="tormozok"></i>
     Тоормос
    </button>
  <button class="btn btn-default btn-block" type="button" onclick="myFunctiontsag()" id="buttontsag" style="color: #2976a6"> <i class="fa fa-check" id="tsagok"></i>
    Цаг
   </button>
   <button class="btn btn-default btn-block" type="button" onclick="myFunctionkran()" id="buttonkran" style="color: #2976a6"> <i class="fa fa-check" id="kranok"></i>
      Машинчийн кран
    </button>
    <button class="btn btn-default btn-block" type="button" onclick="myFunction45()" id="button45" style="color: #2976a6"> <i class="fa fa-check" id="45ok"></i>
                   Тоормосын баримт ВУ-45
    </button>
      <button class="btn btn-default btn-block" type="button"  id="buttonduut" onclick="myFunctionduut()" style="color: #2976a6"> <i class="fa fa-check" id="duutok"></i>
       Дуун дохио
    </button>
   <button class="btn btn-default btn-block" type="button" onclick="myFunctiontuuz()" id="buttontuuz" style="color: #2976a6"> <i class="fa fa-check" id="tuuzok"></i>
   Тууз
  </button>
  <button class="btn btn-default btn-block" type="button" onclick="myFunctionbich()" id="buttonbich" style="color: #2976a6"> <i class="fa fa-check" id="bichok"></i>
   Бичлэг
  </button>

<button class="btn btn-default btn-block" type="button" onclick="myFunctionbusad()" id="buttonbusad" style="color: #2976a6"> <i class="fa fa-check" id="busadok"></i>
   Бусад
  </button>
        </div>
         <div class="col-md-9">
    
                <div id="colepk" class="collapse in" style="display: none;">
              <div class="panel-group accordion" id="panelepkgemtel">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilepk" style="font-weight: bold;"> <i class="fa fa-industry"> </i> ЭПК гэмтэлтэй:  <i class="fa fa-check" id="marshepkgemtelok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilepk" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilepkgemtel" id="formzurchilepkgemtel">
                            
                                            
                        
                                    <div class="col-md-12" >
                    
                   
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilepkgemtel_id" name="ribbonzurchilepkgemtel_id" type="text"/>
               <input type="text" class="form-control inputtext hidden tuuzzutguur" id="tuuzzut8" name="tuuzzut8" readonly="true">
                <input type="text" class="form-control inputtext" id="zurchilepkgemtel_stat" name="zurchilepkgemtel_stat" >

                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн цагт</label>
                <input class="form-control inputtext time" required="true" id="zurchilepkgemtel_time" name="zurchilepkgemtel_time" placeholder="__:__" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Туш №</label>
                <input type="text" class="form-control inputtext" required="true" id="zurchilepkgemtel_tushno" name="zurchilepkgemtel_tushno" >
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Тушаал өгсөн</label>
                 <input type="text" class="form-control inputtext" required="true" id="zurchilepkgemtel_tushugsun" name="zurchilepkgemtel_tushugsun" placeholder="">
                </div>
                        </div>
                           <div class="col-md-3">
                           <div class="form-group">
                            <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                   <div class="col-md-12">
                                    <table id="marshepkgemtel" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Хаанаас км</th>
                                <th> Хэдэн цагт </th>
                                <th> Туш № </th>
                                <th> Нэр </th>
                                  <th></th>
                                </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                           <div class="panel-group accordion" id="panelepkhaasan">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilepkhaasan" style="font-weight: bold;"> <i class="fa fa-minus-circle"> </i> ЭПК хаалттай байдалд явсан:  <i class="fa fa-check" id="marshepkhaasanok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilepkhaasan" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilepkhaasan" id="formzurchilepkhaasan">
  
                               <div class="col-md-12" >
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label for="name">Хаанаас</label>
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                           <input type="text" class="form-control inputtext" required="true" id="zurchilepkhaasan_from" name="zurchilepkhaasan_from">
                                           <input type="hidden" class="form-control inputtext" required="true" id="ribbonzurchilepkhaasan_id" name="ribbonzurchilepkhaasan_id">
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label for="name">Хаана</label>
                                           <input type="text" class="form-control inputtext" required="true" id="zurchilepkhaasan_to" name="zurchilepkhaasan_to">
                                       </div>
                                   </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchilepkhaasan_time" name="zurchilepkhaasan_time" placeholder="__:__">
             
         
                </div>
                        </div>

                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" required="true" id="zurchilepkhaasan_kilo" name="zurchilepkhaasan_kilo" >
          
                </div>
                        </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label for="name">Шалтгаан</label>
                                           <input type="text" class="form-control inputtext" required="true" id="zurchilepkhaasan_reason" name="zurchilepkhaasan_reason">

                                       </div>
                                   </div>
                           <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                   <div class="col-md-12">
                                     <table id="marshepkhaasan" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                   <th> Хаанаас </th>
                                <th> Хаана </th>
                                <th> Хэдэн цагт </th>

                               <th> Үргэлжилсэн км </th>
                                <th> Шалтгаан </th>
                                  <th> </th>
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                               <div class="panel-group accordion" id="panelepkajil">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilepkajil" style="font-weight: bold;"> <i class="fa fa-signal"> </i> ЭПК ажиллуулсан:  <i class="fa fa-check" id="marshepkajilok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilepkajil" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilepkajil" id="formzurchilepkajil">

                               <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаана км</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilepkajil_id" name="ribbonzurchilepkajil_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut15" name="tuuzzut15" readonly="true">
               <input type="text" class="form-control inputtext" id="zurchilepkajil_stat" required="true" name="zurchilepkajil_stat">

                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilepkajil_time" required="true" name="zurchilepkajil_time">
             
         
                </div>
                        </div>
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Зогссон минут</label>
                 <input placeholder="__:__"  class="form-control inputtext time" id="zurchilepkajil_zogsson" required="true" name="zurchilepkajil_zogsson">
                </div>
                        </div>
                     <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Зогссон эсэх</label>
                 <select class="select2 form-control" id="zurchilepkajil_isstop" name="zurchilepkajil_isstop">
               <option value="1">Тийм</option>
             <option value="2">Үгүй</option>
             </select>
          
                </div>
                        </div>
                         <div class="col-md-3">
                           <div class="form-group">
                <label for="name">Тех акттай эсэх</label>
                 <select class="select2 form-control" id="zurchilepkajil_akt" name="zurchilepkajil_akt">
             <option value="1"> Aкттай</option>
             <option value="2"> Aктгүй</option>
             </select>
          
                </div>
                        </div>
                           <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                  <div class="col-md-12">
                                       <table id="marshepkajil" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                   
                                <th> Хаана км </th>
                                <th> Хэдэн цагт </th>
                                  <th>Зогссон минут </th>
                               <th> Тайлбар </th>
                                <th> Техник </th>
                                 <th></th> 
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            <div class="panel-group accordion" id="panelepkshilj">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilepkshiljuulegui" style="font-weight: bold;"> <i class="fa fa-road"> </i> ЭПК шилжүүлэлт:  <i class="fa fa-check" id="marshepkshiljok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilepkshiljuulegui" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilepkshilj" id="formzurchilepkshilj">
                              
                                            
                                       <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilepkshilj_id" name="ribbonzurchilepkshilj_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut21" name="tuuzzut21" readonly="true">
                <select class="select2 form-control" id="zurchilepkshilj_stat" name="zurchilepkshilj_stat">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                 <div class="col-md-4">
                     <div class="form-group">
                         <label for="name">Төрөл</label>
                             <select class="select2 form-control" id="zurchilepkshilj_type" name="zurchilepkshilj_type">
                                 <option value="61">Дутуу шилжүүлсэн</option>
                                 <option value="62">Өнгөрч шилжүүлсэн</option>
                                 <option value="63">Шилжүүлээгүй</option>
                             </select>
                     </div>
                  </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchilepkshilj_time" name="zurchilepkshilj_time" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн минут</label>
                <input class="form-control inputtext time" required="true" id="zurchilepkshilj_minute" name="zurchilepkshilj_minute" placeholder="__:__">
             
         
                </div>
                        </div>
                             <div class="col-md-6">
                                    <div class="form-group">
               <label for="name">Шалтгаан</label>
                <input type="text" class="form-control inputtext" id="zurchilepkshilj_reason" name="zurchilepkshilj_reason">
             
         
                </div>
                        </div>
                           <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success submit">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                               <div class="col-md-12">
                                        <table id="marshepkshilj" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                
                                <th> Өртөө</th>
                                   <th>Төрөл</th>
                                <th> Хэдэн цагт </th>
                                <th> Хэдэн минут </th>
                                <th> Шалтгаан </th>
                                  <th></th>
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <div class="panel-group accordion" id="panelepkshilj">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilepkkon" style="font-weight: bold;"> <i class="fa fa-road"> </i> КОН төхөөрөмж:  <i class="fa fa-check" id="marshepkshiljok"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="zurchilepkkon" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <fieldset class="scheduler-border">
                                        <form method="post" action="addzurchilepkkon">
                                            <div class="col-md-12" >
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Хаана км</label>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input class="form-control hidden" id="ribbonzurchilepkkon_id" name="ribbonzurchilepkkon_id" type="text"/>
                                                        <input type="text" class="form-control inputtext" id="zurchilepkkon_stat" required="true" name="zurchilepkkon_stat">

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Төрөл</label>

                                                        <select class="form-control" id="zurchilepkkon_type" required="true" name="zurchilepkkon_type">
                                                            <option value="64">Гол хоолойн даралт унагаасан</option>
                                                            <option value="65">Төхөөрөмжийг салгасан</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Хэдэн цагт</label>
                                                        <input type="text" class="form-control inputtext time" id="zurchilepkkon_time" required="true" name="zurchilepkkon_time">


                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Зогссон минут</label>
                                                        <input placeholder="__:__"  class="form-control inputtext time" id="zurchilepkkon_zogsson" required="true" name="zurchilepkkon_zogsson">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="name">Тех акттай эсэх</label>
                                                        <select class="select2 form-control" id="zurchilepkkon_akt" name="zurchilepkkon_akt">
                                                            <option value="1"> Aкттай</option>
                                                            <option value="2"> Aктгүй</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="name">.</label><br>
                                                        <button class="btn btn-success">Хадгалах</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <table id="marshepkkon" class="table table-striped table-bordered table-hover" >
                                                    <thead style="background-color: #c0daea;">
                                                    <tr>

                                                        <th> Хаана км </th>
                                                        <th> Хэдэн цагт </th>
                                                        <th>Зогссон минут </th>
                                                        <th> Тайлбар </th>
                                                        <th> Техник </th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </form>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
          <div id="colduut" class="collapse" style="display: none;">
            
                                                   <div class="panel-group accordion " id="panelduud">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilduud" style="font-weight: bold;"> <i class="fa fa-times-circle"> </i>  Дуун дохио өгөөгүй:<i class="fa fa-check" id="marshduudok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilduud" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilduud" id="formzurchilduud">

                               <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilduud_id" name="ribbonzurchilduud_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut16" name="tuuzzut16" readonly="true">
                <select class="select2 form-control" id="zurchilduud_stat" name="zurchilduud_stat">
              @foreach(\Cache::get('Station') as $stations) 
              <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchilduud_time" name="zurchilduud_time" placeholder="__:__">
             
         
                </div>
                        </div>
                     <div class="col-md-4">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                               <div class="col-md-12">
                                        <table id="marshduud" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>                      
                                <th> Өртөө</th>
                                <th> Хэдэн цагт </th>
                                 <th></th> 
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


          </div>
          <div id="coltormoz" style="display: none">
                       <div class="panel-group accordion" id="paneltormoz">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchiltormoz" style="font-weight: bold;"> <i class="fa fa-exclamation-circle">  </i> Тоормос буруу удирдсан: <i class="fa fa-check" id="marshtormozburuuok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchiltormoz" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchiltormozburuu" id="formzurchiltormozburuu"> 
                                   <div class="col-md-12" >
                    
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>

                    <input type="text" class="form-control inputtext" required="true" id="zurchiltormozburuu_stat" name="zurchiltormozburuu_stat">
                </div>
                        </div>
                            <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control inputtext time" required="true" id="zurchiltormozburuu_time" name="zurchiltormozburuu_time" placeholder="__:__">
               <input class="form-control hidden" id="ribbonzurchiltormozburuu_id" name="ribbonzurchiltormozburuu_id" type="text"/>
                  <input type="text" class="form-control inputtext hidden" id="tuuzzut7" name="tuuzzut7" readonly="true">
       
         
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн км</label>
                <input type="text" class="form-control inputtext kilo" required="true" id="zurchiltormozburuu_kilo" name="zurchiltormozburuu_kilo">
             
         
                </div>
                        </div>
                                <div class="col-md-3">
                           <div class="form-group">
                <label for="name">Тех акттай эсэх</label>
                  <select class="select2 form-control" id="zurchiltormozburuu_akt" name="zurchiltormozburuu_akt">
             <option value="1"> Aкттай</option>
             <option value="2"> Aктгүй</option>
             </select>
          
                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                <label for="name">Шалтгаан төрөл</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
                <select class="select2 form-control" id="zurchiltormozburuu_type" name="zurchiltormozburuu_type">
                @foreach($emertype as $reasontypes) 
                  <option value= "{{$reasontypes->broketype_id}}">{{$reasontypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                 
                           <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                <div class="col-md-12">
                                           <table id="marshtormozburuu" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Шалтгаан </th>
                                <th> Хэдэн цагт </th>
                                  <th> Хаана </th>
                               <th> Үргэлжилсэн км </th>
                                <th> Техник </th>
                                 <th></th>
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

              <div class="panel-group accordion" id="paneltormoz">
                  <div class="panel panel-info">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchiljoloo" style="font-weight: bold;"> <i class="fa fa-exclamation-circle">  </i> Жолоодлогын бариулыг татлагатай үед тоормос хийсэн: <i class="fa fa-check" id="marshjoloook"></i>
                              </a>
                          </h4>
                      </div>
                      <div id="zurchiljoloo" class="panel-collapse collapse">
                          <div class="panel-body">
                              <fieldset class="scheduler-border">
                                  <form method="post" action="addzurchiljoloo" id="formzurchiljoloo">
                                      <div class="col-md-12" >

                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="name">Хаанаас</label>

                                                  <input type="text" class="form-control inputtext" required="true" id="zurchiljoloo_from" name="zurchiljoloo_from">
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="name">Хаана</label>
                                                  <input class="form-control hidden" id="ribbonzurchiljoloo_id" name="ribbonzurchiljoloo_id" type="text"/>
                                                  <input type="text" class="form-control inputtext" required="true" id="zurchiljoloo_to" name="zurchiljoloo_to">
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="name">Хэдэн цагт</label>
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <input type="text" class="form-control inputtext time" required="true" id="zurchiljoloo_time" name="zurchiljoloo_time" placeholder="__:__">



                                              </div>
                                          </div>


                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">.</label><br>
                                                  <button class="btn btn-success">Хадгалах</button>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <table id="marshjoloo" class="table table-striped table-bordered table-hover" >
                                              <thead style="background-color: #c0daea;">
                                              <tr>
                                                  <th> Хаанаас </th>
                                                  <th> Хаана</th>
                                                  <th> Хэдэн цагт </th>

                                                  <th></th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>
                                          </table>

                                      </div>
                                  </form>
                              </fieldset>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="panel-group accordion" id="paneltormozz">
                  <div class="panel panel-info">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchiljolood" style="font-weight: bold;"> <i class="fa fa-exclamation-circle">  </i> Жолоодлогын бариул хугацаа бариагүй татсан <i class="fa fa-check" id="marshjoloodok"></i>
                              </a>
                          </h4>
                      </div>
                      <div id="zurchiljolood" class="panel-collapse collapse">
                          <div class="panel-body">
                              <fieldset class="scheduler-border">
                                  <form method="post" action="addzurchiljolood" id="formzurchiljolood">
                                      <div class="col-md-12" >

                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="name">Хаанаас</label>

                                                  <input type="text" class="form-control inputtext" required="true" id="zurchiljolood_from" name="zurchiljolood_from">
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="name">Хаана</label>
                                                  <input class="form-control hidden" id="ribbonzurchiljolood_id" name="ribbonzurchiljolood_id" type="text"/>
                                                  <input type="text" class="form-control inputtext" required="true" id="zurchiljolood_to" name="zurchiljolood_to">
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="name">Хэдэн цагт</label>
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <input type="text" class="form-control inputtext time" required="true" id="zurchiljolood_time" name="zurchiljolood_time" placeholder="__:__">



                                              </div>
                                          </div>


                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">.</label><br>
                                                  <button class="btn btn-success">Хадгалах</button>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <table id="marshjolood" class="table table-striped table-bordered table-hover" >
                                              <thead style="background-color: #c0daea;">
                                              <tr>
                                                  <th> Хаанаас </th>
                                                  <th> Хаана</th>
                                                  <th> Хэдэн цагт </th>

                                                  <th></th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>
                                          </table>

                                      </div>
                                  </form>
                              </fieldset>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="panel-group accordion" id="paneltormoztursh">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchiltormoztursh" style="font-weight: bold;"> <i class="fa fa-plug"></i>  Тоормос туршаагүй:  <i class="fa fa-check" id="marshtormozturshok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchiltormoztursh" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchiltormoztursh" id="formzurchiltormoztursh">
                             
                                            
                                  <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchiltormoztursh_id" name="ribbonzurchiltormoztursh_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut11" name="tuuzzut11" readonly="true">
                <select class="select2 form-control" id="zurchiltormoztursh_stat" name="zurchiltormoztursh_stat">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchiltormoztursh_time" name="zurchiltormoztursh_time" placeholder="__:__">
             
         
                </div>
                        </div>
                     <div class="col-md-4">
                    <div class="form-check">
                 
                            <label class="form-check-label" for="defaultCheck1">
                              Туршсан эсэх
                            </label>
                               <select class="select2 form-control" id="zurchiltormoztursh_tursh" name="zurchiltormoztursh_tursh">
              
                               <option value= "3">Тийм</option>
                               <option value= "4">Үгүй</option>
                                                                     
             </select>
                          </div>
                  </div>
                     <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                  <div class="col-md-12">
                                 <table id="marshtormoztursh" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                  
                                <th> Өртөө</th>
                                <th> Хэдэн цагт </th>
                                  <th> Туршаагүй</th>
                                    <th></th>
                                 
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                             <div class="panel-group accordion" id="panelgolhooloi">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilgol" style="font-weight: bold;"> <i class="fa fa-times-circle"></i> Гол хоолой тохируулаагүй:  <i class="fa fa-check" id="marshgolhooloiok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilgol" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilgolhooloi" id="formzurchilgolhooloi">
                               <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilgolhooloi_id" name="ribbonzurchilgolhooloi_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut14" name="tuuzzut14" readonly="true">
                <select class="select2 form-control" id="zurchilgolhooloi_stat" name="zurchilgolhooloi_stat">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchilgolhooloi_time" name="zurchilgolhooloi_time" placeholder="__:__">
             
         
                </div>
                        </div>
                     <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                    <div class="col-md-12">
                                        <table id="marshgolhooloi" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Өртөө</th>
                                <th> Хэдэн цагт </th>
                                  <th></th>
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
          </div>
          <div id="coltuuz" class="collapse"  style="display: none">
                                     <div class="panel-group accordion" id="paneltuuzuragdsan">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchiltuuzuragduulsan" style="font-weight: bold;"> <i class="fa fa-gear"> </i>  Тууз урагдуулсан: <i class="fa fa-check" id="marshtuuzuragdsanok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchiltuuzuragduulsan" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchiltuuzuragdsan" id="formzurchiltuuzuragdsan">

                                    <div class="col-md-12" >
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchiltuuzuragdsan_id" name="ribbonzurchiltuuzuragdsan_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut25" name="tuuzzut25" readonly="true">
               <input class="form-control" id="zurchiltuuzuragdsan_stat" name="zurchiltuuzuragdsan_stat" required="true" type="text"/>

                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" required="true" id="zurchiltuuzuragdsan_kilo" name="zurchiltuuzuragdsan_kilo" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchiltuuzuragdsan_time" name="zurchiltuuzuragdsan_time" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Бичлэгийн төрөл</label>
                <select class="select2 form-control" id="zurchiltuuzuragdsan_type" name="zurchiltuuzuragdsan_type">
             @foreach($tapetype as $tapetypes) 
                  <option value= "{{$tapetypes->broketype_id}}">{{$tapetypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                           <div class="col-md-3">
                           <div class="form-group">
             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                   <div class="col-md-12">
                                  <table id="marshtuuzuragdsan" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Хаанаас км</th>
                                 <th> Хэдэн км </th>
                                <th> Хэдэн цагт </th>
                                   <th> Бичлэг төрөл </th>
                                    <th></th>
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                       <div class="panel-group accordion" id="paneltuuzzassan">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchiltuuzzassan" style="font-weight: bold;"> <i class="fa fa-edit"> </i> Тууз зассан:
                                                        <i class="fa fa-check" id="marshtuuzok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchiltuuzzassan" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchiltuuzzassan" id="formzurchiltuuzzassan">
            
                               <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Бичлэгийн төрөл</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchiltuuzzassan_id" name="ribbonzurchiltuuzzassan_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut26" name="tuuzzut26" readonly="true">
                <select class="select2 form-control" id="zurchiltuuzzassan_type" name="zurchiltuuzzassan_type">
                 @foreach($tapetype as $tapetypes) 
                  <option value= "{{$tapetypes->broketype_id}}">{{$tapetypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchiltuuzzassan_time" name="zurchiltuuzzassan_time" placeholder="__:__">
             
         
                </div>
                        </div>
                      <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                     <div class="col-md-12">
                                                         
                                         <table id="marshtuuzzassan" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Бичлэг төрөл </th>
                                <th> Хэдэн цагт </th>
                                 <th></th>
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
          </div>
          <div id="colbich" style="display: none;">
                        <div class="panel-group accordion" id="panelbichlegbudeg">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilbichleg" style="font-weight: bold;"> <i class="fa fa-wrench"> </i> Бичлэг бүдэг:  <i class="fa fa-check" id="marshbichlegbudegok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilbichleg" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilbichlegbudeg" id="formzurchilbichlegbudeg">
                               <div class="col-md-12" >
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilbichlegbudeg_id" name="ribbonzurchilbichlegbudeg_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut22" name="tuuzzut22" readonly="true">
                <input type="text" class="form-control inputtext" id="zurchilbichlegbudeg_stat" name="zurchilbichlegbudeg_stat">

                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" required="true" id="zurchilbichlegbudeg_kilo" name="zurchilbichlegbudeg_kilo" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true"  id="zurchilbichlegbudeg_time" name="zurchilbichlegbudeg_time" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Бичлэгийн төрөл</label>
                <select class="select2 form-control" id="zurchilbichlegbudeg_type" name="zurchilbichlegbudeg_type">
               @foreach($tapetype as $tapetypes) 
                  <option value= "{{$tapetypes->broketype_id}}">{{$tapetypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>

                           <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                        <div class="col-md-12">
                                    <table id="marshbichlegbudeg" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                
                                <th> Хаанаас км</th>
                                <th> Хэдэн км </th>
                                <th> Хэдэн цагт </th>
                                <th> Бичлэг төрөл </th>
                                 <th></th>
                              
                                 
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     
                                       <div class="panel-group accordion" id="panelbichlegdutuu">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilbichlegdutuu" style="font-weight: bold;"> <i class="fa fa-reorder"></i>  Бичлэг дутуу: <i class="fa fa-check" id="marshbichlegdutuuok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilbichlegdutuu" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilbichlegdutuu" id="formzurchilbichlegdutuu">
                             
                                            
                        
                               <div class="col-md-12" >
                    
                   
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilbichlegdutuu_id" name="ribbonzurchilbichlegdutuu_id" type="text"/>
                <input type="text" class="form-control inputtext hidden" id="tuuzzut23" name="tuuzzut23" readonly="true">
                <input type="text" class="form-control inputtext" id="zurchilbichlegdutuu_stat" name="zurchilbichlegdutuu_stat">

                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" required="true" id="zurchilbichlegdutuu_kilo" name="zurchilbichlegdutuu_kilo" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchilbichlegdutuu_time" name="zurchilbichlegdutuu_time" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Бичлэгийн төрөл</label>
                <select class="select2 form-control" id="zurchilbichlegdutuu_type" name="zurchilbichlegdutuu_type">
             @foreach($tapetype as $tapetypes) 
                  <option value= "{{$tapetypes->broketype_id}}">{{$tapetypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                           <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                  <div class="col-md-12">
                                  <table id="marshbichlegdutuu" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Хаанаас км</th>
                                 <th> Хэдэн км </th>
                                <th> Хэдэн цагт </th>
                                   <th> Бичлэг төрөл </th>
                                    <th></th>
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
          </div>
             <div id="colkran" style="display: none;">
                 <div class="panel-group accordion" id="panelkran">
                     <div class="panel panel-info">
                         <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilkran" style="font-weight: bold;"> <i class="fa fa-paint-brush"> </i> Кран шалгаагүй: <i class="fa fa-check" id="marshkranok"></i>
                                 </a>
                             </h4>
                         </div>
                         <div id="zurchilkran" class="panel-collapse collapse">
                             <div class="panel-body">
                                 <fieldset class="scheduler-border">
                                     <form method="post" action="addzurchilkran" id="formzurchilkran">



                                         <div class="col-md-12"  >
                                             <div class="col-md-3">
                                                 <div class="form-group">
                                                     <label for="name">Өртөө</label>
                                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                     <input class="form-control hidden" id="ribbonzurchilkran_id" name="ribbonzurchilkran_id" type="text"/>
                                                     <input type="text" class="form-control inputtext hidden" id="tuuzzut10" name="tuuzzut10" readonly="true">
                                                     <select class="select2 form-control" id="zurchilkran_stat" name="zurchilkran_stat">
                                                         @foreach(\Cache::get('Station') as $stations)
                                                             <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col-md-3">
                                                 <div class="form-group">
                                                     <label for="name">Хэдэн цагт</label>
                                                     <input type="text" class="form-control inputtext time" required="true"  id="zurchilkran_time" name="zurchilkran_time" placeholder="__:__">


                                                 </div>
                                             </div>
                                             <div class="col-md-3">
                                                 <div class="form-group">
                                                     <label for="name">.</label><br>
                                                     <button class="btn btn-success">Хадгалах</button>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-md-12">
                                             <table id="marshkran" class="table table-striped table-bordered table-hover" >
                                                 <thead style="background-color: #c0daea;">
                                                 <tr>
                                                     <th> Өртөө</th>
                                                     <th> Хэдэн цагт </th>
                                                     <th></th>

                                                 </tr>
                                                 </thead>
                                                 <tbody>
                                                 </tbody>
                                             </table>

                                         </div>
                                     </form>
                                 </fieldset>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div id="coltsag" style="display: none;">
                 <div class="panel-group accordion" id="paneltsagzogsson">
                     <div class="panel panel-info">
                         <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchiltsagzogssn" style="font-weight: bold;"> <i class="fa fa-hourglass-1">  </i> Цаг зогссон:<i class="fa fa-check" id="marshtsagok"></i>
                                 </a>
                             </h4>
                         </div>
                         <div id="zurchiltsagzogssn" class="panel-collapse collapse">
                             <div class="panel-body">
                                 <fieldset class="scheduler-border">
                                     <form method="post" action="addzurchiltsag" id="formzurchiltsag">
                                         <div class="col-md-12">
                                             <div class="panel-body">
                                                 <div class="col-md-12" >


                                                     <div class="col-md-3">
                                                         <div class="form-group">
                                                             <label for="name">Хаанаас</label>
                                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                             <input class="form-control hidden" id="ribbonzurchiltsag_id" name="ribbonzurchiltsag_id" type="text"/>
                                                             <input type="text" class="form-control inputtext hidden" id="tuuzzut24" name="tuuzzut24" readonly="true">
                                                             <input type="text" class="form-control inputtext" id="zurchiltsag_stat" name="zurchiltsag_stat">
                                                         </div>
                                                     </div>
                                                     <div class="col-md-3">
                                                         <div class="form-group">
                                                             <label for="name">Хэдэн км</label>
                                                             <input type="number" class="form-control inputtext kilo" required="true" id="zurchiltsag_kilo" name="zurchiltsag_kilo" >

                                                         </div>
                                                     </div>
                                                     <div class="col-md-3">
                                                         <div class="form-group">
                                                             <label for="name">Хэдэн цагт</label>
                                                             <input type="text" class="form-control inputtext time" required="true" id="zurchiltsag_time" name="zurchiltsag_time" placeholder="__:__">


                                                         </div>
                                                     </div>
                                                     <div class="col-md-3">
                                                         <div class="form-group">
                                                             <label for="name">.</label><br>
                                                             <button class="btn btn-success">Хадгалах</button>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <table id="marshtsag" class="table table-striped table-bordered table-hover" >
                                                     <thead style="background-color: #c0daea;">
                                                     <tr>
                                                         <th> Хаана км</th>
                                                         <th> Хэдэн цагт </th>
                                                         <th> Хэдэн км </th>
                                                         <th></th>
                                                     </tr>
                                                     </thead>
                                                     <tbody>
                                                     </tbody>
                                                 </table>

                                             </div>


                                         </div>
                                     </form>
                                 </fieldset>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
           <div id="col45" style="display: none;">
                  <div class="panel-group accordion" id="panelvu45">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchil45" style="font-weight: bold;"> <i class="fa fa-remove">  </i> ВУ-45 зөрчсөн: <i class="fa fa-check" id="marsh45ok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchil45" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchil45" id="formzurchil45">
                       
                                            
                               <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control hidden" id="ribbonzurchil45_id" name="ribbonzurchil45_id" type="text"/>
                  <input type="text" class="form-control inputtext hidden" id="tuuzzut5" name="tuuzzut5" readonly="true">
                <select class="select2 form-control" id="zurchil45_stat" name="zurchil45_stat">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input class="form-control time" required="true" placeholder="__:__"  id="zurchil45_minute" name="zurchil45_minute">
             
         
                </div>
                        </div>
                 
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchil45_time" name="zurchil45_time" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-9">
                                    <div class="form-group">
               <label for="name">Тайлбар</label>
                  <textarea class="form-control" rows="3" id="zurchil45_reason" name="zurchil45_reason" maxlength="255"></textarea>
         
                </div>
                        </div>
                           <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                        <div class="col-md-12">
                                                         
                                             <table id="marsh45" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Өртөө </th>
                                 <th> Хэдэн цагт </th>
                                <th> Зогссон минут </th>
                               <th> Тайлбар </th>
                                 <th></th>
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
          </div>
           <div id="colbusad" class="collapse"  style="display: none">
              <div class="panel-group accordion" id="paneleffect">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchileffect" style="font-weight: bold;"> <i class="fa fa-wrench">  </i> Эффект зөрчсөн: <i class="fa fa-check" id="marsheffectok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchileffect" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchileffect" id="formzurchileffect">  
                                            
                              <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control hidden" id="ribbonzurchileffect_id" name="ribbonzurchileffect_id" type="text"/>
                  <input type="text" class="form-control inputtext hidden" id="tuuzzut6" name="tuuzzut6" readonly="true">
                <select class="select2 form-control" id="zurchileffect_stat" name="zurchileffect_stat">
                  

              @foreach(\Cache::get('Station') as $stations) 
               <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input class="form-control time" required="true"  placeholder="__:__" id="zurchileffect_minute" name="zurchileffect_minute" >
             
         
                </div>
                        </div>
                 
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchileffect_time" name="zurchileffect_time" placeholder="__:__">
             
         
                </div>
                        </div>
                       
                       </div>
                                 <div class="col-md-12" >
                        <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Заасан км</label>
                   <input type="text" class="form-control inputtext kilo" required="true" id="zurchileffect_constkilo" name="zurchileffect_constkilo" >
                </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Тогтоосон хурд</label>
                <input type="text" class="form-control inputtext speed" required="true" id="zurchileffect_constspeed" name="zurchileffect_constspeed">
             
         
                </div>
                        </div>
                 
                          <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Зөрчсөн км</label>
                <input type="text" class="form-control inputtext kilo" required="true" id="zurchileffect_faultkilo" name="zurchileffect_faultkilo" >
             
         
                </div>
                        </div>
                            <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Зөрчсөн хурд</label>
                <input type="text" class="form-control inputtext speed" required="true" id="zurchileffect_faultspeed" name="zurchileffect_faultspeed" >
             
         
                </div>
                        </div>
                            <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                             <div class="col-md-12">
                                                         
                                            <table id="marsheffect" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Өртөө </th>
                                <th> Зогссон минут </th>
                                <th> Цаг </th>
                                <th> Заасан км </th>
                                <th> Тогтоосон хурд </th>
                                <th> Зөрчсөн км </th>
                                <th> Зөрчсөн хурд </th>
                                 <th></th>
                                </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
              <div class="panel-group accordion" id="panelhurdhetruulsen">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilhurd" style="font-weight: bold;"> <i class="fa fa-road"> </i> Хурд хэтрүүлсэн: <i class="fa fa-check" id="marshhurdhetruulsenok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilhurd" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilhurd" id="formzurchilhurd">
                           
                                                      <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control hidden" id="ribbonzurchilhurd_id" name="ribbonzurchilhurd_id" type="text"/>
                  <input type="text" class="form-control inputtext hidden" id="tuuzzut4" name="tuuzzut4" readonly="true">
                   <input type="text" class="form-control inputtext" id="zurchilhurd_from" name="zurchilhurd_from">
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
                <label for="name">Хаана</label>
                 <input type="text" class="form-control inputtext" required="true" id="zurchilhurd_to" name="zurchilhurd_to">
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
                <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchilhurd_time" name="zurchilhurd_time" placeholder="__:__">
          
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэтэрсэн хурд</label>
                <input type="number" class="form-control inputtext kilo" required="true" id="zurchilhurd_speed" name="zurchilhurd_speed" >
          
                </div>
                        </div>
                           <div class="col-md-3">
                           <div class="form-group">
                               <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                    <div class="col-md-12">
                                                         
                                                        <table id="marshhurdhetruulsen" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Хэтэрсэн хурд </th>
                                <th> Хаанаас </th>
                                <th> Хаана </th>
                                 <th> Хэдэн цагт </th>
                                  <th></th>
                                 </tr>
                                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                  
                                                 <div class="panel-group accordion" id="panelklub">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilklub" style="font-weight: bold;"> <i class="fa fa-times-circle">  </i> Клуб у гэмтэлтэй: <i class="fa fa-check" id="marshklubok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilklub" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilklub" id="formzurchilklub">
                               <div class="col-md-12" >
                        <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilklub_id" name="ribbonzurchilklub_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut18" name="tuuzzut18" readonly="true">
                    <input type="text" class="form-control inputtext" required="true" id=zurchilklub_from" name="zurchilklub_from">

                </div>
                        </div>
                                 <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Хаана</label>
                  <input type="text" class="form-control inputtext" required="true" id=zurchilklub_to" name="zurchilklub_to">
                </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchilklub_time" name="zurchilklub_time" placeholder="__:__">
             
         
                </div>
                        </div>
                     <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                                  <div class="col-md-12">
                                        <table id="marshklub" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                  
                                <th> Хаанаас</th>
                                <th> Хаана</th>
                                <th> Хэдэн цагт </th>
                                  <th></th>
                                 
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                            <div class="panel-group accordion" id="panelkilo">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilkilo" style="font-weight: bold;"> <i class="fa fa-times-circle"> </i> Километр буруу:  <i class="fa fa-check" id="marshkilook"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilkilo" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilkilo" id="formzurchilkilo">

                               <div class="col-md-12" >
                        <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilkilo_id" name="ribbonzurchilkilo_id" type="text"/>
                  <input type="text" class="form-control inputtext hidden" id="tuuzzut17" name="tuuzzut17" readonly="true">
                  <input type="text" class="form-control inputtext" id="zurchilkilo_from" name="zurchilkilo_from">

                </div>
                        </div>
                                 <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Хаана</label>
                  <input type="text" class="form-control inputtext" required="true" id="zurchilkilo_to" name="zurchilkilo_to">
                </div>
                        </div>
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="name">Хэдэн км</label>
                                 <input type="text" class="form-control inputtext" required="true" id="zurchilkilo_km" name="zurchilkilo_km">
                             </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" required="true" id="zurchilkilo_time" name="zurchilkilo_time" placeholder="__:__">
             
         
                </div>
                        </div>
                     <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                       </div>
                            <div class="col-md-12">
                                        <table id="marshkilo" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                   
                                <th> Хаанаас</th>
                                <th> Хаана</th>
                                   <th> Хэдэн км</th>
                                <th> Хэдэн цагт </th>
                                 <th></th> 
                                 
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                               <div class="panel-group accordion" id="panelbusad">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#zurchilbusad" style="font-weight: bold;"> <i class="fa fa-navicon">  </i> Бусад зөрчил:<i class="fa fa-check" id="marshbusadok"></i>
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="zurchilbusad" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addzurchilbusad" id="formzurchilbusad">
                               <div class="col-md-12" >
                    
                   
                       <div class="col-md-9">
                            <div class="form-group">
                <label for="name">Тайлбар</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilbusad_id" name="ribbonzurchilbusad_id" type="text"/>
                   <input type="text" class="form-control inputtext hidden" id="tuuzzut27" name="tuuzzut27" readonly="true">
                                    <textarea class="form-control" rows="3" id="ribbonzurchilbusad_reason" name="ribbonzurchilbusad_reason" maxlength="255"></textarea>

                </div>
                        </div>
                  <div class="col-md-3">
                           <div class="form-group">
                             <label for="name">.</label><br>
                    <button class="btn btn-success">Хадгалах</button>
                      </div>
                        </div>
                                   <div class="col-md-12">
                                  <table id="marshbusad" class="table table-striped table-bordered table-hover" >
                              <thead style="background-color: #c0daea;">
                               <tr>
                                <th> Тайлбар</th>
                                 <th></th>
                                 </tr>
                                </thead>
                                                  <tbody>
                                                    </tbody>
                       </table>
                        
                                        </div>
                       </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                              
                           
                             
          </div>
      </div>
     
  </div>
</div>
        
                </div>
                <!-- END CONTENT BODY -->
            </div>
          
  @include('layouts.partials.modal')
            <style type="text/css">
              .disabledTab {
    pointer-events: none;
}
              .table-row{
                  cursor:pointer;
              }
              #nemelt tr:hover {
                  background-color: #ccc;
              }
              #zurch tr:hover {
                  background-color: #ccc;
              }
              @page { size: landscape; }
            </style>
            <style>


 .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
            @endsection
          
            @section('cscript')

@include('layouts.partials.devterscript')
@include('layouts.partials.function')
@include('layouts.partials.functioncrud')
@endsection