<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <h3>Hello World</h3>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Blade jQuery test:', typeof $); // should be "function"

            $('#test').css('color', 'red');
        });
    </script>

</body>
</html>