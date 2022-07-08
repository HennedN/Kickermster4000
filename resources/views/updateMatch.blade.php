@extends('layouts.app')
 
@section('title', 'Spieler')
  
@section('content')
    <div class="mx-auto w-full max-w-[550px] py-12">
        <form action="{{ route('update.match') }}" method="POST" class="text-black">
            @csrf
          <div class="mb-5">
            <input type="hidden" name="id" id="id" value="{{ $match->id }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
          </div>
          <div class="mb-5">
            <label for="player1" class="mb-3 block text-base font-medium text-white">Spieler 1 Nachname</label>
            <input type="text" name="player1" id="player1" value="{{ $match->teams[0]->player1 }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
          </div>
          <div class="mb-5">
            <label for="player2"class="mb-3 block text-base font-medium text-white">Spieler 2 Nachname</label>
            <input type="text" name="player2" id="player2" value="{{ $match->teams[0]->player2 }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
          </div>
          <div class="mb-5">
            <label for="player3"class="mb-3 block text-base font-medium text-white">Spieler 3 Nachname</label>
            <input type="text" name="player3" id="player3" value="{{ $match->teams[1]->player1 }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
          </div>
          <div class="mb-5">
            <label for="player4"class="mb-3 block text-base font-medium text-white">Spieler 4 Nachname</label>
            <input type="text" name="player4" id="player4" value="{{ $match->teams[1]->player2 }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
          </div>
          <div class="mb-5">
            <label for="score" class="mb-3 block text-base font-medium text-white">Ergebnis</label>
            <input type="text" name="score" id="score" value="{{ $match->Score }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
          </div>
          <div class="mb-5">
            <label for="subject" class="mb-3 block text-base font-medium text-white">Sieger</label>
            <select name="winner" id="winner"class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                <option {{ $match->teams[0]->winner ? 'selected' : '' }} value="Team1">Team 1</option>
                <option {{ $match->teams[1]->winner ? 'selected' : '' }} value="Team2">Team 2</option>
            </select>
          </div>
          <div>
            <button class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">Submit</button>
          </div>
        </form>
      </div>
    </div>
@stop