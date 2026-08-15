<x-layout>

    <x-card id="song-form">

        <h1>EDIT SONG</h1>

        <form action="{{ route('songs.update', $song) }}" method="POST">
            @csrf
            @method('PUT')
            @include('songs.partials.fields', ['song' => $song])

            <button type="submit" class="btn">Update Song</button>
        </form>

    </x-card>

</x-layout>

@include('songs.partials.form-style')
