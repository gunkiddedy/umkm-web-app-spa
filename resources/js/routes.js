import Public from './pages/Public'
import Desa from './pages/Desa'
import Kecamatan from './pages/Kecamatan'
import Admin from './pages/Admin'
import Download from './pages/Download'
import Login from './pages/Login'
import InputData from './pages/InputData'
import Global from './pages/Global'
import PageNotFound from './pages/PageNotFound'
// import Template from './components/Template'

export default {
    mode: 'history',

    routes: [
        {
            path: '/public',
            component: Public,
            name: 'public'
        },
        {
            path: '/desa/:id',
            component: Desa,
            name: 'desa',
            props: true
        },
        {
            path: '/kecamatan/:id',
            component: Kecamatan,
            name: 'kecamatan',
            props: true
        },
        {
            path: '/input/:id',
            component: InputData,
            name: 'input',
            props: true
        },
        {
            path: '/global',
            component: Global,
            name: 'global',
        },
        {
            path: '/admin',
            component: Admin,
            name: 'admin',
        },
        {
            path: '/download',
            component: Download,
            name: 'download',
        },
        {
            path: '/login',
            component: Login,
            name: 'login'
        },
        {
            path: '*',
            component: PageNotFound,
            name: 'page-not-found'
        }

    ]
}