@extends('layouts.app')

@section('title', 'Kayıt Ol')

@section('content')
    <main class="container">
        <div class="col-xl-4 col-lg-8 mx-auto my-5">
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="h5">Kayıt Ol</h1>
                </div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        {{-- full_name --}}
                        @include('includes.input', [
                            'title' => 'Ad Soyad',
                            'name' => 'full_name'
                        ])

                        {{-- email --}}
                        @include('includes.input', [
                            'type' => 'email',
                            'title' => 'E-posta',
                            'name' => 'email'
                        ])

                        {{-- phone --}}
                        @include('includes.input', [
                            'title' => 'Telefon',
                            'name' => 'phone',
                            'required' => false
                        ])

                        {{-- password --}}
                        @include('includes.input', [
                            'type' => 'password',
                            'title' => 'Parola',
                            'name' => 'password'
                        ])

                        {{-- repassword --}}
                        @include('includes.input', [
                            'type' => 'password',
                            'title' => 'Parola (Tekrar)',
                            'name' => 'repassword'
                        ])

                        @include('includes.form-submit', [
                            'title' => 'Kayıt Ol'
                        ])
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
