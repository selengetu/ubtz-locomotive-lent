<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\FaultDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TailanController extends Controller
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
    $startdate= Input::get('month');

    if ($startdate !=0 && $startdate!=NULL) {
        $startdate= Input::get('month');
    }
    else{
        $startdate= Carbon::now()->format('Y/m');
    }
    if(Auth::user()->grant_id == 1){
      $depoid ="1,2,3,13,5";
    }
    else{
      $depoid = Auth::user()->depo_id;
    }

    $year = (substr($startdate, 0, 4));
    $month = (substr($startdate, 5, 2));
    $year1 ='2022';
    $achaa=DB::select("SELECT sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh
FROM
(
 select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.train_dirtyweight,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) as workcountid from RIBBON t,
        ZUTGUUR.Marshbrig b where b.marshyear=".$year." and b.marshmonth = ".$month." and b.marshid=t.route_id and b.depocode in (".$depoid. ") and b.depocode=t.depo_id
)
PIVOT
(
  COUNT( workcountid)
  FOR workcountid IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
$achaa2019=DB::select("SELECT sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh
FROM
(
 select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.train_dirtyweight,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) as workcountid from RIBBON t,
        ZUTGUUR.Marshbrig b where b.marshyear=".$year1." and b.marshmonth = ".$month." and b.marshid=t.route_id and b.depocode in (".$depoid. ") and b.depocode=t.depo_id
)
PIVOT
(
  COUNT( workcountid)
  FOR workcountid IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
    $achaa2=DB::select("SELECT sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh
FROM
(
 select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.train_dirtyweight,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) as workcountid from RIBBON t,
        ZUTGUUR.Marshbrig b where b.marshyear=".$year." and b.marshmonth between 1 and ".$month."  and b.marshid=t.route_id and b.depocode in (".$depoid. ") and b.depocode=t.depo_id
)
PIVOT
(
  COUNT( workcountid)
  FOR workcountid IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];

if($month ==3){
    $m = "(1,2,3)";

}
    if($month==6){
        $m = "(4,5,6)";
    }
    if($month==9){
        $m = "(7,8,9)";
    }
    if($month ==12){
        $m = "(10,11,12)";
    }
    if($month ==1 or $month ==2 or $month ==4 or $month ==5 or $month ==7 or $month ==8 or $month ==10 or $month ==11){
        $m = "($month)";
    }
    $achaa22019=DB::select("SELECT sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
    sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh
    FROM
    (
     select 
            distinct
            b.marshyear,
            b.marshmonth,
            b.depocode,
           t.route_id,
           t.depo_id,
           t.zutnumber,
           t.locserial,
           t.locno,
           t.train_dirtyweight,
           t.is_fault,
           t.train_no,
           SUBSTR(t.workid, 1, 1) as workcountid from RIBBON t,
            ZUTGUUR.Marshbrig b where b.marshyear=".$year1." and b.marshmonth between 1 and ".$month."  and b.marshid=t.route_id and b.depocode in (".$depoid. ") and b.depocode=t.depo_id
    )
    PIVOT
    (
      COUNT( workcountid)
      FOR workcountid IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
    )")[0];
   
    $achaa3=DB::select("SELECT sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh
FROM
(
 select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.train_dirtyweight,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) as workcountid from RIBBON t,
        ZUTGUUR.Marshbrig b where b.marshyear=".$year." and b.marshmonth in ".$m."  and b.marshid=t.route_id and b.depocode in (".$depoid. ") and b.depocode=t.depo_id
)
PIVOT
(
  COUNT( workcountid)
  FOR workcountid IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
$achaa32019=DB::select("SELECT sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh
FROM
(
 select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.train_dirtyweight,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) as workcountid from RIBBON t,
        ZUTGUUR.Marshbrig b where b.marshyear=".$year1." and b.marshmonth in ".$m."  and b.marshid=t.route_id and b.depocode in (".$depoid. ") and b.depocode=t.depo_id
)
PIVOT
(
  COUNT( workcountid)
  FOR workcountid IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
    $hurd=DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year1." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=36
                                 ) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");
                            $hurd =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                           inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=36
                                 ) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");
    $hurd2 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year." 
                                  and g.marshmonth between 1 and ".$month."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=36
                                ) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");
    $hurd3 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year." 
                                  and g.marshmonth in ".$m."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=36
                                ) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");

    $yaraltai =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");

    $yaraltai2 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=".$year." 
                                  and g.marshmonth between 1 and ".$month."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltai3 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=".$year." 
                                  and g.marshmonth in ".$m."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltaimin =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype,
                            d.stoptime
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltaimin2 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype,
                            d.stoptime
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=".$year." 
                                  and g.marshmonth between 1 and ".$month."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltaimin3 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype,
                            d.stoptime
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=".$year." 
                                  and g.marshmonth in ".$m."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltai36 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");

    $yaraltai362 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai363 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai36min =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai36min2 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");

    $yaraltai36min3 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai35 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai352 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=".$year."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,stop_id");

    $yaraltai353 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=".$year."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai35min =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai35min2 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");

    $yaraltai35min3 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai37 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai372 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");

    $yaraltai373 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai37min =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai37min2 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");

    $yaraltai37min3 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai38 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai382 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");

    $yaraltai383 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai38min =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai38min2 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");

    $yaraltai38min3 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year."  and g.marshmonth  in ".$m."  and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $zurchil =DB::select("select
                                        d.fault_detail_id, d.fault_detail_name, count(q1.fault_id) as cnt
                                        from
                                        (select q.* from (select
                                        f.fault_id,
                                        f.fault_no
                                              
                                        from FAULT f,
                                        ribbon t,  
                                         ZUTGUUR.Marshbrig b
                                         where t.ribbon_id=f.ribbon_id
                                          and b.marshid=t.route_id
                                          and b.depocode=t.depo_id  
                                          and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
    $zurchil2 =DB::select("select
                                        d.fault_detail_id, d.fault_detail_name, count(q1.fault_id) as cnt
                                        from
                                        (select q.* from (select
                                        f.fault_id,
                                        f.fault_no
                                              
                                        from FAULT f,
                                        ribbon t,  
                                         ZUTGUUR.Marshbrig b
                                         where t.ribbon_id=f.ribbon_id
                                          and b.marshid=t.route_id  
                                          and b.depocode=t.depo_id
                                          and  b.marshyear=".$year."  and b.marshmonth  between 1 and ".$month." and b.depocode in (".$depoid. ")
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                        ) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");

    $zurchil3  =DB::select("select
                                        d.fault_detail_id, d.fault_detail_name, count(q1.fault_id) as cnt
                                        from
                                        (select q.* from (select
                                        f.fault_id,
                                        f.fault_no
                                              
                                        from FAULT f,
                                        ribbon t,  
                                         ZUTGUUR.Marshbrig b
                                         where t.ribbon_id=f.ribbon_id
                                          and b.marshid=t.route_id 
                                          and b.depocode=t.depo_id 
                                          and  b.marshyear=".$year."  and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
    $tormoz =DB::select("select
  e.broketype_id, e.broketype_name, count(q.broketype) as cnt
  from
  (select
       f.fault_id,
       f.fault_no,
       d.broketype
       from FAULT f,
       ribbon t,  
       ZUTGUUR.Marshbrig b,
       fault_det d
         where t.ribbon_id=f.ribbon_id
         and b.marshid=t.route_id 
         and b.depocode=t.depo_id 
         and d.fault_id=f.fault_id 
         and f.fault_no=37
         and d.broketype is not null
         and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
    $tormoz2=DB::select("select
  e.broketype_id, e.broketype_name, count(q.broketype) as cnt
  from
  (select
       f.fault_id,
       f.fault_no,
       d.broketype
       from FAULT f,
       ribbon t,  
       ZUTGUUR.Marshbrig b,
       fault_det d
         where t.ribbon_id=f.ribbon_id
         and b.marshid=t.route_id  
         and d.fault_id=f.fault_id 
         and b.depocode=t.depo_id
         and f.fault_no=37
         and d.broketype is not null
         and   b.marshyear=".$year."  and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ")
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
    $tormoz3 =DB::select("select
  e.broketype_id, e.broketype_name, count(q.broketype) as cnt
  from
  (select
       f.fault_id,
       f.fault_no,
       d.broketype
       from FAULT f,
       ribbon t,  
       ZUTGUUR.Marshbrig b,
       fault_det d
         where t.ribbon_id=f.ribbon_id
         and b.marshid=t.route_id
         and b.depocode=t.depo_id 
         and d.fault_id=f.fault_id 
         and f.fault_no=37
         and d.broketype is not null
         and   b.marshyear=".$year."  and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
    $niitzurchil =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.depocode=t.depo_id
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
    $niitzurchil2 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.depocode=t.depo_id
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year."  and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ")) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
    $niitzurchil3=DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.depocode=t.depo_id
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year."  and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
    $orohachaa =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        group by t.route_id, t.workid) q2
                                        
     PIVOT
(
  COUNT( worktype)
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];

    $orohachaa2 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype
                                        from  ribbon t
                                       inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth  between 1 and ".$month." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        group by t.route_id, t.workid) q2
                                        
     PIVOT
(
  COUNT( worktype)
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
    $orohachaa3 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth  in ".$m."and g.depocode in (".$depoid. ") and f.fault_no=21
                                        group by t.route_id, t.workid) q2
                                        
     PIVOT
(
  COUNT( worktype)
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];

    $orohachaamin =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype,
                                       q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                       where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        ) q2
                                        
     PIVOT
(
  SUM(SUBSTR(stoptime, 1, 2)*60 + SUBSTR(stoptime, 4, 2))
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
    $orohachaamin2 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype,
                                       q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                       where g.marshyear=".$year." and g.marshmonth  between 1 and ".$month." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        ) q2
                                        
     PIVOT
(
  SUM(SUBSTR(stoptime, 1, 2)*60 + SUBSTR(stoptime, 4, 2))
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
    $orohachaamin3 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype,
                                       q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                       where g.marshyear=".$year." and g.marshmonth  in ".$m." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        ) q2
                                        
     PIVOT
(
  SUM(SUBSTR(stoptime, 1, 2)*60 + SUBSTR(stoptime, 4, 2))
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];

    $uharsan =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsan2 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsan3=DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year."  and e.marshmonth  between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsanmin =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                   inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8   and  e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsanmin2 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsanmin3 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $hoorond =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $hoorondmin =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $techno =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $technomin =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120  and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $iluu=DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119 and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $iluumin=DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
      $buuj=DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=9 and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                        ");
      $buujmin=DB::select("select
                                    sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=9 and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                        ");                                
    $tuslamjzammin =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode in (".$depoid. ") ");
    $tuslamjzam2 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id  and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuu =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuumin =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode in (".$depoid. ") ");
    $speed=DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id and t.depo_id=g.depocode
                            and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
    $hurdniit =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where  t.marshyear=".$year." and t.marshmonth=".$month." and t.depocode in (".$depoid. ")");
    $yaraltainiit =DB::select("select count(route_id) as too from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $yaraltainiitmin = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $hotsrolt=DB::select("select q2.depo_id,q2.marshyear, q2.marshmonth,sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60)) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and g.depocode=t.depo_id and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
    $hoorond2 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $hoorondmin2 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2  and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $techno2 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $technomin2=DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $iluu2 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and  e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and f.fault_no=12 and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $iluumin2 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and f.fault_no=12 and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
  $buuj2 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and  e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=9 and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                        ");
        $buujmin2 =DB::select("select
                                    sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=9 and e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                        ");
    $tuslamjzammin2=DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year."  and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ") ");
    $tuslamjzam2 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=".$year."  and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuu2 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=".$year."  and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuumin2 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year."  and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ") ");
    $speed2 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id and t.depo_id=g.depocode
                            and  g.marshyear=".$year." and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
    $hurdniit2 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=".$year."  and t.marshmonth between 1 and ".$month." and t.depocode in (".$depoid. ")");
    $yaraltainiit2=DB::select("select count(route_id) as too from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $yaraltainiitmin2= DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=".$year."  and e.marshmonth between 1 and ".$month." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $hotsrolt2 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and g.depocode=t.depo_id and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=".$year."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
    $hoorond3 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear =".$year1." and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $hoorondmin3 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year."  and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $techno3 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and e.marshyear=".$year."  and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $iluu3 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and  e.marshyear=".$year."  and e.marshmonth in ".$m." and f.fault_no=12 and e.marshyear=".$year."  and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $buuj3 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year."  and e.marshmonth in ".$m." and f.fault_no=9 and e.marshyear=".$year."  and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");    
    $technomin3 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and  e.marshyear=".$year."  and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $iluumin3 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and  e.marshyear=".$year."  and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $buujmin3 =DB::select("select
                                    sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=9 and  e.marshyear=".$year."  and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                        ");
    $tuslamjzammin3=DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year."  and b.marshmonth in ".$m." and b.depocode in (".$depoid. ") ");
    $tuslamjzam3 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=".$year."  and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuu3 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=".$year."  and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuumin3 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth in ".$m." and b.depocode in (".$depoid. ") ");
    $speed3 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id and t.depo_id=g.depocode
                            and  g.marshyear=".$year." and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
    $hurdniit3=DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=".$year."  and t.marshmonth in ".$m." and t.depocode in (".$depoid. ")");
    $yaraltainiit3=DB::select("select count(route_id) as too from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=".$year."  and e.marshmonth in ".$m." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $yaraltainiitmin3 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=".$year."  and e.marshmonth in ".$m." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $hotsrolt3 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid  and g.depocode=t.depo_id and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=".$year."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
$hurd2019 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
(select
g.marshyear,
g.marshmonth,
g.depocode,
d.broketype
from  ribbon t
inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
inner join fault f on f.ribbon_id = t.ribbon_id
left join fault_det d on d.fault_id=f.fault_id
where t.depo_id=g.depocode
      and e.depocode=t.depo_id 
      and e.marshyear=g.marshyear 
      and e.marshmonth=g.marshmonth 
      and g.marshyear=".$year1." 
      and g.marshmonth=".$month." 
      and g.depocode in (".$depoid. ") 
      and f.fault_no=36
     ) o,
broke_type b  
where  b.broketype_id= o.broketype(+) 
        and b.broke_type =3 
group by b.broketype_id, b.broketype_name");
$hurd22019 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year1." 
                                  and g.marshmonth between 1 and ".$month."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=36
                                ) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");
    $hurd32019 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year1." 
                                  and g.marshmonth in ".$m."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=36
                                ) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");

    $yaraltai2019 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year1." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");

    $yaraltai22019 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=".$year1." 
                                  and g.marshmonth between 1 and ".$month."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltai32019 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=".$year1." 
                                  and g.marshmonth in ".$m."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltaimin2019 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype,
                            d.stoptime
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year1." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltaimin22019 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype,
                            d.stoptime
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=".$year1." 
                                  and g.marshmonth between 1 and ".$month."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltaimin32019 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype,
                            d.stoptime
                            from  ribbon t
                          inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id and e.depocode=t.depo_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=".$year1."
                                  and g.marshmonth in ".$m."
                                  and g.depocode in (".$depoid. ") 
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
    $yaraltai362019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");

    $yaraltai3622019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year1." and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai363 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
                                $yaraltai3632019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai36min2019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai36min22019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");

    $yaraltai36min32019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai352019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and  g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai3522019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=".$year1."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");

    $yaraltai3532019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=".$year1." and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai35min2019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai35min22019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
                               

    $yaraltai35min32019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai372019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and  g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai3722019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");

    $yaraltai3732019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai37min2019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai37min22019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");

    $yaraltai37min32019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");
    $yaraltai382019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and  g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai3822019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year1."  and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");

    $yaraltai3832019 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year1." and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai38min2019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $yaraltai38min22019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year1." and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, s.stop_id");

    $yaraltai38min32019 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year1." and g.marshmonth  in ".$m."  and g.depocode in (".$depoid. ")
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name,s.stop_id");
    $zurchil2019 =DB::select("select
                                        d.fault_detail_id, d.fault_detail_name, count(q1.fault_id) as cnt
                                        from
                                        (select q.* from (select
                                        f.fault_id,
                                        f.fault_no
                                              
                                        from FAULT f,
                                        ribbon t,  
                                         ZUTGUUR.Marshbrig b
                                         where t.ribbon_id=f.ribbon_id
                                          and b.marshid=t.route_id  
                                          and b.depocode=t.depo_id
                                          and  b.marshyear=".$year1." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
    $zurchil22019 =DB::select("select
                                        d.fault_detail_id, d.fault_detail_name, count(q1.fault_id) as cnt
                                        from
                                        (select q.* from (select
                                        f.fault_id,
                                        f.fault_no
                                              
                                        from FAULT f,
                                        ribbon t,  
                                         ZUTGUUR.Marshbrig b
                                         where t.ribbon_id=f.ribbon_id
                                          and b.marshid=t.route_id  
                                          and b.depocode=t.depo_id
                                          and  b.marshyear=".$year1." and b.marshmonth  between 1 and ".$month." and b.depocode in (".$depoid. ")
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");

    $zurchil32019  =DB::select("select
                                        d.fault_detail_id, d.fault_detail_name, count(q1.fault_id) as cnt
                                        from
                                        (select q.* from (select
                                        f.fault_id,
                                        f.fault_no
                                              
                                        from FAULT f,
                                        ribbon t,  
                                         ZUTGUUR.Marshbrig b
                                         where t.ribbon_id=f.ribbon_id
                                          and b.marshid=t.route_id  
                                          and b.depocode=t.depo_id
                                          and  b.marshyear=".$year1." and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
    $tormoz2019 =DB::select("select
  e.broketype_id, e.broketype_name, count(q.broketype) as cnt
  from
  (select
       f.fault_id,
       f.fault_no,
       d.broketype
       from FAULT f,
       ribbon t,  
       ZUTGUUR.Marshbrig b,
       fault_det d
         where t.ribbon_id=f.ribbon_id
         and b.marshid=t.route_id
         and b.depocode=t.depo_id 
         and d.fault_id=f.fault_id 
         and f.fault_no=37
         and d.broketype is not null
       
         and  b.marshyear=".$year1." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
    $tormoz22019 =DB::select("select
  e.broketype_id, e.broketype_name, count(q.broketype) as cnt
  from
  (select
       f.fault_id,
       f.fault_no,
       d.broketype
       from FAULT f,
       ribbon t,  
       ZUTGUUR.Marshbrig b,
       fault_det d
         where t.ribbon_id=f.ribbon_id
         and b.marshid=t.route_id  
         and b.depocode=t.depo_id
         and d.fault_id=f.fault_id 
         and f.fault_no=37
         and d.broketype is not null
      
         and   b.marshyear=".$year1." and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ")
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
    $tormoz32019 =DB::select("select
  e.broketype_id, e.broketype_name, count(q.broketype) as cnt
  from
  (select
       f.fault_id,
       f.fault_no,
       d.broketype
       from FAULT f,
       ribbon t,  
       ZUTGUUR.Marshbrig b,
       fault_det d
         where t.ribbon_id=f.ribbon_id
         and b.marshid=t.route_id  
         and b.depocode=t.depo_id
         and d.fault_id=f.fault_id 
         and f.fault_no=37
         and d.broketype is not null
          and d.is_techact = 2
         and   b.marshyear=".$year1." and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
    $niitzurchil2019 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.depocode=t.depo_id
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year1." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
    $niitzurchil22019 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.depocode=t.depo_id
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year1." and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ")) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
    $niitzurchil32019 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.depocode=t.depo_id
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year1." and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
    $orohachaa2019 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year1." and g.marshmonth = ".$month." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        group by t.route_id, t.workid) q2
                                        
     PIVOT
(
  COUNT( worktype)
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];

    $orohachaa22019 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year1." and g.marshmonth  between 1 and ".$month." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        group by t.route_id, t.workid) q2
                                        
     PIVOT
(
  COUNT( worktype)
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
    $orohachaa32019 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year1." and g.marshmonth  in ".$m."and g.depocode in (".$depoid. ") and f.fault_no=21
                                        group by t.route_id, t.workid) q2
                                        
     PIVOT
(
  COUNT( worktype)
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];

    $orohachaamin2019 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype,
                                       q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                       where g.marshyear=".$year1." and g.marshmonth = ".$month." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        ) q2
                                        
     PIVOT
(
  SUM(SUBSTR(stoptime, 1, 2)*60 + SUBSTR(stoptime, 4, 2))
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
    $orohachaamin22019 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype,
                                       q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                       where g.marshyear=".$year1." and g.marshmonth  between 1 and ".$month." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        ) q2
                                        
     PIVOT
(
  SUM(SUBSTR(stoptime, 1, 2)*60 + SUBSTR(stoptime, 4, 2))
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];
    $orohachaamin32019 =DB::select("select sum(suud) as suud ,sum(ach) as ach ,sum(aj) as aj ,sum(bteg) as bteg , 
sum(sel) as sel , sum(uz) as uz , sum(tur) as tur , sum(oros) as oros ,  sum(tsonh) as tsonh from (select
                                        t.route_id,
                                       SUBSTR(workid, 1, 1) as worktype,
                                       q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                       where g.marshyear=".$year1." and g.marshmonth  in ".$m." and g.depocode in (".$depoid. ") and f.fault_no=21
                                        ) q2
                                        
     PIVOT
(
  SUM(SUBSTR(stoptime, 1, 2)*60 + SUBSTR(stoptime, 4, 2))
  FOR worktype IN (1 as suud, 2 as ach ,3 as aj,4 as bteg, 5 as sel ,6 as uz ,7 as tur, 8 as oros, 9 as tsonh )
)")[0];

    $uharsan2019 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsan22019 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsan32019 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year1." and e.marshmonth  between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsanmin2019 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                   inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8   and  e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsanmin22019 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $uharsanmin32019 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    inner join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $hoorond2019 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $hoorondmin2019 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $techno =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and e.marshyear=".$year." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $techno2019 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120  and e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $technomin2019 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $iluu2019 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119 and e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
    $iluumin2019 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                    ");
     $buuj2019 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=9 and e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                        ");
    $buujmin2019 =DB::select("select
                                    sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=9 and e.marshyear=".$year1." and e.marshmonth=".$month." and g.depocode in (".$depoid. ")
                                        ");
    $tuslamjzammin2019 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year1." and b.marshmonth=".$month." and b.depocode in (".$depoid. ") ");
    $tuslamjzam2019 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year1." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjzam =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and  e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");                           
    $tuslamjurtuu2019 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year1." and b.marshmonth=".$month." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuumin2019 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year1." and b.marshmonth=".$month." and b.depocode in (".$depoid. ") ");
    $speed2019 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id and t.depo_id=g.depocode
                            and g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
    $hurdniit =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where  t.marshyear=".$year." and t.marshmonth=".$month." and t.depocode in (".$depoid. ")");
    $hurdniit2019 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where  t.marshyear=".$year1." and t.marshmonth=".$month." and t.depocode in (".$depoid. ")");
    $yaraltainiit =DB::select("select count(route_id) as too from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $yaraltainiit2019=DB::select("select count(route_id) as too from  ribbon t
  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
    inner join fault f on f.ribbon_id = t.ribbon_id
    left join fault_det d on d.fault_id=f.fault_id
    LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year1." and e.marshmonth=".$month." and t.depo_id in (".$depoid. ") and f.fault_no=35");
                                $yaraltainiitmin2019 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year1." and e.marshmonth=".$month." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $hotsrolt=DB::select("select q2.marshyear, q2.marshmonth,sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60)) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid  and g.depocode=t.depo_id and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")) q2     
group by q2.marshyear, q2.marshmonth");
$hotsrolt2019=DB::select("select q2.marshyear, q2.marshmonth,sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60)) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and g.depocode=t.depo_id and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and g.marshyear=".$year1." and g.marshmonth=".$month." and g.depocode in (".$depoid. ")) q2     
group by q2.marshyear, q2.marshmonth");
    $hoorond22019 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $hoorondmin22019 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $techno22019 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $technomin22019 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $iluu22019 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and  e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and f.fault_no=12 and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
    $iluumin22019 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and f.fault_no=12  and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                    ");
     $buuj22019 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and  e.marshyear=g.marshyear and e.marshmonth=g.marshmonth  and f.fault_no=9 and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                        ");
        $buujmin22019 =DB::select("select
                                    sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=9 and e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")
                                        ");
    $tuslamjzammin22019 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year1." and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ") ");
    $tuslamjzam22019 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=".$year1." and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuu22019 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=".$year1." and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuumin22019 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year1." and b.marshmonth between 1 and ".$month." and b.depocode in (".$depoid. ") ");
    $speed22019 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id and t.depo_id=g.depocode
                            and  g.marshyear=".$year1." and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
    $hurdniit22019 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=".$year1." and t.marshmonth between 1 and ".$month." and t.depocode in (".$depoid. ")");
    $yaraltainiit22019 =DB::select("select count(route_id) as too from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $yaraltainiitmin22019 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=".$year1." and e.marshmonth between 1 and ".$month." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $hotsrolt22019 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid  and g.depocode=t.depo_id and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=".$year1." and g.marshmonth between 1 and ".$month." and g.depocode in (".$depoid. ")) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
    $hoorond32019 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year1." and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $hoorondmin32019 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year1." and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $techno32019 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and e.marshyear=".$year1." and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $iluu32019 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and  e.marshyear=".$year1." and e.marshmonth in ".$m." and f.fault_no=12 and e.marshyear=".$year1." and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $buuj32019 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year1." and e.marshmonth in ".$m." and f.fault_no=9 and e.marshyear=".$year1." and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                        ");
    $technomin32019 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)<120 and e.marshyear=".$year1." and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $iluumin32019 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>119  and  e.marshyear=".$year1." and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                    ");
    $buujmin32019 =DB::select("select
                                    sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                  inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=9 and  e.marshyear=".$year1." and e.marshmonth in ".$m." and g.depocode in (".$depoid. ")
                                        ");
    $tuslamjzammin32019 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year1." and b.marshmonth in ".$m." and b.depocode in (".$depoid. ") ");
    $tuslamjzam32019 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=".$year1." and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuu32019=DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and t.depo_id= b.depocode and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=".$year1." and b.marshmonth in ".$m." and b.depocode in (".$depoid. ")
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuumin32019 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year1." and b.marshmonth in ".$m." and b.depocode in (".$depoid. ") ");
    $speed32019 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id and t.depo_id=g.depocode
                            and  g.marshyear=".$year1." and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
    $hurdniit32019 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=".$year1." and t.marshmonth in ".$m." and t.depocode in (".$depoid. ")");
    $yaraltainiit32019 =DB::select("select count(route_id) as too from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=".$year1." and e.marshmonth in ".$m." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $yaraltainiitmin32019 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                              inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=".$year1." and e.marshmonth in ".$m." and t.depo_id in (".$depoid. ") and f.fault_no=35");
    $hotsrolt32019 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid  and g.depocode=t.depo_id and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=".$year1." and g.marshmonth in ".$m." and g.depocode in (".$depoid. ")) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");

    return view('tailan.tuuzorchuulsan')->with(['year'=>$year,'startdate'=>$startdate,'month'=>$month,'hurd'=>$hurd,'yaraltai'=>$yaraltai,'yaraltai35'=>$yaraltai35,'yaraltai36'=>$yaraltai36,'yaraltai37'=>$yaraltai37,'yaraltai38'=>$yaraltai38,'yaraltaimin'=>$yaraltaimin,'yaraltai35min'=>$yaraltai35min,'yaraltai36min'=>$yaraltai36min,'yaraltai37min'=>$yaraltai37min,'yaraltai38min'=>$yaraltai38min,'zurchil'=>$zurchil,'niitzurchil'=>$niitzurchil,'orohachaa'=>$orohachaa,'orohachaamin'=>$orohachaamin,'uharsan'=>$uharsan ,'uharsanmin'=>$uharsanmin,'hoorond'=>$hoorond,'hoorondmin'=>$hoorondmin,'techno'=>$techno,'technomin'=>$technomin,'iluu'=>$iluu,'iluumin'=>$iluumin,'buuj'=>$buuj,'buujmin'=>$buujmin,'tuslamjzam'=>$tuslamjzam,'tuslamjurtuu'=>$tuslamjurtuu,'tuslamjzammin'=>$tuslamjzammin,'tuslamjurtuumin'=>$tuslamjurtuumin, 'speed'=>$speed,'hotsrolt'=>$hotsrolt,'tormoz'=>$tormoz,'hurdniit'=>$hurdniit,'yaraltainiit'=>$yaraltainiit,'yaraltainiitmin'=>$yaraltainiitmin
        ,'achaa2'=>$achaa2 ,'achaa'=>$achaa,'hurd2'=>$hurd2,'yaraltai2'=>$yaraltai2,'yaraltai352'=>$yaraltai352,'yaraltai362'=>$yaraltai362,'yaraltai372'=>$yaraltai372,'yaraltai382'=>$yaraltai382,'yaraltaimin2'=>$yaraltaimin2,'yaraltai35min2'=>$yaraltai35min2,'yaraltai36min2'=>$yaraltai36min2,'yaraltai37min2'=>$yaraltai37min2,'yaraltai38min2'=>$yaraltai38min2,'zurchil2'=>$zurchil2,'niitzurchil2'=>$niitzurchil2,'orohachaa2'=>$orohachaa2,'orohachaamin2'=>$orohachaamin2,'uharsan2'=>$uharsan2 ,'uharsanmin2'=>$uharsanmin2,'hoorond2'=>$hoorond2,'hoorondmin2'=>$hoorondmin2,'techno2'=>$techno2,'technomin2'=>$technomin2,'iluu2'=>$iluu2,'iluumin2'=>$iluumin2,'buuj2'=>$buuj2,'buujmin2'=>$buujmin2,'tuslamjzam2'=>$tuslamjzam2,'tuslamjurtuu2'=>$tuslamjurtuu2,'tuslamjzammin2'=>$tuslamjzammin2,'tuslamjurtuumin2'=>$tuslamjurtuumin2, 'speed2'=>$speed2,'hotsrolt2'=>$hotsrolt2,'tormoz2'=>$tormoz2,'hurdniit2'=>$hurdniit2,'yaraltainiit2'=>$yaraltainiit2,'yaraltainiitmin2'=>$yaraltainiitmin2
        ,'achaa3'=>$achaa3,'hurd3'=>$hurd3,'yaraltai3'=>$yaraltai3,'yaraltai353'=>$yaraltai353,'yaraltai363'=>$yaraltai363,'yaraltai373'=>$yaraltai373,'yaraltai383'=>$yaraltai383,'yaraltaimin3'=>$yaraltaimin3,'yaraltai35min3'=>$yaraltai35min3,'yaraltai36min3'=>$yaraltai36min3,'yaraltai37min3'=>$yaraltai37min3,'yaraltai38min3'=>$yaraltai38min3,'zurchil3'=>$zurchil3,'niitzurchil3'=>$niitzurchil3,'orohachaa3'=>$orohachaa3,'orohachaamin3'=>$orohachaamin3,'uharsan3'=>$uharsan3 ,'uharsanmin3'=>$uharsanmin3,'hoorond3'=>$hoorond3,'hoorondmin3'=>$hoorondmin3,'techno3'=>$techno3,'technomin3'=>$technomin3,'iluu3'=>$iluu3,'iluumin3'=>$iluumin3,'buuj3'=>$buuj3,'buujmin3'=>$buujmin3,'tuslamjzam3'=>$tuslamjzam3,'tuslamjurtuu3'=>$tuslamjurtuu3,'tuslamjzammin3'=>$tuslamjzammin3,'tuslamjurtuumin3'=>$tuslamjurtuumin3, 'speed3'=>$speed3,'hotsrolt3'=>$hotsrolt3,'tormoz3'=>$tormoz3,'hurdniit3'=>$hurdniit3,'yaraltainiit3'=>$yaraltainiit3,'yaraltainiitmin3'=>$yaraltainiitmin3,'hurd2019'=>$hurd2019,'yaraltai2019'=>$yaraltai2019,'yaraltai352019'=>$yaraltai352019,'yaraltai362019'=>$yaraltai362019,'yaraltai372019'=>$yaraltai372019,'yaraltai382019'=>$yaraltai382019,'yaraltaimin2019'=>$yaraltaimin2019,'yaraltai35min2019'=>$yaraltai35min2019,'yaraltai36min2019'=>$yaraltai36min2019,'yaraltai37min2019'=>$yaraltai37min2019,'yaraltai38min2019'=>$yaraltai38min2019,'zurchil2019'=>$zurchil2019,'niitzurchil2019'=>$niitzurchil2019,'orohachaa2019'=>$orohachaa2019,'orohachaamin2019'=>$orohachaamin2019,'uharsan2019'=>$uharsan2019 ,'uharsanmin2019'=>$uharsanmin2019,'hoorond2019'=>$hoorond2019,'hoorondmin2019'=>$hoorondmin2019,'techno2019'=>$techno2019,'technomin2019'=>$technomin2019,'iluu2019'=>$iluu2019,'iluumin2019'=>$iluumin2019,'buuj2019'=>$buuj2019,'buujmin2019'=>$buujmin2019,'tuslamjzam2019'=>$tuslamjzam2019,'tuslamjurtuu2019'=>$tuslamjurtuu2019,'tuslamjzammin2019'=>$tuslamjzammin2019,'tuslamjurtuumin2019'=>$tuslamjurtuumin2019, 'speed2019'=>$speed2019,'hotsrolt2019'=>$hotsrolt2019,'tormoz2019'=>$tormoz2019,'hurdniit2019'=>$hurdniit2019,'yaraltainiit2019'=>$yaraltainiit2019,'yaraltainiitmin2019'=>$yaraltainiitmin2019
        ,'achaa22019'=>$achaa22019 ,'achaa2019'=>$achaa2019,'hurd22019'=>$hurd22019,'yaraltai22019'=>$yaraltai22019,'yaraltai3522019'=>$yaraltai3522019,'yaraltai3622019'=>$yaraltai3622019,'yaraltai3722019'=>$yaraltai3722019,'yaraltai3822019'=>$yaraltai3822019,'yaraltaimin22019'=>$yaraltaimin22019,'yaraltai35min22019'=>$yaraltai35min22019,'yaraltai36min22019'=>$yaraltai36min22019,'yaraltai37min22019'=>$yaraltai37min22019,'yaraltai38min22019'=>$yaraltai38min22019,'zurchil22019'=>$zurchil22019,'niitzurchil22019'=>$niitzurchil22019,'orohachaa22019'=>$orohachaa22019,'orohachaamin22019'=>$orohachaamin22019,'uharsan22019'=>$uharsan22019 ,'uharsanmin22019'=>$uharsanmin22019,'hoorond22019'=>$hoorond22019,'hoorondmin22019'=>$hoorondmin22019,'techno22019'=>$techno22019,'technomin22019'=>$technomin22019,'iluu22019'=>$iluu22019,'iluumin22019'=>$iluumin22019, 'buuj22019'=>$buuj22019,'buujmin22019'=>$buujmin22019,'tuslamjzam22019'=>$tuslamjzam22019,'tuslamjurtuu22019'=>$tuslamjurtuu22019,'tuslamjzammin22019'=>$tuslamjzammin22019,'tuslamjurtuumin22019'=>$tuslamjurtuumin22019, 'speed22019'=>$speed22019,'hotsrolt22019'=>$hotsrolt22019,'tormoz22019'=>$tormoz22019,'hurdniit22019'=>$hurdniit22019,'yaraltainiit22019'=>$yaraltainiit22019,'yaraltainiitmin22019'=>$yaraltainiitmin22019
        ,'achaa32019'=>$achaa32019,'hurd32019'=>$hurd32019,'yaraltai32019'=>$yaraltai32019,'yaraltai3532019'=>$yaraltai3532019,'yaraltai3632019'=>$yaraltai3632019,'yaraltai3732019'=>$yaraltai3732019,'yaraltai3832019'=>$yaraltai3832019,'yaraltaimin32019'=>$yaraltaimin32019,'yaraltai35min32019'=>$yaraltai35min32019,'yaraltai36min32019'=>$yaraltai36min32019,'yaraltai37min32019'=>$yaraltai37min32019,'yaraltai38min32019'=>$yaraltai38min32019,'zurchil32019'=>$zurchil32019,'niitzurchil32019'=>$niitzurchil32019,'orohachaa32019'=>$orohachaa32019,'orohachaamin32019'=>$orohachaamin32019,'uharsan32019'=>$uharsan32019 ,'uharsanmin32019'=>$uharsanmin32019,'hoorond32019'=>$hoorond32019,'hoorondmin32019'=>$hoorondmin32019,'techno32019'=>$techno32019,'technomin32019'=>$technomin32019,'iluu32019'=>$iluu32019,'iluumin32019'=>$iluumin32019,'buuj32019'=>$buuj32019,'buujmin32019'=>$buujmin32019,'tuslamjzam32019'=>$tuslamjzam32019,'tuslamjurtuu32019'=>$tuslamjurtuu32019,'tuslamjzammin32019'=>$tuslamjzammin32019,'tuslamjurtuumin32019'=>$tuslamjurtuumin32019, 'speed32019'=>$speed32019,'hotsrolt32019'=>$hotsrolt32019,'tormoz32019'=>$tormoz32019,'hurdniit32019'=>$hurdniit32019,'yaraltainiit32019'=>$yaraltainiit32019,'yaraltainiitmin32019'=>$yaraltainiitmin32019]);
}
   
    public function urtuu30()
    {
        $query = "";
        $startdate= Input::get('urtuu30_start');
        $enddate= Input::get('urtuu30_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {

            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
        $z=DB::select("select
                        g.depocode,
                        s.statfullname as fromstationname,
                            count(f.fromstation) as count,
                         sum(SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2)) as sum
                        from  ribbon t
                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join fault f on f.ribbon_id = t.ribbon_id
                        left join fault_det d on d.fault_id=f.fault_id
                        inner join V_STATION s on f.fromstation=s.statcode
                        inner join V_STATION z on z.statcode=f.tostation
                        LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode= t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and (SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2))>29 and  (SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2))<120 and  t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by s.statfullname, g.depocode");
        $zurchil=DB::select('select  * from ZURCHIL_30  t where t.depocode =  '.Auth::user()->depo_id. ' '.$query.'');

        return view('tailan.urtuu30')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function urtuu120()
    {
        $query = "";
        $startdate= Input::get('urtuu120_start');
        $enddate= Input::get('urtuu120_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {

            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }
        $z=DB::select("select
                        g.depocode,
                        s.statfullname as fromstationname,
                            count(f.fromstation) as count,
                         sum(SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2)) as sum
                        from  ribbon t
                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join fault f on f.ribbon_id = t.ribbon_id
                        left join fault_det d on d.fault_id=f.fault_id
                        inner join V_STATION s on f.fromstation=s.statcode
                        inner join V_STATION z on z.statcode=f.tostation
                        LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode= t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and (SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2))>119 and t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by s.statfullname, g.depocode");
        $zurchil=DB::select('select  * from ZURCHIL_120  t where t.depocode =  '.Auth::user()->depo_id. ' '.$query.'');

        return view('tailan.urtuu120')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function anhaaramj()
    {
        $query = "";
        $startdate= Input::get('anhaaramj_start');
        $enddate= Input::get('anhaaramj_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }

         $zurchil=DB::select('select  st1.statfullname as fromstat, st2.statfullname as tostat, t.*, b.*, r.* from V_FAULT_DET t, ZUTGUUR.MARSHBRIG b , Ribbon r, zutguur.stations st1,zutguur.stations st2 where b.marshid=r.route_id and t.RIBBON_ID=r.ribbon_id and t.FAULT_NO=9 and st1.statcode= r.fromstation and st2.statcode= r.tostation and b.depocode = '.Auth::user()->depo_id. '  '.$query.' ');
           
        return view('tailan.anhaaramj')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
       public function attention()
    {
        $query = "";
        $startdate= Input::get('attention_start');
        $enddate= Input::get('attention_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }

         $zurchil=DB::select('select  * from V_ATTENTION_TAILAN t where t.depo_id = '.Auth::user()->depo_id. '  '.$query.' order by t.ARRTIME');
         $z=DB::select("select  sum(a.time) as time,
                        r.DEPO_ID, p.speed as speedname, count(p.speed) as count
                        from Attention a, ribbon t, attention_speed p, ribbon r, zutguur.marshbrig b
                        where a.ribbon_id=t.ribbon_id and p.attentionspeed_id=a.speed and r.ribbon_id= a.ribbon_id and b.marshid= t.route_id and t.depo_id= b.depocode and t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by p.speed, r.depo_id
                        order by p.speed");
        $z1=DB::select(" select  sum(a.time) as time,
                      t.DEPO_ID, s.statfullname as fromstat, s1.statfullname as tostat, count(a.attention_id) as count
                        from Attention a, ribbon t, V_STATION s, attention_speed p, V_STATION s1, zutguur.marshbrig b
                        where a.ribbon_id=t.ribbon_id and t.fromstation = s.statcode and p.attentionspeed_id=a.speed and t.tostation=s1.statcode and t.ribbon_id= a.ribbon_id and b.marshid= t.route_id and t.depo_id= b.depocode and t.depo_id = ".Auth::user()->depo_id. " " .$query."
                  group by s.statfullname, s1.statfullname, t.depo_id
                        order by s.statfullname");
        return view('tailan.attention')->with(['zurchil'=>$zurchil,'z'=>$z,'z1'=>$z1,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function hurdhemjigch()
    {
        $query = "";
        $startdate= Input::get('hurd_start');
        $enddate= Input::get('hurd_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
          $zurchil=DB::select('select  * from ZURCHIL_HURDHEMJIGCH t where t.depocode = '.Auth::user()->depo_id. '  '.$query.' ');
        
        return view('tailan.hurdhemjigch')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    } public function hurdhureegui()
    {
         $query = "";
        $startdate= Input::get('hurdhureegui_start');
        $enddate= Input::get('hurdhureegui_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
               $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
         
         $zurchil=DB::select('select  * from ZURCHIL_HURDHUREEGUI t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
           
        return view('tailan.hurdhureegui')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function dooshorson()
    {
        $query = "";
        $startdate= Input::get('doosh_start');
        $enddate= Input::get('doosh_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
      $z=DB::select("select
                        g.depocode,
                        g.mashname,
                        count(g.mashcode) as count,
                        substr(numtodsinterval(sum(SUBSTR(d.stoptime, 1, 2)*3600 + SUBSTR(d.stoptime, 4, 2)*60 + SUBSTR(d.stoptime, 7, 2)), 'SECOND'),12,  5) as sum
                        from  ribbon t
                      inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join fault f on f.ribbon_id = t.ribbon_id
                        left join fault_det d on d.fault_id=f.fault_id
                        LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode= t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=81 and  t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by g.mashname, g.depocode");
        $zurchil=DB::select('select  * from ZURCHIL_DOOSHORSON t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
       
        return view('tailan.dooshorson')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function technoiluu()
    {
        $query = "";
        $startdate= Input::get('techno_start');
        $enddate= Input::get('techno_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
        $z=DB::select("select
                        g.depocode,
                        s.statfullname as fromstationname,
                        count(f.fromstation) as count,
                        sum(d.constkilo) as sum
                        from  ribbon t
                      inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join fault f on f.ribbon_id = t.ribbon_id
                        left join fault_det d on d.fault_id=f.fault_id
                        inner join V_Station s on f.fromstation=s.statcode
                        inner join V_Station z on z.statcode=f.tostation
                        LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode= t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=83 and  t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by s.statfullname, g.depocode");

         $zurchil=DB::select('select  * from ZURCHIL_TECHNO t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
            
        return view('tailan.technoiluu')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function orohdohio()
{
    $query = "";
    $startdate= Input::get('oroh_start');
    $enddate= Input::get('oroh_end');
    if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
        $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
    }
    else
    {
        $query.=" and arrtime between sysdate-10 and sysdate";
        $startdate= Carbon::today()->subDays(10)->toDateString();
        $enddate=  Carbon::today()->toDateString();

    }
    $zurchil=DB::select('select  * from ZURCHIL_OROHDOHIO t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');

    return view('tailan.orohdohio')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
}
    public function busad()
    {
        $query = "";
        $se= Input::get('busad_query');
        $startdate= Input::get('busad_start');
        $enddate= Input::get('busad_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }
        if ($se != NULL or $se != 0) {
            $query.=  " and reason like '%".$se."%' or train_no like '%".$se."%' or mashname like '%".$se."%'";
        }
        else {
            $query.="";
        }

        $zurchil=DB::select('select  * from ZURCHIL_busad t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
  
        return view('tailan.busad')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function nagon()
    {
        $query = "";
        $startdate= Input::get('nagon_start');
        $enddate= Input::get('nagon_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }
        $achaa=DB::select('select  * from V_NAGON t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');

        $train=DB::select('select distinct t.ROUTE_ID, t.TRAIN_NO from V_Ribbon t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
        return view('tailan.niilberanhaaramj')->with(['achaa'=>$achaa,'train'=>$train,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function hiiergesen()
    {
        $query = "";
        $startdate= Input::get('hii_start');
        $enddate= Input::get('hii_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and arrtime between '".$startdate."' and '".$enddate." 23:59:59'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
            
        $zurchil=DB::select('select  * from ZURCHIL_HII t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
        return view('tailan.hiiergesen')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function graph()
    {
        $query = "";
        $startdate= Input::get('graph_start');
        $enddate= Input::get('graph_end');
        $type= Input::get('graph_type');
        if ($type!=NULL && $type !=0) {
            $query.=" and t.fault_no = '".$type."'";
        }
        else
        {
            $query.=" ";
        }
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and arrtime between '".$startdate."' and '".$enddate." 23:59:59'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }

        $zurchil=DB::select('select  * from ZURCHIL_GRAPH t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
        return view('tailan.graph')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate,'type'=>$type]);
    }
      public function yaraltaitormoz()
    {
        $query = "";
        $startdate= Input::get('yaraltai_start');
        $enddate= Input::get('yaraltai_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
    }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
          $z=DB::select("select
                        g.depocode,
                        b.broketype_name, b.broketype_id,
                        d.is_stop,
                        count(b.broketype_id) as count,
                        substr(numtodsinterval(sum(SUBSTR(d.stoptime, 1, 2)*3600 + SUBSTR(d.stoptime, 4, 2)*60 + SUBSTR(d.stoptime, 7, 2)), 'SECOND'),12,  5) as sum
                        from  ribbon t
                      inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join fault f on f.ribbon_id = t.ribbon_id
                        left join fault_det d on d.fault_id=f.fault_id
                        LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and b.broketype_id is not null and f.fault_no=35 and  t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by d.is_stop, b.broketype_name, b.broketype_id, g.depocode
                        order by b.broketype_id");
          $zurchil=DB::select('select  * from ZURCHIL_YARALTAITORMOZ t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
             
        return view('tailan.yaraltaitormoz')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
      public function uharsan()
    {
        $query = "";
        $startdate= Input::get('uharsan_start');
        $enddate= Input::get('uharsan_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
            
        $zurchil=DB::select('select  * from ZURCHIL_UHARSAN t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
        return view('tailan.uharsan')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
  
      public function niilberanhaaramj()
    {
        return view('tailan.niilberanhaaramj');
    }
       public function hoorondzamzogsolt()
    {
        $query = "";
        $startdate= Input::get('hoorond_start');
        $enddate= Input::get('hoorond_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }

        $zurchil=DB::select('select  * from ZURCHIL_HOORONDZAM t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
            
        return view('tailan.hoorondzamzogsolt')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
       public function hajuugiinzam()
    {
        $query = "";
        $startdate= Input::get('hajuu_start');
        $enddate= Input::get('hajuu_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and arrtime between '".$startdate."' and '".$enddate." 23:59:59'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
        }
        $zurchil=DB::select('select  * from ZURCHIL_HAJUUGIINZAM t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
        $z=DB::select('select  fromst, fromstat, tost, tostat ,count(route_id) as niit from ZURCHIL_HAJUUGIINZAM t
        where t.depocode = '.Auth::user()->depo_id. ' '.$query.'
        group by fromst, fromstat, tost, tostat
        order by fromstat, tostat');
           
        return view('tailan.hajuugiinzam')->with(['z'=>$z,'zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function buguiwch()
    {
        $query = "";
        $startdate= Input::get('buguiwch_start');
        $enddate= Input::get('buguiwch_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
        }
        $zurchil=DB::select('select  * from ZURCHIL_BUGUIWCH t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
            
        return view('tailan.buguiwch')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function tuslamj()
    {
        $query = "";
        $startdate= Input::get('tuslamj_from');
        $enddate= Input::get('tuslamj_to');
        $type= Input::get('tuslamj_type');
        if ($type == 1) {
        $query.=" and fault_no = 3";
    }
        if ($type == 2) {
            $query.=" and fault_no = 5";
        }
        if ($type == 3) {
            $query.=" and fault_no = 4";
        }
        if ($type == 4) {
            $query.=" and fault_no = 6";
        }
        else
        {
            $query.=" ";
        }
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();
        }
        $zurchil=DB::select('select  * from ZURCHIL_TUSLAMJ t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');

        return view('tailan.tuslamj')->with(['zurchil'=>$zurchil,'type'=>$type,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function norm()
    {
        $query1 = "";
        $query = "";
        $date = "";
        $us= Input::get('user_id');
        $startdate= Input::get('norm_start');
        $enddate= Input::get('norm_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
          $date.=  "and t.translate_date between '".$startdate." 00:00:00' and '".$enddate." 23:59:59'";
        }
        else
        {
          $date.=" and t.translate_date between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }
        if (Auth::user()->depo_id == 1) {
            $query.=  " and t.depo_id =1 ";
        }
        if (Auth::user()->depo_id == 13) {
            $query.=  " and t.depo_id =13 ";
        }
        if (Auth::user()->depo_id == 2) {
            $query.=  " and t.depo_id =2 ";
        }
        if (Auth::user()->depo_id == 3) {
            $query.=  " and t.depo_id in (13,3) ";
        }
        if (Auth::user()->depo_id == 5) {
            $query.=  " and t.depo_id in (1,5) ";
        }
        if ($us!=NULL && $us !=0) {
            $query1.=" and t.translator_id = ".$us."";
        }
        $zurchil=DB::select("
                select * from
                (select q.translator_id, q.depo_id, q.name, q.depdatetime, substr(wcode,1,1) as wk, 
                                      case when substr(wcode,1,1) in ('5') then (sum(worktime))*5 else sum(q.runkm) end as runkm from
                (select t.translator_id, t.depo_id, u.name,
                                        case when workcode in ('377') then 500 else workcode end as wcode, runkm, worktime,
                                            to_char(t.translate_date, 'YYYY/MM/DD') as depdatetime from
                                        (select distinct r.route_id, r.translator_id, r.depo_id,r.translate_date from Ribbon r
                                        ) t, 
                                        ZUTGUUR.Calcaddition c, USeRS u
                                        where t.route_id=c.marshid and u.id=t.translator_id and u.grand_type !=1  ".$query." ".$query1."   ".$date." ) q
                                        group by q.translator_id, q.depo_id, q.name,substr(wcode,1,1),depdatetime
                                      
                                        order by depdatetime)
                                         PIVOT
                                (
                                  sum(runkm)
                                  FOR wk IN (1 as ach ,2 as a,4 as b ,3 as c,5 as sel ,6 as d,9 as e)
                                )
                                order by depdatetime desc
              ");
        $user=DB::select("select * from Users t where 1=1 ".$query." and t.grand_type !=1 order by name");

        return view('tailan.normative')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate,'user'=>$user]);
    }
    public function machinistnagon()
    {
        $query = "";
        $startdate= Input::get('mach_start');
        $enddate= Input::get('mach_end');
  ;       if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=" and arrtime between TO_DATE( '".$startdate." 00:00:00' , 'yyyy/mm/dd HH24:MI:SS') and TO_DATE( '".$enddate." 23:59:59', 'yyyy/mm/dd HH24:MI:SS')";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }

        $machinist = DB::select("select t.DEPOCODE,t.MASHCODE, t.MASHNAME, sum(SUBSTR(t.patchmin, 1, 2)*60 + SUBSTR(t.patchmin, 4, 2)) as NUHULT
                              from v_nagon t 
                              where t.patchmin !='00:00:00' and t.mashname is not null and t.depocode=".Auth::user()->depo_id."  ".$query."
                               group by t.DEPOCODE,t.MASHCODE, t.MASHNAME
                               order by nuhult desc");
        $tuslah = DB::select("  select t.DEPOCODE,t.TUSLCODE, t.TUSLNAME, sum(SUBSTR(t.patchmin, 1, 2)*60 + SUBSTR(t.patchmin, 4, 2)) as NUHULT
                              from v_nagon t 
                              where t.patchmin !='00:00:00' and t.mashname is not null and  t.depocode=".Auth::user()->depo_id."  ".$query."
                               group by t.DEPOCODE,t.TUSLCODE, t.TUSLNAME
                               order by t.TUSLCODE");

        return view('tailan.machinistnagon')->with(['startdate' => $startdate, 'enddate' => $enddate, 'machinist' => $machinist, 'tuslah' => $tuslah]);
    }
}
