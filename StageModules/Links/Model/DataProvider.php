<?php

namespace StageModules\Links\Model;

use Magento\Framework\App\Request\DataPersistorInterface;
use StageModules\Links\Model\ResourceModel\Link\CollectionFactory as LinkCollectionFactory;


class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;


    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param LinkCollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        LinkCollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
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
        /** @var \StageModules\Links\Model\Link $link */
        foreach ($items as $link) {
            $this->loadedData[$link->getId()]['link'] = $link->getData();

        }

//        echo 'FFFFFF<pre>';
//        var_dump($this->loadedData);
//        die();

        if (!empty($this->loadedData)) {
            return $this->loadedData;
        }

        return [];
    }

}
