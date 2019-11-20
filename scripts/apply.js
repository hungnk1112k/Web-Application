/**
* Author: Khanh Hung Nguyen, 102414836
* Target: Validate user input in apply.html
* Created: 17/04/2019
* Last update: 01/05/2019
* Credits:
*/

"use strict";

function init() {
	var debug = false;
	if (!debug) {
		 //register the event listener 
		document.getElementById("button").onclick = validate;
	}
	
	//Print Job Reference Number
	document.getElementById("Job_Reference_Number_Fill").textContent = localStorage.Job_Reference_Number;
	document.getElementById("Job_Reference_Number").value = localStorage.Job_Reference_Number;
	
	//fil form again while opening
	prefill_form();
	
	//Check if it's the first time the website is opened
	var first_open = sessionStorage.first_open;
	if (first_open == undefined) {
		sessionStorage.first_open = "wrong";
	}
}

function validate() {
	var result = true;

	validation: {	  
	//Check Job Number
	if (localStorage.Job_Reference_Number == undefined) {
		result = false;
		document.getElementById("apply_form").scrollIntoView();
		document.getElementById("Job_Num_None").textContent = "Please go to Job Description page and apply from there!";
		break validation;
	}
	
	//Check given name and family name
	var given_name = document.getElementById("Given_Name");
	var family_name = document.getElementById("Family_Name");
	var name_wrong = document.getElementById("Name_Wrong");
	if (!given_name.checkValidity()) {
		name_wrong.textContent = "Fill in your name with at most 20 alpha characters!";
		result = error(given_name);
		break validation;
	} else {
		correct(given_name,name_wrong);
	}
	
	if (!family_name.checkValidity()) {
		result = error(family_name);
		name_wrong.textContent = "Fill in your name with at most 20 alpha characters!";
		break validation;
	} else {
		correct(family_name,name_wrong);
	}
	
	//Validation for date of birth
	var DOB = document.getElementById("Date");
	var dob_wrong = document.getElementById("DOB_wrong")
	if (!DOB.checkValidity()) {
		result = error(DOB);
		dob_wrong.textContent = "Please fill in your date of birth in format dd/mm/yyyy!";
		break validation;
	} else {
		correct(DOB, dob_wrong);
		var DOB_split = DOB.value.split("/"); //https://www.w3schools.com/jsref/jsref_split.asp
		var check_DOB = new Date (DOB_split[1] + "/" + DOB_split[0] + "/" + DOB_split[2]); //Date in America in the form mm/dd/yyyy
		var current_date = new Date(); //https://www.w3schools.com/js/js_date_methods.asp
		if (current_date.getFullYear() - check_DOB.getFullYear() < 15 || current_date.getFullYear() - check_DOB.getFullYear() > 80) {
			result = error(DOB);
			dob_wrong.textContent = "Age must be between 15 and 80!";
			break validation;
		} else if (current_date.getFullYear() - check_DOB.getFullYear() == 15) {
			if (current_date.getMonth() < check_DOB.getMonth()) {
				result = error(DOB);
				dob_wrong.textContent = "Age can't be smaller than 15!";
				break validation;
			} else if (current_date.getMonth() == check_DOB.getMonth()) {
				if (current_date.getDate() < check_DOB.getDate()) {
					result = error(DOB);
					dob_wrong.textContent = "Age can't be smaller than 15!";
					break validation;
				}
			}
		} else if (current_date.getFullYear() - check_DOB.getFullYear() == 80) {
			if (current_date.getMonth() > check_DOB.getMonth()) {
				result = error(DOB);
				dob_wrong.textContent = "Age can't be greater than 80!";
				break validation;
			} else if (current_date.getMonth() == check_DOB.getMonth()) {
				if (current_date.getDate() >= check_DOB.getDate()) {
					result = error(DOB);
					dob_wrong.textContent = "Age can't be greater than 80!";
					break validation;
				}
			}
		}	
	}
	
	//Validation for gender
	var gender = getGender();
	if (gender == "Unknown") {
		result = false;
		document.getElementById("Gender_Wrong").textContent = "Please choose your gender!";
		document.getElementById("Gender").scrollIntoView()
		break validation;
	} else {
		document.getElementById("Gender_Wrong").textContent = "";
	}
	
	//Validation for address
	var address = document.getElementById("Address");
	var suburb_town = document.getElementById("Suburb/Town");
	var street_wrong = document.getElementById("Street");
		if (!address.checkValidity()) {
		result = error(address);
		street_wrong.textContent = "Fill in your address with at most 40 characters!";
		break validation;
	} else {
		correct(address, street_wrong);
	}
	
	if (!suburb_town.checkValidity()) {
		result = error(suburb_town);
		street_wrong.textContent = "Fill in your suburb/town with at most 40 characters!";
		break validation;
	} else {
		correct(suburb_town, street_wrong);
	}
	
	//Postcode based on chosen state
	var postcode_box = document.getElementById("Postcode");
	var postcode = postcode_box.value;
	var scroll_state = document.getElementById("State");
	var state = getState();
	var postcode_wrong = document.getElementById("postcode_wrong");
	if (!postcode_box.checkValidity()) {
		result = error(postcode_box);
		postcode_wrong.textContent = "Postcode must have exacly 4 digits";
		break validation;
	} else {
		correct(postcode_box, postcode_wrong);
		switch(state) {
		case "VIC":
			if (postcode[0] != "3") {
				if (postcode[0] != "8") {
					result = error(postcode_box);
					postcode_wrong.textContent = "VIC state must have postcode starts with 3 or 8! \n";
					break validation;
				}
			}
			break;
		case "NSW":
			if (postcode[0] != "1") {
				if (postcode[0] != "2") {
					result = error(postcode_box);
					postcode_wrong.textContent = "NSW state must have postcode starts with 1 or 2! \n";
					break validation;
				}
			}
			break;
		case "QLD":
			if (postcode[0] != "4") {
				if (postcode[0] != "9") {
					result = error(postcode_box);
					postcode_wrong.textContent = "QLD state must have postcode starts with 4 or 9! \n";
					break validation;
				}
			}
			break;
		case "NT":
		case "ACT":
			if (postcode[0] != "0") {
				result = error(postcode_box);
				postcode_wrong.textContent = "NT and ACT state must have postcode starts with 0! \n";
				break validation;
			}
			break;
		case "WA":
			if (postcode[0] != "6") {
				result = error(postcode_box);
				postcode_wrong.textContent = "WA state must have postcode starts with 6! \n";
				break validation;
			}
			break;
		case "SA":
			if (postcode[0] != "5") {
				result = error(postcode_box);
				postcode_wrong.textContent = "SA state must have postcode starts with 5! \n";
				break validation;
			}
			break;
		case "TAS":
			if (postcode[0] != "7") {
				result = error(postcode_box);
				postcode_wrong.textContent = "TAS state must have postcode starts with 7! \n";
				break validation;
			}
			break;
		}
	}
	
	//Validation for Email
	var email = document.getElementById("Email");
	var email_wrong = document.getElementById("Email_Wrong");
	if (!email.checkValidity()) {
		result = error(email);
		email_wrong.textContent = email.validationMessage;
		break validation;
	} else {
		correct(email, email_wrong);
	}
	//Validation for phone number
	var phone = document.getElementById("Phone");
	var phone_wrong = document.getElementById("Phone_Wrong");
	if (!phone.checkValidity()) {
		result = error(phone);
		phone_wrong.textContent = "Phone number must be from 8 to 12 digits, can include space!";
		break validation;
	} else {
		correct(phone, phone_wrong);
	}
	
	//If other skill is chosen		
	var other_checked = document.getElementById("Other");
	var other_skill_box = document.getElementById("Other_Skill");
	var other_skill = other_skill_box.value;
	var other_skill_wrong = document.getElementById("other_skill_wrong");
	
	if (other_skill != "") {
		other_checked.checked = true;
	}
	
	if (other_checked.checked) {
		if (other_skill == "") {
			result = error(other_skill_box);
			other_skill_wrong.textContent= "Please fill out your other skills!";
			break validation;
		} else {
			correct(other_skill_box, other_skill_wrong);
		}
	} 
	
	//Store data
	if (result) {
		store_information(given_name, family_name, DOB, gender, address, suburb_town, state, postcode, email, phone, other_skill);	
	}
	
	}
	//Output
	check_validation(result);
	return result;
}

