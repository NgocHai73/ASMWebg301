@extends('user.layouts.master')
@section('content')
    <!-- Map Begin -->
    
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Thông tin</span>
                            <h2>Liên hệ với chúng tôi</h2>
                            <p>Như bạn có thể mong đợi về một công ty bắt đầu với tư cách là nhà thầu nội thất cao cấp, chúng tôi rất chú ý</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Hà Nội</h4>
                                <p>195 E Parker Square Dr, Parker, CO 801 <br />096-868-8888</p>
                            </li>
                            <li>
                                <h4>Hồ Chí Minh</h4>
                                <p>109 Avenue Léon, 63 Clermont-Ferrand <br />036-999-9999</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Họ và tên" name="name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email" name="email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Lời nhắn" name="message"></textarea>
                                    <button type="submit" class="site-btn">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
