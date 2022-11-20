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
                <h3>All Payment</h3>
                <p class="mt-2">Falcon uses <b>List.Js</b> for advance table. List.Js is a Tiny, invisible and simple, yet powerful and incredibly fast vanilla JavaScript library that adds search, sort, filters and flexibility to plain HTML lists, tables, or anything.</p>
            </div>
        </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
          <div class="row flex-between-end">
            <div class="col-auto align-self-center">
              <h5 class="mb-0" data-anchor="data-anchor">Payment Orders</h5>
            </div>
            <div class="col-auto ms-auto">
                <button class="btn btn-primary me-1 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">New Payment<span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span></button>
                <div class="modal fade text-start" id="staticBackdrop1" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg mt-6" role="document">
                        <div class="modal-content border-0">
                            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                    <h4 class="mb-1" id="staticBackdrop1Label">Add New Course</h4>
                                </div>
                                <div class="p-4">
                                    <div class="row">
                                        <form method="POST" action="{{route('admin.payment.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-2">
                                                <div class="col">
                                                    <div class="mb-3">
                                                    <label class="form-label" for="bootstrap-wizard-wizard-name">Course Name *</label>
                                                    <input class="form-control" type="text" name="name" placeholder="Course Name" id="bootstrap-wizard-wizard-name" :value="old('name')" required/>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                    <label class="form-label" for="bootstrap-wizard-wizard-duration">Duration *</label>
                                                    <input class="form-control" type="number" name="duration" placeholder="Duration" id="bootstrap-wizard-wizard-duration" :value="old('duration')" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col">
                                                    <div class="mb-3">
                                                    <label class="form-label" for="bootstrap-wizard-wizard-fees">Fees *</label>
                                                    <input class="form-control" type="number" name="fees" placeholder="Fees" id="bootstrap-wizard-wizard-fees" :value="old('fees')" required/>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label" for="customFile">Course Image</label>
                                                    <input class="form-control" id="customFile" type="file" name="image" /></div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="bootstrap-wizard-wizard-description">Description</label>
                                                <textarea class="form-control" rows="3" id="bootstrap-wizard-wizard-description" name="description" :value="old('description')"></textarea>
                                              </div>
                                            <div class="mb-3">
                                            <button class="btn btn-primary px-5 px-sm-6" type="submit">Add Course</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <th width="2%">Order ID</th>
                            <th width="15%">Student Name</th>
                            <th width="13%">Contact Number</th>
                            <th width="4%">Payment Method</th>
                            <th width="9%">Payment Number</th>
                            <th class="sort">Transection ID</th>
                            <th width="20%">Course Name</th>
                            <th width="9%">Total Payment</th>
                            <th width="4%">Status</th>
                            <th width="12%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($payments as $key => $payment)
                        <tr>
                            <td>POR0{{$payment->user->id}}</td>
                            <td>{{$payment->user->first_name}} {{$payment->user->last_name}}</td>
                            <td>{{$payment->user->phone}}</td>
                            <td>
                               @if ($payment->payment_method == 'bkash')
                               <img style="height: 30px" src="{{asset('assets/backend/img/payment/bkash.png')}}" class="img-fluid" alt="bkash"> 
                               @elseif ($payment->payment_method == 'rocket')
                               <img style="height: 30px" src="{{asset('assets/backend/img/payment/rocket.png')}}" class="img-fluid" alt="rocket">
                               @elseif ($payment->payment_method == 'nagod')
                               <img style="height: 30px" src="{{asset('assets/backend/img/payment/nagod.png')}}" class="img-fluid" alt="nagod"> 
                               @else
                                    {{$payment->payment_method}}
                                @endif  
                            </td>
                            <td>{{$payment->payment_number}}</td>
                            <td>{{$payment->transaction_id}}</td>
                            <td>
                                @foreach ($payment->courses as $course)
                                    <span>{{$course->name}}, </span>
                                @endforeach
                            </td>
                            <td>
                                @php
                                $totalPrice = 0;
                                $discount = 0;
                                @endphp
                                @foreach ($payment->courses as $course)
                                @php
                                $totalPrice += $course->fees;
                                @endphp
                                @endforeach
                                {{$totalPrice}} BDT
                            </td>
                            <td class="text-center">
                                <div>
                                    @if ($payment->status == 1)
                                        <form action="{{ route('admin.payment.approved',$payment->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Unapproved"><span class="fas fa-info" data-fa-transform="shrink-3" ></span></button>
                                        </form>
                                        @else
                                        <form action="{{ route('admin.payment.unapproved',$payment->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Approved"><span class="fas fa-info" data-fa-transform="shrink-3"></span></button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                            <td class="text-end">
                                <div>
                                    <button class="btn p-0" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$payment->id}}" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span></button>
                                    <div class="modal fade text-start" id="staticBackdrop{{$payment->id}}" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg mt-6" role="document">
                                            <div class="modal-content border-0">
                                                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                        <h4 class="mb-1" id="staticBackdropLabel">Course Update</h4>
                                                    </div>
                                                    <div class="p-4">
                                                        <div class="row">
                                                            <form method="POST" action="{{route('admin.course.update',$payment->id)}}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row g-2">
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                        <label class="form-label" for="bootstrap-wizard-wizard-name">Course Name *</label>
                                                                        <input class="form-control" type="text" name="name" placeholder="Course Name" id="bootstrap-wizard-wizard-name" :value="old('name')" value="{{$payment->name}}" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                        <label class="form-label" for="bootstrap-wizard-wizard-duration">Duration *</label>
                                                                        <input class="form-control" type="number" name="duration" placeholder="Duration" id="bootstrap-wizard-wizard-duration" :value="old('duration')" value="{{$payment->duration}}" required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row g-2">
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                        <label class="form-label" for="bootstrap-wizard-wizard-fees">Fees *</label>
                                                                        <input class="form-control" type="number" name="fees" placeholder="Fees" id="bootstrap-wizard-wizard-fees" :value="old('fees')" value="{{$payment->fees}}" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="mb-3"><label class="form-label" for="customFile">Course Image</label>
                                                                        <input class="form-control" id="customFile" type="file" name="image" /></div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="bootstrap-wizard-wizard-description">Description</label>
                                                                    <textarea class="form-control" rows="3" id="bootstrap-wizard-wizard-description" name="description" :value="old('description')">{!! html_entity_decode($payment->description) !!}</textarea>
                                                                  </div>
                                                                <div class="mb-3">
                                                                <button class="btn btn-primary px-5 px-sm-6" type="submit">Update Course</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn p-0 ms-2" type="button" onclick="deletePayment({{ $payment->id }})" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button>
                                    <form id="delete-form-{{ $payment->id }}" action="{{ route('admin.payment.destroy',$payment->id) }}" method="post" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a target="_blank" href="{{route('invoice',$payment->id)}}" class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Print Invoice"><span class="text-500 fas fa-eye"></span>
                                    </a>
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
    function deletePayment(id) {
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
