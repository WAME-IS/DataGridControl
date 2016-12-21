<?php

namespace Wame\DataGridControl;

use Wame\DataGridControl\DataGridControl;
use Wame\DataGridControl\Exceptions\BaseGridItemHasToBeAttachedToDataGridControlException;

abstract class BaseGridItem
{
    use \Wame\Core\Traits\TRegister;
    
    
    const ATTRIBUTE_DATA_GRID = 'data-wame-grid';
    
    
    /** @var DataGridControl */
    private $parent;
    
    /** @var array */
    private $parameters;
    
    
    /**
     * Get parent
     * 
	 * @return PresenterComponent
	 */
	public function getParent()
	{
        $parent = $this->parent;
        
		if (!($parent instanceof DataGridControl)) {
			throw new BaseGridItemHasToBeAttachedToDataGridControlException(
				"BaseGridItem is attached to: '" . get_class($parent) . "', but instance of DataGridControl is needed."
			);
		}

		return $parent;
	}
    
    /**
     * Set parent
     * 
     * @param DataGridControl $parent   parent
     * @return \Wame\DataGridControl\BaseGridItem
     */
    public function setParent(DataGridControl $parent)
    {
        $this->parent = $parent;
        
        return $this;
    }
    
    /**
     * Render
     * 
     * @param DataGridControl $grid   data grid control
     */
    abstract public function render($grid);
    
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        
        return $this;
    }
    
    public function setVisibility($grid)
    {
        $item = $grid->getLastColumn();
        
        if($item) {
            $wameGrid = [];
            
            if(isset($this->parameters['show'])) {
                $wameGrid['show'] = $this->parameters['show'];
            }
            
            if(isset($this->parameters['hide'])) {
                $wameGrid['hide'] = $this->parameters['hide'];
            }
            
            if($wameGrid) {
                $item->getElementPrototype('th')->addAttributes([self::ATTRIBUTE_DATA_GRID => json_encode($wameGrid)]);
                $item->getElementPrototype('td')->addAttributes([self::ATTRIBUTE_DATA_GRID => json_encode($wameGrid)]);
            }
        }
        
        return $grid;
    }
    
}