<?php

namespace StageModules\Links\Ui\Components;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Cms\Model\ResourceModel\Page\Collection;
use Magento\Cms\Model\ResourceModel\Page\CollectionFactory;

/**
 * Class CustomDataProvider
 */
class CmsPageDataProvider extends AbstractDataProvider
{
    /**
     * CustomDataProvider constructor.
     *
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $collectionFactory->create();

        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data
        );
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION');
        $result = $connection->fetchAll("SELECT page_id FROM cms_added_link_relative_page");
        $relativePageIds = [];
        foreach ($result as $value) {
            $relativePageIds[] = $value['page_id'];
        }
        $this->getCollection()->addFieldToFilter('page_id', ['nin' => $relativePageIds]);

//        $array = $this->collection->toArray();
//        foreach ($array['items'] as $key => $item) {
//            if (in_array($item['page_id'], $relativePageIds)) {
//                $array['items'][$key]['relative'] = 1;
//            } else {
//                $array['items'][$key]['relative'] = 0;
//            }
//        }
//        return $array;

        return $this->collection->toArray();
    }
}
