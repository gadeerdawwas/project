@extends('dashboard.include.logout')

@push('style')
    <script src="{{ asset('dashboard/assets/js/layout.js') }}"></script>

@endpush
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">الطلاب     </h4>



                        </div>
                    </div>
                </div>
                <!-- end page title -->







                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">


                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <div class="flex-grow-1">
                                        <a class="btn btn-info add-btn" href="{{ route('manager.students.create') }}"
                                        ><i class="ri-add-fill me-1 align-bottom"></i> إضافة
                                            طالب  </a>

                                            @if (session()->has('success'))
                                            <div class="alert alert-success alert-borderless" role="alert">
                                                <strong>{{ session()->get('success') }}</strong>
                                            </div>
                                            @endif

                                    </div>




                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card" id="companyList">
                                <div class="card-header">



                                    <div class="card-body">

                                        <div>
                                            <div class="table-responsive table-card mb-3">
                                                <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col" style="width: 50px;">
                                                                #

                                                            </th>
                                                            <th class="sort" data-sort="name" scope="col">  اسم طالب  </th>
                                                            <th class="sort" data-sort="owner" scope="col">  رقم الطالب   </th>

                                                            <th class="sort" data-sort="industry_type" scope="col">  الصف  </th>
                                                            <th class="sort" data-sort="industry_type" scope="col">  مشرف  </th>
                                                            <th class="sort" data-sort="industry_type" scope="col">  المدرسة  </th>



                                                            <th scope="col">العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">

                                                        @foreach ($students as $student)
                                                            <tr>
                                                                <th scope="row">
                                                                    {{ $loop->iteration }}

                                                                </th>

                                                                <td>
                                                                    <div class="name">
                                                                        {{ $student->name }}

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="owner">
                                                                        {{ $student->id_number }}
                                                                    </div>
                                                                </td>


                                                                <td>
                                                                    <div class="industry_type">

                                                                        {{ ( ($student->ClassName) ? $student->ClassName->name : '')}} / {{ (($student->ClassName) ? $student->ClassName->Classroom->name : '') }}

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="industry_type">

                                                                        {{ ( ($student->ClassName) ? $student->ClassName->admin->name: '')}}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="industry_type">

                                                                            {{ $student->School->name }}

                                                                    </div>
                                                                </td>





                                                                <td>
                                                                    <ul class="list-inline hstack gap-2 mb-0">

                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="Edit">
                                                                            <a class="edit-item-btn"
                                                                                href="#editModal{{ $student->id }}"
                                                                                data-bs-toggle="modal"><i
                                                                                    class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                                        </li>


                                                                        <div class="modal fade"
                                                                            id="editModal{{ $student->id }}" tabindex="-1"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-light p-3">
                                                                                        <h5 class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            تعديل
                                                                                            القسم</h5>

                                                                                    </div>
                                                                                    <form
                                                                                        action="{{ route('manager.students.update', $student->id) }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('put')
                                                                                        <div class="modal-body">

                                                                                            <div class="col-lg-12">
                                                                                                <label for="id_number" class="form-label" >اسم المعلم</label>
                                                                                                <input type="text" name="name" class="form-control" value="{{$student->name }}" id="name" placeholder="اكتب اسم المعلم الكامل" />
                                                                                            </div>
                                                                                            <div class="col-lg-12">
                                                                                                <label for="email" class="form-label" >البريد الالكتروني</label>
                                                                                                <input type="email" id="email" name="email" value="{{$student->email }}" class="form-control" placeholder="example@gmail.com" />
                                                                                            </div>


                                                                                            <div class="col-lg-12">
                                                                                                <label for="school_id" class="form-label" >المدرسة</label>
                                                                                                <select name="school_id"  id="school_id" class="form-select" data-choices="" data-choices-search-false="" >
                                                                                                    @foreach ($Schools as $School)
                                                                                                        <option @if ( $School->id == $student->school_id)
                                                                                                            selected
                                                                                                        @endif value="{{$School->id}}">{{$School->name}}</option>
                                                                                                    @endforeach
                                                                                                </select>

                                                                                            </div>

                                                                                            <div class="col-lg-12">
                                                                                                <label for="password" class="form-label" >كلمة المرور</label>
                                                                                                <input type="text" id="password" name="password" class="form-control" placeholder="اكتب كلمة المرور " value="abc123" />
                                                                                            </div>




                                                                                        </div>




                                                                                        <div class="modal-footer">
                                                                                            <div
                                                                                                class="hstack gap-2 justify-content-end">
                                                                                                <button type="button" class="btn btn-danger"
                                                                                                data-bs-dismiss="modal">اغلاق</button>
                                                                                                <button type="submit"
                                                                                                    class="btn btn-success"
                                                                                                    id="add-btn">
                                                                                                    تعديل</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="Delete">
                                                                            <a class="remove-item-btn"
                                                                                data-bs-toggle="modal"
                                                                                href="#deleteModal{{ $student->id }}">
                                                                                <i
                                                                                    class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                                            </a>
                                                                        </li>



                                                                        <div class="modal fade zoomIn" id="deleteModal{{ $student->id }}"
                                                                            tabindex="-1" aria-labelledby="deleteRecordLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="btn-close"
                                                                                            data-bs-dismiss="modal" aria-label="Close"
                                                                                            id="btn-close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body p-5 text-center">
                                                                                        {{-- <lord-icon
                                                                                            src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                                            trigger="loop"
                                                                                            colors="primary:#405189,secondary:#f06548"
                                                                                            style="width:90px;height:90px"></lord-icon> --}}
                                                                                        <form
                                                                                            action="{{ route('manager.students.destroy', $student->id) }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            @method('delete')
                                                                                            <div class="mt-4 text-center">
                                                                                                <h4 class="fs-semibold">هل انت متاكد من
                                                                                                    عملية الحذف ؟ </h4>

                                                                                                    <input type="hidden" name="id" value="{{ $student->id }}">
                                                                                                {{-- <p class="text-muted fs-14 mb-4 pt-1">Deleting your company will remove all of your information from our database.</p> --}}
                                                                                                <div
                                                                                                    class="hstack gap-2 justify-content-center remove">
                                                                                                    <button type="button" class="btn btn-danger"
                                                                                                    data-bs-dismiss="modal">اغلاق</button>
                                                                                                    <button class="btn btn-success"
                                                                                                        id="delete-record">بتاكيد
                                                                                                        !!</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div class="modal fade zoomIn" id="deleteModal{{ $student->id }}"
                                                                        tabindex="-1" aria-labelledby="deleteRecordLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal" aria-label="Close"
                                                                                        id="btn-close"></button>
                                                                                </div>
                                                                                <div class="modal-body p-5 text-center">

                                                                                    <form
                                                                                        action="{{ route('manager.students.destroy', $student->id) }}"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        @method('delete')
                                                                                        <div class="modal-body p-5 text-center">
                                                                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                                                                            <div class="mt-4 text-center">
                                                                                                <h4 class="fs-semibold"> هل انت متاكد من عملية الحذف ؟ </h4>
                                                                                                <div class="hstack gap-2 justify-content-center remove">
                                                                                                    <button class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> اغلاق</button>
                                                                                                    <button class="btn btn-danger" id="delete-record">بتاكيد </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}


                                                                    </ul>
                                                                </td>
                                                            </tr>

                                                            <!--end add modal-->


                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <div class="noresult" style="display: none">
                                                    <div class="text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                                            trigger="loop" colors="primary:#121331,secondary:#08a88a"
                                                            style="width:75px;height:75px">
                                                        </lord-icon>
                                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We
                                                            did not find any
                                                            orders for you search.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-3">
                                                <div class="pagination-wrap hstack gap-2">
                                                    <a class="page-item pagination-prev disabled" href="#">
                                                    <div class="d-flex justify-content-end mt-3">
                                        <div class="pagination-wrap hstack gap-2">
                                            <a class="page-item pagination-prev disabled" href="#">
                                                Previous
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                            <a class="page-item pagination-next" href="#">
                                                Next
                                            </a>
                                        </div>
                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end delete modal -->

                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0">
                            <div class="modal-header bg-soft-info p-3">
                                <h5 class="modal-title" id="exampleModalLabel"> أضافة معلم</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form action="{{ route('manager.students.store') }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" id="id-field" />
                                    <div class="row g-3">



                                        <div class="col-lg-12">
                                            <label for="id_number" class="form-label" >اسم المعلم</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="اكتب اسم المعلم الكامل" />
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="email" class="form-label" >البريد الالكتروني</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com" />
                                        </div>


                                        <div class="col-lg-12">
                                            <label for="school_id" class="form-label" >المدرسة</label>
                                            <select name="school_id"  id="school_id" class="form-select" data-choices="" data-choices-search-false="" >
                                                @foreach ($Schools as $School)
                                                    <option value="{{$School->id}}">{{$School->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-lg-12">
                                            <label for="password" class="form-label" >كلمة المرور</label>
                                            <input type="text" id="password" name="password" class="form-control" placeholder="اكتب كلمة المرور " value="abc123" />
                                        </div>



                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-danger"
                                                                                data-bs-dismiss="modal">اغلاق</button>
                                        <button type="submit" class="btn btn-success" id="add-btn">حقظ </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end add modal-->

            </div>
        @endsection

        @push('script')
        <script src="{{ asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins.js') }}"></script>

        <!-- list.js min js -->
        <script src="{{ asset('dashboard/assets/libs/list.js/list.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

        <script src="{{ asset('dashboard/assets/js/pages/crm-companies.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
        @endpush
