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
                                <h2>Pictures</h2>
                            </div>
                        </div>

                        <div class="row justify-content-center pt-3">
                            <div class="col-md-8">
                                <table class="table">
                                    <thead>
                                        <th>Title</th>
                                        <th>Upload date</th>
                                        <th>Competition</th>
                                        <th>User</th>
                                        <th>Disqualification</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($pictures as $p)
                                            @foreach ($p->competitions as $c)
                                                
                                                    
                                                <tr>
                                                    <td>{{ $p->pic_title }}</td>
                                                    <td>{{ $p->created_at }}</td>
                                                    <td>{{ $c->competition_title }}</td>
                                                    <td>{{ $p->user_id }}</td>
                                                    <td>
                                                        <disq-button :pictures="{{ $p }}" :competitions="{{ $c }}"></disq-button>
                                                    </td>
                                                </tr>
                                                    
                                                
                                            @endforeach
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
