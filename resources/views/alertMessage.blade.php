<div class="container mt-2">
    <span class="text-center">
        @if (session()->has('success'))
            <span class="text-success">
                {{ session('success') }}
            </span>
        @endif

        @if (session()->has('fail'))
            <span class="text-danger">
                {{ session('fail') }}
            </span>
        @endif
    </span>
</div>
