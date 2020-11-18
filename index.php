<!DOCUTYPE html>
<html>
    <head>
        <title>
            Pokedex!
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href ="css/default.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <h1>Welcome to my Gen 1 Pokedex</h1>
        <form id="pokeform">
            <div class="text">
                Pokemon Number 
                <select id ="pnum" name="pnum">
                    <option>Select One</option>
                </select>
                <input type ="submit"  value ="submit!">
            </div>
            
        </form>
        
       
        <div class ="text" style="margin-top: 20px">
            Your pokemon is...
        </div>
        <div id ="sprites" style="text-align:center">
            
        </div>
        <div id ="name" class="text">
        </div>
         <div id ="type" class ="text"> 
        </div>
    </body>
     <footer>
            <hr class="footer">
            CST 336 Internet Programming. 2020&copy; Davis<br/>
            <img src="img/csumblogo.png" alt="csumblogo"/>

        </footer>
    <script>
    $(document).ready(function (){
        for (let i = 1; i<152; i++){
            $("#pnum").append(`<option value = "`+i+`">`+i+`</option>`);
        }
    });
    //getting the pokemon
        $("#pokeform").on("submit", async function(e){
            e.preventDefault();
            let url =  `https://pokeapi.co/api/v2/pokemon/`+$("#pnum").val();
            let response = await fetch (url);
            let data = await response.json();
            console.log(data);
            $("#sprites").html("");
            $("#sprites").append(`<img src ="${data.sprites.front_default}">`);
            $("#name").html("");
            $("#name").html("Name: ").append(`${data.name}`); 
            $("#type").html("");
            for (let i = 0; i<data.types.length; i++){
                 $("#type").html("Type: ").append(`${data.types[i].type.name} `); 
            }
        });
    </script>
</html>