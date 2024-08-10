
import {Navigate, createBrowserRouter} from "react-router-dom";
import Login from "./views/Login.jsx";
import Users from "./views/Users.jsx";
import Signup from "./views/Signup.jsx";
import NotFound from "./views/NotFound.jsx";
import DefaultLayout from "./Components/DefaultLayout.jsx";
import Dashboard from "./views/Dashboard.jsx";
import GuestLayout from "./Components/GuestLayout.jsx";
import UserForm from "./views/UserForm.jsx";
import Example from "./Components/Example.jsx";
import Tag from "./Components/Tag.jsx";


const router = createBrowserRouter([

    {
        path: '/' ,
        element: <DefaultLayout />,
        children : [

            {
                path: '/' ,
                element: <Navigate to = "/users" />
            },

            {
                path: '/dashboard' ,
                element: <Dashboard />
            },
            
            {
                path: '/users' ,
                element: <Users />
            },
            {
                path: '/users/new' ,
                element: <UserForm key="userCreate" />
            },
            {
                path: '/users/:id' ,
                element: <UserForm key="userUpdate" />
            },
        ]
    },

    {
        path: '/' ,
        element: <GuestLayout />,
        children : [

            {
                path: '/login' ,
                element: <Login />
            },
            {
                path: '/signup' ,
                element: <Signup />
            },
            
        ]
    },
    {
        path: '/cv' ,
        element: <Example />,
        
    },

    {
        path: '/certificates' ,
        element: <Tag />,
        
    },


    
    
    {
        path: '*' ,
        element: <NotFound/>
    },
])

export default router;