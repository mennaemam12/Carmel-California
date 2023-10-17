import {createBrowserRouter} from 'react-router-dom';
import Home from './views/index.jsx';
import NotFound from './views/404.jsx';

const router = createBrowserRouter([
    // routes
    {
        path: '/',
        element: <Home />
    },
    {
        path: '*',
        element: <NotFound />
    }
])

export default router;