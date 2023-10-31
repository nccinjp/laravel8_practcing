<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;   //論理削除の場合

    protected $table = 'articles';  // テーブル名を紐づけします　で、databaseのmigrationで定義

    //kadai08_1
    public static $rules = [
        "title" => [ "required" ],
        "body" => [ "required"],
    ];

    //kadai08_1
    public static $messages = [
        "title.required" => "title is empty",
        "body.required" => "body is empty",
    ];

    public function thumbnails() {
        return $this->hasMany( Thumbnail::class );
        }
}
