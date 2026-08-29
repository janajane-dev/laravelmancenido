<x-layout>

    <x-card id="song">

        <h1>{{ $song->title }}</h1>

        <div class="artist">
            by {{ $song->artist }}
        </div>

        <div class="lyrics">{{ $song->lyrics }}</div>

        <div class="actions">
            @auth
                <form action="{{ route('songs.favorite', $song) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn {{ $isFavorited ? 'btn-fav-active' : '' }}">
                        {{ $isFavorited ? '★ Favorited' : '☆ Favorite' }}
                    </button>
                </form>
            @endauth

            @can('update', $song)
                <a href="{{ route('songs.edit', $song) }}" class="btn">Edit</a>
            @endcan

            @can('delete', $song)
                <form action="{{ route('songs.destroy', $song) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this song?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endcan

            <a href="{{ route('songs.index') }}" class="btn btn-ghost">← Back to Songs</a>
        </div>

    </x-card>

</x-layout>

<style>
h1{
    text-align:center;
    font-size:3rem;
    letter-spacing:8px;
    margin-bottom:8px;
}

.artist{
    text-align:center;
    letter-spacing:5px;
    color:#bbb;
    margin-bottom:35px;
}

.lyrics{
    white-space:pre-line;
    text-align:center;
    line-height:2.1;
    font-size:18px;
    border-top:1px solid rgba(255,255,255,.15);
    padding-top:25px;
}

.actions{
    display:flex;
    justify-content:center;
    gap:12px;
    margin-top:35px;
    flex-wrap:wrap;
}

.btn{
    display:inline-block;
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

.btn-fav-active{
    background:#ffd75e;
    color:#000;
}

.btn-fav-active:hover{
    background:#ffe085;
}

.btn-danger{
    background:#3a1414;
    color:#ff8080;
    border:1px solid #5c1f1f;
}

.btn-danger:hover{
    background:#4a1a1a;
}

.btn-ghost{
    background:transparent;
    color:#bbb;
    border:1px solid rgba(255,255,255,.2);
}

.btn-ghost:hover{
    background:rgba(255,255,255,.08);
    color:#fff;
}
</style>