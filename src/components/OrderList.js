import React, { Component } from "react";
import Order from "./Order";

class OrderList extends Component {

    onDelete = orderid => {
        //console.log("user list", userid);
        this.props.onDelete(orderid);
    };

    onEdit = data => {
        //console.log("user list", userid);
        this.props.onEdit(data);
    };

    render() {
        const orders = this.props.orders;
        return (
            <div className="data">
                <table className="ui celled table">
                    <thead>
                        <tr>
                            <th style={{ width: "50px", textAlign: "center" }}>#</th>
                            <th>Order Name</th>
                            <th>Order Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        {
                            orders.map(order => {
                                return (
                                    < Order
                                        order={order}
                                        key={order.orderid}
                                        onDelete={this.onDelete}
                                        onEdit={this.onEdit}
                                    />
                                );
                            })
                        }
                    </tbody>
                </table>
            </div>
        );
    }
}

export default OrderList;