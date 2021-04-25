/**
 * This code takes data from the user in the form click events and 
 * runs the game
 * 
 * Ranvir Singh,000819787
 */
console.log("outside load debug saved");

 $(document).ready( function(){

    
    //Declaring all neccessary variables
    // position of each 
    let positions=["","","","","","","","",""];
    
    // defining human player as o
    const player=Circle();
    // defining computer player as x  (ie using string values as ids of players)
    const computer=Cross();
    // states turn of current player(by default human but can be randomanized)
    let currentTurn=player;
    // win/loss data for displaying
    let wins=0;
    let loses=0;
    


    //alert("yo debugging here");
    console.log("inside load debug");


    // to put setpiece circle on the board
    function Circle()
    {
        return "o";
    }

    // to put setpiece cross on the board
    function Cross()
    {
        return "x";
    }

    



    // to clear board, but doesnot reset the array
    function clearBoard()
    {
        //clear board code
        $("td.box").html("");
        
    }




    //to update the SESSION and DB with Win(one win only)
    function updateWinSession(win)
    {

        // construct the url 
        let url = "addwin.php";
        

        console.log(url); // debug

        // do the fetch
        fetch(url, { credentials: 'include' })
            .then(response => response.json())
            .then(function(pass){if(pass!==-1){console.log("DB updated")}else{console.log("Error while updating DB")}})
        //update session and DB with wins
    }

    //to update the SESSION and DB with loss(one loss only)
    function updateLossSession(loss)
    {
        //update session and DB with loss
        // construct the url
        let url = "addloss.php";
        

        console.log(url); // debug

        // do the fetch
        fetch(url, { credentials: 'include' })
            .then(response => response.json())
            .then(function(pass){if(pass!==-1){console.log("DB updated")}else{console.log("Error while updating db")}})
        
    }


    function updateScoresDisplay()
    {

        //update scores on display
        let url = "Getscore.php";
        

        console.log(url); // debug

        // do the fetch
        fetch(url, { credentials: 'include' })
            .then(response => response.json())
            .then(function($data){

                if($data===-1){console.log("Error while retrieving scores , Try restarting Session");
            }else{
                wins=$data[0];
                loses=$data[1];
                $("#winsTarget").html("Your Wins: "+wins );
                $("#losesTarget").html("Your Loses: "+loses );
            }


                
        })
    }




    



    
    

    function putSetpieces(pos)
    {
        clearBoard();
        // draw all set pieces on the board
        $( "td.box" ).each(function() {
            
            // debug
            //console.log($(this).attr("id"));
            $(this).html(pos[parseInt($(this).attr("id"))]);
        });
        
    }



    // resets game and clears board
    function resetGame()
    {

        positions=["","","","","","","","",""];
        currentTurn=player;

        putSetpieces(positions);
        // resets the game 
    }

    

    // switch turn
    function switchTurn()
    {
        if(currentTurn===player)
            {
                currentTurn=computer;
            }else{currentTurn=player;}
    }

    //make turn
    function makeTurn(currentPlayer,position,pos)
    {
        
         pos[position]=currentPlayer;
         return pos;
    }



    // check if player has won or not
    function isWin(playerRec,currentPlayer)
    {
       




        if(playerRec[0]===currentPlayer&&playerRec[1]===currentPlayer&&playerRec[2]===currentPlayer)
        {
            return true;
        }
        else if(playerRec[3]===currentPlayer&&playerRec[4]===currentPlayer&&playerRec[5]===currentPlayer)
        {
            return true
        }
        else if(playerRec[6]===currentPlayer&&playerRec[7]===currentPlayer&&playerRec[8]===currentPlayer)
        {
            return true
        }
        else if(playerRec[0]===currentPlayer&&playerRec[3]===currentPlayer&&playerRec[6]===currentPlayer)
        {
            return true
        }

        else if(playerRec[1]===currentPlayer&&playerRec[4]===currentPlayer&&playerRec[7]===currentPlayer)
        {
            return true
        }
        else if(playerRec[2]===currentPlayer&&playerRec[5]===currentPlayer&&playerRec[8]===currentPlayer)
        {
            return true
        }
        else if(playerRec[0]===currentPlayer&&playerRec[4]===currentPlayer&&playerRec[8]===currentPlayer)
        {
            return true
        }
        else if(playerRec[2]===currentPlayer&&playerRec[4]===currentPlayer&&playerRec[6]===currentPlayer)
        {
            return true
        }else{
            return false;
        }
       
        
    }



    function computerTurn()
    {
        // computer turn
        let chosenNumber=Math.floor((Math.random() * 10));
        chosenNumber=chosenNumber-1;
        while(true)
        {
            if(chosenNumber<0)
            {
                chosenNumber=Math.floor((Math.random() * 10));
            }else{
                break;
            }
        }


        return chosenNumber+"";
    }


    function endMessage(message)
    {
        $("table").fadeOut(1000)

        setTimeout(function(){$("table").css("display","none")},1100)

        
        setTimeout(function()
        { 
            

            


            $("#resultTarget").css("display","block");
            $("#resultTarget").html(message );
            
            
             
        
        
        
        }, 1100);


        $("#PlayAgain").css("display","block");

        updateScoresDisplay();
        
    }



    $("#playButton").click(function(){

        resetGame();
        console.log("game reset");
        $("#resultTarget").fadeOut(1000);
        setTimeout(function(){$("#resultTarget").css("display","none")},1100)
        setTimeout(function()
        { 
            

            


            $("table").css("display","block");
            
            
            
             
        
        
        
        }, 1100);


        $("#PlayAgain").css("display","none");


    });





    
    
    

    // game click events
    putSetpieces(positions);

    $( "td.box" ).each(function() {
            
        $(this).click(function()
        {



            let playerMoved=false;

            let tie=true;
            // check tie
            for(let i=0;i<9;i++)
            {
                if(positions[i]==="")
                {
                    tie=false;
                }
            }

            if(tie)
            {
                endMessage("Its a Tie!");
                return;
            }

            // player turn
            if($(this).html()===""&&currentTurn===player&&!(tie)){
                playerMoved=true;
                positions=makeTurn(currentTurn,parseInt($(this).attr("id")),positions);
            }

            putSetpieces(positions);

            // if win logic for player
           
            if(isWin(positions,currentTurn))
            {
                if(currentTurn===player){
                    wins=wins+1;

                    console.log("user WIn");
                    updateWinSession();






                    //display message win message
                    endMessage("You Win");
                }else
                {
                    console.log("comp wins");
                    updateLossSession();
                    loses=loses+1;





                    // lose message
                    endMessage("You Lose!");
                }

                

                
            }else
            {
                // tie check
                tie=true;

                for(let i=0;i<9;i++)
                {
                    if(positions[i]==="")
                    {
                        tie=false;
                    }
                }

                if(tie)
                {
                    endMessage("Its a Tie!");
                    return;
                }
                switchTurn();
                

                

                //computers turn

                if(currentTurn===computer&&!tie&&playerMoved){
                    while(true)
                    {
                        let compSelectedPos= computerTurn();
                        if(positions[compSelectedPos]===""){
                            positions=makeTurn(currentTurn,compSelectedPos,positions);
                            break;
                        }
                    }

                    putSetpieces(positions);

                

                    if(isWin(positions,currentTurn))
                    {
                        if(currentTurn===player){
                             wins=wins+1;

                            console.log("user WIn");
                            //display message win message
                            updateWinSession
                            endMessage("You Win");
                        }else{
                            console.log("comp wins");
                            loses=loses+1;
                            updateLossSession();
                            // lose message
                            endMessage("You Lose!");
                        }

                        
                        
                    }else{

                        switchTurn();
                    
                        
                    }


            // debug
           console.log(parseInt($(this).attr("id")));
           console.log(positions[parseInt($(this).attr("id"))]);

           
                
                }


            }

            


            
            
            

            
            

            // if win then code block
        });


        
    });











});


