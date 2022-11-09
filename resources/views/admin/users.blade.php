@extends('adminlte::page')

@section('content')
    <div class="container pt-4 px-0">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-end">
                        <div class="row">
                            <div class="col-md-8">
                                <ban-alert></ban-alert>
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
                                <h2>Users</h2>
                            </div>
                        </div>

                        <div class="row justify-content-center pt-3">
                            <div class="col-md-8">
                                
                                <user-list-component :users="{{ $users }}"></user-list-component>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
