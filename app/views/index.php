<!DOCTYPE html>
<html>
<head>
	<title>Recepie Finder</title>
</head>

<body>
	<form name="recepieFinder" method="get" action="/recepiefinder/public/recepies">
		<table border=1 style="border-collapse:collapse;">
			<tr>
				<td style="padding:10px;">
					Enter the List of items you have in the fridge in csv format<br /><br />
					eg.<br />
					bread,10,slies,25/12/2014<br />
					cheese,10,slices,25/12/2014<br />
					butter,250,grams,25/12/2014<br />
					peanut butter,250,grams,2/12/2014<br />
					mixed salad,150,grams,26/12/2013<br />
				</td>
				<td style="padding:10px;"><textarea name="fridge" cols=50 rows=9></textarea></td>
			</tr>

			<tr>
				<td style="padding:10px;">
					Enter the recepies in the json format<br /><br />
					eg.<br />
					[<br />
					    &nbsp;&nbsp;{<br />
					        &nbsp;&nbsp;&nbsp;&nbsp;"name": "grilled cheese on toast",<br />
					        &nbsp;&nbsp;&nbsp;&nbsp;"ingredients": [<br />
					            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{ "item":"bread", "amount":"2", "unit":"slices"},<br />
					            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{ "item":"cheese", "amount":"2", "unit":"slices"}<br />
					        &nbsp;&nbsp;&nbsp;&nbsp;]<br />
					    &nbsp;&nbsp;}<br />
					    &nbsp;&nbsp;,<br />
					    &nbsp;&nbsp;{<br />
					        &nbsp;&nbsp;&nbsp;&nbsp;"name": "salad sandwich",<br />
					        &nbsp;&nbsp;&nbsp;&nbsp;"ingredients": [<br />
					            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{ "item":"bread", "amount":"2", "unit":"slices"},<br />
					            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{ "item":"mixed salad", "amount":"100", "unit":"grams"}<br />
					        &nbsp;&nbsp;&nbsp;&nbsp;]<br />
					    &nbsp;&nbsp;}<br />
					]
				</td>
				<td style="padding:10px;"><textarea name="recepies" cols=50 rows=20></textarea></td>
			</tr>
			
			<tr>
				<td colspan=2><input type="submit" name="submit" /></td>
			</tr>
		</table>
	</form>
</body>
</html>

