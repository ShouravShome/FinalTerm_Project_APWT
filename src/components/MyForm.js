import React, { Component } from "react";
import { Link } from "react-router-dom";

class MyForm extends Component {
    state = {
     
        form: { ordername: "", orderdescription: "", picture: "", isEdit: false },
        btnName: "Save",
        btnClass: "ui primary button submit-button"
    };

    isEmpty(obj) {
        return Object.entries(obj).length === 0 && obj.constructor === Object;
    }
    componentDidUpdate(prevProps) {
        if (prevProps !== this.props && !this.isEmpty(this.props.order)) {
            this.setState({
     
                form: { ...this.props.order, isEdit: true },
                btnName: "Update",
                btnClass: "ui orange button submit-button"
            });
        }
    }

    handleChange = event => {
        const { name, value } = event.target;
        
        let form = this.state.form;
        form[name] = value;
        this.setState({ form });
   
    };

    onFormSubmit = event => {
        //event.preventDefault();

        if (this.formValidation()) {
            //send form data to app
            this.props.onFormSubmit(this.state.form);
        }

        this.clearFormFeilds();

    };

    handleSubmit() {
        // do some check before setting redirect to true
        //this.setState({ redirect: true });
        window.location.href = "/orderlist"
    }

    formValidation = () => {
        if (document.getElementsByName("ordername")[0].value === "") {
            alert("Enter Order name");
            return false;
        }

        if (document.getElementsByName("orderdescription")[0].value === "") {
            alert("Enter Order Description");
            return false;
        }


        return true;
    };

    clearFormFeilds = () => {
        this.setState({
            form: { ordername: "", orderdescription: "", isEdit: false }
        });

        this.setState({
            btnName: "Save",
            btnClass: "ui primary button submit-button"
        });
        document.querySelector(".form").reset();
    };

    render() {
        return (
            <form className="ui form">
                <div className="fields">
                    <table>
                        <tr>

                            <div className="four wide feild">
                                <label>Order Name</label>
                                <input type="text" name="ordername" placeholder="Order Name" onChange={this.handleChange} value={this.state.form.ordername} />
                            </div>
                        </tr>
                        <tr>
                            <div className="four wide feild">
                                <label>Order Description</label>
                                <input type="text" name="orderdescription" placeholder="Order Description" onChange={this.handleChange} value={this.state.form.orderdescription} />
                            </div>
                        </tr>
                        <tr>
                            <div className="four wide feild">
                                <input type="file" name="picture" onChange={(event) => this.handleChange(event)} />
                               
                            </div>
                        </tr>
                        <div className="four wide feild">
                            <Link to="/orderlist"><button className="ui primary button submit-button" onClick={this.onFormSubmit} onSubmit={this.handleSubmit.bind(this)}>
                                Save
                            </button>
                            </Link>
                        </div>

                    </table>
                </div>
            </form>
        );
    }
}

export default MyForm;