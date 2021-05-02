@extends('public::layout')

@section('title', " |  Pilih Contoh Desain")

@section('description', " |  Pilih Contoh Desain Idcodewebs")

@section('content')
<div class="container padding-top-bottom-3">
    <div class="heading-2"><h1>Pilih Contoh Desain</h1></div>
    <div class="gallery">
        <div class="gallery-sidebar">
            <div class="card-body">    
                <div class="gallery-box-title">                                    
                    <h4>Pilih Kategori Desain</h4>
                </div>
                <div class="gallery-category">
                    <div class="item">
                        <a href="{{ route('public.product') }}">Semua Desain</a>
                    </div>
                    @foreach ($listcategory as $item)
                    <div class="item">
                        <a href="{{ route('public.product',['filter' => $item->id]) }}">{{ $item->category_name }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="gallery-content">
            <div class="product">
                @foreach ($listproduct as $item)
                    <div class="product-box" style="background-image: url('{{ $item->image  ? url("storage/media/product-r-{$item->image}") : '' }}'); background-size: 100% auto;">
                        <div class="product-box_title"><a href="{{ $item->url }}">{{ $item->product_name }}</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection