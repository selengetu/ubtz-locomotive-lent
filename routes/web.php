<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AchaaController@index')->name('home');
Route::get('/home', 'AchaaController@index')->name('home');
Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/devmachinist', 'MachinistController@index')->name('devmachinist');
Route::get('/devachaa', 'AchaaController@index')->name('devachaa');
Route::get('/devsuudal', 'AchaaController@suudal')->name('devsuudal');
Route::get('/devtsuwaa', 'TsuwaaController@index')->name('devtsuwaa');
Route::get('/devselgee', 'AchaaController@selgee')->name('devselgee');
Route::get('/devzurchil', 'ZurchilController@index')->name('devzurchil');
Route::get('/userfeed', 'FeedController@index')->name('userfeed');


Route::match(['get', 'post'],'/masha8', 'MachinistController@masha8')->name('masha8');
Route::match(['get', 'post'],'/masholon', 'MachinistController@masholon')->name('masholon');
Route::get('/mashzurchil', 'MachinistController@indexzurchil')->name('mashzurchil');
Route::post('/searchmachinistzurchil', 'MachinistController@searchzurchil')->name('searchmachinistzurchil');
Route::post('/searchmachinist', 'MachinistController@search')->name('searchmachinist');

Route::match(['get', 'post'],'/haluunzogsolttailan', 'HaluunZogsoltController@tailan')->name('haluunzogsolttailan');
Route::match(['get', 'post'],'/haluunzogsoltseri', 'HaluunZogsoltController@seri')->name('haluunzogsoltseri');
Route::match(['get', 'post'],'/tuuzorchuulsan', 'TailanController@index')->name('tuuzorchuulsan');
Route::match(['get', 'post'],'/dooshorson', 'TailanController@dooshorson')->name('dooshorson');

Route::match(['get', 'post'],'/urtuu30', 'TailanController@urtuu30')->name('urtuu30');
Route::match(['get', 'post'],'/urtuu120', 'TailanController@urtuu120')->name('urtuu120');
Route::match(['get', 'post'],'/busad', 'TailanController@busad')->name('busad');
Route::match(['get', 'post'],'/anhaaramj', 'TailanController@anhaaramj')->name('anhaar');
Route::match(['get', 'post'],'/hurdhemjigch', 'TailanController@hurdhemjigch')->name('hurdhemjigch');
Route::match(['get', 'post'],'/hurdhureegui', 'TailanController@hurdhureegui')->name('hurdhureegui');
Route::match(['get', 'post'],'/technoiluu', 'TailanController@technoiluu')->name('technoiluu');
Route::match(['get', 'post'],'/orohdohio', 'TailanController@orohdohio')->name('orohdohio');
Route::match(['get', 'post'],'/hiiergesen', 'TailanController@hiiergesen')->name('hiiergesen');
Route::match(['get', 'post'],'/yaraltaitormoz', 'TailanController@yaraltaitormoz')->name('yaraltaitormoz');
Route::match(['get', 'post'],'/uharsan', 'TailanController@uharsan')->name('uharsan');
Route::match(['get', 'post'],'/graph', 'TailanController@graph')->name('graph');
Route::get('/niilberanhaaramj', 'TailanController@niilberanhaaramj')->name('niilberanhaaramj');
Route::match(['get', 'post'],'/hoorondzamzogsolt', 'TailanController@hoorondzamzogsolt')->name('hoorondzamzogsolt');
Route::match(['get', 'post'],'/hajuugiinzam', 'TailanController@hajuugiinzam')->name('hajuugiinzam');
Route::match(['get', 'post'],'/buguiwch', 'TailanController@buguiwch')->name('buguiwch');
Route::match(['get', 'post'],'/attention', 'TailanController@attention')->name('attention');
Route::match(['get', 'post'],'/tuslamj', 'TailanController@tuslamj')->name('tuslamj');
Route::match(['get', 'post'],'/nagon', 'TailanController@nagon')->name('nagon');
Route::match(['get', 'post'],'/norm', 'TailanController@norm')->name('norm');
Route::match(['get', 'post'],'/all', 'DepoTailanController@index')->name('all');
Route::match(['get', 'post'],'/refresh', 'AchaaController@refresh')->name('refresh');
Route::get('/getmarshzut/{id?}',function($id = 0){	
				$dt=DB::table('MARSHZUTGUUR')
                ->where('marshid','=',$id)->get();
				return $dt;
		});	
Route::get('/getmarshburel/{id?}',function($id = 0){	
				$dt=DB::table('ZUTGUUR.MARSHBUREL')
                ->where('marshid','=',$id)->where('depocode', '=', Auth::user()->depo_id)->get();
				return $dt;
		});	
Route::get('/getmarshselgee/{id?}',function($id = 0){	
				$dt=DB::table('SELGEE')
                ->where('route_id','=',$id)->get();
				return $dt;
		});	
Route::get('/getmarshstat/{id?}',function($id = 0){	
				$dt=DB::table('V_MARSHSTAT')
                ->where('marshid','=',$id)->where('depocode', '=', Auth::user()->depo_id)->get();
				return $dt;
		});	
Route::get('/getmarshbrig/{id?}',function($id = 0){	
				$dt=DB::table('V_MARSHBRIG')
                ->where('marshid','=',$id)->get();
				return $dt;
		});	

Route::get('/getmarshtuuz/{id?}',function($id = 0){
				$dt=DB::table('V_RIBBON')
                ->where('route_id','=',$id)->where('depocode', '=', Auth::user()->depo_id)->orderby('split_id')->get();
				return $dt;
					});	
Route::get('/getmarshattention/{id?}',function($id = 0){	
				$dt=DB::table('V_ATTENTION')
                ->where('ribbon_id','=',$id)->get();
				return $dt;

					});
Route::get('/getmarshattentioncount/{id?}',function($id = 0){	
				$dt=DB::table('V_ATTENTION_COUNT')
                ->where('ribbon_id','=',$id)->get();
				return $dt;

					});
Route::get('/getmarshhajuu/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT')
                ->where('ribbon_id','=',$id)->where('fault_no','=',1)->get();
				return $dt;
				
					});
Route::get('/getmarshattent/{id?}',function($id = 0){
    $dt=DB::table('V_ATTENTION')
        ->where('attention_id','=',$id)->get();
    return $dt;

});
Route::get('/getmarshtuslamj/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->whereIn('fault_no',[3,4,5,6])->get();
				return $dt;
				
					});
Route::get('/getmarshuharsan/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',8)->get();
				return $dt;
				
					});
Route::get('/getmarshhurdhetruulsen/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',32)->get();
				return $dt;
				
					});
Route::get('/getmarsh45/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',22)->get();
				return $dt;
				
					});
Route::get('/getmarsheffect/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',33)->get();
				return $dt;
				
					});
Route::get('/getmarshfaultdet/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('fault_id','=',$id)->get();
				return $dt;
				
					});
Route::get('/getmarshfault/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT')
                ->where('fault_id','=',$id)->get();
				return $dt;
				
					});
Route::get('/getmarshtormozburuu/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',37)->get();
				return $dt;
				
					});
Route::get('/getmarshepkgemtel/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',27)->get();
				return $dt;
				
					});
Route::get('/getmarshepkhaasan/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',26)->get();
				return $dt;
				
					});
Route::get('/getmarshkran/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',13)->get();
				return $dt;
				
					});
Route::get('/getmarshtormoztursh/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',23)->get();
				return $dt;
				
					});
Route::get('/getmarshoroh/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',21)->get();
				return $dt;
				
					});
Route::get('/getmarshyaraltai/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',35)->get();
				return $dt;
				
					});
Route::get('/getmarshgolhooloi/{id?}',function($id = 0){
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',16)->get();
				return $dt;
				
					});
Route::get('/getmarshepkajil/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',25)->get();
				return $dt;
				
					});
Route::get('/getmarshepkkon/{id?}',function($id = 0){
    $dt=DB::table('V_FAULT_DET')
        ->where('ribbon_id','=',$id)->where('fault_no','=',121)->get();
    return $dt;

});
Route::get('/getmarsh20/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',10)->get();
				return $dt;
				
					});
Route::get('/getmarshhii/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',11)->get();
				return $dt;
				
					});
Route::get('/getmarshanhaaramj/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',9)->get();
				return $dt;
				
					});
Route::get('/getmarshduud/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',15)->get();
				return $dt;
				
					});
Route::get('/getmarshkilo/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',30)->get();
				return $dt;
				
					});
Route::get('/getmarshklub/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT')
                ->where('ribbon_id','=',$id)->where('fault_no','=',29)->get();
				return $dt;
				
					});
Route::get('/getmarshjoloo/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT')
                ->where('ribbon_id','=',$id)->where('fault_no','=',34)->get();
				return $dt;
				
					});
Route::get('/getmarshjolood/{id?}',function($id = 0){
    $dt=DB::table('V_FAULT')
        ->where('ribbon_id','=',$id)->where('fault_no','=',161)->get();
    return $dt;

});
Route::get('/getmarshbusad/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',41)->get();
				return $dt;
				
					});
Route::get('/getmarshbusaduzuulelt/{id?}',function($id = 0){
    $dt=DB::table('V_FAULT_DET')
        ->where('ribbon_id','=',$id)->where('fault_no','=',141)->get();
    return $dt;

});
Route::get('/getmarshhurdhemjigch/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',36)->get();
				return $dt;
				
					});
Route::get('/getmarshepkshilj/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',14)->get();
				return $dt;
				
					});
Route::get('/getmarshbichlegbudeg/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',19)->get();
				return $dt;
				
					});
Route::get('/getmarshbichlegdutuu/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',20)->get();
				return $dt;
				
					});
Route::get('/getmarshtsag/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',31)->get();
				return $dt;
				
					});
Route::get('/getmarshtuuzzassan/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',17)->get();
				return $dt;
				
					});
Route::get('/getmarshtuuzuragdsan/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',18)->get();
				return $dt;
				
					});
Route::get('/getmarshhoorond/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',2)->get();
				return $dt;
				
					});
Route::get('/getmarshgraphiluu/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',62)->get();
				return $dt;
				
					});
Route::get('/getmarshgraphbus/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',61)->get();
				return $dt;
				
					});
Route::get('/getmarsh205/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',81)->get();
				return $dt;
				
					});
Route::get('/getmarshtechno/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',83)->get();
				return $dt;
				
					});
Route::get('/getmarshurtuu30/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',12)->get();
				return $dt;
				
					});
Route::get('/getmarshconst/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',82)->get();
				return $dt;
				
					});
Route::get('/getmarshbuguiwch/{id?}',function($id = 0){	
				$dt=DB::table('V_FAULT_DET')
                ->where('ribbon_id','=',$id)->where('fault_no','=',102)->get();
				return $dt;
				
					});

Route::get('/getmarshzutguur/{id?}',function($id = 0){	
				$dt=DB::table('ZUTGUURSERI')
                ->where('zutnumber','=',$id)->get();
				return $dt;
				
					});
Route::get('/gethaluunzogsolt/{id?}',function($id = 0){	
				$dt=DB::table('V_HOTSTAND')
                ->where('ribbon_id','=',$id)->get();
				return $dt;
				
					});
