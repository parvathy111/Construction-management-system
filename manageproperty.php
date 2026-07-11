<html>
  <body>
    <style>
       body{
        margin:0;

        padding:0;
      }
      th{
  background-color: orange;
  border:1px solid white;
}
button{
background-color:orange ;
border-radius: 5px;
height: 30px;
width:80px;
}
      
    </style>
  </body>
</html>
<header style="display:flex;background-color:black;padding-bottom: 20px;">
        <div style="display:block;background-color:black;margin-left: 30px;margin-top: 20px;"><a class="back" href="admindashboard.html" style="padding: 10px 16px;color:orange">BACK</a></div>
    </header>
<div>
    <h1 style="margin-left: 560px;color:orange">MANAGE PROPERTIES</h1>
    <div style="border: 1px solid white;">
        <fieldset>
        <br><table>
        <tr><td><h3 style="margin-left:700px;color:black">ADD</h3></td></tr>
        <form action="addproperty.php" method="post" enctype="multipart/form-data" >
        <tr><td><p style="margin-left: 25px;">Project Name</p></td><td><input type="text" name="name" style="margin-left:-24cm;"  required></td></tr>
        <tr><td><p style="margin-left: 290px;margin-top:-25px">Category</p></td><td><select name="cat" id="" style="margin-left: -670px;margin-top:-30px"  required>
            <option value="Traditional Residential">Traditional Residential</option>
            <option value="Traditional with courtyard">Traditional with courtyard</option>
            <option value="Contemporary Residential">Contemporary Residential</option>
            <option value="Flatroof residential">Flatroof residential</option>
            <option value="Villa">Villa</option>
            <option value="Modern Residential">Modern Residential</option>
        </select></td></tr>
        <tr><td><p style="margin-left: 540px;margin-top:-30px">description</p></td><td><input type="text" name="place" style="margin-left: -405px;margin-top:-35px"  required></td></tr>
        <tr><td><p style="margin-left: 785px;margin-top:-35px">Cost</p></td><td><input type="text" name="price" style="margin-left: -205px;margin-top:-40px"  required></td></tr>
        <tr><td><p style="margin-left: 980px;margin-top:-35px">photo</p></td><td><input type="file" name="image" style="margin-top: -40px;"  required></td></tr>
        <tr><td></td><td><button type="submit" name="add" style="margin-left:250px;margin-top:-55px;width:3cm">ADD</button></td></tr>
        </form>
        </table>
    </div>
    </fieldset>
    <fieldset>
    <div style="border: 1px solid white;padding:10px;border-collapse:collapse;margin-left:20px">
    <table >
    <tr>
        <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:3cm">id</th>
        <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm">name</th>
        <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm">price</th>   
        <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm">category</th>   
        <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm">place and description</th>
        <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm">Property status</th>   
        <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:3cm">image</th>   
        <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:1cm"></th>
        
    </tr>
 

<?php
   error_reporting(E_ERROR | E_PARSE);
    $con = new mysqli("localhost", "root", "", "project");
    // $sid=$_SESSION['userid'];
    if(isset($_POST['delete']))
{
    $id=$_POST['delete'];
    $res=$con->query("delete from property where id='$id'");
}
$res=$con->query("select * from property ");
if($res->num_rows>0)
{
    while($r=mysqli_fetch_array($res))
    {
        $id=$r['id'];
        $img=$r['photo'];
        echo"  <tr>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>".$r['id']."</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>".$r['name']."</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>".$r['price']."</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>".$r['category']."</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>".$r['place']."</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>".$r['property_status']."</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:50px;'><img src='uploads/$img' style='width:5cm'></td>
        
        <td style='border: 1px solid black;border-collapse:collapse;padding:50px;'><form action='' method='post'><button type='submit' name='delete' value='$id' id='dlbt'>DELETE</button></form></td>

    </tr>";
    }
}
else
{
    echo"You have no properties to sell.Please Add";
}


?>
</table>
    </div>
</fieldset>
</div>


