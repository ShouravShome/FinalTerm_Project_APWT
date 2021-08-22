import React, { Component } from "react";
import Content from "./Content";

class ContentList extends Component {

    onDelete = id => {
        //console.log("user list", userid);
        this.props.onDelete(id);
    };

    onContentDetail = contentdata => {
        //console.log("user list", userid);
        this.props.onContentDetail(contentdata);
    };

    render() {
        const contents = this.props.contents;
        return (
            <div className="data">
                <table className="ui celled table">
                    <thead>
                        <tr>
                            <th style={{ width: "50px", textAlign: "center" }}>#</th>
                            <th>Content Name</th>
                            <th>Content Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        {
                            contents.map(content => {
                                return (
                                    < Content
                                        content={content}
                                        key={content.id}
                            
                                        onContentDetail={this.onContentDetail}
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

export default ContentList;