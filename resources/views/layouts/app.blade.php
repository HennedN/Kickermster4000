<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kickermaster 4000 - @yield('title')</title>
    @vite('resources/css/app.css')
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="bg-slate-800">

<div class="w-full text-gray-700 bg-red-500 dark-mode:text-gray-200 dark-mode:bg-gray-800">
  <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
    <div class="p-4 flex flex-row items-center justify-between">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="-2500 -2500 5000 5000">
                <title>Fußball</title>
                <g stroke="#000" stroke-width="24">
                    <circle fill="#fff" r="2376"/>
                    <path fill="none" d="m-1643-1716 155 158m-550 2364c231 231 538 195 826 202m-524-2040c-491 351-610 1064-592 1060m1216-1008c-51 373 84 783 364 1220m-107-2289c157-157 466-267 873-329m-528 4112c-50 132-37 315-8 510m62-3883c282 32 792 74 1196 303m-404 2644c310 173 649 247 1060 180m-340-2008c-242 334-534 645-872 936m1109-2119c-111-207-296-375-499-534m1146 1281c100 3 197 44 290 141m-438 495c158 297 181 718 204 1140"/>
                </g>
                <path fill="#000" d="m-1624-1700c243-153 498-303 856-424 141 117 253 307 372 492-288 275-562 544-724 756-274-25-410-2-740-60 3-244 84-499 236-764zm2904-40c271 248 537 498 724 788-55 262-105 553-180 704-234-35-536-125-820-200-138-357-231-625-340-924 210-156 417-296 616-368zm-3273 3033a2376 2376 0 0 1-378-1392l59-7c54 342 124 674 311 928-36 179-2 323 51 458zm1197-1125c365 60 717 120 1060 180 106 333 120 667 156 1000-263 218-625 287-944 420-372-240-523-508-736-768 122-281 257-561 464-832zm3013 678a2376 2376 0 0 1-925 1147l-116-5c84-127 114-297 118-488 232-111 464-463 696-772 86 30 159 72 227 118zm-2287 1527a2376 2376 0 0 1-993-251c199 74 367 143 542 83 53 75 176 134 451 168z"/>
            </svg>
            <span class="font-semibold text-xl tracking-tight">Kickermaster 4000</span>
        </div>
      <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
      <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('matches') }}">Matches</a>
      <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('player') }}">Player</a>
    </nav>
  </div>
</div>
    
    <div class="container mx-auto text-white">
        
        @yield('content')
    </div>
</body>
</html>