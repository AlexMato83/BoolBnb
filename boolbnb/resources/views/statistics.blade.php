@extends('layouts.mainLayout')

@section('content')

  <canvas id="line"></canvas>

  <script type="text/javascript">
    var list_of_months = <?php echo json_encode($list_of_months)?>;
    // document.write(list_of_months);
  </script>

@endsection
