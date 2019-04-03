import { Component, OnInit } from '@angular/core';
import { ToastrManager } from 'ng6-toastr-notifications';
import { Router } from '@angular/router';
import { Item } from '../../Item';
import { ValidateService } from '../../services/validate.service';
import { DataService } from '../../services/data.service';

@Component({
  selector: 'app-model',
  templateUrl: './model.component.html',
  styleUrls: ['./model.component.css']
})
export class ModelComponent implements OnInit {
  manufacturerList: Item[] = [];

  constructor(
    private validateService: ValidateService,
    private dataService: DataService,
    private toastr: ToastrManager,
    private router: Router
   ) { }

  getManufacturerList(){
    this.dataService.getManufacturerList()
    .subscribe( result => {
        this.manufacturerList = result.data;
        console.log('data from dataservice',this.manufacturerList);
    });
  }

  onAddModelSubmit(form){
    const model = {
      model_name:form.value.ModelName,
      manufacturer_id:form.value.manufacturerId,
      manufacturing_year:form.value.manufacturingYear,
      color:form.value.color,
      registration_no:form.value.registrationNumber,
      note:form.value.modelNote,
      pic1:form.value.picture1,
      pic2:form.value.picture2
    }

    if(!this.validateService.validateModel(model)){
      this.toastr.errorToastr('All Fields are Mandatory.');
      return false;
    }

    // this.dataService.addManufacturer( manufacturer ).subscribe( result => {
    //   console.log(result);
    //   if(result.success == 1){
    //     this.toastr.successToastr('Manufacturer added successfully.');
    //     this.router.navigateByUrl('/model');
    //   } else if(result.success == 2) {
    //     this.toastr.errorToastr('Field can not be empty.');
    //   } else {
    //     this.toastr.errorToastr('Fails.');
    //   }
    // });
  }

  ngOnInit() {
    this.getManufacturerList();
  }

}
