@extends('adminlte::page')

@section('content')
<div class="container pt-4 px-0">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h2>Pictures</h2>

                            <div class="row justify-content-center">
                                @foreach ($pictures as $img)
                                    <div class="col-md-4">
                                        <img data-toggle="modal" data-target="#picDetail-{{ $img->id }}" src="{{ asset('storage/'.$img->pic_image) }}" class="w-75">
                                        <image-modal :pictures="{{ $img }}" :competitions="{{ $competitions }}"></image-modal>
                                    </div>
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

