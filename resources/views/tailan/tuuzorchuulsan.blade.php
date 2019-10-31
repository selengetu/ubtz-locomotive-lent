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
                            Тууз орчуулсан тайлан
                        </span>
                    </div>
            
                </div>
            </div>
                <div class="panel">
                                                   <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                                                <h4 class="panel-title">
                                                    <a style="font-weight: bold;"> <i class="fa fa-search"> Хайлт </i> 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="sear" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="tuuzorchuulsan">
                                        <div class="col-md-12">
                                                         <div class="col-md-3">
                                                     <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control datemonth" name="month" type="text" placeholder="2018/08" id="month" /> 
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                    Тайлангийн сар
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
                                       <button class="btn btn-info"  style="background-color: #2EB9A8; border-color: #2EB9A8"><i class="fa fa-search"></i> Хайх</button>
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
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="printarea">
        <center><h4><b>  УБТЗ-ын   @if( Auth::user()->depo_id  == 1)
                        Сүхбаатар
                    @elseif( Auth::user()->depo_id == 2)
                        Улаанбаатар
                    @elseif( Auth::user()->depo_id == 3)
                        Сайншанд
                    @elseif( Auth::user()->depo_id == 5)
                        Дархан
                    @elseif( Auth::user()->depo_id == 13)
                        Замын-Үүд
                    @endif  Зүтгүүрийн депогийн {{$year}} оны {{$month}}-р сарын тууз бүртгэлийн тайлан</b> </h4></center>
      <table class="table table-striped table-bordered table-hover"  id="testTable" style="max-height:960px">
                              
                 

             <thead style="background-color: #81b5d5; color: #fff">
            <tr>
              <th rowspan="2" > № </th>
              <th rowspan="2" ></th>
              <th colspan="2" >Сараар</th>
              <th colspan="2" >Өссөн дүнгээр</th>
              <th colspan="2" >Улирлаар</th>
            </tr>
            <tr>  
              
                <th>{{$year-1}}/{{$month}} </th>
                <th>{{$year}}/{{$month}}</th>
                <th>{{$year-1}}/{{$month}} </th>
                <th>{{$year}}/{{$month}}</th>
                <th>{{$year-1}}/{{$month}} </th>
                <th>{{$year}}/{{$month}}</th>
            </tr>
          </thead>
          <tbody>
                  <tr>
                  <td rowspan="4" >1</td>
                  <td> 1.Суудал </td>
                  <td>0</td>
                  <td>
                      {{$achaa->suud}}
                  </td>
                      <td>0</td>
                      <td> {{$achaa2->suud}}</td>
                      <td>0</td>
                      <td>  {{$achaa3->suud}}</td>
                </tr>
                <tr>

                  <td> 2.Ачаа </td>
                  <td>0</td>
                  <td> {{$achaa->ach + $achaa->aj + $achaa->bteg  + $achaa->uz + $achaa->tur +$achaa->oros +$achaa->tsonh}}</td>
                    <td>0</td>
                    <td>{{$achaa2->ach + $achaa2->aj + $achaa2->bteg  + $achaa2->uz + $achaa2->tur +$achaa2->oros +$achaa2->tsonh}}</td>
                    <td>0</td>
                    <td>{{$achaa3->ach + $achaa3->aj + $achaa3->bteg  + $achaa3->uz + $achaa3->tur +$achaa3->oros +$achaa3->tsonh}}</td>
                </tr>
                <tr>

                  <td> 3.Сэлгээ </td>
                  <td>0</td>
                    <td>
                        {{$achaa->sel}}
                    </td>
                    <td>0</td>
                    <td> {{$achaa2->sel}}</td>
                    <td>0</td>
                    <td>{{$achaa3->sel}}</td>
                </tr>
                <tr>

                  <td>I.Нийт тууз </td>
                  <td>0</td>
                    <td> {{$achaa->ach + $achaa->aj + $achaa->bteg + $achaa->uz + $achaa->tur +$achaa->oros +$achaa->tsonh +$achaa->sel+$achaa->suud }}</td>
                    <td>0</td>
                    <td>{{$achaa2->ach + $achaa2->aj + $achaa2->bteg  + $achaa2->uz + $achaa2->tur +$achaa2->oros +$achaa2->tsonh +$achaa2->sel+$achaa2->suud}}</td>
                    <td>0</td>
                    <td>{{$achaa3->ach + $achaa3->aj + $achaa3->bteg  + $achaa3->uz + $achaa3->tur +$achaa3->oros +$achaa3->tsonh +$achaa3->sel+$achaa3->suud}}</td>
                </tr>
            
                <tr>          
                  <td rowspan="26" >2</td>
                  <td> 1.Хурд хэтрүүлсэн </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 32 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 32 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 32 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  
                  <td> 2.Тууз зассан </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 17 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 17 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 17 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 3.Эффэкт зөрчсөн </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 33 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 33 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 33 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 4.Тоормос буруу удирдсан </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 37 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 37 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 37 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>


                  <tr>
                      <td> 4.1 Хэт цэнэг хийсэн</td>
                      <td>0</td>
                      <td>
                          @foreach($tormoz as $n)
                              @if($n->broketype_id == 31 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td>@foreach($tormoz2 as $n)
                              @if($n->broketype_id == 31 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>@foreach($tormoz3 as $n)
                              @if($n->broketype_id == 31 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>
                      <td> 4.2 Гол хоолой унагасан</td>
                      <td>0</td>
                      <td>
                          @foreach($tormoz as $n)
                              @if($n->broketype_id == 32 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($tormoz2 as $n)
                              @if($n->broketype_id == 32 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($tormoz3 as $n)
                              @if($n->broketype_id == 32 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>
                      <td> 4.3 Хоорондын хугацаа бариагүй </td>
                      <td>0</td>
                      <td>
                          @foreach($tormoz as $n)
                              @if($n->broketype_id == 33 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($tormoz2 as $n)
                              @if($n->broketype_id == 33 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($tormoz3 as $n)
                              @if($n->broketype_id == 33 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>
                      <td> 4.4 Тоормос бариатай хугацаа хэтрүүлсэн </td>
                      <td>0</td>
                      <td>
                          @foreach($tormoz as $n)
                              @if($n->broketype_id == 10 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($tormoz2 as $n)
                              @if($n->broketype_id == 10)
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($tormoz3 as $n)
                              @if($n->broketype_id == 10 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>
                      <td> 4.5 Тоормос  сулалтын хугацаа бариагүй </td>
                      <td>0</td>
                      <td>
                          @foreach($tormoz as $n)
                              @if($n->broketype_id == 11 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($tormoz2 as $n)
                              @if($n->broketype_id == 11 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($tormoz3 as $n)
                              @if($n->broketype_id == 11 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                <tr>          
                  <td> 5.ЭПК хаасан </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 26 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 26 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 26 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 6.ЭПК ажиллуулсан </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 25 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>   @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 25 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>   @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 25 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 7.Цаг зогссон</td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 31 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 31 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 31 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 8.ВУ45 зөрчсөн </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 22 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 22 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 22 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 9.Гол хоолой тохируулаагүй </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 16 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>  @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 16 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>  @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 16 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 10.Кран шалгаагүй </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 13 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 13 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 13 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 11.Тормоз туршаагүй</td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 23 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 23 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 23 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 12.ЭПК шилжүүлээгүй </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 14 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 14 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 14 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 13.Бичлэг дутуу </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 20 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>  @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 20 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>  @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 20 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 14.Тууз урагдуулсан </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 18 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 18 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 18 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                  <tr>
                      <td> 15.Бичлэг бүдэг </td>
                      <td>0</td>
                      <td>
                          @foreach($zurchil as $n)
                              @if($n->fault_detail_id == 19 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td>  @foreach($zurchil2 as $n)
                              @if($n->fault_detail_id == 19 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>  @foreach($zurchil3 as $n)
                              @if($n->fault_detail_id == 19 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                <tr>          
                  <td> 16.Километр буруу </td>
                  <td>0</td>
                  <td>
                      @foreach($zurchil as $n)
                          @if($n->fault_detail_id == 30 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>   @foreach($zurchil2 as $n)
                            @if($n->fault_detail_id == 30 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>   @foreach($zurchil3 as $n)
                            @if($n->fault_detail_id == 30 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>

                  <tr>
                      <td> 17.Жолоодлогын бариул хугацаа бариагүй татсан</td>
                      <td>0</td>
                      <td>
                          @foreach($zurchil as $n)
                              @if($n->fault_detail_id == 161 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($zurchil2 as $n)
                              @if($n->fault_detail_id ==161 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($zurchil3 as $n)
                              @if($n->fault_detail_id == 161 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>
                      <td> 18. Жолоодлогын бариулыг татлагатай үед тоормос хийсэн</td>
                      <td>0</td>
                      <td>
                          @foreach($zurchil as $n)
                              @if($n->fault_detail_id == 34 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($zurchil2 as $n)
                              @if($n->fault_detail_id == 34 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($zurchil3 as $n)
                              @if($n->fault_detail_id == 34 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                    <tr>
                      <td> 19.Дуут дохио өгөөгүй </td>
                      <td>0</td>
                      <td>
                          @foreach($zurchil as $n)
                              @if($n->fault_detail_id == 15 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td>  @foreach($zurchil2 as $n)
                              @if($n->fault_detail_id == 15 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>  @foreach($zurchil3 as $n)
                              @if($n->fault_detail_id == 15 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>

                  <tr>
                      <td> 20.Бусад </td>
                      <td>0</td>
                      <td>
                          @foreach($zurchil as $n)
                              @if($n->fault_detail_id == 41 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td>@foreach($zurchil2 as $n)
                              @if($n->fault_detail_id == 41 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>@foreach($zurchil3 as $n)
                              @if($n->fault_detail_id == 41 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                
                <tr>          
                  
                  <td>II.Нийт дутагдалтай туузны тоо </td>
                  <td>0</td>
                  <td> @if(count($niitzurchil) >0)
                          @foreach($niitzurchil as $n)
                              {{$n->too}}
                          @endforeach
                      @else
                          0
                      @endif
                  </td>
                    <td>0</td>
                    <td>@if(count($niitzurchil2) >0)
                            @foreach($niitzurchil2 as $n)
                                {{$n->too}}
                            @endforeach
                        @else
                            0
                        @endif</td>
                    <td>0</td>
                    <td>@if(count($niitzurchil3) >0)
                            @foreach($niitzurchil3 as $n)
                                {{$n->too}}
                            @endforeach
                        @else
                            0
                        @endif</td>

                </tr>
            
            <tr>          
              <td>3</td>
              <td>III.Суудлын хоцрол нөхсөн </td>
              <td>0</td>
              <td> @if(count($hotsrolt) >0)
                      @foreach($hotsrolt as $n)
                          {{$n->sum}} мин
                      @endforeach
                  @else
                      0
                  @endif</td>
                <td>0</td>
                <td>@if(count($hotsrolt2) >0)
                        @foreach($hotsrolt2 as $n)
                            {{$n->sum}} мин
                        @endforeach
                    @else
                        0
                    @endif</td>
                <td>0</td>
                <td>@if(count($hotsrolt3) >0)
                        @foreach($hotsrolt3 as $n)
                            {{$n->sum}} мин
                        @endforeach
                    @else
                        0
                    @endif</td>
            </tr>
                <tr>          
                  <th rowspan="7" >4</th>
                  <td>Анхаарамж 5км цаг </td>
                  <td>0</td>
                  <td>
                      @foreach($speed as $n)
                          @if($n->attentionspeed_id == 1 )
                              {{$n->cnt}}

                          @endif
                        @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($speed2 as $n)
                            @if($n->attentionspeed_id == 1 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($speed3 as $n)
                            @if($n->attentionspeed_id == 1 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>

                  <td> Анхаарамж 15км цаг </td>
                  <td>0</td>
                  <td>
                      @foreach($speed as $n)
                          @if($n->attentionspeed_id == 3 )
                              {{$n->cnt}}

                          @endif
                          @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($speed2 as $n)
                            @if($n->attentionspeed_id == 3 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($speed3 as $n)
                            @if($n->attentionspeed_id == 3 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  
                  <td> Анхаарамж 25км цаг </td>
                  <td>0</td>
                  <td>
                      @foreach($speed as $n)
                          @if($n->attentionspeed_id == 4 )
                              {{$n->cnt}}

                          @endif
                      @endforeach</td>
                    <td>0</td>
                    <td> @foreach($speed2 as $n)
                            @if($n->attentionspeed_id == 4 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($speed3 as $n)
                            @if($n->attentionspeed_id == 4 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> Анхаарамж 40 км цаг </td>
                  <td>0</td>
                  <td>

                      @foreach($speed as $n)

                          @if($n->attentionspeed_id == 5 )
                              {{$n->cnt}}

                          @endif
                          @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($speed2 as $n)

                            @if($n->attentionspeed_id == 5 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($speed3 as $n)

                            @if($n->attentionspeed_id == 5 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                  <tr>

                      <td> Анхаарамж 50км цаг </td>
                      <td>0</td>
                      <td>
                          @foreach($speed as $n)
                              @if($n->attentionspeed_id == 6 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($speed2 as $n)
                              @if($n->attentionspeed_id == 6 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($speed3 as $n)
                              @if($n->attentionspeed_id == 6 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>

                      <td> Анхаарамж 60км цаг </td>
                      <td>0</td>
                      <td>
                          @foreach($speed as $n)
                              @if($n->attentionspeed_id == 7 )
                                  {{$n->cnt}}

                              @endif
                              @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($speed2 as $n)
                              @if($n->attentionspeed_id == 7 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($speed3 as $n)
                              @if($n->attentionspeed_id == 7 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>
                      <td> Анхаарамж 70 км цаг </td>
                      <td>0</td>
                      <td>
                          @foreach($speed as $n)
                              @if($n->attentionspeed_id == 8 )
                                  {{$n->cnt}}

                              @endif
                              @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($speed2 as $n)
                              @if($n->attentionspeed_id == 8 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($speed3 as $n)
                              @if($n->attentionspeed_id == 8 )
                                  {{$n->cnt}}

                              @endif
                          @endforeach</td>
                  </tr>
                <tr>          
                  <td rowspan="10" >5</td>
                  <td> 1.Цаг гэмтэлтэй </td>
                  <td>0</td>
                  <td>
                      @foreach($hurd as $n)
                          @if($n->broketype_id == 1 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($hurd2 as $n)
                            @if($n->broketype_id == 1 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($hurd3 as $n)
                            @if($n->broketype_id == 1 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  
                  <td> 2.Зүү савалдаг </td>
                  <td>0</td>
                  <td>
                    @foreach($hurd as $n)
                        @if($n->broketype_id == 2 )
                            {{$n->cnt}}

                        @endif
                    @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($hurd2 as $n)
                            @if($n->broketype_id == 2 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($hurd3 as $n)
                            @if($n->broketype_id == 2 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 3.Тууз уртассан</td>
                  <td>0</td>
                  <td>
                      @foreach($hurd as $n)
                          @if($n->broketype_id == 3 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($hurd2 as $n)
                            @if($n->broketype_id == 3 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($hurd3 as $n)
                            @if($n->broketype_id == 3 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 4.Тууз хөвөөгүй </td>
                  <td>0</td>
                  <td>
                      @foreach($hurd as $n)
                          @if($n->broketype_id == 4 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>  @foreach($hurd2 as $n)
                            @if($n->broketype_id == 4 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>  @foreach($hurd3 as $n)
                            @if($n->broketype_id == 4 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 5.Хурд хэмжигч ажилгүй </td>
                  <td>0</td>
                  <td>
                      @foreach($hurd as $n)
                          @if($n->broketype_id == 8 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>  @foreach($hurd2 as $n)
                            @if($n->broketype_id == 8 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>  @foreach($hurd3 as $n)
                            @if($n->broketype_id == 8 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                 
                </tr>
                <tr>          
                  <td> 6.ЭПК гэмтэлтэй </td>
                  <td>0</td>
                  <td>
                      @foreach($hurd as $n)
                          @if($n->broketype_id == 9 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($hurd2 as $n)
                            @if($n->broketype_id == 9 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($hurd3 as $n)
                            @if($n->broketype_id == 9 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 7.Сильфон гэмтэлтэй</td>
                  <td>0</td>
                  <td>
                      @foreach($hurd as $n)
                          @if($n->broketype_id == 5 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($hurd2 as $n)
                            @if($n->broketype_id == 5 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($hurd3 as $n)
                            @if($n->broketype_id == 5 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 8.Хурд багаар бичдэг </td>
                  <td>0</td>
                  <td>
                      @foreach($hurd as $n)
                          @if($n->broketype_id == 6 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($hurd2 as $n)
                            @if($n->broketype_id == 6 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($hurd3 as $n)
                            @if($n->broketype_id == 6 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 9.X/X дамжлагын гэмтэл </td>
                  <td>0</td>
                  <td>
                      @foreach($hurd as $n)
                          @if($n->broketype_id == 7 )
                              {{$n->cnt}}

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($hurd2 as $n)
                            @if($n->broketype_id == 7 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($hurd3 as $n)
                            @if($n->broketype_id == 7 )
                                {{$n->cnt}}

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> Нийт хурд хэмжигчийн гэмтэл </td>
                  <td>0</td>
                  <td>
                      @if(count($hurdniit) >0)
                          @foreach($hurdniit as $n)
                              {{$n->too}}
                          @endforeach
                      @else
                          0
                      @endif

                  </td>
                    <td>0</td>
                    <td>  @if(count($hurdniit2) >0)
                            @foreach($hurdniit2 as $n)
                                {{$n->too}}
                            @endforeach
                        @else
                            0
                        @endif</td>
                    <td>0</td>
                    <td>  @if(count($hurdniit3) >0)
                            @foreach($hurdniit3 as $n)
                                {{$n->too}}
                            @endforeach
                        @else
                            0
                        @endif</td>
                </tr>
            
                <tr>          
                  <td rowspan="3" >6</td>
                  <td> 1. Орох дохионы зогсолт. Суудал </td>
                  <td>0</td>
                  <td>
                      @if(count($orohsuudal) >0)
                          @foreach($orohsuudal as $n)
                              {{$n->too}} уд
                          @endforeach
                      @else
                          0 уд
                      @endif
                       @if(count($orohsuudalmin) >0)
                          @foreach($orohsuudalmin as $n)
                              {{$n->too}} мин
                          @endforeach
                      @else
                          0 мин
                      @endif
                  </td>
                    <td>0</td>
                    <td> @if(count($orohsuudal2) >0)
                            @foreach($orohsuudal2 as $n)
                                {{$n->too}} уд
                            @endforeach
                        @else
                            0 уд
                        @endif
                        @if(count($orohsuudalmin2) >0)
                            @foreach($orohsuudalmin2 as $n)
                                {{$n->too}} мин
                            @endforeach
                        @else
                            0 мин
                        @endif</td>
                    <td>0</td>
                    <td> @if(count($orohsuudal3) >0)
                            @foreach($orohsuudal3 as $n)
                                {{$n->too}} уд
                            @endforeach
                        @else
                            0 уд
                        @endif
                        @if(count($orohsuudalmin3) >0)
                            @foreach($orohsuudalmin3 as $n)
                                {{$n->too}} мин
                            @endforeach
                        @else
                            0 мин
                        @endif</td>
                </tr>
                <tr>          
                  
                  <td> 2. Орох дохионы зогсолт. Ачаа </td>
                  <td>0</td>
                  <td>
                      @if(count($orohachaa) >0)
                          @foreach($orohachaa as $n)
                              {{$n->too}} уд
                          @endforeach
                      @else
                          0 уд
                      @endif
                        @if(count($orohachaamin) >0)
                          @foreach($orohachaamin as $n)
                              {{$n->too}} мин
                          @endforeach
                      @else
                          0мин
                      @endif
                  </td>
                    <td>0</td>
                    <td>  @if(count($orohachaa2) >0)
                            @foreach($orohachaa2 as $n)
                                {{$n->too}} уд
                            @endforeach
                        @else
                            0 уд
                        @endif
                        @if(count($orohachaamin2) >0)
                            @foreach($orohachaamin2 as $n)
                                {{$n->too}} мин
                            @endforeach
                        @else
                            0мин
                        @endif</td>
                    <td>0</td>
                    <td>  @if(count($orohachaa3) >0)
                            @foreach($orohachaa3 as $n)
                                {{$n->too}} уд
                            @endforeach
                        @else
                            0 уд
                        @endif
                        @if(count($orohachaamin3) >0)
                            @foreach($orohachaamin3 as $n)
                                {{$n->too}} мин
                            @endforeach
                        @else
                            0мин
                        @endif</td>
                </tr>
                <tr>          
                  <td> Нийт орох дохионы зогсолт </td>
                  <td>0</td>
                  <td>
                      @if(count($orohniit) >0)
                          @foreach($orohniit as $n)
                              {{$n->too}} уд
                          @endforeach
                      @else
                          0 уд
                      @endif
                      @if(count($orohniitmin) >0)
                          @foreach($orohniitmin as $n)
                              {{$n->too}} мин
                          @endforeach
                      @else
                          0 мин
                      @endif
                  </td>
                    <td>0</td>
                    <td>  @if(count($orohniit2) >0)
                            @foreach($orohniit2 as $n)
                                {{$n->too}} уд
                            @endforeach
                        @else
                            0 уд
                        @endif
                        @if(count($orohniitmin2) >0)
                            @foreach($orohniitmin2 as $n)
                                {{$n->too}} мин
                            @endforeach
                        @else
                            0 мин
                        @endif</td>
                    <td>0</td>
                    <td>  @if(count($orohniit3) >0)
                            @foreach($orohniit3 as $n)
                                {{$n->too}} уд
                            @endforeach
                        @else
                            0 уд
                        @endif
                        @if(count($orohniitmin3) >0)
                            @foreach($orohniitmin3 as $n)
                                {{$n->too}} мин
                            @endforeach
                        @else
                            0 мин
                        @endif</td>
                </tr>
                  <tr>
                <td rowspan="20" >7</td>
                  <td> 1. Хүн зам дээр байсан </td>
                  <td>0</td>
                  <td>
                      @foreach($yaraltai as $n)
                          @if($n->broketype_id == 35 )
                              {{$n->cnt}} уд

                          @endif
                      @endforeach
                       @foreach($yaraltaimin as $n)
                          @if($n->broketype_id == 35 )
                              {{$n->cnt}} мин

                          @endif
                      @endforeach
                  </td>
                      <td>0</td>
                      <td>   @foreach($yaraltai2 as $n)
                              @if($n->broketype_id == 35 )
                                  {{$n->cnt}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltaimin2 as $n)
                              @if($n->broketype_id == 35 )
                                  {{$n->cnt}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>   @foreach($yaraltai3 as $n)
                              @if($n->broketype_id == 35 )
                                  {{$n->cnt}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltaimin3 as $n)
                              @if($n->broketype_id == 35 )
                                  {{$n->cnt}} мин

                              @endif
                          @endforeach</td>
                </tr>
                  <tr>

                      <td> 1.1 Дайрагдсан </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai35 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                            @foreach($yaraltai35min as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($yaraltai352 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai35min2 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($yaraltai353 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai35min3 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>

                      <td> 1.2 Дайрагдахаас сэргийлсэн </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai35 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                           @foreach($yaraltai35min as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td>@foreach($yaraltai352 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai35min2 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>@foreach($yaraltai353 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai35min3 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>

                      <td> 1.3 Шүргэсэн </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai35 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                            @foreach($yaraltai35min as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td>@foreach($yaraltai352 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai35min2 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>@foreach($yaraltai353 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai35min3 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                <tr>          
                  
                  <td> 2. Мал зам дээр байсан </td>
                  <td>0</td>
                  <td>
                      @foreach($yaraltai as $n)
                          @if($n->broketype_id == 36 )
                              {{$n->cnt}} уд

                          @endif
                      @endforeach
                       @foreach($yaraltaimin as $n)
                          @if($n->broketype_id == 36 )
                              {{$n->cnt}} мин

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($yaraltai2 as $n)
                            @if($n->broketype_id == 36 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin2 as $n)
                            @if($n->broketype_id == 36 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($yaraltai3 as $n)
                            @if($n->broketype_id == 36 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin3 as $n)
                            @if($n->broketype_id == 36 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                </tr>
                  <tr>

                      <td> 2.1 Дайрагдсан </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai36 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                            @foreach($yaraltai36min as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td>  @foreach($yaraltai362 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai36min2 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>  @foreach($yaraltai363 as $n)
                              @if($n->stop_id ==5 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai36min3 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>

                      <td> 2.2 Дайрагдахаас сэргийлсэн</td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai36 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai36min as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($yaraltai362 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai36min2 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($yaraltai363 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai36min3 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>

                      <td> 2.3 Шүргэсэн </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai36 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                           @foreach($yaraltai36min as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($yaraltai362 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai36min2 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($yaraltai363 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai36min3 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                <tr>          
                  <td> 3.Гарманд автомашин байсан </td>
                  <td>0</td>
                  <td>
                      @foreach($yaraltai as $n)
                          @if($n->broketype_id == 37 )
                              {{$n->cnt}}  уд

                          @endif
                      @endforeach
                        @foreach($yaraltaimin as $n)
                          @if($n->broketype_id == 37 ) 
                              {{$n->cnt}} мин

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>  @foreach($yaraltai2 as $n)
                            @if($n->broketype_id == 37 )
                                {{$n->cnt}}  уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin2 as $n)
                            @if($n->broketype_id == 37 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>  @foreach($yaraltai3 as $n)
                            @if($n->broketype_id == 37 )
                                {{$n->cnt}}  уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin3 as $n)
                            @if($n->broketype_id == 37 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                </tr>
                  <tr>

                      <td> 3.1 Дайрагдсан </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai37 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai37min as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($yaraltai372 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai37min2 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($yaraltai373 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai37min3 as $n)
                              @if($n->stop_id == 5 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>

                      <td> 3.2 Дайрагдахаас сэргийлсэн </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai37 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                           @foreach($yaraltai37min as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td>  @foreach($yaraltai372 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai37min2 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>  @foreach($yaraltai373 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai37min3 as $n)
                              @if($n->stop_id == 6 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>

                      <td> 3.3 Шүргэсэн </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai373 as $n)
                              @if($n->stop_id == 7 ) 
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                            @foreach($yaraltai37min3 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td>  @foreach($yaraltai372 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai37min2 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td>  @foreach($yaraltai373 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai37min3 as $n)
                              @if($n->stop_id == 7 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                <tr>          
                  <td> 4. Нээлттэй дохио хаагдсан </td>
                  <td>0</td>
                  <td>
                      @foreach($yaraltai as $n)
                          @if($n->broketype_id == 38 )
                              {{$n->cnt}} уд

                          @endif
                      @endforeach
                        @foreach($yaraltaimin as $n)
                          @if($n->broketype_id == 38 )
                              {{$n->cnt}} мин

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>  @foreach($yaraltai2 as $n)
                            @if($n->broketype_id == 38 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin2 as $n)
                            @if($n->broketype_id == 38 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>  @foreach($yaraltai3 as $n)
                            @if($n->broketype_id == 38 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin3 as $n)
                            @if($n->broketype_id == 38 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                </tr>
                  <tr>
                      <td> 4.1 Өнгөрсөн </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai38 as $n)
                              @if($n->stop_id == 12 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai38min as $n)
                              @if($n->stop_id == 12 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($yaraltai382 as $n)
                              @if($n->stop_id == 12 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai38min2 as $n)
                              @if($n->stop_id == 12 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($yaraltai383 as $n)
                              @if($n->stop_id == 12 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai38min3 as $n)
                              @if($n->stop_id == 12 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                  <tr>
                      <td> 4.2 Өнгөрөөгүй </td>
                      <td>0</td>
                      <td>
                          @foreach($yaraltai38 as $n)
                              @if($n->stop_id == 13 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai38min as $n)
                              @if($n->stop_id == 13 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach
                      </td>
                      <td>0</td>
                      <td> @foreach($yaraltai382 as $n)
                              @if($n->stop_id == 13 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai38min2 as $n)
                              @if($n->stop_id == 13 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                      <td>0</td>
                      <td> @foreach($yaraltai383 as $n)
                              @if($n->stop_id == 13 )
                                  {{$n->count}} уд

                              @endif
                          @endforeach
                          @foreach($yaraltai38min3 as $n)
                              @if($n->stop_id == 13 )
                                  {{$n->count}} мин

                              @endif
                          @endforeach</td>
                  </tr>
                <tr>          
                  <td> 5. Улаан дохионд</td>
                  <td>0</td>
                  <td>
                      @foreach($yaraltai as $n)
                          @if($n->broketype_id == 39 )
                              {{$n->cnt}} уд
 
                          @endif
                      @endforeach
                       @foreach($yaraltaimin as $n)
                          @if($n->broketype_id == 39 )
                              {{$n->cnt}} мин

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($yaraltai2 as $n)
                            @if($n->broketype_id == 39 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin2 as $n)
                            @if($n->broketype_id == 39 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($yaraltai3 as $n)
                            @if($n->broketype_id == 39 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin3 as $n)
                            @if($n->broketype_id == 39 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 6. Зам дээр эд байсан  </td>
                  <td>0</td>
                  <td>
                      @foreach($yaraltai as $n)
                          @if($n->broketype_id == 40 )
                              {{$n->cnt}} уд

                          @endif
                      @endforeach
                       @foreach($yaraltaimin as $n)
                          @if($n->broketype_id == 40 )
                              {{$n->cnt}} мин

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($yaraltai2 as $n)
                            @if($n->broketype_id == 40 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin2 as $n)
                            @if($n->broketype_id == 40 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($yaraltai3 as $n)
                            @if($n->broketype_id == 40 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin3 as $n)
                            @if($n->broketype_id == 40 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 7.Тормоз барилт муу үед </td>
                  <td>0</td>
                  <td>
                      @foreach($yaraltai as $n)
                          @if($n->broketype_id == 41 )
                              {{$n->cnt}} уд

                          @endif
                      @endforeach
                      @foreach($yaraltaimin as $n)
                          @if($n->broketype_id == 41 )
                              {{$n->cnt}} мин

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td>@foreach($yaraltai2 as $n)
                            @if($n->broketype_id == 41 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin2 as $n)
                            @if($n->broketype_id == 41 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td>@foreach($yaraltai3 as $n)
                            @if($n->broketype_id == 41 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin3 as $n)
                            @if($n->broketype_id == 41 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                </tr>
                <tr>          
                  <td> 8. Бусад </td>
                  <td>0</td>
                  <td>
                      @foreach($yaraltai as $n)
                          @if($n->broketype_id == 42 )
                              {{$n->cnt}} уд

                          @endif
                      @endforeach
                      @foreach($yaraltaimin as $n)
                          @if($n->broketype_id == 42 )
                              {{$n->cnt}} мин

                          @endif
                      @endforeach
                  </td>
                    <td>0</td>
                    <td> @foreach($yaraltai2 as $n)
                            @if($n->broketype_id == 42 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin2 as $n)
                            @if($n->broketype_id == 42 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                    <td>0</td>
                    <td> @foreach($yaraltai3 as $n)
                            @if($n->broketype_id == 42 )
                                {{$n->cnt}} уд

                            @endif
                        @endforeach
                        @foreach($yaraltaimin3 as $n)
                            @if($n->broketype_id == 42 )
                                {{$n->cnt}} мин

                            @endif
                        @endforeach</td>
                </tr>
                
                <tr>          
                  <td> VII. Нийт яаралтай тормоз </td>
                  <td>0</td>
                  <td>
                      @if(count($yaraltainiit) >0)
                          @foreach($yaraltainiit as $n)
                              {{$n->too}} уд
                          @endforeach
                      @else
                          0
                      @endif
                         @if(count($yaraltainiitmin) >0)
                          @foreach($yaraltainiitmin as $n)
                              {{$n->min}} мин
                          @endforeach
                      @else
                          0
                      @endif
                  </td>
                    <td>0</td>
                    <td> @if(count($yaraltainiit2) >0)
                            @foreach($yaraltainiit2 as $n)
                                {{$n->too}} уд
                            @endforeach
                        @else
                            0
                        @endif
                        @if(count($yaraltainiitmin2) >0)
                            @foreach($yaraltainiitmin2 as $n)
                                {{$n->min}} мин
                            @endforeach
                        @else
                            0
                        @endif</td>
                    <td>0</td>
                    <td> @if(count($yaraltainiit3) >0)
                            @foreach($yaraltainiit3 as $n)
                                {{$n->too}} уд
                            @endforeach
                        @else
                            0
                        @endif
                        @if(count($yaraltainiitmin3) >0)
                            @foreach($yaraltainiitmin3 as $n)
                                {{$n->min}} мин
                            @endforeach
                        @else
                            0
                        @endif</td>
                </tr>
            <tr>          
              <td> 8 </td>
              <td>Тусламж авсан /Х. замаас /</td>
              <td>0</td>
              <td> @if(count($tuslamjzam) >0)
                      @foreach($tuslamjzam as $n)
                          {{$n->too}} уд
                      @endforeach
                  @else
                      0 уд
                  @endif
                  @if(count($tuslamjzammin) >0)
                      @foreach($tuslamjzammin as $n)
                          {{$n->too}} мин
                      @endforeach
                  @else
                      0 мин
                  @endif</td>
                <td>0</td>
                <td> @if(count($tuslamjzam2) >0)
                        @foreach($tuslamjzam2 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($tuslamjzammin2) >0)
                        @foreach($tuslamjzammin2 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
                <td>0</td>
                <td> @if(count($tuslamjzam3) >0)
                        @foreach($tuslamjzam3 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($tuslamjzammin3) >0)
                        @foreach($tuslamjzammin3 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
            </tr>
            <tr>          
              <td> 9 </td>
              <td>Тусламж авсан / Өртөөн дээрээс /</td>
              <td>0</td>
              <td> @if(count($tuslamjurtuu) >0)
                      @foreach($tuslamjurtuu as $n)
                          {{$n->too}} уд
                      @endforeach
                  @else
                      0 уд
                  @endif
                  @if(count($tuslamjurtuumin) >0)
                      @foreach($tuslamjurtuumin as $n)
                          {{$n->too}} мин
                      @endforeach
                  @else
                      0 мин
                  @endif
              </td>
                <td>0</td>
                <td>@if(count($tuslamjurtuu2) >0)
                        @foreach($tuslamjurtuu2 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($tuslamjurtuumin2) >0)
                        @foreach($tuslamjurtuumin2 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
                <td>0</td>
                <td>@if(count($tuslamjurtuu3) >0)
                        @foreach($tuslamjurtuu3 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($tuslamjurtuumin3) >0)
                        @foreach($tuslamjurtuumin3 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
            </tr>
            
            <tr>          
              <td> 10 </td>
              <td> Ухарсан</td>
              <td>0</td>
              <td>
                  @if(count($uharsan) >0)
                      @foreach($uharsan as $n)
                          {{$n->too}} уд
                      @endforeach
                  @else
                      0 уд
                  @endif
                      @if(count($uharsanmin) >0)
                          @foreach($uharsanmin as $n)
                              {{$n->too}} мин
                          @endforeach
                      @else
                          0 мин
                      @endif
              </td>
                <td>0</td>
                <td> @if(count($uharsan2) >0)
                        @foreach($uharsan2 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($uharsanmin2) >0)
                        @foreach($uharsanmin2 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
                <td>0</td>
                <td> @if(count($uharsan3) >0)
                        @foreach($uharsan3 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($uharsanmin3) >0)
                        @foreach($uharsanmin3 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
            </tr>
            <tr>          
              <td> 11 </td>
              <td> Хоорондын замд зогссон зогсолт</td>
              <td>0</td>
              <td>
                  @if(count($hoorond) >0)
                      @foreach($hoorond as $n)
                          {{$n->too}} уд
                      @endforeach
                  @else
                      0 уд
                  @endif
                   @if(count($hoorondmin) >0)
                      @foreach($hoorondmin as $n)
                          {{$n->too}} мин
                      @endforeach
                  @else
                      0 мин
                  @endif
              </td>
                <td>0</td>
                <td>@if(count($hoorond2) >0)
                        @foreach($hoorond2 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($hoorondmin2) >0)
                        @foreach($hoorondmin2 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
                <td>0</td>
                <td>@if(count($hoorond3) >0)
                        @foreach($hoorond3 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($hoorondmin3) >0)
                        @foreach($hoorondmin3 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
            </tr>

            <tr>          
              <td> 12 </td>
              <td> Өртөөнд 30 минутаас илүү зогссон</td>
              <td>0</td>
              <td>
                  @if(count($techno) >0)
                      @foreach($techno as $n)
                          {{$n->too}} уд
                      @endforeach
                  @else
                      0 уд
                  @endif
                      @if(count($technomin) >0)
                          @foreach($technomin as $n)
                              {{$n->too}} мин
                          @endforeach
                      @else
                          0 мин
                      @endif
              </td>
                <td>0</td>
                <td> @if(count($techno2) >0)
                        @foreach($techno2 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($technomin2) >0)
                        @foreach($technomin2 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
                <td>0</td>
                <td> @if(count($techno3) >0)
                        @foreach($techno3 as $n)
                            {{$n->too}} уд
                        @endforeach
                    @else
                        0 уд
                    @endif
                    @if(count($technomin3) >0)
                        @foreach($technomin3 as $n)
                            {{$n->too}} мин
                        @endforeach
                    @else
                        0 мин
                    @endif</td>
            </tr>

                  <tr>
                      <td> 13 </td>
                      <td> Өртөөнд 120 минутаас илүү зогссон</td>
                      <td>0</td>
                      <td>
                          @if(count($iluu) >0)
                              @foreach($iluu as $n)
                                  {{$n->too}} уд
                              @endforeach
                          @else
                              0 уд
                          @endif
                          @if(count($iluumin) >0)
                              @foreach($iluumin as $n)
                                  {{$n->too}} мин
                              @endforeach
                          @else
                              0 мин
                          @endif
                      </td>
                      <td>0</td>
                      <td> @if(count($iluu2) >0)
                              @foreach($iluu2 as $n)
                                  {{$n->too}} уд
                              @endforeach
                          @else
                              0 уд
                          @endif
                          @if(count($iluumin2) >0)
                              @foreach($iluumin2 as $n)
                                  {{$n->too}} мин
                              @endforeach
                          @else
                              0 мин
                          @endif</td>
                      <td>0</td>
                      <td> @if(count($iluu3) >0)
                              @foreach($iluu3 as $n)
                                  {{$n->too}} уд
                              @endforeach
                          @else
                              0 уд
                          @endif
                          @if(count($iluumin3) >0)
                              @foreach($iluumin3 as $n)
                                  {{$n->too}} мин
                              @endforeach
                          @else
                              0 мин
                          @endif</td>
                  </tr>
          
            
          </tbody>
          </table>
                          
  </div>
</div>
           
                
               
                </div>
                <!-- END CONTENT BODY -->
            </div>
            @endsection
            @section('cscript')
          <script type="text/javascript">
            $("#datepicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
});
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
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><p><center><b>  УБТЗ-ын   @if( Auth::user()->depo_id  == 1)\n' +
                '                        Сүхбаатар\n' +
                '                    @elseif( Auth::user()->depo_id == 2)\n' +
                '                        Улаанбаатар\n' +
                '                    @elseif( Auth::user()->depo_id == 3)\n' +
                '                        Сайншанд\n' +
                '                    @elseif( Auth::user()->depo_id == 5)\n' +
                '                        Дархан\n' +
                '                    @elseif( Auth::user()->depo_id == 13)\n' +
                '                        Замын-Үүд\n' +
                '                    @endif  Зүтгүүрийн депогийн {{$year}} оны {{$month}}-р сарын тууз бүртгэлийн тайлан</b>  </center> </p><table border="1">{table}</table><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
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