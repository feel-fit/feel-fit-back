<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Http\Resources\Departments\DepartmentResource;
use App\Http\Resources\Departments\DepartmentCollection;

class Department extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource = DepartmentResource::class;
    public $resourceCollection = DepartmentCollection::class;
    protected $fillable = ['name'];
    /*
    |--------------------------------------------------------------------------
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
