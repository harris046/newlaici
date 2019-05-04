console.log("chat.js");

var cc = new ChatCamp({
    appId: "6530329265836126208",
})

//connect
cc.connect(username, function(error, user) {
    this.error = error;
    if(error === null){
        console.log("Connected to ChatCamp");

        //open channel
        cc.OpenChannel.get("5ccd3a6061544d0001193929", function(error, openChannel) {
            openChannel.join(function(error) {
                if(!error){
                    console.log("Open Channel Successfully Joined")
                }
            })
        })
    }
    else{
        console.log("Error => " + JSON.stringify(this.error) );
    }
})

