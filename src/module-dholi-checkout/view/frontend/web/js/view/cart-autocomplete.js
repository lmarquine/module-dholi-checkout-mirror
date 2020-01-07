define([
	'jquery',
	'uiRegistry',
	'underscore'
], function ($, registry, _) {
	'use strict';

	return function (setShippingInformationAction) {
		const DATA_ATTR = 'dholi-geolocation';

		registry.async('checkoutProvider')(function (checkoutProvider) {
			checkoutProvider.on('shippingAddress', function (data) {
					try {
						$('#shipping-zip-form select[name="country_id"], #shipping-zip-form select[name="region_id"], #shipping-zip-form input[name="postcode"]').each(function (index) {
							if (!$(this).data(DATA_ATTR)) {
								$(this).data(DATA_ATTR, true);

								let address = JSON.parse($.cookie('dholi-address-information'));

								if($(this).attr('name') == 'country_id') {
									$(this).val(address.country_id).trigger('change');
								}
								if($(this).attr('name') == 'region_id') {
									let fieldId = $(this).attr('id');
									if ($('#' + fieldId)) {
										$('#' + fieldId + ' option').filter(function () {
											return $.trim($(this).text()) == address.region;
										}).attr('selected', true);
										$('#' + fieldId).trigger('change');
									}
								}
								if($(this).attr('name') == 'postcode') {
									$(this).val(address.postcode).trigger('change');
								}
							}
						});
					} catch (e) {
						(console.error || console.log).call(console, e.message || e);
					}
				}
			);
		});

		return setShippingInformationAction;
	}
});