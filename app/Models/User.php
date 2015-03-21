<?php namespace SimBlog\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * SimBlog\Model\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $img
 * @property string $about
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\User whereImg($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\User whereAbout($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SimBlog\Models\User whereUpdatedAt($value)
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

}
