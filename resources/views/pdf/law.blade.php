<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style>
		.page-break {
		    page-break-after: always;
		}
	</style>
</head>
<body>
	<table width="100%">
		<tr>
			<td align="center">
				<img src="http://egov.lostisland.org/images/logo.png">
			</td>
		</tr>
		<tr>
			<td><hr></td>
		</tr>
		<tr>
			<td align="center">
				@if($law->status == "decree")
					<strong>PRESIDENTIAL DECREE</strong>
				@elseif($law->status == "order")
					<strong>GOVERNMENT ORDER</strong>
				@elseif($law->status == "ordinance")
				    <strong>MINISTERIAL ORDINANCE</strong>
				@endif
			</td>
		</tr>
		<tr><td><p>&nbsp;</p></td></tr>
		<tr>
			<td>{!! $law->top !!}</td>
		</tr>
		<tr><td></td></tr>
		<tr>
			<td>{!! $law->body !!}</td>
		</tr>
		<tr><td></td></tr>
		<tr>
			<td>
				{!! $law->bottom !!}
	    <br><br>
	    {{ strftime('%B %e, %Y', strtotime($law->created_at)) }}
			</td>
		</tr>
	</table>
</body>
</html>