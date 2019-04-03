import { Component, OnInit } from '@angular/core';
import { ToastrManager } from 'ng6-toastr-notifications';
import { Router } from '@angular/router';
import { ValidateService } from '../../services/validate.service';
import { DataService } from '../../services/data.service';

@Component({
  selector: 'app-manufacturer',
  templateUrl: './manufacturer.component.html',
  styleUrls: ['./manufacturer.component.css']
})
export class ManufacturerComponent implements OnInit {
	name: String;
  constructor(
    private validateService: ValidateService,
    private dataService: DataService,
    private toastr: ToastrManager,
    private router: Router
  ) { }

  ngOnInit() {
  }

  onAddManufacturerSubmit(form){
    const manufacturer = {
      manufacturer_name:form.value.manufacturerName
    }

    if(!this.validateService.validateManufacturer(manufacturer)){
      this.toastr.errorToastr('Please fill Name field');
      return false;
    }

    this.dataService.addManufacturer( manufacturer ).subscribe( result => {
      console.log(result);
      if(result.success == 1){
        this.toastr.successToastr('Manufacturer added successfully.');
        this.router.navigateByUrl('/model');
      } else if(result.success == 2) {
        this.toastr.errorToastr('Field can not be empty.');
      } else {
        this.toastr.errorToastr('Fails.');
      }
    });
  }
}
