<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                    <div class="d-flex align-items-center justify-content-between">
                        <h2>List Posts</h2>
                        <a href="{{route('admin/posts/create')}}"class="btn btn-primary">Add Post</a>

                        
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
                        <th>User Id</th>
                        <th>Category Id</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Updated at</th>

                        

                    </tr>

                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td class="align-middle">{{$loop->iteration}}</td>
                        <td class="align-middle">{{$post->user->id ?? 'N/A' }}</td> <!-- Display user's name -->
                        <td class="align-middle">{{$post->category->id ?? 'N/A' }}</td> <!-- Display user's name -->

                        <td class="align-middle">{{$post->title}}</td>
                        <td class="align-middle">{{$post->content}}</td>
                        <td class="align-middle">{{$post->image}}</td>
                        <td class="align-middle">{{$post->created_at}}</td>
                        <td class="align-middle">{{$post->updated_at}}</td>
                        <td class="align-middle">
                            
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('admin/posts/edit',['id'=>$post->id])}}" type="button" class="btn btn-secondary">Edit</a>
                                <a href="{{route('admin/posts/delete',['id'=>$post->id])}}" type="button" class="btn btn-danger">Delete</a>

                              </div>
                         </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="5">Post not found</td>
                    </tr>     
                    @endforelse  
                 </tbody>

            </table>
        </div>
    </div>
  </div>
 </div>
</x-app-layout>
