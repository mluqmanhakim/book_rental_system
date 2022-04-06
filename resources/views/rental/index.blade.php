@extends('layout.base')

@section('content')
<h1>Pending rentals</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Book Title</th>
      <th scope="col">Author</th>
      <th scope="col">Date of Rental</th>
      <th scope="col">Deadline</th>
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
    </tr>
    @endforeach
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





@endsection