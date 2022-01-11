<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'posts_title', 'posts_desc', 'posts_content','posts_image','posts_content','posts_meta_desc','posts_meta_keywords','posts_status','cate_post_id','posts_slug'
    ];
    protected $primaryKey = 'posts_id';
    protected $table = 'tbl_posts';
        public function cate_post()
    {
 	    return $this->belongsTo('App\CatePost','cate_post_id','cate_post_name');
    }
}
