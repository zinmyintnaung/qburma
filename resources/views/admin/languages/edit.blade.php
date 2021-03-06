@extends('layouts.app');

@section('content')

    @include('admin.includes.errors');

    <div class="panel panel-default">
        <div class="panel-heading">
            Update language: {{ $language->language }}
        </div>
        <div class="panel-body">
            <form action="{{ route('language.update', ['id'=>$language->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Language Name</label>
                    <input type="text" name="language" value="{{ $language->language }}" class="form-contrl">
                </div>

                <div class="form-group">
                    <label for="name">Translator </label>
                    <input type="text" name="translator" value="{{ $language->translator }}" class="form-contrl">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ $language->description }}</textarea>
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Language</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop