@extends('adminlte::page')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            @if ($showAlert??false)
                                <div class="alert alert-success position-fixed alerts" role="alert">
                                    The upload has been succeeded!
                                </div>
                            @endif  
                        </div>
                        <div class="col-md-4">
                            <div class="float-right">
                                <a href="{{ route('home') }}" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2>Image upload</h2>
                            <form action="{{ route('picture.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group custom-file mt-4">
                                    <label for="pictures" class="col-form-label">Choose image</label>
                                    <input type="file" class="form-control-file" name="pic_image" id="pictures">
                                    @error('pic_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="pic_title">
                                    @error('pic_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control" name="pic_description"></textarea>
                                    @error('pic_description')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
