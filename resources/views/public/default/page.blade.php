@extends('public::layout')

@section('title', '| '. $pagedet->title)

@section('description', Str::words($pagedet->content, 5, ' ..'))

@section('content')
<div class="container padding-3">
    <ol class="breadcrumb padding-bottom-3">
        <li class="breadcrumb-item"><a href="//idcodewebs.com/">Home</a></li>
        <li class="breadcrumb-item"><a href="//">{{ $pagedet->title }}</a></li>                    
    </ol>
    <div class="heading"><h1>{{ $pagedet->title }}</h1></div>
    <div class="padding-3">
        {!! $pagedet->content !!}
    </div>
</div>
@endsection