Route::get('/gethaluun/{id?}',function($id = 0){
    $dt=DB::table('V_HOTSTAND')
        ->where('hotstand_id','=',$id)->get();
    return $dt;

});
Route::get('/getfeed/{id?}',function($id = 0){
    $dt=DB::table('V_FEED')
        ->where('feed_id','=',$id)->get();
    return $dt;

});
Route::get('/getmarshfirststation/{id?}',function($id = 0){	
				$dt=DB::select("SELECT t.statname,t.statcode FROM V_MARSHSTAT t 
WHERE t.marshid=".$id." and t.gonetime = (SELECT MIN(t.gonetime) FROM V_MARSHSTAT t where t.marshid=".$id.")");
				return $dt;			

		});	
Route::get('/getmarshlaststation/{id?}',function($id = 0){	
				$dt=DB::select("SELECT t.statname,t.statcode FROM V_MARSHSTAT t 
WHERE t.marshid=".$id." and t.arrivtime = (SELECT MAX(t.arrivtime) FROM V_MARSHSTAT t where t.marshid=".$id.")");
				return $dt;			

		});	
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AchaaController@autocomplete'));
Route::post('/addanhaaramj','AchaaController@addanhaaramj')->name('addanhaaramj');
Route::post('/addribbon','AchaaController@addribbon')->name('addribbon');
Route::post('/adduharsan','AchaaController@adduharsan')->name('adduharsan');
Route::post('/addtuslamj','AchaaController@addtuslamj')->name('addtuslamj');
Route::post('/addhajuu','AchaaController@addhajuu')->name('addhajuu');
Route::post('/addzurchilhurd','AchaaController@addzurchilhurd')->name('addzurchilhurd');
Route::post('/addzurchil45','AchaaController@addzurchil45')->name('addzurchil45');
Route::post('/addzurchileffect','AchaaController@addzurchileffect')->name('addzurchileffect');
Route::post('/addzurchiltormozburuu','AchaaController@addzurchiltormozburuu')->name('addzurchiltormozburuu');
Route::post('/addzurchilepkgemtel','AchaaController@addzurchilepkgemtel')->name('addzurchilepkgemtel');
Route::post('/addzurchilepkhaasan','AchaaController@addzurchilepkhaasan')->name('addzurchilepkhaasan');
Route::post('/addzurchilkran','AchaaController@addzurchilkran')->name('addzurchilkran');
Route::post('/addzurchiltormoztursh','AchaaController@addzurchiltormoztursh')->name('addzurchiltormoztursh');
Route::post('/addzurchiloroh','AchaaController@addzurchiloroh')->name('addzurchiloroh');
Route::post('/addzurchilyaraltai','AchaaController@addzurchilyaraltai')->name('addzurchilyaraltai');
Route::post('/addzurchilgolhooloi','AchaaController@addzurchilgolhooloi')->name('addzurchilgolhooloi');
Route::post('/addzurchilepkajil','AchaaController@addzurchilepkajil')->name('addzurchilepkajil');
Route::post('/addzurchilepkkon','AchaaController@addzurchilepkkon')->name('addzurchilepkkon');
Route::post('/addzurchilduud','AchaaController@addzurchilduud')->name('addzurchilduud');
Route::post('/addzurchilkilo','AchaaController@addzurchilkilo')->name('addzurchilkilo');
Route::post('/addzurchilklub','AchaaController@addzurchilklub')->name('addzurchilklub');
Route::post('/addzurchiljoloo','AchaaController@addzurchiljoloo')->name('addzurchiljoloo');
Route::post('/addzurchiljolood','AchaaController@addzurchiljolood')->name('addzurchiljolood');
Route::post('/addzurchilhurdhemjigch','AchaaController@addhurdhemjigch')->name('addhurdhemjigch');
Route::post('/addzurchilepkshilj','AchaaController@addepkshilj')->name('addepkshilj');
Route::post('/addzurchilbichlegdutuu','AchaaController@addbichlegdutuu')->name('addbichlegdutuu');
Route::post('/addzurchilbichlegbudeg','AchaaController@addbichlegbudeg')->name('addbichlegbudeg');
Route::post('/addzurchiltsag','AchaaController@addtsag')->name('addtsag');
Route::post('/addzurchiltuuzuragdsan','AchaaController@addtuuzuragdsan')->name('addtuuzuragdsan');
Route::post('/addzurchiltuuzzassan','AchaaController@addtuuzzassan')->name('addtuuzzassan');
Route::post('/addzurchil20','AchaaController@addzurchil20')->name('addzurchil20');
Route::post('/addzurchilhii','AchaaController@addzurchilhii')->name('addzurchilhii');
Route::post('/addzurchilanhaaramj','AchaaController@addzurchilanhaaramj')->name('addzurchilanhaaramj');
Route::post('/addzurchilbuguiwch','AchaaController@addzurchilbuguiwch')->name('addzurchilbuguiwch');
Route::post('/addzurchilbusad','AchaaController@addbusad')->name('addbusad');
Route::post('/addbusaduzuulelt','AchaaController@addbusaduzuulelt')->name('addbusaduzuulelt');
Route::post('/searchtuuz','AchaaController@search')->name('searchtuuz');
Route::post('/searchmachinist','MachinistController@search')->name('searchmachinist');
Route::post('/addhoorond','AchaaController@addhoorond')->name('addhoorond');
Route::post('/addgraphiluu','AchaaController@addgraphiluu')->name('addgraphiluu');
Route::post('/addgraphbus','AchaaController@addgraphbus')->name('addgraphbus');
Route::post('/add205','AchaaController@add205')->name('add205');
Route::post('/addurtuu30','AchaaController@addurtuu30')->name('addurtuu30');
Route::post('/addtechno','AchaaController@addtechno')->name('addtechno');
Route::post('/addconst','AchaaController@addconst')->name('addconst');
Route::post('/addhaluunzogsolt','HaluunZogsoltController@addhaluun')->name('addhaluun');
Route::post('/addfeed','FeedController@add')->name('addfeed');

Route::get('/hajuu/delete/{id}', 'AchaaController@destroyhajuu');
Route::post('updatehajuu', 'AchaaController@updatehajuu')->name('updatehajuu');
Route::get('/hoorond/delete/{id}', 'AchaaController@destroyhoorond');
Route::post('updatehoorond', 'AchaaController@updatehoorond')->name('updatehoorond');
Route::get('/205/delete/{id}', 'AchaaController@destroy205');
Route::post('update205', 'AchaaController@update205')->name('update205');
Route::get('/urtuu30/delete/{id}', 'AchaaController@destroyurtuu30');
Route::post('updateurtuu30', 'AchaaController@updateurtuu30')->name('updateurtuu30');
Route::get('/techno/delete/{id}', 'AchaaController@destroytechno');
Route::post('updatetechno', 'AchaaController@updatetechno')->name('updatetechno');\
Route::get('/const/delete/{id}', 'AchaaController@destroyconst');
Route::post('updateconst', 'AchaaController@updateconst')->name('updateconst');
Route::get('/tuslamj/delete/{id}', 'AchaaController@destroytuslamj');
Route::post('updatetuslamj', 'AchaaController@updatetuslamj')->name('updatetuslamj');
Route::get('/uharsan/delete/{id}', 'AchaaController@destroyuharsan');
Route::post('updateuharsan', 'AchaaController@updateuharsan')->name('updateuharsan');
Route::get('/graphiluu/delete/{id}', 'AchaaController@destroygraphiluu');
Route::post('updategraphiluu', 'AchaaController@updategraphiluu')->name('updategraphiluu');
Route::get('/graphbus/delete/{id}', 'AchaaController@destroygraphbus');
Route::post('updategraphbus', 'AchaaController@updategraphbus')->name('updategraphbus');


Route::get('/destroyfeed/{id}/delete', ['as' => 'feed.destroy', 'uses' => 'FeedController@destroy']);
Route::post('updatefeed', 'FeedController@update')->name('updatefeed');
Route::get('/joloo/delete/{id}', 'AchaaController@destroyjoloo');
Route::post('updatejoloo', 'AchaaController@updatejoloo')->name('updatejoloo');
Route::get('/jolood/delete/{id}', 'AchaaController@destroyjolood');
Route::post('updatejolood', 'AchaaController@updatejolood')->name('updatejolood');
Route::get('/epkgemtel/delete/{id}', 'AchaaController@destroyepkgemtel');
Route::post('updateepkgemtel', 'AchaaController@updateepkgemtel')->name('updateepkgemtel');
Route::get('/epkhaasan/delete/{id}', 'AchaaController@destroyepkhaasan');
Route::post('updateepkhaasan', 'AchaaController@updateepkhaasan')->name('updateepkhaasan');
Route::get('/epkajil/delete/{id}', 'AchaaController@destroyepkajil');
Route::post('updateepkajil', 'AchaaController@updateepkajil')->name('updateepkajil');
Route::get('/epkkon/delete/{id}', 'AchaaController@destroyepkkon');
Route::post('updateepkkon', 'AchaaController@updateepkkon')->name('updateepkkon');
Route::get('/epkshilj/delete/{id}', 'AchaaController@destroyepkshilj');
Route::post('updateepkshilj', 'AchaaController@updateepkshilj')->name('updateepkshilj');
Route::get('/duud/delete/{id}', 'AchaaController@destroyduud');
Route::post('updateduud', 'AchaaController@updateduud')->name('updateduud');
Route::get('/oroh/delete/{id}', 'AchaaController@destroyoroh');
Route::post('updateoroh', 'AchaaController@updateoroh')->name('updateoroh');
Route::get('/tormozburuu/delete/{id}', 'AchaaController@destroytormozburuu');
Route::post('updatetormozburuu', 'AchaaController@updatetormozburuu')->name('updatetormozburuu');
Route::get('/yaraltai/delete/{id}', 'AchaaController@destroyyaraltai');
Route::post('updateyaraltai', 'AchaaController@updateyaraltai')->name('updateyaraltai');
Route::get('/tormoztursh/delete/{id}', 'AchaaController@destroytormoztursh');
Route::post('updatetormoztursh', 'AchaaController@updatetormoztursh')->name('updatetormoztursh');
Route::get('/golhooloi/delete/{id}', 'AchaaController@destroygolhooloi');
Route::post('updategolhooloi', 'AchaaController@updategolhooloi')->name('updategolhooloi');
Route::get('/tuuzuragdsan/delete/{id}', 'AchaaController@destroytuuzuragdsan');
Route::post('updatetuuzuragdsan', 'AchaaController@updatetuuzuragdsan')->name('updatetuuzuragdsan');
Route::get('/tuuzzassan/delete/{id}', 'AchaaController@destroyyaraltai');
Route::post('updatetuuzzassan', 'AchaaController@updatetuuzzassan')->name('updatetuuzzassan');
Route::get('/bichlegbudeg/delete/{id}', 'AchaaController@destroybichlegbudeg');
Route::post('updatebichlegbudeg', 'AchaaController@updatebichlegbudeg')->name('updatebichlegbudeg');
Route::get('/bichlegdutuu/delete/{id}', 'AchaaController@destroybichlegdutuu');
Route::post('updatebichlegdutuu', 'AchaaController@updatebichlegdutuu')->name('updatebichlegdutuu');
Route::get('/effect/delete/{id}', 'AchaaController@destroyeffect');
Route::post('updateeffect', 'AchaaController@updateeffect')->name('updateeffect');
Route::get('/hurdhetruulsen/delete/{id}', 'AchaaController@destroyhurdhetruulsen');
Route::post('updatehurd', 'AchaaController@updatehurd')->name('updatehurd');
Route::get('/klub/delete/{id}', 'AchaaController@destroyklub');
Route::post('updateklub', 'AchaaController@updateklub')->name('updateklub');
Route::get('/20/delete/{id}', 'AchaaController@destroy20');
Route::post('update20', 'AchaaController@update20')->name('update20');
Route::get('/hii/delete/{id}', 'AchaaController@destroyhii');
Route::post('updatehii', 'AchaaController@updatehii')->name('updatehii');
Route::get('/hurdhemjigch/delete/{id}', 'AchaaController@destroyhurdhemjigch');
Route::post('updatehurdhemjigch', 'AchaaController@updatehurdhemjigch')->name('updatehurdhemjigch');
Route::get('/tsag/delete/{id}', 'AchaaController@destroytsag');
Route::post('updatetsag', 'AchaaController@updatetsag')->name('updatetsag');
Route::get('/kran/delete/{id}', 'AchaaController@destroykran');
Route::post('updatekran', 'AchaaController@updatekran')->name('updatekran');
Route::get('/kilo/delete/{id}', 'AchaaController@destroykilo');
Route::post('updatekilo', 'AchaaController@updatekilo')->name('updatekilo');
Route::get('/attention/delete/{id}', 'AchaaController@destroyattention');
Route::post('updateattention', 'AchaaController@updateattention')->name('updateattention');
Route::get('/buguiwch/delete/{id}', 'AchaaController@destroybuguiwch');
Route::post('updatebuguiwch', 'AchaaController@updatebuguiwch')->name('updatebuguiwch');
Route::get('/busad/delete/{id}', 'AchaaController@destroybusad');
Route::post('updatebusad', 'AchaaController@updatebusad')->name('updatebusad');
Route::get('/busaduzuulelt/delete/{id}', 'AchaaController@destroybusaduzuulelt');
Route::post('updatebusaduzuulelt', 'AchaaController@updatebusaduzuulelt')->name('updatebusaduzuulelt');
Route::get('/45/delete/{id}', 'AchaaController@destroy45');
Route::post('update45', 'AchaaController@update45')->name('update45');
Route::get('/anhaaramj/delete/{id}', 'AchaaController@destroyanhaaramj');
Route::post('updateanhaaramj', 'AchaaController@updateanhaaramj')->name('updateanhaaramj');
Route::get('/haluun/delete/{id}', 'HaluunZogsoltController@destroyhaluun');
Route::post('updatehaluun', 'HaluunZogsoltController@updatehaluun')->name('updatehaluun');
