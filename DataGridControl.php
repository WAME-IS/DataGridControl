<?php

namespace Wame\DataGridControl;

use Ublaboo\DataGrid\DataGrid;
use Wame\DataGridControl\Registers\DatagridRegister;
use Kdyby\Doctrine\QueryBuilder;
use Kdyby\Doctrine\EntityManager;

interface IDataGridControlFactory
{
	/** @return DataGridControl */
	function create();
}

class DataGridControl extends DataGrid
{
    /** @var DatagridRegister */
    protected $register;
    
    /** @var BaseEntity */
    private $source;
    
    /** @var EntityManager */
    private $entityManager;
    
    
    public function __construct(
        EntityManager $entityManager,
        \Nette\ComponentModel\IContainer $parent = NULL, 
        $name = NULL
    ) {
        parent::__construct($parent, $name);
        
        $this->entityManager = $entityManager;
        $this->register = new DatagridRegister();
    }
    
    
    /**
     * Add
     * 
     * @param object $service       service
     * @param string $name          name
     * @param array $parameters     parameters
     */
    public function add($service, $name = null, $parameters = [])
    {
        $this->register->add($service, $name, $parameters);
    }
    
    /**
     * Remove
     * 
     * @param string $name  name
     */
    public function remove($name)
    {
        $this->register->remove($name);
    }
    
    /** {@inheritDoc} */
    public function attached($presenter)
	{
        $this->attach();
        
        parent::attached($presenter);
	}
    
    public function attach()
	{
        foreach($this->register->getArray() as $item) {
            $item['service']
                    ->setParent($this)
                    ->render($this);
            
            // TODO: poriesit parametre
        }
        
        return $this;
	}
    
    /**
     * Get DataModel
     * 
     * @return DataModel
     */
    public function getDataModel()
    {
        return $this->dataModel;
    }
    
    public function getEntities()
    {
        return $this->getDataModel()->getDataSource()->getData();
    }
	
}