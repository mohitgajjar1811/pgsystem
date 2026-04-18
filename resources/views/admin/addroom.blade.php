@extends('layouts/admin')

@section('title', 'Add Room')

@section('content')
<div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ADD ROOM</h4>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" id="exampleInputName1" placeholder="Image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName2">Price</label>
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName3">Bed </label>
                        <input type="text" class="form-control" id="exampleInputName3" placeholder="bed" name="bed">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName3">Title </label>
                        <input type="text" class="form-control" id="exampleInputName4" placeholder="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName3">Detail </label>
                        <input type="text" class="form-control" id="exampleInputName5" placeholder="detail" name="detail">
                    </div>
                    <button type="submit" class="btn btn-warning mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
