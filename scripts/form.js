// addresses = getData();

async function submitForm(form){

    var invalidInput = false;
    var alertMsg = "";



    // checks quantity for input less than 1 and if it is a number
    var quantity = document.OrderForm.quantity.value;
    if ((parseInt(quantity) < 1) || !(Number.isInteger(zip))) {
        invalidInput = true;
        alertMsg += "Bad input for quantity \n";
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

    var expiration = document.OrderForm.expiration.value
        if (!(/^[0-9]{2}\/[0-9]{2}$/.test(expiration))){
            invalidInput = true;
            alertMsg += "Bad input for credit card expiration \n"
        }
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