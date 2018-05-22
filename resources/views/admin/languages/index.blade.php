@extends('layouts.app');

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Languages
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Language Name</th>
                    <th>Translator</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if($languages->count()>0)
                        @foreach($languages as $language)
                        <tr>
                            <td>{{ $language->language }}</td>
                            <td>{{ $language->translator }}</td>
                            <td>
                                <a href="{{ route('language.edit', ['id'=>$language->id]) }}" class="btn btn-s btn-info">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('language.delete', ['id'=>$language->id]) }}" class="btn btn-s btn-danger">
                                    Trash
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No Language</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop