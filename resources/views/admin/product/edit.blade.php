<!doctype html>
<x-header title="edit product" />

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
                                            <h5 class="mb-1 me-2">edit product</h5>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <form class="row" enctype="multipart/form-data"
                                            action="/admin/product/{{ $product->id }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="ima">
                                                <img src="{{ $product->image ?  $product->image : asset('no-image.png') }}"
                                                    alt="product image" class="img-fluid border m-2 rounded-start"
                                                    style="width: 400px; height: 300px; object-fit: cover;">
                                            </div>
                                            <div class="form-floating col-lg-5 m-1">
                                                <input type="text" class="form-control" value="{{ $product->name }}"
                                                    id="name" name="name" placeholder="eg Jman corp"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="title">Name</label>
                                                @error('name')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class=" col-lg-5 m-1 border rounded-2 p-1 ">
                                                <label for="category_id" class="form-label">Category</label>
                                                <select value="{{ old('category_id') }}" id="category_id"
                                                    name="category_id" class="form-select form-select-sm">
                                                    @foreach ($categories as $cat)
                                                        @if ($cat->id == $product->category_id)
                                                            <option value="{{ $cat->id }}" selected>
                                                                {{ $cat->name }} </option>
                                                        @else
                                                            <option value="{{ $cat->id }}"> {{ $cat->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                                @error('category_id')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class=" col-lg-5 m-1 border rounded-2 p-1 ">
                                                <label for="brand_id" class="form-label">Brand</label>
                                                <select value="{{ old('brand_id') }}" id="brand_id"
                                                    name="brand_id" class="form-select form-select-sm">
                                                    @foreach ($brands as $brand)
                                                        @if ($brand->id == $product->brand_id)
                                                            <option value="{{ $brand->id }}" selected>
                                                                {{ $brand->name }} </option>
                                                        @else
                                                            <option value="{{ $brand->id }}"> {{ $brand->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class=" col-lg-5 m-1 border rounded-2 p-1 ">
                                                <label for="warehouse_id" class="form-label">warehouse</label>
                                                <select value="{{ old('warehouse_id') }}" id="warehouse_id"
                                                    name="warehouse_id" class="form-select form-select-sm">
                                                    @foreach ($warehouses as $warehouse)
                                                        @if ($warehouse->id == $product->warehouse_id)
                                                            <option value="{{ $warehouse->id }}" selected>
                                                                {{ $warehouse->name }} </option>
                                                        @else
                                                            <option value="{{ $warehouse->id }}"> {{ $warehouse->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('warehouse_id')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="form-floating col-lg-4 m-1">
                                                <input type="date" class="form-control" value="{{ $product->manufactury_date }}"
                                                    id="manufactury_date" name="manufactury_date" placeholder=" 12/23/2020"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="manufactury_date">manufactury date</label>
                                                @error('manufactury_date')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="form-floating col-lg-4 m-1">
                                                <input type="date" class="form-control" value="{{ $product->expiry_date }}"
                                                    id="expiry_date" name="expiry_date" placeholder=" 12/23/2020"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="expiry_date">expiry date</label>
                                                @error('expiry_date')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="form-floating col-lg-3 m-1">
                                                <input type="number" class="form-control" value="{{ $product->quantity_in_stock}}"
                                                    id="quantity_in_stock" name="quantity_in_stock" placeholder=" 40"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="quantity_in_stock">quantity in stock</label>
                                                @error('quantity_in_stock')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="form-floating col-lg-3 m-1">
                                                <input type="number" step="0.01" class="form-control" value="{{ $product->unit_price }}"
                                                    id="unit_price" name="unit_price" placeholder="40"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="unit_price">unit price</label>
                                                @error('unit_price')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="form-floating col-lg-3 m-1">
                                                <input type="number" step="0.01" class="form-control" value="{{ $product->selling_price }}"
                                                    id="selling_price" name="selling_price" placeholder="40"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="selling_price">selling price</label>
                                                @error('selling_price')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="form-floating col-lg-3 m-1">
                                                <input type="text" readonly  class="form-control" value="{{ $product->username }}"
                                                    id="username" name="username" placeholder="40"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="username">username</label>
                                                @error('username')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div id="image-box" class="form-floating col-lg-11 m-1">
                                                <input type="file" accept="image/*" class="form-control"
                                                    value="{{ $product->title ? $product->image : old('image') }}"
                                                    id="image" name="image" placeholder="fly down the sky"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="image">Image</label>
                                                @error('image')
                                                    <p id="floatingInputHelp" class="form-text text-danger ">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <textarea placeholder="type here" class="form-control col-lg-11 m-1" name="description" id="description" cols="30"
                                                rows="10">{{ $product->description }}</textarea>
                                            @error('description')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                            <input class="btn btn-primary m-3" name="update" type="submit"
                                                value="update product">
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
    <script>
        const imageEl = document.getElementById("image");
        imageEl.addEventListener("change", function() {
            const file = imageEl.files[0];
            const fileSize = file.size / 1024 / 1024; // in MB
            if (fileSize > 1) {
                alert("File size is too large");
                imageEl.value = "";
            }
            if (file) {
                const url = URL.createObjectURL(file); // Corrected to use 'URL' instead of 'Url'
                const imageBox = document.getElementById("image-box");
                const newImageEl = document.createElement("img");
                newImageEl.src = url;
                newImageEl.style.width = "150px";
                newImageEl.style.height = "150px";
                imageBox.appendChild(newImageEl);
                // imageBox.style.display = "flex";
            }
        });
    </script>
</body>

</html>