function getState() {
	//initialize variable in case does not get reinitialized properly
	var state = "";
	
	//get an array of all input elements inside the fieldset element with id="species"
	var stateArray = document.getElementById("State").getElementsByTagName("option");
	
	for (var i = 0; i < stateArray.length; i++) {
		if (stateArray[i].selected) {
			state = stateArray[i].value;
		}
	}
	return state;
}

function Requirements_List() {
	var box = new Array();
	box[0] = document.getElementById("English");
	box[1] = document.getElementById("Bachelor_Degree");
	box[2] = document.getElementById("Programming");
	box[3] = document.getElementById("Work_Experience");
	box[4] = document.getElementById("Languages");
	box[5] = document.getElementById("Other");
	return box;
}

function getRequirements() {
	var requirements = new Array();
	var count = 0;
	var box = Requirements_List();
	
	for (var i = 0; i < box.length; i++) {
		if (box[i].checked) {
			requirements[count] = i;
			count += 1;
		}
	}
	return requirements;
}

function getGender() {
	var gender = "Unknown";
	
	//get an array of all input elements inside the fieldset element with id="species"
	var genderArray = document.getElementById("Gender").getElementsByTagName("input")
	
	for (var i = 0; i < genderArray.length; i++) {
		if (genderArray[i].checked) {
			gender = genderArray[i].value;
		}
	}
	return gender;
}

