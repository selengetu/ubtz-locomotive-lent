<script type="text/javascript">

    function marshattention(itag)
         {
          $.get('getmarshattention/'+itag,function(data){
        $("#marshattention tbody").empty();   
          if(data.length == 0){
           $("#marshattentionok").hide(); 
  
         
       } 
       else{
            $("#marshattentionok").show(); 
           
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fromst + "</td>" +
        "   <td class='m2'>" + qwe.tost+ "</td>" +
        "   <td class='m3'>" + qwe.speedname+ "</td>" +
                  "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalanhaaramj' data-id=" + qwe.attention_id + " tag=" + qwe.attention_id + " onclick='updateanhaaramj(" + qwe.attention_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.attention_id + " onclick='destroyanhaaramj(" + qwe.attention_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +

                  "</tr>";
        $("#marshattention tbody").append(sHtmls);
         });
         
          });
         }
            function marshattentioncount(ribbon)
         {
                $.get('getmarshattentioncount/'+ribbon,function(data){
        $("#marshattentioncount tbody").empty();   
             $.each(data,function(i,qwe){
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.speedname + "</td>" +
        "   <td class='m2'>" + qwe.sum + "</td>" +    
      
        "</tr>";
        $("#marshattentioncount tbody").append(sHtmls);
         });
         
          });
         }
          function marsh205(itag)
         {
                $.get('getmarsh205/'+itag,function(data){
        $("#marsh205 tbody").empty(); 

          if(data.length == 0){
           $("#marsh205ok").hide(); 
      
         
       } 
       else{
            $("#marsh205ok").show(); 
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_to + "</td>" +
        "   <td class='m3'>" + qwe.stoptime+ "</td>" +   
        "   <td class='m3'>" + qwe.over_speed+ "</td>" +
         "   <td class='m3'>" + qwe.reason+ "</td>" +
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modal205' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='update205(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroy205(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
        "</tr>";
        $("#marsh205 tbody").append(sHtmls);
         });
         
          });
         }
            function marshurtuu30(itag)
         {
                $.get('getmarshurtuu30/'+itag,function(data){
        $("#marshurtuu30 tbody").empty();   
          if(data.length == 0){
           $("#marshurtuu30ok").hide(); 
         
       } 
       else{
            $("marshurtuu30ok").show(); 
        
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr id=" + qwe.fault_id +">" +
        "   <td class='m1'>" + qwe.fromstationname + "</td>" +    
        "   <td class='m3'>" + qwe.stoptime+ "</td>" +
                  "   <td class='m3'>" + qwe.reason+ "</td>" +
                  "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalurtuu30' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateurtuu30(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyurtuu30(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
        "</tr>";
        $("#marshurtuu30 tbody").append(sHtmls);
         });
         
          });
         }
              function marshtechno(itag)
         {
                $.get('getmarshtechno/'+itag,function(data){
        $("#marshtechno tbody").empty();   
          if(data.length == 0){
           $("#marshtechnook").hide(); 
         
       } 
       else{
            $("#marshtechnook").show(); 
             
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fromstationname + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" +  
        "   <td class='m3'>" + qwe.tush_name+ "</td>" +       
        "   <td class='m3'>" + qwe.constkilo+ "</td>" +
         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaltechno' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatetechno(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroytechno(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +              
        "</tr>";
        $("#marshtechno tbody").append(sHtmls);
         });
         
          });
         }
          function marshconst(itag)
         {
                $.get('getmarshconst/'+itag,function(data){
        $("#marshconst tbody").empty();   
          if(data.length == 0){
           $("#marshconstok").hide(); 
         
       } 
       else{
            $("#marshconstok").show();
          
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_to + "</td>" +
        "   <td class='m3'>" + qwe.over_speed+ "</td>" +  
         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalconst' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateconst(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyconst(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +                    
        "</tr>";
        $("#marshconst tbody").append(sHtmls);
         });
         
          });
         }
                      function marshgraphiluu(itag)
         {
                $.get('getmarshgraphiluu/'+itag,function(data){
        $("#marshgraphiluu tbody").empty();   
          if(data.length == 0){
           $("#marshgraphiluuok").hide(); 
         
       } 
       else{
            $("#marshgraphiluuok").show(); 
           
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fromstationname + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" +        
        "   <td class='m3'>" + qwe.stoptime+ "</td>" +
                  "   <td class='m3'>" + qwe.reason+ "</td>" +
                  "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalgraphiluu' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updategraphiluu(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroygraphiluu(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
        "</tr>";
        $("#marshgraphiluu tbody").append(sHtmls);
         });
         
          });
         }
                               function marshgraphbus(itag)
         {
                $.get('getmarshgraphbus/'+itag,function(data){
        $("#marshgraphbus tbody").empty();   
          if(data.length == 0){
           $("#marshgraphbusok").hide(); 
         
       } 
       else{
            $("#marshgraphbusok").show(); 
         
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fromstationname + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" +        
        "   <td class='m3'>" + qwe.stoptime+ "</td>" +
        "   <td class='m3'>" + qwe.reason + "</td>" +
          "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalgraphbus' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updategraphbus(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroygraphbus(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +             
        "</tr>";
        $("#marshgraphbus tbody").append(sHtmls);
         });
         
          });
         }
                     function marshhoorond(itag)
         {
                $.get('getmarshhoorond/'+itag,function(data){
        $("#marshhoorond tbody").empty();   
          if(data.length == 0){
           $("#marshhoorondok").hide(); 
         
       } 
       else{
            $("#marshhoorondok").show(); 
          
       }   
             $.each(data,function(i,qwe){
                
        var sHtmls = "<tr id=" + qwe.fault_id +">" +
        "   <td class='m1'>" + qwe.fault_from  + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" +        
        "   <td class='m3'>" + qwe.stoptime+ "</td>" +        
        "   <td class='m3'>" + qwe.reason+ "</td>" +  
           "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalhoorond' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatehoorond(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyhoorond(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +

        "</tr>";
        $("#marshhoorond tbody").append(sHtmls);
         });
         
          });
         }
                 function marshtuslamj(itag)
         {
                 $.get('getmarshtuslamj/'+itag,function(data){
        $("#marshtuslamj tbody").empty();  
        if(data.length == 0){
           $("#marshtuslamjok").hide(); 
         
       } 
       else{
            $("#marshtuslamjok").show(); 
           
       }  
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fault_from + "</td>" +
                  "   <td class='m1'>" + qwe.fault_to + "</td>" +
        "   <td class='m2'>" + qwe.fault_detail_name + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" +     
        "   <td class='m3'>" + qwe.stoptime+ "</td>" +
         "   <td class='m3'>" + qwe.reason+ "</td>" +
                  "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaltuslamj' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatetuslamj(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroytuslamj(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
      
        "</tr>";
        $("#marshtuslamj tbody").append(sHtmls);
         });
         
          });
         }
        
         function marshuharsan(itag)
         {
                $.get('getmarshuharsan/'+itag,function(data){

        $("#marshuharsan tbody").empty(); 
         if(data.length == 0){
           $("#marshuharsanok").hide(); 
         
       } 
       else{
            $("#marshuharsanok").show(); 
        
       }     
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" +  
         "   <td class='m3'>" + qwe.over_speed+ "</td>" +
          "   <td class='m3'>" + qwe.constspeed+ "</td>" +
                  "   <td class='m3'>" + qwe.stoptime+ "</td>" +
                  "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaluharsan' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateuharsan(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyuharsan(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
      
        "</tr>";
        $("#marshuharsan tbody").append(sHtmls);
         });
         
          });
         }
              function marshhaluun(itag)
         {
                $.get('gethaluunzogsolt/'+itag,function(data){

        $("#marshhaluunzogsolt tbody").empty(); 
         if(data.length == 0){
           $("#marshhaluunzogsoltok").hide(); 
         
       } 
       else{
            $("#marshhaluunzogsoltok").show(); 
        
       }     
             $.each(data,function(i,qwe){
                 var $type;
                 if(qwe.hotstand_type == 1){
                     $type= 'Халуун зогсолт'
                 }
                 if(qwe.hotstand_type == 2){
                     $type= 'Зөөвөр'
                 }
                 if(qwe.hotstand_type == 3){
                     $type= 'Нэмэгдэл'
                 }
              var sHtmls = "<tr>" +
                  "   <td class='m3'>" + qwe.statfullname+ "</td>" +
                 "   <td class='m3'>" +$type+ "</td>" +
        "   <td class='m3'>" + qwe.starttime+ "</td>" +
         "   <td class='m3'>" + qwe.endtime+ "</td>" +   
           "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalhaluun' data-id=" + qwe.hotstand_id + " tag=" + qwe.hotstand_id + " onclick='updatehaluun(" + qwe.hotstand_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.hotstand_id + " onclick='destroyhaluun(" + qwe.hotstand_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
      
        "</tr>";
        $("#marshhaluunzogsolt tbody").append(sHtmls);
         });
         
          });
         }
         function marshhurdhetruulsen(itag)
         {
              
             $.get('getmarshhurdhetruulsen/'+itag,function(data){
        $("#marshhurdhetruulsen tbody").empty();  
         if(data.length == 0){
          $("#marshhurdhetruulsenok").hide(); 
           $("#busadok").hide();  
       } 
       else{
            $("#marshhurdhetruulsenok").show();
               $("#busadok").show();  
       }    
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
         "   <td class='m3'>" + qwe.over_speed+ "</td>" +  
        "   <td class='m1'>" + qwe.fault_from + "</td>" +
        "   <td class='m1'>" + qwe.fault_to + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
           "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalhurdhetruulsen' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatehurdhetruulsen(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyhurdhetruulsen(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +    
      
        "</tr>";
        $("#marshhurdhetruulsen tbody").append(sHtmls);
         });
         
          });
         }
         function marsh45(itag)
         {
                  $.get('getmarsh45/'+itag,function(data){
        $("#marsh45 tbody").empty();    
         if(data.length == 0){
           $("#marsh45ok").hide();
           $("#45ok").hide();  
       } 
       else{
            $("#marsh45ok").show(); 
              $("#45ok").show();  
       }  
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fromstationname + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m3'>" + qwe.stoptime+ "</td>" +        
          "   <td class='m3'>" + qwe.reason+ "</td>" +
      "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modal45' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='update45(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroy45(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +       
      
        "</tr>";
        $("#marsh45 tbody").append(sHtmls);
         });
         
          });
         }      
         function marsheffect(itag)
         {
                $.get('getmarsheffect/'+itag,function(data){
        $("#marsheffect tbody").empty();    
         if(data.length == 0){
           $("#marsheffectok").hide(); 
         
       } 
       else{
            $("#marsheffectok").show(); 
       }  
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fault_from + "</td>" +
         "   <td class='m3'>" + qwe.stoptime+ "</td>" + 
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m3'>" + qwe.constkilo+ "</td>" +        
          "   <td class='m3'>" + qwe.constspeed+ "</td>" +    
      
       "   <td class='m3'>" + qwe.faultkilo+ "</td>" +        
          "   <td class='m3'>" + qwe.faultspeed+ "</td>" +   
            "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaleffect' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateeffect(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyeffect(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +   
        "</tr>";
        $("#marsheffect tbody").append(sHtmls);
         });
         
          });
         }
         function marshtormozburuu(itag)
         {
                         $.get('getmarshtormozburuu/'+itag,function(data){
        $("#marshtormozburuu tbody").empty();    
         if(data.length == 0){
           $("#marshtormozburuuok").hide(); 
            $("#tormozok").hide(); 
         
       } 
       else{
            $("#marshtormozburuuok").show(); 
           $("#tormozok").show(); 
       }  
             $.each(data,function(i,qwe){
              var $akt;
                if(qwe.is_techact==1){
                    $akt= 'Акттай'
                }
                else{
                  $akt = 'Актгүй'
                }
                 var $turul;
                if(qwe.is_stop==8){
                    $turul= 'Хэт цэнэг (ачаа)'
                }
                 if(qwe.is_stop==9){
                  $turul = 'Хэт цэнэг (суудал)'
                }
                  if(qwe.is_stop==10){
                    $turul= 'Гол хоолой унагасан'
                }
                 if(qwe.is_stop==11){
                  $turul = 'Тормоз хооронд хугацаа бариагүй'
                }
              var sHtmls = "<tr>" +
 
        "   <td class='m1'>" + qwe.broketype_name + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_km+ "</td>" +  
        "   <td class='m3'>" + $akt + "</td>" +  
          "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaltormozburuu' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatetormozburuu(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroytormozburuu(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
    
        "</tr>";
        $("#marshtormozburuu tbody").append(sHtmls);
         });
         
          });
         }
         function marshepkgemtel(itag)
         {
            
        $.get('getmarshepkgemtel/'+itag,function(data){
        $("#marshepkgemtel tbody").empty();  
         if(data.length == 0){
           $("#marshepkgemtelok").hide(); 
           $("#epkok").hide(); 
         
       } 
       else{
            $("#marshepkgemtelok").show(); 
             $("epkok").show(); 
       }    
             $.each(data,function(i,qwe){
              var sHtmls = "<tr>" +
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m3'>" + qwe.tush_no+ "</td>" +         
       "   <td class='m3'>" + qwe.tush_name+ "</td>" +              
       "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalepkgemtel' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateepkgemtel(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyepkgemtel(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +       
       
        "</tr>";
        $("#marshepkgemtel tbody").append(sHtmls);
         });
         
          }); 
         }

         function marshepkhaasan(itag)
         {
                    $.get('getmarshepkhaasan/'+itag,function(data){
        $("#marshepkhaasan tbody").empty();    
         if(data.length == 0){
           $("#marshepkhaasanok").hide(); 
            
         
       } 
       else{
            $("#marshepkhaasanok").show(); 
           $("#epkok").show(); 
       }  
             $.each(data,function(i,qwe){
              var sHtmls = "<tr>" +
        "   <td class='m3'>" + qwe.fault_from+ "</td>" +
        "   <td class='m3'>" + qwe.fault_to+ "</td>" +
        "   <td class='m3'>" + qwe.fault_time + "</td>" +
        "   <td class='m3'>" + qwe.fault_km+ "</td>" +     
        "   <td class='m3'>" +  qwe.reason + "</td>" +
     "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalepkhaasan' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateepkhaasan(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyepkhaasan(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  

       
        "</tr>";
        $("#marshepkhaasan tbody").append(sHtmls);
         });
         
          }); 
         }
         function marshkran(itag)
         {
                   $.get('getmarshkran/'+itag,function(data){
        $("#marshkran tbody").empty();   
         if(data.length == 0){
           $("#marshkranok").hide();
             $("#kranok").hide();
         }
       else{
            $("#kranok").show();
             $("#marshkranok").show();
         }
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
         "   <td class='m1'>" + qwe.broketype_name + "</td>" +
        "   <td class='m1'>" + qwe.fromstationname + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalkran' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatekran(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroykran(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshkran tbody").append(sHtmls);
         });
         
          });
         }
         function marshtormoztursh(itag)
         {
                        $.get('getmarshtormoztursh/'+itag,function(data){
        $("#marshtormoztursh tbody").empty(); 
         if(data.length == 0){
           $("#marshtormozturshok").hide(); 
         
         
       } 
       else{
            $("#marshtormozturshok").show(); 
            $("tormozok").show();  
       }     
             $.each(data,function(i,qwe){
                  var $akt;
                if(qwe.is_stop==3){
                    $akt= 'Туршсан';
                }
                else{
                  $akt = 'Туршаагүй';
                }
               
              var sHtmls = "<tr>" +
                  "   <td class='m1'>" + qwe.broketype_name + "</td>" +
        "   <td class='m1'>" + qwe.fromstationname + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m3'>" + $akt+ "</td>" + 
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaltormoztursh' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatetormoztursh(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroytormoztursh(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshtormoztursh tbody").append(sHtmls);
         });
         
          });
         }
         function marshoroh(itag)
         {
                          $.get('getmarshoroh/'+itag,function(data){
        $("#marshoroh tbody").empty(); 
         if(data.length == 0){
           $("#marshorohok").hide();

         
       } 
       else{
            $("#marshorohok").show(); 

       }     
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.fromstationname + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m3'>" + qwe.stoptime+ "</td>" +
                  "   <td class='m3'>" + qwe.reason+ "</td>" +
                  "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaloroh' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateoroh(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyoroh(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
       
        "</tr>";
        $("#marshoroh tbody").append(sHtmls);
         });
         
          });
         }
         function marshgolhooloi(itag)
         {
               $.get('getmarshgolhooloi/'+itag,function(data){
        $("#marshgolhooloi tbody").empty();   
         if(data.length == 0){
           $("#marshgolhooloiok").hide(); 
         
         
       } 
       else{
            $("#marshgolhooloiok").show(); 
              $("tormozok").show(); 
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
                  "   <td class='m3'>" + qwe.broketype_name+ "</td>" +
                  "   <td class='m3'>" + qwe.fromstationname+ "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalgolhooloi' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updategolhooloi(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroygolhooloi(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +          
     
       
        "</tr>";
        $("#marshgolhooloi tbody").append(sHtmls);
         });
         
          });  
         }
            function marshepkkon(itag)
         {
                     $.get('getmarshepkkon/'+itag,function(data){
        $("#marshepkkon tbody").empty();
         if(data.length == 0){
           $("#marshepkkonok").hide();
            
         
       } 
       else{
            $("#marshepkkonok").show();
            $("#epkkonok").show();
       }      
       
             $.each(data,function(i,qwe){
                 var $akt;
                if(qwe.is_techact==1){
                    $akt= 'Акттай'
                }
                if(qwe.is_techact==2){
                  $akt = 'Актгүй'
                }


              var sHtmls = "<tr>" +

        "   <td class='m3'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m3'>" + qwe.stoptime+ "</td>" +
                  "   <td class='m3'>" + qwe.broketype_name+ "</td>" +
                  "   <td class='m3'>" +$akt+ "</td>" +
         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalepkkon' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateepkkon(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyepkkon(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
        "</tr>";
        $("#marshepkkon tbody").append(sHtmls);
         });
         
          });
         }
         function marshepkajil(itag)
         {
             $.get('getmarshepkajil/'+itag,function(data){
                 $("#marshepkajil tbody").empty();
                 if(data.length == 0){
                     $("#marshepkajilok").hide();


                 }
                 else{
                     $("#marshepkajilok").show();
                     $("#epkok").show();
                 }

                 $.each(data,function(i,qwe){
                     var $akt;
                     if(qwe.is_techact==1){
                         $akt= 'Акттай'
                     }
                     if(qwe.is_techact==2){
                         $akt = 'Актгүй'
                     }
                     var $zogs;
                     if(qwe.is_stop==1){
                         $zogs= 'Зогссон'
                     }
                     if(qwe.is_stop==2){
                         $zogs = 'Зогсоогүй'
                     }
                     var sHtmls = "<tr>" +

                         "   <td class='m3'>" + qwe.fault_from + "</td>" +
                         "   <td class='m3'>" + qwe.fault_time+ "</td>" +
                         "   <td class='m3'>" + qwe.stoptime+ "</td>" +
                         "   <td class='m3'>" + $zogs + "</td>" +
                         "   <td class='m3'>" +$akt+ "</td>" +
                         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalepkajil' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateepkajil(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyepkajil(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
                         "</tr>";
                     $("#marshepkajil tbody").append(sHtmls);
                 });

             });
         }
          function marshyaraltai(itag)
         {
            
          $.get('getmarshyaraltai/'+itag,function(data){
        $("#marshyaraltai tbody").empty();    
         if(data.length == 0){
           $("#marshyaraltaiok").hide(); 
         
         
       } 
       else{
            $("#marshyaraltaiok").show(); 
             $("#tormozok").show(); 
       }  
             $.each(data,function(i,qwe){
                  var $akt;
                if(qwe.is_stop == 5){
                    $akt= 'Дайрагдсан';
                }
                if(qwe.is_stop == 6){
                  $akt = 'Дайрагдахаас сэргийлсэн';
                }
                 if(qwe.is_stop == 7){
                     $akt = 'Шүргэсэн';
                 }
                 if(qwe.is_stop ==12){
                     $akt = 'Өнгөрсөн';
                 }
                 if(qwe.is_stop ==13){
                     $akt = 'Өнгөрөөгүй';
                 }

              var sHtmls = "<tr>" +
         "   <td class='m3'>" + qwe.broketype_name+ "</td>" + 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
          "   <td class='m3'>" + qwe.stoptime+ "</td>" +
        "   <td class='m3'>" + $akt+ "</td>" +
                  "   <td class='m3'>" + qwe.reason + "</td>" +
                  "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalyaraltai' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateyaraltai(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyyaraltai(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
  
       
        "</tr>";
        $("#marshyaraltai tbody").append(sHtmls);
         });
         
          });  
         }
          function marsh20(itag)
         {
                    $.get('getmarsh20/'+itag,function(data){
        $("#marsh20 tbody").empty();  
         if(data.length == 0){
           $("#marsh20ok").hide(); 
         
       } 
       else{
            $("#marsh20ok").show(); 
       }    
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fromstationname+ "</td>" + 
        "   <td class='m3'>" + qwe.stoptime+ "</td>" + 
          "   <td class='m3'>" + qwe.reason+ "</td>" + 
          "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modal20' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='update20(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroy20(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  

  
       
        "</tr>";
        $("#marsh20 tbody").append(sHtmls);
         });
         
          });
         }  
          function marshhii(itag)
         {
      $.get('getmarshhii/'+itag,function(data){
        $("#marshhiiergesen tbody").empty();  
         if(data.length == 0){
           $("#marshhiiok").hide(); 
         
       } 
       else{
            $("#marshhiiok").show(); 
       }    
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
                  "   <td class='m3'>" + qwe.over_speed + "</td>" +
        "   <td class='m3'>" + qwe.reason+ "</td>" + 
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalhii' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatehii(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyhii(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
  
       
        "</tr>";
        $("#marshhiiergesen tbody").append(sHtmls);
         });
         
          });
         }
          function marshanhaaramj(itag)
         {
             $.get('getmarshanhaaramj/'+itag,function(data){
        $("#marshzurchilanhaaramj tbody").empty();
         if(data.length == 0){
           $("#marshzurchilattentionok").hide(); 
         
       } 
       else{
            $("#marshzurchilattentionok").show(); 
       }      
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.stoptime+ "</td>" + 
        "   <td class='m3'>" + qwe.tush_name+ "</td>" + 
        "   <td class='m3'>" + qwe.tush_alba+ "</td>" + 
        "   <td class='m3'>" + qwe.reason+ "</td>" + 
         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalattention' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateattention(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyattention(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
       
        "</tr>";
        $("#marshzurchilanhaaramj tbody").append(sHtmls);
         });
         
          }); 
         }
          function marshduud(itag)
         {
                      $.get('getmarshduud/'+itag,function(data){
        $("#marshduud tbody").empty();   
         if(data.length == 0){
           $("#marshduudok").hide();
             $("#duudok").hide();

         }
       else{
            $("#marshduudok").show(); 
            $("#duudok").show(); 
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
                  "   <td class='m3'>" + qwe.broketype_name+ "</td>" +
                  "   <td class='m3'>" + qwe.fromstationname+ "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalduud' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateduud(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyduud(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshduud tbody").append(sHtmls);
         });
         
          }); 

         }
            function marshkilo(itag)
         {
            $.get('getmarshkilo/'+itag,function(data){
        $("#marshkilo tbody").empty();    
         if(data.length == 0){
           $("#marshkilook").hide(); 
         
       } 
       else{
            $("#marshkilook").show(); 
       }  
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_to + "</td>" +
                  "   <td class='m3'>" + qwe.fault_km + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalkilo' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatekilo(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroykilo(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshkilo tbody").append(sHtmls);
         });
         
          }); 
         }
          function marshbuguiwch(itag)
         {
            $.get('getmarshbuguiwch/'+itag,function(data){
        $("#marshbuguiwch tbody").empty();    
         if(data.length == 0){
           $("#marshbuguiwchok").hide(); 
         
       } 
       else{
            $("#marshbuguiwchok").show(); 
       }  
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +

        "   <td class='m3'>" + qwe.reason+ "</td>" +
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalbuguiwch' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatebuguiwch(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroybuguiwch(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshbuguiwch tbody").append(sHtmls);
         });
         
          }); 
         }
         function marshklub(itag)
         {
               
                      $.get('getmarshklub/'+itag,function(data){
        $("#marshklub tbody").empty();    
         if(data.length == 0){
           $("#marshklubok").hide(); 
         
       } 
       else{
            $("#marshklubok").show(); 
       }  
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_to + "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalklub' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateklub(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyklub(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshklub tbody").append(sHtmls);
         });
         
          }); 
         }
         function marshjoloo(itag)
         {
            $.get('getmarshjoloo/'+itag,function(data){
        $("#marshjoloo tbody").empty(); 
          if(data.length == 0){
           $("#marshjoloook").hide(); 
         
       } 
       else{
            $("#marshjoloook").show(); 
       }     
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fault_from+ "</td>" +
        "   <td class='m3'>" + qwe.fault_to+ "</td>" +
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaljoloo' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatejoloo(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyjoloo(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshjoloo tbody").append(sHtmls);
         });
         
          }); 
         }
    function marshjolood(itag)
    {
        $.get('getmarshjolood/'+itag,function(data){
            $("#marshjolood tbody").empty();
            if(data.length == 0){
                $("#marshjoloodok").hide();

            }
            else{
                $("#marshjoloodok").show();
            }
            $.each(data,function(i,qwe){

                var sHtmls = "<tr>" +

                    "   <td class='m3'>" + qwe.fault_from+ "</td>" +
                    "   <td class='m3'>" + qwe.fault_to+ "</td>" +
                    "   <td class='m3'>" + qwe.fault_time+ "</td>" +
                    "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaljolood' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatejolood(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyjolood(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
                    "</tr>";
                $("#marshjolood tbody").append(sHtmls);
            });

        });
    }
         function marshbusad(itag)
         {
            
              $.get('getmarshbusad/'+itag,function(data){
        $("#marshbusad tbody").empty();   
          if(data.length == 0){
           $("#marshbusadok").hide(); 
         
       } 
       else{
            $("#marshbusadok").show(); 
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.reason+ "</td>" + 
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalbusad' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatebusad(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroybusad(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
       
        "</tr>";
        $("#marshbusad tbody").append(sHtmls);
         });
         
          }); 
         }
         function marshbusaduzuulelt(itag)
         {

             $.get('getmarshbusaduzuulelt/'+itag,function(data){
                 $("#marshbusaduzuulelt tbody").empty();
                 if(data.length == 0){
                     $("#marshbusaduzuuleltok").hide();

                 }
                 else{
                     $("#marshbusaduzuuleltok").show();
                 }
                 $.each(data,function(i,qwe){

                     var sHtmls = "<tr>" +

                         "   <td class='m3'>" + qwe.reason+ "</td>" +
                         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalbusaduzuulelt' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatebusaduzuulelt(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroybusaduzuulelt(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +

                         "</tr>";
                     $("#marshbusaduzuulelt tbody").append(sHtmls);
                 });

             });
         }
         function marshepkshilj(itag)
         {
                $.get('getmarshepkshilj/'+itag,function(data){
        $("#marshepkshilj tbody").empty(); 
          if(data.length == 0){
           $("#marshepkshiljok").hide(); 
         
         
       } 
       else{
            $("#marshepkshiljok").show(); 
             $("#epkok").show(); 
       }     
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
       
        "   <td class='m3'>" + qwe.fromstationname+ "</td>" +
                  "   <td class='m3'>" + qwe.broketype_name+ "</td>" +
                  "   <td class='m3'>" + qwe.fault_time+ "</td>" +
         "   <td class='m3'>" + qwe.stoptime+ "</td>" + 
        "   <td class='m3'>" + qwe.reason+ "</td>" + 
         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalepkshilj' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updateepkshilj(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyepkshilj(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshepkshilj tbody").append(sHtmls);
         });
         
          });
         }
         function marshhurdhemjigch(itag)
         {
                 $.get('getmarshhurdhemjigch/'+itag,function(data){
        $("#marshhurdhemjigch tbody").empty(); 
          if(data.length == 0){
           $("#marshhurdhemjigchok").hide(); 
         
       } 
       else{
            $("#marshhurdhemjigchok").show(); 
       }     
       
             $.each(data,function(i,qwe){
                 var $akt;
                if(qwe.is_techact==1){
                    $akt= 'Акттай'
                }
                else{
                  $akt = 'Актгүй'
                }
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.broketype_name+ "</td>" + 
        "   <td class='m3'>" + $akt+ "</td>" + 
        "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
       "   <td class='m3'>" + qwe.fault_km+ "</td>" + 
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalhurdhemjigch' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatehurdhemjigch(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyhurdhemjigch(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
       
        "</tr>";
        $("#marshhurdhemjigch tbody").append(sHtmls);
         });
         
          }); 
         }
         function marshbichlegbudeg(itag)
         {
              
             $.get('getmarshbichlegbudeg/'+itag,function(data){
        $("#marshbichlegbudeg tbody").empty();   
          if(data.length == 0){
           $("#marshbichlegbudegok").hide();
           $("#bichok").hide(); 
         
       } 
       else{
            $("#marshbichlegbudegok").show(); 
              $("#bichok").show(); 
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
       "   <td class='m3'>" + qwe.fault_km+ "</td>" +
       "   <td class='m3'>" + qwe.fault_time+ "</td>" +  
            "   <td class='m3'>" + qwe.broketype_name+ "</td>" + 
             "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalbichlegbudeg' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatebichlegbudeg(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroybichlegbudeg(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
       
        "</tr>";
        $("#marshbichlegbudeg tbody").append(sHtmls);
         });
         
          }); 
         }
         function marshbichlegdutuu(itag)
         {
            $.get('getmarshbichlegdutuu/'+itag,function(data){
        $("#marshbichlegdutuu tbody").empty();   
          if(data.length == 0){
           $("#marshbichlegdutuuok").hide(); 
             $("#bichok").hide(); 
         
       } 
       else{
            $("#marshbichlegdutuuok").show(); 
             $("#bichok").show(); 
       }   
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
       "   <td class='m3'>" + qwe.fault_km+ "</td>" +
       "   <td class='m3'>" + qwe.fault_time+ "</td>" +  
       "   <td class='m3'>" + qwe.broketype_name+ "</td>" + 
       "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalbichlegdutuu' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatebichlegdutuu(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroybichlegdutuu(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
       
        "</tr>";
        $("#marshbichlegdutuu tbody").append(sHtmls);
         });
         
          });
         }
        function marshtsag(itag)
         {
                     $.get('getmarshtsag/'+itag,function(data){
        $("#marshtsag tbody").empty();  
          if(data.length == 0){
           $("#tsagok").hide();
              $("#marshtsagok").hide();
       } 
       else{
            $("#tsagok").show();
              $("#marshtsagok").show();
       }    
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
       "   <td class='m3'>" + qwe.fault_time+ "</td>" +  
        "   <td class='m3'>" + qwe.fault_km+ "</td>" +
         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaltsag' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatetsag(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroytsag(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshtsag tbody").append(sHtmls);
         });
         
          });
         }

        function marshtuuzzassan(itag)
         {
                $.get('getmarshtuuzzassan/'+itag,function(data){
        $("#marshtuuzzassan tbody").empty();    
                if(data.length == 0){
           $("#marshtuuzok").hide(); 
           $("#tuuzok").hide(); 
         
       } 
       else{
            $("#marshtuuzok").show(); 
             $("#tuuzok").hide(); 
       }  
             $.each(data,function(i,qwe){
 
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.broketype_name+ "</td>" + 
       "   <td class='m3'>" + qwe.fault_time+ "</td>" + 
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaltuuzzassan' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatetuuzzassan(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroytuuzzassan(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +   

        "</tr>";
        $("#marshtuuzzassan tbody").append(sHtmls);
         });
         
          }); 
         }

           function marshstat(itag)
         {
             $.get('getmarshstat/'+itag,function(data){
        $("#marshstat tbody").empty();    

             $.each(data,function(i,qwe){
              var $arrivtime;
              var $gonetime;
              var $zuruu;
                if(qwe.arrivtime == null){
                    $arrivtime= '';
                }
                else{
                  $arrivtime = qwe.arrivtime;
                }
               
                if(qwe.gonetime == null){
                    $gonetime= '';
                }
                else{
                  $gonetime = qwe.gonetime;
                }
                 if(qwe.zuruu == null){
                    $zuruu= '';
                }
                else{
                  $zuruu = qwe.zuruu;
                }
              var sHtmls = "<tr>" +
        "   <td class='m1'>" + qwe.workid + "</td>" +
        "   <td class='m2'>" + qwe.splitid + "</td>" +
        "   <td class='m3'>" + qwe.seqid+ "</td>" +        
        "   <td class='m4'>" + qwe.statcode + "</td>"+
        "   <td class='m5'>" + qwe.statname + "</td>"+
        "   <td class='m7'>" + $arrivtime + "</td>"+
        "   <td class='m6'>" + $gonetime + "</td>"+
        "   <td class='m6'>" + $zuruu + "</td>"+
        "</tr>";

        $("#marshstat tbody").append(sHtmls);
               
               
         });
         
          });
         }
         function marshtuuzuragdsan(itag)
         {
              $.get('getmarshtuuzuragdsan/'+itag,function(data){
        $("#marshtuuzuragdsan tbody").empty();
          if(data.length == 0){
           $("#marshtuuzuragdsanok").hide(); 
         
       } 
       else{
            $("#marshtuuzuragdsanok").show(); 
             $("tuuzok").show(); 
       }      
             $.each(data,function(i,qwe){
                
              var sHtmls = "<tr>" +
 
        "   <td class='m3'>" + qwe.fault_from + "</td>" +
        "   <td class='m3'>" + qwe.fault_km+ "</td>" +
       "   <td class='m3'>" + qwe.fault_time+ "</td>" +  
        "   <td class='m3'>" + qwe.broketype_name+ "</td>" + 
         "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modaltuuzuragdsan' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatetuuzuragdsan(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroytuuzuragdsan(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +  
        "</tr>";
        $("#marshtuuzuragdsan tbody").append(sHtmls);
         });
         
          });
         }
           
 function marshhajuu(itag)
         {
              
         $.get('getmarshhajuu/'+itag,function(data){
        $("#marshhajuu tbody").empty();    
         if(data.length == 0){
           $("#marshhajuuok").hide(); 
         
       } 
       else{
            $("#marshhajuuok").show(); 
       }      
             $.each(data,function(i,qwe){
                
      var sHtmls = "<tr id=" + qwe.fault_id +">" +
          
        "   <td class='m1'>" + qwe.fault_from + "</td>" +
        "   <td class='m1'> <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#modalhajuu' data-id=" + qwe.fault_id + " tag=" + qwe.fault_id + " onclick='updatehajuu(" + qwe.fault_id + ")'><span class='glyphicon glyphicon-pencil'></span></a><a class='btn btn-xs btn-danger' tag=" + qwe.fault_id + " onclick='destroyhajuu(" + qwe.fault_id + ")' ><span class='glyphicon glyphicon-trash'></span></a> </td>" +
        "</tr>";

        $("#marshhajuu tbody").append(sHtmls);
               
               
         });
         
          });
         }

         function myFunction() {
    var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
     var q = document.getElementById("paneloroh");
     var r = document.getElementById("panelbusaduzuulelt");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";
        k.style.display = "none";
        r.style.display = "none";
        h.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
    }
}
         function myFunctionattention() {
             var x = document.getElementById("panelanhaaramj");
             var y = document.getElementById("panelhajuu");
             var k = document.getElementById("panelhoorond");
             var z = document.getElementById("panelurtuu30");
             var a = document.getElementById("paneltechno");
             var b = document.getElementById("paneltogtooson");
             var c = document.getElementById("paneltuslamj");
             var d = document.getElementById("paneluharsan");
             var e = document.getElementById("panelgraphicbus");
             var f = document.getElementById("panelgraphiciluu");
             var h = document.getElementById("panelhaluun");
             var m = document.getElementById("panel20");
             var l = document.getElementById("panelyaraltai");
             var j = document.getElementById("panelhii");
             var n = document.getElementById("panelattention");
             var o = document.getElementById("panelbuguiwch");
             var p = document.getElementById("panelhurdhemjigchgemtel");
             var s = document.getElementById("panel20min");
             var q = document.getElementById("paneloroh");
             var r = document.getElementById("panelbusaduzuulelt");
             if (n.style.display === "none") {
                 n.style.display = "block";
                 x.style.display = "none";
                 z.style.display = "none";
                 a.style.display = "none";
                 b.style.display = "none";
                 c.style.display = "none";
                 d.style.display = "none";
                 e.style.display = "none";
                 f.style.display = "none";
                 k.style.display = "none";
                 h.style.display = "none";
                 m.style.display = "none";
                 r.style.display = "none";
                 l.style.display = "none";
                 y.style.display = "none";
                 j.style.display = "none";
                 o.style.display = "none";
                 p.style.display = "none";
                 s.style.display = "none";
                 q.style.display = "none";
             }
         }



         function myFunctionbuguiwch() {
             var x = document.getElementById("panelanhaaramj");
             var y = document.getElementById("panelhajuu");
             var k = document.getElementById("panelhoorond");
             var z = document.getElementById("panelurtuu30");
             var a = document.getElementById("paneltechno");
             var b = document.getElementById("paneltogtooson");
             var c = document.getElementById("paneltuslamj");
             var d = document.getElementById("paneluharsan");
             var e = document.getElementById("panelgraphicbus");
             var f = document.getElementById("panelgraphiciluu");
             var h = document.getElementById("panelhaluun");
             var m = document.getElementById("panel20");
             var l = document.getElementById("panelyaraltai");
             var j = document.getElementById("panelhii");
             var n = document.getElementById("panelattention");
             var o = document.getElementById("panelbuguiwch");
             var p = document.getElementById("panelhurdhemjigchgemtel");
             var s = document.getElementById("panel20min");
             var q = document.getElementById("paneloroh");
             var r = document.getElementById("panelbusaduzuulelt");
             if (o.style.display === "none") {
                 o.style.display = "block";
                 x.style.display = "none";
                 z.style.display = "none";
                 a.style.display = "none";
                 b.style.display = "none";
                 c.style.display = "none";
                 d.style.display = "none";
                 e.style.display = "none";
                 f.style.display = "none";
                 k.style.display = "none";
                 h.style.display = "none";
                 m.style.display = "none";
                 l.style.display = "none";
                 y.style.display = "none";
                 r.style.display = "none";
                 n.style.display = "none";
                 j.style.display = "none";
                 p.style.display = "none";
                 s.style.display = "none";
                 q.style.display = "none";
             }
         }
         function myFunction20min() {
             var x = document.getElementById("panelanhaaramj");
             var y = document.getElementById("panelhajuu");
             var k = document.getElementById("panelhoorond");
             var z = document.getElementById("panelurtuu30");
             var a = document.getElementById("paneltechno");
             var b = document.getElementById("paneltogtooson");
             var c = document.getElementById("paneltuslamj");
             var d = document.getElementById("paneluharsan");
             var e = document.getElementById("panelgraphicbus");
             var f = document.getElementById("panelgraphiciluu");
             var h = document.getElementById("panelhaluun");
             var m = document.getElementById("panel20");
             var l = document.getElementById("panelyaraltai");
             var j = document.getElementById("panelhii");
             var n = document.getElementById("panelattention");
             var o = document.getElementById("panelbuguiwch");
             var p = document.getElementById("panelhurdhemjigchgemtel");
             var s = document.getElementById("panel20min");
             var q = document.getElementById("paneloroh");
             var r = document.getElementById("panelbusaduzuulelt");
             if (s.style.display === "none") {
                 s.style.display = "block";
                 x.style.display = "none";
                 z.style.display = "none";
                 a.style.display = "none";
                 b.style.display = "none";
                 c.style.display = "none";
                 d.style.display = "none";
                 e.style.display = "none";
                 f.style.display = "none";
                 k.style.display = "none";
                 h.style.display = "none";
                 m.style.display = "none";
                 l.style.display = "none";
                 y.style.display = "none";
                 n.style.display = "none";
                 j.style.display = "none";
                 p.style.display = "none";
                 o.style.display = "none";
                 r.style.display = "none";
                 q.style.display = "none";
             }
         }

         function myFunctionhii() {
             var x = document.getElementById("panelanhaaramj");
             var y = document.getElementById("panelhajuu");
             var k = document.getElementById("panelhoorond");
             var z = document.getElementById("panelurtuu30");
             var a = document.getElementById("paneltechno");
             var b = document.getElementById("paneltogtooson");
             var c = document.getElementById("paneltuslamj");
             var d = document.getElementById("paneluharsan");
             var e = document.getElementById("panelgraphicbus");
             var f = document.getElementById("panelgraphiciluu");
             var h = document.getElementById("panelhaluun");
             var m = document.getElementById("panel20");
             var l = document.getElementById("panelyaraltai");
             var j = document.getElementById("panelhii");
             var n = document.getElementById("panelattention");
             var o = document.getElementById("panelbuguiwch");
             var p = document.getElementById("panelhurdhemjigchgemtel");
             var s = document.getElementById("panel20min");
             var q = document.getElementById("paneloroh");
             var r = document.getElementById("panelbusaduzuulelt");
             if (j.style.display === "none") {
                 j.style.display = "block";
                 x.style.display = "none";
                 z.style.display = "none";
                 a.style.display = "none";
                 b.style.display = "none";
                 c.style.display = "none";
                 d.style.display = "none";
                 e.style.display = "none";
                 f.style.display = "none";
                 k.style.display = "none";
                 h.style.display = "none";
                 m.style.display = "none";
                 l.style.display = "none";
                 y.style.display = "none";
                 n.style.display = "none";
                 o.style.display = "none";
                 p.style.display = "none";
                 s.style.display = "none";
                 q.style.display = "none";
                 r.style.display = "none";
             }
         }
