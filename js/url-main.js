
jQuery(function() {

jQuery('#product-title').on('input', function() {
	jQuery('#product-title-output').html(jQuery('#product-title').val());
});
jQuery('#product-description').on('input', function() {
	jQuery('#product-description-output').html(jQuery('#product-description').val());
});
jQuery('#cta-text').on('input', function() {
	jQuery('#cta-text-output').html(jQuery('#cta-text').val());
});
jQuery('#url').on('input', function() {
	jQuery('#url-output').html(jQuery('#url').val());
	jQuery('#cta-text-output').attr("href",jQuery('#url').val());
});


if(jQuery( "#page-field" ).val() == 'MP'){
	jQuery('#ccode-block').css('display','block');
}

jQuery( "#page-field" ).change(function() {
	if(jQuery(this).val() == 'MP') {
		jQuery('#ccode-block').css('display','block');
	}
	else {
		jQuery('#ccode-block').css('display','none');	
	}

});

jQuery( "#url-tool-form" ).submit(function( event ) {

	var urlField = jQuery("#url").val();
	var countryField = jQuery("#country-field").val() + '_';
	var linklocationField = jQuery("#location-field").val();
	var linktypeField = jQuery("#type-field").val();
	var ctaField = '&lnk2=' + jQuery("#cta-field").val();
	var destinationField = jQuery("#destination-field").val();
	var ccodeField = jQuery("#ccode").val();

	if ((jQuery("#page-field").val() == 'MP') && (ccodeField != '')){
		var pageField = jQuery("#page-field").val();
	}
	else {
		var pageField = jQuery("#page-field").val() + '_';
	}

	var lnkValue, linklocationValue, linktypeValue, outputString, finalString;

	if(urlField.indexOf('?') > -1){
		lnkValue = '&lnk=STW_';
	}
	else {
		lnkValue = '?lnk=STW_';
	}

	if(linklocationField != ''){
		linklocationValue = '_';
	}
	else {
		linklocationValue = '';
	}

	if(linktypeField != ''){
		linktypeValue = '_';
	}
	else {
		linktypeValue = '';
	}

	if(ccodeField == ''){
		ccodeField = '';
	}
	else {
		ccodeField = ccodeField + '_';
	}

	outputString = urlField + lnkValue + countryField + pageField + ccodeField + linklocationField + linklocationValue + linktypeField + linktypeValue + ctaField + '_' + destinationField;

	finalString = outputString.replace('_&lnk2','&lnk2');

	jQuery('#outputForm').text(finalString);

	event.preventDefault();

});

});