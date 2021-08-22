import React, { Component } from "react";
import Customer from "./Content";

class photography extends Component {

    onDelete = id => {
        this.props.onDelete(id);
      };
    
      onEdit = id => {
        this.props.onEdit(id);
      };
    
      render() {
        const customers = this.props.customers;
        return (
          <div className="data">
            <table className="ui celled table">
              
              <thead>
                <tr>
                  <th style={{ width: "50px", textAlign: "center" }}>#</th>
                  <th>Titile</th>
                  <th>Description</th>
                  <th>Image</th>
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
        );
      }
    }


export default photography;