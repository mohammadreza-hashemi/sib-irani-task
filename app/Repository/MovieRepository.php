<?php

namespace App\Repository;

use App\Models\Movie;
use App\Repository\Interfaces\MovieRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\BaseResult;

class MovieRepository implements MovieRepositoryInterface
{

    /**
     * @param array $data
     * @return void
     */
    public function store(array $data)
    {
        DB::table('movies')->insert([
            'title' => $data['title'],
            'year' => $data['year'],
            'rank' => $data['rank'],
            'description' => $data['description'],
            'genre' => $data['genre'],
        ]);
    }

    /**
     * @param string $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function show(string $id)
    {
        $movie = DB::table('movies')->where('id', $id)->get();
        return response()->json($movie, 200);
    }

    public function update(array $data, int $id)
    {
        DB::table('movies')->where('id', $id)->update([
            'title' => $data['title'],
            'year' => $data['year'],
            'rank' => $data['rank'],
            'description' => $data['description'],
            'genre' => $data['genre'],
        ]);
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
        DB::table('movies')->delete($id);
    }

}
