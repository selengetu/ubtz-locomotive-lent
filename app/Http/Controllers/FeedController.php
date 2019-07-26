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
use App\Feed;
use DB;
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class FeedController extends Controller
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
    public function index()
    {

        $feed=DB::select("select * from V_FEED t");
        return view('devter.userfeed')->with(['feed'=>$feed]);
    }
    public function add()
    {

        $feed = new Feed;
        $feed->feed =str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('feed')))));
        $feed->added_user = Auth::id();
            $feed->save();

        activity()->performedOn($feed)->log('Feed added');
        return back()->withInput();
    }
    public function destroy($id)
    {
        Feed::where('feed_id', '=', $id)->delete();

        activity()->log('feed deleted');
        return back()->withInput();
    }
    public function update()
    {
        $department = DB::table('V_FEED')
            ->where('feed_id', Request::input('id'))->exists();
        if ($department == true) {
            $department = DB::table('User_feed')
                ->where('feed_id', Request::input('id'))->update(['feed' =>str_replace('Ү','V',str_replace('ү', 'v',str_replace('Ө','Е',str_replace('ө','е', Request::input('feed')))))]);
           }

        return back()->withInput();


    }



}
