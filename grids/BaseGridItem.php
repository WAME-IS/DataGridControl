<?php

namespace Wame\DataGridControl;

use Wame\DataGridControl\DataGridControl;
use Wame\DataGridControl\Exceptions\BaseGridItemHasToBeAttachedToDataGridControlException;

abstract class BaseGridItem
{
    /** @var DataGridControl */
    private $parent;
    
    
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
    
}