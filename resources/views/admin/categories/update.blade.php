<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class='mb-0'>Edit Category</h1>
                </hr>
                
                
            
                 <p><a href="{{route('admin/categories')}}"class="btn btn-primary">Go Back</a></p>

                   <form action="{{route('admin/categories/update',$categories->id)}}" method="POST">
                       @csrf
                       @method('PUT')
                       <div class="row">
                          <div class="col mb-3">
                              <label class="form-label"> Category Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Name" value="{{$categories->name}}">
                               @error('name')
                               <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                       </div>
                       <div class="row">
                          <div class="d-grid">
                            <button class="btn btn-warning">Update</button>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>