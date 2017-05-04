<?php
	include('connect.php');
	$posts = array();
	if($_GET) {
		$q = $_GET['query'];
		$words = explode(" ", $q);
		foreach ($words as $word) {
			$query = "select * from `topics_english` where `interest`='".$word."'";
			$result = mysql_query($query);
			$topicid = 0;
			while($row = mysql_fetch_array($result)) {
				$topicid = $row['id'];
			}
			$query = mysql_query("select * from `topics_map` where `topic_id`=".$topicid);
			while($row = mysql_fetch_array($query)) {
				array_push($posts, $row['post_id']);
			}
		}
	}

	foreach($posts as $post) {
		$query = mysql_query("select * from `posts` where `id`=".$post);
		while($row = mysql_fetch_array($query)) {
			$title = $row['title'];
			$postdata = $row['posts_data'];
?>
			<div class = "display_box">
				<a href="#" class='addname' title='<?php echo $postdata ?>'><?php echo $title ?></a>
			</div>
<?php
		}
	}
		
?>