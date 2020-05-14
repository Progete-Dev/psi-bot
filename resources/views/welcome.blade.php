@extends('layouts.app')

@section('content')
    <div class="container">
        <botman-tinker api-endpoint="/botman"></botman-tinker>
    </div>
    
@endsection


@push('body-script')

@endpush
    
