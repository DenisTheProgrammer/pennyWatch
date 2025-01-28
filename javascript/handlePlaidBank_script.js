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

        //process the access token to make the transactions available to the backend
        if(data.error){
            console.error("Error exchanging public token internally:", data.error);
        }
        else{
            const accessToken = data.accessToken;
            //fetch using the access token
            fetchTransactions(accessToken);
        }

    }catch(err){
        console.error("Error exchanging public token:", err);
    }
};

//fetch transactions using the access token
 const fetchTransactions = async(accessToken) => {
    try{
        const response = await fetch("../plaidController/fetch_transactions.php", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({accessToken: accessToken}),
        });
        
        if(!response.ok){
            throw new Error("Error fetching transactions");
        }

    }catch(err){
        console.error("Error fetching transactions:", err);
    }
};

//put it all together to get plaid working
const initialisePlaid = async() =>{
    try{
        const linkToken = await fetchLinkToken();
        const handler = Plaid.create({
            token: linkToken,
            onSuccess: async function(publicToken, metadata) {
                await exhangePublicToken(publicToken); //send the public token to the back end to get the access token
                alert("Bank Successfully Linked");
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
