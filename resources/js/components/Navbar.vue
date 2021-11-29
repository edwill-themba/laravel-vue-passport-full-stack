<template>
    <div>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-2">
           <div class="container">
             <router-link class="brand" to="/" >Edwill<span>Technical</span></router-link>
             <!-- app navigation -->
             <div class="navigation">
                 <ul>
                     <li><router-link to="/">Home</router-link></li>
                     <li  v-if="isUserloggedIn"><router-link to="#">{{ getCurrentUser }}</router-link></li>
                      <li v-if="isUserloggedIn"><router-link to="/logout">Logout</router-link></li>
                     <li><router-link to="#">About Us</router-link></li>
                 </ul>
             </div>
             <!-- end navigation -->
             <!-- show toogle buttons on mobile screens -->
             <div class="toggle">
                <input type="checkbox" name="checkbox" id="checkbox">
                <label for="checkbox">
                    <i class="fas fa-bars bars" v-on:click="showNavbar()"></i>
                    <i class="fas fa-times cancel" v-on:click="hideNavbar()"></i>
                </label>
             </div>
             <!-- end toogle -->
           </div>
        </nav>
        <router-view></router-view>
    </div>
</template>


<script>
export default {
    name:'Navbar',
    computed:{
    isUserloggedIn(){
      return this.$store.getters.isLoggedIn;
    },
    getCurrentUser(){
      return this.$store.getters.getCurrentUser;
    },
   },  
    methods: {
        // show navbar on small screens
        showNavbar(){
           let navigation = document.querySelector(".navigation");
           navigation.classList.toggle("active");
        },
        //hide navbar on small screen
        hideNavbar(){
            let navigation = document.querySelector(".navigation");
            navigation.classList.remove("active");
        },
    },
}
</script>

<style>
body{
    margin: 0px;
    padding: 0px;
}
.brand{
    font-family:"Poppins";
    font-weight:600;
    color:#fff;
    text-decoration:none;
    font-size:20px;
}
.brand:hover{
    color:#00ff00;
}
.brand span{
    color: #00ff00;
    font-weight:800;
}
.navigation{
   margin-top:20px;
   margin-left:600px
}
.navigation ul li{
    list-style:none;
    display: inline;
    margin-left:10px;
}
.navigation ul li a{
    color: #fff;
    text-decoration:none;
    text-transform: capitalize;
    font-size: 18px;
    font-weight: 700;
}
.navigation ul li a:hover{
    color: #00ff00;
}
.toggle{
    float: right;
    line-height:60px;
    margin-top: 30px;
    margin-right: 30px;
}
label .bars{
    color:#fff;
}
label .cancel{
    color:#fff;
}
label .bars:hover{
    color:#00ff00;
}
label .cancel:hover{
    color:#00ff00;
}
label .bars,label .cancel{
    color: #fff;
    position: relative;
    line-height: 20px;
    cursor: pointer;
    margin-left: 5px;
    font-size:20px;
    display: none;
}
#checkbox{
    display:none;
}


@media(max-width:960px){
.brand{
    font-family:"Poppins";
    font-weight: 400px;
    color:#fff;
    text-decoration:none;
    font-size:16px;
     margin-left:20px;
     margin-top:3px;
}
.navigation{
    margin-top:700px;
    margin-left:100%;
    height:100vh;
    width:100%;
    background: #fff;
    position:absolute;
}
.navigation ul{
    margin-top:25px;
    margin-left:130px;
   
}
.navigation ul li{
    display:block;
}
.navigation ul li a{
    font-family: "Poppins";
    color:#111;
    font-weight:600;
    font-size: 14px;
}
.navigation.active{
    margin-left:0px;
 }
.toggle{
    display:block;
    margin-top:0px;
}
label .bars{
    display:block;
    font-size: 16px;
}
.checkbox{
    display:none;
}
#checkbox:checked ~ label .bars{
    display: none;
}
#checkbox:checked ~ label .cancel{
    display: block;
    font-size:16px;
}
#checkbox:checked ~ .navigation{
    left:0;
}
}
</style>
