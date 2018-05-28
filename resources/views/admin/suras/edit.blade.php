@extends('layouts.app');

@section('content')

    @include('admin.includes.errors');

    <div class="panel panel-default">
        <div class="panel-heading">
            Update Sura: {{ $sura->sura_title_text }}
        </div>
        <div class="panel-body">
            <form action="{{ route('sura.update', ['id'=>$sura->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Sura Number</label>
                    <input type="text" name="sura_number" value="{{ $sura->sura_number }}"  class="form-contrl">
                </div>
                
                <div class="form-group">
                    <label for="language">Select a Language</label>
                    <select name="language_id" id="language" class="form-control">
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}"
                                @if($sura->language_id == $language->id)
                                    selected
                                @endif
                            >{{ $language->language }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Sura Title</label>
                    <input type="text" name="sura_title_text" value="{{ $sura->sura_title_text }}"  class="form-contrl">
                </div>

                <div class="form-group">
                    <label for="sura_note">Notes</label>
                    <textarea name="sura_note" id="sura_note" cols="5" rows="5" class="form-control">{{ $sura->sura_note }}</textarea>
                </div>
   
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Sura</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop