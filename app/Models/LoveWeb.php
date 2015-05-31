<?php namespace SimBlog\Models;

use Illuminate\Database\Eloquent\Model;

class LoveWeb extends Model {

	//
    public function users(){
        return $this->hasOne('SimBlog\Models\User','id','user_id');
    }
}
