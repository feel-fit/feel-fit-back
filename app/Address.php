<?php

namespace App;

use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App
 */
class Address extends Model
{
    use SoftDeletes;
    protected $table              = 'addresses';
    public $resource              = AddressResource::class;
    public $resourceCollection    = AddressCollection::class;
    protected $dates              = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable           = ['contact_person', 'address', 'phone', 'city', 'departament_id', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }
}
