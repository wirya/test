@extends('master.master')

@section('content')
    
        <h1 class="text-center">Add New Karwayan</h1>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('karyawan.store')}}" method="post">
            {{ csrf_field() }}
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="title"><h5>NIK</h5></label>
                    <input type="text" class="form-control" name="nik" aria-describedby="textHelp" placeholder="NIK">
                    </div>
                </div>
             </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title"><h5>NPWP</h5></label>
                        <input type="text" class="form-control" name="npwp" aria-describedby="textHelp" placeholder="NPWP">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title"><h5>KTP</h5></label>
                        <input type="text" class="form-control" name="ktp" aria-describedby="textHelp" placeholder="KTP">
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title"><h5>Nama</h5></label>
                        <input type="text" class="form-control" name="name" aria-describedby="textHelp" placeholder="Nama Karyawan">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="radio-inline"><input type="radio" value="1" checked="checked" name="jenis_kelamin"> Laki-Laki </label>
                <label class="radio-inline"><input type="radio" value="0" name="jenis_kelamin"> Perempuan </label>
            </div>

           <div class="form-group">
           <div class="row">
                <div class="col-md-6">
                    <label for="sel1">Jabatan</label>
                    <select class="form-control" name="jabatan_id">
                    @foreach($jabatan as $jabatan)
                        <option value="{{$jabatan->id}}">{{$jabatan->nama_jabatan}}</option>
                    @endforeach
                    </select>
                </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sel1">Departemen</label>
                    <select class="form-control" name="departemen_id">
                    @foreach($departemen as $departemen)
                        <option value="{{$departemen->id}}">{{$departemen->nama_departemen}}</option>
                    @endforeach
                    </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       
@endsection 