function myFunctionhajuu() {
    var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (y.style.display === "none") {
        y.style.display = "block";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";
        k.style.display = "none";
        h.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    }
}


    function myFunctionhurdhemjigchgemtel() {
        var x = document.getElementById("panelanhaaramj");
        var y = document.getElementById("panelhajuu");
        var k = document.getElementById("panelhoorond");
        var z = document.getElementById("panelurtuu30");
        var a = document.getElementById("paneltechno");
        var b = document.getElementById("paneltogtooson");
        var c = document.getElementById("paneltuslamj");
        var d = document.getElementById("paneluharsan");
        var e = document.getElementById("panelgraphicbus");
        var f = document.getElementById("panelgraphiciluu");
        var h = document.getElementById("panelhaluun");
        var m = document.getElementById("panel20");
        var l = document.getElementById("panelyaraltai");
        var j = document.getElementById("panelhii");
        var n = document.getElementById("panelattention");
        var o = document.getElementById("panelbuguiwch");
        var p = document.getElementById("panelhurdhemjigchgemtel");
        var s = document.getElementById("panel20min");
        var q = document.getElementById("paneloroh");
        var r = document.getElementById("panelbusaduzuulelt");
        if (p.style.display === "none") {

            p.style.display = "block";
            x.style.display = "none";
            z.style.display = "none";
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";
            e.style.display = "none";
            f.style.display = "none";
            k.style.display = "none";
            h.style.display = "none";
            m.style.display = "none";
            l.style.display = "none";
            y.style.display = "none";
            n.style.display = "none";
            o.style.display = "none";
            j.style.display = "none";
            s.style.display = "none";
            q.style.display = "none";
            r.style.display = "none";

        }
    }

         function myFunctionyaraltai() {
             var x = document.getElementById("panelanhaaramj");
             var y = document.getElementById("panelhajuu");
             var k = document.getElementById("panelhoorond");
             var z = document.getElementById("panelurtuu30");
             var a = document.getElementById("paneltechno");
             var b = document.getElementById("paneltogtooson");
             var c = document.getElementById("paneltuslamj");
             var d = document.getElementById("paneluharsan");
             var e = document.getElementById("panelgraphicbus");
             var f = document.getElementById("panelgraphiciluu");
             var h = document.getElementById("panelhaluun");
             var m = document.getElementById("panel20");
             var l = document.getElementById("panelyaraltai");
             var j = document.getElementById("panelhii");
             var n = document.getElementById("panelattention");
             var o = document.getElementById("panelbuguiwch");
             var p = document.getElementById("panelhurdhemjigchgemtel");
             var s = document.getElementById("panel20min");
             var q = document.getElementById("paneloroh");
             var r = document.getElementById("panelbusaduzuulelt");
             if (l.style.display === "none") {
                 l.style.display = "block";
                 x.style.display = "none";
                 z.style.display = "none";
                 a.style.display = "none";
                 b.style.display = "none";
                 c.style.display = "none";
                 d.style.display = "none";
                 e.style.display = "none";
                 f.style.display = "none";
                 k.style.display = "none";
                 h.style.display = "none";
                 m.style.display = "none";
                 y.style.display = "none";
                 j.style.display = "none";
                 n.style.display = "none";
                 o.style.display = "none";
                 p.style.display = "none";
                 s.style.display = "none";
                 q.style.display = "none";
                 r.style.display = "none";
             }
         }
