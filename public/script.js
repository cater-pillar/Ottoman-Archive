//select all buttons and tie them to relevant functions


document.getElementById('occupation-button')
.addEventListener('click', getOccupationForm);

document.getElementById('taxes-button')
.addEventListener('click', getTaxesForm);

document.getElementById('land-button')
.addEventListener('click', getLandForm);

document.getElementById('real-estate-button')
.addEventListener('click', getRealEstateForm);

document.getElementById('livestock-button')
.addEventListener('click', getLivestockForm);

document.getElementById('remove-occupation')
.addEventListener('click', removeOccupation);

document.getElementById('remove-taxes')
.addEventListener('click', removeTaxes);

document.getElementById('remove-land')
.addEventListener('click', removeLand);

document.getElementById('remove-real-estate')
.addEventListener('click', removeRealEstate);

document.getElementById('remove-livestock')
.addEventListener('click', removeLivestock);


// now I define variables to serve as counter for creating serial IDs 

var idNumberOccupation = 1;
var idNumberTaxes = 1;
var idNumberLand = 1;
var idNumberRealEstate = 1;
var idNumberLivestock = 1;

// These functions remove the last added form section and decrement the related counter.
// I tried to write one function that takes arguments, to use for all cases, but it did not work.



function removeOccupation() {
  let occupationDiv = document.getElementById('occupation-div');
  occupationDiv.removeChild(occupationDiv.lastChild);
  if(idNumberOccupation > 1) {idNumberOccupation--};
};

function removeTaxes() {
  let taxDiv = document.getElementById('taxes-div');
  taxDiv.removeChild(taxDiv.lastChild);
  if(idNumberTaxes > 1) {idNumberTaxes--};
};

function removeLand() {
  let landDiv = document.getElementById('land-div');
  landDiv.removeChild(landDiv.lastChild);
  if(idNumberLand > 1) {idNumberLand--};
};

function removeRealEstate() {
  let estateDiv = document.getElementById('real-estate-div');
  estateDiv.removeChild(estateDiv.lastChild);
  if(idNumberRealEstate > 1) {idNumberRealEstate--};
};

function removeLivestock() {
  let livestockDiv = document.getElementById('livestock-div');
  livestockDiv.removeChild(livestockDiv.lastChild);
  if(idNumberLivestock > 1) {idNumberLivestock--};
};



// this function will create a part of the form 
// that handles occupation related input

function getOccupationForm() {
 
  let xhr = new XMLHttpRequest();

  // I obtain data from table Occupation in JSON format
  xhr.open('GET', '/occupation', true); 

  xhr.onload = function() {
    if(this.status == 200) {
        
        let occupationsList = JSON.parse(this.responseText);

// I create a variable that will conatin an HTML string 
// for my form and use serial ID number  

        let output = `<div id="removeOccupation${idNumberOccupation}">
                    <div class="form-group">
                    <label for="occupation${idNumberOccupation}">Select Occupation
                    ${idNumberOccupation}:</label>
                    '<select id="occupation${idNumberOccupation}" 
                    name="occupation${idNumberOccupation}" class="form-control">`;
        
        // to add null value: <option value="null">--</option>

        // I use loop to add JSON table data to the string

        /* for (var i in occupationsList) {

          output += `<option value="${occupationsList[i][0]}">${occupationsList[i][1]}</option>`;
        }; */

        occupationsList.forEach( (i) => output += `<option value="${i['occupation_id']}">${i['name']}/${i['name_en']}</option>`);

        // Here I create the rest of the form 

        output += `</select>
                  </div>
                  <div class="form-group">
                  <label for="occupation_income${idNumberOccupation}">
                  Add Occupation Income:</label>
                  <input type="number" id="occupation_income${idNumberOccupation}" 
                         name="occupation_income${idNumberOccupation}"
                         class="form-control" placeholder="Estimated Yearly Income">
                  </div>
                  <div class="form-group">
                  <label for="occupation_type${idNumberOccupation}">
                  Choose Level of Proficiency:</label>
                  <select id="occupation_type${idNumberOccupation}" 
                          name="occupation_type${idNumberOccupation}" 
                          class="form-control">
                  <option value="">--</option>
                  <option value="Usta">Usta</option>
                  <option value="Kalfa">Kalfa</option>
                  <option value="Çırak">Çırak</option>
                  </select>
                  </div>
                  </div>`;
        
        // I append the HTML string to DOM using insertAdjacentHTML() method, increment the ID for the next form and empty out the output

        document.getElementById('occupation-div').insertAdjacentHTML("beforeend", output);
        idNumberOccupation++;
        output = '';
        
        
      };
  };
  xhr.send();
};

