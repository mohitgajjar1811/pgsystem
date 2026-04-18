@extends('layouts/admin')

@section('title', 'Updateroom')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">ADD ROOM</h4>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Price</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="price" value="{{ $data->price }}" name="price">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Title</label>
                    <input type="text" class="form-control" id="exampleInputName4" placeholder="title" value="{{ $data->title }}" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Detail</label>
                    <input type="text" class="form-control" id="exampleInputName5" placeholder="detail" value="{{ $data->detail }}" name="detail">
                </div>
                <div class="form-group">
                    <label for="exampleInputName2">Bed</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="bed" value="{{ $data->bed }}" name="bed">
                </div>
                <div class="form-group">
                    <label for="exampleInputName3">Image</label>
                    <input type="file" class="form-control" id="exampleInputName3" placeholder="note" value="{{ asset('storage/' . $data->image) }}" name="image">
                </div>
                <div class="form-group">
                                        <label>File upload</label>
                                       <div class="input-group col-xs-12">
                                           @if($data.image)
                                           <img src="{{ asset('storage/' . $data->image) }}" alt="No image" height="100px" width="100px">
                                                @endif
                                            <input type="file" class="form-control file-upload-info" placeholder="Upload Image" name="image" onchange="displaySelectedImage(this);" accept="image/*">

<!--                                         <span class="input-group-append">-->
<!--                                            <button class="file-upload-browse btn btn-primary"-->
<!--                                                    type="button">Upload</button>-->
<!--                                         </span>-->
                                        </div>
                                  </div>
                <button type="submit" class="btn btn-primary mr-2 btn-orange">Update</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
