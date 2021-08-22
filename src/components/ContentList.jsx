import React, { Component } from "react";
import Customer from "./Content";

class ContentList extends Component {
  

  
  onDelete = id => {
    this.props.onDelete(id);
  };

  onEdit = id => {
    this.props.onEdit(id);
  };

  render() {
    const customers = this.props.customers;
    return (

<div class="container"> 
     <br />
     <a className="mini ui orange button" href="/adduser" role="button">ADD Littarature</a>
     <a className="mini ui orange button" href="/adduser" role="button">ADD Photography</a>
     <a className="mini ui orange button" href="/adduser" role="button">ADD Cinematography</a>
    <hr />
      <br />

      <div/>

      <div className="data">
        <table className="ui celled table">
          
          <thead>
            <tr>
              <th style={{ width: "50px", textAlign: "center" }}>#</th>
              <th>Titile</th>
              <th> Content Description</th>
              <th style={{ width: "148px" }}>Action</th>
              <th>View</th>
              <th>Download</th>
            </tr>
          </thead>


          <tbody>
            {customers.map(customer => {
              return (
                <Customer
                  key={customer.id}
                  customer={customer}
                  onDelete={this.onDelete}
                  onEdit={this.onEdit} />

              );
            })}
          </tbody>
        </table>
      </div>
      </div>
    );
  }
}

export default ContentList;
