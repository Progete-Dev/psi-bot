@extends('layouts.app')
@section('content')
<div id="app">
    <div>
    <calendario-psi :date="new Date()"/>
    </div>
</div>
@endsection