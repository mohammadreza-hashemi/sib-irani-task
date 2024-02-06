<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ElasticSearchServiceInterface;
use Illuminate\Http\Request;

class ElasticSearchController extends Controller
{
    /**
     * @var ElasticSearchServiceInterface
     */
    protected ElasticSearchServiceInterface $elasticSearchService;

    /**
     * @param ElasticSearchServiceInterface $elasticSearchService
     */
    public function __construct(ElasticSearchServiceInterface $elasticSearchService)
    {
        $this->elasticSearchService = $elasticSearchService;
    }

    /**
     * @return mixed
     */

    public function store()
    {
        return $this->elasticSearchService->store();
    }

    /**
     * @param $keyword
     * @return mixed
     */
    public function search($keyword)
    {
        return $this->elasticSearchService->search($keyword);
    }
}
