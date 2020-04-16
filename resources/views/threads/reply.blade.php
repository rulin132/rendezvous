<p class="card-text"><b>{{ $reply->owner->name }} said:</b> {{ $reply->body }}</p>
<small>{{ $reply->created_at->diffForHumans() }}</small>
<hr />
