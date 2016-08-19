<?php

namespace Wame\DataGridControl\Registers;

use Wame\Core\Registers\BaseRegister;

class DatagridRegister extends BaseRegister
{
    public function __construct()
    {
        parent::__construct(\Wame\DataGridControl\BaseGridItem::class);
    }
    
}
