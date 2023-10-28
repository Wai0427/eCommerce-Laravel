<div>
    <!-- navbar -->
    <div class="container-fluid">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="/images/users/waiecommerce3.png" alt="" style="height:7%;width:7%;">
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div>
                    <img style="width: 100px;object-fit: contain;" src="{{ $admin->picture }}" alt=""  />
                    <p class="text-light text-center">{{ $admin->name }}</p>
                </div>
                <div class="button text-center" style="margin:auto">
                    <button><a href="{{ route('admin.insert_product') }}" class="nav-link text-light bg-info my-1" target="_blank">Insert Products</a></button>
                </div>
            </div>
        </div>
    </div>



</div>