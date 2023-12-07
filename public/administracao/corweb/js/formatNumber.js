function GetDecimalDelimiter(countryCode) {
	switch (countryCode) {
		case 3:	 
				return '#';
		case 2:	 
				return ',';
		default:
				 return '.';
	}
}
function GetCommaDelimiter(countryCode) {
	switch (countryCode) { 
		case 3:			
				return '*';
		case 2:	 
				return '.';
		default:
				return ',';
	}
}
function FormatClean(num) {
	var sVal='';
	var nVal = num.length;
	var sChar='';
	try {
		for(c=0;c<nVal;c++) {
			 sChar = num.charAt(c);
			 nChar = sChar.charCodeAt(0);
			 if ((nChar >=48) && (nChar <=57))	{ sVal += num.charAt(c);	 }
		}
	}
	catch (exception) { AlertError("Format Clean",exception); }
	return sVal;
}
function FormatNumber(num,countryCode,decimalPlaces) {
	var minus='';
	var comma='';
	var dec='';
	var preDecimal='';
	var postDecimal='';
	try {
		decimalPlaces = parseInt(decimalPlaces);
		comma = GetCommaDelimiter(countryCode);
		dec = GetDecimalDelimiter(countryCode);
		if (decimalPlaces < 1) { dec = ''; }
		if (num.lastIndexOf("-") == 0) { minus='-'; }
		preDecimal = FormatClean(num);
		// preDecimal doesn't contain a number at all.
		// Return formatted zero representation.
		if (preDecimal.length < 1) {
			 return minus + FormatEmptyNumber(dec,decimalPlaces);
		}
		// preDecimal is 0 or a series of 0's.
		// Return formatted zero representation.
		if (parseInt(preDecimal) < 1) {
			 return minus + FormatEmptyNumber(dec,decimalPlaces);
		}
		// predecimal has no numbers to the left.
		// Return formatted zero representation.
		if (preDecimal.length == decimalPlaces) {
			return minus + '0' + dec + preDecimal;
		}
		// predecimal has fewer characters than the
		// specified number of decimal places.
		// Return formatted leading zero representation.
		if (preDecimal.length < decimalPlaces) {
			 if (decimalPlaces == 2) {
			return minus + FormatEmptyNumber(dec,decimalPlaces - 1) + preDecimal;
			 }
			 return minus + FormatEmptyNumber(dec,decimalPlaces - 2) + preDecimal;
		}
		// predecimal contains enough characters to
		// qualify to need decimal points rendered.
		// Parse out the pre and post decimal values
		// for future formatting.
		if (preDecimal.length > decimalPlaces) {
			postDecimal = dec + preDecimal.substring(preDecimal.length - decimalPlaces, preDecimal.length);
			preDecimal = preDecimal.substring(0,preDecimal.length - decimalPlaces);
		}
		// Place comma oriented delimiter every 3 characters
		// against the numeric represenation of the "left" side
		// of the decimal representation.	When finished, return
		// both the left side comma formatted value together with
		// the right side decimal formatted value.
		var regex	= new RegExp('(-?[0-9]+)([0-9]{3})');
		while(regex.test(preDecimal)) {
			 preDecimal = preDecimal.replace(regex, '$1' + comma + '$2');
		}
	} catch (exception) { AlertError("Format Number",exception); }
	return minus + preDecimal + postDecimal;
}
function FormatEmptyNumber(decimalDelimiter,decimalPlaces) {
	var preDecimal = '0';
	var postDecimal = '';
	for(i=0;i<decimalPlaces;i++) {
		if (i==0) { postDecimal += decimalDelimiter; }
		postDecimal += '0';
	}
	return preDecimal + postDecimal;
}
function AlertError(methodName,e) {
	if (e.description == null) { alert(methodName + " Exception: " + e.message); }
	else {	alert(methodName + " Exception: " + e.description); }
}
function round4(val) { 
	return Math.round(val*10000)/10000;
}
function round(val) { 
	return Math.round(val*100)/100;
}
