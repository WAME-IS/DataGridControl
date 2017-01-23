<?php

namespace Wame\DataGridControl;

use Nette\ComponentModel\IContainer;
use Ublaboo\DataGrid\DataGrid;
use Ublaboo\DataGrid\DataModel;
use Wame\DataGridControl\Registers\DatagridRegister;
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
    
    /** @var EntityManager */
    private $entityManager;
    
    /** @var string */
    private $route;
    
    /** @var array */
    private $dataParameters;
    
    
    public function __construct(
        EntityManager $entityManager,
        IContainer $parent = NULL,
        $name = NULL
    ) {
        parent::__construct($parent, $name);
        
        $this->entityManager = $entityManager;
        $this->register = new DatagridRegister();
    }
    

    /** register **************************************************************/

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


    /** get & set *************************************************************/

    /**
     * @return array
     */
    public function getDataParameters()
    {
        return $this->dataParameters;
    }

    /**
     * @param $parameters
     */
    public function setDataParameters($parameters)
    {
        $this->dataParameters = $parameters;
    }

    /**
     * @param $parameterName
     * @return mixed
     */
    public function getDataParameter($parameterName)
    {
        return $this->dataParameters[$parameterName];
    }

    /**
     * @return null
     */
    public function getLastColumn()
    {
        return !empty($this->columns) ? array_values(array_slice($this->columns, -1))[0] : null;
    }
    
    /** {@inheritDoc} */
    public function attached($parent)
	{
        $this->attach();
        
        parent::attached($parent);
	}

    /**
     * Attach
     *
     * @return $this
     */
    public function attach()
	{
        foreach($this->register->getArray() as $item) {
            $service = $item['service'];

            $service->setParent($this)
                    ->setParameters($item['parameters'])
                    ->render($this);

            $service->setVisibility($this);
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

    /**
     * @return array
     */
    public function getEntities()
    {
        return $this->getDataModel()->getDataSource()->getData();
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route ?: $this->presenter->getName();
    }

    /**
     * @param $route
     * @return $this
     */
    public function setRoute($route)
    {
        $this->route = $route;
        
        return $this;
    }


    /** {@inheritDoc} */
    public function getParent()
    {
        $parent = $this->lookup('\Nette\Application\UI\Presenter');

        if (!($parent instanceof PresenterComponent)) {
            throw new DataGridHasToBeAttachedToPresenterComponentException(
                "DataGrid is attached to: '" . get_class($parent) . "', but instance of PresenterComponent is needed."
            );
        }

        return $parent;
    }
	
}