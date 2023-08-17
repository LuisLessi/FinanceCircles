@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection

@section('content-view')
<header>
    <h1>{{ $institution->name }}</h1>
</header>

@include('groups.list', ['group_list' => $institution->groups])
@endsection