import React, { Component } from "react";

class User extends Component {
  
  onDelete = () => {
    this.props.onDelete(this.props.user.userid);
  };

  onEdit = () => {
    this.props.onEdit(this.props.user);
  };

  
  render() {
    
    const { userid, username, name,email, phoneno,type } = this.props.user;
    return (
      
      <tr>
        <td style={{ textAlign: "center" }}>{userid}</td>
        <td>{`${username}`}</td>
        <td>{name}</td>
        <td>{email}</td>
        <td>{phoneno}</td>
        <td>{type}</td>
    
        <td>
          <button className="mini ui green button" onClick={this.onEdit}> Edit </button>
          <button className="mini ui red button" onClick={this.onDelete}>Delete </button>
        </td>

    

      </tr>
    );
  }
}

export default User;