@extends('layouts.app')
 
@section('title', 'Matches')
  
@section('content')
<div class="flex flex-col text-white">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <h1 class="text-center text-5xl py-12">Top Spieler</h1>
        <div class="overflow-hidden">
            <table class="min-w-full border text-center ">
            <thead class="border-b">
                <tr>
                <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                    Spieler
                </th>
                <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                    Win%
                </th>
                <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                    Siege
                </th>
                <th scope="col" class="text-sm font-medium  px-6 py-4">
                    Niederlagen
                </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stats as $key => $item)
                <tr class="border-b">
                    
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium  border-r">
                        {{ $key }}
                    </td>
                    
                    <td class="text-sm  font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ number_format(($item['wins']/($item['wins']+$item['loss']))*100, 2) }}%
                    </td>
                    <td class="text-sm  font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $item['wins'] }} 
                    </td>
                    <th scope="col" class="text-sm font-medium  px-6 py-4">
                        {{ $item['loss'] }} 
                    </td>
                   

                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <h1 class="text-center text-5xl py-12">Spielhistorie</h1>
        <a href="{{ route('download') }}">Download CSV</a>
        <a href="{{ route('createMatch') }}">Neues Match</a>
        <div class="overflow-hidden">
            <table class="min-w-full border text-center ">
            <thead class="border-b">
                <tr>
                <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                    #
                </th>
                <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                    Team 1
                </th>
                <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                    Team 2
                </th>
                <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                    Ergebnis
                </th>
                <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                    Sieger
                </th>
                <th scope="col" class="text-sm font-medium  px-6 py-4">
                    Action
                </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matches as $match)
                <tr class="border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium  border-r">{{ $match->id }}</td>
                    @foreach ($match->teams as $team)
                    <td class="text-sm  font-light px-6 py-4 whitespace-nowrap border-r">
                            {{ $team->player1 }} {{ $team->player2 }}
                    </td>
                    @endforeach
                    <td class="text-sm  font-light px-6 py-4 whitespace-nowrap border-r">
                        {{ $match->Score }}
                    </td>
                    <td class="text-sm  font-light px-6 py-4 whitespace-nowrap border-r">
                        @foreach ($match->teams as $team)
                            @if ($team->winner)
                                {{ $team->player1 }} {{ $team->player2 }}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-sm  font-light px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('updateMatch', ['id' => $match->id]) }}">Update</a>
                        <a href="{{ route('delete.match', ['id' => $match->id]) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            {{ $matches->links('pagination::tailwind') }}
        </div>
      </div>
    </div>
  </div>
@stop