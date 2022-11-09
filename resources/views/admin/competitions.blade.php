@extends('adminlte::page')

@section('content')
    <div class="container pt-4 px-0">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-end">
                        <div class="row">
                            <div class="col-md-8">
                                @if ($showAlert??false)
                                    <div class="alert alert-success position-fixed alerts" role="alert">
                                        The action has been succeeded!
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
                                <h2>Competitions</h2>
                            </div>
                        </div>

                        <div class="row justify-content-center pt-3">
                            <div class="col-md-8">
                                <table class="table">
                                    <thead>
                                        <th>Title</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Delete</th>
                                        <th>Closing</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($competitions as $c)
                                            <tr>
                                                <td><a href="{{ route('competition.show', $c->id) }}" role="button">{{ $c->competition_title }}</a></td>
                                                <td>{{ $c->competition_start }}</td>
                                                <td>{{ $c->competition_end }}</td>
                                                <td><del-button :competitions="{{ $c }}"></del-button></td>
                                                <td><close-button :competitions="{{ $c }}"></close-button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
