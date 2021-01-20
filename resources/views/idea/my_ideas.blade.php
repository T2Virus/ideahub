@extends('layouts.app')

@section('htmlheader')
@parent
<style>
div.idea, ul.pagination{
  margin-top:20px;
}
span.badge{
  margin-right: 4px;
}
</style>
@endsection

@section('content')
<!-- Page Content -->
<div class="container">
  @include('flash::message')
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        @include('layouts.partials.sidebar')
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        @if(count($my_ideas)<=0)
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>You have no ideas</strong> 
        </div>
        @else
        {{-- ideas --}}
        <table class="table table-striped" id="example">
          <thead>
            <tr>
              <th>#</th>
              <th>Idea's Title</th>
              <th>Idea Shared By</th>
              <th>Idea Invested By</th>
              <th>Category</th>
              <th>Type</th>
              <th>Budget</th>
              <th>Duration</th>
              @if(Auth::guard('web')->check())
              <th>Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach($my_ideas as $key => $idea)
            <tr>
              <td>{{$key+1}}</td>
              <td><a href="{{route('idea.view', ['idea_id' => $idea->id])}}" target="_blank">{{$idea->title}}</a></td>
              <td>{{$idea->user->username}}</td>
              <td>
                @if($idea->investor_id!=null)
                  {{$idea->investor->username}}
                @else
                  N/A
                @endif
              </td>
              <td>{{$idea->category}}</td>
              <td>{{$idea->idea_type}}</td>
              <td>{{$idea->budget}}</td>
              <td>{{$idea->duration}}</td>
              @if(Auth::guard('web')->check())
              <td>
                <a role="button" class="btn btn-info pull-right invest btn-sm" href="{{route('idea.edit', ['idea_id' => $idea->id])}}">Edit</a>
                <a role="button" class="btn btn-danger pull-right invest btn-sm" href="{{route('idea.delete', ['idea_id' => $idea->id])}}" style="margin-top: 5px;" onclick="return alert('Are you sure that you want to delete this Idea?');">Delete</a>
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection

@section('script')
@parent
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection