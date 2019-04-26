<?php


namespace SnakeCodder\HiddenPrice\Model\Config\Source;


class EnableForCustomerGroups implements \Magento\Framework\Option\ArrayInterface
{

	

    public function toOptionArray()
    {
        $res[] = [
                'value' => 'NULL',
                'label' => 'None'
            ];
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
 
		$customerGroupsCollection = $objectManager->get('\Magento\Customer\Model\ResourceModel\Group\Collection');
		$customerGroups = $customerGroupsCollection->toOptionArray();
		$allOptions = array_merge($res, $customerGroups);
		//print("<pre>".print_r($customerGroups,true)."</pre>");
		
        return $allOptions;

		

    }

    public function toArray()
    {
        return ['' => __('')];
    }
}
