<x-layout.user :$backRoute title="{{ $action }} GPOA Activity" class="gpoa form">
    <article class="article">
        <x-alert/>
        <form method="post" action="{{ $formAction }}">
            @method('PUT')
            @csrf
            <p>
                <label>Comments</label>
                <textarea name="comments"></textarea>
            </p>
            <p class="form-submit">
                <button>{{ $action }}</button>
            </p>
        </form>
    </article>    
</x-layout.user>