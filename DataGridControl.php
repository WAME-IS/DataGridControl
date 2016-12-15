<?php

namespace Wame\DataGridControl;

use Ublaboo\DataGrid\DataGrid;
use Wame\DataGridControl\Registers\DatagridRegister;
use Kdyby\Doctrine\QueryBuilder;
use Kdyby\Doctrine\EntityManager;
use Ublaboo\DataGrid\Exception\DataGridHasToBeAttachedToPresenterComponentException;
use Nette\Application\UI\PresenterComponent;

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
    
    private $route;
    
    
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
    public function attached($parent)
	{
        $this->attach();
        
        parent::attached($parent);
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
    
    /** {@inheritDoc} */
    public function getParent()
    {
        $parent = $this->lookup(\Nette\Application\UI\Presenter::class);
//        $parent = $this->getParent()->lookupPath(Nette\Application\UI\Control::class, FALSE);;

		if (!($parent instanceof PresenterComponent)) {
			throw new DataGridHasToBeAttachedToPresenterComponentException(
				"DataGrid is attached to: '" . get_class($parent) . "', but instance of PresenterComponent is needed."
			);
		}

		return $parent;
    }
    
    public function getRoute()
    {
        return $this->route ?: $this->presenter->getName();
    }
    
    public function setRoute($route)
    {
        $this->route = $route;
        
        return $this;
    }
	
}