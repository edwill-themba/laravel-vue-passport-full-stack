<template>
    <div>
        <div class="container">
            <div class="row">
                <div>
                    <div class="data-packets-show-case">
                          <h4>Data Packet Information</h4>
                            <div v-for="data in data_packets.data" v-bind:key="data.id" class="card card-body">
                                <table class="table table-striped">
                                   <tr><td><strong>Device</strong></td><td>{{data.device}}</td></tr>
                                   <tr><td><strong>Time</strong></td><td>{{data.time}}</td></tr>
                                   <tr><td><strong>SNR</strong></td><td>{{data.snr}}</td></tr>
                                   <tr><td><strong>Station</strong></td><td>{{data.station}}</td></tr>
                                   <tr><td><strong>Data</strong></td><td>{{data.data}}</td></tr>
                                   <tr><td><strong>AvgSnr</strong></td><td>{{data.avgSnr}}</td></tr>
                                   <tr><td><strong>lat</strong></td><td>{{data.lat}}</td></tr>
                                   <tr><td><strong>lng</strong></td><td>{{data.lng}}</td></tr>
                                   <tr><td><strong>rssi</strong></td><td>{{data.rssi}}</td></tr>
                                   <tr><td><strong>SeqNumber</strong></td><td>{{data.seqNumber}}</td></tr>
                                </table>
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
        </div>
    </div>
</template>

<script>
export default {
    name:"Dashboard",
    data() {
        return {
        // data packets returned as array
         data_packets:[], 
         errorMessage:'',
         }
    },
    created() {
        this.getAllDataPackets();
    },
    methods: {
        // get all the data packets
        getAllDataPackets(){
         this.$store.dispatch('getAllDataPackets')
            .then((response) => {
                this.data_packets = response;
                console.log('data packets'+this.data_packets);
            })
            .catch((error) => {
                 this.errorMessage = error;
                console.log(error);
            })
      },
    },
}
</script>

<style scoped>
.data-packets-show-case{
    text-align: left;
    font-family: "Poppins";
    font-weight: 600;
    margin-top: 40px;
    margin-left:300px;
    padding:2px 5px;
    width: 500px;
    height: auto;
}
.data-packets-show-case h4{
    margin-bottom: 10px;
    text-align: center;
}
.data-packets-show-case ul li{
    list-style:none;
}
.error{
    text-align: center;
    font-family: "Poppins";
    font-weight: 600;
    margin-top: 40px;
    margin-left:0px;
    padding:2px 5px;
    width: 500px;
    height: auto;
}

@media(max-width:960px){
.data-packets-show-case{
    text-align: center;
    font-family: "Poppins";
    font-weight: 300;
    margin-top: 30px;
    margin-left:60px;
    padding:2px 5px;
    width: 300px;
    height: auto;
}
.data-packets-show-case h4{
    margin-bottom: 10px;
    font-size:15px;
}
.data-packets-show-case ul{
   margin-left: 5px; 
}
.error{
    text-align: center;
    font-family: "Poppins";
    font-weight: 300;
    margin-top: 5px;
    margin-left:10px;
    padding:2px 5px;
    width: 300px;
    height: auto;
    font-size: 13px;
}
}
</style>
