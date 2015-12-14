
    function updatePeople(data){

	$("#individualUpdates").html(data);
        console.log(data);
    }

    function getRecentUpdates() {
        $.ajax({
            type: "GET",
            url: "popular.php",
            async: true,
            cache: false,

            success: function(data){
                updatePeople(data);
                data = 0;
		console.log("longpolling a success");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                addmsg("error", textStatus + " (" + errorThrown + ")");
                setTimeout(
                    getRecentUpdates,
                    1000);
		console.log("Error timer");
            }
        });
    };

    var timer = setInterval(popTimer, 5000);
    function popTimer(){
        getRecentUpdates();
	console.log("timer ran!");
}





 
    function setNewPie(data){

	$("#eatmorepie").html(data);

    }

    function getNewPie(){
        $.ajax({
            type: "GET",
            url: "generatepie.php",
            async: true,
            cache: false,

            success: function(data){
                setNewPie(data);
		console.log("I successfully ate more pie!");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                addmsg("error", textStatus + " (" + errorThrown + ")");
                setTimeout(
                    getRecentUpdates,
                    1000);
		console.log("Error timer");
            }
        });
    };

var timer2 = setInterval(pieTimer, 5000);
    function pieTimer(){
        getNewPie();
	console.log("timer ran!");
}



