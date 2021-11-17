@extends('layout.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{route('home.index')}}">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đăng ký</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="customer-register my-account">
                        <form method="post" class="register" action="">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng ký</h2>
                                <p class="form-row form-row-wide">
                                    <label for="name">Họ tên:<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="name" id="name" value="{{old('name')}}">
                                @error('name')
                                <div class="error-text">{{ $message }}</div>
                                @enderror
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Email:<span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" id="reg_email" value="{{old('email')}}">
                                @error('email')
                                <div class="error-text">{{ $message }}</div>
                                @enderror
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Mật khẩu: <span class="required">*</span></label>
                                    <input type="password" class="input-text" name="password" value="{{old('password')}}" id="reg_password">
                                @error('password')
                                <div class="error-text">{{ $message }}</div>
                                @enderror
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="cf_password">Nhập lại mật khẩu: <span class="required">*</span></label>
                                    <input type="password" class="input-text" name="cf_password" value="{{old('cf_password')}}" id="cf_password">
                                @error('cf_password')
                                <div class="error-text">{{ $message }}</div>
                                @enderror
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="phone">Số điện thoại:<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="phone" id="phone" value="{{old('phone')}}">
                                @error('phone')
                                <div class="error-text">{{ $message }}</div>
                                @enderror
                                </p>
                                <div style="left: -999em; position: absolute;">
                                    <label for="trap">Anti-spam</label>
                                    <input type="text" name="email_2" id="trap" tabindex="-1">
                                </div>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" name="register" value="Đăng ký">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
