<?php namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    protected $model;

    function __construct(Book $model) 
    {
        $this->model = $model;
    }

	public function index() 
	{
        $records = $this->model->orderBy('title', 'asc')->paginate(3);
        return $records;
	}

	public function edit($id) 
	{
		$record = $this->model->find($id);

        return $record;
	}	

	public function save($input) 
	{
        if ($input['id'] == 0) {
            $record = $this->model;
        } else {
           $record = $this->model->find($input['id']);
        }
        $record->fill($input);
    
        $result = $record->save();

        return compact('result', 'record');
	}

	public function destroy($id) 
	{
        $result = null;
		$record = $this->model->find($id);
        if ($record)
        {
            $result = $record->delete();
        }

        return $result;
	}	
}
