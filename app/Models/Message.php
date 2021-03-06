<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\Messages\MessageResource;
use App\Http\Resources\Messages\MessageCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use SoftDeletes;

    //protected $table = '';
    //protected $dates = [''];
    //protected $relationships = [''];
    //public $resource           = '';
    //public $resourceCollection = '';
    //protected $fillable = [''];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['user_id', 'name', 'email', 'description'];
    public $resource = MessageResource::class;
    public $resourceCollection = MessageCollection::class;

    /*
    |--------------------------------------------------------------------------
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class)->withDefault(function ($user) {
            $user->name = 'Anónimo';
        });
    }
}
