@extends('master.master')

@section('content')


        <h1 class="text-center">Add New Lembur</h1>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('lembur.store')}}" method="post">

            {{ csrf_field() }}
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Nama Karyawan</label>                    
                        <select class="form-control" name="karyawan_id">
                        @foreach($karyawan as $karyawans)
                            <option value="{{$karyawans->id}}">{{$karyawans->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
             </div>

            <div class="row">
                <div class="col-md-3">
                    <label for="title">Tanggal</label>     
                    <div class="input-group date" data-provide="">
                     <input type="date" name='mulai' class="datepicker form-control input-lg">
                    </div>
            </div>


                
            <div class="col-md-3">
                        <label for="title">Total Jam</label>     
                         <div class="input-group" data-provide="">
                           <input type="number" name="selesai" min="1" max="8" class="form-control">
                             
                        </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Reason</label>
                          <textarea class="form-control" rows="5" id="alasan" name="alasan"></textarea>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<script>
$('.datepicker').datepicker({
    format: 'yyyy/mm/dd',
    startDate: '-4d',
    todayHighlight:true,
    autoclose: true,
});
</script>

@endsection 


