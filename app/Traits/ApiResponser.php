<?php
/**
 * Created by PhpStorm.
 * User: mauricio
 * Date: 23/10/17
 * Time: 4:01 PM.
 */

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Trait ApiResponser.
 */
trait ApiResponser
{
    use FilterQuery;

    /**
     * @param  Collection  $collection
     * @param  int  $code
     * @return JsonResponse
     */
    protected function showAll(Collection $collection, $code = 200)
    {
        if (Cache::has($this->orderQueryCache())) {
            $collection = Cache::get($this->orderQueryCache());
        } else {
            $collection = $this->search_data($collection);
            $collection = $this->filterData($collection);
            $collection = $this->sortData($collection);
            $collection = $this->paginate($collection);
            $collection = $this->resource_all($collection);
            $collection = $this->cacheResponse($collection);
        }

        if (request()->has('pagination') && 'false' == request()->pagination) {
            return $this->successResponse(['data' => $collection], $code);
        } else {
            return $collection;
        }
    }

    /**
     * @param     $data
     * @param  int  $code
     *
     * @return JsonResponse
     */
    protected function showOne(Model $data, $code = 200)
    {
        $data = $this->resource_one($data);

        return $this->successResponse(['data' => $data], $code);
    }

    /**
     * @return string
     */
    public function orderQueryCache()
    {
        $url = request()->url();
        $queryParameters = request()->query();
        $queryString = http_build_query($queryParameters);

        return $fullUrl = "{$url}?{$queryString}";
    }

    /**
     * @param  Collection  $collection
     *
     * @return Collection|static
     */
    public function filterData(Collection $collection)
    {
        $collection = $this->filter_query($collection);

        return $collection;
    }

    /**
     * @param  Collection  $collection
     * @return Collection|static
     */
    public function loadRelations(Collection $collection)
    {
        if (!$collection->isEmpty()) {
            $relations = $collection->first()->relationships ?: null;

            if ($relations && !request()->relationships) {
                return $collection->load($relations)->values();
            }
        }

        return $collection;
    }

    /**
     * @param  Collection  $collection
     *
     * @return Collection|static
     */
    protected function sortData(Collection $collection)
    {
        $collection = $this->sort_data($collection);

        return $collection;
    }

    /**
     * @param  Collection  $collection
     * @return ApiResponser|Collection|LengthAwarePaginator
     */
    protected function paginate(Collection $collection)
    {
        if (request()->has('pagination') && 'false' == request()->pagination) {
            if (request()->has('relationships') && 'false' == request()->relationships) {
                return $collection;
            }

            return $this->loadRelations($collection);
        }

        $rules = ['per_page' => 'integer|min:2|max:100'];
        Validator::validate(request()->all(), $rules);
        $page = LengthAwarePaginator::resolveCurrentPage();
        if (request()->has('per_page')) {
            $perPage = request()->per_page;
        } else {
            $perPage = 15;
        }

        $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();

        if (!request()->has('relationships') or 'false' != request()->relationships) {
            $results = $this->loadRelations($results);
        }

        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]);
        $paginated->appends(request()->all());

        return $paginated;
    }

    /**
     * @param $collection
     * @return mixed
     */
    public function resource_all($collection)
    {
        if (!$collection->isEmpty()) {
            $resource = $collection->first()->resourceCollection;

            if ($resource) {
                $collection = new $resource($collection);
            }
        }

        return $collection;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function resource_one($data)
    {
        $resource = $data->resource;

        if ($resource) {
            return new $resource($data);
        }

        return $data;
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function cacheResponse($data)
    {
        $fullUrl = $this->orderQueryCache();

        return Cache::remember($fullUrl, 1, function () use ($data) {
            return $data;
        });
    }

    /**
     * @param $data
     * @param $code
     *
     * @return JsonResponse
     */
    public function successResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    /**
     * @param $message
     * @param $code
     *
     * @return JsonResponse
     */
    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * @param     $message
     * @param  int  $code
     *
     * @return JsonResponse
     */
    protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }
}
