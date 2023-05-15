<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Models\File;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('file.create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {
        $request->validated();

        $same = File::sameType($request->type);
        if ($same->count() >= 2) {
            $oldest = $same->oldest()->get()[0];
            Storage::delete($oldest->location);
            $oldest->delete();
        }

        $path = $request->file('file')->store('files');
        $data = [
            'title' => $request->title,
            'location' => $path,
            'type_id' => $request->type,
        ];

        File::create($data);

        return redirect('home');
    }

    public function download(File $file)
    {
        return response()->download(storage_path('app/'.$file->location));
    }

    public function delete(File $file)
    {

        Storage::delete($file->location);

        $file->delete();

        return redirect('home');
    }
}
