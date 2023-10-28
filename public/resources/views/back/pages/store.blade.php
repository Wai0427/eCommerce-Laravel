@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'MyStore')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                    <h4>Tabs</h4>
            </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            MyStore
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
<div class="pd-20 card-box mb-4">
    @livewire('my-store')
</div>

@endsection