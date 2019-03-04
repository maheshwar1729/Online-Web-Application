$app->get('/api/user', function(){
          require_once ('connect.php');
          $query = "SELECT * FROM ACCOUNTS order by id";
          $result=$mysqli->query($query);
          while($row=$result->fetch_assoc()) {
          $data[] = $row;
          }
          if (isset($data)) {
          echo json_encode($data);
          }
          
          });

$app->map (['GET','DELETE'],'/api/ACCOUNTS/{id}', function($request){
           require_once ('connect.php');
           $id = $request->getAttribute('id');
           
           $query1 = "DELETE from ACCOUNTS WHERE id = $id";
           
           $result1=$mysqli->query($query1);
           });

$app->map (['GET','POST'],'/api/post/{EMAIL}/{PASSWORD}', function($request){
           require_once ('connect.php');
           $EMAIL= $request->getAttribute('EMAIL');
           $PASSWORD = $request->getAttribute('PASSWORD');
           $query2 = "INSERT INTO ACCOUNTS (EMAIL, PASSWORD) VALUES ($EMAIL,$PASSWORD)";
           //$query = "INSERT INTO chat (user1,user2) VALUES ($user1,$user2)";
           $result2=$mysqli->query($query2);
           
           });


$app->put('api/put/{PASSWORD}', function ($request) {
          require_once ('connect.php');
          $PASSWORD = $request->getAttribute('PASSWORD');
          $query3 = "UPDATE ACCOUNTS SET PASSWORD = '1111' WHERE EMAIL = $PASSWORD";
          $sth=$mysqli->query($query3);
          
          });
