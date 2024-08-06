<?php


namespace App\Traits;


trait GeneralHelperTrait
{

    public function uploadImage($folder,$image){
        $image->store('/', $folder);
        $filename = $image->hashName();
        return  $filename;
    }
/*

public function uploadFile(Request $request, $fieldname = 'file', $directory = 'uploads', $disk = 'public')
{
    if ($request->hasFile($fieldname)) {
        $file = $request->file($fieldname);
        if ($file->isValid()) {
            // Store the file with a unique hashName
            $filename = $file->store($directory, $disk);
            return $filename; // Return the path to the stored file
        } else {
            flash('Invalid File!')->error()->important();
            return redirect()->back()->withInput();
        }
    }

    return null;
}

 * */
}
