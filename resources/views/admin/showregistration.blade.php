@extends('layouts/admin')

@section('title', 'Show Registration')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">FNAME</th>
      <th scope="col">LNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data12 as $i)
    <tr>
      <th scope="row">{{ $i->firstname }}</th>
      <td scope="row">{{ $i->lastname }}</td>
      <td scope="row">{{ $i->email }}</td>
      <td scope="row">{{ $i->phoneno }}</td>
      <td scope="row">********</td>
      <td><a href="/admin/deleteregistration/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
