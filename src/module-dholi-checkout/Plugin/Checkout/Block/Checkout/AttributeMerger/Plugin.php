<?php
/**
* 
* Checkout para Magento 2
* 
* @category     Dholi
* @package      Modulo Checkout
* @copyright    Copyright (c) 2019 dholi (https://www.dholi.dev)
* @version      1.0.0
* @license      https://www.dholi.dev/license/
*
*/
declare(strict_types=1);

namespace Dholi\Checkout\Plugin\Checkout\Block\Checkout\AttributeMerger;

class Plugin {

	public function afterMerge(\Magento\Checkout\Block\Checkout\AttributeMerger $subject, $result) {
		if (array_key_exists('street', $result)) {
			$result['street']['children'][0]['label'] = __('Street Address');
			$result['street']['children'][1]['label'] = __('Street Address 2');
			$result['street']['children'][2]['label'] = __('Street Address 3');
			$result['street']['children'][3]['label'] = __('Street Address 4');
		}
		return $result;
	}
}