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

namespace Dholi\Checkout\Block;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;

class LayoutProcessor implements LayoutProcessorInterface {

	public function process($jsLayout) {
		$jsLayout['components']['checkout']['children']['steps']['children']
		['billing-step']['children']['payment']['children']
		['payments-list']['children']['checkmo-form']['children']
		['form-fields']['children']['postcode']['sortOrder'] = 71;

		$jsLayout['components']['checkout']['children']['steps']['children']
		['billing-step']['children']['payment']['children']
		['payments-list']['children']['checkmo-form']['children']
		['form-fields']['children']['country_id']['sortOrder'] = 81;

		return $jsLayout;
	}
}