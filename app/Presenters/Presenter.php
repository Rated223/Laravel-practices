<?php 

namespace App\Presenters;

use Illuminate\Database\Eloquent\Model;
/**
 * summary
 */
abstract class Presenter
{
	protected $model;

    /**
     * summary
     */
    public function __construct(Model $model)
    {
        
		$this->model = $model;
    }
}