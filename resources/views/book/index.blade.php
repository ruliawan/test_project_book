<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Book List</h1>
    <div class="container">
        <table id="book-table" class="table table-bordered">
            <thead>
                <tr>
                <th class="text-center">No</th>
                <th class="text-center">Book Name</th>
                <th class="text-center">Category Name</th>
                <th class="text-center">Author Name</th>
                <th class="text-center">Average Rating</th>
                <th class="text-center">Voter</th>
            </tr>
        </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#book-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('book.data') }}",
                order: [],
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center' },
                    { data: 'title' },
                    { data: 'category_name' },
                    { data: 'name' },
                    { data: 'average_rating' },
                    { data: 'voter' },
                ]
            });
        });
    </script>
</body>
</html>