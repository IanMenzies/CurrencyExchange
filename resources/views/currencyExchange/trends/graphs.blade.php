@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Charts</div>

				<div class="panel-body">
					<div class="charts">

					<canvas class="trend-chart" width="800px" height="300px">
						
					</canvas>

					<canvas class="trend-chart-two" width="800px" height="300px">
						
					</canvas>

					<canvas class="trend-chart-three" width="800px" height="300px">
						
					</canvas>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')

@endsection