@extends('layouts.app')

@section('dashboard', 'active')

@section('content')
<div class="container shadow-lg">
    @livewire('dashboard')
</div>
@endsection
