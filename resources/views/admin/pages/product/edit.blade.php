@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/product/index.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="h3 mb-2 text-gray-800">{{ $product->name }}</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Form chỉnh sửa thông tin</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                            @error('price')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                

                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea type="text" class="form-control" name="description">{{$product->description}}</textarea>
                </div>

                <div class="form-group">
                    <label>Thuộc danh mục</label>
                    <select name="category_ids[]" id="categories-product" class="form-control" data-live-search="true" multiple>
                        @php
                            $categoryIds = $product->categories->pluck('id')->toArray();
                        @endphp
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if(in_array((int)$category->id, $categoryIds)) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="d-block">Thumbnail</label>
                    <div class="preview-thumbnail">
                        <input type="file" name="image"/>
                        <img src="{{ get_image_product($product->thumbnail) }}" alt="thumbnail">
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
                            @foreach($product->images as $image)
                                <div class="col-sm-3 col-sx-3 col-3 col-lg-3 wrapper-image">
                                    <button class="remove-image edit" type="button" data-image-id="{{ $image->id }}">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                    <img src="{{asset('uploads/'.$image->path)}}" class="images-product" alt="image des">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <input type="hidden" name="image-multiple" value="[]">
                <input type="hidden" name="image-id" value="[]">

                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('js/admin/product/product.js') }}"></script>
@endpush
