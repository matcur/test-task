@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        {!! $page->title !!}
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
