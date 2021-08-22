import React, { Component } from "react";
import Edit from "./Edit"
import { Link } from "react-router-dom";

class Content extends Component {

    onContentDetail = () =>{
        this.props.onContentDetail(this.props.content);
    }
   

    render() {
        const { id, title, image, pdf, video, cdescription } = this.props.content;
        return (
            <tr>
                <td style={{ textAlign: "center" }}>{id}</td>
                <td>{title}</td>
                <td>{cdescription}</td>
                <td>
                    <a href ={"http://localhost:8000/" + image}> <img src={"http://localhost:8000/" + image} alt="Card image cap" style={{ height: "110px" }}/></a>
                </td>
                <td>
                    <Link to="/details">< button className="mini ui green button" onClick={this.onContentDetail}>View</button></Link>
                </td>
            </tr>
        );
    }
}

export default Content;