@extends('dashboard.layouts.app')

@section('title', 'Page Title')

@section('content')
 <section class="p-2">
    <form class=" mx-auto mt-10" method="POST" action="{{ route('admin.blog.update', $blog->id) }}">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Blog Edit</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="col-span-6">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900"> Title</label>
                <div class="mt-2">
                  <input type="text" name="title" id="title"
                  autocomplete="given-name" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  value="{{$blog->title}}"
                  >
                </div>
              </div>

              <div class="col-span-6">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                  <input id="description" name="description" type="description" autocomplete="description" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  value="{{$blog->description}}"
                  >
                </div>
              </div>

              {{-- <div class="col-span-6">
                     <label for="image" class="block text-sm font-medium leading-6 text-gray-900 mb-3">Update Image</label>
                     <input type="file" name="image" id="image" />
                     <img style="width: 300px; height: 300px; margin-top: 15px;" src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
               </div> --}}

            <div class="form-group">
                <label for="image" class="block text-sm font-medium leading-6 text-gray-900 mb-3" >
                    Current Image
                </label>
                <img style="width: 100px; height: 100px" src="{{ $blog->image }}" alt="blog_image">
            </div>

            </div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="submit" class="rounded-md bg-indigo-600 px-10 py-3 text-2xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
      </form>
</section>
@endsection
