<% if Posts %>
	<ul>
		<% loop Posts %>
			<li><a href="$Link" title="$Title">$Title</a></li>
		<% end_loop %>
	</ul>
<% end_if %>