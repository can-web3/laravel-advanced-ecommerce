@extends('layouts.app')

@section('title', 'Giriş Yap')

@section('content')
    <main class="container">
        <div class="col-xl-4 col-lg-8 mx-auto my-5">
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="h5">Giriş Yap</h1>
                </div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        {{-- email --}}
                        @include('includes.input', [
                            'type' => 'email',
                            'title' => 'E-posta',
                            'name' => 'email'
                        ])

                        {{-- password --}}
                        @include('includes.input', [
                            'type' => 'password',
                            'title' => 'Parola',
                            'name' => 'password'
                        ])

                        {{-- remember_me --}}
                        @include('includes.checkbox', [
                            'title' => 'Beni Hatırla',
                            'name' => 'remember_me',
                            'required' => false
                        ])


                        @include('includes.form-submit', [
                            'title' => 'Giriş Yap'
                        ])
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
