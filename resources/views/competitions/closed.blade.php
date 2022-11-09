@extends('adminlte::page')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <h2 class="text-center">Closed Competitions</h2>

                            <div class="">
                                @foreach ($competitions as $comp)
                                    @if($comp->competition_status==3)
                                        <div class="mt-3">
                                            <h4>
                                                <a href="{{ route('competition.show', $comp->id) }}" role="button">{{ $comp->competition_title }}</a>
                                            </h4>
                                            <span>{{ $comp->competition_start }} - {{ $comp->competition_end }}</span><br>
                                        </div> 
                                    @endif
                                @endforeach 
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
