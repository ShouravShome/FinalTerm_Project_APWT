import React, { Component } from "react";
import Edit from "./Edit"
import { Link } from "react-router-dom";

class Order extends Component {

    onDelete = () => {
        //console.log("customer on delete");
        this.props.onDelete(this.props.order.orderid);
    };
    onEdit = () => {
        //console.log("customer on edit");
        this.props.onEdit(this.props.order);
        <Link to="/Edit" >Edit</Link>

    };
    render() {
        const { orderid, ordername, orderdescription, picture } = this.props.order;
        return (
            <tr>
                <td style={{ textAlign: "center" }}>{orderid}</td>
                <td>{ordername}</td>
                <td>{orderdescription}</td>
                <td>
                    <img src={"http://localhost:8000/" + picture} alt="Card image cap" style={{ height: "110px" }}/>
                </td>
                <td>
                    <Link to="/Edit">< button className="mini ui green button" onClick={this.onEdit}>Edit</button></Link>
                    <button className="mini ui red button" onClick={this.onDelete}>Delete</button>
                </td>
            </tr>
        );
    }
}

export default Order;