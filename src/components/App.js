import React, { Component } from "react";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import axios from "axios";
import MyForm from "./MyForm";
import MyForm2 from "./MyForm2";
import MyForm3 from "./MyForm3";
import MyForm4 from "./MyForm4";
import OrderList from "./OrderList";
import Loader from "./Loader";
import Header from "./Header";
import Sidebar from "./Sidebar"
import ContentList from "./Home";
import Edit from "./Edit";
import Details from "./Details";
import "./app.css";
import CreateOrder from "./CreateOrder"
import UserInformation from "./UserInformation";
import Photography from "./photography";
import ContentList from "./ContentList";
import CustomerList from './CustomerList';

class App extends Component {
    state = {
        orders: [],
		customers: [],
        order: {},
        contents: [],
        content: {},
		users: [],
        user:{},
        loader: false,
		customer: {},
        url: "http://localhost:8000/api/order/information",
        url2: "http://localhost:8000/api/order/information/delete",
        url3: "http://localhost:8000/api/order/information/add",
        url4: "http://localhost:8000/api/order/information/edit",
        url5:"http://localhost:8000/api/content/information"
		url6: "http://localhost:8000/api/creator/content",
		url7: "http://localhost:8000/api/creator/content/delete",
		url8: "http://localhost:8000/api/creator/content/add",
		url9: "http://localhost:8000/api/creator/content/edit"
		url10:"http://localhost:8000/api/admin/user",
        url11:"http://localhost:8000/api/admin/user/delete",
        url12:"http://localhost:8000/api/admin/user/add",
        url13:"http://localhost:8000/api/admin/user/edit"
    };

    getContents = async () => {
        this.setState({ loader: true });
        const contents = await axios.get(this.state.url5);
        this.setState({ contents: contents.data, loader: false });
    }

    getOrders = async () => {
        this.setState({ loader: true });
        const orders = await axios.get(this.state.url);
        this.setState({ orders: orders.data, loader: false });
    };

    deleteOrder = async orderid => {
        this.setState({ loader: true });
        await axios.delete(`${this.state.url2}/${orderid}`);

        this.getOrders();
    };
    createOrder = async data => {
        console.log(data);
        this.setState({ loader: true });
        const formData = new FormData();
        formData.append('picture', data.picture);
        formData.append('ordername', data.ordername);
        formData.append('orderdescription', data.orderdescription);

        await axios.post(this.state.url3, formData);

        console.log(data);
        this.getOrders();
    };

    editOrder = async data => {
        this.setState({ order: {}, loader: true });
        await axios.put(`${this.state.url4}/${data.orderid}`, {
            ordername: data.ordername,
            orderdescription: data.orderdescription
        });
        this.getOrders();
    };

    componentDidMount() {
        this.getOrders();
        this.getContents();
		this.getUsers();
		this.getCustomers();
    }

	getCustomers = async () => {
    this.setState({ loader: true });
    const customers = await axios.get(this.state.url6);
    this.setState({ customers: customers.data, loader: false });
  };

  deleteCustomer = async id => {
    this.setState({ loader: true });
    await axios.delete(`${this.state.url7}/${id}`).catch(e => {
      alert(e.response.status === 404 ? "Content not found" : "");
    });

    this.getCustomers();
  };

  createCustomer = async data => {
    this.setState({ loader: true });
    await axios
      .post(this.state.url8, {
        title: data.title,
        cdescription: data.cdescription,
    

      })
      .catch(e => {
        alert(e.response.status === 500 ? "Content already exists" : "");
      });

    this.getCustomers();
  };


      editCustomer = async data => {
        this.setState({ customer: {} });

        this.setState({ loader: true });

        await axios
          .put(`${this.state.url9}/${data.id}`, {
            title: data.title,
            cdescription: data.cdescription,
          

          })
          .catch(e => {
            console.log(e.message);
          });

        this.getCustomers();
      };

    onDelete = orderid => {
        //console.log("app", userid);
        this.deleteOrder(orderid);
    };

    onContentDetail = contentdata => {
        //console.log("app", data);
        this.setState({ content: contentdata });
    };

    onEdit = data => {
        //console.log("app", data);
        this.setState({ order: data });
    };

    onFormSubmit = (data) => {
        //console.log('app', data)
        if (data.isEdit) {
            //if is edit true
            this.editOrder(data);

        }
        else {
            this.createOrder(data);
        }
    };;


	getUsers = async()=>{
        this.setState({ loader: true });
        const users= await axios.get(this.state.url10);
        this.setState({ users: users.data, loader: false });
    };

   // deleteUser = async id =>{
        //this.setState({ loader: true});
       // await axios.delete(`${this.state.url2}/${id}`);
       // this.getUsers();

