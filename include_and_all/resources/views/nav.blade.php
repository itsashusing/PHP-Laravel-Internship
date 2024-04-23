<div>
    <nav style="display: flex; flex-wrap:wrap; justify-content:center;">
        <ul style="display: flex;  gap:10vw">
            <li>Home</li>
            <li>Main</li>
            <li>About</li>
            @forelse ($names as $user )
            <li>{{$user}}</li>
            @empty
                <li>No user found</li>
            @endforelse
        </ul>
    </nav>
</div>
