

            <script type="text/javascript">


  $(document).ready(function() {
      $("#nemelt").on('click', 'tr', function () {
          var selected = $(this).hasClass("highlight");
          $("#nemelt tr").removeClass("highlight");
          if(!selected)
              $(this).addClass("highlight");
      });
      $("#zurch").on('click', 'tr', function () {
          var selected = $(this).hasClass("highlight");
          $("#zurch tr").removeClass("highlight");
          if(!selected)
              $(this).addClass("highlight");
      });
    $('#achaa_mach').val($('#mach').val()).trigger('change');
    $('#achaa_tus').val($('#tus').val()).trigger('change');
    $('#achaa_seri').val($('#seri').val()).trigger('change');
    $('#devter_id').val($('#dev').val()).trigger('change');
 $("input:checkbox").change(function() {
                    var ischecked= $(this).is(':checked');
                    if(ischecked)
                         $('#cont').show();
                    if(!ischecked)
                      $('#cont').hide();
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
              'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
          ],
     


      } );
              myFunction();
      $("#zurchilyaraltai_type").on('change', function() {
          if ($(this).val() == '38'){
              $('#zurchilyaraltai_attack').empty();
              $('#zurchilyaraltai_attack').append('<option value="12">Өнгөрсөн</option><option value="13">Өнгөрөөгүй</option>');
          } else {
              $('#zurchilyaraltai_attack').empty();
              $('#zurchilyaraltai_attack').append('<option value="5">Дайрагдсан</option><option value="6">Дайрагдахаас сэргийлсэн</option><option value="7">Шүргэсэн</option>');
          }
      });
          $("#achaa_start").datepicker({
        format: 'yyyy-mm-dd',
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#achaa_end').datepicker('setStartDate', minDate);
    });
    
    $("#achaa_end").datepicker({
        format: 'yyyy-mm-dd',
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#achaa_start').datepicker('setEndDate', minDate);
        });

$("#marshurtuu30").on('click','tr',function(e) { 
 var itag = ($(this).attr('id'));
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#urtuu30_zogsson').val(qwe.stoptime);
                 $('#urtuu30_fault').val(qwe.fault_id);
                $('#urtuu30_stat').val(qwe.fromstation).trigger('change');
                 $('#urtuu30_reason').val(qwe.reason);
    
         });
         
          });
    
}); 


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
<script>
    function ex()
    {
        $("#testTable").table2excel({

            exclude: ".noExl",
            name: "Worksheet Name",
            filename: "Tuuz" //do not include extension
        });
    }
</script>
<script type="text/javascript">
               function calculateTime() {
              var dateVar = ("01/01/2007 " + $("#techno_time").val());
              var dt1=new Date(dateVar);
               var dateVarEnd = ("01/01/2007 " + $("#techno_timefin").val());
              var dt2=new Date(dateVarEnd);
             //create date format          
              var diff =(dt2.getTime() - dt1.getTime()) / 1000;
              diff /= 60;
                   if($('#techno_stat').val() == 84 || $('#techno_stat').val() == 484){
                       diff -=100;
                   }
                   if($('#techno_stat').val() == 76){
                       diff -=95;
                   }
              $("#techno_zogsson").val(diff);     
             
    }
   $("#techno_time ,#techno_timefin, #techno_stat").change(function(){
   calculateTime();

    
    }); 
 function calculateTimemodal() {
              var dateVar = ("01/01/2007 " + $("#techno_timemodal").val());
              var dt1=new Date(dateVar);
               var dateVarEnd = ("01/01/2007 " + $("#techno_timefinmodal").val());
              var dt2=new Date(dateVarEnd);
             //create date format          
              var diff =(dt2.getTime() - dt1.getTime()) / 1000;
              diff /= 60;
     if($('#techno_stat').val() == 84 || $('#techno_stat').val() == 484){
         diff -=100;
     }
     if($('#techno_stat').val() == 76){
         diff -=95;
     }
              $("#techno_zogssonmodal").val(diff);     
             
    }
   $("#techno_timefinmodal, #techno_statmodal, #techno_time").change(function(){
   calculateTimemodal();

    
    }); 

