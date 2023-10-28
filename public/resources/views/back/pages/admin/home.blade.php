<!-- extends pages layout blade file on this home page blade file-->
@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    
<div class="pd-20 card-box mb-4">
    @livewire('home')
</div>
@endsection


