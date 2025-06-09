<!doctype html>
<x-header title="{{ $supplier->name }}" />
<body>
    <!-- Layout wrapper -->
    <div id="top" class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- sidebar Menu -->
            <x-sidebar />
            <!-- / sidebarMenu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <x-navbar />
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <!-- Order Statistics -->
                            <div class="col-md-6 col-lg-12 col-xl-12 order-0 mb-6">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-title mb-0">
                                            <h5 class="mb-1 me-2">edit supplier</h5>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <form class="row" action="/admin/supplier/{{ $supplier->id }}" method="post">
                                            @csrf
                                            @method("put")
                                            <div class="form-floating col-lg-11 m-1">
                                                <input type="text" class="form-control"  value="{{ $supplier->name }}" id="name" name="name"
                                                    placeholder="eg John Doe" aria-describedby="floatingInputHelp" />
                                                <label for="name">name</label>
                                                @error("name")
                                                   <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                               <div class="form-floating col-lg-3 m-1">
                                                <input type="email" class="form-control"  value="{{ $supplier->email  }}" id="email" name="email"
                                                    placeholder="eg rat@gmail.com" aria-describedby="floatingInputHelp" />
                                                <label for="email">Email</label>
                                                @error("email")
                                                   <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                             <div class="form-floating col-lg-3 m-1">
                                                <input type="number" maxlength="10"  pattern="[0-1]{10}"  class="form-control"  value="{{ $supplier->phone  }}" id="phone" name="phone"
                                                    placeholder="eg 0546878947" aria-describedby="floatingInputHelp" />
                                                <label for="name">phone</label>
                                                @error("phone")
                                                   <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class=" form-floating col-lg-5 m-1 p-2" >
                                               <label for="gender">gender </label>
                                             <select  name="gender"  class="form-select">
                                                <option value="{{ $supplier->gender }}" selected>{{ $supplier->gender }}</option>
                                                <option value="male" >male</option>
                                                <option value="female" >female</option>
                                             </select>
                                            </div>
                                            <textarea placeholder="type here" class="form-control col-lg-11 m-1"  name="address" id="address" cols="30" rows="10">{{ $supplier->address }}</textarea>
                                             @error("address")
                                               <p class="text-danger">
                                                {{ $message }}
                                               </p>
                                             @enderror
                                          <input class="btn btn-primary m-3" name="update" type="submit" value="update supplier">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--/ Order Statistics -->
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <x-footer />
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
        <a href="#top" class="btn btn-danger btn-buy-now">top</a>
    </div>

    <!-- Core JS -->
    <x-scripts />
    {{-- core js end  --}}
</body>

</html>
