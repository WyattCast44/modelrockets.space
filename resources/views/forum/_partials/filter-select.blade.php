<nav>

    <label for="filter" class="leading-none block uppercase mb-1 text-xs text-gray-500 text-center md:text-left">Filters</label>

    <div class="relative">
    
        <select 
            data-controller="selectnav" 
            data-target="selectnav.select" 
            data-action="change->selectnav#handle" 
            class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline text-gray-600"
            >
            
            <option disabled selected>Select Filter</option>
    
            <option value="?q=all">All</option>
            <option value="?q=popular">Popular</option>
            <option value="?q=latest">Latest</option>
            <option value="?q=mine">My Threads</option>
    
        </select>
    
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    
    </div>

</nav>