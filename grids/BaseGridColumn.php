<?php

namespace Wame\DataGridControl;


abstract class BaseGridColumn
{
    public $gridRepository;
    
	protected $hidden = FALSE;
	
    
	public function __construct(Repositories\GridRepository $gridRepository)
    {
		$this->gridRepository = $gridRepository;
		$this->hidden = TRUE;
	}
	
    
    abstract function addColumn($grid);
    
	protected function isHidden($grid, $column)
	{
		$gridEntity = $this->gridRepository->get(['type' => $grid->getGridName()]);
		return $gridEntity->getParameter($column)['hidden'];
	}
    
}