//All the following functions follow the same logic as the first one, with small adjustments

//TAX FUNCTION

function getTaxesForm() {

  let xhr = new XMLHttpRequest();

  xhr.open('GET', '/tax', true);

  xhr.onload = function() {
    if(this.status == 200) {
    
        var taxesList = JSON.parse(this.responseText);

        let output =`<div id="removeTaxes${idNumberTaxes}">
                    <div class="form-group"> 
                    <label for="taxes${idNumberTaxes}">Select Tax ${idNumberTaxes}:</label>
                    <select id="taxes${idNumberTaxes}" 
                            name="taxes${idNumberTaxes}" 
                            class="form-control">`;

        taxesList.forEach( (i) => output += `<option value="${i['tax_id']}">${i['type']}/${i['type_en']}</option>`);

        output += `</select>
                  </div>
                  <div class="form-group">
                  <label for="tax_amount${idNumberTaxes}">Add Tax Amount:</label>
                  <input type="number" id="tax_amount${idNumberTaxes}" 
                         name="tax_amount${idNumberTaxes}"
                  class="form-control" placeholder="Tax Amount">
                  </div>
                  </div>`;
        
        document.getElementById('taxes-div').insertAdjacentHTML("beforeend", output);
        idNumberTaxes++;
        output = '';
      };
  };
  xhr.send();
};

// LAND FUNCTION

function getLandForm() {

  let xhr = new XMLHttpRequest();

  xhr.open('GET', '/land', true);

  xhr.onload = function() {
    if(this.status == 200) {
    
        var landList = JSON.parse(this.responseText);

        let output = `<div id="removeLand${idNumberLand}">
                     <div class="form-group">
                     <label for="land_type${idNumberLand}">
                      Select Land ${idNumberLand}:</label>
                     <select id="land_type${idNumberLand}" 
                             name="land_type${idNumberLand}" 
                             class="form-control">`;


        landList.forEach( (i) => output += `<option value="${i['land_id']}">${i['type']}/${i['type_en']}</option>`);

        output += `</select>
                  </div>
                  <div class="form-group">
                  <label for="land_area${idNumberLand}">Add Area:</label>
                  <input type="number" id="land_area${idNumberLand}" 
                         name="land_area${idNumberLand}"
                   class="form-control" placeholder="Land Size">
                  </div>
                  <div class="form-group">
                  <label for="land_income${idNumberLand}">Add Income:</label>
                  <input type="number" id="land_income${idNumberLand}" 
                         name="land_income${idNumberLand}"
                   class="form-control" placeholder="Income from Land">
                  </div>
                  <div class="form-group">
                  <label for="land_rent${idNumberLand}">Add Payed Rent:</label>
                  <input type="number" id="land_rent${idNumberLand}" 
                         name="land_rent${idNumberLand}"
                   class="form-control" placeholder="Rent Payed to the Owner">
                  </div>
                  <div class="form-group">
                  <label for="land_location${idNumberLand}">Location:</label>
                  <textarea id="land_location${idNumberLand}" 
                            name="land_location${idNumberLand}"
                   class="form-control" placeholder="land's location..."></textarea>
                  </div>
                  <div class="form-group">
                  <label for="land_description${idNumberLand}">Description:</label>
                  <textarea id="land_description${idNumberLand}" 
                            name="land_description${idNumberLand}"
                   class="form-control" placeholder="additional notes..."></textarea>
                  </div>
                  </div>`;
        
        document.getElementById('land-div').insertAdjacentHTML("beforeend", output);
        idNumberLand++;
        output = '';
      };
  };
  xhr.send();
};

// REAL ESTATE FUNCTION

