<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class Download
{
    public function __construct()
    {
        //
    }

    public function zip($files, $archiveName)
    {
        $zip = new \ZipArchive();
        $zipFilename = $archiveName.'.zip';
        $zip->open($zipFilename, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        foreach ($files as $file) {
            if (Storage::exists($file->location)) {
                $zip->addFile(storage_path('app/'.$file->location), 'new_folder/'.basename($file->location));
            }
        }
        $zip->close();

        return $zipFilename;
    }
}
