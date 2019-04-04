import { Component, OnDestroy, OnInit } from '@angular/core';
import { ToastrManager } from 'ng6-toastr-notifications';
import { Subject } from 'rxjs';
import { Item } from '../../Item';
import { DataService } from '../../services/data.service';
declare var $: any 
@Component({
  selector: 'app-inventory',
  templateUrl: './inventory.component.html',
  styleUrls: ['./inventory.component.css']
})
export class InventoryComponent implements OnInit, OnDestroy {

  inventoryItemList: Item[] = [];
  modelList: Item[] = [];
  selectedItem: Item;
  dtOptions: DataTables.Settings = {};
  dtTrigger: Subject<any> = new Subject();

  constructor( private dataservice: DataService, private toastr: ToastrManager ) { }

  getInventoryItems() {
    this.dtOptions = {
      pagingType: 'full_numbers',
      processing: true
    };
    this.dataservice.getInventoryItems()
    .subscribe( result => {
        this.inventoryItemList = result.data;
        this.dtTrigger.next();
    });
  }
  getModelsDetail(model_name) {
    this.dataservice.getModelsDetail (model_name)
      .subscribe( result => {
        console.log(result);
          this.modelList = result.data;
      });
  }
  openModal( model_name ){
    this.selectedItem = model_name;
    this.getModelsDetail(model_name);
     $('#myModal').modal('show');
  }

  getSold(model_id){
    this.dataservice.soldModel (model_id)
      .subscribe( result => {
        if(result.success){
          this.toastr.successToastr(result.success);
          this.getModelsDetail(this.selectedItem);
          this.dtTrigger.unsubscribe();
          this.getInventoryItems();
        } else {
          this.toastr.errorToastr(result.error);
        }
      });
  }

  ngOnInit() {
    this.getInventoryItems();
  }
  ngOnDestroy(): void {
    this.dtTrigger.unsubscribe();
  }

}
