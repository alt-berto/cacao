<!DOCTYPE html>
<html lang="{{ strtolower( $language ) }}">
<head>

  <title>{{ $title }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Metas -->
  <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
  @foreach ( $metas as $meta )
  <meta name="{{ $meta['name'] }}" content="{{ $meta['content'] }}" />
  @endforeach

  <!-- Include registered css -->
  @foreach ( $css['externals'] as $external )
  <link rel="stylesheet" type="text/css" href="{{ $external }}" />
  @endforeach

  @foreach ($css['internals'] as $internal)
  <link rel="stylesheet" type="text/css" href="{{ asset('css/') }}/{{ $internal }}" />
  @endforeach

  <!-- icons -->
  @foreach ($icons['internals'] as $internal)
  <link rel="{{ $internal['rel'] }}" sizes="{{ $internal['size'] }}" href="{{ asset('images/') }}/{{ $internal['url'] }}">
  @endforeach

</head>

<body class="bg-light">
  <div id="app">
    @include('layout.header')
    @yield('content')
    @include('layout.footer')

  </div>
  <!-- Include registered javascript -->
  @foreach ($js['internals'] as $internal)
    <script src="{{ asset('js/') }}/{{ $internal }}" type="application/javascript" /></script>
  @endforeach
  <script>
    $('.carousel').carousel({
      interval: 6000
    });
  </script>
  <input name="animation" type="hidden">
  <!-- Include externals javascript -->
  {{--
  @foreach ($js['externals'] as $external)
  <script src="{{ $external }}" type="application/javascript" /></script>
  @endforeach
  --}}


</body>
</html>
