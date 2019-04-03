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
}
