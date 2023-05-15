<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeRequest;
use App\Models\File;
use App\Models\Type;
use App\Services\Download;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    public function create()
    {
        return view('type.create');
    }

    public function store(StoreTypeRequest $request)
    {
        Type::create($request->validated());

        return redirect('home');
    }

    public function download(Type $type)
    {
        $files = File::sameType($type->id)->get();

        $zipFilename = (new Download())->zip($files, $type->name);

        return response()->download($zipFilename);
    }

    public function delete(Type $type)
    {
        foreach ($type->files() as $file) {
            Storage::delete($file->location);
        }

        $type->delete();

        return redirect('home');
    }
}