function store_information(given_name, family_name, DOB, gender, address, suburb_town, state, postcode, email, phone, other_skill) {
	sessionStorage.firstname = given_name.value;
	sessionStorage.lastname = family_name.value;
	sessionStorage.DOB = DOB.value;
	sessionStorage.gender = gender;
	sessionStorage.address = address.value;
	sessionStorage.suburb_town = suburb_town.value;
	sessionStorage.state = state;
	sessionStorage.postcode = postcode;
	sessionStorage.email = email.value;
	sessionStorage.phone = phone.value;
	sessionStorage.requirements = getRequirements(); //sessionStorage only supports string but not array
	sessionStorage.other_skill = other_skill;
}

function prefill_form() {
	if(sessionStorage.first_open == "wrong"  && localStorage.Job_Reference_Number != undefined && sessionStorage.firstname != undefined) { //if storage for username is not empty
		document.getElementById("Given_Name").value = sessionStorage.firstname;
		document.getElementById("Family_Name").value = sessionStorage.lastname;
		document.getElementById("Date").value = sessionStorage.DOB;
		document.getElementById("Address").value = sessionStorage.address;
		document.getElementById("Suburb/Town").value = sessionStorage.suburb_town;
		document.getElementById("Postcode").value = sessionStorage.postcode;
		document.getElementById("Email").value = sessionStorage.email;
		document.getElementById("Phone").value = sessionStorage.phone;
		document.getElementById("Address").value = sessionStorage.address;
		document.getElementById("Other_Skill").value = sessionStorage.other_skill;
		switch(sessionStorage.state) {
			case "VIC":
				document.getElementById("VIC").selected = true;
				break;
			case "NSW":
				document.getElementById("NSW").selected = true;
				break;
			case "QLD":
				document.getElementById("QLD").selected = true;
				break;
			case "NT":
				document.getElementById("NT").selected = true;
				break;
			case "WA":
				document.getElementById("WA").selected = true;
				break;
			case "SA":
				document.getElementById("SA").selected = true;
				break;
			case "TAS":
				document.getElementById("TAS").selected = true;
				break;
			case "ACT":
				document.getElementById("ACT").selected = true;
				break;
		}
		switch(sessionStorage.gender) {
			case "Male":
				document.getElementById("Male").checked = true;
				break;
			case "Female":
				document.getElementById("Female").checked = true;
				break;
			case "No Answer":
				document.getElementById("No_Answer").checked = true;
				break;
		}
		var printRequirements = sessionStorage.requirements; //printRequirements is now in string format
		var printRequirements_split = printRequirements.split(","); //turn printRequirements into an array
		var box = Requirements_List();
		for (var i = 0; i < printRequirements_split.length; i++) {
			box[printRequirements_split[i]].checked = true;
		}
	}
}

function check_validation(result) {
	if (result == false) {
		var span = document.getElementsByTagName("span");
		for (var i = 0; i < span.length; i++) {
			if (span[i].text != "") {
				span[i].style.color = "red"; //CSS in JS
				span[i].style.fontSize = "larger";
			}
		}	
	}
}

//When result is false/true
function error(object) {
	object.scrollIntoView();
	object.style.border = "solid red";
	return false;
}

function correct(object, message) {
	message.textContent = "";
	object.style.border = "";
}
window.onload = init;