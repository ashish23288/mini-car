import { Component, OnInit } from '@angular/core';
import { ToastrManager } from 'ng6-toastr-notifications';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup } from  '@angular/forms';
import { Item } from '../../Item';
import { ValidateService } from '../../services/validate.service';
import { DataService } from '../../services/data.service';

@Component({
  selector: 'app-model',
  templateUrl: './model.component.html',
  styleUrls: ['./model.component.css']
})
export class ModelComponent implements OnInit {
  form: FormGroup;
  uploadResponse;

  manufacturerList: Item[] = [];

  constructor(
    private formBuilder: FormBuilder,
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

  onFileSelect(event) {
    if (event.target.files.length > 0) {
      // console.log(event.target.name);
      const file = event.target.files[0];
      this.form.get(event.target.name).setValue(file);
    }
  }

  onAddModelSubmit(form){
    const model = {
      model_name:form.value.ModelName,
      manufacturer_id:form.value.manufacturerId,
      manufacturing_year:form.value.manufacturingYear,
      color:form.value.color,
      registration_no:form.value.registrationNumber,
      note:form.value.modelNote
    }

    const formData = new FormData();

    formData.append('model_name', model.model_name);
    formData.append('manufacturer_id', model.manufacturer_id);
    formData.append('manufacturing_year', model.manufacturing_year);
    formData.append('color', model.color);
    formData.append('registration_no', model.registration_no);
    formData.append('note', model.note);
    formData.append('picture1', this.form.get('picture1').value);
    formData.append('picture2', this.form.get('picture2').value);
    // console.log(model);
    if(!this.validateService.validateModel(model)){
      this.toastr.errorToastr('All Fields are Mandatory.');
      return false;
    }

    this.dataService.addModel( formData ).subscribe( result => {
      console.log(result);
      if(result.success){
        this.toastr.successToastr(result.success);
        this.router.navigateByUrl('/inventory');
      } else {
        this.toastr.errorToastr(result.error);
      }
    });
  }

  ngOnInit() {
    this.getManufacturerList();
    this.form = this.formBuilder.group({
      picture1: [''],
      picture2: ['']
    });
  }

}
