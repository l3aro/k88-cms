@extends('client.layouts.app', ['activePage' => 'home', 'title' => 'Hoàn thành'])
@section('content')
<div class="colorlib-shop">
    @if (session()->has('order'))
    @php($order = session()->get('order'))
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 col-md-offset-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Giỏ hàng</h3>
                    </div>
                    <div class="process text-center active">
                        <p><span>02</span></p>
                        <h3>Thanh toán</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>03</span></p>
                        <h3>Hoàn tất thanh toán</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <span class="icon"><i class="icon-shopping-cart"></i></span>
                <h2>Cảm ơn bạn đã mua hàng, Đơn hàng của bạn đã đặt thành công</h2>
                <p>
                    <a href="index.html" class="btn btn-primary">Trang chủ</a>
                    <a href="shop.html" class="btn btn-primary btn-outline">Tiếp tục mua sắm</a>
                </p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col-md-4">
                <h3 class="billing-title mt-20 pl-15">Thông tin đơn hàng</h3>
                <table class="order-rable">
                    <tbody>
                        <tr>
                            <td>Đơn hàng số</td>
                            <td>: {{ $order->id }}</td>
                        </tr>
                        <tr>
                            <td>Ngày mua</td>
                            <td>: {{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Tổng tiền</td>
                            <td>:{{ number_format(session()->get('cartTotal')) }} ₫</td>
                        </tr>
                        <tr>
                            <td>Phương thức thanh toán</td>
                            <td>: Nhận tiền mặt</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h3 class="billing-title mt-20 pl-15">Địa chỉ thanh toán</h3>
                <table class="order-rable">
                    <tbody>
                        <tr>
                            <td>Họ Tên</td>
                            <td>: {{ $order->name }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>: {{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>: {{ $order->address }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h3 class="billing-title mt-20 pl-15">Địa chỉ giao hàng</h3>
                <table class="order-rable">
                    <tbody>
                        <tr>
                            <td>Họ Tên</td>
                            <td>: {{ $order->name }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>: {{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>: {{ $order->address }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="billing-form">
            <div class="row">
                <div class="col-12">
                    <div class="order-wrapper mt-50">
                        <h3 class="billing-title mb-10">Hóa đơn</h3>
                        <div class="order-list">
                            <div class="list-row d-flex justify-content-between">
                                <div class="col-md-4">SẢN PHẨM</div>

                                <div class="col-md-4 offset-md-4 text-right">TỔNG CỘNG</div>
                            </div>
                            @forelse ($order->orderDetails()->get() as $item)
                            <div class="list-row d-flex justify-content-between">
                                <div class="col-md-4">{{ $item->product()->first()->name }}</div>
                                <div class="col-md-4 text-right">x {{ $item->quantity }}</div>
                                <div class="col-md-4 text-right">{{ number_format($item->quantity * $item->price) }} ₫</div>

                            </div>
                            @empty

                            @endforelse
                            <div class="list-row border-bottom-0 d-flex justify-content-between">
                                <div class="col-md-4">
                                    <h6>Tổng</h6>
                                </div>
                                <div class="col-md-4 offset-md-4 text-right">{{ number_format(session()->get('cartTotal')) }} ₫</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
