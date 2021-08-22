import React, { Component,  useState } from "react";
import ReactDom from "react-dom";
import Header from "./components/Header"
import App from "./components/App";

function App1(){
    return(
        <div>
            < Header/>
        </div>
    );
}


ReactDom.render(<App />, document.querySelector("#root"));