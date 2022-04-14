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
                    @foreach($pending_rentals as $pend_rental)
                    <tr>
                        <td>{{ $pend_rental->book_title }}</td>
                        <td>{{ $pend_rental->book_authors }}</td>
                        <td>{{ $pend_rental->created_at->format('d-M-Y H:i:s') }}</td>
                        <td>{{ $pend_rental->deadline }}</td>
                        <td><a href="{{ route('show_rental', $pend_rental->id) }}">Detail</a></td>
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
                    @foreach($accepted_in_time_rentals as $acc_in_rental)
                    <tr>
                        <td>{{ $acc_in_rental->book_title }}</td>
                        <td>{{ $acc_in_rental->book_authors }}</td>
                        <td>{{ $acc_in_rental->created_at->format('d M Y H:i:s') }}</td>
                        <td>{{ date("d M Y H:i:s", strtotime($acc_in_rental->deadline)) }}</td>
                        <td><a href="{{ route('show_rental', $acc_in_rental->id) }}">Detail</a></td>
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
                    @foreach($accepted_late_rentals as $acc_late_rental)
                    <tr>
                        <td>{{ $acc_late_rental->book_title }}</td>
                        <td>{{ $acc_late_rental->book_authors }}</td>
                        <td>{{ $acc_late_rental->created_at }}</td>
                        <td>{{ $acc_late_rental->deadline }}</td>
                        <td><a href="{{ route('show_rental', $acc_late_rental->id) }}">Detail</a></td>
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
                    @foreach($rejected_rentals as $rej_rental)
                    <tr>
                        <td>{{ $rej_rental->book_title }}</td>
                        <td>{{ $rej_rental->book_authors }}</td>
                        <td>{{ $rej_rental->created_at }}</td>
                        <td>{{ $rej_rental->deadline }}</td>
                        <td><a href="{{ route('show_rental', $rej_rental->id) }}">Detail</a></td>
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
                    @foreach($returned_rentals as $ret_rental)
                    <tr>
                        <td>{{ $ret_rental->book_title }}</td>
                        <td>{{ $ret_rental->book_authors }}</td>
                        <td>{{ $ret_rental->created_at }}</td>
                        <td>{{ $ret_rental->deadline }}</td>
                        <td><a href="{{ route('show_rental', $ret_rental->id) }}">Detail</a></td>
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
        $('.table').DataTable({
            "order": [[ 2, "desc" ]]
        });
    } );
</script>
@endsection