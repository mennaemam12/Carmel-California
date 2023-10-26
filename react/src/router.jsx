import { createBrowserRouter } from "react-router-dom";
import { Navigate } from 'react-router-dom';
import Login from "./views/login.jsx";
import Signup from "./views/signup.jsx";
import Users from "./views/users.jsx";
import Dashboard from "./views/dashboard.jsx";
import NotFound from "./views/NotFound.jsx";
import GuestLayout from "./components/GuestLayout.jsx";
import DefaultLayout from "./components/DefaultLayout.jsx";
import Homepage from "./components/Homepage.jsx";
import AddMenuItem from "./views/add-item.jsx";


const router = createBrowserRouter([
    {
        path: '/',
        element: <Homepage />,
    },
    {
        path: '/',
        element: <DefaultLayout />,
        children: [
            {
                path: '/add-menu-item',
                element: <AddMenuItem />
            },
            {
                path: '/',
                element: <Users />
            },
            {
                path: '/users',
                element: <Users />
            },
            {
                path: '/dashboard',
                element: <Dashboard />
            }
        ]
    },
    {
        path: '/',
        element: <GuestLayout />,
        children: [
            {
                path: '/signup',
                element: <Signup />
            },
            {
                path: '/login',
                element: <Login />
            }
        ]
    },

    {
        path: '*',
        element: <NotFound />
    }
])

export default router;