@extends('layouts.backend.master')

@section('Digital Space','All Studens data')

@push('css')
    
@endpush

@section('content')
    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{asset('assets/backend/img/profile-cover.jpg')}});"></div>
            <!--/.bg-holder-->
            <div class="avatar avatar-5xl avatar-profile">
              @if($user->image)
                <img class="rounded-circle img-thumbnail shadow-sm" src="{{ asset('storage/profile/'.$user->image) }}" width="200" alt="" />
              @else
                <img class="rounded-circle img-thumbnail shadow-sm" src="{{asset('assets/backend/img/profile-dumy.png')}}" width="200" alt="" />
              @endif
            </div>
        </div>
        <div class="card-body pb-5">
            <div class="row">
                <div class="col-lg-7">
                    <h4 class="mb-1"> {{$user->first_name}} {{$user->last_name}}
                        @if ($user->status == 1)
                          <span data-bs-toggle="tooltip" data-bs-placement="right" title="Unverified">
                            <small class="fa fa-check-circle text-danger" data-fa-transform="shrink-4 down-2"></small>
                          </span>
                        @else
                          <span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified">
                            <small class="fa fa-check-circle text-success" data-fa-transform="shrink-4 down-2"></small>
                          </span>
                        @endif
                    </h4>
                    <h5 class="fs-0 fw-normal mb-3">@foreach ($user->courses as $course) {{$course->name}}. @endforeach</h5>
                    <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
                    <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
                    <div class="border-dashed-bottom my-4 d-lg-none"></div>
                </div>
                <div class="col ps-2 ps-lg-4">
                    <h5>Perosonal Information</h5>
                    <hr>     
                    <div class="d-flex mb-2">
                        <span class="fas fa-phone me-2 text-700" data-fa-transform="grow-2"></span>
                        <h6 class="mb-0">Phone: {{$user->phone}}</h6>
                    </div>
                    <div class="d-flex mb-2">
                        <span class="fas fa-envelope me-2 text-700" data-fa-transform="grow-2"></span>
                        <h6 class="mb-0">Email: {{$user->email}}</h6>
                    </div>
                    <div class="d-flex mb-2">
                        <span class="fas fa-map-marker-alt me-2 text-700" data-fa-transform="grow-2"></span>
                        <h6 class="mb-0">Address: {{$user->address}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-8 pe-lg-2">
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
              <form method="POST" action="{{ route('user.profile.update',$user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-2">
                  <div class="col-sm-12 col-lg-6">
                    <div class="mb-3">
                      <label class="form-label" for="bootstrap-wizard-wizard-first-name">First Name</label>
                      <input class="form-control" type="text" name="first_name" placeholder="First Name" id="bootstrap-wizard-wizard-first-name" :value="old('first_name')" value="{{$user->first_name}}" required/>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-6">
                    <div class="mb-3">
                      <label class="form-label" for="bootstrap-wizard-wizard-last-name">Last Name</label>
                      <input class="form-control" type="text" name="last_name" placeholder="Last Name" id="bootstrap-wizard-wizard-last-name" :value="old('last_name')" value="{{$user->last_name}}" required/>
                      </div>
                  </div>
                </div>
                <div class="row g-2">
                    <div class="col-sm-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-wizard-phone">Phone</label>
                            <input class="form-control" type="text" name="phone" placeholder="Phone" :value="old('phone')" id="bootstrap-wizard-wizard-phone" value="{{$user->phone}}" required/>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-wizard-email">Email*</label>
                            <input class="form-control" type="email" name="email" :value="old('email')" placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required id="bootstrap-wizard-wizard-email" data-wizard-validate-email="true" value="{{$user->email}}" />
                          <div class="invalid-feedback">You must add email</div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="bootstrap-wizard-wizard-address">Address</label>
                  <textarea class="form-control" rows="1" id="bootstrap-wizard-wizard-address" name="address" :value="old('address')">{!! html_entity_decode($user->address) !!}</textarea>
                </div> 
                <div class="mb-3">
                  <label class="form-label" for="customFile">Profile Image</label>
                  <input class="form-control" id="customFile" type="file" name="image" />
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary px-5 px-sm-6" type="submit">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 ps-lg-2">
          <div class="sticky-sidebar">
            <div class="card mb-3">
              <div class="card-header">
                <h5 class="mb-0">Change Password</h5>
              </div>
              <div class="card-body bg-light">
                <form action="{{route('user.profile.updatePassword')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label" for="old-password">Old Password</label>
                    <input class="form-control" id="old-password" type="password" name="old_password"/>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="new-password">New Password</label>
                    <input class="form-control" id="new-password" type="password" name="password"/>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <input class="form-control" id="confirm-password" type="password" name="password_confirmation"/>
                  </div>
                  <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
@push('js')   

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
    function deleteUser(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>
@endpush