function myFunctionhoorond() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (k.style.display === "none") {
       k.style.display = "block";
        y.style.display = "none";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";
        h.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    }
}
function myFunctionurtuu30() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (z.style.display === "none") {
      z.style.display = "block";
        y.style.display = "none";
        x.style.display = "none";
        k.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";      
        h.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    }
}
         function myFunctionoroh() {
             var x = document.getElementById("panelanhaaramj");
             var y = document.getElementById("panelhajuu");
             var k = document.getElementById("panelhoorond");
             var z = document.getElementById("panelurtuu30");
             var a = document.getElementById("paneltechno");
             var b = document.getElementById("paneltogtooson");
             var c = document.getElementById("paneltuslamj");
             var d = document.getElementById("paneluharsan");
             var e = document.getElementById("panelgraphicbus");
             var f = document.getElementById("panelgraphiciluu");
             var h = document.getElementById("panelhaluun");
             var m = document.getElementById("panel20");
             var l = document.getElementById("panelyaraltai");
             var j = document.getElementById("panelhii");
             var n = document.getElementById("panelattention");
             var o = document.getElementById("panelbuguiwch");
             var p = document.getElementById("panelhurdhemjigchgemtel");
             var s = document.getElementById("panel20min");
             var q = document.getElementById("paneloroh");
             var r = document.getElementById("panelbusaduzuulelt");
             if (q.style.display === "none") {
                 q.style.display = "block";
                 y.style.display = "none";
                 x.style.display = "none";
                 k.style.display = "none";
                 a.style.display = "none";
                 b.style.display = "none";
                 c.style.display = "none";
                 d.style.display = "none";
                 e.style.display = "none";
                 f.style.display = "none";
                 h.style.display = "none";
                 m.style.display = "none";
                 l.style.display = "none";
                 j.style.display = "none";
                 n.style.display = "none";
                 o.style.display = "none";
                 p.style.display = "none";
                 s.style.display = "none";
                 z.style.display = "none";
                 r.style.display = "none";
             }
         }
