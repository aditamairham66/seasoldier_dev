<?php

namespace App\Helpers;

use Request;
use Image;

class Upload
{
    /**
     * @param $name
     * @param null $nameFormat
     * @param null $withpath
     * @return string|null
     */
    public static function uploadFileAllType($name, $nameFormat = null, $withpath = null)
    {
        if (Request::hasFile($name)) {
            $file = Request::file($name);
            $ext = strtolower($file->getClientOriginalExtension());
            $nameFile = strtolower($file->getClientOriginalName());
            if ($nameFormat == 'date') {
                // format time now
                $filename = md5(str_random(5) . microtime()) . '.' . $ext;
            }else{
                // format name file
                $filename = $nameFile;
            }

            if (!file_exists(storage_path('app/uploads'))) { //Verify if the directory exists
                mkdir(storage_path('app/uploads')); //create it if do not exists
            }

            if (!file_exists(storage_path('app/uploads/files'))) { //Verify if the directory exists
                mkdir(storage_path('app/uploads/files')); //create it if do not exists
            }

            if (!file_exists(storage_path('app/uploads/files/compressed'))) { //Verify if the directory exists
                mkdir(storage_path('app/uploads/files/compressed')); //create it if do not exists
            }

            if (!file_exists(storage_path('app/uploads/document'))) { //Verify if the directory exists
                mkdir(storage_path('app/uploads/document')); //create it if do not exists
            }

            if (in_array($ext, ['docx', 'pdf', 'ppt', 'pptx', 'xls', 'xlsx'])) {
                if ($file->move(storage_path('app/uploads/document/'), $filename)) {
                    if ($withpath === 'Yes') {
                        return 'uploads/document/'.$filename;
                    } else {
                        return $filename;
                    }
                }else{
                    return '';
                }
            }else if (in_array($ext, ['zip', 'tar', 'rar'])) {
                if ($file->move(storage_path('app/uploads/document/'), $filename)) {
                    if ($withpath === 'Yes') {
                        return 'uploads/document/'.$filename;
                    } else {
                        return $filename;
                    }
                }else{
                    return '';
                }
            }else{
                if ($file->move(storage_path('app/uploads/files'), $filename)) {
                    if (in_array($ext, ['png', 'jpg', 'jpeg'])) {
                        $destinationPath = storage_path('app/uploads/files/compressed/');
                        $img = Image::make(storage_path('app/uploads/files/' . $filename));
                        $img->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . $filename);

                        if ($withpath === 'Yes') {
                            return 'uploads/files/'.$filename;
                        } else {
                            return $filename;
                        }
                    } else {
                        return '';
                    }

                } else {
                    return '';
                }
            }
        } else {
            return null;
        }
    }
}
