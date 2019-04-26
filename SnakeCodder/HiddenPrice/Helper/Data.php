<?php
namespace SnakeCodder\HiddenPrice\Helper;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Customer\Model\Session;

class Data extends AbstractHelper
{
    // protected $context;

    /*public function __construct(Context $context)
    {
        $this->context = $context;
        parent::__construct($context);
    }*/

 

    //const XML_CONFIG_HIDE_ADD_TO_CART = 'catalog/available/hide_add_to_cart';
    //const XML_CONFIG_HIDE_ADD_TO_CART_GROUPS = 'catalog/available/hide_add_to_cart_groups';
    const XML_CONFIG_HIDE_PRICE = 'catalog/available/hide_price';
    //const XML_CONFIG_HIDE_PRICE = 'hiddenprice/general/status';
    const XML_CONFIG_HIDE_PRICE_GROUPS = 'catalog/available/hide_price_groups';
    //const XML_CONFIG_HIDE_PRICE_GROUPS = 'hiddenprice/general/enable_for_customer_groups';
    protected $_session;
/** 
  * Initialize Helper 
  * 
  * @param Context $context 
  * @param Session $session 
  */
    public function __construct(Context $context, Session $session)
    {
        $this->_session = $session;
        parent::__construct($context);
    }

    public function isAvailablePrice()
    {
     

        if ($this->isEnable()) {
            return !in_array($this->_session->getCustomerGroupId() , explode(',', $this->_getCustomerGrouptoHide()));
        }
        return true;
    }
    /** 
  * Retrieve Store Configuration Data
  * 
  * 
    /*protected function _getConfig($path)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }*/


       public function isEnable()
    {
        return $this->scopeConfig->getValue('hiddenprice/general/status', ScopeInterface::SCOPE_STORE);
    }

    public function _getCustomerGrouptoHide()
    {
        return $this->scopeConfig->getValue('hiddenprice/general/enable_for_customer_groups', ScopeInterface::SCOPE_STORE);
    }
}


