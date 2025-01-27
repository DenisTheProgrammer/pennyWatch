window.onload = function () {
    initialisePlaid();
  };

//get the link token
const fetchLinkToken = async() => {
    try{
        const response = await fetch("../plaidController/generate_link_token.php"); //get the link token
        const data = await response.json();
        return data.link_token;
    }catch(err)
    {
        console.error("Error fetching link token:", err);
        throw err;
    }
};

//exchange the link token for a public token
const exhangePublicToken = async(publicToken) => {
    try{
        const response = await fetch("../plaidController/exchange_public_token.php", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({publicToken: publicToken}),
        });
        const data = await response.json();
        console.log("Access token:", data.access_token);
    }catch(err){
        console.error("Error exchanging public token:", err);
    }
};

//put it all together to get plaid working
const initialisePlaid = async() =>{
    try{
        const linkToken = await fetchLinkToken();
        const handler = Plaid.create({
            token: linkToken,
            onSuccess: async function(publicToken, metadata) {
                await exhangePublicToken(publicToken); //send the public token to the back end
            },
            onExit: function(err, metadata) {
                if (err){
                    console.error("User exited with error:", err);
                }
            },
        });

        document.getElementById("link").onclick = function(){
            handler.open();
        };
    }catch(err){
        console.error("Error initialising Plaid:", err);
    }
}
