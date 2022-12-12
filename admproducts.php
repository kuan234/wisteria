<?php
$connect = mysqli_connect("localhost","root","","wisteria");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <!---icon--->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!---stylesheet-->
    <link rel="stylesheet" href="admproduct.css">
</head>

<body>
    <div class="container1"> 
        <h3>Add Products</h3>
        <div class="block">
            
        <form name="form1" action="" method="POST" enctype="multipart/form-data">
        <table border="1">
                <tr>
                <td>Product Name</td>
                <td><input type="text" name="product_name"></td>
                </tr>

                <tr>
                    <td>Product Price</td>
                    <td><input type="text" name="product_price"></td>
                </tr>

                <tr>
                    <td>Product Description</td>
                    <td><input type="text" textarea cols="5" rows="5" name="product_description"></td>
                </tr>

                <tr>
                    <td>Product Quantity</td>
                    <td><input type="text" name="product_quantity"></td>
                </tr>

                <tr>
                    <td>Product Image</td>
                    <td><input type="file" name="product_image" accept='.jpg, .jpeg, .png'></td>
                </tr>

                <tr>
                    <td>Product Category</td>
                <td>
                <select name="categories">
                    <option value="pot_plants">Pot Plants</option>
                    <option value="artificial_plants">Artificial Plants</option>
                    <option value="cactus">Cactus</option>
                    <option value="herbs">Herbs</option>
                </select>
                </td>
                </tr>
                
                <td colspan="2" align="center"><input type="submit" name="submit1" value="Upload"></td>



        </table>
        </div>
       
        </form>
        <!---refer to youtube link: https://www.youtube.com/watch?v=YGqtpdViNfo-->
<?php
if(isset($_POST["submit1"]))
{   
// </v=variable added to change uploaded picture name, video time:10.40/>
    $v1=rand(1111,9999);
    $v2=rand(1111,9999);
    $v3=$v1.$v2;
    $v3=md5($v3);

    $fnm = $_FILES["product_image"]["name"];
    $dst="../image/" .$fnm;
    $dst1=$fnm;
    move_uploaded_file($_FILES["product_image"]["tmp_name"],$dst);

    mysqli_query($connect,"INSERT INTO product VALUES
    ('','$_POST[product_name]','$_POST[product_price]','$dst1','$_POST[product_description]','$_POST[product_quantity]','$_POST[categories]')");
}
?>
        </div>
</body>

</html>
   