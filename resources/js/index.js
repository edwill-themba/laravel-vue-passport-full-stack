import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
  state: {
    loginToken:localStorage.getItem('loginToken') || null,
    data_packets:[],
    user:localStorage.getItem('userName') || null,   
  },
  getters:{
   // check if user is logged in
    isLoggedIn(state){
      return state.loginToken !== null;
    },
    allDataPackets(state){
      return state.data_packets;
    },
    getCurrentUser(state){
      return state.user;
    },
  },
  mutations: {
    // user login
    loginUser(state,token){
      state.loginToken = token;
    },
    // user logout
    logoutUser(state){
      state.loginToken = null;
    },
    getAllDataPackets(state,data_packets){
      state.data_packets = data_packets;
    },
   currentUserLogin(state,user){
      state.user = user;
    },
   
  },
  actions: {
    /**
     * user log in with valid credentials and returns a login token
     */
      loginUser({ commit },credentials){
       return new Promise((resolve,reject) => {
          axios.post('api/login',
            {email:credentials.email,password:credentials.password})
          .then((response) => {
            resolve(response);
            localStorage.setItem('loginToken',response.data.token);
            commit('loginUser',response.data);
          })
          .catch((error) =>{
              console.log('error is'+error);
              reject(error);
          })
       })
      },
      /**
       * get the current user name
       * @param {*} param0 
       */
      currentUserLogin({ commit }){
        let api_token = localStorage.getItem('loginToken');
        axios.defaults.headers.common['Authorization'] = `Bearer ${api_token}`;
        return new Promise((resolve,reject) => {
          axios.get('api/user')
          .then((response) => {
            resolve(response);
            localStorage.setItem('userName',response.data.name);
            commit('currentUserLogin',response.data.name);
          })
          .catch((error) => {
            reject(error);
          })
        })
         
      },
      /**
       *  user logout
      */
     logoutUser({ commit }){
      let api_token = localStorage.getItem('loginToken');
      axios.defaults.headers.common['Authorization'] = `Bearer ${api_token}`;
       // check first if the user is logged in
      if (api_token != null){
       return new Promise((resolve,reject) => {
          axios.post('api/logout',{})
           .then(() =>{
             console.log('logged out successfully');
             localStorage.removeItem('loginToken');
             localStorage.removeItem('userName');
             commit('logoutUser',null);
           })
           .catch((error) => {
             console.log(error.message);
             localStorage.removeItem('loginToken');
             localStorage.removeItem('userName');
           })
       })
      }
     },
     /** Gets all the data packets */
     getAllDataPackets({ commit }){
      let api_token = localStorage.getItem('loginToken');
      axios.defaults.headers.common['Authorization'] = `Bearer ${api_token}`;
       return new Promise((resolve,reject) => {
         axios.get('api/data_packets')
         .then((response) => {
           resolve(response);
           commit('getAllDataPackets',response.data);
         })
         .catch((error) => {
           console.log('error'+error.message);
           reject(error);
         })
       })
      },
      /** end get all the data packets */
     
   },
  modules: {
  }
})
 