function myFunctiontechno() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (a.style.display === "none") {
      a.style.display = "block";
        y.style.display = "none";
        x.style.display = "none";
        z.style.display = "none";
        k.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";
        h.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    }
}
function myFunctiontogtooson() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (b.style.display === "none") {
       b.style.display = "block";
        y.style.display = "none";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        k.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";
        h.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    } 
}
function myFunctiontuslamj() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (c.style.display === "none") {
        c.style.display = "block";
        y.style.display = "none";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        k.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";
        h.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    }
}
function myFunctionuharsan() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (d.style.display === "none") {
        y.style.display = "none";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        k.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";
        d.style.display = "block";
        h.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    } 
}
function myFunctiongraphicbus() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (e.style.display === "none") {
         e.style.display = "block";
        y.style.display = "none";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        k.style.display = "none";
        f.style.display = "none";
        h.style.display = "none";
        m.style.display = "none";
        k.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    } 
}
function myFunctiongraphiciluu() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (f.style.display === "none") {
        y.style.display = "none";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        k.style.display = "none";
        f.style.display = "block";
        h.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    } 
}
function myFunctionhaluun() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (h.style.display === "none") {
       h.style.display = "block";
        y.style.display = "none";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";
        k.style.display = "none";
        m.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        r.style.display = "none";
        q.style.display = "none";
    } 
}
function myFunction20() {
  var x = document.getElementById("panelanhaaramj");
    var y = document.getElementById("panelhajuu");
    var k = document.getElementById("panelhoorond");
    var z = document.getElementById("panelurtuu30");
    var a = document.getElementById("paneltechno");
    var b = document.getElementById("paneltogtooson");
    var c = document.getElementById("paneltuslamj");
    var d = document.getElementById("paneluharsan");
    var e = document.getElementById("panelgraphicbus");
    var f = document.getElementById("panelgraphiciluu");
    var h = document.getElementById("panelhaluun");
    var m = document.getElementById("panel20");
    var l = document.getElementById("panelyaraltai");
    var j = document.getElementById("panelhii");
    var n = document.getElementById("panelattention");
    var o = document.getElementById("panelbuguiwch");
    var p = document.getElementById("panelhurdhemjigchgemtel");
    var s = document.getElementById("panel20min");
    var q = document.getElementById("paneloroh");
    var r = document.getElementById("panelbusaduzuulelt");
    if (m.style.display === "none") {
        m.style.display = "block";
        y.style.display = "none";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";  
        h.style.display = "none";
        k.style.display = "none";
        l.style.display = "none";
        j.style.display = "none";
        n.style.display = "none";
        o.style.display = "none";
        p.style.display = "none";
        s.style.display = "none";
        q.style.display = "none";
        r.style.display = "none";
    }
}
         function myFunctionbusaduzuulelt() {
             var x = document.getElementById("panelanhaaramj");
             var y = document.getElementById("panelhajuu");
             var k = document.getElementById("panelhoorond");
             var z = document.getElementById("panelurtuu30");
             var a = document.getElementById("paneltechno");
             var b = document.getElementById("paneltogtooson");
             var c = document.getElementById("paneltuslamj");
             var d = document.getElementById("paneluharsan");
             var e = document.getElementById("panelgraphicbus");
             var f = document.getElementById("panelgraphiciluu");
             var h = document.getElementById("panelhaluun");
             var m = document.getElementById("panel20");
             var l = document.getElementById("panelyaraltai");
             var j = document.getElementById("panelhii");
             var n = document.getElementById("panelattention");
             var o = document.getElementById("panelbuguiwch");
             var p = document.getElementById("panelhurdhemjigchgemtel");
             var s = document.getElementById("panel20min");
             var q = document.getElementById("paneloroh");
             var r = document.getElementById("panelbusaduzuulelt");
             if (r.style.display === "none") {
                 r.style.display = "block";
                 m.style.display = "none";
                 y.style.display = "none";
                 x.style.display = "none";
                 z.style.display = "none";
                 a.style.display = "none";
                 b.style.display = "none";
                 c.style.display = "none";
                 d.style.display = "none";
                 e.style.display = "none";
                 f.style.display = "none";
                 h.style.display = "none";
                 k.style.display = "none";
                 l.style.display = "none";
                 j.style.display = "none";
                 n.style.display = "none";
                 o.style.display = "none";
                 p.style.display = "none";
                 s.style.display = "none";
                 q.style.display = "none";

             }
         }
