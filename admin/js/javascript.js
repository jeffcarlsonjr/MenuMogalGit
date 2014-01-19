//========================================================================================================================================
//Validation of uploading a customer.
//========================================================================================================================================
function add_user_validate() {

	var name = document.forms[0].name.value;
	var address = document.forms[0].address.value;
	var city = document.forms[0].city.value;
	var state = document.forms[0].state.value;
	var phone = document.forms[0].phone.value;
	var hours = document.forms[0].hours.value;
	

	if(name == ""){
		alert('name is a required field');
		return false;
	}else if (address == ""){
		alert('address is required a required field');
		return false;
	}else if (city == ""){
		alert('city is required a required field');
		return false;
	}else if (state == ""){
		alert('state is a required field');
		return false;
	}else if (phone == ""){
		alert('phone is a required field');
		return false;
	}else if (hours == ""){
		alert('hours are a required fieid');
		return false;
	}


	return true;
}

