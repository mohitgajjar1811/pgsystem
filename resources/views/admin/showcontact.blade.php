@extends('layouts/admin')

@section('title', 'Show Contact')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">SUBJECT</th>
      <th scope="col">MESSAGE</th>
    </tr>
  </thead>
  <tbody>
   @foreach($data1 as $i)
    <tr>    
      <th scope="row">{{ $i->name }}</th>
      <td>{{ $i->email }}</td>
      <td>{{ $i->subject }}</td>
      <td>{{ $i->message }}</td>
<!--        <td><a href="updatecontact/{{ $i->id }}">Edit</a> </td>-->
      <td><a href="/admin/deletecontact/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
