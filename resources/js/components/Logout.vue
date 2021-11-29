<template>
    <div class="container">
        <div class="logout">
          <h1>You are successfully Logged Out</h1>
        </div>
    </div>
</template>

<script>
export default {
    name:'Logout',
    created() {
        this.onLogout();
    },
    methods: {
        onLogout(){
           this.$store.dispatch('logoutUser')
           .then(() =>{
             this.$router.push({name:'Home'})
            })
           .catch((error) => {
             this.$router.push({name:'Home'})
             this.hasError = true;
             this.errorMessage= error.message;
          })
        },
    },
}
</script>

<style scoped>
.logout{
    text-align:center;
     font-family: "Poppins";
     font-weight: 600;
}
.logout h1{
    margin: 30px 10px;
    font-size:25px;
}

@media(max-width:960px){
.logout{
    text-align:center;
     font-family: "Poppins";
     font-weight: 300;
}
.logout h1{
    margin: 30px 10px;
    font-size:14px;
}
}
</style>
