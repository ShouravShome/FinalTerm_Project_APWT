import React, { Component } from "react";

class Content extends Component {
  
  onDelete = () => {
    this.props.onDelete(this.props.customer.id);
  };

  onEdit = () => {
    this.props.onEdit(this.props.customer);
  };

  onView = () => {
    this.props.onEdit(this.props.customer);
  };

  render() {
    
    const { id, title, cdescription, cstatus } = this.props.customer;
    return (
      
      <tr>
        <td style={{ textAlign: "center" }}>{id}</td>
        <td>{`${title}`}</td>
        <td>{cdescription}</td>
    
        <td>
          <button className="mini ui green button" onClick={this.onEdit}> Edit </button>
          <button className="mini ui red button" onClick={this.onDelete}>Delete </button>
        </td>

        <td>  <button className="mini ui yellow button" onClick={this.onView}>View </button></td>
        <td> <button className="mini ui blue button" onClick={this.onDownload}>Download </button></td>

      </tr>
    );
  }
}

export default Content;
