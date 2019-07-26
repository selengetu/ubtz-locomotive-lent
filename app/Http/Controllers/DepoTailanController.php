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

class DepoTailanController extends Controller
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=1) q2");

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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=1) q2");
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=2) q2");

        $achaa4=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=2) q2");
        $achaa5=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=3) q2");

        $achaa6=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=3) q2");
        $achaa7=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=5) q2");

        $achaa8=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=5) q2");
        $achaa9=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=13) q2");

        $achaa10=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) not in (1,5) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=13) q2");


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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=1) q2");

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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=1) q2");

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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=2) q2");

        $suudal4=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=2) q2");
        $suudal5=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=3) q2");

        $suudal6=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=3) q2");
        $suudal7=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=5) q2");

        $suudal8=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=5) q2");
        $suudal9=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=13) q2");

        $suudal10=DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =1 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=13) q2");

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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=1) q2");

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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=1) q2");

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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=2) q2");

        $selgee4 =DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=2) q2");

        $selgee5 =DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=3) q2");

        $selgee6 =DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=3) q2");

        $selgee7 =DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=5) q2");

        $selgee8 =DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=5) q2");

        $selgee9 =DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=13) q2");

        $selgee10 =DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) =5 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=13) q2");

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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=1) q2");

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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=1) q2");

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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=2) q2");

        $niit4 = DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=2) q2");


        $niit5 = DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=3) q2");

        $niit6 = DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=3) q2");


        $niit7 = DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=5) q2");

        $niit8 = DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=5) q2");

        $niit9 = DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=".$year." and b.marshmonth=".$month." and b.marshid=t.route_id and b.depocode=13) q2");

        $niit10 = DB::select("select count (q2.route_id) as count from
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
       SUBSTR(t.workid, 1, 1) from RIBBON t, ZUTGUUR.Marshbrig b where SUBSTR(t.workid, 1, 1) is not null and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.marshid=t.route_id and b.depocode=13) q2");

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
                                  and g.depocode=1 
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=1
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
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
                                  and g.marshyear=".$year." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode=2 
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");

        $hurd4 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=2
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");

        $hurd5 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.depocode=3 
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");

        $hurd6 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=3
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");

        $hurd7 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.depocode=5 
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");

        $hurd8 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=5
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");

        $hurd9 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.depocode=13
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =3 
                            group by b.broketype_id, b.broketype_name");

        $hurd10 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=13
                                  and f.fault_no=36
                                  and d.is_techact=2) o,
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
                                  and g.depocode=1
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=1
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
                                  and g.marshyear=".$year." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode=2
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");

        $yaraltai4 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=2
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");

        $yaraltai5 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.depocode=3
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");

        $yaraltai6 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=3
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");

        $yaraltai7 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.depocode=5
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");

        $yaraltai8 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=5
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");

        $yaraltai9 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.depocode=13
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");

        $yaraltai10 =DB::select("select b.broketype_id, b.broketype_name, count(o.broketype) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=13
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
                                  and g.depocode=1
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=1
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
                                  and g.marshyear=".$year." 
                                  and g.marshmonth=".$month." 
                                  and g.depocode=2
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
        $yaraltaimin4 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=2
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
        $yaraltaimin5 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
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
                                  and g.depocode=3
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
        $yaraltaimin6 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=3
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
        $yaraltaimin7 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
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
                                  and g.depocode=5
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
        $yaraltaimin8 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=5
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
        $yaraltaimin9 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
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
                                  and g.depocode=13
                                  and f.fault_no=35) o,
                            broke_type b  
                            where  b.broketype_id= o.broketype(+) 
                                    and b.broke_type =5 
                            group by b.broketype_id, b.broketype_name");
        $yaraltaimin10 =DB::select("select b.broketype_id, b.broketype_name, sum(substr(o.stoptime,4,2)+((substr(o.stoptime,1,2))*60)) as cnt from    
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
                                  and g.marshmonth in (1,2,3)
                                  and g.depocode=13
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
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai364 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai365 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai366 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai367 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai368 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai369 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=13
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai3610 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13
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
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai36min4 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai36min5 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai36min6 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai36min7 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai36min8 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai36min9 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=13
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai36min10 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=36 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai354 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai355 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai356 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai357 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai358 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai359 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=13
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai3510 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id  and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai35min4 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai35min5 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai35min6 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai35min7 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai35min8 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai35min9 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=13
                                group by d.is_stop, g.depocode,d.broketype,d.stoptime,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai35min10 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
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
                                where  f.fault_no=35 and d.broketype=35 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13
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
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai374 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai375 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai376 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai377 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai378 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai379 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=13
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai3710 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13
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
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai37min4 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai37min5 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai37min6 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai37min7 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai37min8 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai37min9 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=13
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai37min10 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=37 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13
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
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai384 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai385 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai386 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai387 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai388 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai389 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and  g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=13
                                group by d.is_stop, g.depocode,d.broketype,t.route_id ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai3810 =DB::select("select s.stop_id, s.stop_name ,count(q.broketype) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,t.route_id
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13
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
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1
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
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai38min4 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai38min5 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai38min6 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai38min7 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai38min8 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai38min9 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=13
                                group by d.is_stop, g.depocode,d.broketype, d.stoptime ) q
                                right join stop_det s
                                on s.stop_id=q.is_stop
                                group by s.stop_name, q.depocode,s.stop_id");
        $yaraltai38min10 =DB::select("select s.stop_id, s.stop_name ,sum(substr(q.stoptime,4,2)+((substr(q.stoptime,1,2))*60)) as COUNT from
                                (select
                                g.depocode,
                                d.broketype,
                                d.is_stop,
                                d.stoptime
                                from  ribbon t
                                inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where  f.fault_no=35 and d.broketype=38 and g.depocode=t.depo_id and g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13
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
                                          and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=1
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
                                          and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=1
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
        $zurchil3 =DB::select("select
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
                                          and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=2
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
        $zurchil4 =DB::select("select
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
                                          and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=2
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
        $zurchil5 =DB::select("select
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
                                          and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=3
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
        $zurchil6 =DB::select("select
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
                                          and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=3
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
        $zurchil7 =DB::select("select
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
                                          and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=5
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
        $zurchil8 =DB::select("select
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
                                          and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=5
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
        $zurchil9 =DB::select("select
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
                                          and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=13
                                          ) q 
                                          left join fault_det de on de.fault_id=q.fault_id
                                          where de.is_techact is null or de.is_techact=2) q1 right join
                                         fault_detail d on d.fault_detail_id=q1.fault_no
                                         where d.fault_type=2
                                         group by d.fault_detail_id, d.fault_detail_name
                                         ");
        $zurchil10 =DB::select("select
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
                                          and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=13
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
         and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=1
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
         and   b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=1
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
         and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=2
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
        $tormoz4 =DB::select("select
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
         and   b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=2
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
        $tormoz5 =DB::select("select
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
         and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=3
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
        $tormoz6 =DB::select("select
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
         and   b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=3
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
        $tormoz7 =DB::select("select
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
         and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=5
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
        $tormoz8 =DB::select("select
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
         and   b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=5
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
        $tormoz9 =DB::select("select
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
         and  b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=13
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
        $tormoz10 =DB::select("select
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
         and   b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=13
        ) q,
              broke_type e
              where e.broke_type=4
              and  e.broketype_id =q.broketype(+)
              group by e.broketype_id, e.broketype_name ");
        $niitzurchil =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=1) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $niitzurchil2 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=1) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $niitzurchil3 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=2) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $niitzurchil4 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=2) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $niitzurchil5 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=3) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $niitzurchi6 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=3) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $niitzurchil7 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=5) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $niitzurchi8 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=5) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $niitzurchil9 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=13) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $niitzurchil10 =DB::select("select count(route_id) as too from (select
   t.route_id, t.depo_id, t.zutnumber, t.locno, t.train_no, t.train_dirtyweight,f.*
   from FAULT f, ribbon t, fault_detail e, ZUTGUUR.Marshbrig b
   where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no 
   and b.marshid=t.route_id and f.fault_no in (32,17,33,37,26,25,31,22,16,13,23,14,20,18,19,15,30,34,41,161) and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=13) q
   left join fault_det d on d.fault_id=q.fault_id
   where d.is_techact = 2 or d.is_techact is null ");
        $orohachaa =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode= 1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        group by t.route_id, t.workid) q2");
        $orohachaa2 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        group by t.route_id, t.workid) q2");
        $orohachaa3 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=2 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 2
                                        group by t.route_id, t.workid) q2");
        $orohachaa4 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 2
                                        group by t.route_id, t.workid) q2");
        $orohachaa5 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=3and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 3
                                        group by t.route_id, t.workid) q2");
        $orohachaa6 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 3
                                        group by t.route_id, t.workid) q2");
        $orohachaa7 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=5 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 5
                                        group by t.route_id, t.workid) q2");
        $orohachaa8 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 5
                                        group by t.route_id, t.workid) q2");
        $orohachaa9 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=13 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 13
                                        group by t.route_id, t.workid) q2");
        $orohachaa10 =DB::select("select count(q2.route_id) as too from (select
                                    
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 13
                                        group by t.route_id, t.workid) q2");
        $orohachaamin =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        ) q2");
        $orohachaamin2 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 1
                                        ) q2");
        $orohachaamin3 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 2
                                        ) q2");
        $orohachaamin4 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 2
                                        ) q2");
        $orohachaamin5 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 3
                                        ) q2");
        $orohachaamin6 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 3
                                        ) q2");
        $orohachaamin7 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 5
                                        ) q2");
        $orohachaamin8 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 5
                                        ) q2");
        $orohachaamin9 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 13
                                        ) q2");
        $orohachaamin10 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)!= 13
                                        ) q2");
        $orohsuudal =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudal2 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudal3 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=2 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudal4 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudal5 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=3 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudal6 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudal7 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=5 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudal8 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudal9 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=13 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudal10 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                        group by t.route_id, t.workid) q2");
        $orohsuudalmin =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohsuudalmin2 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohsuudalmin3 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=2 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohsuudalmin4 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohsuudalmin5 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=3 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohsuudalmin6 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohsuudalmin7 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=5 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohsuudalmin8 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohsuudalmin9 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=13 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohsuudalmin10 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13 and f.fault_no=21 and SUBSTR(t.workid, 1, 1)= 1
                                       ) q2");
        $orohniit =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=1 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniit2 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniit3 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=2 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniit4 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniit5 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=3 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniit6 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniit7 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=5 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniit8 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniit9 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=13 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniit10 =DB::select("select count(q2.route_id) as too from (select
                                        t.route_id,
                                        t.workid
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13 and f.fault_no=21 and t.workid is not null
                                        group by t.route_id, t.workid) q2");
        $orohniitmin =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=1 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $orohniitmin2 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $orohniitmin3 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=2 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $orohniitmin4 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $orohniitmin5 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=3 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $orohniitmin6 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $orohniitmin7 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=5 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $orohniitmin8 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $orohniitmin9 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=".$year." and g.marshmonth = ".$month." and g.depocode=13 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $orohniitmin10 =DB::select("select sum(substr(q2.stoptime,4,2)+((substr(q2.stoptime,1,2))*60)) as too from (select
                                    
                                        t.route_id,
                                        t.workid,
                                        q.stoptime
                                        from  ribbon t
                                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id
                                        inner join fault f on f.ribbon_id = t.ribbon_id
                                        inner join fault_det q on q.fault_id=f.fault_id
                                        where g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13 and f.fault_no=21 and t.workid is not null
                                        ) q2");
        $uharsan =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=1
                                    ");
        $uharsan2 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=1
                                    ");
        $uharsan3 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=2
                                    ");
        $uharsan4 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=2
                                    ");
        $uharsan5 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=3
                                    ");
        $uharsan6 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=3
                                    ");
        $uharsan7 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=5
                                    ");
        $uharsan8 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=5
                                    ");
        $uharsan9 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=13
                                    ");
        $uharsan10 =DB::select("select
                                    count(f.fault_no) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8  and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=13
                                    ");
        $uharsanmin =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8   and  e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=1
                                    ");
        $uharsanmin2 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=1
                                    ");
        $uharsanmin3 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8   and  e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=2
                                    ");
        $uharsanmin4 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=2
                                    ");
        $uharsanmin5 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8   and  e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=3
                                    ");
        $uharsanmin6 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=3
                                    ");
        $uharsanmin7 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8   and  e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=5
                                    ");
        $uharsanmin8 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=5
                                    ");
        $uharsanmin9 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8   and  e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=13
                                    ");
        $uharsanmin10 =DB::select("select
                                     sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                    from  ribbon t
                                    inner join V_MARSHBRIG g on g.marshid=t.route_id
                                    inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                    inner join fault f on f.ribbon_id = t.ribbon_id
                                    left join fault_det d on d.fault_id=f.fault_id
                                    
                                    LEFT JOIN V_broketype b on b.broketype_id= d.broketype
                                    where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=8 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=13
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
        $hoorond9 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=13
                                    ");
        $hoorondmin9 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
        $techno9 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
        $technomin9 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=".Auth::user()->depo_id. "
                                    ");
        $tuslamjzammin9 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. " ");
        $tuslamjzam9 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. "
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu9 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. "
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin9 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=".Auth::user()->depo_id. " ");
        $speed9 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. ") a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit9 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where  t.marshyear=".$year." and t.marshmonth=".$month." and t.depocode=".Auth::user()->depo_id. "");
        $yaraltainiit9 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=".Auth::user()->depo_id. " and f.fault_no=35");
        $yaraltainiitmin9 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=13 and f.fault_no=35");
        $hotsrolt9 =DB::select("select q2.depo_id,q2.marshyear, q2.marshmonth,sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60)) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. ") q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        $hoorond3 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=2
                                    ");
        $hoorondmin3 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=2
                                    ");
        $techno3 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=2
                                    ");
        $technomin3 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=2
                                    ");
        $tuslamjzammin3 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=2 ");
        $tuslamjzam3 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=2
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu3 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=2
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin3 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=2 ");
        $speed3 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. ") a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit3 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where  t.marshyear=".$year." and t.marshmonth=".$month." and t.depocode=2");
        $yaraltainiit3 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=2 and f.fault_no=35");
        $yaraltainiitmin3 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=2 and f.fault_no=35");
        $hotsrolt3 =DB::select("select q2.depo_id,q2.marshyear, q2.marshmonth,sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60)) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=2) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        $hoorond5 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=3
                                    ");
        $hoorondmin5 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=3
                                    ");
        $techno5 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=3
                                    ");
        $technomin5 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=3
                                    ");
        $tuslamjzammin5 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=3 ");
        $tuslamjzam5 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=3
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu5 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=3
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin5 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=3 ");
        $speed5 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. ") a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit5 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where  t.marshyear=".$year." and t.marshmonth=".$month." and t.depocode=3");
        $yaraltainiit5 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=3 and f.fault_no=35");
        $yaraltainiitmin5 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=3 and f.fault_no=35");
        $hotsrolt5 =DB::select("select q2.depo_id,q2.marshyear, q2.marshmonth,sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60)) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=3) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        $hoorond7 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=5
                                    ");
        $hoorondmin7 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=5
                                    ");
        $techno7 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=5
                                    ");
        $technomin7 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=5
                                    ");
        $tuslamjzammin7 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=5 ");
        $tuslamjzam7 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=5
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu7 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=5
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin7 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=5");
        $speed7 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=".Auth::user()->depo_id. ") a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit7 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where  t.marshyear=".$year." and t.marshmonth=".$month." and t.depocode=5");
        $yaraltainiit7 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=5 and f.fault_no=35");
        $yaraltainiitmin7 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=5 and f.fault_no=35");
        $hotsrolt7 =DB::select("select q2.depo_id,q2.marshyear, q2.marshmonth,sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60)) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=5) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        $hoorond =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=1
                                    ");
        $hoorondmin =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=1
                                    ");
        $techno =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=1
                                    ");
        $technomin =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=".$year." and e.marshmonth=".$month." and e.depocode=1
                                    ");
        $tuslamjzammin =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=1 ");
        $tuslamjzam =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=1
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=1
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=".$year." and b.marshmonth=".$month." and b.depocode=1");
        $speed =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where  t.marshyear=".$year." and t.marshmonth=".$month." and t.depocode=1");
        $yaraltainiit =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=1 and f.fault_no=35");
        $yaraltainiitmin = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and  e.marshyear=".$year." and e.marshmonth=".$month." and t.depo_id=1 and f.fault_no=35");
        $hotsrolt =DB::select("select q2.depo_id,q2.marshyear, q2.marshmonth,sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60)) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and g.marshyear=".$year." and g.marshmonth=".$month." and g.depocode=1) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        $hoorond2 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=1
                                    ");
        $hoorondmin2 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=1
                                    ");
        $techno2 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=1
                                    ");
        $technomin2 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=1
                                    ");
        $tuslamjzammin2 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=1");
        $tuslamjzam2 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=1
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu2 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=1
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin2 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=1 ");
        $speed2 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit2 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=2019 and t.marshmonth in (1,2,3) and t.depocode=1");
        $yaraltainiit2 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=1 and f.fault_no=35");
        $yaraltainiitmin2 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=1 and f.fault_no=35");
        $hotsrolt2 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        $hoorond4 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=2
                                    ");
        $hoorondmin4 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=2
                                    ");
        $techno4 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=2
                                    ");
        $technomin4 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=2
                                    ");
        $tuslamjzammin4 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=2");
        $tuslamjzam4 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=2
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu4 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=2
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin4 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=2 ");
        $speed4 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit4 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=2019 and t.marshmonth in (1,2,3) and t.depocode=2");
        $yaraltainiit4 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=2 and f.fault_no=35");
        $yaraltainiitmin4 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=2 and f.fault_no=35");
        $hotsrolt4 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=2) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        $hoorond6 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=3
                                    ");
        $hoorondmin6 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=3
                                    ");
        $techno6 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=3
                                    ");
        $technomin6 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=3
                                    ");
        $tuslamjzammin6 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=3");
        $tuslamjzam6 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=3
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu6 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=3
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin6 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=3 ");
        $speed6 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit6 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=2019 and t.marshmonth in (1,2,3) and t.depocode=3");
        $yaraltainiit6 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=3 and f.fault_no=35");
        $yaraltainiitmin6 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=3 and f.fault_no=35");
        $hotsrolt6 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=3) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        $hoorond8 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=5
                                    ");
        $hoorondmin8 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=5
                                    ");
        $techno8 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=5
                                    ");
        $technomin8 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=5
                                    ");
        $tuslamjzammin8 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=5");
        $tuslamjzam8 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=5
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu8 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=5
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin8 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=5 ");
        $speed8 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=1) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit8 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=2019 and t.marshmonth in (1,2,3) and t.depocode=5");
        $yaraltainiit8 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=5 and f.fault_no=35");
        $yaraltainiitmin8 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=5 and f.fault_no=35");
        $hotsrolt8 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=5) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        $hoorond10 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=13
                                    ");
        $hoorondmin10 =DB::select("select
                                 sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id 
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=2 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=13
                                    ");
        $techno10 =DB::select("select
                                count(f.fault_no) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=13
                                    ");
        $technomin10 =DB::select("select
                                sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as too
                                from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and e.marshyear=2019 and e.marshmonth in (1,2,3) and e.depocode=13
                                    ");
        $tuslamjzammin10 =DB::select("select
                             sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=3 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=13");
        $tuslamjzam10 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=3 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=13
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuu10 =DB::select("select
                                f.fault_no,
                                e.fault_detail_name,
                                count(f.fault_no) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and b.marshid=t.route_id and f.fault_no=4 and  b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=13
                                group by f.fault_no, e.fault_detail_name");
        $tuslamjurtuumin10 =DB::select("select
                              sum(substr(k.stoptime,4,2)+((substr(k.stoptime,1,2))*60)) as too
                                from FAULT f, ribbon t, fault_detail e, V_Marshbrig b, fault_det k
                                where t.ribbon_id=f.ribbon_id and e.fault_detail_id=f.fault_no and k.fault_id=f.fault_id and b.marshid=t.route_id and f.fault_no=4 and b.marshyear=2019 and b.marshmonth in (1,2,3) and b.depocode=13 ");
        $speed10 =DB::select("select p.attentionspeed_id, nvl(a.speed,0) as niit, count(a.speed) as cnt
                            from (select a.speed, a.fromstation, a.tostation
                            from Attention a, ribbon t, ZUTGUUR.Marshbrig g
                            where a.ribbon_id=t.ribbon_id 
                            and g.marshid=t.route_id
                            and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13) a,
                            
                            attention_speed p
                            
                            where p.attentionspeed_id=a.speed(+)
                            group by p.attentionspeed_id, a.speed");
        $hurdniit10 =DB::select("select count(route_id) as too from zurchil_hurdhemjigch t where   t.marshyear=2019 and t.marshmonth in (1,2,3) and t.depocode=13");
        $yaraltainiit10 =DB::select("select count(route_id) as too from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                LEFT JOIN V_Broketype b on b.broketype_id= d.broketype
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=13 and f.fault_no=35");
        $yaraltainiitmin10 = DB::select("select sum(substr(d.stoptime,4,2)+((substr(d.stoptime,1,2))*60)) as min from  ribbon t
                                inner join V_MARSHBRIG g on g.marshid=t.route_id
                                inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                                inner join fault f on f.ribbon_id = t.ribbon_id
                                left join fault_det d on d.fault_id=f.fault_id
                                where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and   e.marshyear=2019 and e.marshmonth in (1,2,3) and t.depo_id=13 and f.fault_no=35");
        $hotsrolt10 =DB::select("select sum(sum(substr(q2.patchmin,4,2)+((substr(q2.patchmin,1,2))*60))) as sum from
(select distinct t.route_id, t.depo_id, g.marshyear, g.marshmonth ,t.locserial, t.zutnumber, t.patchmin from RIBBON t , ZUTGUUR.MARSHBRIG g
where t.route_id = g.marshid and t.patchmin is not null and t.patchmin != '0' and t.patchmin != '00:00:00' and  g.marshyear=2019 and g.marshmonth in (1,2,3) and g.depocode=13) q2     
group by q2.depo_id,q2.marshyear, q2.marshmonth");
        return view('tailan.all')->with(['year'=>$year,'startdate'=>$startdate,'month'=>$month,'suudal'=>$suudal,'selgee'=>$selgee,'achaa'=>$achaa,'niit'=>$niit,'hurd'=>$hurd,'yaraltai'=>$yaraltai,'yaraltai35'=>$yaraltai35,'yaraltai36'=>$yaraltai36,'yaraltai37'=>$yaraltai37,'yaraltai38'=>$yaraltai38,'yaraltaimin'=>$yaraltaimin,'yaraltai35min'=>$yaraltai35min,'yaraltai36min'=>$yaraltai36min,'yaraltai37min'=>$yaraltai37min,'yaraltai38min'=>$yaraltai38min,'zurchil'=>$zurchil,'niitzurchil'=>$niitzurchil,'orohachaa'=>$orohachaa,'orohsuudal'=>$orohsuudal,'orohniit'=>$orohniit,'orohachaamin'=>$orohachaamin,'orohsuudalmin'=>$orohsuudalmin,'orohniitmin'=>$orohniitmin,'uharsan'=>$uharsan ,'uharsanmin'=>$uharsanmin,'hoorond'=>$hoorond,'hoorondmin'=>$hoorondmin,'techno'=>$techno,'technomin'=>$technomin,'tuslamjzam'=>$tuslamjzam,'tuslamjurtuu'=>$tuslamjurtuu,'tuslamjzammin'=>$tuslamjzammin,'tuslamjurtuumin'=>$tuslamjurtuumin, 'speed'=>$speed,'hotsrolt'=>$hotsrolt,'tormoz'=>$tormoz,'hurdniit'=>$hurdniit,'yaraltainiit'=>$yaraltainiit,'yaraltainiitmin'=>$yaraltainiitmin
            ,'suudal2'=>$suudal2,'selgee2'=>$selgee2,'achaa2'=>$achaa2,'niit2'=>$niit2,'hurd2'=>$hurd2,'yaraltai2'=>$yaraltai2,'yaraltai352'=>$yaraltai352,'yaraltai362'=>$yaraltai362,'yaraltai372'=>$yaraltai372,'yaraltai382'=>$yaraltai382,'yaraltaimin2'=>$yaraltaimin2,'yaraltai35min2'=>$yaraltai35min2,'yaraltai36min2'=>$yaraltai36min2,'yaraltai37min2'=>$yaraltai37min2,'yaraltai38min2'=>$yaraltai38min2,'zurchil2'=>$zurchil2,'niitzurchil2'=>$niitzurchil2,'orohachaa2'=>$orohachaa2,'orohsuudal2'=>$orohsuudal2,'orohniit2'=>$orohniit2,'orohachaamin2'=>$orohachaamin2,'orohsuudalmin2'=>$orohsuudalmin2,'orohniitmin2'=>$orohniitmin2,'uharsan2'=>$uharsan2 ,'uharsanmin2'=>$uharsanmin2,'hoorond2'=>$hoorond2,'hoorondmin2'=>$hoorondmin2,'techno2'=>$techno2,'technomin2'=>$technomin2,'tuslamjzam2'=>$tuslamjzam2,'tuslamjurtuu2'=>$tuslamjurtuu2,'tuslamjzammin2'=>$tuslamjzammin2,'tuslamjurtuumin2'=>$tuslamjurtuumin2, 'speed2'=>$speed2,'hotsrolt2'=>$hotsrolt2,'tormoz2'=>$tormoz2,'hurdniit2'=>$hurdniit2,'yaraltainiit2'=>$yaraltainiit2,'yaraltainiitmin2'=>$yaraltainiitmin2
            ,'suudal3'=>$suudal3,'selgee3'=>$selgee3,'achaa3'=>$achaa3,'niit3'=>$niit3,'hurd3'=>$hurd3,'yaraltai3'=>$yaraltai3,'yaraltai353'=>$yaraltai353,'yaraltai363'=>$yaraltai363,'yaraltai373'=>$yaraltai373,'yaraltai383'=>$yaraltai383,'yaraltaimin3'=>$yaraltaimin3,'yaraltai35min3'=>$yaraltai35min3,'yaraltai36min3'=>$yaraltai36min3,'yaraltai37min3'=>$yaraltai37min3,'yaraltai38min3'=>$yaraltai38min3,'zurchil3'=>$zurchil3,'niitzurchil3'=>$niitzurchil2,'orohachaa3'=>$orohachaa3,'orohsuudal3'=>$orohsuudal3,'orohniit3'=>$orohniit3,'orohachaamin3'=>$orohachaamin3,'orohsuudalmin3'=>$orohsuudalmin3,'orohniitmin3'=>$orohniitmin3,'uharsan3'=>$uharsan3 ,'uharsanmin3'=>$uharsanmin3,'hoorond3'=>$hoorond3,'hoorondmin3'=>$hoorondmin3,'techno3'=>$techno3,'technomin3'=>$technomin3,'tuslamjzam3'=>$tuslamjzam3,'tuslamjurtuu3'=>$tuslamjurtuu3,'tuslamjzammin3'=>$tuslamjzammin3,'tuslamjurtuumin3'=>$tuslamjurtuumin3, 'speed3'=>$speed3,'hotsrolt3'=>$hotsrolt3,'tormoz3'=>$tormoz3,'hurdniit3'=>$hurdniit3,'yaraltainiit3'=>$yaraltainiit3,'yaraltainiitmin3'=>$yaraltainiitmin3
            ,'suudal4'=>$suudal4,'selgee4'=>$selgee4,'achaa4'=>$achaa4,'niit4'=>$niit4,'hurd4'=>$hurd4,'yaraltai4'=>$yaraltai4,'yaraltai354'=>$yaraltai354,'yaraltai364'=>$yaraltai364,'yaraltai374'=>$yaraltai374,'yaraltai384'=>$yaraltai384,'yaraltaimin4'=>$yaraltaimin4,'yaraltai35min4'=>$yaraltai35min4,'yaraltai36min4'=>$yaraltai36min4,'yaraltai37min4'=>$yaraltai37min4,'yaraltai38min4'=>$yaraltai38min4,'zurchil4'=>$zurchil4,'niitzurchil4'=>$niitzurchil2,'orohachaa4'=>$orohachaa4,'orohsuudal4'=>$orohsuudal4,'orohniit4'=>$orohniit4,'orohachaamin4'=>$orohachaamin4,'orohsuudalmin4'=>$orohsuudalmin4,'orohniitmin4'=>$orohniitmin4,'uharsan4'=>$uharsan4 ,'uharsanmin4'=>$uharsanmin4,'hoorond4'=>$hoorond4,'hoorondmin4'=>$hoorondmin4,'techno4'=>$techno4,'technomin4'=>$technomin4,'tuslamjzam4'=>$tuslamjzam4,'tuslamjurtuu4'=>$tuslamjurtuu4,'tuslamjzammin4'=>$tuslamjzammin4,'tuslamjurtuumin4'=>$tuslamjurtuumin2, 'speed4'=>$speed4,'hotsrolt4'=>$hotsrolt4,'tormoz4'=>$tormoz4,'hurdniit4'=>$hurdniit4,'yaraltainiit4'=>$yaraltainiit4,'yaraltainiitmin4'=>$yaraltainiitmin4
            ,'suudal5'=>$suudal5,'selgee5'=>$selgee5,'achaa5'=>$achaa5,'niit5'=>$niit5,'hurd5'=>$hurd5,'yaraltai5'=>$yaraltai5,'yaraltai355'=>$yaraltai355,'yaraltai365'=>$yaraltai365,'yaraltai375'=>$yaraltai375,'yaraltai385'=>$yaraltai385,'yaraltaimin5'=>$yaraltaimin5,'yaraltai35min5'=>$yaraltai35min5,'yaraltai36min5'=>$yaraltai36min5,'yaraltai37min5'=>$yaraltai37min5,'yaraltai38min5'=>$yaraltai38min5,'zurchil5'=>$zurchil5,'niitzurchil5'=>$niitzurchil2,'orohachaa5'=>$orohachaa5,'orohsuudal5'=>$orohsuudal5,'orohniit5'=>$orohniit2,'orohachaamin5'=>$orohachaamin5,'orohsuudalmin5'=>$orohsuudalmin5,'orohniitmin5'=>$orohniitmin5,'uharsan5'=>$uharsan5 ,'uharsanmin5'=>$uharsanmin5,'hoorond5'=>$hoorond5,'hoorondmin5'=>$hoorondmin5,'techno5'=>$techno5,'technomin5'=>$technomin5,'tuslamjzam5'=>$tuslamjzam5,'tuslamjurtuu5'=>$tuslamjurtuu5,'tuslamjzammin5'=>$tuslamjzammin5,'tuslamjurtuumin5'=>$tuslamjurtuumin2, 'speed5'=>$speed5,'hotsrolt5'=>$hotsrolt5,'tormoz5'=>$tormoz5,'hurdniit5'=>$hurdniit5,'yaraltainiit5'=>$yaraltainiit5,'yaraltainiitmin5'=>$yaraltainiitmin5
            ,'suudal6'=>$suudal6,'selgee6'=>$selgee6,'achaa6'=>$achaa6,'niit6'=>$niit6,'hurd6'=>$hurd6,'yaraltai6'=>$yaraltai6,'yaraltai356'=>$yaraltai356,'yaraltai366'=>$yaraltai366,'yaraltai376'=>$yaraltai376,'yaraltai386'=>$yaraltai386,'yaraltaimin6'=>$yaraltaimin6,'yaraltai35min6'=>$yaraltai35min6,'yaraltai36min6'=>$yaraltai36min6,'yaraltai37min6'=>$yaraltai37min6,'yaraltai38min6'=>$yaraltai38min6,'zurchil6'=>$zurchil6,'niitzurchil6'=>$niitzurchil2,'orohachaa6'=>$orohachaa6,'orohsuudal6'=>$orohsuudal6,'orohniit6'=>$orohniit2,'orohachaamin6'=>$orohachaamin6,'orohsuudalmin6'=>$orohsuudalmin6,'orohniitmin6'=>$orohniitmin6,'uharsan6'=>$uharsan6 ,'uharsanmin6'=>$uharsanmin6,'hoorond6'=>$hoorond6,'hoorondmin6'=>$hoorondmin6,'techno6'=>$techno6,'technomin6'=>$technomin6,'tuslamjzam6'=>$tuslamjzam6,'tuslamjurtuu6'=>$tuslamjurtuu6,'tuslamjzammin6'=>$tuslamjzammin6,'tuslamjurtuumin6'=>$tuslamjurtuumin2, 'speed6'=>$speed6,'hotsrolt6'=>$hotsrolt6,'tormoz6'=>$tormoz6,'hurdniit6'=>$hurdniit6,'yaraltainiit6'=>$yaraltainiit6,'yaraltainiitmin6'=>$yaraltainiitmin6
            ,'suudal7'=>$suudal7,'selgee7'=>$selgee7,'achaa7'=>$achaa7,'niit7'=>$niit7,'hurd7'=>$hurd7,'yaraltai7'=>$yaraltai7,'yaraltai357'=>$yaraltai357,'yaraltai367'=>$yaraltai367,'yaraltai377'=>$yaraltai377,'yaraltai387'=>$yaraltai387,'yaraltaimin7'=>$yaraltaimin7,'yaraltai35min7'=>$yaraltai35min7,'yaraltai36min7'=>$yaraltai36min7,'yaraltai37min7'=>$yaraltai37min7,'yaraltai38min7'=>$yaraltai38min7,'zurchil7'=>$zurchil7,'niitzurchil7'=>$niitzurchil2,'orohachaa7'=>$orohachaa7,'orohsuudal7'=>$orohsuudal7,'orohniit7'=>$orohniit2,'orohachaamin7'=>$orohachaamin7,'orohsuudalmin7'=>$orohsuudalmin7,'orohniitmin7'=>$orohniitmin7,'uharsan7'=>$uharsan7 ,'uharsanmin7'=>$uharsanmin7,'hoorond7'=>$hoorond7,'hoorondmin7'=>$hoorondmin7,'techno7'=>$techno7,'technomin7'=>$technomin7,'tuslamjzam7'=>$tuslamjzam7,'tuslamjurtuu7'=>$tuslamjurtuu7,'tuslamjzammin7'=>$tuslamjzammin7,'tuslamjurtuumin7'=>$tuslamjurtuumin2, 'speed7'=>$speed7,'hotsrolt7'=>$hotsrolt7,'tormoz7'=>$tormoz7,'hurdniit7'=>$hurdniit7,'yaraltainiit7'=>$yaraltainiit7,'yaraltainiitmin7'=>$yaraltainiitmin7
            ,'suudal8'=>$suudal8,'selgee8'=>$selgee8,'achaa8'=>$achaa8,'niit8'=>$niit8,'hurd8'=>$hurd8,'yaraltai8'=>$yaraltai8,'yaraltai358'=>$yaraltai358,'yaraltai368'=>$yaraltai368,'yaraltai378'=>$yaraltai378,'yaraltai388'=>$yaraltai388,'yaraltaimin8'=>$yaraltaimin8,'yaraltai35min8'=>$yaraltai35min8,'yaraltai36min8'=>$yaraltai36min8,'yaraltai37min8'=>$yaraltai37min8,'yaraltai38min8'=>$yaraltai38min8,'zurchil8'=>$zurchil8,'niitzurchil8'=>$niitzurchil2,'orohachaa8'=>$orohachaa8,'orohsuudal8'=>$orohsuudal8,'orohniit8'=>$orohniit2,'orohachaamin8'=>$orohachaamin8,'orohsuudalmin8'=>$orohsuudalmin8,'orohniitmin8'=>$orohniitmin8,'uharsan8'=>$uharsan8 ,'uharsanmin8'=>$uharsanmin8,'hoorond8'=>$hoorond8,'hoorondmin8'=>$hoorondmin8,'techno8'=>$techno8,'technomin8'=>$technomin8,'tuslamjzam8'=>$tuslamjzam8,'tuslamjurtuu8'=>$tuslamjurtuu8,'tuslamjzammin8'=>$tuslamjzammin8,'tuslamjurtuumin8'=>$tuslamjurtuumin2, 'speed8'=>$speed8,'hotsrolt8'=>$hotsrolt8,'tormoz8'=>$tormoz8,'hurdniit8'=>$hurdniit8,'yaraltainiit8'=>$yaraltainiit8,'yaraltainiitmin8'=>$yaraltainiitmin8
            ,'suudal9'=>$suudal9,'selgee9'=>$selgee9,'achaa9'=>$achaa9,'niit9'=>$niit9,'hurd9'=>$hurd9,'yaraltai9'=>$yaraltai9,'yaraltai359'=>$yaraltai359,'yaraltai369'=>$yaraltai369,'yaraltai379'=>$yaraltai379,'yaraltai389'=>$yaraltai389,'yaraltaimin9'=>$yaraltaimin9,'yaraltai35min9'=>$yaraltai35min9,'yaraltai36min9'=>$yaraltai36min9,'yaraltai37min9'=>$yaraltai37min9,'yaraltai38min9'=>$yaraltai38min9,'zurchil9'=>$zurchil9,'niitzurchil9'=>$niitzurchil2,'orohachaa9'=>$orohachaa9,'orohsuudal9'=>$orohsuudal9,'orohniit9'=>$orohniit2,'orohachaamin9'=>$orohachaamin9,'orohsuudalmin9'=>$orohsuudalmin9,'orohniitmin9'=>$orohniitmin9,'uharsan9'=>$uharsan9 ,'uharsanmin9'=>$uharsanmin9,'hoorond9'=>$hoorond9,'hoorondmin9'=>$hoorondmin9,'techno9'=>$techno9,'technomin9'=>$technomin9,'tuslamjzam9'=>$tuslamjzam9,'tuslamjurtuu9'=>$tuslamjurtuu9,'tuslamjzammin9'=>$tuslamjzammin9,'tuslamjurtuumin9'=>$tuslamjurtuumin2, 'speed9'=>$speed9,'hotsrolt9'=>$hotsrolt9,'tormoz9'=>$tormoz9,'hurdniit9'=>$hurdniit9,'yaraltainiit9'=>$yaraltainiit9,'yaraltainiitmin9'=>$yaraltainiitmin9
            ,'suudal10'=>$suudal10,'selgee10'=>$selgee10,'achaa10'=>$achaa10,'niit10'=>$niit10,'hurd10'=>$hurd10,'yaraltai10'=>$yaraltai10,'yaraltai3510'=>$yaraltai3510,'yaraltai3610'=>$yaraltai3610,'yaraltai3710'=>$yaraltai3710,'yaraltai3810'=>$yaraltai3810,'yaraltaimin10'=>$yaraltaimin10,'yaraltai35min10'=>$yaraltai35min10,'yaraltai36min10'=>$yaraltai36min10,'yaraltai37min10'=>$yaraltai37min10,'yaraltai38min10'=>$yaraltai38min10,'zurchil10'=>$zurchil10,'niitzurchil10'=>$niitzurchil10,'orohachaa10'=>$orohachaa10,'orohsuudal10'=>$orohsuudal10,'orohniit10'=>$orohniit10,'orohachaamin10'=>$orohachaamin10,'orohsuudalmin10'=>$orohsuudalmin10,'orohniitmin10'=>$orohniitmin10,'uharsan10'=>$uharsan10 ,'uharsanmin10'=>$uharsanmin10,'hoorond10'=>$hoorond10,'hoorondmin10'=>$hoorondmin10,'techno10'=>$techno10,'technomin10'=>$technomin10,'tuslamjzam10'=>$tuslamjzam10,'tuslamjurtuu10'=>$tuslamjurtuu10,'tuslamjzammin10'=>$tuslamjzammin10,'tuslamjurtuumin10'=>$tuslamjurtuumin10, 'speed10'=>$speed10,'hotsrolt10'=>$hotsrolt10,'tormoz10'=>$tormoz10,'hurdniit10'=>$hurdniit10,'yaraltainiit10'=>$yaraltainiit10,'yaraltainiitmin10'=>$yaraltainiitmin10]);
    }


}
