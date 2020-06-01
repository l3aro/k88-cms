@extends('client.layouts.app', ['activePage' => 'login', 'title' => 'Đăng nhập'])
@section('content')
<div id="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="contact-wrap">
                    <h3>Đăng nhập</h3>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email của bạn">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="subject">Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Đăng nhập" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="map" class="colorlib-map"></div>
@endsection
