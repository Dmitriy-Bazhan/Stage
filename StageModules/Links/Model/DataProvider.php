<?php

namespace StageModules\Links\Model;

use Magento\Framework\App\Request\DataPersistorInterface;
use StageModules\Links\Model\ResourceModel\Link\CollectionFactory;


class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $employeeCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $employeeCollectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $employeeCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var \StageModules\Links\Model\Link $block */
        foreach ($items as $block) {
            $this->loadedData[$block->getId()] = $block->getData();
        }

//        $data = $this->dataPersistor->get('cms_added_link_form');
//        if (!empty($data)) {
//            $block = $this->collection->getNewEmptyItem();
//            $block->setData($data);
//            $this->loadedData[$block->getId()] = $block->getData();
//            $this->dataPersistor->clear('cms_added_link_form');
//        }

        if (!empty($this->loadedData)) {
            return $this->loadedData;
        }

        return [];
    }

}
