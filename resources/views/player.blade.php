@extends('layouts.app')
 
@section('title', 'Matches')
  
@section('content')
<div class="flex flex-col text-white">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <h1 class="text-center text-5xl py-12">Spieler</h1>
        <a href="{{ route('createPlayer') }}">Neuen Spieler anlegen</a>
        <div class="overflow-hidden">
            <table class="min-w-full border text-center ">
                <thead class="border-b">
                    <tr>
                    <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                        Vorname
                    </th>
                    <th scope="col" class="text-sm font-medium  px-6 py-4 border-r">
                        Nachname
                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($player as $value)
                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium  border-r">
                            {{ $value->vorname }}
                        </td>
                        <td class="text-sm  font-light px-6 py-4 whitespace-nowrap">
                            {{ $value->nachname }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@stop