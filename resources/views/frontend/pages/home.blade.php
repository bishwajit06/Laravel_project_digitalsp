@extends('layouts.frontend.master')

@section('title','Digital Space | Computer Training Center')

@push('css')

@endpush

@section('content')
    <!-- BANNER SECTION -->
    @include('frontend.partial.home-banner')	

    <!-- ABOUT US SECTION -->
    @include('frontend.partial.about-section')

	<!-- COURSE SECTION -->
    @include('frontend.partial.home-course-section')

    <!-- COURSE STATISTICS SECTION -->
    @include('frontend.partial.course-statistics')

    <!-- TEAM SECTION -->
    @include('frontend.partial.team-section')

    <!-- TESTIMONIAL SECTION -->
    @include('frontend.partial.testimonial-section')
    <!-- TESTIMONIAL SECTION -->
    @include('frontend.partial.home-contact')

@endsection


@push('js')

@endpush