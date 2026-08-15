<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $title ?? 'fitterkarma' }}</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

body{
    font-family:'Poppins',sans-serif;
    background:#000;
    color:#fff;
    min-height:100vh;
    overflow-x:hidden;
    padding-top:120px;
}

body::before{
    content:"";
    position:fixed;
    inset:0;
    background:
        radial-gradient(circle at top,#ffffff10 0%,transparent 45%),
        radial-gradient(circle at bottom,#ffffff08 0%,transparent 40%);
    animation:glow 8s ease-in-out infinite alternate;
    pointer-events:none;
    z-index:-1;
}

@keyframes glow{
    from{
        transform:scale(1);
        opacity:.4;
    }
    to{
        transform:scale(1.1);
        opacity:.8;
    }
}

.navbar{
    position:fixed;
    top:25px;
    left:50%;
    transform:translateX(-50%);
    display:flex;
    gap:18px;
    padding:12px 18px;
    background:rgba(15,15,15,.85);
    backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:999px;
    box-shadow:0 10px 30px rgba(0,0,0,.5);
    z-index:999;
}

.navbar a{
    color:#d8d8d8;
    text-decoration:none;
    padding:10px 18px;
    border-radius:999px;
    transition:.3s;
}

.navbar a:hover{
    background:#fff;
    color:#000;
}

.container{
    width:90%;
    max-width:900px;
    margin:0 auto 50px;
}

.card{
    background:#0d0d0d;
    border:2px solid #fff;
    border-radius:20px;
    padding:45px;
    box-shadow:
        0 0 25px rgba(255,255,255,.12),
        0 0 70px rgba(255,255,255,.05);
}

.footer{
    margin-top:35px;
    text-align:center;
    color:#888;
    font-size:13px;
}

@media(max-width:600px){

    body{
        padding-top:95px;
    }

    .navbar{
        width:90%;
        justify-content:center;
        gap:8px;
        padding:10px;
    }

    .navbar a{
        padding:8px 14px;
        font-size:14px;
    }

    .card{
        padding:28px;
    }

}

</style>

</head>
<body>

<nav class="navbar">
    <a href="/">Songs</a>
    <a href="{{ route('songs.create') }}">Add Song</a>
    <a href="/about">About</a>
    <a href="/contact">Contact</a>
</nav>

<div class="container">
    {{ $slot }}
</div>

</body>
</html>