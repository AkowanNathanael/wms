<!doctype html>
<x-header title="incoming {{ $incoming->product_name }}" />

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
                                            <h5 class="mb-1 me-2">edit incoming goods</h5>
                                        </div>

                                    </div>
                                    <div class="card-body  m-1">
                                        <form class=" row" enctype="multipart/form-data" action="/admin/incoming/store"
                                            method="post">
                                            @csrf

                                            <div class=" col-lg-5 m-1 border rounded-2 p-1 ">
                                                <label for="product_id" class="form-label">product</label>
                                                <select onchange="productSelect(event)" value="{{ $incoming->product_id}}" id="product_id"
                                                    name="product_id" class="form-select form-select-sm">
                                                    <option value="null" selected>--choose--</option>
                                                    @foreach ($products as $product)
                                                    @if ($product->id == $incoming->product_id)
                                                    <option selected value="{{ $product->id }}">
                                                        {{ $product->name }} GHS{{ $product->unit_price }}
                                                        <input style="opacity:0;color:white;" type="text" name="prod_price" id="prod_price" value="{{$product->unit_price  }}" />
                                                    </option>
                                                        
                                                    @else
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->name }} GHS{{ $product->unit_price }}
                                                        <input style="opacity:0;color:white;" type="text" name="prod_price" id="prod_price" value="{{$product->unit_price  }}" />
                                                    @endif
                                                
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('product_id')
                                                <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                                
                                            </div>
                                            <div class="form-floating col-lg-5 m-1">
                                                <input type="number" class="form-control" value="{{ $incoming->quantity) }}"
                                                    id="quantity" oninput="calcTotal(event)" name="quantity" placeholder="eg 34"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="quantity">quantity</label>
                                                @error('quantity')
                                                <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="form-floating col-lg-5 m-1">
                                                <input type="price" readonly class="form-control" value="{{ $incoming->price }}"
                                                    id="price" name="price" placeholder="eg 34"
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="price">unit price</label>
                                                @error('price')
                                                <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class=" col-lg-5 m-1 border rounded-2 p-1 ">
                                                <label for="supplier_id" class="form-label">Supplier</label>
                                                <select value="{{ old('supplier_id') }}" id="supplier_id"
                                                    name="supplier_id" class="form-select form-select-sm">
                                                    <option value="null" selected>--choose--</option>
                                                    @foreach ($suppliers as $supplier)
                                                    @if ($supplier->id == $incoming->supplier_id)
                                                    <option selected value="{{ $supplier->id }}"> {{ $supplier->name }}
                                                        <input style="opacity:0;color:white;" type="text" name="supplier_name" id="supplier_name" value="{{$supplier->name  }}" />
                                                    </option>       
                                                        
                                                    @else
                                                         <option  value="{{ $supplier->id }}"> {{ $supplier->name }}
                                                        <input style="opacity:0;color:white;" type="text" name="supplier_name" id="supplier_name" value="{{$supplier->name  }}" />
                                                    </option
                                                    @endif
                                                    @endforeach
                                                </select>

                                                @error('supplier_id')
                                                <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="form-floating col-lg-4 m-1">
                                                <input type="number" readonly class="form-control" value="{{ $incoming->total }}"
                                                    id="total" name="total" placeholder=""
                                                    aria-describedby="floatingInputHelp" />
                                                <label for="total">Total price</label>
                                                @error('total')
                                                <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                            <input class="btn btn-primary m-3" name="submit" type="submit"
                                                value="add incoming goods">
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
<script>
    function calcTotal(event) {
        const quantityEl = document.getElementById("quantity")
        const totalEl = document.getElementById("total")
        const priceEl = document.getElementById("price")
        console.log(quantityEl.value)
        if (priceEl.value) {
            const mult = Number.parseFloat(priceEl.value) * Number.parseFloat(quantityEl.value)
            console.log(mult)
            totalEl.value=mult
        }



    }

    function productSelect(event) {
        const selectEl = event.target;
        const selectedValue = selectEl.value;
        console.log(selectedValue);
        console.log(selectEl.options[selectEl.selectedIndex].text.split("GHS"));
        let l = selectEl.options[selectEl.selectedIndex].text.split("GHS")
        l.forEach(element => {
            if (!isNaN(element)) {
                const priceEl = document.getElementById("price")
                priceEl.value = element
            }
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
        const imageEl = document.getElementById("image");

        if (imageEl) {
            imageEl.addEventListener("change", function() {
                const file = imageEl.files[0];
                const fileSize = file.size / 1024 / 1024; // in MB
                if (fileSize > 1) {
                    alert("File size is too large");
                    imageEl.value = "";
                } else {
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
                }
            });
        }
    });
</script>

</html>