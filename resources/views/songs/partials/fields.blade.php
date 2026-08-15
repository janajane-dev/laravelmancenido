@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="field">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', $song->title ?? '') }}">
</div>

<div class="field">
    <label for="artist">Artist</label>
    <input type="text" name="artist" id="artist" value="{{ old('artist', $song->artist ?? 'fitterkarma') }}">
</div>

<div class="field">
    <label for="lyrics">Lyrics</label>
    <textarea name="lyrics" id="lyrics" rows="12">{{ old('lyrics', $song->lyrics ?? '') }}</textarea>
</div>
