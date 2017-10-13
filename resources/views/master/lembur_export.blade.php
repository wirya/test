<table class="table table-bordered table-striped">
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
    @foreach($lemburs as $key => $lembur)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{$lembur->karyawan_id}}</td>
         <td>{{$lembur->name}}</td>
         <td>{{$lembur->mulai}}</td>
         <td>{{$lembur->selesai}}</td>
         <td>{{$lembur->approve_by}}</td>
         <td>{{$lembur->alasan}}</td>
      </tr>
       @endforeach
    </tbody>
  </table>