</script>
  <script>

      function getnemelt(itag)
      {

          $('#haluun_id').val(itag);
          $('#ribbonanhaaramj_id').val(itag);
          $('#ribbonhajuu_id').val(itag);
          $('#ribbon205_id').val(itag);
          $('#ribbonurtuu30_id').val(itag);
          $('#ribbontuslamj_id').val(itag);
          $('#ribbonuharsan_id').val(itag);
          $('#ribbontechno_id').val(itag);
          $('#ribbonconst_id').val(itag);
          $('#ribbonhoorond_id').val(itag);
          $('#ribbongraphiluu_id').val(itag);
          $('#ribbongraphbus_id').val(itag);
          $('#ribbonzurchil20_id').val(itag);
          $('#ribbonzurchilhii_id').val(itag);
          $('#ribbonzurchilanhaaramj_id').val(itag);
          $('#ribbonzurchilbuguiwch_id').val(itag);
          $('#ribbonzurchilhurdhemjigch_id').val(itag);
          $('#ribbonzurchilyaraltai_id').val(itag);
          $('#ribbonzurchiloroh_id').val(itag);
          $('#busad_id').val(itag);
          marshattention(itag);
          marshattentioncount(itag);
          marshhoorond(itag);
          marshtechno(itag);
          marshtuslamj(itag);
          marshgraphiluu(itag);
          marshgraphbus(itag);
          marshhajuu(itag);
          marsh205(itag);
          marshconst(itag);
          marshurtuu30(itag);
          marshuharsan(itag);
          marshbuguiwch(itag);
          marshhurdhemjigch(itag);
          marshyaraltai(itag);
          marsh20(itag);
          marshhii(itag);
          marshanhaaramj(itag);
          marshhaluun(itag);
          marshoroh(itag);
          marshbusaduzuulelt(itag);
      }
      function getzurchil(itag)
      {
          $('#ribbonzurchilhurd_id').val(itag);
          $('#ribbonzurchileffect_id').val(itag);
          $('#ribbonzurchil45_id').val(itag);
          $('#ribbonzurchiltormozburuu_id').val(itag);
          $('#ribbonzurchilepkgemtel_id').val(itag);
          $('#ribbonzurchilepkhaasan_id').val(itag);
          $('#ribbonzurchilkran_id').val(itag);
          $('#ribbonzurchiltormoztursh_id').val(itag);

          $('#ribbonzurchilgolhooloi_id').val(itag);
          $('#ribbonzurchilepkajil_id').val(itag);
          $('#ribbonzurchilepkkon_id').val(itag);
          $('#ribbonzurchilduud_id').val(itag);
          $('#ribbonzurchilkilo_id').val(itag);
          $('#ribbonzurchilklub_id').val(itag);
          $('#ribbonzurchiljoloo_id').val(itag);
          $('#ribbonzurchiljolood_id').val(itag);
          $('#ribbonzurchilepkshilj_id').val(itag);
          $('#ribbonzurchilbichlegbudeg_id').val(itag);
          $('#ribbonzurchilbichlegdutuu_id').val(itag);
          $('#ribbonzurchiltsag_id').val(itag);
          $('#ribbonzurchiltuuzzassan_id').val(itag);
          $('#ribbonzurchiltuuzuragdsan_id').val(itag);
          $('#ribbonzurchilbusad_id').val(itag);

          marshhurdhetruulsen(itag);
          marsh45(itag);
          marsheffect(itag);
          marshtormozburuu(itag);
          marshepkgemtel(itag);
          marshepkhaasan(itag);
          marshkran(itag);
          marshtormoztursh(itag);
          marshgolhooloi(itag);
          marshepkajil(itag);
          marshepkkon(itag);
          marshduud(itag);
          marshkilo(itag);
          marshklub(itag);
          marshjoloo(itag);
          marshjolood(itag);
          marshbusad(itag);
          marshepkshilj(itag);
          marshbichlegbudeg(itag);
          marshbichlegdutuu(itag);
          marshtsag(itag);
          marshtuuzzassan(itag);
          marshtuuzuragdsan(itag);

      }
        $('.tuuzzurchil').on('click',function(){
            var itag=$(this).attr('tag');
            marshstat(itag);
            $('#speednumber').val('');
            $('#patchmin').val('00:00');
           $.get('getmarshzut/'+itag,function(data){

             $.each(data,function(i,qwe){

                    $('#tuuzmarsh').val(qwe.marshid);
                    $('#ilchit').val(qwe.zutnumber);
                    $('#tuuzseriname').val(qwe.seriname);
                    $('#tuuzzut').val(qwe.zutguurtype);
                    $('#tuuzseri').val(qwe.sericode);
                    $('.tuuzzutguur').val(qwe.zutguurtype);

         });
          });

           $.get('getmarshbrig/'+itag,function(data){

             $.each(data,function(i,qwe){
                    $('#starttime').val(qwe.arrtime);
                    $('#endtime').val(qwe.deptime);
         });

          });
                      $.get('getmarshselgee/'+itag,function(data){

             $.each(data,function(i,qwe){
                    $('#conzut').val(qwe.parent_id);
                    $('#conzutseri').val(qwe.child_seri);       
         });
       
  
          });
                $.get('getmarshburel/'+itag,function(data){
                    $("#marshburel tbody").empty();    
             $.each(data,function(i,qwe1){
                var gol = parseInt(qwe1.achgol) + parseInt(qwe1.empgol) + parseInt(qwe1.sgolnum);
              var sHtml = "<tr>" +
        "   <td class='m1'>" + qwe1.workid + "</td>" +
        "   <td class='m2'>" + qwe1.splitid + "</td>" +
        "   <td class='m3'>" + qwe1.trainid + "</td>" +
         "   <td class='m3'>" + qwe1.dirtywght + "</td>"+

         "   <td class='m3'>" + gol + "</td>"+
        "</tr>";

        $("#marshburel tbody").append(sHtml);
               
               
         });
         
          });
      $.get('getmarshtuuz/'+itag,function(data){

             $.each(data,function(i,qwe){

                  console.log(qwe);
                 $('#patchmin').val(qwe.patchmin);
                    $('#speednumber').val(qwe.speedcontrollerno);
                     $('.tdhurd').text(qwe.speedcontrollerno); 

         });
               if( $('#speednumber').val().length === 0 ) {
                 $( "#warning" ).text('Хурд хэмжигчийн дугаар хадгална уу');
                 $( "#warning" ).css('color', 'red');
                $( ".fault" ).hide();
                $( ".menuli1" ).addClass("disabled disabledTab");
             
                   };     
                    if( $('#speednumber').val().length !== 0 ) {
                        $( "#warning" ).text('.');
                        $( "#warning" ).css('color', 'black');
                $( ".fault" ).show();
                 $( ".menuli1" ).removeClass("disabled disabledTab");
               
                   };            
  
          });

           $.get('getmarshfirststation/'+itag,function(data){

             $.each(data,function(i,qwe){

                  console.log(qwe);

                    $('#fromstation').val(qwe.statname);
                    $('#fromstationcode').val(qwe.statcode);
                    $('.tdfrom').text(qwe.statname);

         });
       
          });
                  $.get('getmarshlaststation/'+itag,function(data){

             $.each(data,function(i,qwe){

                  console.log(qwe);

                    $('#tostation').val(qwe.statname);
                    $('#tostationcode').val(qwe.statcode);
                    $('.tdto').text(qwe.statname);
         });
       
          });
                            


          });
        $('.nemelt').on('click',function(){
            var itag = $('#tuuzmarsh').val();
            $.get('getmarshtuuz/'+itag,function(data){
                $("#nemelt tbody").empty();
                $.each(data,function(i,qwe){

                    var sHtml = " <tr onclick='getnemelt("+qwe.ribbon_id+")' class='table-row' >" +
                        "   <td class='m1'>" + qwe.route_id+ "</td>" +
                        "   <td class='m2'>" + qwe.mashname + "</td>" +
                        "   <td class='m3'>" + qwe.tuslname + "</td>" +
                        "   <td class='m3'>" + qwe.locserial + "</td>"+
                        "   <td class='m3'>" + qwe.locno + "</td>"+

                        "   <td class='m3'>" + qwe.train_no + "</td>"+
                        "   <td class='m3'>" + qwe.speedcontrollerno + "</td>"+
                        "   <td class='m3'>" + qwe.train_dirtyweight + "</td>"+
                        "   <td class='m3'>" + qwe.train_gol + "</td>"+
                        "   <td class='m3'>" + qwe.fromstat + "-" + qwe.tostat + "</td>"+
                        "   <td class='m3'>" + qwe.starttime + "</td>"+
                        "   <td class='m3'>" + qwe.endtime + "</td>"+

                        "</tr>";

                    $("#nemelt tbody").append(sHtml);


                });

            });
        });
      $('.zurchils').on('click',function(){
          var itag = $('#tuuzmarsh').val();
          $.get('getmarshtuuz/'+itag,function(data){
              $("#zurch tbody").empty();
              $.each(data,function(i,qwe){

                  var sHtml = " <tr onclick='getzurchil("+qwe.ribbon_id+")' class='table-row' >" +
                      "   <td class='m1'>" + qwe.route_id+ "</td>" +
                      "   <td class='m2'>" + qwe.mashname + "</td>" +
                      "   <td class='m3'>" + qwe.tuslname + "</td>" +
                      "   <td class='m3'>" + qwe.locserial + "</td>"+
                      "   <td class='m3'>" + qwe.locno + "</td>"+
                      "   <td class='m3'>" + qwe.train_no + "</td>"+
                      "   <td class='m3'>" + qwe.speedcontrollerno + "</td>"+


                      "   <td class='m3'>" + qwe.train_dirtyweight + "</td>"+
                      "   <td class='m3'>" + qwe.train_gol + "</td>"+
                      "   <td class='m3'>" + qwe.fromstat + "-" + qwe.tostat + "</td>"+
                      "   <td class='m3'>" + qwe.starttime + "</td>"+
                      "   <td class='m3'>" + qwe.endtime + "</td>"+

                      "</tr>";

                  $("#zurch tbody").append(sHtml);


              });

          });
      });
        $('#formribbon').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addribbon',
            data: $('form#formribbon').serialize(),
         success: function(result){

          alert('Тууз бүртгэгдлээ');//this will alert you the last_id
        $( ".fault" ).show();

         $( "#warning" ).text('.');
                $( "#warning" ).css('color', 'black');
                $( ".fault" ).show();
                 $( ".menuli1" ).removeClass("disabled disabledTab");
               
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })
  
    });
   $('#formanhaaramj').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addanhaaramj',
            data: $('form#formanhaaramj').serialize(),
         success: function(result){
          alert('Анхаарамж бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonanhaaramj_id').val();
          var ribbon = $('#ribbon_id').val();
          marshattention(itag);
          marshattentioncount(itag);
             $('#anhaaramj_from').val('');
             $('#anhaaramj_to').val('');
             $('#anhaaramj').val(1).trigger('change');
                           
        },
   error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })
 
    });
 
          $('#form205').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'add205',
            data: $('form#form205').serialize(),
         success: function(result){
          alert('20.5км цаг/хурд бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbon205_id').val();
          marsh205(itag);
             $('#205_from').val('');
             $('#205_to').val('');
             $('#205_zogsson').val('');
             $('#205_speed').val('');
             $('#205_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
        
          $('#formurtuu30').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addurtuu30',
            data: $('form#formurtuu30').serialize(),
         success: function(result){
          alert('Өртөөнд 30 мин илүү зогсолт бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbonurtuu30_id').val();
          marshurtuu30(itag);
             $('#urtuu30_stat').val('1').trigger('change');
             $('#urtuu30_zogsson').val('');
             $('#urtuu30_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
      

          $('#formtechno').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addtechno',
            data: $('form#formtechno').serialize(),
         success: function(result){
          alert('Технологит илүү зогсолт бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbontechno_id').val();
          marshtechno(itag);
             $('#techno_stat').val('1').trigger('change');
             $('#techno_timefin').val('');
             $('#techno_time').val('');
             $('#techno_zogsson').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
                  
          $('#formconst').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addconst',
            data: $('form#formconst').serialize(),
         success: function(result){
          alert('Тогтсон хурданд хүрээгүй бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbonconst_id').val();
          marshconst(itag);
             $('#const_from').val('');
             $('#const_to').val('');
             $('#const_speed').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });

                       $('#formgraphiluu').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addgraphiluu',
            data: $('form#formgraphiluu').serialize(),
         success: function(result){
          alert('Графикаас илүү зогсолт бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbongraphiluu_id').val();
          marshgraphiluu(itag);
             $('#graphiluu_stat').val('1').trigger('change');
             $('#graphiluu_time').val('');
             $('#graphiluu_zogsson').val('');
             $('#graphiluu_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
  
                       $('#formgraphbus').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addgraphbus',
            data: $('form#formgraphbus').serialize(),
         success: function(result){
          alert('Графикийн бус зогсолт бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbongraphbus_id').val();
          marshgraphbus(itag);
             $('#graphbus_stat').val('1').trigger('change');
             $('#graphbus_time').val('');
             $('#graphbus_zogsson').val('');
             $('#graphbus_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });


               $('#formhoorond').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addhoorond',
            data: $('form#formhoorond').serialize(),
         success: function(result){
          alert('Хоорондын зам бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbonhoorond_id').val();
          marshhoorond(itag);
             $('#hoorond_stat').val('');
             $('#hoorond_min').val('');
             $('#hoorond_time').val('');
             $('#hoorond_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
      $('#formtuslamj').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addtuslamj',
            data: $('form#formtuslamj').serialize(),
         success: function(result){
          alert('Тусламж бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbontuslamj_id').val();
          marshtuslamj(itag);
             $('#tuslamj_from').val('');
             $('#tuslamj_to').val('');
             $('#tuslamj_type').val('1').trigger('change');
             $('#tuslamj_time').val('');
             $('#tuslamj_min').val('');
             $('#tuslamj_reason').val('');
        },
  error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });

         $('#formhajuu').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addhajuu',
            data: $('form#formhajuu').serialize(),
         success: function(result){
          alert('Хажуугийн зам бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbonhajuu_id').val();
            marshhajuu(itag);
             $('#hajuu_urtuu').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
            $('#formuharsan').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'adduharsan',
            data: $('form#formuharsan').serialize(),
         success: function(result){
          alert('Ухарсан зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonuharsan_id').val();
            marshuharsan(itag);
             $('#uharsan_stat').val('');
             $('#uharsan_time').val('');
             $('#uharsan_speed').val('');
             $('#uharsan_km').val('');
        },
   error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })
   
    });
                      $('#formhaluunzogsolt').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addhaluunzogsolt',
            data: $('form#formhaluunzogsolt').serialize(),
         success: function(result){
          alert('Халуун зогсолт бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#haluun_id').val();
           marshhaluun(itag);
             $('#haluun_time').val('');
             $('#haluun_stoptime').val('');
        },
   error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })
   
    });
        $('#formzurchilhurd').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilhurd',
            data: $('form#formzurchilhurd').serialize(),
         success: function(result){
          alert('Хурд хэтрүүлсэн зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchilhurd_id').val();
            marshhurdhetruulsen(itag);
             $('#zurchilhurd_from').val('');
             $('#zurchilhurd_tom').val('');
             $('#zurchilhurd_speed').val('');
             $('#zurchilhurd_time').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })
   
    });
                $('#formzurchil45').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchil45',
            data: $('form#formzurchil45').serialize(),
         success: function(result){
          alert('ВУ-45 зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchil45_id').val();
            marsh45(itag);
             $('#zurchil45_stat').val('1').trigger('change');
             $('#zurchil45_time').val('');
             $('#zurchil45_minute').val('');
             $('#zurchil45_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })
  
    });
        $('#formzurchileffect').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchileffect',
            data: $('form#formzurchileffect').serialize(),
         success: function(result){
          alert('Эффектийн зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchileffect_id').val();
            marsheffect(itag);
             $('#zurchileffect_stat').val('1').trigger('change');
             $('#zurchileffect_time').val('');
             $('#zurchileffect_minute').val('');
             $('#zurchileffect_constkilo').val('');
             $('#zurchileffect_constspeed').val('');
             $('#zurchileffect_faultkilo').val('');
             $('#zurchileffect_faultspeed').val('');

         },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
 $('#formzurchiltormozburuu').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchiltormozburuu',
            data: $('form#formzurchiltormozburuu').serialize(),
         success: function(result){
          alert('Тормоз буруу зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchiltormozburuu_id').val();
            marshtormozburuu(itag);
             $('#zurchiltormozburuu_stat').val('');
             $('#zurchiltormozburuu_time').val('');
             $('#zurchiltormozburuu_kilo').val('');
             $('#zurchiltormozburuu_akt').val('');
             $('#zurchiltormozburuu_type').val('1').trigger('change');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
 $('#formzurchilbuguiwch').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilbuguiwch',
            data: $('form#formzurchilbuguiwch').serialize(),
         success: function(result){
          alert('Бугуйвчны зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchilbuguiwch_id').val();
            marshbuguiwch(itag);
             $('#zurchilbuguiwch_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
  $('#formzurchilepkhaasan').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilepkhaasan',
            data: $('form#formzurchilepkhaasan').serialize(),
         success: function(result){
          alert('ЭПК хаасан зөрчил бүртгэгдлээ');//this will alert you the last_id
           var itag = $('#ribbonzurchilepkhaasan_id').val();
         marshepkhaasan(itag);
             $('#zurchilepkhaasan_stat').val('');
             $('#zurchilepkhaasan_time').val('');
             $('#zurchilepkhaasan_akt').val('');
             $('#zurchilepkhaasan_kilo').val('');
             $('#ribbonzurchilepkhaasan_type').val('1').trigger('change');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
    $('#formzurchilepkgemtel').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilepkgemtel',
            data: $('form#formzurchilepkgemtel').serialize(),
         success: function(result){
          alert('ЭПК гэмтэлтэй зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilepkgemtel_id').val();
            marshepkgemtel(itag);
             $('#zurchilepkgemtel_stat').val('');
             $('#zurchilepkgemtel_time').val('');
             $('#zurchilepkgemtel_tushno').val('');
             $('#zurchilepkgemtel_tushugsun').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
        $('#formzurchilepkshilj').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilepkshilj',
            data: $('form#formzurchilepkshilj').serialize(),
         success: function(result){
          alert('ЭПК шилжүүлээгүй зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilepkshilj_id').val();
            marshepkshilj(itag);
             $('#zurchilepkshilj_stat').val('1').trigger('change');
             $('#zurchilepkshilj_time').val('');
             $('#zurchilepkshilj_reason').val('');
             $('#zurchilepkshilj_minute').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
        $('#formzurchilkran').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilkran',
            data: $('form#formzurchilkran').serialize(),
         success: function(result){
          alert('Кран шалгаагүй зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchilkran_id').val();
          marshkran(itag);
             $('#zurchilkran_stat').val('1').trigger('change');
             $('#zurchilkran_type').val('15').trigger('change');
             $('#zurchilkran_time').val('');

         },
  error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
                $('#formzurchiltormoztursh').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchiltormoztursh',
            data: $('form#formzurchiltormoztursh').serialize(),
         success: function(result){
          alert('Тормоз туршаагүй зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchiltormoztursh_id').val();
            marshtormoztursh(itag);
             $('#zurchiltormoztursh_type').val('50').trigger('change');
             $('#zurchiltormoztursh_time').val('');
             $('#zurchiloroh_min').val('');
             $('#zurchiltormoztursh_tursh').val('1');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
        $('#formzurchiloroh').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchiloroh',
            data: $('form#formzurchiloroh').serialize(),
         success: function(result){
          alert('Орох дохионы зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchiloroh_id').val();
          marshoroh(itag);
             $('#zurchiloroh_stat').val('1').trigger('change');
             $('#zurchiloroh_time').val('');
             $('#zurchiloroh_min').val('');
             $('#zurchiloroh_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
                $('#formzurchilhurdhemjigch').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilhurdhemjigch',
            data: $('form#formzurchilhurdhemjigch').serialize(),
         success: function(result){
          alert('Хурд хэмжигч зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchilhurdhemjigch_id').val();
          marshhurdhemjigch(itag);
             $('#zurchilhurdhemjigch_type').val('1').trigger('change');
             $('#zurchilhurdhemjigch_stat').val('');
             $('#zurchilhurdhemjigch_kilo').val('');
             $('#zurchilhurdhemjigch_time').val('');
             $('#zurchilhurdhemjigch_akt').val('1').trigger('change');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
             $('#formzurchilyaraltai').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilyaraltai',
            data: $('form#formzurchilyaraltai').serialize(),
         success: function(result){
          alert('Яаралтай тормоз зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchilyaraltai_id').val();
          marshyaraltai(itag);
             $('#zurchilyaraltai_stat').val('');
             $('#zurchilyaraltai_time').val('');
             $('#zurchilyaraltai_zogsson').val('');
             $('#zurchilyaraltai_attack').val('1');
             $('#zurchilyaraltai_type').val('35').trigger('change');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
    $('#formzurchilepkajil').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilepkajil',
            data: $('form#formzurchilepkajil').serialize(),
         success: function(result){
          alert('ЭПК зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchilepkajil_id').val();
            marshepkajil(itag);
             $('#zurchilepkajil_stat').val('');
             $('#zurchilepkajil_time').val('');
             $('#zurchilepkajil_isstop').val('');
             $('#zurchilepkajil_akt').val('1');
             $('#zurchilepkajil_zogsson').val('');

         },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }        })

    });
      $('#formzurchilepkkon').submit(function(event){
          event.preventDefault();

          $.ajax({
              type: 'POST',
              url: 'addzurchilepkkon',
              data: $('form#formzurchilepkkon').serialize(),
              success: function(result){
                  alert('ЭПК кон бүртгэгдлээ');//this will alert you the last_id
                  var itag = $('#ribbonzurchilepkkon_id').val();
                  marshepkkon(itag);
                  $('#zurchilepkkon_stat').val('');
                  $('#zurchilepkkon_time').val('');
                  $('#zurchilepkkon_isstop').val('');
                  $('#zurchilepkkon_akt').val('1');
                  $('#zurchilepkkon_zogsson').val('');

              },
              error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }        })

      });
        $('#formzurchilgolhooloi').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilgolhooloi',
            data: $('form#formzurchilgolhooloi').serialize(),
         success: function(result){
          alert('Гол хоолой тааруулаагүй зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchilgolhooloi_id').val();
            marshgolhooloi(itag);
             $('#zurchilgolhooloi_stat').val('1').trigger('change');
             $('#zurchilgolhooloi_type').val('17').trigger('change');
             $('#zurchilgolhooloi_time').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
              $('#formzurchil20').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchil20',
            data: $('form#formzurchil20').serialize(),
         success: function(result){
          alert('20 минутаас дээш зөрчил бүртгэгдлээ');//this will alert you the last_id
          var itag = $('#ribbonzurchil20_id').val();
            marsh20(itag);
             $('#zurchil20_stat').val('1').trigger('change');
             $('#zurchil20_zogsson').val('');
             $('#zurchil20_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
       $('#formzurchilhii').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilhii',
            data: $('form#formzurchilhii').serialize(),
         success: function(result){
          alert('Хий эргэсэн зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilhii_id').val();
            marshhii(itag);
             $('#zurchilhii_stat').val('');
             $('#zurchilhii_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
            $('#formzurchilanhaaramj').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilanhaaramj',
            data: $('form#formzurchilanhaaramj').serialize(),
         success: function(result){
          alert('Анхаарамжаар бууж суусан зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilanhaaramj_id').val();
            marshanhaaramj(itag);
             $('#zurchilanhaaramj_stat').val('');
             $('#zurchilanhaaramj_zogsson').val('');
             $('#zurchilanhaaramj_tushaalner').val('');
             $('#zurchilanhaaramj_tushaal').val('');
             $('#zurchilanhaaramj_reason').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });

       $('#formzurchilduud').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilduud',
            data: $('form#formzurchilduud').serialize(),
         success: function(result){
          alert('Дуут дохио өгөөгүй зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilduud_id').val();
            marshduud(itag);
             $('#zurchilduud_stat').val('1').trigger('change');
             $('#zurchilduud_type').val('10').trigger('change');
             $('#zurchilduud_time').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
              $('#formzurchilklub').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilklub',
            data: $('form#formzurchilklub').serialize(),
         success: function(result){
          alert('Клуб у зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilklub_id').val();
            marshklub(itag);
             $('#zurchilklub_from').val('');
             $('#zurchilklub_to').val('');
             $('#zurchilklub_time').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
                     $('#formzurchilkilo').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilkilo',
            data: $('form#formzurchilkilo').serialize(),
         success: function(result){
          alert('Километр буруу зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilkilo_id').val();
            marshkilo(itag);
             $('#zurchilkilo_from').val('');
             $('#zurchilkilo_to').val('');
             $('#zurchilkilo_time').val('');
             $('#zurchilkilo_km').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
      $('#formzurchiljoloo').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchiljoloo',
            data: $('form#formzurchiljoloo').serialize(),
         success: function(result){
          alert('Жолоодлогын бариул зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchiljoloo_id').val();
            marshjoloo(itag);
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
      $('#formzurchiljolood').submit(function(event){
          event.preventDefault();

          $.ajax({
              type: 'POST',
              url: 'addzurchiljolood',
              data: $('form#formzurchiljolood').serialize(),
              success: function(result){
                  alert('Жолоодлогын бариул зөрчил бүртгэгдлээ');//this will alert you the last_id
                  var itag = $('#ribbonzurchiljolood_id').val();
                  marshjolood(itag);
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
          })

      });
           $('#formzurchilbichlegbudeg').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilbichlegbudeg',
            data: $('form#formzurchilbichlegbudeg').serialize(),
         success: function(result){
          alert('Бичлэг бүдэг зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilbichlegbudeg_id').val();
            marshbichlegbudeg(itag);
             $('#zurchilbichlegbudeg_stat').val('');
             $('#zurchilbichlegbudeg_kilo').val('');
             $('#zurchilbichlegbudeg_time').val('');
             $('#zurchilbichlegbudeg_type').val('1').trigger('change');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
                      $('#formzurchilbichlegdutuu').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilbichlegdutuu',
            data: $('form#formzurchilbichlegdutuu').serialize(),
         success: function(result){
          alert('Бичлэг дутуу зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilbichlegdutuu_id').val();
            marshbichlegdutuu(itag);
             $('#zurchilbichlegdutuu_stat').val('');
             $('#zurchilbichlegdutuu_time').val('');
             $('#zurchilbichlegdutuu_kilo').val('');
             $('#zurchilbichlegdutuu_type').val('1').trigger('change');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
          $('#formzurchiltuuzzassan').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchiltuuzzassan',
            data: $('form#formzurchiltuuzzassan').serialize(),
         success: function(result){
          alert('Тууз зассан зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchiltuuzzassan_id').val();
            marshtuuzzassan(itag);
             $('#zurchiltuuzzassan_type').val('1').trigger('change');
             $('#zurchiltuuzzassan_time').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
               $('#formzurchiltuuzuragdsan').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchiltuuzuragdsan',
            data: $('form#formzurchiltuuzuragdsan').serialize(),
         success: function(result){
          alert('Тууз урагдуулсан зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchiltuuzuragdsan_id').val();
            marshtuuzuragdsan(itag);
             $('#zurchiltuuzuragdsan_stat').val('');
             $('#zurchiltuuzuragdsan_time').val('');
             $('#zurchiltuuzuragdsan_kilo').val('');
             $('#zurchiltuuzuragdsan_type').val('1').trigger('change');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
          $('#formzurchiltsag').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchiltsag',
            data: $('form#formzurchiltsag').serialize(),
         success: function(result){
          alert('Цаг зогссон зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchiltsag_id').val();
            marshtsag(itag);
             $('#zurchiltsag_stat').val('');
             $('#zurchiltsag_kilo').val('');
             $('#zurchiltsag_time').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
                               $('#formzurchilbusad').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzurchilbusad',
            data: $('form#formzurchilbusad').serialize(),
         success: function(result){
          alert('Бусад зөрчил бүртгэгдлээ');//this will alert you the last_id
            var itag = $('#ribbonzurchilbusad_id').val();
            marshbusad(itag);
             $('#ribbonzurchilbusad_reasonmodal').val('');
        },
 error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
      $('#formbusaduzuulelt').submit(function(event){
          event.preventDefault();

          $.ajax({
              type: 'POST',
              url: 'addbusaduzuulelt',
              data: $('form#formbusaduzuulelt').serialize(),
              success: function(result){
                  alert('Бусад зөрчил бүртгэгдлээ');//this will alert you the last_id
                  var itag = $('#busad_id').val();
                  marshbusaduzuulelt(itag);
                  $('#busad_reason').val('');
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
          })

      });

      </script>