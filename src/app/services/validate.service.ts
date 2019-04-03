import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ValidateService {

  constructor() { }

  validateManufacturer(manufacturer) {
    if(manufacturer.manufacturer_name == undefined || manufacturer.manufacturer_name == ''){
      return false;
    } else {
      return true;
    }
  }

  validateModel(model) {
    if(model.model_name == undefined || model.manufacturer_id == undefined || model.manufacturing_year == undefined || model.color == undefined ||
       model.registration_no == undefined || model.note == undefined || 
       model.model_name == '' || model.manufacturer_id == '' || model.manufacturing_year == '' || model.color == '' ||
       model.registration_no == '' || model.note == ''){
      return false;
    } else {
      return true;
    }
  }
}
