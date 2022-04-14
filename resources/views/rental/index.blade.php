@extends('layout.base')

@section('extra_style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Pending rentals</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Book Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date of Rental</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pending_rentals as $rental)
                    <tr>
                        <td>{{ $rental->book->title }}</td>
                        <td>{{ $rental->book->authors }}</td>
                        <td>{{ $rental->request_processed_at }}</td>
                        <td>{{ $rental->deadline }}</td>
                        <td><a href="{{ route('show_rental', $rental->id) }}">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h1>Accepted and in-time rentals</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Book Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date of Rental</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accepted_in_time_rentals as $rental)
                    <tr>
                        <td>{{ $rental->book->title }}</td>
                        <td>{{ $rental->book->authors }}</td>
                        <td>{{ $rental->request_processed_at }}</td>
                        <td>{{ $rental->deadline }}</td>
                        <td><a href="{{ route('show_rental', $rental->id) }}">Detail</a></td>
                    </tr> @endforeach
                </tbody>
            </table>
            <h1>Accepted late rentals</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Book Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date of Rental</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accepted_late_rentals as $rental)
                    <tr>
                        <td>{{ $rental->book->title }}</td>
                        <td>{{ $rental->book->authors }}</td>
                        <td>{{ $rental->request_processed_at }}</td>
                        <td>{{ $rental->deadline }}</td>
                        <td><a href="{{ route('show_rental', $rental->id) }}">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h1>Rejected rentals</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Book Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date of Rental</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rejected_rentals as $rental)
                    <tr>
                        <td>{{ $rental->book->title }}</td>
                        <td>{{ $rental->book->authors }}</td>
                        <td>{{ $rental->request_processed_at }}</td>
                        <td>{{ $rental->deadline }}</td>
                        <td><a href="{{ route('show_rental', $rental->id) }}">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h1>Returned rentals</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Book Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date of Rental</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($returned_rentals as $rental)
                    <tr>
                        <td>{{ $rental->book->title }}</td>
                        <td>{{ $rental->book->authors }}</td>
                        <td>{{ $rental->request_processed_at }}</td>
                        <td>{{ $rental->deadline }}</td>
                        <td><a href="{{ route('show_rental', $rental->id) }}">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('extra_script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('.table').DataTable();
    } );
</script>
@endsection