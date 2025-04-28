@extends('layouts.admin-layout')

@section('page-name', 'POS - Report')
@section('title', 'Report - Index')

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="pagetitle mt-4 mb-4">
                <h1 align="center" style="text-transform: uppercase; font-weight: bold">
                    Laporan Penjualan
                </h1>
            </div>

            <!-- Filters -->
            <div class="mb-4">
                <label for="filter-preset">Filter:</label>
                <select id="filter-preset" class="form-control" style="width: 200px; display: inline-block;">
                    <option value="">-- Select --</option>
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                </select>

                <button id="print-report" class="btn btn-primary" style="margin-left: 20px;">
                    <i class="fas fa-print"></i> Print Report
                </button>
            </div>

            <!-- Table -->
            <table id="tabelorder" class="display nowrap table" style="width:100%">
                <thead>
                    <tr>
                        <th>Order Code</th>
                        <th>Amount</th>
                        <th>Order Date</th>
                        <th>Order Change</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <td>{{ $order->order_code }}</td>
                        <td>{{ $order->formatted_amount }}</td>
                        <td>{{ $order->formatted_date }}</td>
                        <td>{{ $order->formatted_change }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('script')
    <!-- jQuery and DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {

            var table = $('#tabelorder').DataTable();

            var filterType = '';

            // Push custom search
            $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                if (!filterType) return true;

                var orderDateStr = data[2]; // Order Date
                if (!orderDateStr) return false;

                var parts = orderDateStr.split('-');
                if (parts.length !== 3) return false;

                var orderDate = new Date(parts[0], parts[1] - 1, parts[2]);
                orderDate.setHours(0, 0, 0, 0);

                var today = new Date();
                today.setHours(0, 0, 0, 0);

                var start, end;

                if (filterType === 'today')
                {
                    start = new Date(today);
                    end = new Date(today);
                    end.setHours(23, 59, 59, 999);
                }
                else if (filterType === 'week')
                {
                    var monday = new Date(today);
                    var day = monday.getDay();
                    var diffToMonday = day === 0 ? -6 : 1 - day;
                    monday.setDate(monday.getDate() + diffToMonday);
                    monday.setHours(0, 0, 0, 0);

                    start = new Date(monday);
                    end = new Date(monday);
                    end.setDate(monday.getDate() + 6);
                    end.setHours(23, 59, 59, 999);
                }
                else if (filterType === 'month')
                {
                    start = new Date(today.getFullYear(), today.getMonth(), 1);
                    start.setHours(0, 0, 0, 0);

                    end = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                    end.setHours(23, 59, 59, 999);
                }

                console.log(`Checking ${orderDate} between ${start} and ${end}`);
                return orderDate >= start && orderDate <= end;
            });

            // Change filter
            $('#filter-preset').on('change', function () {
                filterType = $(this).val();
                table.draw();
            });

            // Print Button
            // Print Button
            $('#print-report').click(function () {
                var data = table.rows({ search: 'applied' }).data(); // Only visible (filtered) data

                var printWindow = window.open('', '', 'height=700,width=1000');
                printWindow.document.write('<html><head><title>Order Report</title>');
                printWindow.document.write('<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">');
                printWindow.document.write('<style>table {width: 100%; border-collapse: collapse;} th, td {border: 1px solid #ccc; padding: 8px;}</style>');
                printWindow.document.write('</head><body>');
                printWindow.document.write('<h1 style="text-align:center;">Order Report</h1>');
                printWindow.document.write('<table>');
                printWindow.document.write('<thead><tr><th>Order Code</th><th>Amount</th><th>Order Date</th><th>Order Change</th></tr></thead>');
                printWindow.document.write('<tbody>');

                for (var i = 0; i < data.length; i++)
                {
                    printWindow.document.write('<tr>');
                    printWindow.document.write('<td>' + data[i][0] + '</td>');
                    printWindow.document.write('<td>' + data[i][1] + '</td>');
                    printWindow.document.write('<td>' + data[i][2] + '</td>');
                    printWindow.document.write('<td>' + data[i][3] + '</td>');
                    printWindow.document.write('</tr>');
                }

                printWindow.document.write('</tbody></table>');
                printWindow.document.write('</body></html>');

                printWindow.document.close();
                printWindow.print();
            });


            // Clickable row
            $('#tabelorder tbody').on('click', 'tr', function () {
                var href = $(this).data('href');
                if (href)
                {
                    window.location = href;
                }
            });

        });
    </script>
@endsection