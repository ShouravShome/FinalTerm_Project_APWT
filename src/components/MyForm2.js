import React, { Component } from "react";

class MyForm extends Component {
  state = {
    form: { title: "", cdescription: "" ,isEdit: false },
    btnName: "Save",
    btnClass: "ui primary button submit-button"
  };

  isEmptyObj(obj) {
    return Object.entries(obj).length === 0 && obj.constructor === Object;
  }

  componentDidUpdate(prevProps) {
    if (prevProps !== this.props && !this.isEmptyObj(this.props.customer)) {
      this.setState({
        form: { ...this.props.customer, isEdit: true },
        btnName: "Update",
        btnClass: "ui orange button submit-button"
      });
    }
  }

  onFormSubmit = event => {
    event.preventDefault();

    if (this.formValidation()) {
      this.props.onFormSubmit(this.state.form);

      this.setState({
        btnName: "Save",
         btnClass: "ui primary button submit-button"
      });

      this.clearFormFields();
    }
  };

  handleChange = event => {
    const { name, value } = event.target;
    let form = this.state.form;
    form[name] = value;
    this.setState({ form });
  };


  formValidation = () => {
    if (document.getElementsByName("title")[0].value === "") {  alert("Enter Content Title");
      return false;
    }

    if (document.getElementsByName("cdescription")[0].value === "") {alert("Enter Description ");
      return false;
    }
    return true;
  };

 
  clearFormFields = () => {
   
    this.setState({
      form: { title: "", cdescription: "",   isEdit: false }
    });

    document.querySelector(".form").reset();
  };

  render() {
    return (
      <form className="ui form">
        <div className="fields">
          <div className="four wide field">
            <label>Title</label>
            
            <input type="text" name="title"  placeholder="Enter Title" onChange={this.handleChange} value={this.state.form.title}/>
           </div>

          <div className="four wide field">
            <label> Content Description</label>
            <input type="text" name="cdescription" placeholder="Enter Content " onChange={this.handleChange} value={this.state.form.cdescription}/>
          </div>

          <div className="two wide field">
            <button className={this.state.btnClass} onClick={this.onFormSubmit}>{this.state.btnName}</button>
          </div>

        </div>
      </form>
    );
  }
}

export default MyForm;
