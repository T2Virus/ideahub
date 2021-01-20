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
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        @include('layouts.partials.sidebar')
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <div class="card border-success">
            <div class="card-header">
                <h4 class="header-title">Dashboard</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                You are logged in!
            </div>
        </div>
        {{-- ideas --}}
        @foreach($ideas as $idea)
          <div class="card idea">
            <img class="card-img-top" src="{{$idea->image}}" alt="Card image cap" width="100%" height="300px">
            <div class="card-body">
              <h3 class="card-title">{{$idea->title}}
              @if($idea->investor_id!=null)
              <span class="badge badge-pill badge-warning pull-right">INVESTED</span>
              @endif
              </h3>
              <p class="card-text">{{substr($idea->idea,0,300)}}</p>
              <a href="{{route('idea.view', ['idea_id' => $idea->id])}}" class="btn btn-primary">Read More →</a>
            </div>
            <div class="card-footer text-muted">
              Posted on {{Carbon\Carbon::parse($idea->created_at)->format('M d Y')}} by <a href="#">{{$idea->user->username}}</a>
              <span class="badge badge-pill badge-info pull-right">{{$idea->idea_type}}</span>
              <span class="badge badge-pill badge-success pull-right">{{$idea->category}}</span>         
            </div>
          </div>
        @endforeach
        {{ $ideas->links() }}
      </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection

@section('script')
@parent
<script type="text/javascript"></script>
@endsection