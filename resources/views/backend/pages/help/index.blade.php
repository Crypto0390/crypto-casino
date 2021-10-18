@extends('backend.layouts.main')

@section('title')
    {{ __('Help') }}
@endsection

@section('content')
  <ul class="nav nav-pills mt-3 mb-4">
    <li class="nav-item">
      <a class="nav-link {{ !request()->query('package') ? 'active' : ''}}" href="{{ route('backend.help.index') }}">{{ __('Main') }}</a>
    </li>
    @foreach($packages as $package)
      <li class="nav-item">
        <a class="nav-link {{ request()->query('package') == $package ? 'active' : ''}}" href="{{ route('backend.help.index', ['package' => $package]) }}">
          {{ ucfirst($package) }}
        </a>
      </li>
    @endforeach
  </ul>

  @include($view)
@endsection