function myFunctionepk() {
    var x = document.getElementById("colepk");
    var y = document.getElementById("colduut");
    var k = document.getElementById("coltormoz");
    var z = document.getElementById("coltuuz");
    var a = document.getElementById("colbich");
    var b = document.getElementById("col45");
    var c = document.getElementById("colbusad");
    var d = document.getElementById("coltsag");
    var e = document.getElementById("colkran");

    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        k.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";

    } 
}
function myFunctionduut() {
    var x = document.getElementById("colepk");
    var y = document.getElementById("colduut");
    var k = document.getElementById("coltormoz");
    var z = document.getElementById("coltuuz");
    var a = document.getElementById("colbich");
    var b = document.getElementById("col45");
    var c = document.getElementById("colbusad");
    var d = document.getElementById("coltsag");
    var e = document.getElementById("colkran");

    if (y.style.display === "none") {
        y.style.display = "block";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        k.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";

    } 
}
function myFunctiontuuz() {
    var x = document.getElementById("colepk");
    var y = document.getElementById("colduut");
    var k = document.getElementById("coltormoz");
    var z = document.getElementById("coltuuz");
    var a = document.getElementById("colbich");
    var b = document.getElementById("col45");
    var c = document.getElementById("colbusad");
    var d = document.getElementById("coltsag");
    var e = document.getElementById("colkran");
    
    if (z.style.display === "none") {
        z.style.display = "block";
        x.style.display = "none";
        y.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        k.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
    } 
}
function myFunctionbich() {
    var x = document.getElementById("colepk");
    var y = document.getElementById("colduut");
    var k = document.getElementById("coltormoz");
    var z = document.getElementById("coltuuz");
    var a = document.getElementById("colbich");
    var b = document.getElementById("col45");
    var c = document.getElementById("colbusad");
    var d = document.getElementById("coltsag");
    var e = document.getElementById("colkran");
    
    if (a.style.display === "none") {
        a.style.display = "block";
        x.style.display = "none";
        z.style.display = "none";
        y.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        k.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
    } 
}
function myFunction45() {
    var x = document.getElementById("colepk");
    var y = document.getElementById("colduut");
    var k = document.getElementById("coltormoz");
    var z = document.getElementById("coltuuz");
    var a = document.getElementById("colbich");
    var b = document.getElementById("col45");
    var c = document.getElementById("colbusad");
    var d = document.getElementById("coltsag");
    var e = document.getElementById("colkran");
    
    if (b.style.display === "none") {
        b.style.display = "block";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        y.style.display = "none";
        c.style.display = "none";
        k.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";

    } 
}
function myFunctionbusad() {
    var x = document.getElementById("colepk");
    var y = document.getElementById("colduut");
    var k = document.getElementById("coltormoz");
    var z = document.getElementById("coltuuz");
    var a = document.getElementById("colbich");
    var b = document.getElementById("col45");
    var c = document.getElementById("colbusad");
    var d = document.getElementById("coltsag");
    var e = document.getElementById("colkran");
    
    if (c.style.display === "none") {
        c.style.display = "block";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        y.style.display = "none";
        k.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";

    } 
}
function myFunctiontormoz() {
    var x = document.getElementById("colepk");
    var y = document.getElementById("colduut");
    var k = document.getElementById("coltormoz");
    var z = document.getElementById("coltuuz");
    var a = document.getElementById("colbich");
    var b = document.getElementById("col45");
    var c = document.getElementById("colbusad");
    var d = document.getElementById("coltsag");
    var e = document.getElementById("colkran");
    
    if (k.style.display === "none") {
        k.style.display = "block";
        x.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        y.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";

    } 
}
         function myFunctiontsag() {
             var x = document.getElementById("colepk");
             var y = document.getElementById("colduut");
             var k = document.getElementById("coltormoz");
             var z = document.getElementById("coltuuz");
             var a = document.getElementById("colbich");
             var b = document.getElementById("col45");
             var c = document.getElementById("colbusad");
             var d = document.getElementById("coltsag");
             var e = document.getElementById("colkran");

             if (d.style.display === "none") {
                 d.style.display = "block";
                 x.style.display = "none";
                 z.style.display = "none";
                 a.style.display = "none";
                 b.style.display = "none";
                 c.style.display = "none";
                 y.style.display = "none";
                 e.style.display = "none";
                 k.style.display = "none";
             }
         }
         function myFunctionkran() {
             var x = document.getElementById("colepk");
             var y = document.getElementById("colduut");
             var k = document.getElementById("coltormoz");
             var z = document.getElementById("coltuuz");
             var a = document.getElementById("colbich");
             var b = document.getElementById("col45");
             var c = document.getElementById("colbusad");
             var d = document.getElementById("coltsag");
             var e = document.getElementById("colkran");

             if (e.style.display === "none") {
                 e.style.display = "block";
                 x.style.display = "none";
                 z.style.display = "none";
                 a.style.display = "none";
                 b.style.display = "none";
                 c.style.display = "none";
                 y.style.display = "none";
                 d.style.display = "none";
                 k.style.display = "none";
             }
         }
</script>