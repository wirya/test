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


<a class="btn btn-success btn-sm" href="{{@url('lembur/create')}}">Add New</a> <a class="btn btn-danger btn-sm" href="{{@url('exporttoexcel')}}">Export to Excel</a>

<p/>
<table class="table table-bordered">
  <thead>
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Approve by</th>
        <th>Alasan</th>
      
      </tr>
    </thead>
    <tbody>
     @foreach ($lemburs as $lembur)
      <tr>
        <td>{{$lembur->id}}</td>
        <td>{{$lembur->karyawan_id}}</td>
         <td>{{$lembur->karyawan->name}}</td>
         <td>{{$lembur->mulai}}</td>
         <td>{{$lembur->selesai}}</td>
         <td>{{$lembur->approve_by}}</td>
         <td>{{$lembur->alasan}}</td>
      </tr>
       @endforeach
    </tbody>
  </table>
Total Records= {{ $paginator->total() }}

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    {{$paginator->render("pagination::bootstrap-4")}}
  </ul>
</nav>





@endsection

