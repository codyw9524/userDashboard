<?php
	date_default_timezone_set("America/Chicago");
	if(isset($messages))
	{
		date_default_timezone_set("America/Chicago");
		$phpdate = new DateTime($messages['updated_at']);
		$now = new DateTime();
		$formattedDate = $phpdate->diff($now)->format("%d days %h hours and %i minutes");
		$str = "";	
		if($formattedDate[0] < 1)
		{
			$newdate2 = explode(" days ", $formattedDate);
			$str = $newdate2[1];
		}
		else
		{
			$str = $formattedDate;
		}
			echo "<div class='row'>\n";
			echo "<div class='col-md-9 col-md-offset-2'>\n";
			echo "<h5><a href='/Users/show/" . $messages['users.id'] . "'>" . $messages['name'] . "</a> wrote:</h5>\n";
			echo "<h5 class='time'>" . $str . " ago</h5>\n";
			echo "<p class='messages'>" . $messages['content'] . "</p>\n";
			echo "</div>\n";
			echo "</div>\n";
			//finished displaying message | begin displaying comment field
			
			if(isset($comments))
			{

				foreach ($comments as $comment)
				{
					$phpdate = new DateTime($comment['updated_at']);
					$now = new DateTime();
					$formattedDate = $phpdate->diff($now)->format("%d days %h hours and %i minutes");
					$str = "";	
					if($formattedDate[0] < 1)
					{
						$newdate2 = explode(" days ", $formattedDate);
						$str = $newdate2[1];
					}
					else
					{
						$str = $formattedDate;
					}
					echo "<div class='row'>\n";
					echo "<div class='col-md-8 col-md-offset-3'>\n";
					echo "<h6><a href='/Users/show/" . $comment['users.id'] . "'>" . $comment['name'] . "</a></h6>\n";
					echo "<h6 class='time'>" . $str . " ago</h6>\n";
					echo "<p class='comment'>" . $comment['content'] . "</p>\n";
					echo "</div>\n";
					echo "</div>\n";
				}
			}
			echo "<div class='row'>\n";
			echo "<div class='col-md-8 col-md-offset-3'>\n";
			echo "<form id='comments' action='/Comments/create' method='post'>\n";
			echo "<div class='form-group'>\n";
			echo "<label for='comment'>Post a comment</label>\n";
			echo "<input type='hidden' name='message_id' value='" . $messages['messages.id'] . "'>";
			echo "<input type='hidden' name='wall_id' value='" . $user['id'] . "'>";
			echo "<textarea id='comment' name='comment' class='form-control' rows='2'></textarea>\n";
			echo "<button id='comment_btn' type='submit' class='btn btn-success btn-sm'>Post Comment</button>\n";
			echo "<div style='clear: both;'></div>\n";
			echo "</div>\n";
			echo "</form>\n";
			echo "</div>\n";
			echo "</div>\n";
	}
?>	