<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .invoice-container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .invoice-header {
            padding: 20px;
            text-align: center;
        }

        .patient-info,
        .items-table,
        .total-section {
            padding: 20px;
        }

        .items-table table,
        .total-section table {
            width: 100%;
        }

        .items-table th,
        .items-table td,
        .total-section th,
        .total-section td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        .total-section td {
            font-weight: bold;
        }
        .items-table table {
            width: 100%;
        }
        .total-section .total-label {
            width: 200%; /* You can adjust the width percentage as needed */
        }

        .total-section .total-value {
            width: 50%; /* You can adjust the width percentage as needed */
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container invoice-container">
        <div class="invoice-header bg-primary text-white py-4 text-center">
            <h2>TuTam Hospital Group</h2>
            <address class="text-light">
                Single Member Limited Liability Company From the Heart<br>
                600 Pennsylvania Avenue NW, Washington, D.C., 20500, USA.<br>
                Tax ID: 123-45-6789<br>
                Phone: 0964 235 042<br>
            </address>
        </div>

        <div class="patient-info">
            <h3>Patient Information</h3>
            @foreach($patient as $p)
            <p><strong>Name:</strong> {{ $p->name }}</p>
            <p><strong>Email:</strong> {{ $p->email }}</p>
            <p><strong>Address:</strong> {{ $p->address }}</p>
            <p><strong>Phone:</strong> {{ $p->phone }}</p>
            @endforeach
        </div>

        <div class="items-table">
            <h3>Services</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Unit Price $</th>
                        <th>Total $</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($treatment as $b)
                    <tr>
                        <td>
                            @for ($i = 1; $i <= 10; $i++)
                            @php
                            $ser = 'test' . $i;
                            $name = App\Models\service::where('id', $b->$ser)->value('ser_name');
                            @endphp
                            @if ($name)
                            {{ $name }} <br>
                            @endif
                            @endfor
                        </td>
                        <td>
                            @php
                            $totalServicePrice = 0;
                            @endphp
                            @for ($i = 1; $i <= 10; $i++)
                            @php
                            $ser = 'test' . $i;
                            $price = App\Models\service::where('id', $b->$ser)->value('ser_price');
                            @endphp
                            @if ($price)
                            {{ $price }} <br>
                            @php
                            $totalServicePrice += $price;
                            @endphp
                            @endif
                            @endfor
                        </td>
                        <td>{{ $totalServicePrice }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Medicines</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Unit</th>
                        <th>Unit Price $</th>
                        <th>Total $</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $totalMedicinePrice = 0;
                    @endphp
                    @foreach ($treatment as $b)
                    <tr>
                        <td>
                            @for ($i = 1; $i <= 10; $i++)
                            @php
                            $med = 'medi' . $i;
                            $name = App\Models\medicine::where('id', $b->$med)->value('name');
                            @endphp
                            @if ($name)
                            {{ $name }} <br>
                            @endif
                            @endfor
                        </td>
                        <td>
                            @for ($i = 1; $i <= 10; $i++)
                            @php
                            $fre = 'frequency' . $i;
                            $f = $b->$fre;
                            $day = 'days' . $i;
                            $d = $b->$day;
                            @endphp
                            @if ($f)
                            {{ $f * $d }} <br>
                            @endif
                            @endfor
                        </td>
                        <td>
                            @for ($i = 1; $i <= 10; $i++)
                            @php
                            $fre = 'frequency' . $i;
                            $f = $b->$fre;
                            $day = 'days' . $i;
                            $d = $b->$day;
                            $med = 'medi' . $i;
                            $me = App\Models\medicine::where('id', $b->$med)->value('price');
                            @endphp
                            @if ($f)
                            {{ $f * $d * $me }} <br>
                            @php
                            $totalMedicinePrice += ($f * $d * $me);
                            @endphp
                            @endif
                            @endfor
                        </td>
                        <td>{{ $totalMedicinePrice }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <<td class="text-right total-label" colspan="3"><strong>Total:</strong></td>
                        <td class="total-value"><strong>{{ $totalServicePrice + $totalMedicinePrice }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
