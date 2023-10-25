import { Link } from "react-router-dom";
import {useRef} from "react";
import axiosClient from "../axios-client";
import { useStateContext } from "../contexts/ContextProvider";
export default function signup(){
    const nameRef=useRef();
    const emailRef=useRef();
    const passwordRef=useRef();
    const passwordConfirmationRef=useRef();

    const {setUser,setToken}=useStateContext();

    const onSubmit=(ev)=>{
        ev.preventDefault();
        const payload={
            name:nameRef.current.value,
            email:emailRef.current.value,
            password:passwordRef.current.value,
            password_confirmation:passwordConfirmationRef.current.value
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
    return(
        <div className="login-signup-form animated fadeInDown">
            <div className="form">
                <h1 className="title">Signup for free</h1>
                <form onSubmit={onSubmit}>
                    <input ref={nameRef} type="text" placeholder="Full Name" />
                    <input ref={emailRef} type="email" placeholder="Email" />
                    <input ref={passwordRef} type="password" placeholder="Password" />
                    <input ref={passwordConfirmationRef} type="password" placeholder="Password Confirmation" />
                    <button className="btn btn-block">Signup</button>
                    <p className="message">
                        Alreday Registered? <Link to="/login">Sign in </Link>
                    </p>
                </form>

            </div>
        </div>
    )
}