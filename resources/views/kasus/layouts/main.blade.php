<!doctype html>
<html lang="en" class="no-focus">
<head>
	@include('layouts.components2.header')
</head>
<body>
	@include('layouts.components2.svg')

    <div style="position: fixed; top:100px; left: 48%; z-index: 2000; display: none" id="loading-top">
        <i class="fa fa-4x fa-asterisk fa-spin text-info"></i>
    </div>

	<div id="page-container" class="page-header-fixed main-content-boxed">
		@include('layouts.components2.navbar')
		@yield('content')
	</div>

	<div id="print-container">
	</div>

	@include('layouts.components2.footer')
	@include('layouts.components2.js')
</body>
</html>
