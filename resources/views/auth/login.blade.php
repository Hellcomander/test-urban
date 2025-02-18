@extends('master')

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/authentication/auth_1.css') }}">
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="login-one">
        <div class="container-fluid login-one-container">
            <div class="p-30 h-100" >
                <div class="row main-login-one h-100" style=" display: flex;align-items: center;justify-content: center;">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-0">
                        <form class="form" method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="login-one-start">
                        <div class="row" style=" display: flex;align-items: center;justify-content: center;">
                            <div class="col-8">

                            </div>
                        </div>
                            <h6 class="mt-2 text-primary text-center font-20">{{__('Inicia sesión')}}</h6>
                            <div class="login-one-inputs mt-5">
                                <input type="text" placeholder="{{__('Usuario')}}" name="email"/>
                                <i class="las la-user-alt"></i>
                            </div>
                            <div class="login-one-inputs mt-3">
                                <input type="password" placeholder="{{__('Contraseña')}}" name="password"/>
                                <i class="las la-lock"></i>
                            </div>
                            <div class="login-one-inputs check mt-4">
                                {{--<input class="inp-cbx" id="cbx" type="checkbox" style="display: none">--}}
                                {{--<label class="cbx" for="cbx">--}}
                                {{--<span>--}}
                                    {{--<svg width="12px" height="10px" viewBox="0 0 12 10">--}}
                                        {{--<polyline points="1.5 6 4.5 9 10.5 1"></polyline>--}}
                                    {{--</svg>--}}
                                {{--</span>--}}
                                    {{--<span class="font-13 text-muted">{{__('Remember me ?')}}</span>--}}
                                {{--</label>--}}
                            </div>
                            <div class="login-one-inputs mt-4">
                                <button class="ripple-button ripple-button-primary btn-lg btn-login" type="submit">
                                    <div class="ripple-ripple js-ripple">
                                        <span class="ripple-ripple__circle"></span>
                                    </div>
                                    {{__('Inicia sesión')}}
                                </button>
                            </div>
                            <!--<div class="login-one-inputs mt-4 text-center font-12 strong">
                                <a href="{{url('/authentications/style1/forgot-password')}}" class="text-primary">{{__('Forgot your Password ?')}}</a>
                            </div>-->
                        </div>
                        </form>
                    </div>
                    <!--<div class="col-xl-8 col-lg-6 col-md-6 d-none d-md-block p-0">
                        <div class="slider-half">
                            <div class="slide-content">
                                <div class="top-sign-up ">
                                    <div class="about-comp text-white mt-2">{{__('Furet')}}</div>
                                    <div class="for-sign-up">
                                        {{--<p class="text-white font-12 mt-2 font-weight-300">{{__('Don\'t have an account ?')}}</p>--}}
                                        {{--<a href="{{url('/authentications/style1/signup')}}">{{__('Sign Up')}}</a>--}}
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('scripts')
<script>
    $(document).ready(() => {
        console.log('object');
    })

</script>
@endpush
