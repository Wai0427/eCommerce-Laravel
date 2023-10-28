<!-- extends pages layout blade file on this example page blade file-->
@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    content here...
@endsection


