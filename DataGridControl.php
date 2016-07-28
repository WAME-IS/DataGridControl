<?php

namespace Wame\DataGridControl;

use Ublaboo\DataGrid\DataGrid;

interface IDataGridControlFactory
{
	/** @return DataGridControl */
	function create();
}

class DataGridControl extends DataGrid
{
	/** @var array */
	private $providers = [];
    
    /** @var mixin */
    private $dataSource;
    
	
	public function setProvider($provider)
    {
		$this->providers[] = $provider;
		
		return $this;
	}
    
    public function setDataSource($source)
    {
        $this->dataSource = $source;
        parent::setDataSource($source);
    }
    
    public function getDataSource()
    {
        return $this->dataSource;
    }


    public function attached($presenter)
	{
        foreach($this->providers as $provider) {
			$provider->getColumns($this);
		}
        
        parent::attached($presenter);
	}
	
}