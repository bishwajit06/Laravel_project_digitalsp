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
                <h3>All Student Data</h3>
                <p class="mt-2">Falcon uses <b>List.Js</b> for advance table. List.Js is a Tiny, invisible and simple, yet powerful and incredibly fast vanilla JavaScript library that adds search, sort, filters and flexibility to plain HTML lists, tables, or anything.</p>
            </div>
        </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
          <div class="row flex-between-end">
            <div class="col-auto align-self-center">
              <h5 class="mb-0" data-anchor="data-anchor">Student</h5>
            </div>
            <div class="col-auto ms-auto">
                <a class="btn btn-primary me-1 mb-1" href="{{route('admin.user.create')}}">Register Student<span class="fas fa-plus me-1" data-fa-transform="shrink-3"></a>
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
                            <th class="sort" data-sort="email">Email</th>
                            <th class="sort" data-sort="phone">Phone</th>
                            <th class="sort" data-sort="address">Address</th>
                            <th class="sort" data-sort="address">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($user->image)
                                <img style="height: 20px;" src="{{ asset('storage/profile/'.$user->image) }}"/>
                                @else
                                <img style="height: 20px;" src="{{asset('assets/backend/img/default.jpg')}}" alt="" />
                                @endif
                            </td>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td class="text-center">
                                <div>
                                    @if ($user->status == 1)
                                        <form action="{{ route('admin.approved',$user->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm me-1 mb-1"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Unapproved</button>
                                        </form>
                                        @else
                                        <form action="{{ route('admin.unapproved',$user->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm me-1 mb-1"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Approved</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                            <td class="text-end">
                                <div>
                                    <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span>
                                    </button>
                                    <button class="btn p-0 ms-2" type="button" onclick="deleteUser({{ $user->id }})" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button>
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.user.destroy',$user->id) }}" method="post" style="display:none;">
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
