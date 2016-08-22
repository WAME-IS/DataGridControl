<?php

namespace Wame\DataGridControl;

use Ublaboo\DataGrid\DataGrid;
use Wame\DataGridControl\Registers\DatagridRegister;

interface IDataGridControlFactory
{
	/** @return DataGridControl */
	function create();
}

class DataGridControl extends DataGrid
{
    /** @var DatagridRegister */
    private $register;
    
    
    public function __construct(
        \Nette\ComponentModel\IContainer 
        $parent = NULL, 
        $name = NULL
    ) {
        parent::__construct($parent, $name);
        
        $this->register = new DatagridRegister();
    }
    
    
//    public function __call($method, $args)
//    {
//        $this->register->$method($args[0]);
//    }
    
    public function add($service, $name = null)
    {
        $this->register->add($service, $name);
    }
    
    public function remove($name)
    {
        $this->register->remove($name);
    }
    
    public function attached($presenter)
	{
        foreach($this->register->getArray() as $item) {
            $item['service']->render($this);
//            foreach($item['parameters'] as $parameter) {
//                
//            }
        }
        
        parent::attached($presenter);
	}
	
}