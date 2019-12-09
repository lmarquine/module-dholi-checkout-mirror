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

namespace Dholi\Checkout\Plugin\Checkout;

use Magento\Checkout\Block\Checkout\LayoutProcessor;

class LayoutProcessorPlugin {

	public function afterProcess(LayoutProcessor $subject, array $jsLayout) {
		$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
		['shippingAddress']['children']['shipping-address-fieldset']['children']['street'] = [
			'component' => 'Magento_Ui/js/form/components/group',
			'label' => __('Address'),
			'required' => false,
			'dataScope' => 'shippingAddress.street',
			'provider' => 'checkoutProvider',
			'sortOrder' => 0,
			'type' => 'group',
			'additionalClasses' => 'street',
			'children' => [
				[
					'label' => __('Street Address 1'),
					'component' => 'Magento_Ui/js/form/element/abstract',
					'config' => [
						'customScope' => 'shippingAddress',
						'template' => 'ui/form/field',
						'elementTmpl' => 'ui/form/element/input'
					],
					'dataScope' => '0',
					'provider' => 'checkoutProvider',
					'validation' => ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255],
				],
				[
					'label' => __('Street Address 2'),
					'component' => 'Magento_Ui/js/form/element/abstract',
					'config' => [
						'customScope' => 'shippingAddress',
						'template' => 'ui/form/field',
						'elementTmpl' => 'ui/form/element/input'
					],
					'dataScope' => '1',
					'provider' => 'checkoutProvider',
					'validation' => ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255],
				],
				[
					'label' => __('Street Address 3'),
					'component' => 'Magento_Ui/js/form/element/abstract',
					'config' => [
						'customScope' => 'shippingAddress',
						'template' => 'ui/form/field',
						'elementTmpl' => 'ui/form/element/input'
					],
					'dataScope' => '2',
					'provider' => 'checkoutProvider',
					'validation' => ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255],
				],
				[
					'label' => __('Street Address 4'),
					'component' => 'Magento_Ui/js/form/element/abstract',
					'config' => [
						'customScope' => 'shippingAddress',
						'template' => 'ui/form/field',
						'elementTmpl' => 'ui/form/element/input'
					],
					'dataScope' => '3',
					'provider' => 'checkoutProvider',
					'validation' => ['required-entry' => false, "min_text_len‌​gth" => 1, "max_text_length" => 255],
				],
			]
		];

		// vat_id
		if (isset($jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['vat_id'])) {
			$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['vat_id']['validation'] = [
				'required-entry' => true,
			];
		}

		$configuration = $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'];
		foreach ($configuration as $paymentGroup => $groupConfig) {
			if (isset($groupConfig['component']) AND $groupConfig['component'] === 'Magento_Checkout/js/view/billing-address') {
				if (isset($jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'][$paymentGroup]['children']['form-fields']['children']['vat_id'])) {
					$jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'][$paymentGroup]['children']['form-fields']['children']['vat_id'] ['validation'] = [
						'required-entry' => true,
					];
				}
			}
		}

		return $jsLayout;
	}
}