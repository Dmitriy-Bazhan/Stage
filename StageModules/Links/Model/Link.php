<?php


namespace StageModules\Links\Model;

use Magento\Framework\Model\AbstractModel;
use StageModules\Links\Model\ResourceModel\Link As ResourceLink;

class Link extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceLink::class);
    }
}
