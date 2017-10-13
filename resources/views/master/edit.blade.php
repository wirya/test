@extends ('master.master')

@section('content')
    <h1 class="text-center">Edit</h1>
    <hr/>

    <form action="{{route('karyawan.store').'/'.$karyawan->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="title"><h5>NIK</h5></label>
                <input type="text" class="form-control" name="nik" aria-describedby="textHelp"  value="{{$karyawan->nik}}">
            </div>
            <div class="form-group">
                <label for="title"><h5>NPWP</h5></label>
                <input type="text" class="form-control" name="npwp" aria-describedby="textHelp" value="{{$karyawan->npwp}}">
            </div>
            <div class="form-group">
                <label for="title"><h5>KTP</h5></label>
                <input type="text" class="form-control" name="ktp" aria-describedby="textHelp" value="{{$karyawan->ktp}}">
            </div>
            
            <div class="form-group">
                <label for="title"><h5>Nama</h5></label>
                <input type="text" class="form-control" name="name" aria-describedby="textHelp" value="{{$karyawan->name}}">
            </div>

            <div class="form-group">
            @if ($karyawan->jenis_kelamin == 1)
                <label class="radio-inline"><input type="radio" value="1" checked="checked" name="jenis_kelamin"> Laki-Laki </label>
                <label class="radio-inline"><input type="radio" value="0" name="jenis_kelamin"> Perempuan </label>
            @else ($karyawan->jenis_kelamin == 0)
                <label class="radio-inline"><input type="radio" value="1" name="jenis_kelamin"> Laki-Laki </label>
                <label class="radio-inline"><input type="radio" value="0" checked="checked" name="jenis_kelamin"> Perempuan </label>
           
            @endif

         
            </div>


           <div class="form-group">
            <label for="sel1">Jabatan</label>
            <select class="form-control" name="jabatan_id">
             @foreach($jabatan as $jabatan)
               <option value="{{$jabatan->id}}">{{$jabatan->nama_jabatan}}</option>
                    @if ($karyawan->jabatan->id==$jabatan->id)
                        <option value="{{$jabatan->id}}" selected>{{$jabatan->nama_jabatan}}</option>
                    @endif
                @endforeach
            </select>
            </div>
                        
            <div class="form-group">
            <label for="sel1">Departemen</label>
            <select class="form-control" name="departemen_id">
             @foreach($departemen as $departemen)
               <option value="{{$departemen->id}}">{{$departemen->nama_departemen}}</option>
                    @if ($karyawan->departemen->id==$departemen->id)
                            <option value="{{$departemen->id}}" selected>{{$departemen->nama_departemen}}</option>
                    @endif
                @endforeach
            </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{@url('karyawan')}}" class="btn btn-danger">Cancel</a>
    </form>

@endsection   