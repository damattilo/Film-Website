
<?php 

    include 'includes/database.php'; 

	$name=$_POST['reviewerName'];
	$review=$_POST['reviewContent'];
    $filmID=$_POST['reviewID'];
    $liked = $_POST['likeDislike'];

    var_dump($liked);


	
    $Statement = $db->prepare('
    
		INSERT INTO review (film_id, reviewer, comment,liked)
        VALUES (:filmid,:name,:comment,:liked);

        ');
        
    $Statement->execute(array(':filmid' => $filmID,':name' => $name,':comment' => $review, ':liked' => $liked));
    
?>