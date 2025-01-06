<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class='mb-0'>Add User</h1>
                </hr>
                
                @if(session()->has('error'))
                <div>
                    {{session('error')}}
                 </div>
                 @endif
            
                 <p><a href="{{route('admin/users')}}"class="btn btn-primary">Go Back</a></p>

                 <form action="{{route('admin/users/save')}}" method="POST" enctype="multipart/form-data">
                    @csrf   
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="name" class="from-control" placeholder="Name">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3"> 
                        <div class="col">
                            <input type="email" name="email" class="from-control" placeholder="Email">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="password" name="password" class="from-control" placeholder="Password">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
   
                        <div class="row mb-3">
                        <div class="col">
                            <input type="password" name="password_confirmation" class="from-control" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="d-grid">
                           <button class="btn btn-primary"> Submit</button>
                        </div>
                    </div>
                 </form>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>