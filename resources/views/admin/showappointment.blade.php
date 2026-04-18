@extends('layouts/admin')

@section('title', 'Show Appointment')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE NO.</th>
      <th scope="col">DATE</th>
        <th scope="col">TIME</th>
      <th scope="col">MESSAGE</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $i)
    <tr>
      <th scope="row">{{ $i->name }}</th>
      <td>{{ $i->email }}</td>
      <td>{{ $i->phn }}</td>
      <td>{{ $i->date }}</td>
      <td>{{ $i->time }}</td>
      <td>{{ $i->msg }}</td>
<!--      <td><a href="/admin/deleteappointment/{{ $i->id }}">Edit</a></td>-->
      <td><a href="/admin/deleteappointment/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
