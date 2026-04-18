@extends('layouts/admin')

@section('title', 'Show Login')

@section('content')
<table class="table">
  <thead>
    <tr>
<!--      <th scope="col">FNAME</th>-->
<!--      <th scope="col">LNAME</th>-->
      <th scope="col">EMAIL</th>
      <th scope="col" typeof="password">PASSWORD</th>
<!--      <th scope="col">DOB</th>-->
<!--      <th scope="col">PHONE</th>-->
    </tr>
  </thead>
  <tbody>
  @foreach($data13 as $i)
    <tr>
<!--      <th scope="row">{{ $i->firstname }}</th>-->
<!--      <td>{{ $i->lastname }}</td>-->
      <td>{{ $i->email }}</td>
      <td>********</td>
<!--      <td>{{ $i->dob }}</td>-->
<!--      <td>{{ $i->phoneno }}</td>-->
<!--      <td><a href="updatecontact/{{ $i->id }}">Edit</a></td>-->
      <td><a href="/admin/deleteregistration/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
