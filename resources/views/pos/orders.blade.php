<!DOCTYPE html>
<html>
<head>
    <title>Orders Report</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan */
        h1 {
            text-align: center; /* Memusatkan teks judul */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Orders Report</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Total Amount</th>
                <th>Order Date</th>
                <th>Order Change</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_amount }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->order_change }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
