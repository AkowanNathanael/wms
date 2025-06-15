<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .company-details {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .invoice-details {
            margin-bottom: 30px;
        }

        .customer-info {
            float: left;
            width: 50%;
        }

        .invoice-info {
            float: right;
            width: 50%;
            text-align: right;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .invoice-table th {
            background-color: #2c3e50;
            color: white;
            padding: 12px;
            text-align: left;
        }

        .invoice-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .invoice-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .total-row {
            font-weight: bold;
            background-color: #eee !important;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="company-name">Your Company Name</div>
            <div class="company-details">123 Business Street, City, Country</div>
            <div class="company-details">Phone: +1 234 567 890 | Email: info@yourcompany.com</div>
            <div class="company-details">VAT: 123456789</div>
        </div>

        <div class="invoice-details clearfix">
            <div class="customer-info">
                <h3>Bill To:</h3>
                <p>{{ $customer->name }}<br>
                    {{ $customer->address ?? 'N/A' }}<br>
                    {{ $customer->phone ?? 'N/A' }}
                </p>
            </div>
            <div class="invoice-info">
                <h3>Invoice Details:</h3>
                <!--  INV-{{ date('Ymd') }}-{{ rand(1000, 9999) }} -->
                <p>Invoice #:{{$invoice_id}}<br>
                    Date: {{ date('Y-m-d') }}<br>
                    Due Date: {{ date('Y-m-d', strtotime('+30 days')) }}</p>
            </div>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($cart as $item)
                @php
                $subtotal = $item['price'] * $item['qty'];
                $grandTotal += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>GHC {{ number_format($item['price'], 2) }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>GHC{{ number_format($subtotal, 2) }}</td>
                </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="3"><strong>Grand Total</strong></td>
                    <td><strong>GHC{{ number_format($grandTotal, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="footer" style="text-align: center; margin-top: 40px; color: #7f8c8d; font-size: 12px;">
            <p>Thank you for your business!</p>
            <p>This is a computer generated invoice, no signature required.</p>
        </div>
    </div>
</body>

</html>