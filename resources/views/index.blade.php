@extends('layouts.app')

@section('content')
    <div class="container" style="color:#000">
        <div class="row">
            <index-search></index-search>
            <index-banner></index-banner>
            <index-menu></index-menu>
            <index-list style="margin-top: 10px;"></index-list>
        </div>
    </div>
@endsection
