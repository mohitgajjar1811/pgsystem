@extends('layouts/admin')

@section('title', 'Show Test')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">IMAGE</th>
      <th scope="col">NAME</th>
      <th scope="col">DESIGNATION</th>
      <th scope="col">MESSAGE</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data2 as $i)
    <tr>
      <th scope="row"> <img src="{{ asset('storage/' . $i->image) }}" alt="No image" height="100px" width="100px"></th>
      <td>{{ $i->name }}</td>
      <td>{{ $i->dsg }}</td>
      <td>{{ $i->message }}</td>
      <td><a href="/admin/updatetest/{{ $i->id }}">Update</a></td>
      <td><a href="/admin/deletetest/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
