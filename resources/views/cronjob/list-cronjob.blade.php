<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Cronjob</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #2e2e2e;
            color: #f0f0f0;
            padding: 20px;
            margin: 0;
        }

        pre {
            background-color: #000;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #444;
            overflow-x: auto;
            font-size: 14px;
            line-height: 1.6;
        }

        .timestamp {
            color: #d3d3d3;
        }

        .success {
            color: #00ff00;
        }

        .error {
            color: #ff0000;
        }
    </style>
</head>

<body>
    <pre>
    {{-- Ganti logContent dengan format yang diinginkan untuk menampilkan log secara dinamis --}}
    {{ $logContent }}
    </pre>
</body>

</html>