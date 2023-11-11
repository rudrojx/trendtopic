<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog List Details</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
  
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Blog List</h1>
    <form action="" method="get">
      <div class="container mx-auto p-4">
        <div class="relative">
            <input type="search" name="search" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500" placeholder="Search" value="{{$search}}">
            <button class="absolute top-0 right-0 mt-2 mr-2" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 feather feather-search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </div>      
    </div>
  </form>

    <table class="w-full bg-white border border-gray-300">
      <thead>
        <tr class="bg-gray-200">          
          <th class="py-2 px-4 border-b border-gray-300">ID</th>
          <th class="py-2 px-4 border-b border-gray-300">Title</th>
          <th class="py-2 px-4 border-b border-gray-300">Heading</th>
          <th class="py-2 px-4 border-b border-gray-300">Category</th>        
          <th class="py-2 px-4 border-b border-gray-300">Image</th>                   
          <th class="py-2 px-4 border-b border-gray-300">Action</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($blogs as $item)
        <tr>
          <td class="py-2 px-4 border-b border-gray-300">{{$item->blog_id}}</td>
          <td class="py-2 px-4 border-b border-gray-300">{{$item->title}}</td>
          <td class="py-2 px-4 border-b border-gray-300">{{$item->heading}}</td>               
          <td class="py-2 px-4 border-b border-gray-300">{{$item->trendcategory->category_name}}</td>         
          <td class="py-2 px-4 border-b border-gray-300"><img width="50px" height="90px" src="{{ '/storage/blogimages/'.$item->banner_img}}" alt="Banner Image"></td>          

        <td class="py-2 px-4 border-b border-gray-300">
          <a href="{{url('/sublime/product/delete')}}/{{$item->blog_id}}"><button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Trash</button></a>          
          <a href="{{url('/sublime/product/delete')}}/{{$item->blog_id}}"><button class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Edit</button></a>
        </td>
        </tr>
        @endforeach
      
      </tbody>
    </table>
    <div>
      {{$blogs->links()}}
      </div>
  </div>
</body>
</html>
