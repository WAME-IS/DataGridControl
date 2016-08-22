<?php

namespace Wame\DataGridControl\Registers;

use Wame\Core\Registers\PriorityRegister;

class DatagridRegister extends PriorityRegister
{
    public function __construct()
    {
        parent::__construct(\Wame\DataGridControl\BaseGridItem::class);
    }
    
}
