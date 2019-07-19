<?php
/**
 * Created by PhpStorm.
 * User: mauricio
 * Date: 23/10/17
 * Time: 4:01 PM.
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Trait ApiResponser.
 */
trait ApiPermission
{
    /**
     * ApiPermission constructor.
     */

    /**
     * @param $data
     * @param $column
     *
     * @return mixed
     */
    protected function permission($data, $column)
    {
        $user = auth()->user();

        $items = [$user, $user->roles->first()];

        foreach ($items as $item) {
            if ($this->checkPermission($item->permissions, 'all')) {
                return $data;
            }

            if ($this->checkPermission($item->permissions, 'group')) {
                request()->query->add([$column => $user->id]);

                return $data;
            }

            if ($this->checkPermission($item->permissions, 'self')) {
                request()->query->add([$column => $user->id]);

                return $data;
            }
        }

        return $data;
    }

    /**
     * @param Collection $permissions
     * @param string     $permission
     *
     * @return bool
     */
    private function checkPermission(Collection $permissions, string $permission)
    {
        return (bool) $permissions->where('name', $permission)->toArray();
    }
}
