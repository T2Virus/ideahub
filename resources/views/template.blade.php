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
    </div>
  </div>
</div>
@endsection

@section('script')
@parent
<script type="text/javascript"></script>
@endsection