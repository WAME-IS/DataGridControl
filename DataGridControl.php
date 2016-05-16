<?php

namespace Wame\DataGridControl;

use Ublaboo\DataGrid\DataGrid;

use Kdyby\Doctrine\EntityManager;

interface IDataGridControlFactory
{

	/**
	 * @return DataGridControl
	 */
	function create();

}

class DataGridControl extends \Nette\Application\UI\Control
{
	/** @var array */
	private $source;
	
	/** @var array */
	private $providers = [];
	
	public $presenterName;
	
	public $entityManager;
	
	public $gridName;
	
	public function __construct(\Nette\ComponentModel\IContainer $parent = NULL, $name = NULL, EntityManager $entityManager) {
//		parent::__construct($parent, $name);
		$this->entityManager = $entityManager;
	}
	
	public function setGridName($gridName)
	{
		$this->gridName = $gridName;
	}
	
	public function getGridName()
	{
		return $this->gridName;
	}
	
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
	
//	public function setDataSource($source)
//	{
//		$serializer = new Serializer($this->entityManager); // Pass the EntityManager object
//		
//		foreach($source as $s) {
//			$this->source[$s->id] = $serializer->serialize($s);
//		}
//	}
	
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
//		$grid->setDataSource(new \Ublaboo\DataGrid\DataSource\DoctrineDataSource($this->source, 'id'));
		
		foreach($this->providers as $provider) {
			$provider->getColumns($grid);
		}
	}
}