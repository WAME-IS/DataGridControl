<?php

namespace Wame\DataGridControl;


abstract class BaseGridItem
{
    /**
     * Render
     * 
     * @param DataGridControl $grid   data grid control
     */
    abstract function render($grid);
    
}