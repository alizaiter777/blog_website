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
                
                
            
                 <p><a href="{{route('admin/posts')}}"class="btn btn-primary">Go Back</a></p>

                   <form action="{{route('admin/posts/update',$posts->id)}}" method="POST">
                       @csrf
                       @method('PUT')
                       <div class="row">
                          <div class="col mb-3">
                              <label class="form-label"> Post Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Title" value="{{$posts->title}}">
                               @error('title')
                               <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                       </div>

                       <div class="row">
                        <div class="col mb-3">
                            <label class="form-label"> content</label>
                            <input type="text" name="content" class="form-control" placeholder="Content" value="{{$posts->content}}">
                             @error('content')
                             <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                     </div>

                     <div class="row mb-3">
                        <div class="col">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" placeholder="image" value="{{$posts->image}}">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                     

                        <label for="categoryId">Category</label>
                        <select name="categoryId" id="categoryId" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $category->id == $posts->categoryId ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
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