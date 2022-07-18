{{-- Header --}}
<header class="navigation sticky top-0 py-6">
    <div class="container flex justify-between items-center mx-auto px-8 md:px-14 lg:px-24 w-full">
        {{-- logo --}}
        <div class="text-2xl md:text-lg">Yoga's Site</div>

        {{-- menu --}}
        <div class="hidden md:flex space-x-12 items-center">
            <a href="#hero" class="links hover:text-selected-text hover:transition-all">Home</a>
            <a href="#about" class="links hover:text-selected-text hover:transition-all">About</a>
            <a href="#project" class="links hover:text-selected-text hover:transition-all">Project</a>
            <a href="#contact" class="links hover:text-selected-text hover:transition-all">Contact</a>
        </div>

        {{-- Hamburger Menu --}}
        <div class="md:hidden">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 text-black">
                    <li><a href="#hero" class="links">Home</a></li>
                    <li><a href="#about" class="links">About</a></li>
                    <li><a href="#project" class="links">Project</a></li>
                    <li><a href="#contact" class="links">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
{{-- End of Header --}}