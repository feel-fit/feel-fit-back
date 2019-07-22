<?php

namespace App\Models;

use App\Http\Resources\Departments\DepartmentCollection;
use App\Http\Resources\Departments\DepartmentResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    //protected $table = '';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //protected $relationships = [''];
    public $resource           = DepartmentResource::class;
    public $resourceCollection = DepartmentCollection::class;
    //protected $fillable = [''];
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
