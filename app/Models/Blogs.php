<?php namespace SimBlog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * SimBlog\Models\Blogs
 *
 * @property integer $id 
 * @property integer $user_id 
 * @property integer $type 
 * @property string $title 
 * @property string $article 
 * @property string $url 
 * @property integer $reads 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Blogs whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Blogs whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Blogs whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Blogs whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Blogs whereArticle($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Blogs whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Blogs whereReads($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Blogs whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Blogs whereUpdatedAt($value)
 */
class Blogs extends Model {
    public function users(){
        return $this->hasOne('SimBlog\Models\User','id','user_id');
    }
}
