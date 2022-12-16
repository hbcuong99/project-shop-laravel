@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name</th>
            <th>Active</th>
            <th>Updated</th>
            <th style="width: 100px">&nbsp</th>
        </tr>
        </thead>
        <tbody>
        {!! \App\Helpers\Helper::post($posts) !!}
        </tbody>
    </table>
@endsection
