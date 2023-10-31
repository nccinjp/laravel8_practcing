<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thumbnail extends Model
{
    use HasFactory;
    use SoftDeletes;   //論理削除の場合

    protected $table = 'thumbnails';

    //ルール
    public static $rules = [
        "image" => [ "image" ],
    ];

    //error message
    public static $messages = [
        "image.image" => "plz upload a pic. "
    ];
}
