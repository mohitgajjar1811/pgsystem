@extends('layouts/admin')

@section('title', 'Show Checkout')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Room Name</th>
      <th scope="col">Bed Number</th>
      <th scope="col">Bed Price</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data14 as $i)
    <tr>
      <th scope="row">{{ $i->roomname }}</th>
      <td>{{ $i->bed }}</td>
      <td>{{ $i->priceperb }}</td>
      <td>{{ $i->total }}</td>
<!--      <td><a href="/admin/updateroom/{{ $i->id }}">Update</a></td>-->
      <td><a href="/admin/deletecheckout/{{ $i->id }}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
