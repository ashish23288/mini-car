import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { HomeComponent } from './components/home/home.component';
import { ManufacturerComponent } from './components/manufacturer/manufacturer.component';
import { ModelComponent } from './components/model/model.component';
import { InventoryComponent } from './components/inventory/inventory.component';


const routes: Routes = [
{path:'',component:HomeComponent},
{path:'manufacturer',component:ManufacturerComponent},
{path:'model',component:ModelComponent},
{path:'inventory',component:InventoryComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
