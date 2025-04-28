<!-- filepath: resources/views/components/sidebar.blade.php -->
<div class="bg-gray-800 text-white w-64 h-screen fixed">
    <div class="p-4">
        <h2 class="text-lg font-semibold">Admin Panel</h2>
    </div>
    <nav class="mt-4">
        <ul>
            <li class="p-2 hover:bg-gray-700">
                <a href="{{ route('dashboard') }}" class="block">Dashboard</a>
            </li>
            <li class="p-2 hover:bg-gray-700">
                <a href="{{ route('users.index') }}" class="block">Users</a>
            </li>
            <li class="p-2 hover:bg-gray-700">
                <a href="{{ route('settings') }}" class="block">Settings</a>
            </li>
            <li class="p-2 hover:bg-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
</div>