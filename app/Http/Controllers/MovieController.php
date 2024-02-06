<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\CreateMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;
use App\Services\Interfaces\MovieServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use function Symfony\Component\Translation\t;

class MovieController extends Controller
{
    private MovieServiceInterface $moveiService;

    /**
     * @param MovieServiceInterface $movieService
     */
    public function __construct(MovieServiceInterface $movieService)
    {
        $this->moveiService = $movieService;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:2',
                'year' => 'required|integer',
                'rank' => 'required|integer||digits_between:1,100',
                'description' => 'required|min:3',
                'genre' => 'required|min:2'
            ]);
            if ($validator->fails()) {
                throw new \Exception('مشکل ولیدیشن داریم!', 403);
            } else {
                $data = $request->all();
                return $this->moveiService->store($data,);
            }
        } catch (\Exception $exception) {
            Log::critical($exception->getMessage());
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show(string $id)
    {
        return $this->moveiService->show($id);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed|void
     */
    public function update(Request $request, int $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:2',
                'year' => 'required|integer',
                'rank' => 'required|integer||digits_between:1,100',
                'description' => 'required|min:3',
                'genre' => 'required|min:2'
            ]);
            if ($validator->fails()) {
                throw new \Exception('مشکل ولیدیشن داریم!', 403);
            } else {
                $data = $request->all();
                return $this->moveiService->update($data, $id);
            }
        } catch (\Exception $exception) {
            Log::critical($exception->getMessage());
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->moveiService->destroy($id);
    }


}
