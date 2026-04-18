@extends('layouts/admin')

@section('title', 'Show Room')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">IMAGE</th>
      <th scope="col">PRICE</th>
      <th scope="col">BED</th>
      <th scope="col">TITLE</th>
      <th scope="col">DETAIL</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $i)
    <tr>
      <th scope="row"> <img src="{{ asset('storage/' . $i->image) }}" alt="No image" height="100px" width="100px"></th>
      <td>{{ $i->price }}</td>
      <td>{{ $i->bed }}</td>
      <td>{{ $i->title }}</td>
      <td>{{ $i->detail }}</td>
      <td><a href="/admin/updateroom/{{ $i->id }}">Update</a></td>
      <td><a href="/admin/deleteroom/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
