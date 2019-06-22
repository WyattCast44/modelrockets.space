<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="">Logout</button>
</form>