<?php

namespace App\Http\Controllers;
use App\AttentionSpeed;
use App\LocSerial;
use App\Station;
use App\Broketype;
use App\Ribbon;
use App\Attention;
use App\Fault;
use App\Selgee;
use App\FaultDet;
use App\Machinist;
use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class AchaaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $machinist= 0; 
        $tusmachinist= 0;
        $devter= 0;
        $startdate= Carbon::today()->subDays(2)->toDateString();
    
        $enddate=  Carbon::today()->toDateString();
        $route= Input::get('achaa_route');
        $seri= 0;
           if (!Cache::has('Station')) 
        {
        $v = Cache::remember('Station', 2, function() {
                 return Station::orderby('statfullname')->get();
            });
        }
              if (!Cache::has('Machinist')) 
        {
        $v = Cache::remember('Machinist', 2, function() {
          $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from V_MASHINCH t where t.tushcode=1 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
        }
        if (!Cache::has('TusMachinist')) 
        {
        $v = Cache::remember('TusMachinist', 2, function() {
                $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from V_MASHINCH t where t.tushcode=2 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
        }
        $speed=AttentionSpeed::all();
        $locserial=LocSerial::all();
        $stat=Station::all();
        /*$stat=DB::select("select statcode, n''||statfullname from ZUTGUUR.STATIONS");*/
        $tapetype=Broketype::where('broke_type', 1 )->get();
        $reasontype=Broketype::where('broke_type', 5 )->get();
        $broketype=Broketype::where('broke_type', 3 )->get();  
        $taketype=Broketype::where('broke_type', 2 )->get();
        $emertype=Broketype::where('broke_type', 4 )->get();

        $achaa=DB::select("select * from MARSHRUTACHAA t where t.depocode = ".Auth::user()->depo_id. " order by t.arrtime desc");



        return view('devter.achaa')->with(['speed'=>$speed,'locserial'=>$locserial,'stat'=>$stat,'tapetype'=>$tapetype,'reasontype'=>$reasontype,'broketype'=>$broketype,'taketype'=>$taketype,'achaa'=>$achaa, 'emertype' => $emertype, 'machinist' => $machinist, 'startdate' =>$startdate, 'enddate' => $enddate, 'tusmachinist' => $tusmachinist,'seri' => $seri, 'route' => $route, 'devter' => $devter]);
    }

     public function autocomplete()
    {

        $key=Input::get('conzut');
        $data = DB::table('ZUTGUUR.ZUTGUUR')->select("zutnumber as name")->where("zutnumber","LIKE","%{$key}%")->get();
        return response()->json($data);

    }
     public function search()
    {  
      
        $query = "";
        $date = "";
        // Sets the parameters from the get request to the variables.
        $machinist= Input::get('achaa_mach'); 
        $tusmachinist= Input::get('achaa_tus'); 
        $startdate= Input::get('achaa_start');
        $enddate= Input::get('achaa_end');
        $route= Input::get('achaa_route');
        $seri= Input::get('achaa_seri');
        $devter= Input::get('devter_id');
        $fromstat= Input::get('from_stat');
        $tostat= Input::get('to_stat');
        $speed=AttentionSpeed::all();
        $locserial=LocSerial::all();
        $stat=Station::all();
        $tapetype=Broketype::where('broke_type', 1 )->get();
        $reasontype=Broketype::where('broke_type', 5 )->get();
        $broketype=Broketype::where('broke_type', 3 )->get();  
        $taketype=Broketype::where('broke_type', 2 )->get();
        $emertype=Broketype::where('broke_type', 4 )->get();
         if (!Cache::has('Station')) 
        {
        $v = Cache::remember('Station', 2, function() {
                 return Station::orderby('statfullname')->get();
            });
        }
      
              if (!Cache::has('Machinist')) 
        {
        $v = Cache::remember('Machinist', 2, function() {
          $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from V_MASHINCH t where t.tushcode=1 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
        }
        if (!Cache::has('TusMachinist')) 
        {
        $v = Cache::remember('TusMachinist', 2, function() {
                $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from V_MASHINCH t where t.tushcode=2 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
        }
         if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $date.=" where t.arrtime between '".$startdate."' and '".$enddate." 23:59:59'";

         }
         else 
         {
          $date.=" ";
  
         }
        if ($devter!=NULL && $devter !=0) {
            if($devter == 1){
                $query.=" and SUBSTR(r.workid,1,1) not in (1,5) ";
            }
            if($devter == 2){
                $query.=" and SUBSTR(r.workid,1,1) = 1";
            }
            if($devter == 3){
                $query.=" and SUBSTR(r.workid,1,1) = 5";
            }
        }
        else
        {
            $query.=" ";
        }
        if ($machinist!=NULL && $machinist !=0) {
             $query.=" and q1.mashcode = '".$machinist."'";
         }
         else 
         {
             $query.=" ";
         }
        if ($fromstat!=NULL && $fromstat !=0) {
            $query.=" and r.fromstation = '".$fromstat."'";
        }
        else
        {
            $query.=" ";
        }
        if ($tostat!=NULL && $tostat !=0) {
            $query.=" and r.tostation = '".$tostat."'";
        }
        else
        {
            $query.=" ";
        }
          if ($tusmachinist !=0 && $tusmachinist!=NULL) {
             $query.=" and q1.tuslcode= '".$tusmachinist."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($route !=0 && $route!=NULL) {
             $query.=" and q1.marshid like '%".$route."%'";
         }
         else 
         {
             $query.=" ";
         }
        
         if ($seri!=NULL && $seri!=0) {
             $query.=" and q3.sericode = '".$seri."'";
         }
         else 
         {
             $query.=" ";
         }


                $achaa=DB::select("SELECT
   DISTINCT q1.MARSHYEAR,q1.MARSHMONTH,q1.DEPOCODE,q1.MARSHID,q1.MASHCODE,UNISTR(REPLACE(REPLACE(REPLACE(ASCIISTR(q1.MASHNAME),'\04E9','\0435'),'\04AF','v'),'\04E8','\0415')) as MASHNAME ,q1.TUSLCODE , UNISTR(REPLACE(REPLACE(REPLACE(ASCIISTR(q1.TUSLNAME),'\04E9','\0435'),'\04AF','v'),'\04E8','\0415')) as TUSLNAME,q1.ARRTIME,q1.DEPTIME, q3.seriname, q3.sericode, r.speedcontrollerno, r.patchmin, r.translator_id,v.name,  r.translate_date, r.train_no, q1.brigcode, f.fault_count, q3.zutnumber, r.train_dirtyweight, r.train_gol, r.train_cleanweight, SUBSTR(r.workid,1,1) as workid, r.fromstation, r.tostation, r.tostat, r.fromstat
FROM
    (select  * from ZUTGUUR.MARSHBRIG t  ".$date."  order by arrtime desc) q1
   INNER JOIN
    (select seriname,sericode, marshid, marshyear, marshmonth,zutnumber from ZUTGUUR.MARSHZUT t ) q3 on q3.marshid = q1.marshid and q3.marshyear=q1.marshyear and q3.marshmonth = q1.marshmonth
        LEFT JOIN V_Ribbon r on r.route_id=q1.marshid 
        LEFT JOIN Users v on v.id=r.translator_id
        LEFT JOIN (select ribbon_id, count(ribbon_id) as fault_count from fault k, fault_detail i  where i.fault_detail_id=k.fault_no and i.fault_type=2 group by ribbon_id) f on f.ribbon_id= r.ribbon_id 
        where q1.depocode=".Auth::user()->depo_id. " " .$query. " order by q1.arrtime desc");
      
        return view('devter.achaa')->with(['speed'=>$speed,'locserial'=>$locserial,'stat'=>$stat,'tapetype'=>$tapetype,'reasontype'=>$reasontype,'broketype'=>$broketype,'taketype'=>$taketype,'achaa'=>$achaa, 'emertype' => $emertype, 'machinist' => $machinist, 'startdate' =>$startdate, 'enddate' => $enddate, 'tusmachinist' => $tusmachinist,'seri' => $seri, 'route' => $route, 'devter' => $devter, 'fromstat' => $fromstat, 'tostat' => $tostat]);

    }

         public function addanhaaramj()
    {
            $anhaaramj = new Attention;
            $anhaaramj->ribbon_id = Request::input('ribbonanhaaramj_id');
            $anhaaramj->fromst = Request::input('anhaaramj_from');
            $anhaaramj->tost = Request::input('anhaaramj_to');
            $anhaaramj->speed = Request::input('anhaaramj');
            $anhaaramj->save();
            activity()->performedOn($anhaaramj)->log('Anhaaramj added');
  
    }
    public function destroyanhaaramj($id)
    {
        Attention::where('attention_id', '=', $id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
        activity()->log('attention deleted');

    }
    public function updateanhaaramj()
    {

        $department = DB::table('Attention')
        ->where('attention_id', Request::input('anhaaramj_fault'))->update(['fromst' =>Request::input('anhaaramj_frommodal') ,'tost' =>Request::input('anhaaramj_tomodal'),'speed' =>Request::input('anhaaramjspeed'),'updated_at' => Carbon::now()]);


        return response()->json([
            'success' => 'Record has been updated successfully!'
        ]);
        activity()->log('anhaaramj updated');

    }
            public function addhajuu()
    {

            $hajuu = new Fault;
            $hajuu->ribbon_id = Request::input('ribbonhajuu_id');
            $hajuu->fault_from = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('hajuu_urtuu')))));

            $hajuu->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('hajuu_urtuu')))));
            $hajuu->is_ribbon = Request::input('tuuzzut1');
            $hajuu->fault_no =1;
            $hajuu->save();
            activity()->performedOn($hajuu)->log('Hajuugiin zam added');
    }
    public function destroyhajuu($id)
    {
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('Hajuu zam deleted');
       
    }
        public function updatehajuu()
    {
         $department = DB::table('V_FAULT')
                ->where('fault_id', Request::input('hajuu_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('hajuu_fault'))->update(['fault_from' =>Request::input('hajuu_urtuumodal') ,'fault_to' =>Request::input('hajuu_urtuumodal') ,'updated_at' => Carbon::now()]);
         }
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('Hajuu zam deleted');
       
    }
     public function destroyhoorond($id)
    {

        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('Hoorondin zam deleted');
       
    }
        public function updatehoorond()
    {
         $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('hoorond_fault'))->exists();
        if ($department == true) {
                 $department = DB::table('Fault')
                ->where('fault_id', Request::input('hoorond_fault'))->update(['fault_from' =>Request::input('hoorond_statmodal') ,'fault_to' =>Request::input('hoorond_statmodal') ,'fault_time' => date("H:i:s", strtotime(Request::input('hoorond_timemodal'))) ,'updated_at' => Carbon::now()]);
                  $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('hoorond_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('hoorond_minmodal'))),'reason' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('hoorond_reasonmodal'))))),'updated_at' => Carbon::now()]);
         }
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('Hajuu zam deleted');
       
    }
                public function addhoorond()
    {
            $hoorond = new Fault;
            $hoorond->ribbon_id = Request::input('ribbonhoorond_id');
            $hoorond->fault_from = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('hoorond_stat')))));
            $hoorond->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('hoorond_stat')))));
            $hoorond->fault_time = date("H:i:s", strtotime(Request::input('hoorond_time')));
            $hoorond->is_ribbon = Request::input('tuuzzut33');
            $hoorond->fault_no =2;

            $hoorond->save();

            $faultmax = Fault::max('fault_id');
            $hooronddet = new FaultDet;
            $hooronddet->fault_id = $faultmax;
            $hooronddet->stoptime = date("H:i:s", strtotime(Request::input('hoorond_min')));
            $hooronddet->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('hoorond_reason')))));
            $hooronddet->save();
            activity()->performedOn($hoorond)->log('Hoorondin zam added');
    }

    public function addtuslamj()
    {        
             $tuslamj = new Fault;
            $tuslamj->ribbon_id = Request::input('ribbontuslamj_id');
            $tuslamj->fault_from = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('tuslamj_from')))));
            $tuslamj->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('tuslamj_to')))));
            $tuslamj->is_ribbon = Request::input('tuuzzut2');
            $tuslamj->fault_time = date("H:i:s", strtotime(Request::input('tuslamj_time')));
            $tuslamj->fault_no = Request::input('tuslamj_type');
            $tuslamj->save();
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->stoptime = date("H:i:s", strtotime(Request::input('tuslamj_min')));
            $det->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('tuslamj_reason')))));
            $det->save();
            activity()->performedOn($tuslamj)->log('Tuslamj added');

}
    public function destroytuslamj($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('tuslamj deleted');
       
    }
        public function updatetuslamj()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('tuslamj_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('tuslamj_fault'))->update(['fault_from' =>Request::input('tuslamj_statmodal') ,'fault_to' =>Request::input('tuslamj_statmodal'),'fault_no' =>Request::input('tuslamj_typemodal') ,'fault_time' => date("H:i:s", strtotime(Request::input('tuslamj_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('tuslamj_fault'))->update(['stoptime' => (Request::input('tuslamj_minmodal')),'updated_at' => Carbon::now(),'reason' => (str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('tuslamj_reasonmodal'))))))]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('Uharsan updated');
       
    }
      public function addgraphiluu()
    {
            $graphiluu = new Fault;
            $graphiluu->ribbon_id = Request::input('ribbongraphiluu_id');
            $graphiluu->fromstation = Request::input('graphiluu_stat');
            $graphiluu->tostation = Request::input('graphiluu_stat');
            $graphiluu->is_ribbon = Request::input('tuuzzut34');
            $graphiluu->fault_time = date("H:i:s", strtotime(Request::input('graphiluu_time')));
            $graphiluu->fault_no = 62;
            $graphiluu->save();

            $faultmax = Fault::max('fault_id');
            $graphiluudet = new FaultDet;
            $graphiluudet->fault_id = $faultmax;
            $graphiluudet->stoptime = date("H:i:s", strtotime(Request::input('graphiluu_zogsson')));
            $graphiluudet->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('graphiluu_reason')))));
            $graphiluudet->save();
            activity()->performedOn($graphiluu)->log('Graph iluu added');
  
    }
    public function destroygraphiluu($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('graphiluu deleted');
       
    }
        public function updategraphiluu()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('graphiluu_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('graphiluu_fault'))->update(['fromstation' =>Request::input('graphiluu_statmodal') ,'tostation' =>Request::input('graphiluu_statmodal'),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('graphiluu_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('graphiluu_zogssonmodal'))),'reason' => str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('graphiluu_reason'))))),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('graphiluu updated');
       
    }
            public function addgraphbus()
    {

            $graphbus = new Fault;
            $graphbus->ribbon_id = Request::input('ribbongraphbus_id');
            $graphbus->fromstation = Request::input('graphbus_stat');
            $graphbus->tostation = Request::input('graphbus_stat');
            $graphbus->is_ribbon = Request::input('tuuzzut35');
            $graphbus->fault_time = date("H:i:s", strtotime(Request::input('graphbus_time')));
            $graphbus->fault_no = 61;

            $graphbus->save();

            $faultmax = Fault::max('fault_id');
            $graphbusdet = new FaultDet;
            $graphbusdet->fault_id = $faultmax;
            $graphbusdet->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('graphbus_reason')))));
            $graphbusdet->stoptime = date("H:i:s", strtotime(Request::input('graphbus_zogsson')));
     
            $graphbusdet->save();
            activity()->performedOn($graphbus)->log('Graph bus added');
  
    }
     public function destroygraphbus($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('graphbus deleted');
       
    }
        public function updategraphbus()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('graphbus_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('graphbus_fault'))->update(['fromstation' =>Request::input('graphbus_statmodal') ,'tostation' =>Request::input('graphbus_statmodal'),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('graphbus_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('graphbus_zogssonmodal'))),'reason' => str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('graphbus_reason'))))),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('graphbus updated');
       
    }
             public function addribbon()
    {

           $department = DB::table('Ribbon')
                ->where('route_id', Request::input('tuuzmarsh'))->exists();
        if ($department == true) {
                $department = DB::table('Ribbon')
                ->where('route_id', Request::input('tuuzmarsh'))->update(['patchmin_speed' =>Request::input('patch_type') ,'speedcontrollerno' =>Request::input('speednumber') ,'patchmin' =>date("H:i:s", strtotime(Request::input('patchmin'))) ,  'update_who' => Auth::user()->id,'updated_at' => Carbon::now()]);
         }
         else 
         {
             $stat = DB::table('V_MARSHBUREL')->where('marshid', '=',Request::input('tuuzmarsh'))->where('depocode', '=', Auth::user()->depo_id)->get();

             foreach ($stat as $row) {
                 $gol =$row->sgolnum + $row->achgol + $row->empgol;
                     $ribbon = new Ribbon;
                 $ribbon->route_id = Request::input('tuuzmarsh');
                 $ribbon->depo_id = Auth::user()->depo_id;
                 $ribbon->speedcontrollerno = Request::input('speednumber');
                 $ribbon->zutnumber = Request::input('ilchit');
                 $ribbon->locserial= Request::input('tuuzseriname');
                 $ribbon->locno= Request::input('tuuzseri');
                 $ribbon->is_ribbon= Request::input('tuuzzut');
                 $ribbon->starttime= Request::input('starttime');
                 $ribbon->endtime= Request::input('endtime');
                 $ribbon->fromstation = $row->stat1code;
                 $ribbon->tostation = $row->stat2code;
                 $ribbon->train_no= $row->trainid;
                 $ribbon->split_id= $row->splitid;
                 $ribbon->train_cleanweight= $row->cleanwght;
                 $ribbon->train_dirtyweight=$row->dirtywght;
                 $ribbon->train_gol= $gol;
                 $ribbon->workid= $row->workid;
                 if(Request::input('patchmin') == NULL){
                     $ribbon->patchmin = '00:00:00';
                 }
                 else{
                     $ribbon->patchmin = date("H:i:s", strtotime(Request::input('patchmin')));
                 }

                 $ribbon->translator_id= Auth::user()->id;
                 $ribbon->create_who= Auth::user()->id;
                 $ribbon->translate_date= Carbon::now()->toDateTimeString();

                 $ribbon->save();
                 activity()->performedOn($ribbon)->log('Ribbon added');
             }

         }
        
  
    }
     public function addzurchilhurd()
    {
            $hurd = new Fault;
            $hurd->ribbon_id = Request::input('ribbonzurchilhurd_id');
            $hurd->fault_from = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilhurd_from')))));
            $hurd->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilhurd_to')))));
            $hurd->is_ribbon = Request::input('tuuzzut4');
            $hurd->fault_time = date("H:i:s", strtotime(Request::input('zurchilhurd_time')));
            $hurd->fault_no = 32;
            $hurd->save();
             activity()->performedOn($hurd)->log('Hurd hetruulsen added');
            $faultmax = Fault::max('fault_id');
            $hurdSpeed = new FaultDet;
            $hurdSpeed->fault_id = $faultmax;
            $hurdSpeed->over_speed = Request::input('zurchilhurd_speed');
            $hurdSpeed->save();

    }
     public function destroyhurdhetruulsen($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('hurd deleted');
       
    }
        public function updatehurd()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilhurd_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilhurd_fault'))->update(['fault_from' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilhurd_frommodal'))))) ,'fault_to' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilhurd_tomodal'))))),'updated_at' => Carbon::now(), 'fault_time' => date("H:i:s", strtotime(Request::input('zurchilhurd_timemodal'))) ]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilhurd_fault'))->update(['over_speed' => Request::input('zurchilhurd_speedmodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('hurd updated');
       
    }
         public function addzurchil45()
    {
            $vu45 = new Fault;
            $vu45->ribbon_id = Request::input('ribbonzurchil45_id');
            $vu45->fromstation = Request::input('zurchil45_stat');
            $vu45->tostation = Request::input('zurchil45_stat');
            $vu45->is_ribbon = Request::input('tuuzzut5');
            $vu45->fault_time = date("H:i:s", strtotime(Request::input('zurchil45_time')));
            $vu45->fault_no = 22;
            $vu45->save();
             activity()->performedOn($vu45)->log('Vu45 added');
            $faultmax = Fault::max('fault_id');
            $time = new FaultDet;
            $time->fault_id = $faultmax;
            $time->stoptime =date("H:i:s", strtotime(Request::input('zurchil45_minute')));
            $time->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchil45_reason')))));

            $time->save();
  }
   public function destroy45($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('45 deleted');
       
    }
        public function update45()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchil45_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchil45_fault'))->update(['fromstation' =>Request::input('zurchil45_statmodal') ,'tostation' =>Request::input('zurchil45_statmodal'),'updated_at' => Carbon::now(),  'fault_time' => date("H:i:s", strtotime(Request::input('zurchil45_timemodal')))]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchil45_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('zurchil45_minutemodal'))),'reason' => str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchil45_reasonmodal'))))),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('45 updated');
       
    }
     public function adduharsan()
    {
            $uharsan = new Fault;
            $uharsan->ribbon_id = Request::input('ribbonuharsan_id');
            $uharsan->fault_from = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('uharsan_stat')))));
            $uharsan->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('uharsan_stat')))));
            $uharsan->is_ribbon = Request::input('tuuzzut3');
            $uharsan->fault_time = date("H:i:s", strtotime(Request::input('uharsan_time')));
            $uharsan->fault_no = 8;
            $uharsan->save();
             activity()->performedOn($uharsan)->log('Uharsan added');
            $faultmax = Fault::max('fault_id');
            $speed = new FaultDet;
            $speed->fault_id = $faultmax;
            $speed->stoptime = Request::input('uharsan_min');
            $speed->over_speed = Request::input('uharsan_speed');
            $speed->constspeed = Request::input('uharsan_km');
            $speed->save();
  
    }
     public function destroyuharsan($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('uharsan deleted');
       
    }
        public function updateuharsan()
    {
         $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('uharsan_fault'))->exists();
        if ($department == true) {
                 $department = DB::table('Fault')
                ->where('fault_id', Request::input('uharsan_fault'))->update(['fault_from' =>Request::input('uharsan_statmodal') ,'fault_to' =>Request::input('uharsan_statmodal'),'fault_time' => Request::input('uharsan_timemodal') ,'updated_at' => Carbon::now()]);
                  $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('uharsan_fault'))->update(['over_speed' => (Request::input('uharsan_speedmodal')),'constspeed' => (Request::input('uharsan_kmmodal')),'stoptime'=> Request::input('uharsan_minmodal'),'updated_at' => Carbon::now()]);
         }
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('Uharsan updated');
       
    }

        public function addzurchileffect()
    {
            $effect = new Fault;
            $effect->ribbon_id = Request::input('ribbonzurchileffect_id');
            $effect->fromstation = Request::input('zurchileffect_stat');
            $effect->tostation = Request::input('zurchileffect_stat');
            $effect->is_ribbon = Request::input('tuuzzut6');
            $effect->fault_time = date("H:i:s", strtotime(Request::input('zurchileffect_time')));
            $effect->fault_no = 33;
            $effect->save();
             activity()->performedOn($effect)->log('Effect zurchsun added');
            $faultmax = Fault::max('fault_id');
            $time = new FaultDet;
            $time->fault_id = $faultmax;
            $time->stoptime = date("H:i:s", strtotime(Request::input('zurchileffect_minute')));
            $time->constkilo = Request::input('zurchileffect_constkilo');
            $time->constspeed = Request::input('zurchileffect_constspeed');
            $time->faultkilo = Request::input('zurchileffect_faultkilo');
            $time->faultspeed = Request::input('zurchileffect_faultspeed');
            $time->save();
  
    }
     public function destroyeffect($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('effect deleted');
       
    }
        public function updateeffect()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchileffect_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchileffect_fault'))->update(['fromstation' =>Request::input('zurchileffect_statmodal') ,'tostation' =>Request::input('zurchileffect_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchileffect_timemodal'))) ,'updated_at' => Carbon::now()]);
            $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchileffect_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('zurchileffect_minutemodal'))),'constkilo' =>Request::input('zurchileffect_constkilomodal'),'constspeed' =>Request::input('zurchileffect_constspeedmodal'),'faultkilo' =>Request::input('zurchileffect_faultkilomodal'),'faultspeed' =>Request::input('zurchileffect_faultspeedmodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('effect updated');
       
    }
       public function addzurchiltormozburuu()
    {
            $tormoz = new Fault;
            $tormoz->ribbon_id = Request::input('ribbonzurchiltormozburuu_id');
            $tormoz->fault_from = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchiltormozburuu_stat')))));
            $tormoz->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchiltormozburuu_stat')))));
            $tormoz->is_ribbon = Request::input('tuuzzut7');
            $tormoz->fault_time =  date("H:i:s", strtotime(Request::input('zurchiltormozburuu_time')));
            $tormoz->fault_no = 37;
            $tormoz->save();
                 activity()->performedOn($tormoz)->log('Tormoz buruu added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->is_techact = Request::input('zurchiltormozburuu_akt');
            $det->broketype = Request::input('zurchiltormozburuu_type');
            $det->fault_km = Request::input('zurchiltormozburuu_kilo');
    
            $det->save();
  
    }
     public function destroytormozburuu($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('tormozburuu deleted');
       
    }
        public function updatetormozburuu()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltormozburuu_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchiltormozburuu_fault'))->update(['fault_from' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchiltormozburuu_statmodal'))))) ,'fault_to' =>Request::input('zurchiltormozburuu_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchiltormozburuu_timemodal'))) ,'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltormozburuu_fault'))->update(['is_techact' =>  Request::input('zurchiltormozburuu_aktmodal'),'broketype' =>  Request::input('zurchiltormozburuu_typemodal'), 'fault_km' =>  Request::input('zurchiltormozburuu_kilomodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('tormozburuu updated');
       
    }
           public function addzurchilepkgemtel()
    {
            $epkgemtel = new Fault;
            $epkgemtel->ribbon_id = Request::input('ribbonzurchilepkgemtel_id');
            $epkgemtel->fault_from = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilepkgemtel_stat')))));
            $epkgemtel->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilepkgemtel_stat')))));
            $epkgemtel->is_ribbon = Request::input('tuuzzut8');
            $epkgemtel->fault_time =date("H:i:s", strtotime(Request::input('zurchilepkgemtel_time')));
            $epkgemtel->fault_no = 27;
            $epkgemtel->save();
                activity()->performedOn($epkgemtel)->log('Epk gemtel added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->tush_no = Request::input('zurchilepkgemtel_tushno');
            $det->tush_name = Request::input('zurchilepkgemtel_tushugsun');
            $det->fault_km = Request::input('zurchilepkgemtel_kilo');
            $det->save();
  
    }
     public function destroyepkgemtel($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('epkgemtel deleted');
       
    }
        public function updateepkgemtel()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilepkgemtel_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilepkgemtel_fault'))->update(['fault_from' =>Request::input('zurchilepkgemtel_statmodal') ,'fault_to' =>Request::input('zurchilepkgemtel_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilepkgemtel_timemodal'))) ,'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilepkgemtel_fault'))->update(['tush_no' =>Request::input('zurchilepkgemtel_tushnomodal') ,'tush_name' =>Request::input('zurchilepkgemtel_tushugsunmodal'), 'fault_km' =>Request::input('zurchilepkgemtel_kilomodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('epkgemtel updated');
       
    }
    public function addzurchilepkhaasan()
    {
            $epkhaasan = new Fault;
            $epkhaasan->ribbon_id = Request::input('ribbonzurchilepkhaasan_id');
            $epkhaasan->fault_from = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilepkhaasan_from')))));
            $epkhaasan->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilepkhaasan_to')))));
            $epkhaasan->is_ribbon = Request::input('tuuzzut9');
            $epkhaasan->fault_time =date("H:i:s", strtotime(Request::input('zurchilepkhaasan_time')));
            $epkhaasan->fault_no = 26;
            $epkhaasan->save();
            activity()->performedOn($epkhaasan)->log('Epk haasan added');

            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->reason = Request::input('zurchilepkhaasan_reason');
            $det->fault_km = Request::input('zurchilepkhaasan_kilo');       
            $det->save();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
     public function destroyepkhaasan($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('epkhaasan deleted');
       
    }
        public function updateepkhaasan()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilepkhaasan_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilepkhaasan_fault'))->update(['fault_from' =>Request::input('zurchilepkhaasan_statmodal') ,'fault_to' =>Request::input('zurchilepkhaasan_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilepkhaasan_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilepkhaasan_fault'))->update(['broketype' =>Request::input('ribbonzurchilepkhaasan_typemodal'),'is_techact' =>Request::input('zurchilepkhaasan_aktmodal') , 'fault_km' =>Request::input('zurchilepkhaasan_kilomodal') ,'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('epkhaasan updated');
       
    }
     public function addzurchilkran()
    {
            $kran = new Fault;
            $kran->ribbon_id = Request::input('ribbonzurchilkran_id');
            $kran->fromstation = Request::input('zurchilkran_stat');
            $kran->tostation = Request::input('zurchilkran_stat');
            $kran->is_ribbon = Request::input('tuuzzut10');
            $kran->fault_time =date("H:i:s", strtotime(Request::input('zurchilkran_time')));
            $kran->fault_no = 13;
            $kran->save();
        $faultmax = Fault::max('fault_id');
        $det = new FaultDet;
        $det->fault_id = $faultmax;
        $det->broketype = Request::input('zurchilkran_type');
        $det->save();

      activity()->performedOn($kran)->log('Kran added');
    }
     public function destroykran($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('kran deleted');
       
    }
        public function updatekran()
    {
        $department = DB::table('V_FAULT')
                ->where('fault_id', Request::input('ribbonzurchilkran_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilkran_fault'))->update(['fromstation' =>Request::input('zurchilkran_statmodal') ,'tostation' =>Request::input('zurchilkran_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilkran_timemodal'))),'updated_at' => Carbon::now()]);
            $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilkran_fault'))->update(['broketype' =>Request::input('zurchilkran_typemodal') ,'updated_at' => Carbon::now()]);

        }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('kran updated');
       
    }
    public function addzurchiltormoztursh()
    {
            $tursh = new Fault;
            $tursh->ribbon_id = Request::input('ribbonzurchiltormoztursh_id');
            $tursh->fromstation = Request::input('zurchiltormoztursh_stat');
            $tursh->tostation = Request::input('zurchiltormoztursh_stat');
            $tursh->is_ribbon = Request::input('tuuzzut11');
            $tursh->fault_time =date("H:i:s", strtotime(Request::input('zurchiltormoztursh_time')));
            $tursh->fault_no = 23;
            $tursh->save();
               activity()->performedOn($tursh)->log('Tormoz turshaagui added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->is_stop = Request::input('zurchiltormoztursh_tursh');
            $det->broketype = Request::input('zurchiltormoztursh_type');
                   
            $det->save();
    }
     public function destroytormoztursh($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('tormoztursh deleted');
       
    }
        public function updatetormoztursh()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltormoztursh_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchiltormoztursh_fault'))->update(['fromstation' =>Request::input('zurchiltormoztursh_statmodal') ,'tostation' =>Request::input('zurchiltormoztursh_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchiltormoztursh_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltormoztursh_fault'))->update(['is_stop' => Request::input('zurchiltormoztursh_turshmodal'),'broketype' => Request::input('zurchiltormoztursh_typemodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('tormoztursh updated');
       
    }
         public function addzurchiloroh()
    {
            $oroh = new Fault;
            $oroh->ribbon_id = Request::input('ribbonzurchiloroh_id');
            $oroh->fromstation = Request::input('zurchiloroh_stat');
            $oroh->tostation = Request::input('zurchiloroh_stat');
            $oroh->is_ribbon = Request::input('tuuzzut12');
            $oroh->fault_time =date("H:i:s", strtotime(Request::input('zurchiloroh_time')));
            $oroh->fault_no = 21;
            $oroh->save();
                    activity()->performedOn($oroh)->log('Oroh dohio added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->stoptime = Request::input('zurchiloroh_min');    
            $det->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchiloroh_reason')))));
            $det->save();
  
    }
     public function destroyoroh($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('oroh deleted');
       
    }
        public function updateoroh()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiloroh_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchiloroh_fault'))->update(['fromstation' =>Request::input('zurchiloroh_statmodal') ,'tostation' =>Request::input('zurchiloroh_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchiloroh_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiloroh_fault'))->update(['stoptime' => Request::input('zurchiloroh_minmodal'),'reason' => str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchiloroh_reasonmodal')))))    , 'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('reason updated');
       
    }
    public function addzurchilyaraltai()
    {
            $yaraltai = new Fault;
            $yaraltai->ribbon_id = Request::input('ribbonzurchilyaraltai_id');
            $yaraltai->fault_from = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilyaraltai_stat')))));
            $yaraltai->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilyaraltai_stat')))));
            $yaraltai->is_ribbon = Request::input('tuuzzut13');
            $yaraltai->fault_time =date("H:i:s", strtotime(Request::input('zurchilyaraltai_time')));
            $yaraltai->fault_no = 35;

            $yaraltai->save();
               activity()->performedOn($yaraltai)->log('yaraltai  added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->broketype = Request::input('zurchilyaraltai_type');
            $det->stoptime = date("H:i:s", strtotime(Request::input('zurchilyaraltai_zogsson')));
            $det->is_stop = Request::input('zurchilyaraltai_attack');
            $det->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilyaraltai_reason')))));
            $det->save();
    }
     public function destroyyaraltai($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('yaraltai deleted');
       
    }
        public function updateyaraltai()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilyaraltai_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilyaraltai_fault'))->update(['fault_from' =>Request::input('zurchilyaraltai_statmodal') ,'fault_to' =>Request::input('zurchilyaraltai_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilyaraltai_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilyaraltai_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('zurchilyaraltai_zogssonmodal'))),'broketype' =>Request::input('zurchilyaraltai_typemodal'),'reason' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilyaraltai_reasonmodal'))))),'is_stop' =>Request::input('zurchilyaraltai_attackmodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('yaraltai updated');
       
    }
     public function addzurchilgolhooloi()
    {
            $golhooloi = new Fault;
            $golhooloi->ribbon_id = Request::input('ribbonzurchilgolhooloi_id');
            $golhooloi->fromstation = Request::input('zurchilgolhooloi_stat');
            $golhooloi->tostation = Request::input('zurchilgolhooloi_stat');
            $golhooloi->is_ribbon = Request::input('tuuzzut14');
            $golhooloi->fault_time =date("H:i:s", strtotime(Request::input('zurchilgolhooloi_time')));
            $golhooloi->fault_no = 16;

            $golhooloi->save();

        $faultmax = Fault::max('fault_id');
        $det = new FaultDet;
        $det->fault_id = $faultmax;
        $det->broketype = Request::input('zurchilgolhooloi_type');
        $det->save();
        activity()->performedOn($golhooloi)->log('Gol hooloi added');
    }
     public function destroygolhooloi($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('golhooloi deleted');
       
    }
        public function updategolhooloi()
    {
        $department = DB::table('V_FAULT')
                ->where('fault_id', Request::input('ribbonzurchilgolhooloi_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilgolhooloi_fault'))->update(['fromstation' =>Request::input('zurchilgolhooloi_statmodal') ,'tostation' =>Request::input('zurchilgolhooloi_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilgolhooloi_timemodal'))),'updated_at' => Carbon::now()]);
            $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilgolhooloi_fault'))->update(['broketype' =>Request::input('zurchilgolhooloi_typemodal'),'updated_at' => Carbon::now()]);

        }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('golhooloi updated');
       
    }
     public function addzurchilepkajil()
    {
            $epkajil = new Fault;
            $epkajil->ribbon_id = Request::input('ribbonzurchilepkajil_id');
            $epkajil->fault_from =str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilepkajil_stat')))));
            $epkajil->fault_to = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilepkajil_stat')))));
            $epkajil->is_ribbon = Request::input('tuuzzut15');
            $epkajil->fault_time =date("H:i:s", strtotime(Request::input('zurchilepkajil_time')));
            $epkajil->fault_no = 25;
            $epkajil->save();
               activity()->performedOn($epkajil)->log('Epk ajil added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->stoptime = date("H:i:s", strtotime(Request::input('zurchilepkajil_zogsson')));
            $det->is_techact = Request::input('zurchilepkajil_akt');
            $det->is_stop = Request::input('zurchilepkajil_isstop');

            $det->save();
    }
     public function destroyepkajil($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('epkajil deleted');
       
    }
        public function updateepkajil()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilepkajil_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilepkajil_fault'))->update(['fault_from' =>Request::input('zurchilepkajil_statmodal') ,'fault_to' =>Request::input('zurchilepkajil_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilepkajil_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilepkajil_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('zurchilepkajil_zogssonmodal'))),'is_techact' =>Request::input('zurchilepkajil_aktmodal'),'is_stop' =>Request::input('zurchilepkajil_isstopmodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('epkajil updated');
       
    }
    public function addzurchilepkkon()
    {
        $epkkon = new Fault;
        $epkkon->ribbon_id = Request::input('ribbonzurchilepkkon_id');
        $epkkon->fault_from = Request::input('zurchilepkkon_stat');
        $epkkon->fault_to = Request::input('zurchilepkkon_stat');
        $epkkon->fault_time =date("H:i:s", strtotime(Request::input('zurchilepkkon_time')));
        $epkkon->is_ribbon = Request::input('tuuzzut15');
        $epkkon->fault_no = 121;
        $epkkon->save();
        activity()->performedOn($epkkon)->log('Epk kon added');
        $faultmax = Fault::max('fault_id');
        $det = new FaultDet;
        $det->fault_id = $faultmax;
        $det->broketype = Request::input('zurchilepkkon_type');
        $det->stoptime = date("H:i:s", strtotime(Request::input('zurchilepkkon_zogsson')));
        $det->is_techact = Request::input('zurchilepkkon_akt');
        $det->is_stop = Request::input('zurchilepkkon_isstop');

        $det->save();
    }
    public function destroyepkkon($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
        activity()->log('epkkon deleted');

    }
    public function updateepkkon()
    {
        $department = DB::table('V_FAULT_DET')
            ->where('fault_id', Request::input('ribbonzurchilepkkon_fault'))->exists();
        if ($department == true) {
            $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilepkkon_fault'))->update(['fault_from' =>Request::input('zurchilepkkon_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilepkkon_timemodal'))) ,'fault_to' =>Request::input('zurchilepkkon_statmodal'),'updated_at' => Carbon::now()]);
            $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilepkkon_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('zurchilepkkon_zogssonmodal'))),'broketype' =>Request::input('zurchilepkkon_typemodal'),'is_techact' =>Request::input('zurchilepkkon_aktmodal'),'is_stop' =>Request::input('zurchilepkkon_isstopmodal'),'updated_at' => Carbon::now()]);
        }

        return response()->json([
            'success' => 'Record has been updated successfully!'
        ]);
        activity()->log('epkajil updated');

    }
         public function addzurchilduud()
    {
            $duud = new Fault;
            $duud->ribbon_id = Request::input('ribbonzurchilduud_id');
            $duud->fromstation = Request::input('zurchilduud_stat');
            $duud->tostation = Request::input('zurchilduud_stat');
            $duud->is_ribbon = Request::input('tuuzzut16');
            $duud->fault_time =date("H:i:s", strtotime(Request::input('zurchilduud_time')));
            $duud->fault_no = 15;
            $duud->save();
        $faultmax = Fault::max('fault_id');
        $det = new FaultDet;
        $det->fault_id = $faultmax;
        $det->broketype = Request::input('zurchilduud_type');
        $det->save();
           
      activity()->performedOn($duud)->log('Duud added');
    }
     public function destroyduud($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('duud deleted');
       
    }
        public function updateduud()
    {
        $department = DB::table('V_FAULT')
                ->where('fault_id', Request::input('ribbonzurchilduud_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilduud_fault'))->update(['fromstation' =>Request::input('zurchilduud_statmodal') ,'tostation' =>Request::input('zurchilduud_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilduud_timemodal'))),'updated_at' => Carbon::now()]);
            $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilduud_fault'))->update(['broketype' =>Request::input('zurchilduud_typemodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('duud updated');
       
    }
         public function addzurchilkilo()
    {
            $kilo = new Fault;
            $kilo->ribbon_id = Request::input('ribbonzurchilkilo_id');
            $kilo->fault_from = Request::input('zurchilkilo_from');
            $kilo->fault_to = Request::input('zurchilkilo_to');
            $kilo->is_ribbon = Request::input('tuuzzut17');
            $kilo->fault_time =date("H:i:s", strtotime(Request::input('zurchilkilo_time')));
            $kilo->fault_no = 30;
   
            $kilo->save();
        $faultmax = Fault::max('fault_id');
        $det = new FaultDet;
        $det->fault_id = $faultmax;
        $det->fault_km = Request::input('zurchilkilo_km');

        $det->save();

        activity()->performedOn($kilo)->log('Kilo added');
  
    }
     public function destroykilo($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('kilo deleted');
       
    }
        public function updatekilo()
    {
        $department = DB::table('V_FAULT')
                ->where('fault_id', Request::input('ribbonzurchilkilo_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilkilo_fault'))->update(['fault_from' =>Request::input('zurchilkilo_frommodal') ,'fault_to' =>Request::input('zurchilkilo_tomodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilkilo_timemodal'))),'updated_at' => Carbon::now()]);
            $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilkilo_fault'))->update(['fault_km' =>Request::input('zurchilkilo_kmmodal'),'updated_at' => Carbon::now()]);

        }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('kilo updated');
       
    }
          public function addzurchilklub()
    {
            $klub= new Fault;
            $klub->ribbon_id = Request::input('ribbonzurchilklub_id');
            $klub->fault_from = Request::input('zurchilklub_from');
            $klub->fault_to = Request::input('zurchilklub_to');
            $klub->is_ribbon = Request::input('tuuzzut18');
            $klub->fault_time =date("H:i:s", strtotime(Request::input('zurchilklub_time')));
            $klub->fault_no = 29;

            $klub->save();
               activity()->performedOn($klub)->log('klub added');
  
    }
     public function destroyklub($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('klub deleted');
       
    }
        public function updateklub()
    {
        $department = DB::table('V_FAULT')
                ->where('fault_id', Request::input('ribbonzurchilklub_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilklub_fault'))->update(['fault_from' =>Request::input('zurchilklub_frommodal') ,'fault_to' =>Request::input('zurchilklub_tomodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilklub_timemodal'))),'updated_at' => Carbon::now()]);
               
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('klub updated');
       
    }
          public function addzurchiljoloo()
    {
            $joloo = new Fault;
            $joloo->ribbon_id = Request::input('ribbonzurchiljoloo_id');
            $joloo->fault_from = Request::input('zurchiljoloo_from');
            $joloo->fault_to = Request::input('zurchiljoloo_to');
            $joloo->is_ribbon = Request::input('tuuzzut19');
            $joloo->fault_time =date("H:i:s", strtotime(Request::input('zurchiljoloo_time')));
            $joloo->fault_no = 34;

            $joloo->save();
               activity()->performedOn($joloo)->log('Joloo added');
  
    }
     public function destroyjoloo($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('joloo deleted');
       
    }
        public function updatejoloo()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiljoloo_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchiljoloo_fault'))->update(['fromstation' =>Request::input('zurchiljoloo_frommodal') ,'tostation' =>Request::input('zurchiljoloo_tomodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchiljoloo_timemodal'))),'updated_at' => Carbon::now()]);
             
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('joloo updated');
       
    }
    public function addzurchiljolood()
    {
        $joloo = new Fault;
        $joloo->ribbon_id = Request::input('ribbonzurchiljolood_id');
        $joloo->fault_from = Request::input('zurchiljolood_from');
        $joloo->fault_to = Request::input('zurchiljolood_to');
        $joloo->is_ribbon = Request::input('tuuzzut19');
        $joloo->fault_time =date("H:i:s", strtotime(Request::input('zurchiljolood_time')));
        $joloo->fault_no = 161;

        $joloo->save();
        activity()->performedOn($joloo)->log('Jolood added');

    }
    public function destroyjolood($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
        activity()->log('jolood deleted');

    }
    public function updatejolood()
    {
        $department = DB::table('V_FAULT_DET')
            ->where('fault_id', Request::input('ribbonzurchiljolood_fault'))->exists();
        if ($department == true) {
            $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchiljolood_fault'))->update(['fromstation' =>Request::input('zurchiljolood_frommodal') ,'tostation' =>Request::input('zurchiljolood_tomodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchiljolood_timemodal'))),'updated_at' => Carbon::now()]);

        }

        return response()->json([
            'success' => 'Record has been updated successfully!'
        ]);
        activity()->log('jolood updated');

    }
     public function addhurdhemjigch()
    {
            $hurdhemjigch = new Fault;
            $hurdhemjigch->ribbon_id = Request::input('ribbonzurchilhurdhemjigch_id');
            $hurdhemjigch->fault_from = Request::input('zurchilhurdhemjigch_stat');
            $hurdhemjigch->fault_to = Request::input('zurchilhurdhemjigch_stat');
            $hurdhemjigch->is_ribbon = Request::input('tuuzzut20');
            $hurdhemjigch->fault_time =date("H:i:s", strtotime(Request::input('zurchilhurdhemjigch_time')));
            $hurdhemjigch->fault_no = 36;
            $hurdhemjigch->save();
               activity()->performedOn($hurdhemjigch)->log('Hurd hemjigch added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->broketype = Request::input('zurchilhurdhemjigch_type');
            $det->is_techact = Request::input('zurchilhurdhemjigch_akt');
            $det->fault_km = Request::input('zurchilhurdhemjigch_kilo');
            $det->save();
    }
     public function destroyhurdhemjigch($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('hurdhemjigch deleted');
       
    }
        public function updatehurdhemjigch()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilhurdhemjigch_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilhurdhemjigch_fault'))->update(['fault_from' =>Request::input('zurchilhurdhemjigch_statmodal') ,'fault_to' =>Request::input('zurchilhurdhemjigch_statmodal'),'fault_time' =>date("H:i:s", strtotime(Request::input('zurchilhurdhemjigch_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilhurdhemjigch_fault'))->update(['broketype' =>Request::input('zurchilhurdhemjigch_typemodal'),'is_techact' =>Request::input('zurchilhurdhemjigch_aktmodal'), 'fault_km' =>Request::input('zurchilhurdhemjigch_kilomodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('hurdhemjigch updated');
       
    }
      public function addepkshilj()
    {
            $epkshilj = new Fault;
            $epkshilj->ribbon_id = Request::input('ribbonzurchilepkshilj_id');
            $epkshilj->fromstation = Request::input('zurchilepkshilj_stat');
            $epkshilj->tostation = Request::input('zurchilepkshilj_stat');
            $epkshilj->is_ribbon = Request::input('tuuzzut21');
            $epkshilj->fault_time =date("H:i:s", strtotime(Request::input('zurchilepkshilj_time')));
            $epkshilj->fault_no = 14;
            $epkshilj->save();
               activity()->performedOn($epkshilj)->log('Epk shilj added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->stoptime = date("H:i:s", strtotime(Request::input('zurchilepkshilj_minute'))); 
            $det->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilepkshilj_reason')))));
            $det->broketype = Request::input('zurchilepkshilj_type');
            $det->save();
    }
     public function destroyepkshilj($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('epkshilj deleted');
       
    }
        public function updateepkshilj()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilepkshilj_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilepkshilj_fault'))->update(['fromstation' =>Request::input('zurchilepkshilj_statmodal') ,'tostation' =>Request::input('zurchilepkshilj_statmodal'), 'fault_time' => date("H:i:s", strtotime(Request::input('zurchilepkshilj_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilepkshilj_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('zurchilepkshilj_minutemodal'))),'reason' =>Request::input('zurchilepkshilj_reasonmodal'),'broketype' =>Request::input('zurchilepkshilj_typemodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('epkshilj updated');
       
    }
        public function addbichlegbudeg()
    {
            $bichlegbudeg = new Fault;
            $bichlegbudeg->ribbon_id = Request::input('ribbonzurchilbichlegbudeg_id');
            $bichlegbudeg->fault_from = Request::input('zurchilbichlegbudeg_stat');
            $bichlegbudeg->fault_to = Request::input('zurchilbichlegbudeg_stat');
            $bichlegbudeg->is_ribbon = Request::input('tuuzzut22');
            $bichlegbudeg->fault_time =date("H:i:s", strtotime(Request::input('zurchilbichlegbudeg_time')));
            $bichlegbudeg->fault_no = 19;
      
            $bichlegbudeg->save();
               activity()->performedOn($bichlegbudeg)->log('Bichleg budeg added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->broketype = Request::input('zurchilbichlegbudeg_type');  
            $det->fault_km = Request::input('zurchilbichlegbudeg_kilo');
            $det->save();
    }
     public function destroybichlegbudeg($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('bichlegbudeg deleted');
       
    }
        public function updatebichlegbudeg()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilbichlegbudeg_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilbichlegbudeg_fault'))->update(['fault_from' =>Request::input('zurchilbichlegbudeg_statmodal') ,'fault_to' =>Request::input('zurchilbichlegbudeg_statmodal'),'fault_time' => date("H:i:s", strtotime(Request::input('zurchilbichlegbudeg_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilbichlegbudeg_fault'))->update(['fault_km' =>Request::input('zurchilbichlegbudeg_kilomodal'),'broketype' =>Request::input('zurchilbichlegbudeg_typemodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('bichlegbudeg updated');
       
    }
     public function addbichlegdutuu()
    {
            $bichlegdutuu = new Fault;
            $bichlegdutuu->ribbon_id = Request::input('ribbonzurchilbichlegdutuu_id');
            $bichlegdutuu->fault_from = Request::input('zurchilbichlegdutuu_stat');
            $bichlegdutuu->fault_to = Request::input('zurchilbichlegdutuu_stat');
            $bichlegdutuu->is_ribbon = Request::input('tuuzzut23');
            $bichlegdutuu->fault_time =date("H:i:s", strtotime(Request::input('zurchilbichlegdutuu_time')));
            $bichlegdutuu->fault_no = 20;
            $bichlegdutuu->save();
               activity()->performedOn($bichlegdutuu)->log('Bichleg dutuu added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->broketype = Request::input('zurchilbichlegdutuu_type'); 
            $det->fault_km = Request::input('zurchilbichlegdutuu_kilo'); 
            $det->save();
    }
     public function destroybichlegdutuu($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('bichlegdutuu deleted');
       
    }
        public function updatebichlegdutuu()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilbichlegdutuu_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilbichlegdutuu_fault'))->update(['fault_from' =>Request::input('zurchilbichlegdutuu_statmodal') ,'fault_to' =>Request::input('zurchilbichlegdutuu_statmodal'), 'fault_time' => date("H:i:s", strtotime(Request::input('zurchilbichlegdutuu_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilbichlegdutuu_fault'))->update(['broketype' =>Request::input('zurchilbichlegdutuu_typemodal'),'fault_km' =>Request::input('zurchilbichlegdutuu_kilomodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('bichlegdutuu updated');
       
    }
       public function addtsag()
    {
            $tsag = new Fault;
            $tsag->ribbon_id = Request::input('ribbonzurchiltsag_id');
            $tsag->fault_from = Request::input('zurchiltsag_stat');
            $tsag->fault_to = Request::input('zurchiltsag_stat');
            $tsag->is_ribbon = Request::input('tuuzzut24');
            $tsag->fault_time =date("H:i:s", strtotime(Request::input('zurchiltsag_time')));
            $tsag->fault_no = 31;
            $tsag->save();
                activity()->performedOn($tsag)->log('Tsag added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->fault_km = Request::input('zurchiltsag_kilo'); 
            $det->save();
    }
     public function destroytsag($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('tsag deleted');
       
    }
        public function updatetsag()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltsag_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchiltsag_fault'))->update(['fault_from' =>Request::input('zurchiltsag_statmodal') ,'fault_to' =>Request::input('zurchiltsag_statmodal'), 'fault_time' => date("H:i:s", strtotime(Request::input('zurchiltsag_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltsag_fault'))->update(['fault_km' => Request::input('zurchiltsag_kilomodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('tsag updated');
       
    }
         public function addtuuzuragdsan()
    {
            $tuuzuragdsan = new Fault;
            $tuuzuragdsan->ribbon_id = Request::input('ribbonzurchiltuuzuragdsan_id');
            $tuuzuragdsan->fault_from = Request::input('zurchiltuuzuragdsan_stat');
            $tuuzuragdsan->fault_to = Request::input('zurchiltuuzuragdsan_stat');
            $tuuzuragdsan->is_ribbon = Request::input('tuuzzut25');
            $tuuzuragdsan->fault_time =date("H:i:s", strtotime(Request::input('zurchiltuuzuragdsan_time')));
            $tuuzuragdsan->fault_no = 18;
            $tuuzuragdsan->save();
               activity()->performedOn($tuuzuragdsan)->log('Tuuz uragdsan added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->broketype = Request::input('zurchiltuuzuragdsan_type');  
            $det->fault_km = Request::input('zurchiltuuzuragdsan_kilo'); 
            $det->save();
    }
     public function destroytuuzuragdsan($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('tuuzuragdsan deleted');
       
    }
        public function updatetuuzuragdsan()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltuuzuragdsan_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchiltuuzuragdsan_fault'))->update(['fault_from' =>Request::input('zurchiltuuzuragdsan_statmodal') ,'fault_to' =>Request::input('zurchiltuuzuragdsan_statmodal'), 'fault_time' => date("H:i:s", strtotime(Request::input('zurchiltuuzuragdsan_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltuuzuragdsan_fault'))->update(['fault_km' => Request::input('zurchiltuuzuragdsan_kilomodal'), 'broketype' => Request::input('zurchiltuuzuragdsan_typemodal'), 'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('tuuzuragdsan updated');
       
    }
         public function addtuuzzassan()
    {
            $tuuzzassan = new Fault;
            $tuuzzassan->ribbon_id = Request::input('ribbonzurchiltuuzzassan_id');
            $tuuzzassan->fromstation = 84;
            $tuuzzassan->tostation = 84;
            $tuuzzassan->is_ribbon = Request::input('tuuzzut26');
            $tuuzzassan->fault_time = date("H:i:s", strtotime(Request::input('zurchiltuuzzassan_time')));
            $tuuzzassan->fault_no = 17;
            $tuuzzassan->save();
               activity()->performedOn($tuuzzassan)->log('Tuuz zassan added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->broketype = Request::input('zurchiltuuzzassan_type');  
            $det->save();
    }
     public function destroytuuzzassan($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('tuuzzassan deleted');
       
    }
        public function updatetuuzzassan()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltuuzzassan_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchiltuuzzassan_fault'))->update(['fault_time' =>  date("H:i:s", strtotime(Request::input('zurchiltuuzzassan_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchiltuuzzassan_fault'))->update(['broketype' => Request::input('zurchiltuuzzassan_typemodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('tuuzzassan updated');
       
    }
            public function addzurchil20()
    {
            $zurchil20 = new Fault;
            $zurchil20->ribbon_id = Request::input('ribbonzurchil20_id');
            $zurchil20->fromstation = Request::input('zurchil20_stat');  
            $zurchil20->tostation = Request::input('zurchil20_stat');  
            $zurchil20->is_ribbon = Request::input('tuuzzut30');
            $zurchil20->fault_time =date("H:i:s", strtotime(Request::input('zurchil20_time')));
            $zurchil20->fault_no = 10;
            $zurchil20->save();
               activity()->performedOn($zurchil20)->log('Zurchil20 added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id =str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchil20_reason')))));
            $det->stoptime = date("H:i:s", strtotime(Request::input('zurchil20_zogsson'))); 
            $det->save();
    }
     public function destroy20($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('20 deleted');
       
    }
        public function update20()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchil20_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchil20_fault'))->update(['fromstation' =>Request::input('zurchil20_statmodal') ,'tostation' =>Request::input('zurchil20_statmodal'), 'fault_time' => date("H:i:s", strtotime(Request::input('zurchil20_timemodal'))),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchil20_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('zurchil20_zogssonmodal'))),'reason' =>  Request::input('zurchil20_reasonmodal'),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('20 updated');
       
    }
    public function addzurchilhii()
    {
            $zurchil20 = new Fault;
            $zurchil20->ribbon_id = Request::input('ribbonzurchilhii_id');
            $zurchil20->fault_from = Request::input('zurchilhii_stat');
            $zurchil20->fault_to = Request::input('zurchilhii_stat');
            $zurchil20->is_ribbon = Request::input('tuuzzut31');
            $zurchil20->fault_no = 11;
            $zurchil20->save();
                    activity()->performedOn($zurchil20)->log('Hii ergesen added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->over_speed = Request::input('zurchilhii_num');
            $det->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilhii_reason')))));
            $det->save();
        
    }
     public function destroyhii($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('hii deleted');
       
    }
        public function updatehii()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilhii_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilhii_fault'))->update(['fault_from' =>Request::input('zurchilhii_statmodal') ,'fault_to' =>Request::input('zurchilhii_statmodal'),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilhii_fault'))->update(['over_speed' =>  Request::input('zurchilhii_nummodal'),'reason' => str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilhii_reasonmodal'))))),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('hii updated');
       
    }
        public function add205()
    {
            $zurchil20 = new Fault;
            $zurchil20->ribbon_id = Request::input('ribbon205_id');
            $zurchil20->fault_from = Request::input('205_from');
            $zurchil20->fault_to = Request::input('205_to');
            $zurchil20->is_ribbon = Request::input('tuuzzut36');
            $zurchil20->fault_no = 81;
            $zurchil20->save();
            activity()->performedOn($zurchil20)->log('20.5 doosh added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->stoptime = date("H:i:s", strtotime(Request::input('205_zogsson'))); 
            $det->over_speed = Request::input('205_speed');
            $det->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('205_reason')))));
            $det->save();
        
    }

    public function destroy205($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('20,5 deleted');
       
    }
        public function update205()
    {
         $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('205_fault'))->exists();
        if ($department == true) {
                 $department = DB::table('Fault')
                ->where('fault_id', Request::input('205_fault'))->update(['fault_from' =>Request::input('205_frommodal') ,'fault_to' =>Request::input('205_tomodal') ,'updated_at' => Carbon::now()]);
                  $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('205_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('205_zogssonmodal'))),'over_speed' =>Request::input('205_speedmodal'),'reason' =>Request::input('205_reasonmodal'),'updated_at' => Carbon::now()]);
         }
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('Hajuu zam deleted');
       
    }
            public function addurtuu30()
    {

         $urtuu = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('urtuu30_fault'))->exists();

        if ($urtuu == true) {
                $urtuu = DB::table('FAULT')
                ->where('fault_id', Request::input('urtuu30_fault'))->update(['fromstation' =>Request::input('urtuu30_stat') ,'tostation' => Request::input('urtuu30_stat'),'updated_at' => Carbon::now()]);
                  $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('urtuu30_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('urtuu30_zogsson'))),'updated_at' => Carbon::now()]);
               
         }
         else {
             $zurchil = new Fault;
            $zurchil->ribbon_id = Request::input('ribbonurtuu30_id');
            $zurchil->fromstation = Request::input('urtuu30_stat');  
            $zurchil->tostation = Request::input('urtuu30_stat');  
            $zurchil->is_ribbon = Request::input('tuuzzut37');
            $zurchil->fault_no = 12;
            $zurchil->save();
                    activity()->performedOn($zurchil)->log('30 min deesh added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->stoptime = date("H:i:s", strtotime(Request::input('urtuu30_zogsson')));
            $det->reason =str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('urtuu30_reason')))));
            $det->save();
         }
           
        
    }
      public function destroyurtuu30($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('urtuu30 deleted');
       
    }
        public function updateurtuu30()
    {
         $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('urtuu30_fault'))->exists();
        if ($department == true) {
                 $department = DB::table('Fault')
                ->where('fault_id', Request::input('urtuu30_fault'))->update(['fromstation' =>Request::input('urtuu30_statmodal') ,'tostation' =>Request::input('urtuu30_statmodal') ,'updated_at' => Carbon::now()]);
                  $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('urtuu30_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('urtuu30_zogssonmodal'))),'updated_at' => Carbon::now(),'reason' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('urtuu30_reasonmodal')))))]);
         }
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('Urtuu30 updated');
       
    }
               public function addtechno()
    {
            $techno = new Fault;
            $techno->ribbon_id = Request::input('ribbontechno_id');
            $techno->fromstation = Request::input('techno_stat');  
            $techno->tostation = Request::input('techno_stat');  
            $techno->is_ribbon = Request::input('tuuzzut38');
            $techno->fault_time =date("H:i:s", strtotime(Request::input('techno_time')));
            $techno->fault_no = 83;
            $techno->save();
                    activity()->performedOn($techno)->log('Techno added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->tush_name = date("H:i:s", strtotime(Request::input('techno_timefin'))); 
            $det->constkilo = Request::input('techno_zogsson');
            $det->save();
        
    }
     public function destroytechno($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('techno deleted');
       
    }
        public function updatetechno()
    {
         $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('techno_fault'))->exists();
        if ($department == true) {
                 $department = DB::table('Fault')
                ->where('fault_id', Request::input('techno_fault'))->update(['fromstation' =>Request::input('techno_statmodal') ,'tostation' =>Request::input('techno_statmodal') ,'updated_at' => Carbon::now()]);
                  $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('techno_fault'))->update(['stoptime' => (Request::input('techno_zogssonmodal')),'updated_at' => Carbon::now(),'tush_name' => date("H:i:s", strtotime(Request::input('techno_timefinmodal')))]);
         }
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('Techno updated');
       
    }
                 public function addconst()
    {
            $techno = new Fault;
            $techno->ribbon_id = Request::input('ribbonconst_id');
            $techno->fault_from = Request::input('const_from');
            $techno->fault_to = Request::input('const_to');
            $techno->is_ribbon = Request::input('tuuzzut39');
            $techno->fault_no = 82;
            $techno->save();
                    activity()->performedOn($techno)->log('Togtooson hurdand huregui added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->over_speed = Request::input('const_speed');
            $det->save();
        
    }
     public function destroyconst($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('const deleted');
       
    }
        public function updateconst()
    {
         $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('const_fault'))->exists();
        if ($department == true) {
                 $department = DB::table('Fault')
                ->where('fault_id', Request::input('const_fault'))->update(['fault_from' =>Request::input('const_frommodal') ,'fault_to' =>Request::input('const_tomodal') ,'updated_at' => Carbon::now()]);
                  $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('const_fault'))->update(['over_speed' => (Request::input('const_speedmodal')),'updated_at' => Carbon::now()]);
         }
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('Const updated');
       
    }
             public function addzurchilanhaaramj()
    {
            $zurchilanhaaramj = new Fault;
            $zurchilanhaaramj->ribbon_id = Request::input('ribbonzurchilanhaaramj_id');
            $zurchilanhaaramj->fault_from = Request::input('zurchilanhaaramj_stat');
            $zurchilanhaaramj->fault_to = Request::input('zurchilanhaaramj_stat');
            $zurchilanhaaramj->is_ribbon = Request::input('tuuzzut32');
            $zurchilanhaaramj->fault_no = 9;
            $zurchilanhaaramj->save();
               activity()->performedOn($zurchilanhaaramj)->log('Anhaaramjaar buuj suusan added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->stoptime = date("H:i:s", strtotime(Request::input('zurchilanhaaramj_zogsson')));
            $det->tush_name = Request::input('zurchilanhaaramj_tushaalner');  
            $det->tush_alba = Request::input('zurchilanhaaramj_tushaal');  
            $det->reason =str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilanhaaramj_reason')))));
            $det->save();
    }
     public function destroyattention($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('anhaaramj buuj suusan deleted');
       
    }
        public function updateattention()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilanhaaramj_fault'))->exists();
        if ($department == true) {
                $department = DB::table('Fault')
                ->where('fault_id', Request::input('ribbonzurchilanhaaramj_fault'))->update(['fault_from' =>Request::input('zurchilanhaaramj_statmodal') ,'fault_to' =>Request::input('zurchilanhaaramj_statmodal'),'updated_at' => Carbon::now()]);
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilanhaaramj_fault'))->update(['stoptime' => date("H:i:s", strtotime(Request::input('zurchilanhaaramj_zogssonmodal'))),'tush_name' =>Request::input('zurchilanhaaramj_tushaalnermodal'),'tush_alba' =>Request::input('zurchilanhaaramj_tushaalmodal'),'reason' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilanhaaramj_reasonmodal'))))),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('anhaaramj buuj suusan updated');
       
    }
             public function addzurchilbuguiwch()
    {
            $buguiwch = new Fault;
            $buguiwch->ribbon_id = Request::input('ribbonzurchilbuguiwch_id');
            $buguiwch->fromstation = 84;
            $buguiwch->tostation = 84;
            $buguiwch->is_ribbon = Request::input('tuuzzut40');
            $buguiwch->fault_no = 102;
            $buguiwch->save();
                    activity()->performedOn($buguiwch)->log('buguiwch added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax; 
            $det->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilbuguiwch_reason')))));
            $det->save();
  
    }
     public function destroybuguiwch($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('buguiwch deleted');
       
    }
        public function updatebuguiwch()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilbuguiwch_fault'))->exists();
        if ($department == true) {
            
                $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilbuguiwch_fault'))->update(['reason' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilbuguiwch_reasonmodal'))))),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('buguiwch updated');
       
    }
     public function addbusad()
    {
            $busad = new Fault;
            $busad->ribbon_id = Request::input('ribbonzurchilbusad_id');
            $busad->fromstation = 84;
            $busad->tostation = 84;
            $busad->is_ribbon = Request::input('tuuzzut27');
            $busad->fault_time =Carbon::now()->toDateTimeString();
            $busad->fault_no = 41;
            $busad->save();
                    activity()->performedOn($busad)->log('Busad added');
            $faultmax = Fault::max('fault_id');
            $det = new FaultDet;
            $det->fault_id = $faultmax;
            $det->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilbusad_reason')))));
            $det->save();
    }
    public function addbusaduzuulelt()
    {
        $busad = new Fault;
        $busad->ribbon_id = Request::input('busad_id');
        $busad->fromstation = 84;
        $busad->tostation = 84;
        $busad->is_ribbon = Request::input('tuuzzut27');
        $busad->fault_time =Carbon::now()->toDateTimeString();
        $busad->fault_no = 141;
        $busad->save();
        activity()->performedOn($busad)->log('Busad added');
        $faultmax = Fault::max('fault_id');
        $det = new FaultDet;
        $det->fault_id = $faultmax;
        $det->reason = str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('busad_reason')))));
        $det->save();
    }
     public function destroybusad($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
         return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
          activity()->log('busad deleted');
       
    }
    public function destroybusaduzuulelt($id)
    {
        FaultDet::where('fault_id', '=', $id)->delete();
        Fault::where('fault_id', '=', $id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
        activity()->log('busad deleted');

    }
    public function updatebusaduzuulelt()
    {
        $department = DB::table('V_FAULT_DET')
            ->where('fault_id', Request::input('ribbonbusaduzuulelt_fault'))->exists();
        if ($department == true) {
            $urtuudet = DB::table('FAULT_DET')
                ->where('fault_id', Request::input('ribbonbusaduzuulelt_fault'))->update(['reason' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('busad_reason'))))),'updated_at' => Carbon::now()]);
        }

        return response()->json([
            'success' => 'Record has been updated successfully!'
        ]);
        activity()->log('busad updated');

    }
        public function updatebusad()
    {
        $department = DB::table('V_FAULT_DET')
                ->where('fault_id', Request::input('ribbonzurchilbusad_fault'))->exists();
        if ($department == true) {
              $urtuudet = DB::table('FAULT_DET')
               ->where('fault_id', Request::input('ribbonzurchilbusad_fault'))->update(['reason' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('zurchilbusad_reason'))))),'updated_at' => Carbon::now()]);
         }
  
         return response()->json([
        'success' => 'Record has been updated successfully!'
    ]);
          activity()->log('busad updated');
       
    }
    public function refresh()
    {


        if(Request::input('tuuzmarsh') != NULL){

            $department = DB::table('Ribbon')
                ->where('route_id', Request::input('tuuzmarsh'))->get();

            $stat = DB::table('V_MARSHBUREL')->where('marshid', '=',Request::input('tuuzmarsh'))->where('depocode', '=', Auth::user()->depo_id)->get();
            $zut = DB::table('ZUTGUUR.MARSHZUT')->where('marshid', '=',Request::input('tuuzmarsh'))->where('depocode', '=', Auth::user()->depo_id)->get();
            $brig = DB::table('ZUTGUUR.MARSHBRIG')->where('marshid', '=',Request::input('tuuzmarsh'))->where('depocode', '=', Auth::user()->depo_id)->get();
            foreach ($stat as $row) {
                $gol =$row->sgolnum + $row->achgol + $row->empgol;
                $ribbon = new Ribbon;
                $ribbon->route_id = Request::input('tuuzmarsh');
                $ribbon->depo_id = Auth::user()->depo_id;
                $ribbon->speedcontrollerno =  $department[0]->speedcontrollerno;
                $ribbon->zutnumber = $zut[0]->zutnumber;
                $ribbon->locserial=  $zut[0]->seriname;
                $ribbon->locno=  $zut[0]->sericode;
                $ribbon->is_ribbon= 1;
                $ribbon->starttime= $brig[0]->arrtime;
                $ribbon->endtime= $brig[0]->deptime;
                $ribbon->fromstation = $row->stat1code;
                $ribbon->tostation = $row->stat2code;
                $ribbon->train_no= $row->trainid;
                $ribbon->split_id= $row->splitid;
                $ribbon->train_cleanweight= $row->cleanwght;
                $ribbon->train_dirtyweight=$row->dirtywght;
                $ribbon->train_gol= $gol;
                $ribbon->workid= $row->workid;
                $ribbon->patchmin =  $department[0]->patchmin;

                $ribbon->translator_id= Auth::user()->id;
                $ribbon->create_who= Auth::user()->id;
                $ribbon->translate_date= Carbon::now()->toDateTimeString();

                $ribbon->save();
                activity()->performedOn($ribbon)->log('Ribbon added');

            }
            DB::table('Ribbon')->where('ribbon_id', '=',  $department[0]->ribbon_id)->delete();
            $achaa = DB::select("SELECT
   DISTINCT q1.MARSHYEAR,q1.MARSHMONTH,q1.DEPOCODE,q1.MARSHID,q1.MASHCODE,UNISTR(REPLACE(REPLACE(REPLACE(ASCIISTR(q1.MASHNAME),'\04E9','\0435'),'\04AF','v'),'\04E8','\0415')) as MASHNAME ,q1.TUSLCODE , UNISTR(REPLACE(REPLACE(REPLACE(ASCIISTR(q1.TUSLNAME),'\04E9','\0435'),'\04AF','v'),'\04E8','\0415')) as TUSLNAME,q1.ARRTIME,q1.DEPTIME, q3.seriname, q3.sericode, r.speedcontrollerno, r.patchmin, r.translator_id,v.name,  r.translate_date, r.train_no, q1.brigcode, f.fault_count, q3.zutnumber, r.train_dirtyweight, r.train_gol, r.train_cleanweight, SUBSTR(r.workid,1,1) as workid, r.fromstation, r.tostation, r.tostat, r.fromstat
FROM
    (select  * from ZUTGUUR.MARSHBRIG t where t.marshid=".Request::input('tuuzmarsh')." order by arrtime desc) q1
   INNER JOIN
    (select seriname,sericode, marshid, marshyear, marshmonth,zutnumber from ZUTGUUR.MARSHZUT t ) q3 on q3.marshid = q1.marshid and q3.marshyear=q1.marshyear and q3.marshmonth = q1.marshmonth
        LEFT JOIN V_Ribbon r on r.route_id=q1.marshid 
        LEFT JOIN Users v on v.id=r.translator_id
        LEFT JOIN (select ribbon_id, count(ribbon_id) as fault_count from fault k, fault_detail i  where i.fault_detail_id=k.fault_no and i.fault_type=2 group by ribbon_id) f on f.ribbon_id= r.ribbon_id 
      order by q1.arrtime desc");
        }

       else{
           $achaa = [];
       }
        return view('devter.refresh')->with(['achaa'=>$achaa]);
    }
}
