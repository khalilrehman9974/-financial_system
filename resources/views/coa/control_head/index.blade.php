{{-- @extends('layouts.app')
@section('content')
    <div id="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="page-content-wrapper ">
                    @if (session()->has('message'))
                        <div class="alert" style="background-color: #a9e8a8">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">Financial Accounting System</a>
                                            </li>
                                            <li class="breadcrumb-item active">List Of Main Heads</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Of Main Heads</h4>
                                </div>
                            </div>
                        </div>
                        <div class="form-group button-items mb-0 text-right">
                            <a href="{{ route('mainHead.create') }}" class="btn btn-primary waves-effect waves-light">Add
                                Main Head</a>
                        </div>
                        <br>
                        <!-- end page title end breadcrumb -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <form action="{{ route('mainHead.list') }}" method="get" id="form-search">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <h6 class="light-dark w-100">Name</h6>
                                                            <input type="text" id="name" name="name"
                                                                class="form-control" placeholder="Please Enter the Name"
                                                                value="{{ request()->input('name') }}">
                                                            <span class="input-group-prepend">
                                                                {{-- <button type="submit" class="btn btn-primary" disabled><i
                                                                            class="fa fa-search"></i></button> --}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <span class="input-group-prepend" style="margin-top: 35px;">
                                                            <button type="submit" class="btn btn-primary" value="Search"
                                                                id="search-button"><i class="fa fa-search"></i>&nbsp;
                                                                Search</button>

                                                        </span>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <table class="table table-hover subject-table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 80%">Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($mainHeads as $mainHead)
                                                    <tr id="row_{{ $mainHead->id }}">
                                                        <td width="300">{{ $mainHead->name }}</td>
                                                        <td>
                                                            @if ((!empty($permission->edit_access) && $permission->edit_access == 1) || Auth::user()->is_admin == 1)
                                                                <a href="{{ route('mainHead.edit', ['id' => $mainHead->id]) }}"
                                                                    title="Edit"><i class="fa fa-edit"></i></a>
                                                            @endif
                                                            @if ((!empty($permission->delete_access) && $permission->delete_access == 1) || Auth::user()->is_admin == 1)
                                                                <a href="mainHead.delete" title="Delete"><i
                                                                        class="fa fa-trash-o delete"
                                                                        data-id="{{ $mainHead->id }}"></i></a>
                                                            @endif
                                                            {{-- <a href="#"><i class="fa fa-eye"></i></a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>

                                        <hr>
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end">
                                                {!! !empty($mainHeads) ? $mainHeads->appends(request()->query())->render() : '' !!}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                <div class="card m-b-30">

                                </div>
                            </div>
                        </div>


                    </div><!-- container -->


                </div> <!-- Page content Wrapper -->

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                var id = $(this).data('id');
                bootbox.confirm("Do you really want to delete record?", function(result) {
                    if (result) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ url('mainHead.delete') }}' + '/' + id,
                            type: 'DELETE',
                            data: {
                                id: id
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    $("#row_" + id).remove();
                                    bootbox.alert(response.message);
                                } else if (response.error) {
                                    bootbox.alert(response.error);
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection --}}



<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        {{ $title }}
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/scss/light/assets/components/tabs.scss'])
        @vite(['resources/scss/dark/assets/components/tabs.scss'])
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-slot:scrollspyConfig>
        data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100"
    </x-slot>

    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chart of Accounts</li>
            </ol>
        </nav>
    </div>


    <div id="tabsSimple" class="col-xl-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <!-- <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Chart of Accounts</h4>
                        </div>
                    </div>
                </div> -->
            <div class="widget-content widget-content-area">

                <div class="simple-pill">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div id="basic" class="col-lg-12">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-12 ">
                                                <form method="post" action={{ route('mainHead.list') }}>
                                                    @csrf
                                                    <label>Name</label>
                                                    <input id="name" type="text" name="name"
                                                        placeholder="Enter first level" class="form-control" required>
                                                    <input type="submit" value="Save"
                                                        class="mt-4 btn btn-primary">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Role</th>
                                                <th class="text-center" scope="col">Status</th>
                                                <th class="text-center" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mainHeads as $mainHead)
                                                <tr id="row_{{ $mainHead->id }}">
                                                    <td width="300">{{ $mainHead->name }}</td>
                                                    <td class="text-center">
                                                        <div class="action-btns">
                                                            @if ((!empty($permission->edit_access) && $permission->edit_access == 1) || Auth::user()->is_admin == 1)
                                                                {{-- <a href="{{ route('mainHead.edit', ['id' => $mainHead->id]) }}"
                                                                title="Edit"><i class="fa fa-edit"></i></a> --}}
                                                                <a href="{{ route('mainHead.edit', ['id' => $mainHead->id]) }}"
                                                                    class="action-btn btn-view bs-tooltip me-2"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Edit">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-eye">
                                                                        <path
                                                                            d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                        </path>
                                                                        <circle cx="12" cy="12" r="3">
                                                                        </circle>
                                                                    </svg>
                                                                </a>
                                                            @endif
                                                            @if ((!empty($permission->delete_access) && $permission->delete_access == 1) || Auth::user()->is_admin == 1)
                                                                {{-- <a href="mainHead.delete" title="Delete"><i
                                                                        class="fa fa-trash-o delete"
                                                                        data-id="{{ $mainHead->id }}"></i></a>
                                                                        <a href="javascript:void(0);"
                                                                class="action-btn btn-delete bs-tooltip"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete"> --}}
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash-2">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path
                                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                    </path>
                                                                    <line x1="10" y1="11"
                                                                        x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11"
                                                                        x2="14" y2="17"></line>
                                                                </svg>
                                                                </a>
                                                            @endif

                                                        </div>

                                                        {{-- <a href="#"><i class="fa fa-eye"></i></a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        {{-- <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="avatar me-2">
                                                                <img alt="avatar"
                                                                    src="../src/assets/img/profile-7.jpeg"
                                                                    class="rounded-circle" />
                                                            </div>
                                                            <div class="media-body align-self-center">
                                                                <h6 class="mb-0">Shaun Park</h6>
                                                                <span>shaun.park@mail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">CEO</p>
                                                        <span class="text-success">Management</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-light-success">Online</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);"
                                                                class="action-btn btn-view bs-tooltip me-2"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="View">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg>
                                                            </a>
                                                            <a href="javascript:void(0);"
                                                                class="action-btn btn-edit bs-tooltip me-2"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit-2">
                                                                    <path
                                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                            <a href="javascript:void(0);"
                                                                class="action-btn btn-delete bs-tooltip"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash-2">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path
                                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                    </path>
                                                                    <line x1="10" y1="11"
                                                                        x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11"
                                                                        x2="14" y2="17"></line>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>




                                            </tbody> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</x-base-layout>
