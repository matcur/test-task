@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card card-body">
                <plant-search :plants="{{ json_encode($plants) }}"/>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img-slider :images="{{ json_encode($page->sliderImages->pluck('value')) }}"
                                    app-url="{{ config('app.url') }}"/>
                    </div>
                    <div class="row">
                        {!! $page->main_content !!}
                    </div>
                    @if(auth()->check())
                        <a href="{{ route('pages.edit', $page->name) }}" class="btn btn-primary">
                            Редактировать страницу
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
