<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Cronjob</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #1e1e1e;
            /* Dark background for terminal-like effect */
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
            white-space: pre-wrap;
            /* Ensure long lines wrap properly */
            word-wrap: break-word;
            /* Break long words if necessary */
        }

        .timestamp {
            color: #d3d3d3;
            /* Lighter gray for timestamps */
        }

        .success {
            color: #00ff00;
            /* Green for success logs */
        }

        .error {
            color: #ff0000;
            /* Red for error logs */
        }

        .warning {
            color: #ffcc00;
            /* Yellow for warnings */
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