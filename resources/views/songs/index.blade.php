<x-layout>

    <x-card id="songs">

        <div class="header-row">
            <h1>SONGS</h1>
            <a href="{{ route('songs.create') }}" class="btn">+ Add Song</a>
        </div>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('songs.index') }}" method="GET" class="filters">
            <input
                type="text"
                name="q"
                value="{{ $q }}"
                placeholder="Search title or artist..."
                class="input input-bordered"
            >

            <select name="sort" class="select select-bordered" onchange="this.form.submit()">
                <option value="latest" @selected($sort === 'latest')>Newest first</option>
                <option value="oldest" @selected($sort === 'oldest')>Oldest first</option>
                <option value="title" @selected($sort === 'title')>Title A-Z</option>
                <option value="artist" @selected($sort === 'artist')>Artist A-Z</option>
            </select>

            <button type="submit" class="btn btn-sm">Filter</button>

            @if ($q || $sort !== 'latest')
                <a href="{{ route('songs.index') }}" class="clear-link">Clear</a>
            @endif
        </form>

        @forelse ($songs as $song)
            <div class="song-row">
                <form action="{{ route('songs.favorite', $song) }}" method="POST" class="fav-form">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="fav-btn" title="{{ $song->is_favorite ? 'Unfavorite' : 'Favorite' }}">
                        {{ $song->is_favorite ? '★' : '☆' }}
                    </button>
                </form>

                <a href="{{ route('songs.show', $song) }}" class="song-title">{{ $song->title }}</a>
                <span class="song-artist">{{ $song->artist }}</span>
            </div>
        @empty
            <p class="empty">
                @if ($q)
                    No songs match "{{ $q }}".
                @else
                    No songs yet. Add your first one!
                @endif
            </p>
        @endforelse

    </x-card>

</x-layout>

<style>
.header-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
    flex-wrap:wrap;
    gap:15px;
}

h1{
    letter-spacing:6px;
    font-size:2rem;
}

.btn{
    display:inline-block;
    padding:10px 20px;
    background:#fff;
    color:#000;
    text-decoration:none;
    border-radius:999px;
    font-size:14px;
    transition:.3s;
    border:none;
    cursor:pointer;
}

.btn:hover{
    background:#ccc;
}

.success{
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.2);
    padding:12px 18px;
    border-radius:10px;
    margin-bottom:20px;
    font-size:14px;
}

.filters{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:25px;
    flex-wrap:wrap;
}

.filters input,
.filters select{
    background:#0d0d0d;
    border:1px solid rgba(255,255,255,.2);
    border-radius:8px;
    color:#fff;
    padding:8px 12px;
    font-family:inherit;
    font-size:14px;
}

.clear-link{
    color:#888;
    font-size:13px;
    text-decoration:underline;
}

.clear-link:hover{
    color:#fff;
}

.song-row{
    display:flex;
    align-items:center;
    gap:14px;
    padding:16px 0;
    border-top:1px solid rgba(255,255,255,.1);
}

.fav-form{
    display:inline;
}

.fav-btn{
    background:none;
    border:none;
    color:#ffd75e;
    font-size:20px;
    cursor:pointer;
    line-height:1;
    padding:0;
}

.fav-btn:hover{
    transform:scale(1.15);
}

.song-title{
    color:#fff;
    text-decoration:none;
    font-size:18px;
    letter-spacing:1px;
    flex:1;
}

.song-title:hover{
    color:#ccc;
}

.song-artist{
    color:#888;
    font-size:14px;
}

.empty{
    color:#888;
    text-align:center;
    padding:30px 0;
}
</style>