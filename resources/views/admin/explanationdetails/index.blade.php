@extends('layouts.app');

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Explanation Detail
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Sura Text ID</th>
                    <th>Explanation Detail</th>
                    <th>Created By</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if($explanationdetails->count()>0)
                        @foreach($explanationdetails as $explanationdetail)
                        <tr>
                            <td>{{ $explanationdetail->sura_text_id }}</td>
                            <td>{{ $explanationdetail->getExcerpt($explanationdetail->explanation_detail) }}</td>
                            <td>{{ $explanationdetail->userCreated()->name }}</td>
                            
                            <td>
                                <a href="{{ route('explanationdetail.edit', ['id'=>$explanationdetail->id]) }}" class="btn btn-s btn-info">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('explanationdetail.delete', ['id'=>$explanationdetail->id]) }}" class="btn btn-s btn-danger">
                                    Trash
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="6" class="text-center">No Explanation Detail</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop