@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/product/index.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="h3 mb-2 text-gray-800">Thêm Sản Phẩm</h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-left"></i>
                Quay lại
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form điền thông tin</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="text" class="form-control" name="price">
                            @error('price')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
                
                
=======
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Giảm giá (%)</label>
                            <input type="text" class="form-control" name="discount">
                            @error('discount')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Thương hiệu</label>
                            <input type="text" class="form-control" name="brand">
                            @error('brand')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

>>>>>>> 5da5bf05f53759c6592816348dc7a509c3121d4e
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label>Thuộc danh mục</label>
                    <select name="category_ids[]" id="categories-product" class="form-control" data-live-search="true"
                        multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="d-block">Thumbnail</label>
<<<<<<< HEAD
                    <input type="file"   name="image" >
                </div>
                <button type="submit" class="btn btn-sm btn-primary"  >Thêm</button>
=======
                    <div class="preview-thumbnail">
                        <input type="file" name="image" />
                        <img src="{{ asset('uploads/default-product.png') }}" alt="thumbnail">
                    </div>
                </div>

                <div class="form-group">
                    <label class="d-block">Ảnh mô tả</label>
                    <div class="place-to-insert-images">
                        <div class="btn-add-image-mutiple btn btn-sm btn-success position-relative">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <input type="file" id="image-multiple" multiple data-route={{ route('admin.upload.store') }}/>
                        </div>
                        <div class="content-images row">

                        </div>
                    </div>
                </div>

                <input type="hidden" name="image-multiple" value="[]">

                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-sm btn-primary">Thêm</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-danger">Hủy</a>
                </div>
>>>>>>> 5da5bf05f53759c6592816348dc7a509c3121d4e
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('js/admin/product/product.js') }}"></script>
@endpush
