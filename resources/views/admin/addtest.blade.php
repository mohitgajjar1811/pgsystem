@extends('layouts/admin')

@section('title', 'Add Test')

@section('content')
<div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ADD TEST</h4>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Message</label>
                        <input type="text" class="form-control" id="exampleInputName4" placeholder="message" name="message">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName2">Designation</label>
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="designation" name="dsg">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName3">Image</label>
                        <input type="file" class="form-control" id="exampleInputName3" placeholder="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-warning mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
</div>
@endsection
