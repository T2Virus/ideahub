@extends('layouts.app')

@section('htmlheader')
@parent
<style>

</style>
@endsection

@section('content')

<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">404
      <small>Page Not Found</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>
      </li>
      <li class="breadcrumb-item active">404</li>
    </ol>

    <div class="jumbotron">
      <h1 class="display-1">404</h1>
      <p>The page you're looking for could not be found. </p>
    </div>
    <!-- /.jumbotron -->

  </div>


@endsection