
import React, { useState, useEffect } from "react";
import axios from "axios";
import QRCode from "react-qr-code";

function UserInformation() {
    const [selectedFile, setSelectedFile] = useState();
    const [loadUserlist, setLoadList] = useState([]);
    const [name, setName] = useState("");
    const [desc, setDesc] = useState("");

    useEffect(() => {
        loadList();
    }, []);

    const loadList = async () => {
        const result = await axios.get("http://localhost:8000/api/user/information");
        setLoadList(result.data.reverse());
    };





    return (
        <>
            <h1> User Details</h1>
            {loadUserlist.map((name) => (
                <div className="data">
                    <table className="ui celled table">
                        <thead>
                            <tr>
                                <th style={{ width: "50px", textAlign: "center" }}>#</th>
                                <th>Full Name</th>
                                <th>Contact</th>
                                <th>Picture</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style={{ textAlign: "center" }}>{name.userid}</td>
                                <td>{name.name}</td>
                                <td>
                                    <QRCode
                                        value={`${name.email} ${name.phoneno}`}
                                        size={100}
                                        level={"H"}
                                        includeMargin={true}
                                    />
                                </td>
                                <td><img class="card-img-top hover-shadow" src={"http://localhost:8000/" + name.profilepic} alt="Card image cap" style={{ height: "110px" }} /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            ))}
        </>
    );
}
export default UserInformation;