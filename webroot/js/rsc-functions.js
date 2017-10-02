/*!
 * rsc-functions.js
 * version : 1.0.0
 * author : Rick Chapman
 * license : MIT
 */

function rsc_Statistics(allCompanies) {

	var totalTO = 0;
	var totalEmp = 0;

	for	(index = 0; index < allCompanies.length; index++) {
		var turnover = Number(allCompanies[index].Company.turnover);
		if (!isNaN(turnover)) {
			totalTO = totalTO + turnover;
		}
		var employees = Number(allCompanies[index].Company.employees);
		if (!isNaN(employees)) {
			totalEmp = totalEmp + employees;
		}
	}

	console.log( "Turnover: " + totalTO );
	console.log( "Employees: " + totalEmp );

	var stats = {companies:allCompanies.length, employees:totalEmp, turnover:totalTO};

	return stats;
}

function rsc_formatCurrency(value) {
	if (value == 0 || value == 'null') {
		return 0;
	}
	numeral.language('en', {
		delimiters: {
			thousands: ',',
			decimal: '.'
		},
		abbreviations: {
			thousand: 'k',
			million: 'm',
			billion: 'Bn',
			trillion: 't'
		},
		ordinal: function (number) {
			var b = number % 10;
			return (~~ (number % 100 / 10) === 1) ? 'th' :
				(b === 1) ? 'st' :
				(b === 2) ? 'nd' :
				(b === 3) ? 'rd' : 'th';
		},
		currency: {
			symbol: '£'
		}
	});

	return numeral(value).format('0.0a');
}

function rsc_stringTruncate(str, max_length, suffix, margin) {

	if (null == str)
		return null;

    max_length = max_length | 0;
    if (undefined === suffix || null === suffix) {
        suffix = ' ...';
        margin = 4;
    }

    if (max_length <= 0 || str.length <= max_length + margin)
        return str;

	var shortText = jQuery.trim(str)
		.substring(0, max_length)
    	.split(" ").slice(0, -1).join(" ") + suffix;

	return shortText;
}

function rsc_tooltip(title, embedded) {
	
	var str = '<span data-toggle="tooltip" data-placement="top" title="' + title + '">';
	if (null == embedded) {
		str += '<span class="glyphicon glyphicon-info-sign"></span>';
	} else {
		str += embedded;
	}
	str += '</span>';
	return str;
}

function rsc_tickCross(value) {
	if (value) {
		return '<span class="glyphicon glyphicon-ok"></span>';
	} else {
		return '<span class="glyphicon glyphicon-remove"></span>';
	}
}

function rsc_viewIcon(controller, theId) {
	var icon = '<span class="glyphicon glyphicon-search"></span>';

	var theStr = '<a href="/' + controller + '/view/' + theId + '" data-toggle="modal" data-target="#myModal">';
	theStr += icon + '</a>&nbsp;';

	return theStr;
}

function rsc_editIcon(controller, theId, action) {
	var icon = '<span class="glyphicon glyphicon-edit"></span>';

	if (null == action)
		action = 'edit';
		
	var theStr = '<a href="/' + controller + '/' + action + '/' + theId + '" data-toggle="modal" data-target="#myModal">';
	theStr += icon + '</a>&nbsp;';

	return theStr;
}

function rsc_passwordIcon(controller, theId, action) {
	var icon = '<span class="glyphicon glyphicon-user"></span>';

	if (null == action)
		action = 'edit-password';
		
	var theStr = '<a href="/' + controller + '/' + action + '/' + theId + '" data-toggle="modal" data-target="#myModal">';
	theStr += icon + '</a>&nbsp;';

	return theStr;
}

function rsc_deleteIcon(controller, theId, deleteString) {
	var icon = '<span class="glyphicon glyphicon-remove"></span>';

	deleteString = typeof deleteString !== 'undefined' ? deleteString : "# " + theId;

	var postID = 'post_' + controller + '_' + theId;
	var theForm = '<form action="/' + controller + '/delete/' + theId + '" name="' + postID + '" id="' + postID + '" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form>';

	var theQuestion = 'Are you sure you want to delete ' + deleteString + '?';
	var theStr = '<a href="#" onclick="if (confirm(\'' + theQuestion + '\')) { document.' + postID + '.submit(); } event.returnValue = false; return false;">';
	theStr += icon + '</a>';

	return theForm + theStr;
}

function rsc_stdActions(controller, theId, editEnabled, deleteEnabled, deleteString) {

	var theStr = '';

	//theStr += '<span style=" white-space: nowrap;">';

	theStr += rsc_viewIcon(controller, theId);

	if (editEnabled) {
		theStr += rsc_editIcon(controller, theId);
	}

	if (deleteEnabled) {
		theStr += rsc_deleteIcon(controller, theId, deleteString);
	}

	//theStr += '</span>';

	return theStr;
}
