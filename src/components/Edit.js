import React, { Component } from "react";

class Order extends Component {

    onDelete = () => {
        //console.log("customer on delete");
        this.props.onDelete(this.props.order.orderid);
    };
    componentWillMount  () {
        //console.log("customer on edit");
        this.props.onEdit(this.props.order);
    };
    render() {
        const { orderid, ordername, orderdescription } = this.props.order;
        return (
            <h1>Details</h1>
        );
    }
}

export default Order;