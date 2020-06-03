@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('请确认你的邮箱地址') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('一个新的验证链接已经发送到您的电子邮件地址') }}
                        </div>
                    @endif

                    {{ __('在继续之前，请检查您的电子邮件的验证链接。') }}
                    {{ __(' 如果你没有收到邮件') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('单击此处请求另一个') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
