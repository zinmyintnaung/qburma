@extends('layouts.app');

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Suras
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Language</th>
                    <th>Sura Number</th>
                    <th>Sura Title</th>
                    <th>Created By</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if($suras->count()>0)
                        @foreach($suras as $sura)
                        <tr>
                            <td>{{ $sura->language_id }}</td>
                            <td>{{ $sura->sura_number }}</td>
                            <td>{{ $sura->sura_title_text }}</td>
                            <td>{{ $sura->userCreated()->name }}</td>
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
                            <th colspan="6" class="text-center">No Sura</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop