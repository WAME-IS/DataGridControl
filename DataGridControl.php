<?php

namespace Wame\DataGridControl;

use Ublaboo\DataGrid\DataGrid;
use Kdyby\Doctrine\EntityManager;

interface IDataGridControlFactory
{
	/** @return DataGridControl */
	function create();
}

class DataGridControl extends \Nette\Application\UI\Control
{
	/** @var array */
	private $source = [];
	
	/** @var array */
	private $providers = [];
	
	public $presenterName;
	
	public $entityManager;
	
	public $gridName;
	
	/** @persistent */
	public $type;
	
	
	public function __construct(\Nette\ComponentModel\IContainer $parent = NULL, $name = NULL, EntityManager $entityManager) {
//		parent::__construct($parent, $name);
		$this->entityManager = $entityManager;
	}
	
	
	/** setters ***************************************************************/
	
	public function setGridName($gridName)
	{
		$this->gridName = $gridName;
		
		return $this;
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
		
		return $this;
	}
	
	/**
	 * 
	 * @param callable $getChildrenCallback			callback that will return particular children rows for given parent
	 * @param string|callable $has_children_column	column name (or callback), that indicates whether the row has some children or not
	 */
	public function setTreeView($getChildrenCallback, $has_children_column)
	{
		$this->setTreeView($getChildrenCallback, $has_children_column);
	}
	
//	public function setDataSource($source)
//	{
//		$serializer = new Serializer($this->entityManager); // Pass the EntityManager object
//		
//		foreach($source as $s) {
//			$this->source[$s->id] = $serializer->serialize($s);
//		}
//	}
	
	
	/** getters ***************************************************************/
	
	public function getGridName()
	{
		return $this->gridName;
	}
	
	public function getDataSource()
	{
		return $this->source;
	}
	
	public function render()
	{
		$this->template->render(__DIR__ . '/templates/default.latte');
	}
	
	
	/** components ************************************************************/
	
	protected function createComponentDataGrid($name)
	{
		$this->presenterName = $this->presenter->name;
		
		$grid = new DataGrid($this, $name);
		
		$grid->setColumnsHideable();
//		$grid->setTemplateFactory($templateFactory);
//		$grid->setTemplateFile(__DIR__ . '/templates/admin.latte');
		$grid->setDataSource($this->source);
//		$grid->setDataSource(new \Ublaboo\DataGrid\DataSource\DoctrineDataSource($this->source, 'id'));
//		$grid->setOuterFilterRendering();
        
        $grid->setRememberState(FALSE);
        $grid->setRefreshUrl(FALSE);
		
		foreach($this->providers as $provider) {
			$provider->getColumns($grid);
		}
	}
	
	public function loadState( array $params )
    {
        parent::loadState( $params );
    }
	
}