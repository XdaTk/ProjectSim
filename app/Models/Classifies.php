<?php namespace SimBlog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * SimBlog\Models\Classifies
 *
 * @property integer $id 
 * @property integer $user_id 
 * @property string $name 
 * @property string $about 
 * @property string $img 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \SimBlog\Models\User $users 
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Classifies whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Classifies whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Classifies whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Classifies whereAbout($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Classifies whereImg($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Classifies whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Classifies whereUpdatedAt($value)
 */
class Classifies extends Model
{
    public function users()
    {
        return $this->hasOne('SimBlog\Models\User', 'id', 'user_id');
    }
}
