// addresses = getData();

async function submitForm(form){

    var invalidInput = false;
    var alertMsg = "";
    var name_re = new RegExp("^[A-Za-z]+$");

    
    //check first name
    var fname = document.OrderForm.fname.value;
    if((fname.length == 0) || !(name_re.test(fname))){
        invalidInput = true;
        alertMsg += "Bad input for first name \n"
    }


    //check last name
    var lname = document.OrderForm.lname.value;
    if((lname.length == 0) || !!(name_re.test(lname))){
        invalidInput = true;
        alertMsg += "Bad input for last name \n"
    }

    // check if email matches the email format
    var email = document.OrderForm.email.value;
    const email_re = new RegExp("^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");
    if(!(email_re.test(email))){
        invalidInput = true;
        alertMsg += "Bad input for email \n"
    }


    // checks quantity for input less than 1 and if it is a number
    var quantity = document.OrderForm.quantity.value;
    if ((parseInt(quantity) < 1) || !(Number.isInteger(zip))) {
        invalidInput = true;
        alertMsg += "Bad input for quantity \n";
    }

    //check if phone matches the format 123-456-7890
    var phone = document.OrderForm.phone.value;
    var phone_re = new RegExp("^[+]?[\s./0-9]*[(]?[0-9]{1,4}[)]?[-\s./0-9]*$");
    if(!(phone_re.test(phone))){
        invalidInput = true;
        alertMsg += "Bad input for phone number \n"
    }

    //check for stress address
    var address1 = document.OrderForm.address1.value;
    var address1_re = new RegExp("^[a-zA-Z\s\d\/]*\d[a-zA-Z\s\d\/]*$");
    if(!(address1_re.test(address1)) || (address1.length == 0)){
        invalidInput = true;
        alertMsg += "Bad input for street address \n"
    }


    // checks if state city and zip match an entry in csv file
    var state = document.OrderForm.state.value;
    var city = document.OrderForm.city.value;
    var zip = document.OrderForm.zip.value;
    const validAddress = await getData(city, state, zip);
    if(!(validAddress)){
        alertMsg += "Bad input for address \n"
        invalidInput = true;
    }
    
    // check zip if it has 5 numbers and if it is a number
    var zip = document.OrderForm.zip.value;
    if((zip.length != 5) || !(Number.isInteger(zip))){
        invalidInput = true;
        alertMsg += "Bad input for zip code \n";
    }

    //check if credit card number has 16 digits and is a number
    var ccnum = document.OrderForm.ccnum.value;
    if ((ccnum.length != 16) && !(Number.isInteger(ccnum))) {
        invalidInput = true;
        alertMsg += "Bad input for credit card number \n"
        // alert(alertMsg);
    }

    //check credit card expiration date against regex
    var expiration = document.OrderForm.expiration.value
    const expiration_re = new RegExp("^[0-9]{2}\/[0-9]{2}$")
    if (!(expiration_re.test(expiration))){
        invalidInput = true;
        alertMsg += "Bad input for credit card expiration \n"
    }

    var cvv = document.OrderForm.cvv.value;
    if ((cvv.length != 3) && !(Number.isInteger(cvv))) {
        invalidInput = true;
        alertMsg += "Bad input for cvv code \n"
    }

    //all conditions passed, triggers mail client
    if(invalidInput){
        alert(alertMsg);
    }
    else{    
        form.submit()
    }
}

async function getData(city, state, zip) {
    const response = await fetch('./data/test.csv');
    const data = await response.text();
    const rows = data.split('\n')

    var validAddress = false;
    rows.forEach(entry => {
        const row = entry.split(',');
        const z = row[0];
        const c = row[3];
        const s = row[6];
        if ((z == zip) && (c == city) && (s == state)) {
            validAddress = true;
        }

    })
    return validAddress;
}

function generateStateOptions(){
    var states = ['AL', 'AK', 'AS', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FM', 'FL', 'GA',
    'GU', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA',
    'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND',
    'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT',
    'VT', 'VI', 'VA', 'WA', 'WV', 'WI', 'WY']

    var selectField = document.getElementById("state");
    states.forEach(state =>{
        option = document.createElement("option");
        option.text = state;
        option.value = state;
        selectField.appendChild(option);
    })
}