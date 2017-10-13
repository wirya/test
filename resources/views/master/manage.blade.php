@extends ('layouts.master')


@section('content')
    <h1 class="text-center">Manage All Posts</h1>
    <hr/><br/><br/>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table table-bordered table-hover">
      <thead class="thead-default">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        @foreach ($posts as $post)
        <tr>
          <th scope="row">{{++$i}}</th>
          <td width="200px">{{$post->title}}</td>
          <td>{{$post->content}}</td>
          <td >
          {{-- {{@url('app').'/'.$post->id}} --}}
            <p><a href="{{@url('app').'/'.$post->id.'/edit'}}" class="btn btn-primary">Update</a></p>
            <form action="{{@url('app').'/'.$post->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger">Detete</button>
            </form>
          </td>
        </tr>
        {{-- {{$i++}} --}}
        @endforeach
      </tbody>
    </table>
@endsection