function getRealEstateForm(e) {
  e.preventDefault();

  let xhr = new XMLHttpRequest();

  xhr.open('GET', '/realestate', true);

  xhr.onload = function() {
    if(this.status == 200) {
    
        var realEstateList = JSON.parse(this.responseText);

        let output =`<div id="removeRealEstate${idNumberRealEstate}">
                    <div class="form-group"> 
                    <label for="real_estate${idNumberRealEstate}"> 
                      Select Real Estate ${idNumberRealEstate}:
                    </label>
                    <select id="real_estate${idNumberRealEstate}" 
                            name="real_estate${idNumberRealEstate}" 
                            class="form-control">`;


        realEstateList.forEach( (i) => output += `<option value="${i['real_estate_id']}">${i['type']}/${i['type_en']}</option>`);

        output += `</select>
                  </div>
                  <div class="form-group">
                  <label for="real_estate_quantity'+${idNumberRealEstate}">
                    Add Real Estate Quantity:
                  </label>
                  <input type="number" 
                         id="real_estate_quantity${idNumberRealEstate}"
                         name="real_estate_quantity${idNumberRealEstate}" 
                         class="form-control" 
                         placeholder="Number of Owned Objects">
                  </div>
                  <div class="form-group">
                  <label for="real_estate_income${idNumberRealEstate}">
                    Add Real Estate Income:
                  </label>
                  <input type="number" id="real_estate_income${idNumberRealEstate}"
                         name="real_estate_income${idNumberRealEstate}" 
                         class="form-control" placeholder="Income from Rent">
                  </div>
                  <div class="form-group">
                  <label for="real_estate_location${idNumberRealEstate}">
                    Location:
                  </label>
                  <textarea id="real_estate_location${idNumberRealEstate}"
                            name="real_estate_location${idNumberRealEstate}" 
                            class="form-control"
                   placeholder="real estate's location..."></textarea>
                  </div>
                  <div class="form-group">
                  <label for="real_estate_description${idNumberRealEstate}">
                    Description:
                  </label>
                  <textarea id="real_estate_description${idNumberRealEstate}" 
                            name="real_estate_description${idNumberRealEstate}" 
                            class="form-control"
                   placeholder="additional notes..."></textarea>
                  </div>
                  </div>`;
        
        document.getElementById('real-estate-div').insertAdjacentHTML("beforeend", output);
        idNumberRealEstate++;
        output = '';
      };
  };
  xhr.send();
};

// REAL LIVESTOCK FUNCTION

function getLivestockForm(e) {
  e.preventDefault();

  let xhr = new XMLHttpRequest();

  xhr.open('GET', '/livestock', true);

  xhr.onload = function() {
    if(this.status == 200) {
    
        var livestockList = JSON.parse(this.responseText);

        let output =`<div id="removeLivestock${idNumberLivestock}">
                    <div class="form-group">
                    <label for="livestock${idNumberLivestock}"> 
                      Select Livestock ${idNumberLivestock}:
                    </label>
                    <select id="livestock${idNumberLivestock}" 
                            name="livestock${idNumberLivestock}" 
                            class="form-control">`;

        livestockList.forEach( (i) => output += `<option value="${i['livestock_id']}">${i['type']}/${i['type_en']}</option>`);

        output += `</select>
                  </div>
                  <div class="form-group">
                  <label for="livestock_quantity${idNumberLivestock}">
                    Add Livestock Quantity:
                  </label>
                  <input type="number" 
                         id="livestock_quantity${idNumberLivestock}"
                         name="livestock_quantity${idNumberLivestock}" 
                         class="form-control" 
                         placeholder="Number of Owned Livestock">
                  </div>
                  <div class="form-group">
                  <label for="livestock_income${idNumberLivestock}">
                    Add Livestock Income:
                  </label>
                  <input type="number" 
                         id="livestock_income'${idNumberLivestock}"
                         name="livestock_incom${idNumberLivestock}" 
                         class="form-control" 
                         placeholder="Income from Livestock">
                  </div>
                  </div>`;
        
        document.getElementById('livestock-div').insertAdjacentHTML("beforeend", output);
        idNumberLivestock++;
        output = '';
      };
  };
  xhr.send();
};




