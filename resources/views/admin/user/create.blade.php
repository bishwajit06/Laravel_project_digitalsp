@extends('layouts.backend.master')

@section('Digital Space','All Studens data')

@push('css')
    
@endpush

@section('content')
    <div class="card theme-wizard mb-5" id="wizard">
        <div class="card-header bg-light pt-3 pb-2">
          <h4>Account Register</h4>
          <hr>
        </div>
        <div class="row g-0">
            <div class="col-lg-9">
                <div class="card-body py-4" id="wizard-controller">
                    <div class="tab-content">
                      <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab1" id="bootstrap-wizard-tab1">
                        <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="row g-2">
                            <div class="col-sm-12 col-lg-6">
                              <div class="mb-3">
                                <label class="form-label" for="bootstrap-wizard-wizard-first-name">First Name</label>
                                <input class="form-control" type="text" name="first_name" placeholder="First Name" id="bootstrap-wizard-wizard-first-name" :value="old('first_name')" required/>
                              </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                              <div class="mb-3">
                                <label class="form-label" for="bootstrap-wizard-wizard-last-name">Last Name</label>
                                <input class="form-control" type="text" name="last_name" placeholder="Last Name" id="bootstrap-wizard-wizard-last-name" :value="old('last_name')" required/>
                                </div>
                            </div>
                          </div>
                          <div class="row g-2">
                              <div class="col-sm-12 col-lg-6">
                                  <div class="mb-3">
                                      <label class="form-label" for="bootstrap-wizard-wizard-phone">Phone</label>
                                      <input class="form-control" type="text" name="phone" placeholder="Phone" :value="old('phone')" id="bootstrap-wizard-wizard-phone" required/>
                                  </div>
                              </div>
                              <div class="col-sm-12 col-lg-6">
                                  <div class="mb-3">
                                      <label class="form-label" for="bootstrap-wizard-wizard-email">Email*</label>
                                      <input class="form-control" type="email" name="email" :value="old('email')" placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required id="bootstrap-wizard-wizard-email" data-wizard-validate-email="true" />
                                    <div class="invalid-feedback">You must add email</div>
                                  </div>
                              </div>
                            </div>
                          <div class="row g-2">
                            <div class="col-sm-12 col-lg-6">
                              <div class="mb-3"><label class="form-label" for="bootstrap-wizard-wizard-password">Password*</label>
                                <input class="form-control" type="password" name="password" placeholder="Password" required id="bootstrap-wizard-wizard-password" data-wizard-validate-password="true" />
                                <div class="invalid-feedback">Please enter password</div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                              <div class="mb-3"><label class="form-label" for="bootstrap-wizard-wizard-confirm-password">Confirm Password*</label><input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required id="bootstrap-wizard-wizard-confirm-password" data-wizard-validate-confirm-password="true" />
                                <div class="invalid-feedback">Passwords need to match</div>
                              </div>
                            </div>
                          </div>
                          <div class="row g-2">
                              <div class="col-sm-12 col-lg-6">
                                  <div class="mb-3">
                                      <label for="organizerMultiple">Our Courses</label>
                                      <select class="form-select js-choice" id="myCourse" multiple="multiple" name="courses[]" onchange="fetchcourses()" data-options='{"removeItemButton":true,"placeholder":true}' required>
                                        <option value="" >Select Course...</option>
                                        @foreach(App\Models\Course::all() as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="col-sm-12 col-lg-6">
                                  <div class="mb-3">
                                      <label class="form-label" for="bootstrap-wizard-wizard-address">Address</label>
                                      <textarea class="form-control" rows="1" id="bootstrap-wizard-wizard-address" name="address" :value="old('address')"></textarea>
                                  </div>
                              </div>
                          </div>                      
                          <p class="alert alert-success align-items-center" id="courseDuration"></p>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineRadio1" type="radio" name="payment_method" value="bkash"/>
                            <label class="form-check-label" for="inlineRadio1">bKash</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineRadio2" type="radio" name="payment_method" value="rocket" />
                            <label class="form-check-label" for="inlineRadio2">Rocket</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineRadio3" type="radio" name="payment_method" value="nagod" />
                            <label class="form-check-label" for="inlineRadio2">Nagod</label>
                          </div>
                          <div class="row g-2">
                            <div class="col-sm-12 col-lg-6">
                              <div class="mb-3">
                                <label class="form-label" for="bootstrap-wizard-payment-number">Payment Number</label>
                                <input class="form-control" placeholder="Number" name="payment_number" type="text" id="bootstrap-wizard-payment-number" /></div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                              <div class="mb-3"><label class="form-label" for="bootstrap-wizard-transaction-id">Taransection ID</label>
                                <input class="form-control" placeholder="XXXX XXXX XXXX" type="text" id="bootstrap-wizard-transaction-id" name="transaction_id"/>
                              </div>
                            </div>
                          </div>
                          <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="terms" required="required" checked="checked" id="bootstrap-wizard-wizard-checkbox" />
                            <label class="form-check-label" for="bootstrap-wizard-wizard-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a>
                            </label>
                          </div>
                          <div class="mb-3">
                            <button class="btn btn-primary px-5 px-sm-6" type="submit">Create Account</button>
                          </div>
                          <p>Already have an account? <a href="{{route('login')}}">Sign in</a></p>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-lg-5">
                <img src="{{asset('assets/backend/img/register-img.jpg')}}" class="img-fluid w-100 pe-lg-4" alt="Digital Space">
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

<script>
    
    $('#courseDuration').hide();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

function fetchcourses() {
    $.ajax({
        type: "GET",
        url: "/course-data",
        dataType: "json",
        success: function(response) {
            var courseval = "";
            //console.log(response.courses);
            $("#myCourse").change(function() {
                $('#courseDuration').show();
                courseval = $(this).val();
                //console.log(courseval);
                $('#courseDuration').empty();
                var i;
                for (i = 0; i < courseval.length; ++i) {
                  var coureseId = courseval[i];
                    $.each(response.courses, function(key, item) {
                      if (coureseId == item.id) {
                        $('#courseDuration').append( item.name+ ' Fees: ' +item.fees+ ' BDT | Duration: '+item.duration+' Months <br>');
                      }
                    });
                }
                
            });
        }
    })
}

fetchcourses();

</script>
@endpush
