
document.getElementById('occupation-button')
.addEventListener('click', activate);

document.getElementById('object-button')
.addEventListener('click', createObject);

// An array of JSON files I want to use as data for creating a Household Object

const jsonList = [
  'household_json.php',
  'occupation_json.php',
  'tax_json.php',
  'land_json.php',
  'real_estate_json.php',
  'livestock_json.php'
];

// An empty array where I plan to store the data from JSON files as sub arrays

const convertedJSON = [];

// function that convertes the given JSON file and pushes the data onto convertedJSON array

function getJSON(jsonFile) {
 
  let xhr = new XMLHttpRequest();
  xhr.open('GET', jsonFile, true); 
  xhr.onload = function() {
    if(this.status == 200) {    
        let result = JSON.parse(this.responseText);
        console.log(result);
        convertedJSON.push(result);
    };
  };
        xhr.send();          
        };

// Function loops through the JSON list and calls the getJSON() function in every iteration
// ERROR: FOr some reason the order of items in the updated convertedJSON array is different each time the function is called

function activate() {
for (let i = 0; i < jsonList.length; i++) {
  getJSON(jsonList[i]);
};};

// defining the Household class


class Household {
  constructor(jsonArray) {
    this.house = jsonArray[0];
    this.occupation = jsonArray[1];
    this.tax = jsonArray[2];
    this.land = jsonArray[3];
    this.realEstate = jsonArray[4];
    this.livestock = jsonArray[5];
  };
  totalLandArea() {
    let sum = 0;
    for (let i = 0; i < this.land.length; i++) {
      sum += parseInt(this.land[i][1], 10);
    }
    return sum;
  };
}

// Creating the object from the Household class
// ERROR: Because the order in which data is pushed onto convertedJSON array is random data goes into wrong places withing the Household object

function createObject() {
  const house1 = new Household(convertedJSON);
  console.log(house1);
}
//console.log(convertedJSON);
//const house1 = new Household(convertedJSON);
//console.log(house1);
//console.log(house1.totalLandArea());
