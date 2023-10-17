import React from 'react'
import ReactDOM from 'react-dom/client'
// import App from './App.jsx'
import router from './router.jsx'
import { RouterProvider } from 'react-router-dom'
import './index.css'

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    {/* <App /> */}
    {/* <h1>Hello, world!</h1> */}
    <RouterProvider router={router}/>
  </React.StrictMode>,
)
