<?php

namespace App\Http\Controllers\Upload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use YueCode\Cos\QCloudCos;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    protected $file;
    protected $bucket;
    protected $folder;

    //
    function __construct($file, $bucket, $folder)
    {
        $this->file = $file;
        $this->bucket = $bucket;
        $this->folder = $folder;
    }

    public function upload()
    {
        foreach ($this->file as $k => $file) {
            $srcPath = $file->getRealPath();
            $ClientOriginalName = time() . rand(10000, 9999999) . '.' . $file->getClientOriginalExtension();
            $dstPath = "$this->folder/$ClientOriginalName";
            $img = Image::make($file);
            $resoult=$img->resize(944,295)->save('photo/'.$ClientOriginalName);
            $src='photo/'.$ClientOriginalName;
            $upload = QCloudCos::upload($this->bucket, $srcPath, $dstPath);
            unlink($src);
            $data = json_decode($upload)->data;
            $url[] = $data->source_url;
        }
        $src_img = "";
        $count=0;
        foreach ($url as $k => $y) {
            $m = $y;
            $count++;
        }
        if ($count>1){
           return $src_img = $m . ',' . $m;
        }else{
            return $src_img=$m;
        }
    }
}
