@extends('layouts.backend.master')

@section('Digital Space','All Studens data')

@push('css')
    
@endpush

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{asset('assets/backend/img/icons/spot-illustrations/corner-4.png')}});"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-9">
                <h3>All Courses</h3>
                <p class="mt-2">Falcon uses <b>List.Js</b> for advance table. List.Js is a Tiny, invisible and simple, yet powerful and incredibly fast vanilla JavaScript library that adds search, sort, filters and flexibility to plain HTML lists, tables, or anything.</p>
            </div>
        </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
          <div class="row flex-between-end">
            <div class="col-auto align-self-center">
              <h5 class="mb-0" data-anchor="data-anchor">Courses</h5>
            </div>
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="tab-content">
            <div id="tableExample2" data-list='{"valueNames":["name","email","phone","address"],"page":8,"pagination":true}'>
                <div class="table-responsive scrollbar">
                  <table class="table table-bordered table-striped fs--1 mb-0">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th class="sort" data-sort="name">Name</th>
                            <th class="sort" data-sort="email">Desescription</th>
                            <th class="sort" data-sort="phone">Fess</th>
                            <th class="sort" data-sort="address">Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($courses as $key => $course)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($course->image)
                                <img style="height: 20px;" src="{{ asset('storage/course/'.$course->image) }}"/>
                                @else
                                <img style="height: 20px;" src="{{asset('assets/backend/img/default.jpg')}}" alt="" />
                                @endif
                            </td>
                            <td>{{$course->name}}</td>
                            <td>{!!  substr(strip_tags($course->description), 0, 50) !!}</td>
                            <td>{{$course->fees}}</td>
                            <td>{{$course->duration}}</td>
                            <td class="text-end">
                                <div>
                                    <button class="btn btn-primary me-1 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{$course->id}}"><span class="fas fa-shopping-cart me-1" data-fa-transform="shrink-3"></span> Buy Course</button>
                                    <div class="modal fade text-start" id="staticBackdrop1{{$course->id}}" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg mt-6" role="document">
                                            <div class="modal-content border-0">
                                                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                        <h4 class="mb-1" id="staticBackdrop1Label">Buy {{$course->name}} Course</h4>
                                                    </div>
                                                    <div class="p-4">
                                                        <div class="row">
                                                            <form method="POST" action="{{ route('user.shopping.store') }}" enctype="multipart/form-data">
                                                                @csrf

                                                                <select class="d-none" multiple="multiple" name="courses[]">
                                                                    <option value="{{$course->id}}" selected>{{$course->name}}</option>
                                                                </select>

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
                                                                <div class="mb-3">
                                                                  <button class="btn btn-primary px-5 px-sm-6" type="submit">Buy Course</button>
                                                                </div>
                                                              </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach                      
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                  <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
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
