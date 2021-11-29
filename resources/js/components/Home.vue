<template>
    <div>
        <div class="row">
            <div class="col-sm-9">
                <div class="login">
                   <h4>Enter Your Login Details Below</h4>
                   <form class="frm-login"  v-on:submit.prevent="onLogin()">
                       <div class="form-group">
                            <input type="email" name="email" v-model="credetials.email" class="form-control" placeholder="enter email address" required>
                       </div>
                       <div class="form-group">
                            <input type="password" name="password" v-model="credetials.password" class="form-control" placeholder="enter your password" required>
                       </div>
                       <div class="form-group">
                            <input type="submit" value="login" class="btn btn-login">
                       </div>
                   </form>
                </div>
                <!-- error message  display -->
                 <div class="error" v-if="errorMessage">
                      <div class="alert alert-danger">
                          {{ errorMessage }}
                      </div>
                 </div>
                <!-- end error  -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'Home',
    data() {
        return {
            credetials:{
                email:'',
                password:'',
            },
            errorMessage:'',
        }
    },
    methods: {
        onLogin(){
           this.$store.dispatch('loginUser',this.credetials)
           .then((response) => {
               console.log('token is'+ response.data.token);
               this.getCurrentUser();
               this.$router.push({path:'/dashboard'});
           })
           .catch((error) => {
               this.errorMessage = error.message+' '+'and make sure password and email are incorrect';
               console.log('error'+error);
           })
        },
        // get current user logged in
        getCurrentUser(){
             this.$store.dispatch('currentUserLogin')
           .then((response) => {
               console.log('current user is'+ response.data.name);
             })
           .catch((error) => {
               this.hasError = true;
               this.errorMessage = error.message;
               console.log('error'+error.message);
           })
        },
    },
}
</script>

.<style scoped>
.login{
    text-align: center;
    font-family: "Poppins";
    font-weight: 600;
    margin-top: 40px;
    margin-left:400px;
    padding:2px 5px;
    width: 500px;
    height: auto;
}
.login h4{
    margin-bottom: 10px;
}
.frm-login{
    width:470px;
    margin-left:10px;
    padding:10px;
}
.frm-login input{
    margin-top: 10px;
}
.btn-login{
    width: 100%;
    background: #111;
    color: #fff;
}
.error{
    text-align: center;
    font-family: "Poppins";
    font-weight: 600;
    margin-top: 40px;
    margin-left:400px;
    padding:2px 5px;
    width: 500px;
    height: auto;
}
@media(max-width: 960px){
.login{
    text-align: center;
    font-family: "Poppins";
    font-weight: 300;
    margin-top: 30px;
    margin-left:60px;
    padding:2px 5px;
    width: 300px;
    height: auto;
}
.login h4{
    margin-bottom: 10px;
    font-size: 13px;
}
.frm-login{
    width:270px;
    margin-left:10px;
    padding:10px;
}
.frm-login input{
    margin-top: 10px;
    font-size: 13px;
}
.btn-login{
    width: 100%;
    background: #111;
    color: #fff;
    font-size: 13px;
}
.error{
    text-align: center;
    font-family: "Poppins";
    font-weight: 300;
    margin-top: 30px;
    margin-left:60px;
    padding:2px 5px;
    width: 300px;
    height: auto;
    font-size: 13px;
}
}
</style>
