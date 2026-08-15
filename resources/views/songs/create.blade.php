<x-layout>

    <x-card id="song-form">

        <h1>ADD SONG</h1>

        <form action="{{ route('songs.store') }}" method="POST">
            @csrf
            @include('songs.partials.fields')

            <button type="submit" class="btn">Save Song</button>
        </form>

    </x-card>

</x-layout>

@include('songs.partials.form-style')
