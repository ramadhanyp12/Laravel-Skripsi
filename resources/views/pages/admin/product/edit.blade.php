@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <!--SECTION CONTENT-->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Produk</h2>
                <p class="dashboard-subtitle">
                  Edit "{{ $item->name }}" Product
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                      <div class="card-body">
                        <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="name" id="" class="form-control" value="{{ $item->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Kategori Produk</label>
                                    <select name="categories_id" id="" class="form-control">
                                      <option value="{{ $item->categories_id }}">{{ $item->category->name }}</option>
                                      @foreach ($categories  as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Harga Brang</label>
                                        <input type="number" name="price" id="" class="form-control" value="{{ $item->price }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input type="number" name="stock" id="" class="form-control" value="{{ $item->stock }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi Barang</label>
                                        <textarea name="description" id="editor" >{!! $item->description !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success px-5 ">
                                        Save Now
                                    </button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('editor');
    </script>
@endpush