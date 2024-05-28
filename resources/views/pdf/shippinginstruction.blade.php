<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Instruction</title>


    <style>
        .title {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .subtitle {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .logo {
            width: 100px;
            height: 100px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }
    </style>

</head>

<body>
    <img class="logo" src="{{ public_path('storage/logo/logo.png') }}" alt="logo" />
    <div class="title">SHIPPING INSTRUCTIONS</div>
    <div class="subtitle">Booking Reference:{{ $record->booking_no }}</div>
    <table>
        <tr>
            <td width="50%">
                test
            </td>
            <td width="50%">
                test
            </td>

        </tr>
    </table>
</body>

</html>