    //};
    deleteUser = async userid => {
        this.setState({ loader: true });
        await axios.delete(`${this.state.url11}/${userid}`).catch(e => {
        alert(e.response.status === 404 ? "Content not found" : "");
        });
     
        this.getUsers();
      };

// createUser = async data =>{
     //this.setState({ loader:true });
     //await axios.post(this.state.url3,{
       //  username: data.username,
      //   name: data.name,
       //  email:data.email,
        // phoneno:data.phoneno,
      //   type:data.type
   //  });
    // this.getUsers();

 //};

 createUser = async data => {
    this.setState({ loader: true });
    await axios.post(this.state.url12, {
        username: data.username,
      name: data.name,
      email:data.email,
      phoneno:data.phoneno,
      type:data.type
      });
    

    this.getUsers();
  };



 editUser = async data => {
    this.setState({ user: {} });

    this.setState({ loader: true });

    await axios.put(`${this.state.url13}/${data.userid}`, {
        username: data.username,
        name: data.name,
        email:data.email,
        phoneno:data.phoneno,
        type:data.type

      })
      .catch(e => {
        console.log(e.message);
      });

    this.getUsers();
  };



    render() {
        return (
		<>
		
                <div className = "ui fixed inverter mennu">
                    <div className = "ui container">
                        <a href = "/#" className = "header item">
                           
                        </a>
                    </div>
                </div>

                <div className = "ui main container">
                   <Sidebar/>
                    <MyForm4 customer = {this.state.customer} onFormSubmit = {this.onFormSubmit}/>
                    {this.state.loader ? <Loader/> : ""}
                    <CustomerList 
                        customers = {this.state.customers} 
                        onDelete = {this.onDelete}
                        onEdit = {this.onEdit}
                    />
                  {/*   <Contentview contents = {this.state.contents} /> */}
                </div>
		<div className="ui fixed inverted menu">
          <div className="ui container">
            <a href="/#" className="header item"> Content Management System
            </a>
          </div>
        </div>
        <div className="ui main container">
          <MyForm3 user={this.state.user} onFormSubmit={this.onFormSubmit} />
          {this.state.loader ? <Loader /> : ""}

          <UserList users={this.state.users}
            onDelete={this.onDelete}
            onEdit={this.onEdit}
          />
        </div>
      <Router>  
      
       <Switch>
       <Route path="/Photography"> <photography /> </Route>
       <Route path="/Myform"> <MyForm2 /> </Route>

       <Redirect to="/" />
           
  
       </Switch>
  
       </Router> 



      <div>
        <div className="ui fixed inverted menu">
          <div className="ui container">
            <br />
            <a href="/#" className="header item"> <h3>Content Management System </h3></a>
            
            <a href="/#" className="header item"> Littarature</a>
            <a href="/Photography" className="header item"> Photography</a>
            <a href="/#" className="header item"> Cinematography</a>
  
            <br>
            
            </br>
          </div>
        </div>



        <div className="ui main container">
          <MyForm2
            onFormSubmit={this.onFormSubmit}
            customer={this.state.customer}
          />
          {this.state.loader ? <Loader /> : ""}
          <ContentList
            customers={this.state.customers}
            onDelete={this.onDelete}
            onEdit={this.onEdit}
          />
        </div>
      </div>

            <Router>
                <div className="ui fixed inverted menu">
                    <div className="ui container">
                        <Header />
                    </div>
                </div>
                <Switch>
                    <div>

                        



                        <div className="ui main container">
                        <Route exact path='/' className="header item">
                            <h1> Welcome page</h1>
                        </Route>
                            <Route path='/home' className="header item">
                                <h1> <ContentList contents={this.state.contents}
                                    onContentDetail={this.onContentDetail}
                                /></h1>
                            </Route>
                            <Route path='/order'>
                                < CreateOrder />
                            </Route>
                            <Route path='/orderlist'>
                                <OrderList orders={this.state.orders}
                                    onDelete={this.onDelete}
                                    onEdit={this.onEdit}
                                />
                            </Route>
                            <Route path="/details">
                                < Details content={this.state.content}
                                 onContentDetail={this.onContentDetail}/>
                            </Route>
                            <Route path='/Edit'>
                                <Edit order={this.state.order}
                                    onDelete={this.onDelete}
                                    onEdit={this.onEdit}
                                />
                                <MyForm order={this.state.order} onFormSubmit={this.onFormSubmit} />
                                {
                                    this.state.loader ? <Loader /> : ""
                                }
                            </Route>
                            <Route path='/userlist'>
                                <UserInformation />
                            </Route>

                        </div>

                    </div>
                </Switch>
            </Router >
			</>
        );
    }
}

export default App;