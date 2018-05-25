@extends('layouts.app');

@section('content')

    @include('admin.includes.errors');

    <div class="panel panel-default">
        <div class="panel-heading">
            Add new sura
        </div>
        <div class="panel-body">
            <form action="{{ route('sura.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Sura Number</label>
                    <input type="text" name="sura_number" class="form-contrl">
                </div>
                <div class="form-group">
                    <label for="language">Select a Language></label>
                    <select name="language_id" id="language" class="form-control">
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->language }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Sura Title</label>
                    <input type="text" name="sura_title_text" class="form-contrl">
                </div>

                <div class="form-group">
                    <label for="description">Notes</label>
                    <textarea name="sura_note" id="sura_note" cols="5" rows="5" class="form-control"></textarea>
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create Sura</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop