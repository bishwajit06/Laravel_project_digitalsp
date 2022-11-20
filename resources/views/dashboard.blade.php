@extends('layouts.backend.master')
@section('title','Dashboard | Digital Space')
@push('css')

@endpush
@section('content')
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{asset('assets/backend/img/icons/spot-illustrations/corner-4.png')}});"></div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <div class="row">
        <div class="col-lg-8 align-self-center">
            <h3>Your Course</h3>
            <p class="mt-2">Take courses from the world's best instructors and universities. Courses include recorded auto-graded and peer-reviewed assignments, video lectures, and community discussion forums. When you complete a course, you’ll be eligible to receive a shareable electronic Course Certificate for a small fee.</p>
        </div>
        <div class="col-lg-4 align-self-center ps-lg-4">
          @php
            $user = Auth::user();
          @endphp
          @if ($user->status == 1)
          <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="fas fa-exclamation-triangle me-1"></span>
            <div>
              Your account didn't approved yet
            </div>
          </div>
          @else
            <img src="{{asset('assets/backend/img/course-img.jpg')}}" class="img-fluid" alt="Image not found">
          @endif
        </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-8">
    @foreach(Auth::user()->courses()->latest()->get() as $course)
    <div class="col-md-12">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="img-fluid rounded-start h-100" src="{{ asset('storage/course/'.$course->image) }}" alt="Card image cap" />
          </div>
          <div class="bg-holder bg-card" style="background-image:url({{asset('assets/backend/img/icons/spot-illustrations/corner-1.png')}});"></div>
          <!--/.bg-holder-->
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$course->name}}</h5>
              <p class="card-text">{!!  substr(strip_tags($course->description), 0, 100) !!}</p>
              <div class="d-flex">
                <div class="p-2 flex-grow-1 text-muted">Course Fee: {{$course->fees}} BDT</div>
                <div class="p-2 text-muted">Duration {{$course->duration}} Months</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="col-lg-4">
    {{-- <img src="{{asset('assets/backend/img/course-img.jpg')}}" class="img-fluid rounded" alt="course img"> --}}
    <div class="card">
      <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{asset('assets/backend/img/icons/spot-illustrations/corner-4.png')}});">
      </div>
        <!--/.bg-holder-->
      <div class="card-body position-relative">
          @php
          $user = App\Models\User::find(Auth::id());
        @endphp
        @foreach ($user->payments()->latest()->get() as $key => $payment)
        @if ($payment->status == 1)
        <div class="align-self-center text-center py-4">
          <p class="text-danger">Your order didn't approve yet.</p>
          <button class="btn btn-danger me-1 mb-1" disabled>Print Invoice <span class="fas fa-eye ms-1" data-fa-transform="shrink-3"></span></button>
        </div>
        @else
        <div class="align-self-center text-center py-4">
          <p>Order Number {{ $key + 1 }}</p>
          <a target="_blank" href="{{route('invoice',$payment->id)}}" class="btn btn-primary me-1 mb-1">Print Invoice <span class="fas fa-eye ms-1" data-fa-transform="shrink-3"></span></a>
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection()

@push('js')

@endpush