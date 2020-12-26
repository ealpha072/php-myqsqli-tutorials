<?php 
    //connect to mysql;using mysqli procedural;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myDB";

    //create a connection;
    $conn = mysqli_connect($servername,$username,$password,$database);
    //check connection;
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    //echo "Connection successfull";

    //create a database
    /*$db = "CREATE DATABASE myDB";
    if(mysqli_query($conn,$db)){
        //the mysqli_query is used to create an sql query, has two param,the connection and the query..
        echo "Database created";
    }else{
        echo "Error creating database: ".mysqli_error($conn);
    }*/


    // create a table;

    /*$sql = "CREATE TABLE MyGuests
    (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        red_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";*/
/*firt is datatype then other optional atributes for each created column...
notnull-null values not allowed, default value-set default value when none is given: 
unsigned-used for number types,limits stored data to positives and zero:
auto-increment-auto increases with each entry..*/
    
    /*if(mysqli_query($conn,$sql)){
        //the mysqli_query is used to create an sql query, has two param,the connection and the query..
        echo "Table created successfully";
    }else{
        echo "Error creating table: ".mysqli_error($conn);
    }*/
    //adding data t table
    //$data = "INSERT INTO MyGuests(firstname,lastname,email) VALUES('Alpha','Emm','ealpha072@gmail.com')";


    /*if(mysqli_query($conn,$data)){
        //the mysqli_query is used to create an sql query, has two param,the connection and the query..
        echo "New record created";
    }else{
        echo "Error: " . $data . "<br>" . mysqli_error($conn);
    }*/
    //for multiple queries;
    /*$sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('Mary', 'Moe', 'mary@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('Julie', 'Dooley', 'julie@example.com')";   

    if(mysqli_multi_query($conn,$sql)){
        echo "New records created";
    }else{
        echo "Error. ". $sql. "<br>" . mysql_error($conn);
    }*/

    //with prepared statements
        //prepare and bind;
        /*$stmt = $conn->prepare("INSERT INTO MyGuests(firstname,lastname,email)VALUES(?,?,?)");
        //BIND
        $stmt->bind_param("sss",$firstname,$lastname,$email);//this function binds the parameters to the sql query and tells the db what the parameters are,sss specifies type of data:one s for ech type,s-string,i-interger,d-double,b-BLOB
        //set parameters and execute;
        $firstname = 'Harry';
        $lastname="Maguire";
        $email="harry@gmail.com";

        $firstname = 'david';
        $lastname = 'Bret';
        $email= 'davidbret@example.com';

        $stmt->execute();

        echo 'Newer records created';
        $stmt->close();*/

    //to select data from a database;
        $sql = "SELECT id,firstname,lastname FROM MyGuests";
        $results = mysqli_query($conn,$sql);
        if(mysqli_num_rows($results)>0){
            //output data of each row;
            while($row = mysqli_fetch_assoc($results)){
                //the assoc funct fetches a result row as an associative array.so, we store the result in a variable called row..
                echo "id: ".$row["id"]."-Name:". $row["firstname"]. " ". $row["lastname"]. "<br>";
            }
        }else{
                echo "No results";
        }


    //close connection;;connection autoatically close when script ends but to close before, use below...
    mysqli_close($conn);

 ?>