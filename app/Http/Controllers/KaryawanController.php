<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Jabatan;
use App\Departemen;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;
use Yajra\Datatables\Datatables;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //Get all the recordrs from posts table thorough Post model
        //$karyawan = Karyawan::all();
       // $jabatan = Jabatan::all();

       $karyawans = Karyawan::paginate(10);

        //return $karyawan; dd;
        //Then return to app/index.blade.php in view along with all the data stored in postes
       return view('master.index', compact('karyawans'));

    }

      public function index2()
    {
        //return view('datatable');
    }


    public function getPosts(Datatables $datatables)
    {
        $query = Karyawan::all();

        return $datatables->collection($query)
                          //->addColumn('action', 'eloquent.tables.users-action')
                          ->make(true);
    }

    public function tampil(){
        $karyawans = Karyawan::select('id','nik','mpwp')->get();

        return Datatables::of($karyawans)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $departemen = Departemen::all();

        //It will simply redirect to the app/create.blade.php where the form is present.
        return view('master.create',compact('jabatan', 'departemen'));
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
            'nik' => 'required',
            'name' => 'required',
            ]);

            //store data
            $karyawan = new karyawan;
            $karyawan->nik = $request->nik;
            $karyawan->npwp = $request->npwp;
            $karyawan->ktp = $request->ktp;
            $karyawan->name = $request->name;
            $karyawan->jenis_kelamin = $request->jenis_kelamin;
            $karyawan->jabatan_id = $request->jabatan_id;
            $karyawan->departemen_id = $request->departemen_id;
            $karyawan->save();

            //After storing redirect to /app
            return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get all the information associated with given ID
        $karyawan = Karyawan::find($id);
        //And return to show.blade.php file.
        return view('master.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Get all the information associated with given ID
        $karyawan = Karyawan::find($id);
        $jabatan = Jabatan::all();
        $departemen = Departemen::all();


        //And return to  edit.blade.php view file.
        return view('master.edit', compact('karyawan','jabatan','departemen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //validate
        $this->validate($request, [
            'nik' => 'required',
            'ktp' => 'required',
            ]);

            //store
            $karyawan = Karyawan::find($id);
            $karyawan->nik = $request->nik;
            $karyawan->npwp = $request->npwp;
            $karyawan->ktp = $request->ktp;
            $karyawan->name = $request->name;
            $karyawan->jenis_kelamin = $request->jenis_kelamin;
            $karyawan->jabatan_id = $request->jabatan_id;
            $karyawan->departemen_id = $request->departemen_id;
            $karyawan->save();

            //return with a success message
            return redirect('/karyawan')->with('status', 'Updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       ///take the id
       $karyawan = Karyawan::find($id);

               //and delete everything associated with that ID
               $karyawan->delete();

               //reture to manage.blade.php with a success method.
               return redirect('/karyawan')->with('status', 'Deleted successfuly!');
    }

    // Add this lines at the bottom of the CrudController class
    public function manage()
    {
    // Get all the recordrs from posts table thorough Post model
        $karyawan = Karyawan::all();
    //Then return to app/manage.blade.php in view along with all the data.
    return view('master.manage', compact('karyawan'));
    }

}
