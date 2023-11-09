<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice {
            margin: 0 auto;
            padding: 20px;
            width: 80%;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-body {
            margin-bottom: 30px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th, .invoice-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .invoice-footer {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="invoice-header">
            <h2>Invoice</h2>
        </div>

        <div class="invoice-body">
            <table class="invoice-table">
                <tr>
                    <th>Order ID</th>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td>{{ $order->customer_name }}</td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td>{{ $order->product_name }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $order->quantity }}</td>
                </tr>
                <!-- Add more order details as needed -->
            </table>
        </div>

        <div class="invoice-footer">
            <p>Total Amount: ${{ $order->total_amount }}</p>
            <!-- Add more invoice details as needed -->
        </div>
    </div>
</body>

</html>
