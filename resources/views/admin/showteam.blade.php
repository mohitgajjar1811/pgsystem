@extends('layouts/admin')

@section('title', 'Show Team')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">IMAGE</th>
      <th scope="col">NAME</th>
      <th scope="col">DESIGNATION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data11 as $i)
    <tr>
      <td><img src="{{ asset('storage/' . $i->image) }}" style="height:50px;"></td>
      <td>{{ $i->name }}</td>
      <td>{{ $i->dsg }}</td>
      <td><a href="/admin/updateteam/{{ $i->id }}">Edit</a></td>
      <td><a href="/admin/deleteteam/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
