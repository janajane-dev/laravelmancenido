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

        return view('songs.index', [
            'songs' => $songs,
            'q' => $request->query('q', ''),
            'sort' => $request->query('sort', 'latest'),
        ]);
    }

    public function show(Song $song)
    {
        return view('songs.show', ['song' => $song]);
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(StoreSongRequest $request)
    {
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
        $song->update(['is_favorite' => ! $song->is_favorite]);

        return back()->with('success', $song->is_favorite
            ? 'Added to favorites.'
            : 'Removed from favorites.');
    }

    public function destroy(Song $song)
    {
        $this->authorize('delete', $song);

        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song deleted.');
    }
}