@extends('layouts/admin')

@section('title', 'Add Team')

@section('content')
<div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ADD Team</h4>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" id="exampleInputName1" placeholder="Image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName2">Name</label>
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName3">Designation </label>
                        <input type="text" class="form-control" id="exampleInputName3" placeholder="dsg" name="dsg">
                    <button type="submit" class="btn btn-warning mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
