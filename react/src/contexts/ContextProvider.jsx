import { createContext, useContext, useState } from "react";
const StateContext=createContext( {
        user:null,
        token: null,
        setUser:()=>{},
        setToken:()=>{}
    }
);

export const ContextProvider=({children})=>{
    const [user,setUser]=useState(null);
    const [token,_SetToken]=useState(null);

    const setToken=(token)=>{
        _SetToken(token)
        if(token){
            localStorage.setItem('ACCESS_TOKEN',token);
        }
        else{
            localStorage.removeItem('ACCESS_TOKEN');
        }
    }

    return(
        <StateContext.Provider value={{
            user,
            token,
            setUser,
            setToken
        }}>
            {children}
        </StateContext.Provider>
    )
}

export const useStateContext=()=>useContext(StateContext)