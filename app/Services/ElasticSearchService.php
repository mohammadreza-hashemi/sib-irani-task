<?php

namespace App\Services;

use App\Models\Movie;
use App\Services\Interfaces\ElasticSearchServiceInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class ElasticSearchService implements ElasticSearchServiceInterface
{
    /*
     * this method insert all movies in elastic database
     */
    public function store()
    {
        try {
            $client = \Elastic\Elasticsearch\ClientBuilder::create()
                ->setHosts(['https://localhost:9200'])
                ->setBasicAuthentication(env('ELASTICSEARCH_USER'), env('ELASTICSEARCH_PASS'))
                ->setSSLVerification(false)
                ->build();

            foreach (Movie::all() as $movie) {
                $params = [
                    'index' => $movie->year,
                    'type' => $movie->title,
                    'id' => $movie->id,
                    'body' => [
                        'title' => $movie->title,
                        'year' => $movie->year,
                        'rank' => $movie->rank,
                        'description' => $movie->description,
                        'genre' => $movie->genre
                    ],
                ];
                $response = $client->index($params);
            }

        } catch (\Exception $exceptione) {
            Log::critical($exceptione->getMessage());
        }
    }

    /*
     * this method search in elastic database after checking redis cache
     */
    public function search($keyword)
    {
        $client = \Elastic\Elasticsearch\ClientBuilder::create()
            ->setHosts(['https://localhost:9200'])
            ->setBasicAuthentication(env('ELASTICSEARCH_USER'), env('ELASTICSEARCH_PASS'))
            ->setSSLVerification(false)
            ->build();


        Cache::rememberForever('movies',function () {
            $result = $client->search(['body' => ['query' => ['bool' => ['should' => [
                'match' => ['title' => $keyword],
                'match' => ['year' => $keyword],
//            'match' => ['any_field_you_want' => $key],
            ]]]]]);

            return $result['hits']['hits'];  //this is wonderfull

        });


    }


}
