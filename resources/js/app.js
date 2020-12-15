require('./bootstrap');

window.Vue = require('vue');

import iosAlertView from 'vue-ios-alertview';
Vue.use(iosAlertView);

import UsersComponent from './components/UsersComponent';
import ProfileComponent from './components/ProfileComponent';
import AdduserComponent from './components/AdduserComponent';
Vue.component('users-component', UsersComponent);
Vue.component('profile-component', ProfileComponent);
Vue.component('adduser-component', AdduserComponent);

import OutletsTableComponent from './components/Outlets/Table';
import CreateOutletComponent from './components/Outlets/Create';
import EditOutletComponent from './components/Outlets/Edit';
Vue.component('tableoutlet-component', OutletsTableComponent);
Vue.component('createoutlet-component', CreateOutletComponent);
Vue.component('editoutlet-component', EditOutletComponent);

import PackagesTableComponent from './components/Packages/Table';
import CreatePackageComponent from './components/Packages/Create';
import EditPackageComponent from './components/Packages/Edit';
Vue.component('tablepackage-component', PackagesTableComponent);
Vue.component('createpackage-component', CreatePackageComponent);
Vue.component('editpackage-component', EditPackageComponent);


const app = new Vue({
    el: '#app',
    data() {
        return {
            user: AuthUser
        }
    },
    methods: {
        userCan(permission) {
            if(this.user && this.user.allPermissions.includes(permission)) {
                return true;
            }
            return false;
        },
        MakeUrl(path) {
            return BaseUrl(path);
        }
    }
});
