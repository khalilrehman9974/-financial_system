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
                <li class="breadcrumb-item active" aria-current="page">Store Issue Note</li>
            </ol>
        </nav>
    </div>


    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Store Issue Note</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="widget-content widget-content-area">
                        <form method="POST" action="{{ !empty($noteId) ? route('store-issue-note.update') : route('store-issue-note.save') }}" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <!-- <div class="form-row"> -->
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Issue Note#</label>
                                <input type="text" name="issued_no" class="form-control" id="issued-date" placeholder="Issue Note#"
                                    required>
                                @error('issued_no')
                                <span style="color:red" class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                    <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date.." readonly="readonly">
                                </div>
                            </div>

                            <!-- </div> -->
                            <div class="form-group mb-4">
                                <label for="issued_to">Issued To</label>
                                <input type="text" name="issued_to" class="form-control" id="issued-to" placeholder="Enter issued to name" required>
                                @error('issued_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="issued_quantity">Issued Quantity</label>
                                <input type="text" name="issued_quantity" class="form-control" id="issued-quantity" placeholder="Enter issued quantity" required>
                                @error('issued_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">Remarks</label>
                                <textarea class="form-control" name="remarks" id="remarks" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit"
                                                                    class="mb-2 me-2 _effect--ripple waves-effect waves-light btn btn-primary"
                                                                    data-bs-container="body" data-bs-placement="right"
                                                                    data-bs-content="Tooltip on right">
                                                                    @if (!isset($noteId))
                                                                        Save
                                                                    @else
                                                                        Update
                                                                    @endif
                                                                </button>
                                <a href="{{ route("store-issue-note.list") }}" class="btn btn-dark mb-2 me-4 _effect--ripple waves-effect waves-light" type="submit">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <Script>


        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
        }, false);
    </Script>



    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <!-- <x-slot:footerFiles>

    </x-slot> -->
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
