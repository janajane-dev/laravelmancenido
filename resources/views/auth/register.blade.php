<x-layout>

    <x-card>

        <h1>Create Account</h1>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="auth-form">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit" class="btn">Register</button>
        </form>

        <p class="switch-link">Already have an account? <a href="{{ route('login') }}">Log in</a></p>

    </x-card>

</x-layout>

<style>
h1{
    text-align:center;
    letter-spacing:4px;
    margin-bottom:25px;
}

.error-box{
    background:rgba(255,80,80,.08);
    border:1px solid rgba(255,80,80,.3);
    color:#ff8080;
    padding:14px 18px;
    border-radius:10px;
    margin-bottom:20px;
    font-size:14px;
}

.error-box ul{
    list-style:none;
}

.auth-form{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.auth-form label{
    font-size:13px;
    color:#bbb;
    letter-spacing:1px;
}

.auth-form input{
    background:#0d0d0d;
    border:1px solid rgba(255,255,255,.2);
    border-radius:8px;
    color:#fff;
    padding:10px 14px;
    font-family:inherit;
    font-size:14px;
}

.btn{
    margin-top:10px;
    padding:10px 20px;
    background:#fff;
    color:#000;
    text-decoration:none;
    border:none;
    border-radius:999px;
    font-size:14px;
    cursor:pointer;
    font-family:inherit;
    transition:.3s;
}

.btn:hover{
    background:#ccc;
}

.switch-link{
    text-align:center;
    margin-top:20px;
    color:#888;
    font-size:14px;
}

.switch-link a{
    color:#fff;
}
</style>