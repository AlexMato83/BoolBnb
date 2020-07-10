@extends('layouts.mainLayout')

@section('content')

  <canvas id="views"></canvas>

  <script type="text/javascript">
    var list_of_views = <?php echo json_encode($list_of_views)?>;
    // document.write(list_of_months);
  </script>

  <canvas id="messages"></canvas>

  <script type="text/javascript">
    var list_of_messages = <?php echo json_encode($list_of_messages)?>;
    // document.write(list_of_months);
  </script>

@endsection
