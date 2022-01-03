<?php

$connect = new PDO("mysql:host=localhost;dbname=store", "root", "");

if (isset($_POST["rating_data"])) {

    $data = array(
        ':user_id'        =>    $_POST["user_id"],
        ':app_id'        =>    $_POST["app_id"],
        ':user_rating'        =>    $_POST["rating_data"],
        ':user_review'        =>    $_POST["user_review"],
        ':datetime'            =>    date('Y-m-d H:i:s')
    );

    $query = "
    INSERT INTO review_table 
    (user_id, app_id, user_rating, user_review, datetime) 
    VALUES (:user_id, :app_id, :user_rating, :user_review, :datetime)
    ";

    $statement = $connect->prepare($query);

    $statement->execute($data);

    echo "Your Review & Rating Successfully Submitted";
}
if (isset($_POST["value"])) {
        
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    $review_content = array();
    $data = array(
        
        ':app_id'        =>    $_POST["app_id"],
    );
    $query = "
    SELECT users.name,review_table.user_rating,review_table.user_review,review_table.datetime from users,
    review_table WHERE users.id = review_table.user_id AND review_table.app_id = :app_id ORDER BY review_table.review_id DESC  
    ";
    
    $stmt= $connect->prepare($query);
    $stmt->execute($data);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);
    // die();
    foreach ($result as $row) {
        $review_content[] = array(
            'user_name'        =>    $row["name"],
            'user_review'    =>    $row["user_review"],
            'rating'        =>    $row["user_rating"],
            'datetime'        =>    date('d/m H:i', strtotime($row['datetime']))
        );

        if ($row["user_rating"] == '5') {
            $five_star_review++;
        }

        if ($row["user_rating"] == '4') {
            $four_star_review++;
        }

        if ($row["user_rating"] == '3') {
            $three_star_review++;
        }

        if ($row["user_rating"] == '2') {
            $two_star_review++;
        }

        if ($row["user_rating"] == '1') {
            $one_star_review++;
        }

        $total_review++;

        $total_user_rating = $total_user_rating + $row["user_rating"];
    }

    $average_rating = $total_user_rating / $total_review;

    $output = array(
        'average_rating'    =>    number_format($average_rating, 1),
        'total_review'        =>    $total_review,
        'five_star_review'    =>    $five_star_review,
        'four_star_review'    =>    $four_star_review,
        'three_star_review'    =>    $three_star_review,
        'two_star_review'    =>    $two_star_review,
        'one_star_review'    =>    $one_star_review,
        'review_data'        =>    $review_content
    );

    exit (json_encode($output));
}

if (isset($_POST["check"])) {

    $data = array(
        
        ':user_id'        =>    $_POST["check"],
        ':app_id'        =>    $_POST["app_id"],
    );
    $query="SELECT * FROM review_table WHERE user_id = :user_id AND app_id = :app_id";
    $stmt= $connect->prepare($query);
    $stmt->execute($data);
    $count=$stmt->rowCount();
    if ($count > 0){
        echo true;
    }
    else
    echo false;
}
?>