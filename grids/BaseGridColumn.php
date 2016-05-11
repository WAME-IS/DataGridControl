<?php

namespace Wame\DataGridControl;


abstract class BaseGridColumn {
	abstract function addColumn($grid);
	
	public $lang;
	
	protected $hidden = TRUE;
	
	public function __construct(Repositories\GridRepository $gridRepository) {
		$this->lang = $gridRepository->lang;
	}
	
	protected function getItems($grid)
	{
		return $grid->parent->getDataSource();
	}
}