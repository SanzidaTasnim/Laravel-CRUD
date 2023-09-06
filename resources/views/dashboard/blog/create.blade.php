@extends('dashboard.layouts.app')

@section('title', 'Page Title')

@section('content')
<section class="p-2">
    <form class=" mx-auto mt-10" method="POST" action="{{ route('admin.blog.store') }}">
        @csrf
        <div class="space-y-12">
           @include('errors.message')

          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Blog Create</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="col-span-6">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900"> Title</label>
                <div class="mt-2">
                  <input type="text" name="title" id="title" autocomplete="given-title" class="p-2 block w-full rounded-md   py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('title') border-red-500 border-2 @enderror" value="{{old('title')}}">
                  @error('title')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-span-6">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                  <input id="description" name="description" type="text" autocomplete="description" class="p-2 block w-full rounded-md   py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('description') border-red-500 border-2 @enderror" value="{{old('description')}}">
                  @error('description')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-span-full">
                <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Blog Image</label>
                <div class="mt-2">
                  <input type="file" name="image" id="image" autocomplete="image" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2 @error('image') border-red-500 border-2 @enderror">
                  @error('image')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="submit" class="rounded-md bg-indigo-600 px-10 py-3 text-2xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
</section>
@endsection

@section('script')

@endsection
