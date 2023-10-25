import React from 'react';
import registrationImage from './../images/reg.jpg';
import './../css/login.css'; 
import { Link } from "react-router-dom";

export default function login(){
    const onSubmit=(ev)=>{
        ev.preventDefault();
    }

    return (
        <html>
          <head>
            <meta charSet="utf-8" />
            <title>Login</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="css/login.css" />
          </head>
          <body>
            <div className="wrapper">
              <div className="inner">
                <div className="image-holder">
                  <img src={registrationImage} style={{ objectFit: 'fill', maxHeight: '780px' }} alt="" />
                </div>
                <form action="">
                  <h3>Login</h3>
                  <div className="form-holder active">
                    <input type="text" placeholder="e-mail" className="form-control" />
                  </div>
                  <div className="form-holder">
                    <input type="password" placeholder="Password" className="form-control" style={{ fontSize: '15px' }} />
                  </div>
                  <div className="checkbox" style={{ display: 'none' }}>
                    <label>
                      <input type="checkbox" defaultChecked /> I agree to all statements in <a href="#">Terms & Conditions</a>
                      <span className="checkmark"></span>
                    </label>
                  </div>
                  <div className="form-login" style={{ marginTop: '10%' }}>
                    <button>Login</button>
                    <p> Don't have an account?{' '}
                     <Link to="/signup">Sign Up</Link> </p>
                  </div>
                </form>
              </div>
            </div>
          </body>
        </html>
      );
}