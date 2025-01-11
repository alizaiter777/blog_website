<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                    <div class="d-flex align-items-center justify-content-between">
                        <h2>List Categories</h2>
                        <a href="{{route('admin/categories/create')}}"class="btn btn-primary">Add Category</a>

            </div>
            <hr/>
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif

        
          <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>

                        

                    </tr>

                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td class="align-middle">{{$loop->iteration}}</td>
                        <td class="align-middle">{{$category->name}}</td>
                        
                        <td class="align-middle">{{$category->created_at}}</td>
                        <td class="align-middle">{{$category->updated_at}}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('admin/categories/edit',['id'=>$category->id])}}" type="button" class="btn btn-secondary">Edit</a>
                                <a href="{{route('admin/categories/delete',['id'=>$category->id])}}" type="button" class="btn btn-danger">Delete</a>

                              </div>
                         </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="5">User not found</td>
                    </tr>     
                    @endforelse  
                 </tbody>

            </table>
        </div>
    </div>
  </div>
 </div>
</x-app-layout>
