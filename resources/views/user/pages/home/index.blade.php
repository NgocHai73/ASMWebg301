@extends('user.layouts.master')
@section('content')

=======


    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter=".best-seller">Bán Chạy</li>
                        <li data-filter=".new-arrivals">Sản Phẩm Mới</li>
                        <li data-filter=".hot-sales">Hot Sales</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach ($productsBestSeller as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-seller">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ get_image_product($product->thumbnail) }}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/icon/cart.png') }}" alt=""></a></li>
                                <li><a href="{{ route('shop.detail', $product->slug) }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $product->name }}</h6>
                            <button class="add-cart" data-id="{{ $product->id }}" data-price="{{ $product->price }}">+ Thêm vào giỏ hàng</button>
                            <h5>{{ number_format($product->price). ' ₫' }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($productsNewArrivals as $productNew)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals" style="display: none">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ get_image_product($productNew->thumbnail) }}">
                                    <span class="label">New</span>
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/cart.png') }}" alt=""></a></li>
                                        <li><a href="{{ route('shop.detail', $productNew->slug) }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $productNew->name }}</h6>
                                    <button class="add-cart" data-id="{{ $productNew->id }}" data-price="{{ $productNew->price }}">+ Thêm vào giỏ hàng</button>
                                    <h5>{{ number_format($productNew->price) . ' ₫' }}</h5>
                                </div>
                            </div>
                        </div>
                @endforeach
                @foreach($productsHotSales as $productSale)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales" style="display: none">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ get_image_product($productSale->thumbnail) }}">
                                <span class="label">sale {{ $productSale->discount }} %</span>
                                <ul class="product__hover">
                                    <li><a href="#"><img src="{{ asset('img/icon/cart.png') }}" alt=""></a></li>
                                    <li><a href="{{ route('shop.detail', $productSale->slug) }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $productSale->name }}</h6>
                                <button class="add-cart" data-id="{{ $productSale->id }}" data-price="{{ $productSale->price }}">+ thêm vào giỏ hàng</button>
                                <h5>{{ get_price_sale($productSale->discount, $productSale->price) . ' ₫' }}</h5>
                            </div>
                        </div>
                    </div >
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->


@endsection

@push('js')
    <script>
        $('#btn-instagram').on('click', function (){
            window.open($(this).data('href'), '_blank')
        })
        if({{ session()->has('message-success') ? 'true' : 'false' }}) {
            Swal.fire({
                icon: 'success',
                text: '{{ session()->get('message-success') }}',
                timer: 1500,
                timerProgressBar: true,

            })
        } else if({{ session()->has('message-error') ? 'true' : 'false' }}) {
            Swal.fire({
                icon: 'success',
                text: '{{ session()->get('message-error') }}',
                timer: 1500,
                timerProgressBar: true,
            })
        }
    </script>
@endpush
