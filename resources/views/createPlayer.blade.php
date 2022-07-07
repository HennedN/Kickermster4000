@extends('layouts.app')
 
@section('title', 'Spieler')
  
@section('content')
    <div class="mx-auto w-full max-w-[550px] py-12">
        <form action="{{ route('create.player') }}" method="POST" class="text-black">
            @csrf
          <div class="mb-5">
            <label for="vorname" class="mb-3 block text-base font-medium text-white">Vorname</label>
            <input type="text" name="vorname" id="vorname" placeholder="Vorname" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
          </div>
          <div class="mb-5">
            <label for="nachname"class="mb-3 block text-base font-medium text-white">Nachname</label>
            <input type="text" name="nachname" id="nachname" placeholder="Nachname" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
          </div>
          <div>
            <button class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">Submit</button>
          </div>
        </form>
      </div>
    </div>
@stop