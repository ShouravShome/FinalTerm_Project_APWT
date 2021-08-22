import React from 'react'

const Navbar = () => {
return(
    <>
       
    <div  className="container-fluid nav_bg">
        <div className='row'>
          <div className="col-10 mx-auto">       
          </div>
      </div>
    </div>

    <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container" className="container-fluid">
        <a className="navbar-brand" href="/home"><b>Content Management System</b></a>
        <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
           
            <li className="nav-item">
              <a className="nav-link active" aria-current="page" href="/home">Home</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="/service">Littareture</a>
            </li>

            <li className="nav-item">
              <a className="nav-link" href="/about">Photography</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="/contact">Cinematography</a>
            </li>

            <li className="nav-item">
              <a className="nav-link" href="/contact">Orderlist </a>
            </li>
          
            
            <div class="logbutton">

            <td><a class="btn btn-primary" href="/login" role="button">Login</a></td>
           
            </div>
            
            <div class="logbutton1">

            <td><a class="btn btn-success" href="/login" role="button">Register</a></td>

            </div>
            

                </ul>
              </div>
            </div>
          </nav>

        


    </>

);

};

export default Navbar;

