<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h16 flex items-center justify-between">
        <div>
            <a href="/">Idea</a>
        </div>

        <div class="flex gap-x-5 items-center">
            @auth
                <a href="/profile/edit">Edit Profile</a>
                <form
                    action="/logout"
                    method="POST"
                >
                    @csrf
                    @method('delete')
                    <button type="submit">Log out</button>
                </form>
            @else
                <a href="/login">Sign In</a>
                <a
                    href="/register"
                    class="btn"
                >Register</a>
            @endauth

        </div>
    </div>
</nav>
