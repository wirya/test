@extends ('master.master')

@section ('content')

<div class="modal fade" id="KaryawanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Karyawan {{$karyawan->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class='table'>
        <tr>
            <td>NIK</td>
            <td>{{$karyawan->nik}}</td>
        </tr>
        <tr>
             <td>NPWP</td>
            <td>{{$karyawan->npwp}}</td>
        </tr>
        <tr>
            <td>KTP</td>
            <td>{{$karyawan->ktp}}</td>
        </tr>
        <tr>
            <td>Gender</td>
             <td>{{$karyawan->jenis_kelamin}}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
             <td>{{$karyawan->jabatan->nama_jabatan}}</td>
        </tr>
         <tr>
            <td>Departemen</td>
             <td>{{$karyawan->departemen->nama_departemen}}</td>
        </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection                              
             