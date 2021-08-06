 <div class="modal fade" id="modalhajuu" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="hajuumodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Хажуугийн зам</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                  <div class="col-md-12">
                <input class="form-control hidden" id="hajuu_fault" name="hajuu_fault" type="text"/>
                    <div class="col-md-9">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                <label for="name">Хаана</label>
                          <input type="text" class="form-control" id="hajuu_urtuumodal" name="hajuu_urtuumodal">

                </div>
                    </div>
            
                     
      
                  </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
       <div class="modal fade" id="modalhoorond" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="hoorondmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Хоорондын зам</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
         <div class="col-md-12">
                                                         
   <div class="col-md-4">
                     <div class="form-group">
                <label for="name">Өртөө</label>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="form-control hidden" id="hoorond_fault" name="hoorond_fault" type="text"/>
                         <input type="text" class="form-control input" id="hoorond_statmodal" name="hoorond_statmodal">
                </div>
                  </div>
                        <div class="col-md-4">
                     <div class="form-group">
                <label for="name">Хэдэн цагт</label>
               <input class="form-control time" id="hoorond_timemodal" name="hoorond_timemodal" type="text" placeholder="__:__" />
                </div>
                  </div>
                  <div class="col-md-4">
                           <div class="form-group">
                      <label for="name">Зогссон минут</label>
                    <input class="form-control time" placeholder="__:__"  id="hoorond_minmodal" name="hoorond_minmodal" />
                      </div>
                        </div>
                         <div class="col-md-9">
                           <div class="form-group">
                      <label for="name">Тайлбар</label>
                       <textarea class="form-control" rows="3" id="hoorond_reasonmodal" name="hoorond_reasonmodal" maxlength="255"></textarea>
            
                      </div>
                        </div>

               
                        
                                        </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
         <div class="modal fade" id="modal205" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="205modal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">20,5 км цаг бага</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                           <div class="col-md-12">
                                                          
       <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control hidden" id="205_fault" name="205_fault" type="text"/>
                                <input type="text" class="form-control" id="205_frommodal" name="205_frommodal">
                </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
                <label for="name">Хаана</label>
                                        <input type="text" class="form-control" id="205_tomodal" name="205_tomodal">
                </div>
                        </div>
                       
                        <div class="col-md-3">
               
                                    <div class="form-group">
               <label for="name">Үргэлжилсэн минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" id="205_zogssonmodal" name="205_zogssonmodal">
             
         
                </div>
                        </div>
                                      <div class="col-md-3">
                           <div class="form-group">
                <label for="name">Хурд</label>
                <input type="number" class="form-control inputtext kilo " id="205_speedmodal" name="205_speedmodal" >
          
                </div>
                        </div>
                               <div class="col-md-3">

                                   <div class="form-group">
                                       <label for="name">Тайлбар</label>
                                       <input class="form-control inputtext" required="true" id="205_reasonmodal" name="205_reasonmodal">


                                   </div>
                               </div>
                                        </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
   <div class="modal fade" id="modalurtuu30" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="urtuu30modal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Өртөөнд 30 мин илүү зогссон</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                                                                     
                                        <div class="col-md-12">
                                                          
                                                      <div class="col-md-4">
                     <div class="form-group">
                   <label for="name">Өртөө</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                        
              <select class="select2 form-control" id="urtuu30_statmodal" name="urtuu30_statmodal">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                  
                  </div>
                 
          
                       
                        <div class="col-md-4">
               
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" id="urtuu30_zogssonmodal" name="urtuu30_zogssonmodal">
              <input  class="form-control inputtext hidden" id="urtuu30_fault" name="urtuu30_fault">
         
                </div>
                        </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="name">Тайлбар</label>

                                                    <textarea class="form-control" rows="3" id="urtuu30_reasonmodal" name="urtuu30_reasonmodal" maxlength="255"></textarea>
                                                </div>
                                            </div>
                        
                                        </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
     <div class="modal fade" id="modaltechno" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="technomodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Технологит хугацаанаас илүү</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                                                                     
                                      <div class="col-md-12">
                                                          
                                                      <div class="col-md-3">
                     <div class="form-group">
                   <label for="name">Өртөө</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <input type="text" class="form-control hidden" id="techno_fault" name="techno_fault"> 
              <select class="select2 form-control" id="techno_statmodal" name="techno_statmodal">
             <option value= "84">Улаанбаатар</option> 
              <option value= "484">Улаанбаатар II</option>
               <option value= "76">Толгойт</option>                          
             </select>
                </div>
                  
                  </div>
                 
                            <div class="col-md-2">
                                                  <div class="form-group">
               <label for="name">Ирсэн цаг</label>
                <input type="text" class="form-control inputtext time" id="techno_timemodal" name="techno_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-2">
                                                  <div class="form-group">
               <label for="name">Явсан цаг</label>
                <input type="text" class="form-control inputtext time" id="techno_timefinmodal" name="techno_timefinmodal" placeholder="__:__">
             
         
                </div>
                        </div>
                        <div class="col-md-3">
               
                                    <div class="form-group">
               <label for="name">Илүү минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" id="techno_zogssonmodal" name="techno_zogssonmodal">
             
         
                </div>
                        </div>
               
                        
                                        </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
    <div class="modal fade" id="modalconst" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="constmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Тогтоосон хугацаанд хүрээгүй</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                                                                     
                                     <div class="col-md-12">
                                                          
                   <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="number" class="form-control hidden" id="const_fault" name="const_fault">
                  <input type="text" class="form-control" id="const_frommodal" name="const_frommodal">

                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
                <label for="name">Хаана</label>
                  <input type="text" class="form-control" id="const_tomodal" name="const_tomodal">
                </div>
                        </div>
                               <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Дутуу хурд</label>
                <input type="number" class="form-control inputtext kilo " id="const_speedmodal" name="const_speedmodal" >
          
                </div>
                        </div>
                                        </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
  <div class="modal fade" id="modaltuslamj" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="tuslamjmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Тусламж</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                                                                     
                                                <div class="col-md-12">
                                                         
               <div class="col-md-3">
                     <div class="form-group">
                  <label for="name">Авсан/Өгсөн
                  </label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <input class="form-control hidden" id="tuslamj_fault" name="tuslamj_fault" type="text" />
              <select class="select2 form-control" id="tuslamj_typemodal" name="tuslamj_typemodal">
                  <option value= "6">Өртөөнд тусламж очсон</option>
                  <option value= "4">Өртөөнд тусламж авсан</option>
                  <option value= "3">Хоорондын зам тусламж авсан</option>
                  <option value= "5">Хоорондын зам тусламж очсон</option>

                     
             </select>
                </div>
                  </div>
                   <div class="col-md-3">
                     <div class="form-group">
                  <label for="name">Хаанаас</label>

                         <input class="form-control" id="tuslamj_frommodal" name="tuslamj_frommodal" type="text"/>
                </div>
                  </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="name">Хаана</label>

                                                            <input class="form-control" id="tuslamj_tomodal" name="tuslamj_totmodal" type="text"/>
                                                        </div>
                                                    </div>
                        <div class="col-md-3">
                     <div class="form-group">
                <label for="name">Хэдэн цагт</label>
               <input class="form-control time" placeholder="__:__"  id="tuslamj_timemodal" name="tuslamj_timemodal" type="text" placeholder="__:__" />
                </div>
                  </div>
                        <div class="col-md-3">
                     <div class="form-group">
                <label for="name">Хэдэн мин</label>
               <input class="form-control time" placeholder="__:__"  id="tuslamj_minmodal" name="tuslamj_minmodal" type="text" placeholder="__:__" />
                </div>
                  </div>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label for="name">Тайлбар</label>

                                                            <textarea class="form-control" rows="3" id="tuslamj_reasonmodal" name="tuslamj_reasonmodal" maxlength="255"></textarea>
                                                        </div>
                                                    </div>
                        
                                        </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
  <div class="modal fade" id="modaluharsan" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="uharsanmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Ухарсан</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                  <div class="col-md-12">
                                                         
   <div class="col-md-3">
                     <div class="form-group">
                <label for="name">Км-т</label>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="form-control hidden" id="uharsan_fault" name="uharsan_fault" type="text" />
                         <input type="text" class="form-control" id="uharsan_statmodal" name="uharsan_statmodal">
                </div>
                  </div>
                        <div class="col-md-3">
                     <div class="form-group">
                <label for="name">Хэдэн цагт</label>
               <input class="form-control time" id="uharsan_timemodal" name="uharsan_timemodal" type="text" placeholder="__:__" />
                </div>
                  </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Хэдэн мин</label>
                                              <input class="form-control time" placeholder="__:__" required="true" id="uharsan_minmodal" name="uharsan_minmodal" type="text" placeholder="__:__" />
                                          </div>
                                      </div>
                          <div class="col-md-3">
                     <div class="form-group">
                <label for="name">Ухарсан хурд</label>
               <input class="form-control speed" id="uharsan_speedmodal" name="uharsan_speedmodal" type="text" />
                </div>
                  </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Туулсан зам (м)</label>
                                              <input class="form-control" id="uharsan_kmmodal" name="uharsan_kmmodal" type="text" />
                                          </div>
                                      </div>
                        
                                        </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
 <div class="modal fade" id="modalgraphiluu" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="graphiluumodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Графикаас илүү зогссон</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                   <div class="col-md-12">
                                                          
                                                      <div class="col-md-3">
                     <div class="form-group">
                   <label for="name">Өртөө</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input class="form-control " id="graphiluu_fault" name="graphiluu_fault" type="text" />    
                        
              <select class="select2 form-control" id="graphiluu_statmodal" name="graphiluu_statmodal">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                  
                  </div>
                 
                            <div class="col-md-3">
                                                  <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="graphiluu_timemodal" name="graphiluu_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                       
                        <div class="col-md-3">
               
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" id="graphiluu_zogssonmodal" name="graphiluu_zogssonmodal">
             
         
                </div>
                        </div>
                                       <div class="col-md-3">

                                           <div class="form-group">
                                               <label for="name">Тайлбар</label>
                                               <input class="form-control inputtext" required="true" id="graphiluu_reasonmodal" name="graphiluu_reasonmodal">


                                           </div>
                                       </div>
                        
                                        </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>

 <div class="modal fade" id="modalgraphbus" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="graphbusmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Графикийн бус зогсолт</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                                     <div class="col-md-12">
                                                          
                                                      <div class="col-md-3">
                     <div class="form-group">
                   <label for="name">Өртөө</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="form-control " id="graphbus_fault" name="graphbus_fault" type="text" />      
              <select class="select2 form-control" id="graphbus_statmodal" name="graphbus_statmodal">
              @foreach(\Cache::get('Station') as $stations) 

                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                  
                  </div>
                 
                            <div class="col-md-3">
                                                  <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="graphbus_timemodal" name="graphbus_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                       
                        <div class="col-md-3">
               
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" id="graphbus_zogssonmodal" name="graphbus_zogssonmodal">
             
         
                </div>
                        </div>
                                                         <div class="col-md-3">

                                                             <div class="form-group">
                                                                 <label for="name">Тайлбар</label>
                                                                 <input class="form-control inputtext" required="true" id="graphbus_reasonmodal" name="graphbus_reasonmodal">


                                                             </div>
                                                         </div>
                                        </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>


  <div class="modal fade" id="modalepkgemtel" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="epkgemtelmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">ЭПК гэмтэлтэй:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                      <div class="col-md-12" >
                    
                   
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilepkgemtel_fault" name="ribbonzurchilepkgemtel_fault" type="text"/>
                <input type="text" class="form-control inputtext" id="zurchilepkgemtel_statmodal" name="zurchilepkgemtel_statmodal" >
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн цагт</label>
                <input class="form-control inputtext time" id="zurchilepkgemtel_timemodal" name="zurchilepkgemtel_timemodal" placeholder="__:__" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Туш №</label>
                <input type="number" class="form-control inputtext" id="zurchilepkgemtel_tushnomodal" name="zurchilepkgemtel_tushnomodal" >
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Тушаал өгсөн</label>
                 <input type="text" class="form-control inputtext" id="zurchilepkgemtel_tushugsunmodal" name="zurchilepkgemtel_tushugsunmodal" placeholder="">
                </div>
                        </div>
                   
                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
    <div class="modal fade" id="modalepkhaasan" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="epkhaasanmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">ЭПК хаасан:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                    <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Шалтгааны төрөл</label>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilepkhaasan_fault" name="ribbonzurchilepkhaasan_fault" type="text"/>
                  
                <select class="select2 form-control" id="ribbonzurchilepkhaasan_typemodal" name="ribbonzurchilepkhaasan_typemodal">
                     @foreach($reasontype as $reasontypes) 
                  <option value= "{{$reasontypes->broketype_id}}">{{$reasontypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilepkhaasan_timemodal" name="zurchilepkhaasan_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                  <input type="text" class="form-control inputtext" id="zurchilepkhaasan_statmodal" name="zurchilepkhaasan_statmodal">

                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" id="zurchilepkhaasan_kilomodal" name="zurchilepkhaasan_kilomodal" >
          
                </div>
                        </div>
                         <div class="col-md-3">
                           <div class="form-group">
                <label for="name">Тех акттай эсэх</label>
                 <select class="select2 form-control" id="zurchilepkhaasan_aktmodal" name="zurchilepkhaasan_aktmodal">
             <option value="1"> Aкттай</option>
             <option value="2"> Aктгүй</option>
             </select>
          
                </div>
                        </div>
                       
                       </div>              
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
 <div class="modal fade" id="modalepkkon" role="dialog">

     <div class="modal-dialog ">
         <!-- Modal content-->
         <div class="modal-content">
             <form id="epkkonmodal">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="modal-title">ЭПК Кон: </h4>
                 </div>
                 <div class="modal-body">

                     <div class="row">
                         <div class="col-md-12" >
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label for="name">Төрөл</label>

                                     <select class="form-control" id="zurchilepkkon_typemodal" required="true" name="zurchilepkkon_typemodal">
                                         <option value="64">Гол хоолойн даралт унагаасан</option>
                                         <option value="65">Төхөөрөмжийг салгасан</option>
                                     </select>

                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label for="name">Хаана км</label>
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                     <input class="form-control hidden" id="ribbonzurchilepkkon_fault" name="ribbonzurchilepkkon_fault" type="text"/>

                                     <input type="text" class="form-control inputtext" id="zurchilepkkon_statmodal" name="zurchilepkkon_statmodal">
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label for="name">Хэдэн цагт</label>
                                     <input type="text" class="form-control inputtext time" id="zurchilepkkon_timemodal" name="zurchilepkkon_timemodal">


                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label for="name">Зогссон минут</label>
                                     <input placeholder="__:__"  class="form-control inputtext time" id="zurchilepkkon_zogssonmodal" required="true" name="zurchilepkkon_zogssonmodal">

                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="name">Тех акттай эсэх</label>
                                     <select class="select2 form-control" id="zurchilepkkon_aktmodal" name="zurchilepkkon_aktmodal">
                                         <option value="1"> Aкттай</option>
                                         <option value="2"> Aктгүй</option>
                                     </select>

                                 </div>
                             </div>

                         </div>

                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-default" >Хадгалах</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
                 </div>
             </form>
         </div>

     </div>
 </div>
    <div class="modal fade" id="modalepkajil" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="epkajilmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">ЭПК ажиллуулсан: </h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                  <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаана км</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilepkajil_fault" name="ribbonzurchilepkajil_fault" type="text"/>

                 <input type="text" class="form-control inputtext" id="zurchilepkajil_statmodal" name="zurchilepkajil_statmodal">
                            </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilepkajil_timemodal" name="zurchilepkajil_timemodal">
             
         
                </div>
                        </div>
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Зогссон минут</label>
                 <input placeholder="__:__"  class="form-control inputtext time" id="zurchilepkajil_zogssonmodal" name="zurchilepkajil_zogssonmodal">
                </div>
                        </div>
                     <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Зогссон эсэх</label>
                 <select class="select2 form-control" id="zurchilepkajil_isstopmodal" name="zurchilepkajil_isstopmodal">
               <option value="1">Тийм</option>
             <option value="2">Үгүй</option>
             </select>
          
                </div>
                        </div>
                         <div class="col-md-3">
                           <div class="form-group">
                <label for="name">Тех акттай эсэх</label>
                 <select class="select2 form-control" id="zurchilepkajil_aktmodal" name="zurchilepkajil_aktmodal">
             <option value="1"> Aкттай</option>
             <option value="2"> Aктгүй</option>
             </select>
          
                </div>
                        </div>
                       
                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
     <div class="modal fade" id="modalepkshilj" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="epkshiljmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">ЭПК шилжүүлээгүй </h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                         <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilepkshilj_fault" name="ribbonzurchilepkshilj_fault" type="text"/>
                <select class="select2 form-control" id="zurchilepkshilj_statmodal" name="zurchilepkshilj_statmodal">
              @foreach(\Cache::get('Station') as $stations) 
                <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                                             <div class="col-md-4">
                                                 <div class="form-group">
                                                     <label for="name">Төрөл</label>
                                                     <select class="select2 form-control" id="zurchilepkshilj_typemodal" name="zurchilepkshilj_typemodal">
                                                         <option value="61">Дутуу шилжүүлсэн</option>
                                                         <option value="62">Өнгөрч шилжүүлсэн</option>
                                                         <option value="63">Шилжүүлээгүй</option>
                                                     </select>
                                                 </div>
                                             </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilepkshilj_timemodal" name="zurchilepkshilj_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн минут</label>
                <input class="form-control inputtext time" id="zurchilepkshilj_minutemodal" name="zurchilepkshilj_minutemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                             <div class="col-md-6">
                                    <div class="form-group">
               <label for="name">Шалтгаан</label>
                <input type="text" class="form-control inputtext" id="zurchilepkshilj_reasonmodal" name="zurchilepkshilj_reasonmodal">
             
         
                </div>
                        </div>
                      
                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
     <div class="modal fade" id="modalduud" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="duudmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Дуут дохио өгөөгүй: </h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                            <div class="col-md-12" >
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Төрөл</label>
                                        <select class="select2 form-control" id="zurchilduud_typemodal" name="zurchilduud_typemodal">
                                            <option value="10">Хөдлөх үед</option>
                                            <option value="11">Тоормос шалгах үед</option>
                                            <option value="12">Тахир, Ш тэмдгийн хажуугаар өнгөрөх үед</option>
                                            <option value="13">Гармаар өнгөрөх үед</option>
                                            <option value="14">Бусад үед</option>

                                        </select>
                                    </div>
                                </div>
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilduud_fault" name="ribbonzurchilduud_fault" type="text"/>
            
                <select class="select2 form-control" id="zurchilduud_statmodal" name="zurchilduud_statmodal">
              @foreach(\Cache::get('Station') as $stations) 
              <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilduud_timemodal" name="zurchilduud_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                    
                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
     <div class="modal fade" id="modaloroh" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="orohmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Орох дохионы зогсолт </h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                             <div class="col-md-12" >
                    
                   
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchiloroh_fault" name="ribbonzurchiloroh_fault" type="text"/>
                <select class="select2 form-control" id="zurchiloroh_statmodal" name="zurchiloroh_statmodal">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                                <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchiloroh_timemodal" name="zurchiloroh_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн мин</label>
                <input type="text" class="form-control time" id="zurchiloroh_minmodal" name="zurchiloroh_minmodal" placeholder="__:__" >
          
                </div>
                        </div>
                    <div class="col-md-6">
                            <div class="form-group">
                <label for="name">Шалтгаан</label>
                 <input type="text" class="form-control inputtext" id="zurchiloroh_reasonmodal" name="zurchiloroh_reasonmodal">
                </div>
                        </div>
                   
                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
       <div class="modal fade" id="modaltormozburuu" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="tormozburuumodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Тоормос буруу удирдсан: </h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                            <div class="col-md-12" >
                    
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="text" class="form-control inputtext" id="zurchiltormozburuu_statmodal" name="zurchiltormozburuu_statmodal">
                </div>
                        </div>
                            <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control inputtext time" id="zurchiltormozburuu_timemodal" name="zurchiltormozburuu_timemodal" placeholder="__:__">
               <input class="form-control hidden" id="ribbonzurchiltormozburuu_fault" name="ribbonzurchiltormozburuu_fault" type="text"/>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн км</label>
                <input type="text" class="form-control inputtext kilo" id="zurchiltormozburuu_kilomodal" name="zurchiltormozburuu_kilomodal">
             
         
                </div>
                        </div>
                                <div class="col-md-3">
                           <div class="form-group">
                <label for="name">Тех акттай эсэх</label>
                  <select class="select2 form-control" id="zurchiltormozburuu_aktmodal" name="zurchiltormozburuu_aktmodal">
             <option value="1"> Aкттай</option>
             <option value="2"> Aктгүй</option>
             </select>
          
                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                <label for="name">Шалтгаан төрөл</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
                <select class="select2 form-control" id="zurchiltormozburuu_typemodal" name="zurchiltormozburuu_typemodal">
                @foreach($emertype as $reasontypes) 
                  <option value= "{{$reasontypes->broketype_id}}">{{$reasontypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
       <div class="modal fade" id="modalyaraltai" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="yaraltaimodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Яаралтай тоормос:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
              <div class="col-md-12" >
                          <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Шалтгаан төрөл</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilyaraltai_fault" name="ribbonzurchilyaraltai_fault" type="text"/>
                <select class="select2 form-control" id="zurchilyaraltai_typemodal" name="zurchilyaraltai_typemodal">
                @foreach($reasontype as $reasontypes) 
                  <option value= "{{$reasontypes->broketype_id}}">{{$reasontypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
     
                        </div>
                        <div class="col-md-4">
                                       <div class="form-group">
                <label for="name">Хаана</label>
                 <input type="text" class="form-control inputtext" id="zurchilyaraltai_statmodal" name="zurchilyaraltai_statmodal">
                </div>
                        </div>
                   
                       <div class="col-md-4">
                                                  <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilyaraltai_timemodal" name="zurchilyaraltai_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                       
                        <div class="col-md-4">
               
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input placeholder="__:__"  class="form-control inputtext time" id="zurchilyaraltai_zogssonmodal" name="zurchilyaraltai_zogssonmodal">
             
         
                </div>
                        </div>
                        <br>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="name">Шалтгаан</label>
                          <input type="text" class="form-control inputtext" id="zurchilyaraltai_reasonmodal" name="zurchilyaraltai_reasonmodal">


                      </div>
                  </div>
                         <div class="col-md-4">
                             <label for="name">Дайрсан эсэх</label>
                               <select class="select2 form-control" id="zurchilyaraltai_attackmodal" name="zurchilyaraltai_attackmodal">

                                   <option value= "5">Дайрагдсан</option>
                                   <option value= "6">Дайрагдахаас сэргийлсэн</option>
                                   <option value= "7">Шүргэсэн</option>
                                   <option value= "12">Өнгөрсөн</option>
                                   <option value= "13">Өнгөрөөгүй</option>
                                                          
             </select>
                                
                        </div>

                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
         <div class="modal fade" id="modaltormoztursh" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="tormozturshmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Тоормос туршаагүй:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                    <div class="col-md-12" >
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Төрөл</label>
                                <select class="select2 form-control" id="zurchiltormoztursh_typemodal" name="zurchiltormoztursh_typemodal">

                                    <option value= "50">Хугацаа бариагvй</option>
                                    <option value= "51">Технологийн горим зерчсен</option>
                                    <option value= "52">Жолоодлогын бариул татлагатай vед тоормос хийсэн</option>
                                    <option value= "53">Хугацаа хэтрүүлсэн</option>
                                    <option value= "54">Кассетыг авсан</option>
                                    <option value= "55">ЗААБТ-д егегдел оруулсан</option>
                                    <option value= "56">Тоормос туршаагvй</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchiltormoztursh_fault" name="ribbonzurchiltormoztursh_fault" type="text"/>
                <select class="select2 form-control" id="zurchiltormoztursh_statmodal" name="zurchiltormoztursh_statmodal">
              @foreach(\Cache::get('Station') as $stations)
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchiltormoztursh_timemodal" name="zurchiltormoztursh_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                     <div class="col-md-3">
                    <div class="form-check">
                 
                            <label class="form-check-label" for="defaultCheck1">
                              Туршсан эсэх
                            </label>
                               <select class="select2 form-control" id="zurchiltormoztursh_turshmodal" name="zurchiltormoztursh_turshmodal">
              
                               <option value= "3">Тийм</option>
                               <option value= "4">Үгүй</option>
                                                                     
             </select>
                          </div>
                  </div>
                   
                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
         <div class="modal fade" id="modalgolhooloi" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="golhooloimodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Гол хоолой тохируулаагүй:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                        <div class="col-md-12" >
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Төрөл</label>
                                    <select class="select2 form-control" id="zurchilgolhooloi_typemodal" name="zurchilgolhooloi_typemodal">

                                        <option value= "17">Даралт нэмэгдсэн</option>
                                        <option value= "18">Даралтыг бууруулсан</option>
                                    </select>
                                </div>
                            </div>
                        <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilgolhooloi_fault" name="ribbonzurchilgolhooloi_fault" type="text"/>
                <select class="select2 form-control" id="zurchilgolhooloi_statmodal" name="zurchilgolhooloi_statmodal">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilgolhooloi_timemodal" name="zurchilgolhooloi_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                  
                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
         <div class="modal fade" id="modaltuuzuragdsan" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="tuuzuragdsanmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Тууз урагдуулсан</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                            <div class="col-md-12" >
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchiltuuzuragdsan_fault" name="ribbonzurchiltuuzuragdsan_fault" type="text"/>
               <input class="form-control" id="zurchiltuuzuragdsan_statmodal" name="zurchiltuuzuragdsan_statmodal" type="text"/>
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" id="zurchiltuuzuragdsan_kilomodal" name="zurchiltuuzuragdsan_kilomodal" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchiltuuzuragdsan_timemodal" name="zurchiltuuzuragdsan_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Бичлэгийн төрөл</label>
                <select class="select2 form-control" id="zurchiltuuzuragdsan_typemodal" name="zurchiltuuzuragdsan_typemodal">
             @foreach($tapetype as $tapetypes) 
                  <option value= "{{$tapetypes->broketype_id}}">{{$tapetypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                  
                       </div>
              
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
         <div class="modal fade" id="modaltuuzzassan" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="tuuzzassanmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Тууз зассан:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                      <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Бичлэгийн төрөл</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchiltuuzzassan_fault" name="ribbonzurchiltuuzzassan_fault" type="text"/>
                <select class="select2 form-control" id="zurchiltuuzzassan_typemodal" name="zurchiltuuzzassan_typemodal">
                 @foreach($tapetype as $tapetypes) 
                  <option value= "{{$tapetypes->broketype_id}}">{{$tapetypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchiltuuzzassan_timemodal" name="zurchiltuuzzassan_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                   
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
           <div class="modal fade" id="modalbichlegbudeg" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="bichlegbudegmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title"> Бичлэг бүдэг:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                         <div class="col-md-12" >
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilbichlegbudeg_fault" name="ribbonzurchilbichlegbudeg_fault" type="text"/>

                  <input type="text" class="form-control inputtext" id="zurchilbichlegbudeg_statmodal" name="zurchilbichlegbudeg_statmodal">
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" id="zurchilbichlegbudeg_kilomodal" name="zurchilbichlegbudeg_kilomodal" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilbichlegbudeg_timemodal" name="zurchilbichlegbudeg_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Бичлэгийн төрөл</label>
                <select class="select2 form-control" id="zurchilbichlegbudeg_typemodal" name="zurchilbichlegbudeg_typemodal">
               @foreach($tapetype as $tapetypes) 
                  <option value= "{{$tapetypes->broketype_id}}">{{$tapetypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>

                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
           <div class="modal fade" id="modalbichlegdutuu" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="bichlegdutuumodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Бичлэг дутуу:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                  <div class="col-md-12" >
                    
                   
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilbichlegdutuu_fault" name="ribbonzurchilbichlegdutuu_fault" type="text"/>
                 <input type="text" class="form-control inputtext" id="zurchilbichlegdutuu_statmodal" name="zurchilbichlegdutuu_statmodal">
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" id="zurchilbichlegdutuu_kilomodal" name="zurchilbichlegdutuu_kilomodal" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilbichlegdutuu_timemodal" name="zurchilbichlegdutuu_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                              <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Бичлэгийн төрөл</label>
                <select class="select2 form-control" id="zurchilbichlegdutuu_typemodal" name="zurchilbichlegdutuu_typemodal">
             @foreach($tapetype as $tapetypes) 
                  <option value= "{{$tapetypes->broketype_id}}">{{$tapetypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                     
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
             <div class="modal fade" id="modaleffect" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="effectmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Эффект зөрчсөн:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                   <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control hidden" id="ribbonzurchileffect_fault" name="ribbonzurchileffect_fault" type="text"/>
                <select class="select2 form-control" id="zurchileffect_statmodal" name="zurchileffect_statmodal">
                  

              @foreach(\Cache::get('Station') as $stations) 
               <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Зогссон минут</label>
                <input class="form-control time" placeholder="__:__" id="zurchileffect_minutemodal" name="zurchileffect_minutemodal" >
             
         
                </div>
                        </div>
                 
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchileffect_timemodal" name="zurchileffect_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                       
                       </div>
                                      <div class="col-md-12" >
                        <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Заасан км</label>
                   <input type="text" class="form-control inputtext kilo" id="zurchileffect_constkilomodal" name="zurchileffect_constkilomodal" >
                </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Тогтоосон хурд</label>
                <input type="text" class="form-control inputtext speed" id="zurchileffect_constspeedmodal" name="zurchileffect_constspeedmodal">
             
         
                </div>
                        </div>
                 
                          <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Зөрчсөн км</label>
                <input type="text" class="form-control inputtext kilo" id="zurchileffect_faultkilomodal" name="zurchileffect_faultkilomodal" >
             
         
                </div>
                        </div>
                            <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Зөрчсөн хурд</label>
                <input type="text" class="form-control inputtext speed" id="zurchileffect_faultspeedmodal" name="zurchileffect_faultspeedmodal" >
             
         
                </div>
                        </div>
                     
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
             <div class="modal fade" id="modalhurdhetruulsen" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="hurdhetruulsenmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Хурд хэтрүүлсэн:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                                                   <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control hidden" id="ribbonzurchilhurd_fault" name="ribbonzurchilhurd_fault" type="text"/>
                      <input type="text" class="form-control inputtext" id="zurchilhurd_frommodal" name="zurchilhurd_frommodal">
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
                <label for="name">Хаана</label>
                 <input type="text" class="form-control inputtext" id="zurchilhurd_tomodal" name="zurchilhurd_tomodal">
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
                <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilhurd_timemodal" name="zurchilhurd_timemodal" placeholder="__:__">
          
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэтэрсэн хурд</label>
                <input type="number" class="form-control inputtext kilo " id="zurchilhurd_speedmodal" name="zurchilhurd_speedmodal" >
          
                </div>
                        </div>
                    
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
   <div class="modal fade" id="modalklub" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="klubmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Клуб у гэмтэлтэй:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                               <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilklub_fault" name="ribbonzurchilklub_fault" type="text"/>
                  <input type="text" class="form-control inputtext" id="zurchilklub_frommodal" name="zurchilklub_frommodal">
                </div>
                        </div>
                                 <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаана</label>
                  <input type="text" class="form-control inputtext" id="zurchilklub_tomodal" name="zurchilklub_tomodal">
                </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilklub_timemodal" name="zurchilklub_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                    
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
     <div class="modal fade" id="modal20" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="20modal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title"> 20оос дээш минут:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                        <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchil20_fault" name="ribbonzurchil20_fault" type="text"/>
              
              <select class="select2 form-control" id="zurchil20_statmodal" name="zurchil20_statmodal">
              @foreach(\Cache::get('Station') as $stations) 
                 <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
               @endforeach
             </select>
                </div>
                        </div>
                  
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Зогссон минут</label>
                 <input placeholder="__:__"  class="form-control inputtext time" id="zurchil20_zogssonmodal" name="zurchil20_zogssonmodal">
                </div>
                        </div>
                  <div class="col-md-9">
                            <div class="form-group">
                <label for="name">Тайлбар</label>
           
                   <textarea class="form-control" rows="3" id="zurchil20_reasonmodal" name="zurchil20_reasonmodal" maxlength="255"></textarea>
                </div>
                        </div>
                    
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
     <div class="modal fade" id="modalhii" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="hiimodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Хий эргэсэн:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                              <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаана</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilhii_fault" name="ribbonzurchilhii_fault" type="text"/>
                 <input type="text" class="form-control" id="zurchilhii_statmodal" name="zurchilhii_statmodal">
                </div>
                        </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="name">Хэдэн удаа</label>
                                          <input type="number" required="true" class="form-control" id="zurchilhii_nummodal" name="zurchilhii_nummodal">
                                      </div>
                                  </div>
                      <div class="col-md-9">
                            <div class="form-group">
                <label for="name">Тайлбар</label>
                                 <textarea class="form-control" rows="3" id="zurchilhii_reasonmodal" name="zurchilhii_reasonmodal" maxlength="255"></textarea>
                </div>
                        </div>
                   
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
       <div class="modal fade" id="modalhurdhemjigch" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="hurdhemjigchmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Хурд хэмжигч гэмтэлтэй </h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                            <div class="col-md-12">
                                            <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Гэмтлийн төрөл</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilhurdhemjigch_fault" name="ribbonzurchilhurdhemjigch_fault" type="text"/>
                <select class="select2 form-control" id="zurchilhurdhemjigch_typemodal" name="zurchilhurdhemjigch_typemodal">
               @foreach($broketype as $broketypes) 
                  <option value= "{{$broketypes->broketype_id}}">{{$broketypes->broketype_name}}</option>
                 @endforeach
             </select>
                </div>
                        </div>
                                            <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                <input type="text" class="form-control inputtext" id="zurchilhurdhemjigch_statmodal" name="zurchilhurdhemjigch_statmodal" >
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" id="zurchilhurdhemjigch_kilomodal" name="zurchilhurdhemjigch_kilomodal" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilhurdhemjigch_timemodal" name="zurchilhurdhemjigch_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                                <div class="col-md-3">
                           <div class="form-group">
                <label for="name">Тех акттай эсэх</label>
                 <select class="select2 form-control" id="zurchilhurdhemjigch_aktmodal" name="zurchilhurdhemjigch_aktmodal">
             <option value="1"> Aкттай</option>
             <option value="2"> Aктгүй</option>
             </select>
          
                </div>
                        </div>
                       
                        </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
       <div class="modal fade" id="modaltsag" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="tsagmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Цаг зогссон:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                     <div class="col-md-12" >
                    
                   
                       <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchiltsag_fault" name="ribbonzurchiltsag_fault" type="text"/>
                <input type="text" class="form-control inputtext" id="zurchiltsag_statmodal" name="zurchiltsag_statmodal">
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                <label for="name">Хэдэн км</label>
                <input type="number" class="form-control inputtext kilo" id="zurchiltsag_kilomodal" name="zurchiltsag_kilomodal" >
          
                </div>
                        </div>
                          <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchiltsag_timemodal" name="zurchiltsag_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                         
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
       <div class="modal fade" id="modalkran" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="kranmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Кран шалгаагүй:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">

                                       <div class="col-md-12"  >
                                           <div class="col-md-3">
                                               <div class="form-group">
                                                   <label for="name">Төрөл</label>
                                                   <select class="select2 form-control" id="zurchilkran_typemodal" name="zurchilkran_typemodal">
                                                       <option value="15">Зөрчсөн буюу шалгаагүй</option>
                                                       <option value="16">Нээгээгүй буюу дутуу нээсэн</option>


                                                   </select>
                                               </div>
                                           </div>
                        <div class="col-md-3">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilkran_fault" name="ribbonzurchilkran_fault" type="text"/>
                <select class="select2 form-control" id="zurchilkran_statmodal" name="zurchilkran_statmodal">
              @foreach(\Cache::get('Station') as $stations) 
                                                                       <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                                                         @endforeach
             </select>
                </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilkran_timemodal" name="zurchilkran_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
                 
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
       <div class="modal fade" id="modalkilo" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="kilomodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Километр буруу:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                 <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаанаас</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilkilo_fault" name="ribbonzurchilkilo_fault" type="text"/>
                 <input type="text" class="form-control inputtext" id="zurchilkilo_frommodal" name="zurchilkilo_frommodal">
                </div>
                        </div>
                                 <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Хаана</label>
                   <input type="text" class="form-control inputtext" id="zurchilkilo_tomodal" name="zurchilkilo_tomodal">
                </div>
                        </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label for="name">Хэдэн км</label>
                                             <input type="text" class="form-control inputtext" required="true" id="zurchilkilo_kmmodal" name="zurchilkilo_kmmodal">
                                         </div>
                                     </div>
                        <div class="col-md-4">
                                    <div class="form-group">
               <label for="name">Хэдэн цагт</label>
                <input type="text" class="form-control inputtext time" id="zurchilkilo_timemodal" name="zurchilkilo_timemodal" placeholder="__:__">
             
         
                </div>
                        </div>
              
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
        <div class="modal fade" id="modalattention" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="attentionmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Анхаарамжаар бууж суусан:</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
                                   <div class="col-md-12" >
                        <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Өртөө</label>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilanhaaramj_fault" name="ribbonzurchilanhaaramj_fault" type="text"/>
                <input type="text" class="form-control" id="zurchilanhaaramj_statmodal" name="zurchilanhaaramj_statmodal">

                </div>
                        </div>
                          <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Зогссон минут</label>
                 <input placeholder="__:__"  class="form-control inputtext time" id="zurchilanhaaramj_zogssonmodal" name="zurchilanhaaramj_zogssonmodal">
                </div>
                        </div>
                  <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Тушаал өгсөн хүний нэр</label>
                 <input type="text" class="form-control inputtext" id="zurchilanhaaramj_tushaalnermodal" name="zurchilanhaaramj_tushaalnermodal">
                </div>
                        </div>
                     <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Албан тушаал</label>
                 <input type="text" class="form-control inputtext" id="zurchilanhaaramj_tushaalmodal" name="zurchilanhaaramj_tushaalmodal">
                </div>
                        </div>
                      <div class="col-md-4">
                            <div class="form-group">
                <label for="name">Шалтгаан</label>
                 <input type="text" class="form-control inputtext" id="zurchilanhaaramj_reasonmodal" name="zurchilanhaaramj_reasonmodal">
                </div>
                        </div>
                      
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
        <div class="modal fade" id="modalbuguiwch" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="buguiwchmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Бугуйвч</h4>
        </div>
        <div class="modal-body">
        
            <div class="row">
               
                               <div class="col-md-12" >
                    
                   
                       <div class="col-md-9">
                            <div class="form-group">
               <input class="form-control hidden" id="ribbonzurchilbuguiwch_fault" name="ribbonzurchilbuguiwch_fault" type="text"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <label for="name">Тайлбар</label>
                                   <textarea class="form-control" rows="3" id="zurchilbuguiwch_reasonmodal" name="zurchilbuguiwch_reasonmodal" maxlength="255"></textarea>
                </div>
                        </div>
             
                       </div>
            </div>
              
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>
  
    </div>
  </div>
          <div class="modal fade" id="modalbusad" role="dialog">

    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
     <form id="busadmodal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Бусад зөрчил:</h4>
        </div>
        <div class="modal-body">

            <div class="row">

                  <div class="col-md-12">
                                   <div class="col-md-9">
                            <div class="form-group">
                <label for="name">Тайлбар</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input class="form-control hidden" id="ribbonzurchilbusad_fault" name="ribbonzurchilbusad_fault" type="text"/>
                                    <textarea class="form-control" rows="3" id="ribbonzurchilbusad_reasonmodal" name="ribbonzurchilbusad_reasonmodal" maxlength="255"></textarea>

                </div>
                        </div>

                                        </div>
            </div>

        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Хадгалах</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        </div>
         </form>
      </div>

    </div>
  </div>
 <div class="modal fade" id="modal45" role="dialog">

     <div class="modal-dialog ">
         <!-- Modal content-->
         <div class="modal-content">
             <form id="45modal">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="modal-title"> Ву 45 зөрчсөн</h4>
                 </div>
                 <div class="modal-body">

                     <div class="row">

                         <div class="col-md-12" >
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label for="name">Өртөө</label>
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                     <input class="form-control hidden" id="ribbonzurchil45_fault" name="ribbonzurchil45_fault" type="text"/>

                                     <select class="select2 form-control" id="zurchil45_statmodal" name="zurchil45_statmodal">
                                         @foreach(\Cache::get('Station') as $stations)
                                             <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label for="name">Зогссон минут</label>
                                     <input class="form-control time" placeholder="__:__"  id="zurchil45_minutemodal" name="zurchil45_minutemodal">


                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label for="name">Хэдэн цагт</label>
                                     <input type="text" class="form-control inputtext time" id="zurchil45_timemodal" name="zurchil45_timemodal" placeholder="__:__">


                                 </div>
                             </div>
                             <div class="col-md-9">
                                 <div class="form-group">
                                     <label for="name">Тайлбар</label>
                                     <textarea class="form-control" rows="3" id="zurchil45_reasonmodal" name="zurchil45_reasonmodal" maxlength="255"></textarea>

                                 </div>
                             </div>

                         </div>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-default" >Хадгалах</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
                 </div>
             </form>
         </div>

     </div>
 </div>

 <div class="modal fade" id="modalanhaaramj" role="dialog">

     <div class="modal-dialog ">
         <!-- Modal content-->
         <div class="modal-content">
             <form id="anhaaramjmodal" >
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="modal-title"> Анхаарамж</h4>
                 </div>
                 <div class="modal-body">

                     <div class="row">

                         <div class="col-md-12">

                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="name">Хаанаас</label>
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                     <input  class="form-control inputtext hidden " id="anhaaramjspeed_fault" name="anhaaramj_fault">
                                     <input type="text" class="form-control inputtext" id="anhaaramj_frommodal" name="anhaaramj_frommodal">
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <input class="form-control hidden" id="ribbonanhaaramj_fault" name="ribbonanhaaramj_fault" type="text"/>
                                 <div class="form-group">
                                     <label for="name">Хаана</label>
                                     <input type="text" class="form-control inputtext" id="anhaaramj_tomodal" name="anhaaramj_tomodal">
                                 </div>
                             </div>
                             <div class="col-md-3">
                              <div class="form-group">
                                  <label for="name">Олгосон минут</label>
                                  <input type="text" class="form-control inputtext" id="anhaaramj_timemodal" name="anhaaramj_timemodal">
                              </div>
                          </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="name">Анхаарамж</label>
                                     <select class="select2 form-control" id="anhaaramjspeed" name="anhaaramjspeed">
                                         @foreach($speed as $speeds)
                                             <option value= "{{$speeds->attentionspeed_id}}">{{$speeds->speed}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>

                         </div>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-default" >Хадгалах</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
                 </div>
             </form>
         </div>

     </div>
 </div>
 <div class="modal fade" id="modalhaluun" role="dialog">

     <div class="modal-dialog ">
         <!-- Modal content-->
         <div class="modal-content">
             <form id="haluunmodal" >
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="modal-title"> Халуун Зогсолт</h4>
                 </div>
                 <div class="modal-body">

                     <div class="row">

                         <div class="col-md-12">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="name">Өртөө</label>
                                     <select class="select2 form-control" id="haluun_statmodal" name="haluun_statmodal">
                                         @foreach(\Cache::get('Station') as $stations)
                                             <option value= "{{$stations->statcode}}">{{$stations->statfullname}}</option>
                                         @endforeach
                                     </select>
                                 </div>

                             </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="name">Төрөл</label>
                                     <select class="form-control" id="haluun_typemodal" name="haluun_typemodal">
                                         <option value="1">Халуун зогсолт</option>
                                         <option value="2">Зөөвөр</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="name">Хэдэн цагт</label>
                                     <input class="form-control hidden" id="haluun_fault" name="haluun_fault" type="text" />
                                     <input class="form-control time" id="haluun_timemodal" name="haluun_timemodal" type="text" placeholder="__:__" />
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="name">Зогссон минут</label>
                                     <input class="form-control time" id="haluun_stoptimemodal" name="haluun_stoptimemodal" type="text" placeholder="__:__" />
                                 </div>
                             </div>

                         </div>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-default" >Хадгалах</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
                 </div>
             </form>
         </div>

     </div>
 </div>