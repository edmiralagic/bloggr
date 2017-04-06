@foreach (flash()->all() as $flash)
	<div class="alert notification is-{{ $flash->level }}">{{ $flash->message }}</div>
@endforeach