<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index(Request $request)
    {
        $songs = Song::search($request->query('q'))
            ->sort($request->query('sort'))
            ->get();

        $favoriteSongIds = auth()->check()
            ? auth()->user()->favorites()->pluck('songs.id')->toArray()
            : [];

        return view('songs.index', [
            'songs' => $songs,
            'q' => $request->query('q', ''),
            'sort' => $request->query('sort', 'latest'),
            'favoriteSongIds' => $favoriteSongIds,
        ]);
    }

    public function show(Song $song)
    {
        $isFavorited = auth()->check()
            ? auth()->user()->favorites()->where('song_id', $song->id)->exists()
            : false;

        return view('songs.show', [
            'song' => $song,
            'isFavorited' => $isFavorited,
        ]);
    }

    public function create()
    {
        $this->authorize('create', Song::class);

        return view('songs.create');
    }

    public function store(StoreSongRequest $request)
    {
        $this->authorize('create', Song::class);

        $song = $request->user()->songs()->create($request->validated());

        return redirect()->route('songs.show', $song)->with('success', 'Song added.');
    }

    public function edit(Song $song)
    {
        $this->authorize('update', $song);

        return view('songs.edit', ['song' => $song]);
    }

    public function update(UpdateSongRequest $request, Song $song)
    {
        $this->authorize('update', $song);

        $song->update($request->validated());

        return redirect()->route('songs.show', $song)->with('success', 'Song updated.');
    }

    public function favorite(Song $song)
    {
        $user = auth()->user();

        if ($user->favorites()->where('song_id', $song->id)->exists()) {
            $user->favorites()->detach($song);
            $message = 'Removed from favorites.';
        } else {
            $user->favorites()->attach($song);
            $message = 'Added to favorites.';
        }

        return back()->with('success', $message);
    }

    public function destroy(Song $song)
    {
        $this->authorize('delete', $song);

        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song deleted.');
    }
}