<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../admin/css/style.css" class="text/css">
  <title>Add Product</title>
  <script>
  function displaySuccessMessage() {
      alert("Product has been added successfully");
      window.location.href = "../admin/add_product.php";
    }
  </script>
</head>
<body>


<div class="container">
  <h2>Add Product</h2>
  <form method="POST" action="../backend/add_product.php" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Meat Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price (kg)</label>
      <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name="description" required></textarea>
    </div>

       

    <div class="mb-3">
      <label for="picture" class="form-label">Picture</label>
      <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
  </form>
</div>
</body>
</html>
