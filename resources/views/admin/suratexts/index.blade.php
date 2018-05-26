@extends('layouts.app');

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Sura Text
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Language</th>
                    <th>Sura Number</th>
                    <th>Verse Number</th>
                    <th>Body Text</th>
                    <th>Created By</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if($suratexts->count()>0)
                        @foreach($suratexts as $suratext)
                        <tr>
                            <td>{{ $suratext->sura->language->language }}</td>
                            <td>{{ $suratext->sura->sura_title_text }}</td>
                            <td>{{ $suratext->verse_id }}</td>
                            <td>{{ $suratext->ayah }}</td>
                            <td>{{ $suratext->userCreated()->name }}</td>
                            
                            <td>
                                -
                            </td>
                            <td>
                                -
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="6" class="text-center">No Sura Text</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop