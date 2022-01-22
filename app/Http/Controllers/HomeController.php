<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log\LogSistema;
use App\Models\Login;
use App\Models\Cliente;
use App\Models\Producto;
use Carbon\Carbon;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 

      
         $start_date = date("Y").'-'.date("m").'-'.'01';
         $end_date =  date("Y").'-'.date("m").'-'.cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"));


         $mes_1 = \DB::table('logins')
         ->where('mes', '01')
         ->count();

         $mes_2 = \DB::table('logins')
         ->where('mes', '02')
         ->count();

         $mes_3 = \DB::table('logins')
         ->where('mes', '03')
         ->count();

         $mes_4 = \DB::table('logins')
         ->where('mes', '04')
         ->count();

         $mes_5 = \DB::table('logins')
         ->where('mes', '05')
         ->count();

         $mes_6 = \DB::table('logins')
         ->where('mes', '06')
         ->count();

         $mes_7 = \DB::table('logins')
         ->where('mes', '07')
         ->count();

         $mes_8 = \DB::table('logins')
         ->where('mes', '08')
         ->count();

         $mes_9 = \DB::table('logins')
         ->where('mes', '09')
         ->count();

         $mes_10 = \DB::table('logins')
         ->where('mes', '10')
         ->count();

         $mes_11 = \DB::table('logins')
         ->where('mes', '11')
         ->count();

         $mes_12 = \DB::table('logins')
         ->where('mes', '12')
         ->count();




        


       
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha ingresado al home del sistema a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();

        return view('admin.home.index', compact('mes_1',
                                                'mes_2',
                                                'mes_3',
                                                'mes_4',
                                                'mes_5',
                                                'mes_6',
                                                'mes_7',
                                                'mes_8',
                                                'mes_9',
                                                'mes_10',
                                                'mes_11',
                                                'mes_12',
                                                

                                                ));



           

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha ingresado al home del sistema a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();

        return view('admin.home.index');
      
    }

    public function logs()
    {   
        //dd(LogSistema::get());

        $logs= LogSistema::get();

        return view('admin.home.logs', compact('logs'));
    }

     private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }
}
