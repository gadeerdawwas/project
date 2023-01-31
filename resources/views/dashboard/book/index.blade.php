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
                            <h4 class="mb-sm-0">الكتب  </h4>



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
                                   <a class="btn btn-info add-btn" href="{{ route('manager.addbook') }}">
                                    اضافة كتاب</a>
                                </div>
                                @if (session()->has('success'))
                                <div class="alert alert-success alert-borderless" role="alert">
                                    <strong>{{ session()->get('success') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>





                        </div>
                    </div><!--end col-->
                    <div class="col-xxl-9">
                        <div class="card" id="companyList">
                            <div class="card-header">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <div class="search-box">
                                            <input type="text" class="form-control search"
                                                placeholder="Search for company...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="table-responsive table-card mb-3">
                                        <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="form-check">
                                                            رقم الكتاب
                                                        </div>
                                                    </th>
                                                    <th class="sort" data-sort="name" scope="col"> عنوان الكتاب   </th>
                                                    <th class="sort" data-sort="owner" scope="col">  القسم   </th>
                                                    <th class="sort" data-sort="industry_type" scope="col">  اسم المؤلف   </th>
                                                    <th class="sort" data-sort="star_value" scope="col"> المدرسة  </th>
                                                    <th class="sort" data-sort="location" scope="col">رقم ردمك   </th>
                                                    <th class="sort" data-sort="locationss" scope="col">  عدد الصفحات   </th>
                                                    <th class="sort" data-sort="locationss" scope="col"> تصفح الكتاب  </th>

                                                    <th scope="col">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($books as $book)
                                                <tr >

                                                    <td class="id" ><a href="javascript:void(0);" class="fw-medium link-primary">{{ $book->id }}</a></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="flex-grow-1 ms-2 name">{{ $book->title }}</div>
                                                        </div>
                                                    </td>

                                                    <td class="owner">{{$book->Category->name}}</td>
                                                    <td class="industry_type">{{$book->author}}</td>
                                                    <td><span class="star_value">{{$book->School->name}}</td>
                                                    <td><span class="location">{{$book->ISBN}}</td>
                                                    <td><span class="locationss">{{$book->page_number}}</td>
                                                    <td><span class="locationss"><a href="{{ url('/school/book/'.$book->id.'') }}">تصفح الكتاب</a></td>

                                                    <td>
                                                        <ul class="list-inline hstack gap-2 mb-0">

                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                                <a href="{{ route('manager.showbook',$book->id) }}"><i class="ri-eye-fill align-bottom text-muted"></i></a>
                                                            </li>
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                <a class="edit-item-btn" href="{{ route('manager.editbook',$book->id) }}"><i class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                            </li>
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Delete">
                                                                <a class="remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal{{ $book->id }}" >
                                                                    <i class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                                </a>

                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <div class="modal fade zoomIn" id="deleteRecordModal{{ $book->id }}" tabindex="-1" aria-labelledby="deleteRecordLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                                            </div>
                                                           <form action="{{ route('manager.deletebook',$book->id) }}" method="post">
                                                            @csrf
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
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                                </lord-icon>
                                                <h5 class="mt-2">لا يوجد نتائج لعرضها</h5>

                                            </div>
                                        </div>
                                    </div>
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


                                <!--end delete modal -->

                            </div>
                        </div><!--end card-->
                    </div><!--end col-->

                </div><!--end row-->


                <!-- end row -->



            </div>
                <!-- Modal -->

                <!--end modal -->

            </div>


            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


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
