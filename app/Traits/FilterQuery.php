<?php
/**
 * Created by PhpStorm.
 * User: mauricio
 * Date: 23/10/17
 * Time: 4:01 PM.
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

/**
 * Trait ApiResponser.
 */
trait FilterQuery
{
    private $operators = ['>' => '>=', //mayor igual que
                          '<' => '<=', //menor igual que
                          '!' => '!=', //no igual a
    ];

    private $excepts  = ['sort_by', 'order_by', 'search', 'limit', 'page', 'per_page', 'relationships', 'pagination'];
    private $array;
    private $collection;
    private $value;
    private $operator = '=';
    private $order;
    private $attribute;
    private $include;
    private $with     = [];

    /**
     * @param Collection $collection
     *
     * @return Collection|static
     */
    public function filter_query(Collection $collection)
    {
        foreach (request()->except($this->excepts) as $attribute => $value) {
            $collection = $this->getQuery($attribute, $value, $collection);
        }

        return $collection;
    }

    /**
     * @param                                          $attribute
     * @param                                          $value
     * @param Collection $collection
     *
     * @return Collection
     */
    private function getQuery($attribute, $value, Collection $collection)
    {
        $this->collection = $collection;
        $this->value      = $value;
        $this->attribute  = $attribute;
        $this->getInclude();
        $this->getArray();
        $this->getOperator();

        // Cargamos la relacion si no existe y se realiza el filtro
        if ($this->include) {
            $collection->load([$this->include => function ($query) {
                $this->setQuery($query);
            }])->values();

            return $collection->filter(function ($item) {
                if (isset($item[$this->include])) {
                    return true;
                }
            });
        } else {
            return $this->setQuery($collection)->values();
        }
    }

    /**
     * Se verifica si el filtro es para una relacion del modelo.
     */
    private function getInclude()
    {
        if (str_contains($this->attribute, '-')) {
            $explode         = explode('-', $this->attribute);
            $this->attribute = (isset($explode[1])) ? rawurldecode($explode[1]) : null;
            $this->include   = (isset($explode[0])) ? rawurldecode($explode[0]) : null;
        } else {
            $this->include = null;
        }
    }

    /**
     *se verifica si los elementos son un array.
     */
    private function getArray()
    {
        $array = explode(',', $this->value);
        if (count($array) > 1) {
            $this->array = $array;
        } else {
            $this->array = null;
        }
    }

    /**
     * se obtiene el operador logico de la consulta.
     */
    private function getOperator()
    {
        foreach ($this->operators as $key => $operator) {
            if (str_contains($this->attribute, $key)) {
                $this->operator  = $operator;
                $this->attribute = str_replace($key, '', $this->attribute);
            }
        }
    }

    /**
     * se realiza la consulta dependiendo si es array y el operador logico.
     *
     * @param $query
     *
     * @return mixed
     */
    private function setQuery($query)
    {
        //si los valores son un array (whereNotIn or whereIn)
        if ($this->array) {
            if ('!=' == $this->operator) {
                return $query->whereNotIn($this->attribute, $this->array);
            } else {
                return $query->whereIn($this->attribute, $this->array);
            }
        } else {
            return $query->where($this->attribute, $this->operator, $this->value);
        }
    }

    /**
     * ordena los datos por columna ya sea ascendente o descendente.
     *
     * @param Collection $collection
     *
     * @return Collection
     */
    public function sort_data(Collection $collection)
    {
        $this->collection = $collection;
        if (request()->has('sort_by')) {
            $this->attribute  = request()->sort_by;
            $this->collection = $collection->sortBy($this->attribute)->values();
            if (request()->has('order_by')) {
                $this->order = request()->order_by;
                if ('desc' == $this->order) {
                    $this->collection = $collection->sortByDesc($this->attribute)->values();
                }
            }
        }

        return $this->collection;
    }

    /**
     *search data in algolia.
     *
     * @param Collection $collection
     *
     * @return Collection
     */
    public function search_data(Collection $collection)
    {
        $this->collection = $collection;
        if (request()->has('search')) {
            $this->value = request()->search;

            $this->collection = $collection->filter(function ($item) {
                // replace stristr with your choice of matching function
                return false !== stristr($item->name, $this->value);
            });
        }

        return $this->collection;
    }
}
