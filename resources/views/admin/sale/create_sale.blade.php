<!doctype html>
<x-header title="add Sales" />

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
                        <div class="row ">
                            <!-- Order Statistics -->
                            <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-6 p-2">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-title mb-0">
                                            <h5 class="mb-1 me-2">Add product</h5>
                                        </div>
                                        @if(session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        @if($errors->any())
                                        <div class="alert alert-danger">{{ implode(', ', $errors->all()) }}</div>
                                        @endif
                                    </div>
                                    <!-- <div class="card-body  m-1">
                                        <form id="posForm" class=" row" enctype="multipart/form-data" action="/admin/product/store"
                                            method="post">
                                            @csrf

                                            <div class=" col-lg-5 m-1  rounded-2 p-1 ">
                                                <label for="customer_id" class="form-label">Customer</label>
                                                <select value="{{ old('customer_id') }}" id="customer_id"
                                                    name="customer_id" class="form-select form-select-sm" required>
                                                    <option value="null" selected>--choose--</option>
                                                    @foreach ($customers as $cus)
                                                    <option value="{{ $cus->id }}"> {{ $cus->name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('customer_id')
                                                <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>

                                                @enderror
                                            </div>
                                            <div class=" col-lg-5 m-1  rounded-2 p-1 ">
                                                <label for="product_id" class="form-label">Product</label>
                                                <select value="{{ old('product_id') }}" id="product_id"
                                                    name="product_id" class="form-select form-select-sm" required>
                                                    <option value="null" selected>--choose--</option>
                                                    @foreach ($products as $product)
                                                    <option value="{{ $product->id }}"> {{ $product->name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('brand_id')
                                                <p id="floatingInputHelp" class="form-text text-danger ">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                            <button class="btn btn-primary col-lg-3  m-3" name="submit" type="button">add to cart </button>
                                        </form>
                                    </div> -->
                                    <div class="card-body p-2 m-1 ">
                                        <form class="row" id="posForm" method="POST" action="/admin/invoice?random={{ rand(1000, 9999) }}">
                                            @csrf
                                            <div class="col-lg-5">
                                                <label>Customer Name:</label>
                                                <select id="customer" name="customer_id" class="form-control" required>
                                                    <option value="">Select Customer</option>
                                                    @foreach($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-5">
                                                <label>Select Product » Poduct:</label>
                                                <select id="product" class="form-control">
                                                    <option value="null">Select...</option>
                                                    @foreach($products as $product)
                                                    <option value="{{ $product->id }}"
                                                        data-name="{{ $product->name }}"
                                                        data-stock="{{ $product->quantity_in_stock }}"
                                                        data-price="{{ $product->selling_price }}">
                                                        {{ $product->name }} ({{ $product->quantity_in_stock }} in stock)
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <button type="button" id="addToCart" class="btn m-2 float-right btn-success">Add To Cart</button>
                                            </div>
                                            <div class="col-lg-12">
                                                <label>Select Payment type »:</label>
                                                <select name="payment_type" id="payment_type" class="form-select mb-3 mt">
                                                    <option value="card">card</option>
                                                    <option value="cheque">cheque</option>
                                                    <option value="cash" selected>cash</option>
                                                    <option value="momo">momo</option>
                                                </select>
                                            </div>
                                            <table class="table table-bordered table-striped col-lg-12 p-2 mt-3 mx-2 rounded  rounded-4 " id="cartTable">
                                                <thead>
                                                    <tr>
                                                        <th>PRODUCT NAME</th>
                                                        <th>STOCK QTY</th>
                                                        <th>UNIT PRICE</th>
                                                        <th>QTY</th>
                                                        <th>SUBTOTAL</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Cart items will be added here -->
                                                </tbody>
                                            </table>

                                            <div class="mt-4 mb-4">
                                                <label>Grand Total</label>
                                                <input type="text" id="grandTotal" name="grand_total" readonly class="form-control" value="0">
                                            </div>

                                            <input type="hidden" name="cart" id="cart">
                                            <button type="submit" class="btn btn-primary mt-2">Generate Invoice</button>
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
    document.addEventListener("DOMContentLoaded", function() {
        let cart = [];
        let selectedCustomerId = "";

        // Update selected customer ID on change
        document.getElementById('customer').addEventListener('change', function(e) {
            selectedCustomerId = e.target.value;
        });

        function renderCart() {
            const tbody = document.querySelector("#cartTable tbody");
            tbody.innerHTML = "";
            let grandTotal = 0;
            cart.forEach((item, idx) => {
                let subtotal = item.price * item.qty;
                grandTotal += subtotal;
                tbody.innerHTML += `
                <tr data-index="${idx}">
                    <td>${item.name}</td>
                    <td>${item.stock}</td>
                    <td>${item.price}</td>
                    <td>
                        <input type="number" min="1" max="${item.stock}" value="${item.qty}" class="form-control qty-input" style="width:80px;">
                    </td>
                    <td class="subtotal">${subtotal}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm delete-row">Delete</button>
                    </td>
                </tr>
            `;
            });
            document.getElementById("grandTotal").value = grandTotal;
        }

        document.getElementById("addToCart").addEventListener("click", function() {
            const productSelect = document.getElementById("product");
            const option = productSelect.options[productSelect.selectedIndex];
            if (!selectedCustomerId || !option.value || option.value === "null") {
                alert("Please select both a customer and a product!");
                return;
            }
            if (cart.find(item => item.id == option.value)) {
                alert("Already in cart!");
                return;
            }
            cart.push({
                id: option.value,
                name: option.dataset.name,
                stock: parseInt(option.dataset.stock),
                price: parseFloat(option.dataset.price),
                qty: 1
            });
            renderCart();
        });

        document.querySelector("#cartTable tbody").addEventListener("input", function(e) {
            if (e.target.classList.contains("qty-input")) {
                const tr = e.target.closest("tr");
                const idx = tr.dataset.index;
                let qty = parseInt(e.target.value) || 1;
                let max = parseInt(cart[idx].stock);
                if (qty > max) qty = max;
                if (qty < 1) qty = 1;
                cart[idx].qty = qty;
                renderCart();
            }
        });

        document.querySelector("#cartTable tbody").addEventListener("click", function(e) {
            if (e.target.classList.contains("delete-row")) {
                const tr = e.target.closest("tr");
                const idx = tr.dataset.index;
                cart.splice(idx, 1);
                renderCart();
            }
        });

        document.getElementById('posForm').addEventListener('submit', function(e) {
            console.log('Form submit event triggered!');
            e.preventDefault(); // Prevent default submission
            if (!selectedCustomerId || cart.length === 0) {
                alert("Please select a customer and add at least one product to the cart.");
                return;
            }

            // Set the cart data before submission
            document.getElementById('cart').value = JSON.stringify(cart);

            // Submit the form
            this.submit(); // Remove this line
        });

    });
</script>