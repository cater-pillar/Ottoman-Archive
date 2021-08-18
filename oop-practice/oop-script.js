
document.getElementById('occupation-button')
.addEventListener('click', activate);

document.getElementById('object-button')
.addEventListener('click', createObject);


// An array of JSON files I want to use as data for creating a Household Object

const jsonList = [
  ['household', 'household_json.php'],
  ['occupation', 'occupation_json.php'],
  ['tax', 'tax_json.php'],
  ['land', 'land_json.php'],
  ['real_estate', 'real_estate_json.php'],
  ['livestock', 'livestock_json.php']
];

// An empty array where I plan to store the data from JSON files as sub arrays

const convertedJSON = {};

// function that convertes the given JSON file and pushes the data onto convertedJSON object

function getJSON(jsonFile) {
 
  let xhr = new XMLHttpRequest();
  xhr.open('GET', jsonFile[1], true); 
  xhr.onload = function() {
    if(this.status == 200) {    
        let result = JSON.parse(this.responseText);
        convertedJSON[jsonFile[0]] = result;
    };
  };
        xhr.send();          
        };

// Function loops through the JSON list and calls the getJSON() function in every iteration


function activate() {
for (let i = 0; i < jsonList.length; i++) {
  getJSON(jsonList[i]);
};};

// defining the Household class


class Household {
  constructor(jsonArray) {
    this.house = jsonArray['household'];
    this.occupation = jsonArray['occupation'];
    this.tax = jsonArray['tax'];
    this.land = jsonArray['land'];
    this.realEstate = jsonArray['real_estate'];
    this.livestock = jsonArray['livestock'];
  };
  totalLandArea() {
    let sum = 0;
    for (let i = 0; i < this.land.length; i++) {
      sum += parseInt(this.land[i][1], 10);
    }
    return sum;
  };
  totalLandIncome() {
    let sum = 0;
    for (let i = 0; i < this.land.length; i++) {
      sum += parseInt(this.land[i][2], 10);
    }
    return sum;
  };
  totalRealEstateIncome() {
    let sum = 0;
    for (let i = 0; i < this.realEstate.length; i++) {
      sum += parseInt(this.realEstate[i][2], 10);
    }
    return sum;
  };
  totalLivestockIncome() {
    let sum = 0;
    for (let i = 0; i < this.livestock.length; i++) {
      sum += parseInt(this.livestock[i][2], 10);
    }
    return sum;
  };
  totalOccupationIncome() {
    let sum = 0;
    for (let i = 0; i < this.occupation.length; i++) {
      sum += parseInt(this.occupation[i][1], 10);
    }
    return sum;
  };
  totalIncome() {
    let sum = this.totalLandIncome() + this.totalLivestockIncome() + this.totalOccupationIncome() + this.totalRealEstateIncome();
    return sum; 
  }
}

// Creating the object from the Household class

function createObject() {
  const house1 = new Household(convertedJSON);
  console.log(house1);
  console.log(house1.totalLandArea());
  console.log(house1.totalLandIncome());
  console.log(house1.totalLivestockIncome());
  console.log(house1.totalOccupationIncome());
  console.log(house1.totalRealEstateIncome());
  console.log(house1.totalIncome());
}

