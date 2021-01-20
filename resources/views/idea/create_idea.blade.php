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
      <h3 class="card-title">Create Your Idea</h3>
      <form action="" method="post">
      {!! csrf_field() !!}
      <div class="form-group">
        <label for="title">Title: </label>
        <input type="text" class="form-control" placeholder="Enter Title of your Idea" name="title" required>
      </div>
      <div class="form-group">
        <label for="image">Image URL: </label>
        <input type="url" class="form-control" placeholder="Enter Image URL of your Idea" name="image">
      </div>
      <div class="form-group">
      <label for="category">Category of Your Idea: </label>
      <select class="form-control" name="category" required>
        <option>Select Category</option>
        @foreach($values['categories'] as $category)
        <option value="{{$category}}">{{$category}}</option>
        @endforeach
      </select>
      </div>
      <div class="form-group">
        <label for="budget">Budget: </label>
        <input type="text" class="form-control" placeholder="Enter budget of your Idea" name="budget">
      </div>
      <div class="form-group">
      <label for="idea_type">Type of Your Idea: </label>
      <select class="form-control" name="idea_type" required>
        <option>Select Idea's Type</option>
        @foreach($values['idea_types'] as $idea_type)
        <option value="{{$idea_type}}">{{$idea_type}}</option>
        @endforeach
      </select>
      </div>
      <div class="form-group">
      <label for="idea_type">Duration: </label>
      <select class="form-control" name="duration" required>
        <option>Select Duration of Your Idea</option>
        @foreach($values['durations'] as $duration)
        <option value="{{$duration}}">{{$duration}}</option>
        @endforeach
      </select>
      </div>
      <div class="form-group">
        <label for="idea">Description of Your Idea: </label>
        <textarea class="form-control" rows="10"  name="idea"></textarea>
      </div>
      <button type="submit" class="btn btn-info btn-block">Submit Your Idea</button>
      </form>
    </div>
    </div>
  </div>
</div>
@endsection

@section('script')
@parent
<script type="text/javascript"></script>
@endsection