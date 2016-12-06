<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BookRepository;

class BookController extends Controller 
{
    protected $repository;

    function __construct(BookRepository $repository) 
    {
        $this->repository = $repository;
    }

    public function index()
    {

        $result = $this->repository->index();

        return $result;
  
    }

    public function edit($id)
    {
        $result = $this->repository->edit($id); 

        return response()->json([
                "msg" => "Success",
                "data" => $result
            ], 200
        );
    }

    public function save(Request $request) {
        $result = $this->repository->save($request->all());

        if (!$result['result']) {
            return response()->json([
                 "msg" => "Error",
                 "id" => 0,
                 'record' => $result['record']
             ], 200
            );
        }

        return response()->json([
             "msg" => "Success",
             "id" => $result['record']->id,
             'record' => $result['record']
         ], 200
        );

    }

    public function destroy($id)
    {
        $result = $this->repository->destroy($id);

        if (!$result) {
            return response()->json([
                 "msg" => "Error"
            ], 500);
        }

        return response()->json([
             "msg" => "Success"
        ], 200);

    }
}
