<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
   	public $timestamps = false; //set time to false
    protected $fillable = [
    	'type_layout'
    ];
    protected $primaryKey = 'layout_id';
 	protected $table = 'tbl_theme';
}
