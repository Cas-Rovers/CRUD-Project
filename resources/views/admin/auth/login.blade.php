@extends('frontend.layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="p-10 flex flex-col w-xl border border-slate-100 rounded-lg shadow-2xl">
            <h2 class="text-2xl text-center">Login</h2>
            <form action="{{ route('login') }}" method="post" class="flex flex-col gap-3">
                @csrf
                <div class="flex flex-col">
                    <label for="email" class="font-medium">E-mail</label>
                    <input type="email" name="email" id="email" class="border border-slate-400 p-2 rounded-lg"
                           autocomplete="email" autofocus>
                </div>
                <div class="flex flex-col">
                    <label for="password" class="font-medium">Wachtwoord</label>
                    <input type="password" name="password" id="password" class="border border-slate-400 p-2 rounded-lg"
                           autocomplete="current-password">
                </div>
                <button type="submit" name="submit" id="submit"
                        class="p-3 bg-blue-500 rounded-xl cursor-pointer">Login
                </button>
            </form>
        </div>
    </div>
@endsection
