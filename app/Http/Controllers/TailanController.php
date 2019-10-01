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

    $year = (substr($startdate, 0, 4));
    $month = (substr($startdate, 5, 2));

    $achaa=DB::select("select count (q2.route_id) as count from
        (select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.train_dirtyweight,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");

    $achaa2=DB::select("select count (q2.route_id) as count from
        (select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.train_dirtyweight,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");

    $achaa3=DB::select("select count (q2.route_id) as count from
        (select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.train_dirtyweight,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=2019 and b.marshmonth in (7,8,9) and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");

    $suudal=DB::select("select count (q2.route_id) as count from
        (select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.zutnumber,
       t.train_dirtyweight,
       t.locserial,
       t.locno,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");

    $suudal2=DB::select("select count (q2.route_id) as count from
        (select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.zutnumber,
       t.train_dirtyweight,
       t.locserial,
       t.locno,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");
    $suudal3=DB::select("select count (q2.route_id) as count from
        (select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.depo_id,
       t.zutnumber,
       t.train_dirtyweight,
       t.locserial,
       t.locno,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=2019 and b.marshmonth in (7,8,9) and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");

    $selgee =DB::select("select count (q2.route_id) as count from
        (select 
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");

    $selgee2 =DB::select("select count (q2.route_id) as count from
        (select 
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");
    $selgee3 =DB::select("select count (q2.route_id) as count from
        (select 
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=2019 and b.marshmonth in (7,8,9) and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");

    $niit = DB::select("select count (q2.route_id) as count from
        (select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.train_dirtyweight,
       t.depo_id,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");

    $niit2 = DB::select("select count (q2.route_id) as count from
        (select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.train_dirtyweight,
       t.depo_id,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");
    $niit3 = DB::select("select count (q2.route_id) as count from
        (select 
        distinct
        b.marshyear,
        b.marshmonth,
        b.depocode,
       t.route_id,
       t.train_dirtyweight,
       t.depo_id,
       t.zutnumber,
       t.locserial,
       t.locno,
       t.is_fault,
       t.train_no,
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=2019 and b.marshmonth in (7,8,9) and b.marshid=t.route_id and b.depocode=".Auth::user()->depo_id. ") q2");


    $hurd =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
                            (select
                            g.marshyear,
                            g.marshmonth,
                            g.depocode,
                            d.broketype
                            from  ribbon t
                            inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode=".Auth::user()->depo_id. " 
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
                            inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=2019
                                  and g.marshmonth in (1,2,3,4,5,6,7,8,9)
                                  and g.depocode=".Auth::user()->depo_id. " 
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
                            inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=2019
                                  and g.marshmonth in (7,8,9)
                                  and g.depocode=".Auth::user()->depo_id. " 
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
                            inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode=".Auth::user()->depo_id. " 
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
                            inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=2019
                                  and g.marshmonth in (1,2,3,4,5,6,7,8,9)
                                  and g.depocode=".Auth::user()->depo_id. " 
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
                            inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=2019
                                  and g.marshmonth in (7,8,9)
                                  and g.depocode=".Auth::user()->depo_id. " 
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
                            inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                  and g.marshyear=".$year." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode=".Auth::user()->depo_id. " 
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
                            inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=2019
                                  and g.marshmonth in (1,2,3,4,5,6,7,8,9)
                                  and g.depocode=".Auth::user()->depo_id. " 
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
                            inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                            inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                            inner join fault f on f.ribbon_id = t.ribbon_id
                            left join fault_det d on d.fault_id=f.fault_id
                            where t.depo_id=g.depocode
                                  and e.depocode=t.depo_id 
                                  and e.marshyear=g.marshyear 
                                  and e.marshmonth=g.marshmonth 
                                   and g.marshyear=2019
                                  and g.marshmonth in (7,8,9)
                                  and g.depocode=".Auth::user()->depo_id. " 
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
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");

    $yaraltai362 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai363 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai36min =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai36min2 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");

    $yaraltai36min3 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai35 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai352 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");

    $yaraltai353 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai35min =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai35min2 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");

    $yaraltai35min3 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai37 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai372 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");

    $yaraltai373 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai37min =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai37min2 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");

    $yaraltai37min3 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai38 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai382 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");

    $yaraltai383 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai38min =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
    $yaraltai38min2 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");

    $yaraltai38min3 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. "
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
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
                                          and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. "
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
                                          and  b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.depocode=".Auth::user()->depo_id. "
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
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
                                          and  b.marshyear=2019 and b.marshmonth in (7,8,9) and b.depocode=".Auth::user()->depo_id. "
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
         and d.fault_id=f.fault_id 
         and f.fault_no=37
         and d.broketype is not null
          and d.is_techact = 2
         and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. "
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
    $tormoz2 =DB::select("select
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
         and f.fault_no=37
         and d.broketype is not null
          and d.is_techact = 2
         and   b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.depocode=".Auth::user()->depo_id. "
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
         and d.fault_id=f.fault_id 
         and f.fault_no=37
         and d.broketype is not null
          and d.is_techact = 2
         and   b.marshyear=2019 and b.marshmonth in (7,8,9) and b.depocode=".Auth::user()->depo_id. "
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
    $niitzurchil =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. ") q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
    $niitzurchil2 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.depocode=".Auth::user()->depo_id. ") q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
    $niitzurchil3 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=2019 and b.marshmonth in (7,8,9) and b.depocode=".Auth::user()->depo_id. ") q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
    $orohachaa =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        group by t.route_id, t.workid) q2");
    $orohachaa2 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        group by t.route_id, t.workid) q2");
    $orohachaa3 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where  g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        group by t.route_id, t.workid) q2");
    $orohachaamin =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        ) q2");
    $orohachaamin2 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        ) q2");
    $orohachaamin3 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where  g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        ) q2");
    $orohsuudal =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
    $orohsuudal2 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
    $orohsuudal3 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
    $orohsuudalmin =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
    $orohsuudalmin2 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
    $orohsuudalmin3 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
    $orohniit =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
    $orohniit2 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
    $orohniit3 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
    $orohniitmin =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and t.workid is not null
                                        ) q2");
    $orohniitmin2 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and t.workid is not null
                                        ) q2");
    $orohniitmin3 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. " and f.fault_no=21 and t.workid is not null
                                        ) q2");
    $uharsan =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $uharsan2 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $uharsan3 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $uharsanmin =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8   and  e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $uharsanmin2 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $uharsanmin3 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $hoorond =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $hoorondmin =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $techno =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $technomin =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $iluu =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>120 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $iluumin =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>120 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $tuslamjzammin =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. " ");
    $tuslamjzam =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. "
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuu =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. "
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuumin =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. " ");
    $speed =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. ") a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
    $hurdniit =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where  t.marshyear=".$year." and t.marshmonth=".$month." and t.depocode=".Auth::user()->depo_id. "");
    $yaraltainiit =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=".Auth::user()->depo_id. " and f.fault_no=35");
    $yaraltainiitmin = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=".Auth::user()->depo_id. " and f.fault_no=35");
    $hotsrolt =DB::select("select q2.depo_id,q2.marshyear, q2.marshmonth,sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60)) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. ") q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
    $hoorond2 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $hoorondmin2 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $techno2 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $technomin2 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $iluu2 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and  e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>120 and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $iluumin2 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>120 and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $tuslamjzammin2 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.depocode=".Auth::user()->depo_id. " ");
    $tuslamjzam2 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.depocode=".Auth::user()->depo_id. "
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuu2 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.depocode=".Auth::user()->depo_id. "
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuumin2 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=2019 and b.marshmonth in (1,2,3,4,5,6,7,8,9) and b.depocode=".Auth::user()->depo_id. " ");
    $speed2 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and  g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. ") a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
    $hurdniit2 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=2019 and t.marshmonth in (1,2,3,4,5,6,7,8,9) and t.depocode=".Auth::user()->depo_id. "");
    $yaraltainiit2 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and t.depo_id=".Auth::user()->depo_id. " and f.fault_no=35");
    $yaraltainiitmin2 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3,4,5,6,7,8,9) and t.depo_id=".Auth::user()->depo_id. " and f.fault_no=35");
    $hotsrolt2 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=2019 and g.marshmonth in (1,2,3,4,5,6,7,8,9) and g.depocode=".Auth::user()->depo_id. ") q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
    $hoorond3 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $hoorondmin3 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $techno3 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $iluu3 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>120 and  e.marshyear=2019 and e.marshmonth in (7,8,9) and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (7,8,9 and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $technomin3 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (7,8,9) and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $iluumin3 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)>120 and  e.marshyear=2019 and e.marshmonth in (7,8,9 and e.depocode=".Auth::user()->depo_id. "
                                    ");
    $tuslamjzammin3 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=2019 and b.marshmonth in (7,8,9) and b.depocode=".Auth::user()->depo_id. " ");
    $tuslamjzam3 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=2019 and b.marshmonth in (7,8,9) and b.depocode=".Auth::user()->depo_id. "
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuu3 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=2019 and b.marshmonth in (7,8,9) and b.depocode=".Auth::user()->depo_id. "
                                group by f.fault_no, e.fault_detail_name");
    $tuslamjurtuumin3 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=2019 and b.marshmonth in (7,8,9) and b.depocode=".Auth::user()->depo_id. " ");
    $speed3 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and  g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. ") a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
    $hurdniit3 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=2019 and t.marshmonth in (7,8,9) and t.depocode=".Auth::user()->depo_id. "");
    $yaraltainiit3 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (7,8,9) and t.depo_id=".Auth::user()->depo_id. " and f.fault_no=35");
    $yaraltainiitmin3 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (7,8,9) and t.depo_id=".Auth::user()->depo_id. " and f.fault_no=35");
    $hotsrolt3 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=2019 and g.marshmonth in (7,8,9) and g.depocode=".Auth::user()->depo_id. ") q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
    return view('tailan.tuuzorchuulsan')->with(['year'=>$year,'startdate'=>$startdate,'month'=>$month,'suudal'=>$suudal,'selgee'=>$selgee,'achaa'=>$achaa,'niit'=>$niit,'hurd'=>$hurd,'yaraltai'=>$yaraltai,'yaraltai35'=>$yaraltai35,'yaraltai36'=>$yaraltai36,'yaraltai37'=>$yaraltai37,'yaraltai38'=>$yaraltai38,'yaraltaimin'=>$yaraltaimin,'yaraltai35min'=>$yaraltai35min,'yaraltai36min'=>$yaraltai36min,'yaraltai37min'=>$yaraltai37min,'yaraltai38min'=>$yaraltai38min,'zurchil'=>$zurchil,'niitzurchil'=>$niitzurchil,'orohachaa'=>$orohachaa,'orohsuudal'=>$orohsuudal,'orohniit'=>$orohniit,'orohachaamin'=>$orohachaamin,'orohsuudalmin'=>$orohsuudalmin,'orohniitmin'=>$orohniitmin,'uharsan'=>$uharsan ,'uharsanmin'=>$uharsanmin,'hoorond'=>$hoorond,'hoorondmin'=>$hoorondmin,'techno'=>$techno,'technomin'=>$technomin,'iluu'=>$iluu,'iluumin'=>$iluumin,'tuslamjzam'=>$tuslamjzam,'tuslamjurtuu'=>$tuslamjurtuu,'tuslamjzammin'=>$tuslamjzammin,'tuslamjurtuumin'=>$tuslamjurtuumin, 'speed'=>$speed,'hotsrolt'=>$hotsrolt,'tormoz'=>$tormoz,'hurdniit'=>$hurdniit,'yaraltainiit'=>$yaraltainiit,'yaraltainiitmin'=>$yaraltainiitmin
        ,'suudal2'=>$suudal2,'selgee2'=>$selgee2,'achaa2'=>$achaa2,'niit2'=>$niit2,'hurd2'=>$hurd2,'yaraltai2'=>$yaraltai2,'yaraltai352'=>$yaraltai352,'yaraltai362'=>$yaraltai362,'yaraltai372'=>$yaraltai372,'yaraltai382'=>$yaraltai382,'yaraltaimin2'=>$yaraltaimin2,'yaraltai35min2'=>$yaraltai35min2,'yaraltai36min2'=>$yaraltai36min2,'yaraltai37min2'=>$yaraltai37min2,'yaraltai38min2'=>$yaraltai38min2,'zurchil2'=>$zurchil2,'niitzurchil2'=>$niitzurchil2,'orohachaa2'=>$orohachaa2,'orohsuudal2'=>$orohsuudal2,'orohniit2'=>$orohniit2,'orohachaamin2'=>$orohachaamin2,'orohsuudalmin2'=>$orohsuudalmin2,'orohniitmin2'=>$orohniitmin2,'uharsan2'=>$uharsan2 ,'uharsanmin2'=>$uharsanmin2,'hoorond2'=>$hoorond2,'hoorondmin2'=>$hoorondmin2,'techno2'=>$techno2,'technomin2'=>$technomin2,'iluu2'=>$iluu2,'iluumin2'=>$iluumin2,'tuslamjzam2'=>$tuslamjzam2,'tuslamjurtuu2'=>$tuslamjurtuu2,'tuslamjzammin2'=>$tuslamjzammin2,'tuslamjurtuumin2'=>$tuslamjurtuumin2, 'speed2'=>$speed2,'hotsrolt2'=>$hotsrolt2,'tormoz2'=>$tormoz2,'hurdniit2'=>$hurdniit2,'yaraltainiit2'=>$yaraltainiit2,'yaraltainiitmin2'=>$yaraltainiitmin2
        ,'suudal3'=>$suudal3,'selgee3'=>$selgee3,'achaa3'=>$achaa3,'niit3'=>$niit3,'hurd3'=>$hurd3,'yaraltai3'=>$yaraltai3,'yaraltai353'=>$yaraltai353,'yaraltai363'=>$yaraltai363,'yaraltai373'=>$yaraltai373,'yaraltai383'=>$yaraltai383,'yaraltaimin3'=>$yaraltaimin3,'yaraltai35min3'=>$yaraltai35min3,'yaraltai36min3'=>$yaraltai36min3,'yaraltai37min3'=>$yaraltai37min3,'yaraltai38min3'=>$yaraltai38min3,'zurchil3'=>$zurchil3,'niitzurchil3'=>$niitzurchil3,'orohachaa3'=>$orohachaa3,'orohsuudal3'=>$orohsuudal3,'orohniit3'=>$orohniit3,'orohachaamin3'=>$orohachaamin3,'orohsuudalmin3'=>$orohsuudalmin3,'orohniitmin3'=>$orohniitmin3,'uharsan3'=>$uharsan3 ,'uharsanmin3'=>$uharsanmin3,'hoorond3'=>$hoorond3,'hoorondmin3'=>$hoorondmin3,'techno3'=>$techno3,'technomin3'=>$technomin3,'iluu3'=>$iluu3,'iluumin3'=>$iluumin3,'tuslamjzam3'=>$tuslamjzam3,'tuslamjurtuu3'=>$tuslamjurtuu3,'tuslamjzammin3'=>$tuslamjzammin3,'tuslamjurtuumin3'=>$tuslamjurtuumin3, 'speed3'=>$speed3,'hotsrolt3'=>$hotsrolt3,'tormoz3'=>$tormoz3,'hurdniit3'=>$hurdniit3,'yaraltainiit3'=>$yaraltainiit3,'yaraltainiitmin3'=>$yaraltainiitmin3]);
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
                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join fault f on f.ribbon_id = t.ribbon_id
                        left join fault_det d on d.fault_id=f.fault_id
                        inner join V_STATION s on f.fromstation=s.statcode
                        inner join V_STATION z on z.statcode=f.tostation
                        LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode= t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and  t.depo_id =  ".Auth::user()->depo_id. " " .$query."
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
                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
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

         $zurchil=DB::select('select  * from V_ATTENTION_TAILAN t where t.depo_id = '.Auth::user()->depo_id. '  '.$query.' ');
         $z=DB::select("select
                        r.DEPO_ID, p.speed as speedname, count(p.speed) as count
                        from Attention a, ribbon t, attention_speed p, ribbon r, zutguur.marshbrig b
                        where a.ribbon_id=t.ribbon_id and p.attentionspeed_id=a.speed and r.ribbon_id= a.ribbon_id and b.marshid= t.route_id and t.depo_id= b.depocode and t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by p.speed, r.depo_id
                        order by p.speed");
        $z1=DB::select(" select
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
                        inner join V_MARSHBRIG g on g.marshid=t.route_id
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
                        inner join V_MARSHBRIG g on g.marshid=t.route_id
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
                        inner join V_MARSHBRIG g on g.marshid=t.route_id
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
           
        return view('tailan.hajuugiinzam')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
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
        $query = "";
        $startdate= Input::get('norm_start');
        $enddate= Input::get('norm_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and t.translate_date between '".$startdate." 00:00:00' and '".$enddate." 23:59:59'";
        }
        else
        {
            $query.=" and t.translate_date between sysdate-10 and sysdate";
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

        $zurchil=DB::select("select * from
(select t.translator_id, t.depo_id, u.name, substr(c.workcode,1,1) as wk, 
sum(c.runkm) as runkm, to_char(t.translate_date, 'YYYY/MM/DD') as depdatetime from
(select distinct r.route_id, r.translator_id, r.depo_id,r.translate_date from Ribbon r) t, 
ZUTGUUR.Calcaddition c, USeRS u
where t.route_id=c.marshid and u.id=t.translator_id and u.grand_type !=1 ".$query." 
group by t.translator_id, t.depo_id, u.name,substr(c.workcode,1,1),to_char(t.translate_date, 'YYYY/MM/DD') 
order by to_char(t.translate_date, 'YYYY/MM/DD'))
PIVOT
(
  sum(runkm)
  FOR wk IN (1 as ach ,2 as a,4 as b ,3 as c,5 as sel ,6 as d,9 as e)
)
order by depdatetime desc
              ");

        return view('tailan.normative')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
}
