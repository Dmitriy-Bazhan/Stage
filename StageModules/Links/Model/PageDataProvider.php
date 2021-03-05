<?php

namespace StageModules\Links\Model;

use Magento\Framework\App\Request\DataPersistorInterface;
use StageModules\Links\Model\ResourceModel\Page\CollectionFactory as PageCollectionFactory;

class PageDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;


    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param PageCollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        PageCollectionFactory $collectionFactory,
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

        /** @var \StageModules\Links\Model\Link $page */
        foreach ($items as $page) {
            $this->loadedData[$page->getId()]['page'] = $page->getData();
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
