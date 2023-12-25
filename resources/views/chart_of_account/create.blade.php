<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        {{$title}} 
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
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chart of Accounts</li>
            </ol>
        </nav>
    </div>


        <div id="tabsSimple" class="col-xl-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Chart of Accounts</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <div class="simple-pill">
                        
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Main Head</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Sub Head</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Sub Account</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Account</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div id="basic" class="col-lg-12">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-content widget-content-area">
                                            <div class="row">
                                                <div class="col-lg-6 col-12 ">
                                                    <form method="post">
                                                        <div class="form-group">
                                                                    <label>Main Head</label>
                                                                    <label for="t-text" class="visually-hidden">Text</label>
                                                                    <input id="t-text" type="text" name="txt" placeholder="Enter first level" class="form-control" required>
                                                                    <input type="submit" name="txt" value="Save" class="mt-4 btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
   
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <div id="basic" class="col-lg-12">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-content widget-content-area">
                                            <div class="row">
                                                <div class="col-lg-6 col-12 ">
                                                    <form method="post">
                                                        <div class="form-group">
                                                            <div class="form-group mb-4">
                                                                <label for="exampleFormControlSelect1">Main Head</label>
                                                                <select class="form-select" id="exampleFormControlSelect1">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                            <label>Sub Head</label>
                                                            <input id="t-text" type="text" name="txt" placeholder="Enter first level" class="form-control" required>
                                                            
                                                            <input type="submit" name="txt" value="Save" class="mt-4 btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                                <p class="mt-3">In diam odio, ullamcorper vitae dolor vel, lobortis rhoncus odio. Nullam lacinia euismod ex vitae ullamcorper. Integer fringilla arcu nunc, et tempus sapien ornare sed. Nam fringilla velit nec bibendum consectetur. Etiam pellentesque eu nulla vel tincidunt. </p>
                                <p>Ut nec nunc sed risus viverra vehicula non non purus. Nunc semper sem ut ante suscipit vulputate. Integer tempus ornare ligula, sed lacinia leo posuere eu. </p>
                            </div>
                            <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
                                <p class="mt-3">Nullam feugiat, sapien a lacinia condimentum, libero nibh fermentum lectus, eu dictum justo ex sit amet neque. Sed felis arcu, efficitur eget diam eget, maximus dapibus enim. Sed vitae varius lorem. Fusce non accumsan diam, quis porttitor dolor. </p>
                                <p>Aenean ut aliquet dolor. Integer accumsan odio non dignissim lobortis. Sed rhoncus ante eros, vel ullamcorper orci molestie congue. Phasellus vel faucibus dolor. Morbi magna eros, vulputate eu sem nec, venenatis egestas quam. Maecenas hendrerit mollis eros, eget faucibus quam dignissim vel.</p>
                            </div>
                        </div>

                    </div>
                    
                    

        
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <!-- <x-slot:footerFiles>

    </x-slot> -->
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>