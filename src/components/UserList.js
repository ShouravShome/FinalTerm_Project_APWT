import React, { Component } from "react";
import User from "./User";

class UserList extends Component {
    onDelete = userid => {
        this.props.onDelete(userid); 
        //console.log("user list ", id);
    };

    onEdit = userid => {
        this.props.onEdit(userid ); 
       // console.log("user list ", data);
    };


    render(){
        const users = this.props.users;
        return(
            <div className="userid ">
                <table className=" ui celled table">
                    <thead>
                        <tr>
                        
                            <th style={{ width: "50px", textAlign: "center" }}>#</th>
                            <th>UserName</th>
                            <th>Name</th>
                            <th>E-mail</th>
                           
                            <th>Phoneno</th>
                            <th>Type</th>

                            <th style={{ width: "148px", textAlign: "center" }}>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {users.map(user => {
                            return(
                                 <User
                                  user={user} 
                                  key={user.userid}
                                  onDelete={this.onDelete}
                                  onEdit={this.onEdit}
                                  />
                            );
                        })}
                       
                    </tbody>
                </table>
            </div>
        );
    }
}
export default UserList;