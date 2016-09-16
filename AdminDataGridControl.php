<?php

namespace Wame\DataGridControl;

use Wame\Vendor\Ublaboo\Datagrid\Column\ColumnStatus;


class AdminDataGridControl extends DataGridControl
{
    const TEMPLATE_PATH = BASE_PATH . '/templates/materialDesign/ublaboo/datagrid/src/templates/';
    
    
    /**
	 * @var string
	 */
	public static $icon_prefix = 'material-icons';
    
    
	public function __construct(\Nette\ComponentModel\IContainer $parent = NULL, $name = NULL) 
    {
        parent::__construct($parent, $name);
        
        $this->setTemplateFile(self::TEMPLATE_PATH . 'materialDesign.latte');
    }
    
    
    public function getIconPrefix()
    {
        return $this->icon_prefix;
    }
    
    
    public function attach()
	{
        foreach($this->register->getArray() as $item) {
            $this->checkService($item['service'])->render($this);
        }
        
        return $this;
	}
    
    
    /**
	 * Add column status
	 * @param  string      $key
	 * @param  string      $name
	 * @param  string|null $column
	 * @return ColumnStatus
	 */
	public function addColumnStatus($key, $name, $column = NULL)
	{
		$this->addColumnCheck($key);
        
		$column = $column ?: $key;

		return $this->addColumn($key, new ColumnStatus($this, $key, $column, $name));
	}
    
    
    public function render() 
    {
        parent::render();
        
        $this->getTemplate()->icon_prefix = static::$icon_prefix;
    }

    
    private function checkService($service)
    {
        $adminService = str_replace('Wame\DataGridControl', 'Wame\DataGridControl\Admin', get_class($service));
        
        if (class_exists($adminService)) {
            $service = new $adminService();
        }
        
        return $service;
    }
    


}