<?php


namespace StageModules\Links\Model;


use Magento\Framework\Model\AbstractModel;
use StageModules\Links\Model\ResourceModel\Page as ResourceLink;

class Page extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceLink::class);
    }
}
