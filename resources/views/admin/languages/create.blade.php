@extends('layouts.app');

@section('content')

    @include('admin.includes.errors');

    <div class="panel panel-default">
        <div class="panel-heading">
            Add new language
        </div>
        <div class="panel-body">
            <form action="{{ route('language.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Language Name</label>
                    <input type="text" name="language" class="form-contrl">
                </div>

                <div class="form-group">
                    <label for="name">Translator </label>
                    <input type="text" name="translator" class="form-contrl">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create Language</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop