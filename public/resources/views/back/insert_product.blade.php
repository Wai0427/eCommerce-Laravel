
@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
<?php
if(isset($_POST['insert_product'])){

    $product_tile=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    
    // accessing image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if($product_tile=='' or $description=='' or $product_keywords=='' or $product_price='' or $product_image1=='' or $product_image2=='' or $product_image3=='' ){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"/images/users/$product_image1");
        move_uploaded_file($temp_image2,"/images/users/$product_image2");
        move_uploaded_file($temp_image3,"/images/users/$product_image3");

        // insert query
        $insert_products="insert into 'products' (product_title,product_description,product_keywords,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_tile','$description','$product_keywords','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

        $result_query=mysqli_query($mysqli,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the products!')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>

    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file link -->
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/style1.css" />
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" id="prodct_title" name="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" id="description" name="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" id="product_image1" name="product_image1" class="form-control" required="required">
            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" id="product_image2" name="product_image2" class="form-control" required="required">
            </div>

            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" id="product_image3" name="product_image3" class="form-control" required="required">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
    
</body>
</html>
@endsection

