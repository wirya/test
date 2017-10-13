<?php

namespace App\Http\Controllers;

use App\Lembur;
use App\Karyawan;
use Illuminate\Http\Request;
use DB; 
use Excel;
use Carbon\Carbon;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function find(Request $request)
     {
         $nama = trim($request->q);
 
         if (empty($nama)) {
             return Response::json([]);
         }
 
         $namas = Karyawan::search($nama)->limit(5)->get();
 
         $formatted_namas = [];
 
         foreach ($namas as $nama) {
             $formatted_namas[] = ['id' => $nama->id, 'text' => $nama->name];
         }
 
         return Response::json($formatted_namas);
         
     }

     
    public function index()
    {
        
       $lemburs = Lembur::paginate(10);
       //$lembur->count = Lembur::all()->count();
       $paginator = Lembur::paginate(10);
       //return($lembur); dd();
       return view('master.lembur_view', compact('lemburs', 'paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        //It will simply redirect to the app/create.blade.php where the form is present.
        return view('master.lembur',compact('lembur', 'karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //Validate Data
          $this->validate($request, [
            'karyawan_id' => 'required',
            'mulai' => 'required',
               'selesai' => 'required',
            ]);

            //store data
            $lembur = new Lembur;
            $lembur->karyawan_id = $request->karyawan_id;
            $lembur->mulai = $request->mulai;
            $lembur->selesai = $request->selesai;
            $lembur->approve_by = 1;
            $lembur->alasan = $request->alasan;
            $lembur->save();
            
            //After storing redirect to /app
            return redirect('/lembur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function show(Lembur $lembur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function edit(Lembur $lembur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lembur $lembur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lembur $lembur)
    {
        //
    }


    public function getExport()
    {
        Excel::create('Export data Lembur', function($excel) {

        $excel->sheet('Sheet 1', function($sheet) {

                $datalemburs = DB::select('select * from lemburs');
                
                    foreach($datalemburs as $datalembur) {
                    $data[] = array(
                        $datalembur->karyawan_id,
                        $datalembur->mulai,
                        $datalembur->selesai,
                        $datalembur->alasan,
                        $datalembur->approve_by,
                    );
                }
            $sheet->fromArray($data);
        });
     })->export('xls');
    }

    public function exporttoexcel()
    {
        //$dariTanggal = date('Y-m-d' . ' 00:00:00', time()); 
        //$sampaiTanggal = date('Y-m-d' . ' 23:00:00', time()); 
        //$posts = POST::whereBetween('created_at', [$dariTanggal, $sampaiTanggal])->get();
        
        //Carbon
        $dariTanggal = new Carbon('last month'); 
        $sampaiTanggal = new Carbon('now'); 
        //POST::whereBetween('created_at', array($dariTanggal->toDateTimeString(), $sampaiTanggal->toDateTimeString()))->get();
      
        //$lemburs = lembur::all();
        $lemburs = lembur::whereBetween('created_at', array($dariTanggal->toDateTimeString(), $sampaiTanggal->toDateTimeString()))->get();
        return Excel::create('Data Karyawan Lembur', function ($excel) use ($lemburs)
        {
            $excel->sheet('Data Karyawan Lembur', function ($sheet) use ($lemburs)
            {
                $sheet->loadView('master.lembur_export')->with('lemburs', $lemburs);
            });
        })->export('xlsx');
        return redirect()->back();
    }
    
}
