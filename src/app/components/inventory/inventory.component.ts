import { Component, OnInit } from '@angular/core';
import { Item } from '../../Item';
import { DataService } from '../../services/data.service';

@Component({
  selector: 'app-inventory',
  templateUrl: './inventory.component.html',
  styleUrls: ['./inventory.component.css']
})
export class InventoryComponent implements OnInit {

  inventoryItemList: Item[] = [];
  // selectedItem: Item;
  constructor( private dataservice: DataService ) { }

  getInventoryItems() {
      this.dataservice.getInventoryItems()
      .subscribe( result => {
          this.inventoryItemList = result.data;
          console.log('data from dataservice',this.inventoryItemList);
      });
  }

  ngOnInit() {
    this.getInventoryItems();
  }

}
