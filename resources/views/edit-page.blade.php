@extends('layouts.app')

@section('head')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">`
            <div class="card card-body">
                <plant-menu :plants="{{ json_encode($plants) }}"
                            :can-remove="true"></plant-menu>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pages.update', $page->name) }}" id="page-edit-form" method="post">
                        @csrf
                        @method('put')
                        <div class="file-uploader">
                            <file-upload :images="{{ json_encode($page->sliderImages->pluck('value')) }}"
                                         input-class-name="slider_image[]"/>
                        </div>
                        @foreach($page->pageProperties as $property)
                            @switch($property->type)
                                @case('image')
                                    <div class="form-group">
                                        <file-upload :images="{{ json_encode([$property->value]) }}"
                                                     input-class-name="{{ $property->name }}"/>
                                    </div>
                                @break
                                @case('text')
                                    <div class="form-group">
                                        <label for="{{ $property->name }}">
                                            {{ ucfirst($property->name) }}
                                        </label>
                                        <textarea
                                            class="input-group summernote-editor"
                                            id="{{ $property->name }}"
                                            name="{{ $property->name }}">
                                        {{ $property->value }}
                                        </textarea>
                                    </div>
                                @break
                                @case('email')
                                    <div class="form-group">
                                        <label for="{{ $property->name }}">
                                            {{ ucfirst($property->name) }}
                                        </label>
                                        <input type="email"
                                               id="{{ $property->name }}"
                                               value="{{ $property->value }}"
                                               name="{{ $property->name }}">
                                    </div>
                                @break
                            @endswitch
                        @endforeach
                        <button class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js" defer></script>
    <script>
        $(document).ready(function() {
            $('.summernote-editor').each((index, el) => {
                $(el).summernote();
            });

            $('textarea#files').remove();
        });

        function sendFile(file, el) {
            var  data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function(url2) {
                    el.summernote('insertImage', url2);
                }
            });
        }
    </script>
@endsection
