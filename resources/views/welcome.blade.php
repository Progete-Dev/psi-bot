@extends('layouts.app')

@section('content')
<div id="app">
    <div class="container">
        <botman-tinker api-endpoint="/botman"></botman-tinker>
    </div>
    
</div>
@endsection


@push('body-script')

@endpush
    
