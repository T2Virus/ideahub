@extends('layouts.app')

@section('htmlheader')
@parent
<style>

</style>
@endsection

@section('content')
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
    	<h3 class="card-title">{{$idea->title}}
    @if($idea->investor_id!=null)
    <span class="badge badge-pill badge-warning pull-right">INVESTED</span>
    @else
    @if(Auth::guard('investor')->check())
    <a role="button" class="btn btn-warning pull-right invest btn-sm" href="{{route('idea.invest', ['idea_id' => $idea->id])}}">Want to Invest?</a>
    @endif
    @endif
    </h3>
    	<!-- Preview Image -->
      <img class="img-fluid rounded img-thumbnail mx-auto d-block" src="{{$idea->image}}" alt=""><hr>
      <!-- Date/Time -->
      <p>Posted on {{Carbon\Carbon::parse($idea->created_at)->format('M d Y')}}</p><hr>
      <p>
      <strong>Budget: </strong><span class="badge badge-pill badge-primary">{{$idea->budget}}</span>
      <strong>Duration: </strong><span class="badge badge-pill badge-dark">{{$idea->duration}}</span>
      <strong>Category: </strong><span class="badge badge-pill badge-success">{{$idea->category}}</span>
      <strong>Type: </strong><span class="badge badge-pill badge-info">{{$idea->idea_type}}</span>
      </p><hr>
      <!-- Post Content -->
      <p class="text-justify">{{$idea->idea}}</p><hr>
      <!-- Comments Form -->
      <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
          <form>
            <div class="form-group">
              <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

      <!-- Single Comment -->
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
      </div>

      <!-- Comment with nested comments -->
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

          <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

          <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
@parent
<script type="text/javascript">
	$(function(){
		$('a.invest').click(function(e){
			// e.preventDefault();
			alert('Are you sure that you want to invest?');
		});
	});
</script>
@endsection