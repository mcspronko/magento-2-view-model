<?php

namespace Pronko\ViewModel\ViewModel;

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class CmsPagesList implements ArgumentInterface
{
    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * CmsPagesList constructor.
     * @param PageRepositoryInterface $pageRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        PageRepositoryInterface $pageRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->pageRepository = $pageRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @return \Magento\Cms\Api\Data\PageInterface[]
     */
    public function getItems()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $pageSearchResult = $this->pageRepository->getList($searchCriteria);

        return $pageSearchResult->getItems();
    }
}
