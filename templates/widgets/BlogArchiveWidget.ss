<% if Archive %>
	<ul>
		<% loop Archive %>
			<li><a href="$Link" title="$Title">$Title</a></li>
		<% end_loop %>
	</ul>
<% end_if %>