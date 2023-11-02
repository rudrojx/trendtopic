<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Blog Categories</title>
</head>
<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h2>Add Category</h2>
        <form id="categoryForm" method="POST" action="{{url('/storecategories')}}">
          @csrf
          <div class="form-group">
            <label for="categoryName">Category Name:</label>
            <input type="text" class="form-control" name="category_name" id="categoryName" placeholder="Enter category name" required>
          </div>
          <button type="submit" class="btn btn-primary" >Add Category</button> 
          {{-- onclick="addCategory()" --}}
        </form>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <h2>Categories</h2>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Category Name</th>
            </tr>
          </thead>
          <tbody id="categoryTableBody">
            <!-- Categories will be added here dynamically -->
            @if (count($catdata) > 0)
            @foreach ($catdata as $item)
            <tr>
              <td>{{$item->cat_id}}</td>
              <td> {{$item->category_name}} </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="3">No data available</td>
          </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function addCategory() {
      // Get category name from the input field
      var categoryName = document.getElementById("categoryName").value;

      // Validate if the category name is not empty
      if (categoryName.trim() === "") {
        alert("Please enter a category name");
        return;
      }

      // Create a new row for the table
      var newRow = document.createElement("tr");

      // Create cells for the row
      var cellIndex = document.createElement("td");
      var cellCategoryName = document.createElement("td");

      // Set the content of the cells
      cellIndex.textContent = document.getElementById("categoryTableBody").children.length + 1;
      cellCategoryName.textContent = categoryName;

      // Append cells to the row
      newRow.appendChild(cellIndex);
      newRow.appendChild(cellCategoryName);

      // Append the row to the table body
      document.getElementById("categoryTableBody").appendChild(newRow);

      // Clear the input field
      document.getElementById("categoryName").value = "";
    }
  </script>

</body>
</html>
