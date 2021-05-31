@extends('layouts.frontend')

@section('title', 'Mitra Bidan | Homepage')

@section('content')

  @if (session()->has('msg'))
    <div class="alert alert-success container" style="margin-top: 10%;">
      {{ session()->get('msg') }}
    </div>
  @endif

    <!-- ======= Hero Section ======= -->
    @include('partials.frontend.hero')
  <!-- End Hero -->

  <main id="main">    

    <!-- ======= Why Us Section ======= -->
      @include('partials.frontend.whyus')
    <!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
      @include('partials.frontend.about')
    <!-- End About Section -->    

    <!-- ======= Services Section ======= -->
      @include('partials.frontend.service')
    <!-- End Services Section -->

    <!-- ======= Appointment Section ======= -->
      @include('partials.frontend.appointment')
    <!-- End Appointment Section -->  

  </main><!-- End #main -->
@endsection