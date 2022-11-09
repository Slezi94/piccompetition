@extends('adminlte::page')

@section('content')
<div class="container pt-4 px-0">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-end">
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-warning">Back</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <h2>{{ $competitions->competition_title }}</h2>

                            @if ($competitions->competition_status == 1 || $competitions->competition_status == 2)
                                <h4 class="pt-2">{{ $competitions->competition_start }}-{{ $competitions->competition_end }}</h4>
                                <h4 class="pt-2">{{ $competitions->competition_description }}</h4>
                            @elseif ($competitions->competition_status == 3)
                                <h4 class="pt-2">Winner: {{ $winner }}</h4>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($pictures as $img)
                            <div class="col-md-4">
                                <img data-toggle="modal" data-target="#picDetail-{{ $img->id }}" src="{{ asset('storage/'.$img->pic_image) }}" class="w-75">
                                <competition-image-modal :voted="{{ $voted }}" :pictures="{{ $img }}"></competition-image-modal>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection