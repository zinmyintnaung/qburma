@extends('layouts.app');

@section('content')

    @include('admin.includes.errors');

    <div class="panel panel-default">
        <div class="panel-heading">
            Add new explanation
        </div>
        <div class="panel-body">
            <form action="{{ route('explanationdetail.update', ['id'=>$explanationdetail->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="suratext">Select sura text</label>
                    <select name="sura_text_id" id="suratext" class="form-control">
                        @foreach($suratexts as $suratext)
                            <option value="{{ $suratext->id }}"
                            @if($suratext->id == $explanationdetail->sura_text_id)
                                selected
                            @endif
                            >{{ $suratext->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Explanation Detail</label>
                    <textarea name="explanation_detail" id="explanation_detail" cols="5" rows="5" class="form-control">{{ $explanationdetail->explanation_detail }}</textarea>
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create Explanation Detail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop