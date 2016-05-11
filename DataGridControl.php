<?php

namespace Wame\DataGridControl;

use Ublaboo\DataGrid\DataGrid;

class DataGridControl extends \Nette\Application\UI\Control
{
	/** @var array */
	private $source;
	
	/** @var array */
	private $providers = [];
	
	public $presenterName;
	
	
	public function setProvider($provider) {
		$this->providers[] = $provider;
		
		return $this;
	}
	
	public function setDataSource($source)
	{
		foreach($source as $s) {
			$this->source[$s->id] = $s;
		}
	}
	
	public function getDataSource()
	{
		return $this->source;
	}
	
	
	public function render()
	{
		$this->template->render(__DIR__ . '/templates/default.latte');
	}
	
	public function createComponentDataGrid($name)
	{
		$this->presenterName = $this->presenter->name;
		
		$grid = new DataGrid($this, $name);
		
		$grid->setColumnsHideable();
		$grid->setTemplateFile(__DIR__ . '/templates/admin.latte');
		$grid->setDataSource($this->source);
		
		foreach($this->providers as $provider) {
			$provider->getColumns($grid);
		}
	}
}