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
            <div class="col-auto ms-auto">
                <button class="btn btn-primary me-1 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Add Course<span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span></button>
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
                                        <form method="POST" action="{{route('admin.course.store')}}" enctype="multipart/form-data">
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
                            <td>{{$course->duration}} Month</td>
                            <td class="text-end">
                                <div>
                                    <button class="btn p-0" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$course->id}}" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span></button>
                                    <div class="modal fade text-start" id="staticBackdrop{{$course->id}}" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                            <form method="POST" action="{{route('admin.course.update',$course->id)}}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row g-2">
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                        <label class="form-label" for="bootstrap-wizard-wizard-name">Course Name *</label>
                                                                        <input class="form-control" type="text" name="name" placeholder="Course Name" id="bootstrap-wizard-wizard-name" :value="old('name')" value="{{$course->name}}" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                        <label class="form-label" for="bootstrap-wizard-wizard-duration">Duration *</label>
                                                                        <input class="form-control" type="number" name="duration" placeholder="Duration" id="bootstrap-wizard-wizard-duration" :value="old('duration')" value="{{$course->duration}}" required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row g-2">
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                        <label class="form-label" for="bootstrap-wizard-wizard-fees">Fees *</label>
                                                                        <input class="form-control" type="number" name="fees" placeholder="Fees" id="bootstrap-wizard-wizard-fees" :value="old('fees')" value="{{$course->fees}}" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="customFile">Course Image</label>
                                                                            <input class="form-control" id="customFile" type="file" name="image" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="bootstrap-wizard-wizard-description">Description</label>
                                                                    <textarea class="form-control" rows="3" id="bootstrap-wizard-wizard-description" name="description" :value="old('description')">{!! html_entity_decode($course->description) !!}</textarea>
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

                                    <button class="btn p-0 ms-2" type="button" onclick="deleteCourse({{ $course->id }})" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button>
                                    <form id="delete-form-{{ $course->id }}" action="{{ route('admin.course.destroy',$course->id) }}" method="post" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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
    function deleteCourse(id) {
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
