@include('Admin.Layout.header')
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <section style="margin-left: -250px;">
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Customer's Contact Querys</h1>
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
          <th class="py-2 px-4 border-b border-gray-300">Name</th>
          <th class="py-2 px-4 border-b border-gray-300">Email</th>
          <th class="py-2 px-4 border-b border-gray-300">Subject</th>        
          <th class="py-2 px-4 border-b border-gray-300">Message</th>                   
          <th class="py-2 px-4 border-b border-gray-300">Action</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($userquerys as $item)
        <tr>
          <td class="py-2 px-4 border-b border-gray-300">{{$item->id}}</td>
          <td class="py-2 px-4 border-b border-gray-300">{{$item->name}}</td>
          <td class="py-2 px-4 border-b border-gray-300">{{$item->email}}</td>               
          <td class="py-2 px-4 border-b border-gray-300">{{$item->subject}}</td>         
          <td class="py-2 px-4 border-b border-gray-300">{{$item->message}}</td>          

        <td class="py-2 px-4 border-b border-gray-300">
          <a href="{{url('/querydelete')}}/{{$item->id}}"><button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Trash</button></a>          
          
        </td>
        </tr>
        @endforeach
      
      </tbody>
    </table>
  
  </div>
  </section>

  @include('Admin.Layout.footer')