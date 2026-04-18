@extends('layouts/admin')

@section('title', 'Show Order')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Amount</th>
      <th scope="col">User ID</th>
      <th scope="col">Email</th>
      <th scope="col">First Name</th>
      <th scope="col">Room Details</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data13 as $i)
    <tr>
      <th scope="row">{{ $i->id }}</th>
      <td>{{ $i->amt }}</td>
      <td>{{ $i->uid }}</td>
      <td>{{ $i->email }}</td>
      <td>{{ $i->firstname }}</td>
      <td>{{ $i->blog_data }}</td>
      <!-- No Update for Order -->
      <td><a href="/admin/deleteorder/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
  </div>
<!--</div>-->
@endsection
