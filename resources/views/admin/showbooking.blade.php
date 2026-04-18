@extends('layouts/admin')

@section('title', 'Show Booking')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">MOBILE NO</th>
      <th scope="col">JOINING DATE</th>
      <th scope="col">Selected Rooms</th>
      <th scope="col">Selected Beds</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $i)
    <tr>
      <th scope="row">{{ $i->name }}</th>
      <td>{{ $i->email }}</td>
      <td>{{ $i->mobileno }}</td>
      <td>{{ $i->joiningdate }}</td>
      <td>{{ $i->adult }}</td>
      <td>{{ $i->specialrequest }}</td>
<!--      <td><a href="/admin/deletebooking/{{ $i->id }}">Edit</a></td>-->
      <td><a href="/admin/deletebooking/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
