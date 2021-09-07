<?php

namespace Nishar\StockQty\Block;

use \Magento\CatalogInventory\Api\StockStateInterface;

class GetProducts extends \Magento\Framework\View\Element\Template
{
    public $registry;
    public $context;
    public $stockState;
    public $product;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\CatalogInventory\Api\StockStateInterface $stockState,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->stockState = $stockState;
        parent::__construct($context, $data);
    }

    public function getStock()
    {
        $product = $this->registry->registry('current_product');
        return $this->stockState->getStockQty($product->getId());
    }

}
