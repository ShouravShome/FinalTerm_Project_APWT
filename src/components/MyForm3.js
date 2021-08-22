import React, { Component } from "react";
class MyForm3  extends Component {
    state ={
        form: { username: "", name: "", email: "", phoneno:"", type: "", isEdit: false },
        btnName: "Submit",
        btnClass: "ui primary button submit-button"
    };

    isEmpty(obj) {
        return Object.entries(obj).length === 0 && obj.constructor === Object;
    }
    componentDidUpdate(prevProps){
        if (prevProps !== this.props && !this.isEmpty(this.props.user)){
            this.setState({
                form: {...this.props.user, isEdit: true},
                btnName: "Update",
                btnClass: "ui orange button submit-button"

            });
           // console.log("update");
        }
    }
 
        handleChange = event => {
            const { name, value } = event.target;
            let form = this.state.form;
            form[name]= value;
            this.setState({ form });
        };

        onFormSubmit = event => {
            event.preventDefault();
          if (this.formValidation()) {
               console.log("ready to create");
              this.props.onFormSubmit(this.state.form);
           }
           this.clearFormFields();
        };

        formValidation = () => { 
            if (document.getElementsByName("username")[0].value === " ") {
                alert("Enter User Name");
                return false;
           }
           
               if (document.getElementsByName("name")[0].value === " ") {
                   alert("Enter Name");
                 return false;
               }
               
                    if (document.getElementsByName("email")[0].value === " "){
                        alert("Enter email");
                        return false;
                   }
                    return true;
       };
        clearFormFields = () => {
            this.setState({
                form: { username: "", name: "", email: "", phoneno:"", type: "", isEdit: false }
            });
            this.setState({
                btnname:"Submit",
                btnClass: "ui primary button submit-button"
            })
            document.querySelector(".form").reset();

        };

    render() {
        return (
            <form className=" ui form">
                <div className="fields">
                    <div className="four wide field">
                        <label>UserName</label>
                        <input 
                        type="text" name="username" placeholder="userName"
                        onChange={this.handleChange}
                        value={this.state.form.username} />
                    </div>
                    <div className="four wide field">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="name"
                        onChange={this.handleChange}
                         value={this.state.form.name}  />
                    </div>
                    <div className="four wide field">
                        <label>E-mail</label>
                        <input type="email " name="email" placeholder="example@gmail.com"
                        onChange={this.handleChange}
                        value={this.state.form.email} />
                    </div>
                    
                    <div className="four wide field">
                        <label>Phoneno</label>
                        <input type="text" name="Phoneno" placeholder="Phoneno"
                        onChange={this.handleChange}
                        value={this.state.form.phoneno} />
                    </div>
                    <div className="four wide field">
                        <label>Type</label>
                        <input type="text" name="type" placeholder="type"
                        onChange={this.handleChange} 
                        value={this.state.form.type}/>
                    </div>

                    <div className="four wide field">
                        <button className={this.state.btnClass} onClick={this.onFormSubmit}>
                            {this.state.btnName}
                        </button>

                    </div>
                    

                </div>
            </form>

        ); 
    }
}
export default MyForm3;