<?php namespace SimBlog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * SimBlog\Models\Comments
 *
 * @property integer $id 
 * @property integer $user_id 
 * @property string $name 
 * @property string $email 
 * @property string $comment 
 * @property integer $cid 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \SimBlog\Models\User $users 
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Comments whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Comments whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Comments whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Comments whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Comments whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Comments whereCid($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Comments whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\Comments whereUpdatedAt($value)
 */
class Comments extends Model
{

    public function users()
    {
        return $this->hasOne('SimBlog\Models\User', 'id', 'user_id');
    }

}
