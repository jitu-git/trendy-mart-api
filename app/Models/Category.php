<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends AppModel
{
    use SoftDeletes;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'status', 'parent_id', 'image'
    ];
    public static $cates;


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault();
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->select('id', 'name', 'image', 'parent_id')->with('children');
    }
    
    public static function showCategories($cat_id = null, $dashes = ''){
        $dashes .= '--';
        $rsSub = self::where("parent_id", $cat_id)->get();
        if($rsSub->count() > 0){
            foreach($rsSub as $rows_sub ){
                self::$cates[$rows_sub['id']] = $dashes . $rows_sub['name'];
                self::showCategories($rows_sub['id'], $dashes);
            }
        }
        return self::$cates;
    }

    /**
     * get the array representation of menus.
     *
     * @return mixed
     */
    public static function CategoryList() {
        #return self::where("status", 1)->pluck( "title", "id")->toArray();
        self::$cates = [];
        return self::showCategories();
    }

    public function getImageAttribute($value) {
        if(is_admin()){
            return $value;
        }
        return $value ? asset("storage/{$value}") : null; 
    }
}
