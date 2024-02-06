<?php

namespace App\Services\Interfaces;

interface ElasticSearchServiceInterface
{
    /**
     * @return mixed
     */
    public function store();

    /**
     * @param $keyword
     * @return mixed
     */
    public function search($keyword);
}
