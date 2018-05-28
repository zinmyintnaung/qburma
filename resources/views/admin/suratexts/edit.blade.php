@extends('layouts.app');

@section('content')

    @include('admin.includes.errors');

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit sura text
        </div>
        <div class="panel-body">
            <form action="{{ route('suratext.update', ['id'=>$suratext->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="language">Select a Language</label>
                    <select name="language_id" id="language" class="form-control">
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}"
                            @if($suratext->sura->language->id == $language->id)
                                selected
                            @endif
                            >{{ $language->language }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sura">Select a Sura></label>
                    <select name="sura_id" id="sura" class="form-control">
                        @foreach($suras as $sura)
                            <option value="{{ $sura->id }}"
                            @if( $sura->id == $suratext->sura->id)
                                selected
                            @endif
                            >{{ $sura->sura_title_text }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Verse Number</label>
                    <input type="text" name="verse_id" value="{{ $suratext->verse_id }}" class="form-contrl">
                </div>

                <div class="form-group">
                    <label for="ayah">Body Text (Ayah)</label>
                    <textarea name="ayah" id="ayah" cols="5" rows="5" class="form-control">{{ $suratext->ayah }}</textarea>
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Sura Text</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop