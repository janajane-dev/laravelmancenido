<x-layout>

    <x-card>

        <h1>Log In</h1>

        @if (session('success'))
            <div class="success-box">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="auth-form">
            @csrf

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label class="checkbox-label">
                <input type="checkbox" name="remember">
                Remember me
            </label>

            <button type="submit" class="btn">Log In</button>
        </form>

        <p class="switch-link">Don't have an account? <a href="{{ route('register') }}">Register</a></p>

    </x-card>

</x-layout>

<style>
h1{
    text-align:center;
    letter-spacing:4px;
    margin-bottom:25px;
}

.success-box{
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.2);
    padding:12px 18px;
    border-radius:10px;
    margin-bottom:20px;
    font-size:14px;
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

.auth-form input[type="email"],
.auth-form input[type="password"]{
    background:#0d0d0d;
    border:1px solid rgba(255,255,255,.2);
    border-radius:8px;
    color:#fff;
    padding:10px 14px;
    font-family:inherit;
    font-size:14px;
}

.checkbox-label{
    display:flex;
    align-items:center;
    gap:8px;
    flex-direction:row;
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