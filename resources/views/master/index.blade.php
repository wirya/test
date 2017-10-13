@extends ('master.master')

@section('alert')

    @if(Session::has('status'))
    <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    {{ Session::get('status') }}
    </div>
    @endif

@endsection



@section('content')
<a class="btn btn-success btn-sm" href="{{@url('karyawan/create')}}">Add New</a>
<p/>
<table class="table table-bordered">
  <thead>
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>NPWP</th>
        <th>Name</th>
        <th>Jenis Kelamin</th>
        <th>Jabatan</th>
        <th>Departemen</th>
        <th colspan="2">action</th>
      
      </tr>
    </thead>
    <tbody>
     @foreach ($karyawans as $karyawan)
      <tr>
        <td>{{$karyawan->id}}</td>
        <td>{{$karyawan->nik}}</td>
         <td>{{$karyawan->npwp}}</td>
        <td><a href="{{@url('karyawan').'/'.$karyawan->id}}"> {{$karyawan->name}}</a></td>
         <td>
          @if ($karyawan->jenis_kelamin == 1)
               Laki-Laki
            @else 
                Perempuan 
          @endif
         </td>
        <td>{{$karyawan->jabatan->nama_jabatan}}</td>
        <td>{{$karyawan->departemen->nama_departemen}}</td>
        <td> <a href="{{@url('karyawan').'/'.$karyawan->id.'/edit'}}" class="btn btn-primary btn-sm">update</a></td>
        <td> <a href="{{@url('karyawan').'/'.$karyawan->id}}" class="btn btn-danger  btn-sm">delete</a></td>
      </tr>
       @endforeach
    </tbody>
  </table>

Total Records= {{ $karyawans->total() }}

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  {{$karyawans->render("pagination::bootstrap-4")}}
  </ul>
</nav>


@endsection

