import React from 'react';
import registrationImage from './../images/reg.jpg';
import './../css/login.css'; 
import { Link } from "react-router-dom";
import {useRef} from "react";
import axiosClient from "../axios-client";
import { useStateContext } from "../contexts/ContextProvider";

export default function signup(){
    const nameRef=useRef();
    const emailRef=useRef();
    const phoneRef=useRef();
    const passwordRef=useRef();
    const confirmPasswordRef=useRef();

    const {setUser,setToken}=useStateContext();

    const onSubmit=(ev)=>{
        ev.preventDefault();
        const payload={
            name:nameRef.current.value,
            email:emailRef.current.value,
            phone:phoneRef.current.value,
            password:passwordRef.current.value,
            confirm_password:confirmPasswordRef.current.value
        }
        axiosClient.post('/signup',payload)
        .then(({data})=>{
            setUser(data.user);
            setToken(data.token);
        })
        .catch(err=>{
            if(err.message){
                console.log(err.message)
                // if(err.status==422){
                //     console.log(err.response.data.errors);  
                // }
            }
        })
    }
    return (
        <div className="wrapper">
          <div className="inner">
            <div className="image-holder">
              <img src={registrationImage} style={{ objectFit: 'fill', maxHeight: '780px' }} alt="" />
            </div>
            <form action="">
              <h3>Sign Up</h3>
              <div className="form-holder active">
                <input type="text" ref={nameRef} placeholder="name" className="form-control" />
              </div>
              <div className="form-holder">
                <input type="text" ref={emailRef} placeholder="e-mail" className="form-control" />
              </div>
              <div className="form-holder">
                <input type="text" ref={phoneRef} placeholder="Phone Number" className="form-control" />
              </div>
              <div className="form-holder">
                <input type="password" ref={passwordRef} placeholder="Password" className="form-control" style={{ fontSize: '15px' }} />
              </div>
              <div className="form-holder">
                <input type="password" ref={confirmPasswordRef} placeholder="Confirm Password" className="form-control" style={{ fontSize: '15px' }} />
              </div>
              <div className="checkbox">
                <label>
                  <span className="checkmark"></span>
                </label>
              </div>
              <div className="form-login">
                <button type='submit' onClick={onSubmit}>Sign up</button>
                <p>Already have an account? {' '}
                <Link to="/login">Login</Link></p>
              </div>
            </form>
          </div>
        </div>
      );
}