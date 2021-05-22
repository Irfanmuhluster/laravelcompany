@extends('admin::layout')

@section('content')

<div class="row mt-5 min-h-title">
    <div class="padding-lr">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb hidden-xs">
                <li class="breadcrumb-item"><a href="admin.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="admin-agenda.html">Produk</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between justify-content-md-start h-100">
            <h1> Produk </h1>
            <a href="{{ route('admin.produk.create') }}" class="btn ml-4 mt-1 mb-4 min-w-auto btn-success">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div> 

        @if (session()->has('success'))
            <x-alert type="success" /> 
        @endif

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Produk" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i class="fas fa-search mx-2"></i></span>
            </div>
        </div>
        <table class="table shadow thspan-6" id="tableList">
            <thead class="thead-light">
                <tr>
                    <th scope="col" width="7%">No</th>
                    <th scope="col"><span class="d-none d-md-block">Nama Produk</span></th>
                    <th scope="col"><span class="d-none d-md-block">Kategori</span></th>
                    <th scope="col"><span class="d-none d-md-block">Aksi</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproduk as $item)
                <tr>
                    <td scope="row">
                        {{ $rank++ }}
                    </td>
                    <td>
                        {{ $item->product_name }}
                    </td>
                    <td>
                        {{ $item->category->category_name }}
                    </td>
                    <td>
                    <a href="{{  route('admin.produk.edit', $item->id) }}" class="btn btn-sm btn-primary pull-right edit">
                        <i class="fas fa-edit"></i> Ubah
                    </a>
                    <div class="btn btn-sm btn-danger pull-right delete" title="Hapus" data-toggle="modal" data-target="#deleteMenu-{{ $item->id }}" data-id="{{ $item->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </div>

                    <div class="modal fade scale" id="deleteMenu-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteMenuTitle" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">Hapus Produk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">    
                                    <form id="role-menu-form-delete" action="{{ route('admin.produk.delete', $item->id) }}" spellcheck="false"  method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="mb-4 pb-2">Apa Anda yakin ingin menghapus produk ini ?</div>
                                        <div id="role-menu-form-delete-errors"></div>
                                        <button type="submit" class="btn btn-danger mb-2">Hapus</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <!--Pagination -->
            {{  $dataproduk->links() }}
          
            <!--/Pagination -->
        </div>
    </div>
</div>
@endsection