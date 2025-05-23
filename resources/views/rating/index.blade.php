<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Insert Rating</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <h1 class="text-center">Insert Rating</h1>
    <div class="container">
        <form name="ratingForm" id="ratingForm" method="post">
            @csrf
            <div class="form-group">
                <label for="author_id">Author</label>
                <select name="author_id" id="author_id" class="form-control">
                    <option value="">Select Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->author_id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="book_id">Book</label>
                <select name="book_id" id="book_id" class="form-control">
                    <option value="">Select Book</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="text" name="rating" id="rating" class="form-control">
            </div>
        </form>
        <button type="button" id="saveBtn" class="btn btn-primary mt-3">Submit</button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect('#author_id', {
                placeholder: 'Select Author',
                allowEmptyOption: true,
                allowClear: true,
            });

            const bookSelect = new TomSelect('#book_id', {
                placeholder: 'Select Book',
                allowEmptyOption: true
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('change', '#author_id', function () {
                var author_id = $(this).val();

                bookSelect.clearOptions();
                bookSelect.addOption({ value: '', text: 'Select Book' });
                bookSelect.setValue('');

                $.ajax({
                    url: "{{ route('rating.getRating') }}",
                    type: 'POST',
                    data: {
                        author_id: author_id
                    },
                    success: function (response) {
                        response.forEach(function (book) {
                            bookSelect.addOption({
                                value: book.book_id,
                                text: book.title
                            });
                        });

                        bookSelect.refreshOptions(false);
                    }
                });
            });

            $('body').on('click', '#saveBtn', function () {
                var formData = new FormData($('#ratingForm')[0]);

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to save this rating?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('rating.store') }}",
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                Swal.fire({
                                    title: 'Success',
                                    text: 'Rating saved successfully',
                                    icon: 'success',
                                }).then(() => {
                                    window.location.href = response.redirect;
                                });
                            },
                            error: function (response) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Rating not saved',
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>