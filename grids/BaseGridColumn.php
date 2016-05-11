<?php

namespace Wame\DataGridControl;


abstract class BaseGridColumn {
	abstract function addColumn($grid);
	
	public $lang;
	
	protected $hidden = FALSE;
	
	protected $type = 'article';
	
	public $gridRepository;
	
	public function __construct(Repositories\GridRepository $gridRepository) {
		$this->gridRepository = $gridRepository;
		$this->lang = $gridRepository->lang;
		
		$this->hidden = TRUE;
	}
	
	protected function getItems($grid)
	{
		return $grid->parent->getDataSource();
	}
	
	protected function isHidden($grid, $column)
	{
		$gridEntity = $this->gridRepository->get(['type' => $grid->parent->getName()]);
		return $gridEntity->getParameter($column)['hidden'];
	}
}