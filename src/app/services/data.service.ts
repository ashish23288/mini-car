import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import { map, filter, scan } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class DataService {
  baseUrl = "http://localhost";
  constructor( private http:Http ) { }

  addManufacturer( manufacturer ) {
    let headers = new Headers();
    headers.append('contentType','application/json');
    return this.http
    .post(this.baseUrl+'mini-car/api/add_manufacturer.php',manufacturer,{headers:headers})
    .pipe(
        map(res => res.json())
    );
  }

  addModel( modal ) {
    let headers = new Headers();
    headers.append('contentType','application/json');
    return this.http
    .post(this.baseUrl+'mini-car/api/add_model.php',modal,{headers:headers})
    .pipe(
        map(res => res.json())
    );
  }

  getInventoryItems () {
      return this.http
      .get(this.baseUrl+'mini-car/api/get_inventory_details.php')
      .pipe(
          map(res => res.json())
      );
  }

  getManufacturerList () {
      return this.http
      .get(this.baseUrl+'mini-car/api/get_all_manufacturers.php')
      .pipe(
          map(res => res.json())
      );
  }

  getModelsDetail ( model_name ) {
      return this.http
      .get(this.baseUrl+'mini-car/api/get_detail.php?model_name='+model_name)
      .pipe(
          map(res => res.json())
      );
  }

  soldModel (model_id) {
    return this.http
    .get(this.baseUrl+'mini-car/api/update.php?model_id='+model_id)
    .pipe(
        map(res => res.json())
    );
  }

}
