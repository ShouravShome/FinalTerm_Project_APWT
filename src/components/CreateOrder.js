import React, { useState, useEffect } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import { useHistory } from "react-router-dom";

function CreateOrder() {
    const [selectedFile, setSelectedFile] = useState();
    const [loadimage, setLoadImage] = useState([]);
    const [ordername, setName] = useState("");
    const [orderdescription, setDesc] = useState("");
    let history = useHistory();

    useEffect(() => {
      
      }, []);
     
     


    const handleSubmission = async (e) => {
        const formData = new FormData();
        formData.append("file", selectedFile);
        formData.append("ordername", ordername);
        formData.append("orderdescription", orderdescription);
        await fetch("http://localhost:8000/api/order/information/add", {
            method: "POST",
            body: formData,
        })
            .then((result) => {
               
            })
            
    };

    function handleSubmit(event) {
      
        event.preventDefault();
      
        window.location.href = "/orderlist";
      }

    return (
        <form className="ui form" onSubmit={handleSubmit}>
            <div className="fields">
                <table>
                    <tr>

                        <div className="four wide feild">
                            <label>Order Name</label>
                            <input type="text" name="ordername" placeholder="Order Name" onChange={(e) => setName(e.target.value)} />
                        </div>
                    </tr>
                    <tr>
                        <div className="four wide feild">
                            <label>Order Description</label>
                            <input type="text" name="orderdescription" placeholder="Order Description" onChange={(e) => setDesc(e.target.value)} />
                        </div>
                    </tr>
                    <tr>
                        <div className="four wide feild">
                            <input type="file" name="picture" onChange={(e) => setSelectedFile(e.target.files[0])} />

                        </div>
                    </tr>
                    <div className="four wide feild">
                        <button type="submit" onClick={handleSubmission}   class="btn btn-success mb-3" name="submit">
                            Add
                        </button>

                    </div>

                </table>
            </div>
        </form>
    );
}
export default CreateOrder;