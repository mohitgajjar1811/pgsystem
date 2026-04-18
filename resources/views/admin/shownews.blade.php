@extends('layouts/admin')

@section('title', 'Show News')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">EMAIL</th>

    </tr>
  </thead>
  <tbody>
  @foreach($data10 as $i)
    <tr>
      <td>{{ $i->email }}</td>

<!--      <td><a href="/admin/deletenews/{{ $i->id }}">Edit</a></td>-->
      <td><a href="/admin/deletenews/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
