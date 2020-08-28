@extends('layouts.app')

@section('head')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pages.update', $page->name) }}" method="post">
                        @csrf
                        @method('put')
                        @foreach($page->pageProperties as $property)
                            @switch($property->input_type)
                                @case('image')
                                    <label for="{{ $property->name }}">
                                        {{ ucfirst($property->name) }}
                                    </label>
                                    <input type="hidden" value="{{ $property->value }}">
                                    <input type="{{ $property->input_type }}"
                                           class="input-group {{ $property->name }}"
                                           id="{{ $property->name }}"
                                           name="{{ $property->name }}"
                                           src="{{ asset($property->value) }}">
                                @break
                                @case('text')
                                    <label for="{{ $property->name }}">
                                        {{ ucfirst($property->name) }}
                                    </label>
                                    <textarea
                                        class="input-group summernote-editor"
                                        id="{{ $property->name }}"
                                        name="{{ $property->name }}">
                                    {{ $property->value }}
                                    </textarea>
                                @break
                                @case('email')
                                    <label for="{{ $property->name }}">
                                        {{ ucfirst($property->name) }}
                                    </label>
                                    <input type="email"
                                           id="{{ $property->name }}"
                                           value="{{ $property->value }}"
                                           name="{{ $property->name }}">
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>
    <script>
        $(document).ready(function() {

            $('.summernote-editor').each((index, el) => {
                $(el).summernote();
            });
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
