{{-- @extends('layouts.app')
@section('content')
    <div id="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="page-content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert" style="background-color: #a9e8a8">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="btn-group float-right">
                                    <ol class="breadcrumb hide-phone p-0 m-0">
                                        <li class="breadcrumb-item"><a href="#">Financial Accounting System</a></li>
                                        <li class="breadcrumb-item active">Control Head</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Main Head</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body mainHead-form">
                                    <form
                                        action="{{ !empty($mainHead) ? route('mainHead.update') : route('mainHead.save') }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                            value="{{ isset($mainHead->id) ? $mainHead->id : '' }}" />
                                        <div class="row">
                                            <div class="col-lg-4">

                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Name<span style="color: red">*</span>
                                                    </h6>
                                                    <input type="text" style="width: 100%" class="form-control"
                                                        name="name" id="name"
                                                        value="{{ old('name', !empty($mainHead->name) ? $mainHead->name : '') }}"
                                                        placeholder="Enter the Name" maxlength="30">
                                                    @error('area')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group button-items mb-0 text-right">
                                                <a href="{{ route('mainHead.list') }}"
                                                    class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                                @if ((!empty($permission) && $permission->insert_access == 1) || Auth::user()->is_admin == 1)
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        @if (!isset($mainHead))
                                                            Save
                                                        @else
                                                            Update
                                                        @endif
                                                    </button>
                                                @endif
                                            </div>
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

                    {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Main Head</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">Sub Head</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">Sub Account</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-disabled" type="button" role="tab"
                                aria-controls="pills-disabled" aria-selected="false">Account</button>
                        </li>
                    </ul> --}}
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div id="basic" class="col-lg-12">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-12 ">
                                                <form
                                                    action="{{ !empty($mainHead) ? route('mainHead.update') : route('mainHead.save') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ isset($mainHead->id) ? $mainHead->id : '' }}" />
                                                    <div class="form-group">

                                                        <label>Name</label>
                                                        <input id="name" type="text" name="name"
                                                            value="{{ old('name', !empty($mainHead->name) ? $mainHead->name : '') }}"
                                                            placeholder="Enter first level" class="form-control"
                                                            required>
                                                        @error('area')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        @if ((!empty($permission) && $permission->insert_access == 1) || Auth::user()->is_admin == 1)
                                                            <button type="submit" value="Save"
                                                                class="mt-4 btn btn-primary">
                                                                @if (!isset($mainHead))
                                                                    Save
                                                                @else
                                                                    Update
                                                                @endif
                                                            </button>
                                                        @endif
                                                        {{-- <input type="submit" value="Save"
                                                            class="mt-4 btn btn-primary"> --}}
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
        </div>
    </div>
</x-base-layout>
