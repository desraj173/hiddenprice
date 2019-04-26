<?php 
namespace SnakeCodder\HiddenPrice\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use SnakeCodder\HiddenPrice\Helper\Data as ProductHelper;
use Magento\Framework\Exception\LocalizedException;
class QuoteObserver implements ObserverInterface
{
protected $_helper;
public function __construct(ProductHelper $helper) {
$this->_helper = $helper;
 }
public function execute(Observer $observer) {
 if (!$this->_helper->isAvailablePrice()) {
 throw new LocalizedException(__('You can not add products to cart.')); 
}
 }
 }