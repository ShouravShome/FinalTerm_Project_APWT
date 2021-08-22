import React, { Component } from "react";

class Details extends Component {

    onDelete = () => {
        //console.log("customer on delete");
        this.props.onDelete(this.props.order.orderid);
    };
    componentWillMount() {
        //console.log("customer on edit");
        this.props.onContentDetail(this.props.content);
    };
    render() {
        const { id, title, cdescription, crating, ccomplain, image, pdf, video } = this.props.content;
        return (
            <>
                <h1>Details of Content</h1>
                <table className="ui celled table">
                    <tr>
                        <td>
                            <h2>Content Id</h2>
                        </td>
                        <td>{id}</td>

                    </tr>
                    <tr>
                        <td>
                            <h2>Content Title</h2>
                        </td>
                        <td>{title}</td>

                    </tr>
                    <tr>
                        <td>
                            <h2>Content Description</h2>
                        </td>
                        <td>{cdescription}</td>

                    </tr>
                    <tr>
                        <td>
                            <h2>Content Image</h2>
                        </td>
                        <td>  <a href ={"http://localhost:8000/" + image}> <img src={"http://localhost:8000/" + image} alt="Card image cap" style={{ height: "110px" }}/></a></td>

                    </tr>
                    <tr>
                        <td>
                            <h2>Content PDF</h2>
                        </td>
                        <td> <a href ={"http://localhost:8000/" + pdf} download> Download </a></td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Content Video</h2>
                        </td>
                        <td> <a href ={"http://localhost:8000/" + video} download> Download </a></td>

                    </tr>
                </table>
            </>
        );
    }
}

export default Details;