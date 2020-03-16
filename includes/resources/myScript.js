const firstname = document.querySelector('#firstname');
const lastname = document.querySelector('#lastname');
const town_name = document.querySelector('#town_name');
const gender = document.querySelector('#gender');
const message = document.querySelector('#message');
const show_hide = document.querySelector('#show-hide');

// hide message div on form load
show_hide.style.display = 'none';

firstname.addEventListener("keypress", function() {
    if (firstname.style.borderColor == 'red') {
        firstname.style.borderColor = '';
        show_hide.style.display = 'none';
    }
});

lastname.addEventListener("keypress", function() {
    if (lastname.style.borderColor == 'red') {
        lastname.style.borderColor = '';
        show_hide.style.display = 'none';
    }
});

town_name.addEventListener("keypress", function() {
    if (town_name.style.borderColor == 'red') {
        town_name.style.borderColor = '';
        show_hide.style.display = 'none';
    }
});

function validate(){ 
   
    if (firstname.value == ""){ 
		show_hide.style.display = 'block';
        message.textContent = 'Please enter first name'; 
		firstname.focus(); 
		firstname.style.borderColor = 'red';
        return false; 
	} 
	
	if (firstname.value.length < 3){ 
		show_hide.style.display = 'block';
        message.textContent = 'First name must be at least 3 characters'; 
		firstname.focus(); 
		firstname.style.borderColor = 'red';
        return false; 
	} 

	if (lastname.value == ""){ 
		show_hide.style.display = 'block';
        message.textContent = 'Please enter last name'; 
		lastname.focus(); 
		lastname.style.borderColor = 'red';
        return false; 
	}

	if (town_name.value == ""){ 
		show_hide.style.display = 'block';
        message.textContent = 'Please enter town name'; 
		town_name.focus(); 
		town_name.style.borderColor = 'red';
        return false; 
	}
      
    if (gender.options[gender.selectedIndex].text == 'Select gender'){ 
        show_hide.style.display = 'block';
        message.textContent = 'Please select gender'; 
		gender.focus();  
        return false; 
    } 
   
    return true; 
}

//prevent form submission on refresh
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}