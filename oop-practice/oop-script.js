
document.getElementById('occupation-button')
.addEventListener('click', activate);

document.getElementById('object-button')
.addEventListener('click', createObject);


const convertedJSON = {};


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


function activate() {
  let id = document.getElementById('id').value;

  let jsonList = [
    ['household', 'household_json.php?id='+id],
    ['occupation', 'occupation_json.php?id='+id],
    ['tax', 'tax_json.php?id='+id],
    ['land', 'land_json.php?id='+id],
    ['real_estate', 'real_estate_json.php?id='+id],
    ['livestock', 'livestock_json.php?id='+id]
  ];

for (let i = 0; i < jsonList.length; i++) {
  getJSON(jsonList[i]);
};};



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
      sum += parseInt(this.land[i]['area'], 10);
    }
    return sum;
  };
  totalLandIncome() {
    let sum = 0;
    for (let i = 0; i < this.land.length; i++) {
      sum += parseInt(this.land[i]['income'], 10);
    }
    return sum;
  };
  totalRealEstateIncome() {
    let sum = 0;
    for (let i = 0; i < this.realEstate.length; i++) {
      sum += parseInt(this.realEstate[i]['income'], 10);
    }
    return sum;
  };
  totalLivestockIncome() {
    let sum = 0;
    for (let i = 0; i < this.livestock.length; i++) {
      sum += parseInt(this.livestock[i]['income'], 10);
    }
    return sum;
  };
  totalOccupationIncome() {
    let sum = 0;
    for (let i = 0; i < this.occupation.length; i++) {
      sum += parseInt(this.occupation[i]['income'], 10);
    }
    return sum;
  };
  totalIncome() {
    let sum = this.totalLandIncome() + 
              this.totalLivestockIncome() + 
              this.totalOccupationIncome() + 
              this.totalRealEstateIncome();
    return sum; 
  }
}


function createObject() {
  const house1 = new Household(convertedJSON);
  console.log(house1);
  console.log(house1.totalLandArea());
  console.log(house1.totalLandIncome());
  console.log(house1.totalLivestockIncome());
  console.log(house1.totalOccupationIncome());
  console.log(house1.totalRealEstateIncome());
  console.log(house1.totalIncome());
  console.log(house1.tax[0]['type'])
}

