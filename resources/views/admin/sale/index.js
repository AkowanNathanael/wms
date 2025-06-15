function updateTable() {
    let tbody = document.querySelector("#cartTable tbody");
    tbody.innerHTML = "";
    let grandTotal = 0;
    cart.forEach((item, idx) => {
        let subtotal = item.price * item.qty;
        grandTotal += subtotal;
        tbody.innerHTML += `
            <tr data-index="${idx}">
                <td>${item.name}</td>
                <td><span class="badge bg-success">${item.stock} In Stock</span></td>
                <td>${item.price}</td>
                <td>
                    <input type="number" min="1" max="${item.stock}" value="${item.qty}" class="form-control qty-input" style="width:80px;">
                </td>
                <td class="subtotal">${subtotal}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm delete-row">🗑️</button>
                </td>
            </tr>
        `;
    });
    document.getElementById("grandTotal").value = grandTotal;
}

document.getElementById("addToCart").addEventListener("click", function () {
    let productSelect = document.getElementById("product");
    console.log("runn buuton");
    let selected = productSelect.options[productSelect.selectedIndex];
    if (!selected.value) return;

    let exists = cart.find((item) => item.id == selected.value);
    if (exists) {
        alert("Product already in cart!");
        return;
    }

    cart.push({
        id: selected.value,
        name: selected.dataset.name,
        stock: selected.dataset.stock,
        price: selected.dataset.price,
        qty: 1,
    });
    updateTable();
});

document
    .querySelector("#cartTable tbody")
    .addEventListener("input", function (e) {
        if (e.target.classList.contains("qty-input")) {
            let tr = e.target.closest("tr");
            let idx = tr.dataset.index;
            let qty = parseInt(e.target.value) || 1;
            let max = parseInt(cart[idx].stock);
            if (qty > max) qty = max;
            if (qty < 1) qty = 1;
            cart[idx].qty = qty;
            updateTable();
        }
    });

document
    .querySelector("#cartTable tbody")
    .addEventListener("click", function (e) {
        if (e.target.classList.contains("delete-row")) {
            let tr = e.target.closest("tr");
            let idx = tr.dataset.index;
            cart.splice(idx, 1);
            updateTable();
        }
    });

// Optional: handle form submit
document.getElementById("posForm").addEventListener("submit", function (e) {
    e.preventDefault();
    // You can send cart and form data via AJAX or hidden inputs
    alert("Invoice generated! (implement backend logic)");
});

function renderCart() {
    const tbody = document.querySelector("#cartTable tbody");
    tbody.innerHTML = "";
    cart.forEach((item, idx) => {
        tbody.innerHTML += `
            <tr data-index="${idx}">
                <td>${item.name}</td>
                <td>${item.stock}</td>
                <td>${item.price}</td>
                <td>
                    <input type="number" min="1" max="${item.stock}" value="${
            item.qty
        }" class="form-control qty-input" style="width:80px;">
                </td>
                <td class="subtotal">${item.price * item.qty}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm delete-row">Delete</button>
                </td>
            </tr>
        `;
    });
}

document.getElementById("addToCartBtn").addEventListener("click", function () {
    const select = document.getElementById("productSelect");
    const option = select.options[select.selectedIndex];
    if (!option.value) return;

    // Prevent duplicate
    if (cart.find((item) => item.id == option.value)) {
        alert("Already in cart!");
        return;
    }

    cart.push({
        id: option.value,
        name: option.dataset.name,
        stock: option.dataset.stock,
        price: option.dataset.price,
        qty: 1,
    });
    renderCart();
});

document
    .querySelector("#cartTable tbody")
    .addEventListener("input", function (e) {
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

document
    .querySelector("#cartTable tbody")
    .addEventListener("click", function (e) {
        if (e.target.classList.contains("delete-row")) {
            const tr = e.target.closest("tr");
            const idx = tr.dataset.index;
            cart.splice(idx, 1);
            renderCart();
        }
    });
