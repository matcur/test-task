@extends('layouts.app')

@section('head')
    <!-- summernote редактор -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('favicon.ico') }}" alt="" class="logo">
                    </div>
                    <div class="card-body">
                        <form action="">
                            <input type="file"
                                   class="input-group"
                                   name="logo"
                                   disabled>
                            <img src="{{ $homePageInfo->logo_path }}" alt="">
                            <label for="logo_path">Название страницы</label>
                            <input type="text"
                                   class="input-group"
                                   id="logo_path"
                                   name="logo_path"
                                   value="{{ $homePageInfo->page_name }}">
                            <label for="logo_path">Заголовок</label>
                            <input type="text"
                                   class="input-group"
                                   id="title"
                                   name="title"
                                   value="{{ $homePageInfo->title }}">
                            <label for="main_content">Основной контент</label>
                            <input type="text"
                                   class="input-group"
                                   id="main_content"
                                   name="main_content"
                                   value="{{ $homePageInfo->main_content }}">
                            <label for="email">Заголовок</label>
                            <input type="email"
                                   class="input-group"
                                   id="email"
                                   name="email"
                                   value="{{ $homePageInfo->email }}">
                            <label for="main_content">Контент подвала</label>
                            <input type="text"
                                   class="input-group"
                                   id="main_content"
                                   name="main_content"
                                   value="{{ $homePageInfo->footer_content }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
