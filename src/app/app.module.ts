import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { FormsModule,ReactiveFormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { AppRoutingModule } from './app-routing.module';
import { ToastrModule } from 'ng6-toastr-notifications';
import { DataTablesModule } from 'angular-datatables';

import { AppComponent } from './app.component';
import { SidebarComponent } from './components/sidebar/sidebar.component';
import { ManufacturerComponent } from './components/manufacturer/manufacturer.component';
import { ModelComponent } from './components/model/model.component';
import { InventoryComponent } from './components/inventory/inventory.component';
import { HomeComponent } from './components/home/home.component';


@NgModule({
  declarations: [
    AppComponent,
    SidebarComponent,
    ManufacturerComponent,
    ModelComponent,
    InventoryComponent,
    HomeComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
	  FormsModule,
    ReactiveFormsModule,
	  HttpModule,
    AppRoutingModule,
    DataTablesModule,
	  ToastrModule.forRoot()
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
