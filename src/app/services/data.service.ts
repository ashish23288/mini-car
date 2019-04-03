import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import { map, filter, scan } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class DataService {

  constructor( private http:Http ) { }

  addManufacturer( manufacturer ) {
    let headers = new Headers();
    headers.append('contentType','application/json');
    return this.http
    .post('http://localhost:9090/mini-car/api/add_manufacturer.php',manufacturer,{headers:headers})
    .pipe(
        map(res => res.json())
    );
  }

  addModel( modal ) {
    let headers = new Headers();
    headers.append('contentType','application/json');
    return this.http
    .post('http://localhost:9090/mini-car/api/add_model.php',modal,{headers:headers})
    .pipe(
        map(res => res.json())
    );
  }

  getInventoryItems () {
      return this.http
      .get('http://localhost:9090/mini-car/api/get_inventory_details.php')
      .pipe(
          map(res => res.json())
      );
  }

  getManufacturerList () {
      return this.http
      .get('http://localhost:9090/mini-car/api/get_all_manufacturers.php')
      .pipe(
          map(res => res.json())
      );
  }

}
