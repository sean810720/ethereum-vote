@extends('template.bootstrap.app')
@section('title', $title)
@section('content')
<div id="app">
    <vote/>
</div>
@endsection

@section('style')
@endsection

@section('script')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
