@extends('layouts.auth')

@section('content')
<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-6 text-center">
                    <img
                    src="/images/login-image.png"
                    alt=""
                    class="w-50 mb-4 mb-lg-none"
                    />
                </div>
                <div class="col-lg-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                    <h2>
                        Belanja kebutuhan utama, <br />
                        menjadi lebih mudah
                    </h2>
                    <form method="POST" action="{{ route('password.email') }}" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="email" type="email" class="form-control w-75">
                        </div>
                        <button
                            type="submit"
                            value="Request Password Reset"
                            class="btn btn-success btn-block w-75 mt-4"
                        >
                            Request Reset Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection