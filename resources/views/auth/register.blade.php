<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Digital Space | Register</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/backend/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/backend/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/backend/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/backend/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('assets/backend/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{asset('assets/backend/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('assets/backend/js/config.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/overlayscrollbars/OverlayScrollbars.min.js')}}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{asset('assets/backend/vendors/overlayscrollbars/OverlayScrollbars.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{asset('assets/backend/css/theme.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('assets/backend/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('assets/backend/css/user.min.css')}}" rel="stylesheet" id="user-style-default">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="{{asset('assets/backend/vendors/choices/choices.min.css')}}" rel="stylesheet" />

    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
    @stack('css')
  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
          <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
              var container = document.querySelector('[data-layout]');
              container.classList.remove('container');
              container.classList.add('container-fluid');
            }
          </script>
          <div class="row justify-content-center pt-5">
            <div class="col-sm-12 col-lg-8 col-xxl-6">
              <a class="d-flex flex-center mb-4" href="{{route('home')}}">
                <img src="{{asset('assets/frontend/images/logo-footer.png')}}" alt="Digital Space">
              </a>
              <div class="card theme-wizard mb-5" id="wizard">
                <div class="card-header bg-light pt-3 pb-2">
                  <h4>Register</h4>
                  <p>Please create your Digital Space account</p>
                  <hr>
                </div>
                <div class="card-body py-4" id="wizard-controller">
                  <div class="tab-content">
                    <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab1" id="bootstrap-wizard-tab1">
                      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-wizard-phone">Phone</label>
                          <input class="form-control" type="text" name="phone" placeholder="Phone" :value="old('phone')" id="bootstrap-wizard-wizard-phone" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bootstrap-wizard-wizard-email">Email*</label>
                            <input class="form-control" type="email" name="email" :value="old('email')" placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required id="bootstrap-wizard-wizard-email" data-wizard-validate-email="true" />
                          <div class="invalid-feedback">You must add email</div>
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
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-wizard-address">Address</label>
                          <textarea class="form-control" rows="1" id="bootstrap-wizard-wizard-address" name="address" :value="old('address')"></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="organizerMultiple">Our Courses</label>
                          <select class="form-select js-choice" id="myCourse" multiple="multiple" size="1" name="courses[]" onchange="fetchcourses()" data-options='{"removeItemButton":true,"placeholder":true}' required>
                            <option value="" >Select Course...</option>
                            @foreach(App\Models\Course::all() as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                          </select>
                        </div>                        
                        <p class="alert alert-success align-items-center" id="courseDuration"></p>
                        <div class="row g-2">
                          <div class="col-sm-12 col-lg-6">
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
                          </div>
                          <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                              <img src="{{asset('assets/backend/img/payment.png')}}" class="img-fluid" alt="Payment">
                            </div>
                          </div>
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
            </div>
          </div>
        </div>
      </main><!-- ===============================================-->
      <!--    End of Main Content-->
      <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{asset('assets/backend/vendors/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/anchorjs/anchor.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/is/is.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/lodash/lodash.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{asset('assets/backend/vendors/list.js/list.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/theme.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/choices/choices.min.js')}}"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
        @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.error('{{ $error }}','Error',{
            closeButton:true,
            progressBar:true,
        });
        @endforeach
        @endif
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

   
  </body>
</html>