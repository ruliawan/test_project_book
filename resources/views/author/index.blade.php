<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 10 Most Famous Author</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <h1 class="text-center">Top 10 Most Famous Author</h1>
    <div class="container">
        <table id="author-table" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Author Name</th>
                    <th class="text-center">Voter</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#author-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('author.data') }}",
                order: [],
                searching: false,
                paging: false,
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center', width: '5%' },
                    { data: 'name' },
                    { data: 'total_voter' }
                ]
            });
        });
    </script>
</body>
</html>