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
                                    The competition create has been succeeded!
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
                            <h2>Create competition</h2>
                            <form action="{{ route('competition.store') }}" method="POST">
                                @csrf
                                <div class="form-group mt-4">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="competition_title">
                                    @error('competition_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="">From</label>
                                    <input type="date" class="form-control" name="competition_start">
                                    @error('competititon_start')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror

                                    <label for="">To</label>
                                    <input type="date" class="form-control" name="competition_end">
                                    @error('competition_end')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control" name="competition_description"></textarea>
                                    @error('competition_description')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
